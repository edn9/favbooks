@extends('base')

@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Add a book</h1>
        <form method="get" action="/books">
            <button style="margin: 19px;" type="submit" class="btn btn-light">Voltar</button>
        </form>
        <div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
            @endif
            <form action="{{ route('books.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" name="title" />
                </div>

                <div class="form-group">
                    <label for="author">Author:</label>
                    <input type="text" class="form-control" name="author" />
                </div>

                <div class="form-group">
                    <label for="pic">Cover:</label>
                    <input type="file" class="form-control" name="pic" />
                </div>

                <div class="form-group">
                    <label for="year">Year:</label>
                    <input type="text" class="form-control" name="year" />
                </div>

                <div class="form-group">
                    <label for="language">Language:</label>
                    <input type="text" class="form-control" name="language" />
                </div>

                <div class="form-group">
                    <label for="category">Category:</label>
                    <input type="text" class="form-control" name="category" />
                </div>

                <div class="form-group">
                    <label for="resume">Resume:</label>
                    <textarea class="form-control" name="resume" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label for="publisher">Publisher:</label>
                    <input type="text" class="form-control" name="publisher" />
                </div>
                <div class="form-group">
                    <label for="pages">Pages:</label>
                    <input type="text" class="form-control" name="pages" />
                </div>

                <div class="form-group">
                    <label for="rating">Rating:</label>
                    <select name="rating" class="form-control">
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                        <option value="4">Four</option>
                        <option value="5">Five</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary-outline">Add book</button>
            </form>
        </div>
    </div>
</div>

@endsection
