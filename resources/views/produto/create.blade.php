@extends('layout.app')
@section('title','Adicionar Produto')


@section('content')

    <h1>Criar um novo Produto</h1>
    @if(count($errors) >0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)

                    <li>{{$error}}</li>

                @endforeach
            </ul>
        </div>

    @endif
    {{Form::open(['action' => 'ProdutosController@store'])}}
        {{Form::label('referencia','Referência',['class'=>'prettyLabels'])}}
        {{Form::text('referencia','',['class'=>'form-control','required','placeholder'=>'Referência'])}}
        {{Form::label('titulo', 'Título')}}
        {{Form::text('titulo','',['class'=>'form-control','required','placeholder'=>'Título'])}}
        {{Form::label('descricao', 'Descrição')}}
        {{Form::textarea('descricao','',['rows'=>3,'class'=>'form-control','required','placeholder'=>'Descrição'])}}
        {{Form::label('preco', 'Preço')}}
        {{Form::text('preco','',['class'=>'form-control','required','placeholder'=>'Preço'])}}
        <br/>
        {{Form::submit('Cadastrar!',['class'=>'btn btn-default'])}}
    {{Form::close()}}
    {{--<a href="javascript:history.go(-1)">Voltar</a>--}}

    <a href="{{url('produtos')}}">Voltar</a>

@endsection