@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('funcionarios.index') }}" class="btn btn-sm btn-danger mr-2">Voltar</a>
                        Funcionarios<small> - Visualizar</small></div>
                        <div class="card-body">
                            <p>
                                <strong>Nome:</strong> {{ $funcionario->nome }}<br>
                                <strong>Empresa:</strong> {{ $funcionario->empresa->nome }}<br>
                                <strong>Email:</strong> {{ $funcionario->email }}<br>
                                <strong>CPF:</strong> {{ $funcionario->cpf }}<br>
                                <strong>Telefone:</strong> {{ $funcionario->telefone }}<br>
                                <strong>Criado:</strong> {{ $funcionario->created_at ? $funcionario->created_at->format('d/m/Y H:i:s') :  '' }}<br>
                            </p>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection