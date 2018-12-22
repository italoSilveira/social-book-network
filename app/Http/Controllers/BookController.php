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
        $authors = AuthorModel::all();
        $categorys = CategoryModel::all();
        $publishers = PublisherModel::all();

        return view('book', [
            'categorys' => $categorys,
            'publishers' => $publishers,
            'authors' => $authors
            ]);
    }

    public function store(Request $request) {
        $book = new BookModel();
        $book->image = $book->uploadPicture($request);
        if(!!$book->image){
            dd('Deu certo');
        }else{
            dd('Not so much');
        }
    }
}
