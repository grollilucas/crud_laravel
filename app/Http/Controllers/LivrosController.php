<?php

namespace App\Http\Controllers;

use App\Models\Livros;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LivrosController extends Controller
{

    public function index()
    {

        $livros = DB::table('livros')->orderBy('nome', 'asc')->get();
        $livros = json_decode($livros, true);
        return view(
            'livros.index',
            ['livros' => $livros]
        ); //select * from livros
    }

    //retorna pra tela o formulário
    public function create()
    {
        return view("livros.create");
    }


    public function store(Request $request)
    {

        $request->validate([
            'nome' => 'required|min:3|max:50',
            'autor' => 'required|min:3|max:50',
            'registro_biblioteca' => 'required|min:3|max:50'


        ],
        [
            'nome.required' =>'preencha o NOME do livro',
            'autor.required' =>'preencha o AUTOR do livro',
            'registro_biblioteca.required' =>'preencha o REGISTRO do livro'
        ]


        );

        Livros::create([
            'nome' => $request->nome,
            'autor' => $request->autor,
            'registro_biblioteca' => $request->registro_biblioteca

        ]);
        return redirect('/livros')->with('success', 'Livro salvo com sucesso!');
    }



    public function edit($id)
    {

        $livro = Livros::find($id);
        return view('livros.edit', ['livro' => $livro]);
    }

    public function update(Request $request)
    {

        $request->validate([
            'nome' => 'required|min:3|max:50',
            'autor' => 'required|min:3|max:50',
            'registro_biblioteca' => 'required|min:3|max:50'


        ],
        [
            'nome.required' =>'preencha o NOME do livro',
            'autor.required' =>'preencha o AUTOR do livro',
            'registro_biblioteca.required' =>'preencha o REGISTRO do livro'
        ]


        );

        $livro = Livros::find($request->id);


        $livro->update([
            'nome' => $request->nome,
            'autor' => $request->autor,
            'registro_biblioteca' => $request->registro_biblioteca,
        ]);
        return redirect('/livros')->with('success', 'Livro editado com sucesso!');
    }
    public function destroy($id)
    {
        $livro = Livros::find($id);
        $livro->delete();
        return redirect('/livros');
    }
}
