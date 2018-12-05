@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Funcionarios<small> - Editar</small></div>

                    <div class="card-body">
                        {{ Html::ul($errors->all()) }}

                        {{ Form::model($funcionario, array('route' => array('funcionarios.update', $funcionario->id), 'method' => 'PUT', 'files' => true)) }}
                            <div class="form-group">
                                {{ Form::label('empresa_id', 'Empresa') }}
                                {{ Form::select('empresa_id', \App\Models\Empresa::orderBy('nome')->pluck('nome','id'), null, array('class' => 'form-control', 'required')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('nome', 'Nome') }}
                                {{ Form::text('nome', null, array('class' => 'form-control', 'required')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('email', 'Email') }}
                                {{ Form::email('email', null, array('class' => 'form-control', 'required')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('cpf', 'CPF') }}
                                {{ Form::text('cpf', null, array('class' => 'form-control cpf', 'required')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('telefone', 'Telefone') }}
                                {{ Form::text('telefone', null, array('class' => 'form-control phone', 'required')) }}
                            </div>
                            {{ Form::submit('Salvar', array('class' => 'btn btn-success')) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection