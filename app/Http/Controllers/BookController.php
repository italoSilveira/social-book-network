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
    // 	$categorys = \App\CategoryModel::all();
    // 	$publishers = \App\PublisherModel::all();
    // 	$authors = \App\AuthorModel::all();
    // 	return view('book', [
    // 		'categorys' => $categorys,
    // 		'publishers' => $publishers,
    // 		'authors' => $authors
    // 	]);
    }

    public function create() {
        $book = new BookModel();
        $authors = AuthorModel::all();
        $categorys = CategoryModel::all();
        $publishers = PublisherModel::all();

        $book->image = 'default.jpg';

        return view('book.create', [
            'book' => $book,
            'categorys' => $categorys,
            'publishers' => $publishers,
            'authors' => $authors
            ]);
    }

    public function show($id) {
        $book = BookModel::find($id);

        return view('book.show', [
            'book' => $book
            ]);
    }

    public function edit($id) {
        $book = BookModel::find($id);
        
        if(!$book){
            return redirect('/home');
        }

        $authors = AuthorModel::all();
        $categorys = CategoryModel::all();
        $publishers = PublisherModel::all();

        return view('book.edit', [
            'book' => $book,
            'categorys' => $categorys,
            'publishers' => $publishers,
            'authors' => $authors
            ]);
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

        $authors = AuthorModel::all();
        $categorys = CategoryModel::all();
        $publishers = PublisherModel::all();

        return redirect('book/'.$book->id);
    }

    public function update(Request $request, $id) {
        $book = BookModel::find($id);
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

        return redirect('book/'.$id);
    }
}
