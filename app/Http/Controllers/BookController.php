<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Books;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Books::all();

        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'language' => 'required',
            'title' => 'required',
            'author' => 'required',
            'pic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $picName = 'storage/uploads/' . time() . '.' . request()->pic->getClientOriginalExtension();

        request()->pic->move(public_path('/storage/uploads'), $picName);

        $book = new Books([
            'category' => $request->get('category'),
            'language' => $request->get('language'),
            'title' => $request->get('title'),
            'author' => $request->get('author'),
            'pic' => $picName,
            'year' => $request->get('year'),
            'resume' => $request->get('resume'),
            'publisher' => $request->get('publisher'),
            'pages' => $request->get('pages'),
            'rating' => $request->get('rating')
        ]);
        $book->save();
        return redirect('/books')->with('success', 'Book saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $books = Books::find($id);
        return view('books.edit', compact('books'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'language' => 'required',
            'title' => 'required',
            'author' => 'required',
            'pic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $picName = 'storage/uploads/' . time() . '.' . request()->pic->getClientOriginalExtension();

        request()->pic->move(public_path('/storage/uploads'), $picName);


        $book = Books::find($id);
        $book->category = $request->get('category');
        $book->language = $request->get('language');
        $book->title = $request->get('title');
        $book->author = $request->get('author');
        $book->pic = $picName;
        $book->year = $request->get('year');
        $book->resume = $request->get('resume');
        $book->publisher = $request->get('publisher');
        $book->pages = $request->get('pages');
        $book->rating = $request->get('rating');
        $book->save();

        return redirect('/books')->with('success', 'Book updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $books = Books::find($id);
        $books->delete();

        return redirect('/books')->with('success', 'Book deleted!');
    }
}
