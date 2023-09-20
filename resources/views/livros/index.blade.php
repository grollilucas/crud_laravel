@extends('crud_template')
@section('content')
    <div class="card mt-5">
        <div class="card-header">
            <h2>Lista de Livros</h2>
        </div>

        <div class="card-body">

            <div class="row">
                <div class="col">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <div>{{ $message }}</div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col mt-1 mr-1">
                    <a class="btn btn-success float-end" href="{{ url('/livros/novo') }}">Novo Livro</a>
                </div>
            </div>

            <div class="col">
                <table class="table table-bordered">
                    <tr>
                        <th>Nome</th>
                        <th>Autor</th>
                        <th>Nº Registro</th>
                        <th widht="280px">Ações</th>
                    </tr>
                    @if (isset($livros))
                        @foreach ($livros as $livro)
                            <tr>
                                <td>{{ $livro['nome'] }}</td>
                                <td>{{ $livro['autor'] }}</td>
                                <td>{{ $livro['registro_biblioteca'] }}</td>
                                <td>
                                    <a class="btn btn-primary"
                                        href="{{ url('/livros/editar', ['id' => $livro['id']]) }}">Editar</a>
                                    <a onclick="confirma(this)" href="{{ url('/livros/delete', ['id' => $livro['id']]) }}"
                                        class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">Excluir</a>

                                </td>
                            </tr>
                        @endforeach

                    @endif
                </table>
            </div>

            <div class="row">
                <div class="col mt-1 mr-1">
                    <a class="btn btn-secondary float-end" href="{{ url('/dashboard') }}">Voltar</a>
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Deseja deletar esse aluno?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Deseja realmente excluir o livro?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                    <a id="btnConfirma" class="btn btn-danger">Sim, excluir</a>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    function confirma(elemento) {
        document.getElementById('btnConfirma').setAttribute('href', elemento.href);
    }
</script>
