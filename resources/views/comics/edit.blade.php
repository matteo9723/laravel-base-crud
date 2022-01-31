@extends('layouts.main')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-8 offset-2">
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{  $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h1>Modifica di: {{ $comic->title }}</h1>


                <form action="{{ route('comics.update', $comic) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label">Nome</label>
                        <input type="text" value="{{ old('title', $comic->title) }}" 
                        class="form-control @error('title') is-invalid @enderror" 
                        name="title" id="title" placeholder="Nome fumetto">
                        @error('title')
                        <p class="form_errors">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">tipo</label>
                        <input type="text" value="{{ old('type', $comic->type) }}" 
                        class="form-control @error('type') is-invalid @enderror" 
                        name="type" id="type" placeholder="tipo fumetto">
                        @error('type')
                        <p class="form_errors">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="thumb" class="form-label">immagine</label>
                        <input type="text" value="{{ old('thumb', $comic->thumb) }}" 
                        class="form-control @error('thumb') is-invalid @enderror" 
                        name="thumb" id="thumb" placeholder="immagine fumetto">
                        @error('thumb')
                        <p class="form_errors">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">prezzo</label>
                        <input type="number" value="{{ old('price', $comic->price) }}" 
                        class="form-control @error('price') is-invalid @enderror" 
                        name="price" id="price" placeholder="prezzo fumetto">
                        @error('price')
                        <p class="form_errors">
                            {{ $message }}
                        </p>
                        @enderror
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