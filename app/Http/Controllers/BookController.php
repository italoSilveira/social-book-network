<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

        return view('book', [
            'book' => $book,
            'categorys' => $categorys,
            'publishers' => $publishers,
            'authors' => $authors
            ]);
    }

    public function getStore($id) {
        $book = BookModel::find($id);
        $authors = AuthorModel::all();
        $categorys = CategoryModel::all();
        $publishers = PublisherModel::all();

        return view('edit-book', [
            'book' => $book,
            'categorys' => $categorys,
            'publishers' => $publishers,
            'authors' => $authors
            ]);
    }


    public function store($id) {
        $book = new BookModel();
        $image = $book->uploadPicture($request);
        if(!!$image){
            $book->image = $image;
        }

        $book->name = $request->name;
        $book->author_id = $request->author;
        $book->category_id = $request->category;
        $book->pub_comp_id = $request->publisher;
        $book->isbn = $request->isbn;
        $book->pages = $request->pages;
        $book->status = 1;
        $book->sinopsis = $request->synopsis;
        $book->edition = $request->edition;
        $book->save();

        $authors = AuthorModel::all();
        $categorys = CategoryModel::all();
        $publishers = PublisherModel::all();

        return view('book', [
            'book' => $book,
            'categorys' => $categorys,
            'publishers' => $publishers,
            'authors' => $authors
            ]);
    }
}
