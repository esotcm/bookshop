@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add a new book') }}</div>

                <div class="card-body">

                    <form method="POST" action="{{ route('user.books.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title*') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="authors" class="col-md-4 col-form-label text-md-right">{{ __('Authors (comma separated)*') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('authors') is-invalid @enderror" name="email" value="{{ old('authors') }}" required autocomplete="authors">

                                @error('authors')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="genres" class="col-md-4 col-form-label text-md-right">{{ __('Genres*') }}</label>

                            @foreach ($genres as $genre)
                                <input class="form-check-input" type="checkbox" name="genres[]" value="{{ $genre->id }}" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    {{ $genre->name }}
                                </label>
                            @endforeach

                                @error('genres')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description*') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="textarea" class="form-control @error('description') is-invalid @enderror" name="description" :value="old('description')"  required autocomplete="new-description">


                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price*') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="number" class="form-control" name="price" required autocomplete="new-price">
                            </div>

                        </div>

                <div class="form-group row">
                    <label for="cover" class="col-md-4 col-form-label text-md-right" :value="__('Cover Photo')"></label>

                    <div class="col-md-6">
                        <input id="cover" type="file" class="form-control" name="cover">
                    </div>

                </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save Book') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
