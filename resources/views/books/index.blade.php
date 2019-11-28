@extends('base')

@section('main')
<style>
    .pic {
        width: 120px;
        height: 180px;
    }
</style>
<div class="col-sm-12">

    @if(session()->get('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif
</div>

<div class="row">
    <div class="col-sm-12">
        <h1 class="display-6">My favourite Books!</h1>

        <div>
            <form method="get" action="/" class="form-inline">
                <button style="margin: 19px;" type="submit" class="btn btn-primary-outline">Voltar</button>
                <a style="margin: 19px;" href="{{ route('books.create')}}" class="btn btn-primary">New book</a>
            </form>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <td>Pic</td>
                    <td>Title</td>
                    <td>Author</td>
                    <td>Year</td>
                    <td>Language</td>
                    <td>Publisher</td>
                    <td>Pages</td>
                    <td>Rating</td>
                    <td colspan=2>Actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                <tr>
                    <td>
                        <a href="#" data-toggle="modal" data-target="#{{$book->id}}">
                            <img class="pic" src="{{ url($book->pic) }}" alt="{{ $book->title }}">
                        </a>

                        <div class="modal fade" id="{{$book->id}}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <img style="display: block; margin-left: auto; margin-right: auto;"
                                            src="{{ url($book->pic) }}" alt="{{ $book->title }}" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>{{$book->title}}</td>
                    <td>{{$book->author}}</td>
                    <td>{{$book->year}}</td>
                    <td>{{$book->language}}</td>
                    <td>{{$book->publisher}}</td>
                    <td>{{$book->pages}}</td>
                    <td>{{$book->rating}}</td>
                    <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#t{{$book->id}}">
                            Detalhes
                        </button>

                        <div class="modal fade" id="t{{$book->id}}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">{{$book->title}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        {{$book->resume}}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a href="{{ route('books.edit',$book->id)}}" class="btn btn-primary">Edit</a>

                        <form action="{{ route('books.destroy', $book->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div>
        </div>

        @endsection
