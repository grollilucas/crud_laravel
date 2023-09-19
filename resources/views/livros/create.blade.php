@extends('crud_template')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Cadastro de Livros</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Problemas com seus dados:</strong>
                            <br>
                            @foreach ($errors->all() as $error)
                                <li> {{ $error }}</li>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            <div class="row">
                <form action="{{ url('livros/novo') }}" method="POST">
                    @csrf
                    <div class="row">
                        <strong>Nome:</strong>
                        <input placeholder="Digite o nome do livro" class="form-control mb-3" name="nome" type="text" id="nome" />
                        <strong>Autor:</strong>
                        <input placeholder="Digite o autor" class="form-control mb-3" name="autor" type="text" id="autor"/>
                        <strong>Nº do Registro:</strong>
                        <input placeholder="Digite o registro" class="form-control mb-3" name="registro_biblioteca" type="text" id="registro_biblioteca"/>

                        <div class="col">
                            <a class="btn btn-secondary" href="{{ url('/livros') }}">Voltar</a>
                            <button class="btn btn-primary" type="submit">Salvar</button>
                        </div>


                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
