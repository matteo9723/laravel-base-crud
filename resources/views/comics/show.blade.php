@extends('layouts.main')

@section('content')

<div class="container">
  <h1>{{$comic->title}}</h1>
  <p>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore maiores voluptas cupiditate? Eveniet ad deleniti nam reiciendis possimus dolorum ipsum labore, cumque provident consequatur, dolor impedit veritatis. Quam, nesciunt nulla!
  </p>
</div>

<div class="container">
  <a href="{{route('comics.index')}}">torna indietro</a>
</div>
  
@endsection