@extends('layouts.base')

@section('pageTitle', '{{$comic->title}}')

@section('content')

    <div class="container">
        <h1>{{$comic->title}}</h1>

        <div>Tipo: {{$comic->type}}</div>
        <div>Serie: {{$comic->series}}</div>
        <div>Prezzo: {{$comic->price}}</div>
        <div>Data uscita: {{$comic->sale_date}}</div>
        <div>Descrizione: {!! $comic->description !!}</div>

        <a class="btn btn-primary mt-4" href="{{route('comic.index')}}" role="button">Torna alla lista</a>

    </div>

@endsection