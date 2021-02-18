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
                            <label for="slug" class="col-md-4 col-form-label text-md-right">{{ __('Slug*') }}</label>

                            <div class="col-md-6">
                                <input id="slug" type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ old('slug') }}" required autocomplete="slug" autofocus>

                                @error('slug')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="authors" class="col-md-4 col-form-label text-md-right">{{ __('Authors (comma separated)*') }}</label>

                            <div class="col-md-6">
                                <input id="authors" type="text" class="form-control @error('authors') is-invalid @enderror" name="authors" value="{{ old('authors') }}" required autocomplete="authors">

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

                                <div class="form-check mr-auto">
                                    <input class="form-check-input" type="checkbox" name="genres[]" value="{{ $genre->id }}" id="genres" @if (in_array($genre->id, old('genres', []))) checked @endif>

                                    <label class="form-check-label" for="genres">
                                        {{ $genre->name }}
                                    </label>
                                </div>


                            @endforeach

                                @error('genres')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                      <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description*') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" class="form-control" id="description" rows="3" required autocomplete="new-description">{{ old('description') }}</textarea>

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
                                <input id="price" type="number" class="form-control" name="price" value="{{ old('price') }}" required autocomplete="new-price">
                            </div>

                        </div>

                <div class="form-group row">
                    <label for="cover" class="col-md-4 col-form-label text-md-right">{{ __('Cover Photo') }}</label>

                    <div class="col-md-6">
                        <!--<input id="cover" type="file" class="form-control" name="cover"> -->
                        <input type="file" id="cover" class="custom-file-input" id="cover">
                        <label class="custom-file-label" for="customFile">Choose file</label>
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

