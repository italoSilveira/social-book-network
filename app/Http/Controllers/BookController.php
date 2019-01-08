<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\BookModel;
use App\CategoryModel;
use App\AuthorModel;
use App\PublisherModel;

class BookController extends Controller
{
    public function index() {
    }

    public function create() {
        $book = new BookModel();
        $authors = AuthorModel::all();
        $categorys = CategoryModel::all();
        $publishers = PublisherModel::all();

        $book->image = 'default.jpg';

        return view('book.create', compact('book', 'categorys', 'publishers', 'authors'));
    }

    public function show(BookModel $book) {
        
        return view('book.show', compact('book'));
    }

    public function edit(BookModel $book) {        
        if(!$book){
            return redirect('/home');
        }

        $authors = AuthorModel::all();
        $categorys = CategoryModel::all();
        $publishers = PublisherModel::all();

        return view('book.edit', compact('book', 'categorys', 'publishers', 'authors'));
    }


    public function store(Request $request) {
        $validatedData = $request->validate([
            'file' => 'required',
            ]);

        $book = new BookModel();
        $image = $book->uploadPicture($request);
        if(!!$image){
            $book->image = $image;
        }else{
            //message error here
        }

        $book->name = $request->name;
        $book->author_id = $request->author;
        $book->category_id = $request->category;
        $book->publisher_id = $request->publisher;
        $book->isbn = $request->isbn;
        $book->pages = $request->pages;
        $book->status = 1;
        $book->sinopsis = $request->synopsis;
        $book->edition = $request->edition;
        $book->save();

        return redirect('book/'.$book->id);
    }

    public function update(Request $request, BookModel $book) {
        $image = $book->uploadPicture($request);
        if(!!$image){
            $book->image = $image;
        }else{
            //
        }

        $book->name = $request->name;
        $book->author_id = $request->author;
        $book->category_id = $request->category;
        $book->publisher_id = $request->publisher;
        $book->isbn = $request->isbn;
        $book->pages = $request->pages;
        $book->status = 1;
        $book->sinopsis = $request->synopsis;
        $book->edition = $request->edition;
        $book->save();

        $authors = AuthorModel::all();
        $categorys = CategoryModel::all();
        $publishers = PublisherModel::all();

        return redirect('book/'.$book->id);
    }
}
