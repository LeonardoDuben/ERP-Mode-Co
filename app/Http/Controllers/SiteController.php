<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

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
}

