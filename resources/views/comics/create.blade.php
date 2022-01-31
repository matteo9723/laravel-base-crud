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

            <h1>Nuovi fumetti</h1>


                <form action="{{ route('comics.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Nome</label>
                        <input type="text" 
                        class="form-control @error('title') is-invalid @enderror" 
                        value="{{old('title')}}"
                        name="title" id="title" placeholder="Nome fumetto">
                        @error('title')
                            <p class="form_errors">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">tipo</label>
                        <input type="text" 
                        class="form-control @error('type') is-invalid @enderror" 
                        value="{{old('type')}}"
                        name="type" id="type" placeholder="tipo di fumetto">
                        @error('type')
                            <p class="form_errors">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="thumb" class="form-label">immagine</label>
                        <input type="text" 
                        class="form-control @error('thumb') is-invalid @enderror" 
                        value="{{old('thumb')}}"
                        name="thumb" id="thumb" placeholder="immagine fumetto">
                        @error('thumb')
                            <p class="form_errors">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">prezzo</label>
                        <input type="number" 
                        class="form-control @error('price') is-invalid @enderror" 
                        value="{{old('price')}}"
                        name="price" id="price" placeholder="prezzo fumetto">
                        @error('price')
                            <p class="form_errors">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                   
                
                    <div class="mb-3">
                        <label for="series" class="form-label">serie</label>
                        <input type="number" class="form-control" name="series" id="series" >
                    </div>
                   
                    <div class="mb-3">
                        <label for="sale_date" class="form-label">sale_date</label>
                        <input type="number" class="form-control" name="sale_date" id="sale_date" >
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione</label>
                        <textarea type="number" class="form-control" name="description" id="description" ></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary" >Invia</button>
                    <button type="reset" class="btn btn-secondary" >Reset</button>


                </form>





            </div>
    </div>


</div>

@endsection
