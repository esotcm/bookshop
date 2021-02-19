@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>books</h2>
            </div>
            <div class="pull-right">
                @can('book-create')
                    <a class="btn btn-success" href="{{ route('books.create') }}"> Create New book</a>
                @endcan
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($books as $book)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $book->name }}</td>
                <td>{{ $book->detail }}</td>
                <td>
                    <form action="{{ route('books.destroy',$book->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('books.show',$book->id) }}">Show</a>
                        @can('book-edit')
                            <a class="btn btn-primary" href="{{ route('books.edit',$book->id) }}">Edit</a>
                        @endcan
                        @csrf
                        @method('DELETE')
                        @can('book-delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        @endcan
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {!! $books->links() !!}
@endsection
