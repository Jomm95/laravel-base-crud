@extends('layouts.base')

@section('pageTitle', 'comics')

@section('content')

<table class="table">
    <thead>
      <tr>
        <th scope="col">Title</th>
        <th scope="col">Description</th>
        <th scope="col">Thumb</th>
        <th scope="col">Price</th>
        <th scope="col">Series</th>
        <th scope="col">Sale Date</th>
        <th scope="col">Type</th>
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
        </tr>
          
      @endforeach

    </tbody>
  </table>

@endsection