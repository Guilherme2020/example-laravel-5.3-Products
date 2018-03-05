
@extends('layout.app')
@section('titulo','Alterar Produto: '. $produto->titulo)
@section('content')

    <h1>Alterar Produto</h1>
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)

                    <li>{{$error}}</li>

                @endforeach
            </ul>
        </div>
    @endif

    @if(Session::has('mensagem'))
        <div class="alert alert-sucess">
            {{Session::get('mensagem')}}
        </div>
    @endif

    {{Form::open(['route'=> ['produtos.update',$produto->id],'enctype'=>'multipart/form-data','method'=>'PUT'])}}
        {{Form::label('referencia','Referencia',['class'=> 'prettyLabels'])}}
        {{Form::text('referencia',$produto->referencia,['class'=> 'form-control','required',
            'placeholder'=>'Referência'])}}
        {{Form::label('titulo','Titulo')}}
        {{Form::text('titulo',$produto->titulo,['class'=>'form-control','required','placeholder'=> 'Titulo'])}}
        {{Form::label('descricao','Descricao')}}

        {{Form::text('descricao',$produto->descricao,['rows'=> 3,
            'class'=> 'form-control','required','placeholder'=> 'Descrição'])}}
        {{Form::label('preco',"Preço")}}
        {{Form::text('preco',$produto->preco,['class'=>'form-control','required','placeholder'=>'Preço'])}}

        {{Form::label('fotoproduto','Foto')}}
        {{Form::file('fotoproduto',['class'=>'form-control','id'=>'fotoproduto'])}}
        <br />
        {{Form::submit('Alterar',['class'=>'btn btn-default'])}}

    {{Form::close()}}
    
    {{--<a href="javascript:history.go(-1)">Voltar</a>--}}
    <a href="{{url('produtos')}}">Voltar</a>

@endsection