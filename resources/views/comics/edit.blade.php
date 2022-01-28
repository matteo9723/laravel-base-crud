@extends('layouts.main')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-8 offset-2">
            <h1>Modifica di: {{ $comic->title }}</h1>


                <form action="{{ route('comics.update', $comic) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label">Nome</label>
                        <input type="text" value="{{ $comic->title }}" class="form-control" name="title" id="title" placeholder="Nome fumetto">
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Tipo</label>
                        <input type="text" value="{{ $comic->type }}" class="form-control" name="type" id="type" placeholder="Tipo di fumetto">
                    </div>
                    <div class="mb-3">
                        <label for="thumb" class="form-label">Immagine</label>
                        <input type="text" value="{{ $comic->thumb }}" class="form-control" name="thumb" id="thumb" placeholder="URL immagine">
                    </div>
                    <div class="mb-3">
                        <label for="series" class="form-label">Tempo di cottura</label>
                        <input  value="{{ $comic->series}}" type="number" class="form-control" name="series" id="series" >
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Descizione</label>
                        <textarea type="number" class="form-control" name="description" id="description" >
                            {{ $comic->description }}
                        </textarea>
                    </div>

                    <button type="submit" class="btn btn-primary" >Invia</button>
                    <button type="reset" class="btn btn-secondary" >Reset</button>


                </form>





            </div>
    </div>


</div>

@endsection