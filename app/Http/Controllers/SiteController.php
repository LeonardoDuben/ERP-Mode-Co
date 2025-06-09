<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Produto;
use Illuminate\Support\Facades\DB;

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
        return view('site.login');
    }

    public function login(Request $request)
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
}

