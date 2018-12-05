@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('empresas.index') }}" class="btn btn-sm btn-danger mr-2">Voltar</a>
                        Empresas<small> - Visualizar</small></div>
                        <div class="card-body">
                            <div class="text-center">
                                <img src="{{ url("storage/{$empresa->logo}") }}" class="w-50">
                            </div>
                            <p>
                                <strong>Nome:</strong> {{ $empresa->nome }}<br>
                                <strong>Email:</strong> {{ $empresa->email }}<br>
                                <strong>Website:</strong><a href="{{ $empresa->website }}" target="_blank">{{ $empresa->website }}</a><br>
                                <strong>Criado:</strong> {{ $empresa->created_at ? $empresa->created_at->format('d/m/Y H:i:s') :  '' }}<br>
                            </p>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')

@endsection