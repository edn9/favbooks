@extends('base')
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-6">Editar {{$books->title}}</h1>
        <form method="get" action="/books">
            <button style="margin: 19px;" type="submit" class="btn btn-light">Voltar</button>
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
                <textarea class="form-control" name="resume" id="resume" rows="3">{{ $books->resume }}</textarea>
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
                <select name="rating" value="{{ $books->rating }}" class="form-control">
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                    <option value="4">Four</option>
                    <option value="5">Five</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
