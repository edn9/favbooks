@extends('base')
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-6">Editar {{$books->title}}</h1>
        <form method="get" action="/books">
            <button style="margin: 19px;" type="submit" class="btn btn-primary-outline">Voltar</button>
        </form>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br />
        @endif
        <form method="post" action="{{ route('books.update', $books->id) }}" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" name="title" value="{{ $books->title }}" />
            </div>

            <div class="form-group">
                <label for="author">Author:</label>
                <input type="text" class="form-control" name="author" value="{{ $books->author }}" />
            </div>

            <div class="form-group">
                <label for="pic">Cover:</label>
                <input type="file" class="form-control" name="pic" />
            </div>

            <div class="form-group">
                <label for="year">Year:</label>
                <input type="text" class="form-control" name="year" value="{{ $books->year }}" />
            </div>

            <div class="form-group">
                <label for="language">Language:</label>
                <input type="text" class="form-control" name="language" value="{{ $books->language }}" />
            </div>

            <div class="form-group">
                <label for="category">Category:</label>
                <input type="text" class="form-control" name="category" value="{{ $books->category }}" />
            </div>

            <div class="form-group">
                <label for="resume">Resume:</label>
                <input type="text" class="form-control" name="resume" value="{{ $books->resume }}" />
            </div>
            <div class="form-group">
                <label for="publisher">Publisher:</label>
                <input type="text" class="form-control" name="publisher" value="{{ $books->publisher }}" />
            </div>
            <div class="form-group">
                <label for="pages">Pages:</label>
                <input type="text" class="form-control" name="pages" value="{{ $books->pages }}" />
            </div>
            <div class="form-group">
                <label for="rating">Rating:</label>
                <input type="text" class="form-control" name="rating" value="{{ $books->rating }}" />
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>

    </div>
</div>
@endsection
