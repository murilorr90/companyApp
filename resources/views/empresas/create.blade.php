@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Empresas<small> - Criar</small></div>

                    <div class="card-body">
                        {{ Html::ul($errors->all()) }}

                        {{ Form::model(null, array('route' => array('empresas.store'), 'method' => 'POST', 'files' => true)) }}
                        <div class="form-group">
                            {{ Form::label('nome', 'Nome') }}
                            {{ Form::text('nome', null, array('class' => 'form-control', 'required')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('email', 'Email') }}
                            {{ Form::email('email', null, array('class' => 'form-control', 'required')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('website', 'Website') }}
                            {{ Form::text('website', null, array('class' => 'form-control', 'required')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::file('logo', null, array('class' => 'form-control', 'required')) }}
                        </div>

                        {{ Form::submit('Salvar', array('class' => 'btn btn-success')) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection