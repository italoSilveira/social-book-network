<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index() {
    	$categorys = \App\CategoryModel::all();
    	$publishers = \App\PublisherModel::all();
    	$authors = \App\AuthorModel::all();
    	return view('home', [
    		'categorys' => $categorys,
    		'publishers' => $publishers,
    		'authors' => $authors
    	]);
    }

    public function store(Request $request) {
        $book = new \App\BookModel;
        
        return view('home', [
            'categorys' => $categorys,
            'publishers' => $publishers,
            'authors' => $authors
        ]);
    }
}
