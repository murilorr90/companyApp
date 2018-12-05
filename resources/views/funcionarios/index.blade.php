@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if (Session::has('message'))
                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                @endif
                <div class="card table-responsive-sm">
                    <div class="card-header">
                        <a href="{{ route('funcionarios.create') }}" class="btn btn-sm btn-success mr-2">Adicionar</a>
                        Funcionários
                    </div>
                    <table class="table table-striped no-padding">
                        <thead>
                        <tr>
                            <td>ID</td>
                            <td>Nome</td>
                            <td>Email</td>
                            <td>CPF</td>
                            <td>Empresa</td>
                            <td style="width:191px">Ações</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($funcionarios as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->nome }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->cpf }}</td>
                                <td>{{ $item->empresa->nome }}</td>
                                <td>
                                    <a class="btn btn-sm btn-success" href="{{ route('funcionarios.show', $item->id) }}">Exibir</a>
                                    <a class="btn btn-sm btn-dark" href="{{ route('funcionarios.edit', $item->id) }}" >Editar</a>
                                    <form action="{{ route('funcionarios.destroy', $item->id)}}" method="post" class="float-right">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Você deseja realmente excluir estem item?');">Deletar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="m-2">{{ $funcionarios->links() }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection