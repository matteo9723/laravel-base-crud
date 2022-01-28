@extends('layouts.main')

@section('content')
  

<div class="container">
  <h1>Elenco fumetti</h1>
  <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nome</th>
          <th scope="col">Tipo</th>
          <th colspan="3" scope="col">Azioni</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($comics as $comic)
              <tr>
                  <th scope="row">{{ $comic->id }}</th>
                  <td>{{ $comic->title }}</td>
                  <td>{{ $comic->type }}</td>
                  <td><a href="{{ route('comics.show', $comic) }}" class="btn btn-success">SHOW</a></td>
                  <td><a href="{{ route('comics.edit', $comic) }}" class="btn btn-primary">EDIT</a></td>

                  <td>
                    <form action="{{ route('comics.destroy', $comic) }}" method="POST">
                      @csrf
                      @method('DELETE')

                      <button type="submit" class="btn btn-danger">DELETE</button></td>
                  </form>
                  </td>
              </tr>
          @endforeach


      </tbody>
    </table>
</div>
<div class="container">
  {{ $comics->links() }}
</div>

@endsection
