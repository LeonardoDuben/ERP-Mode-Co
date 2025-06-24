<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Produto;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class SiteController extends Controller
{
    public function principal()
    {
        return view('site.inicio');
    }

    public function showCadastro()
    {
        return view('site.cadastro');
    }

    public function cadastro(Request $request)
    {
        //
        $preco = str_replace(',', '.', $request->input('preco'));
        $preco = preg_replace('/[^0-9.]/','',$preco);

        $request->merge(['preco'=>$preco]);// Atualiza o valor no request

        // $nome = $request->input('nome');
        // $preco = $request->input('preco');

        $request->validate([
            'nome' => 'required|string|max:255',
            'preco' => 'required|numeric|min:0',
        ]);

        Produto::create([
            'nome' => $request->input('nome'),
            'preco' => $preco
        ]);

        return back()->with('success', 'Produto cadastrado com sucesso');
    }

    public function listar()
    {
        $produtos = DB::select('select * from produtos');


        return view('site.produtos', compact('produtos'));
    }

    public function adicionarCarrinho(Request $request)
    {
        $produtoId = $request->input('produto_id');
        $quantidade = $request->input('quantidade', 1);

        // Verifica se o produto existe
        $produto = Produto::find($produtoId);
        if (!$produto) {
            return back()->withErrors(['Produto não encontrado']);
        }

        // Adiciona o produto ao carrinho na sessão
        $carrinho = session()->get('carrinho', []);
        if (isset($carrinho[$produtoId])) {
            $carrinho[$produtoId]['quantidade'] += $quantidade;
        } else {
            $carrinho[$produtoId] = [
                'nome' => $produto->nome,
                'preco' => $produto->preco,
                'quantidade' => $quantidade
            ];
        }
        session()->put('carrinho', $carrinho);

        return back()->with('success', 'Produto adicionado ao carrinho');   
    }

    public function mostrarCarrinho()
    {
        $carrinho = session('carrinho', []);
        return view('site.carrinho', compact('carrinho'));
    }

    public function showLogin()
    {
        $user = Auth::user();
        return view('site.login', compact('user'));
    }

    public function login(Request $request) #post
    {
    $credentials = [
        'usuario' => $request->input('usuario'),
        'password' => $request->input('password'),
    ];

    if (Auth::attempt($credentials)) {
        return redirect()->route('site.principal')->with('success', 'Login realizado com sucesso!');
    }

    return back()->withErrors(['usuario' => 'Usuário ou senha inválidos'])->withInput();
    }
    public function showRegistrar()
    {
        $user = Auth::user();
        return view('site.registrar', compact('user'));
    }

    public function registrar(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'usuario' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = new \App\Models\User();
        $user->name = $request->input('nome');
        $user->email = $request->input('email');
        // Verifica se o usuário já existe
        if (\App\Models\User::where('usuario', $request->input('usuario'))->exists()) {
             return back()->withErrors(['usuario' => 'Usuário já existe'])->withInput();
        } 
        //pode adicionar aqui uma validação se o email ja ta cadastrado.
        $user->usuario = $request->input('usuario');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        return redirect()->route('site.login')->with('success', 'Usuário registrado com sucesso!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('site.login')->with('success', 'Logout realizado com sucesso!');
    }

    public function finalizarCompra()
    {
        $carrinho = session('carrinho', []);
        if (empty($carrinho)) {
            return redirect()->route('site.produtos')->withErrors(['carrinho' => 'Carrinho vazio. Adicione produtos antes de finalizar a compra.']);
        }
        else {
            return view('site.finalizar', compact('carrinho'));
        }

    }

    public function processarFinalizacao(Request $request)
    {
        $request->validate([
            'cep' => 'required|regex:/^\d{5}-?\d{3}$/'
        ]);

        $cep = preg_replace('/[^0-9]/', '', $request->cep);
        $response = Http::get("https://viacep.com.br/ws/{$cep}/json/");

        if ($response->failed() || isset($response['erro'])) {
            return back()->with('error', 'CEP inválido.')->withInput();
        }

        $endereco = $response->json();

        // Salva o endereço na sessão
        session(['endereco' => $endereco]);

        // Redireciona para a tela de resumo/finalização
        return redirect()->route('site.finalizarCompra');
    }

    public function finalizarCompraView()
    {
        $endereco = session('endereco');
        $carrinho = session('carrinho', []);

        if (!$endereco || !isset($endereco['uf'])) {
            return redirect()->route('site.finalizarCompra')->with('error', 'Endereço incompleto. Tente novamente.');
        }

        $estado = $endereco['uf'];

        $freteEstados = [
            'SP' => 10.00,
            'RJ' => 12.00,
            'MG' => 15.00,
            'ES' => 15.00,
            'PR' => 18.00,
            'SC' => 18.00,
            'RS' => 18.00,
            'BA' => 20.00,
            'PE' => 22.00,
            'AM' => 30.00,
            'OUTROS' => 25.00
        ];

        $frete = $freteEstados[$estado] ?? $freteEstados['OUTROS'];

        $totalProdutos = 0;
        foreach ($carrinho as $item) {
            $totalProdutos += $item['preco'] * $item['quantidade'];
        }

        $totalFinal = $totalProdutos + $frete;

        return view('site.finalizarCompra', [
            'endereco' => $endereco,
            'cep' => $endereco['cep'] ?? '',
            'estado' => $estado,
            'frete' => $frete,
            'totalProdutos' => $totalProdutos,
            'totalFinal' => $totalFinal,
        ]);
    }
}

