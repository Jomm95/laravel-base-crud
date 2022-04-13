@extends('layouts.base')

@section('pageTitle', 'comics')

@section('content')


    <div class="container">

        <h1>Lista dei Fumetti</h1>

        <a class="btn btn-secondary" href="{{route('comic.create') }}" role="button">Crea nuovo fumetto</a>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Type</th>
                <th scope="col">Description</th>
                <th scope="col">Thumb</th>
                <th scope="col">Price</th>
                <th scope="col">Series</th>
                <th scope="col">Sale Date</th>
                <th scope="col">Azioni</th>
            </tr>
            </thead>
            <tbody>

            @foreach ($comics as $comic )
                
                <tr>
                    <td>{{$comic->id}}</td>
                    <td>{{$comic->title}}</td>
                    <td>{{$comic->type}}</td>
                    <td>{{$comic->description}}</td>
                    <td><img src="{{$comic->thumb}}" alt=""></td>
                    <td>{{$comic->price}} €</td>
                    <td>{{$comic->series}}</td>
                    <td>{{$comic->sale_date}}</td>
                    <td>
                        <a class="btn btn-primary" href="{{route('comic.show', $comic->id) }}" role="button">Vedi</a>
                        <a class="btn btn-warning" href="{{route('comic.edit', $comic->id) }}" role="button">Modifica</a>
                        <form method="POST" action="{{route('comic.destroy', ['comic' => $comic->id])}}">
                        
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Elimina</button>
                        
                        </form>
                    </td>
                </tr>
                
            @endforeach

            </tbody>
        </table>
    </div>

@endsection