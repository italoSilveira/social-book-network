@extends('layouts.base')
@section('body')
<div class="container">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="index.html">Home</a>
    </li>
    <li class="breadcrumb-item"><a href="index.html">Books</a></li>
    <li class="breadcrumb-item atice">{{$book->name}}</li>
  </ol>
  <div class="row">
    <div class="col-md-4">
      <div class="row">
        <img class="img-fluid" src="{{ url("storage/book/{$book->image}") }}" style="width: 400px; height: 650px" alt="{{$book->name}}">
      </div>
      <div class="row">
        <div class="col-md-10">
          <div class="card my-4">
            <h5 class="card-header">About</h5>
            <div class="card-body">
              <table class="table">
                <tbody>
                  <tr>
                    <th scope="row">Author</th>
                    <td>{{$book->author->name}}</td>
                  </tr>
                  <tr>
                    <th scope="row">Categoy</th>
                    <td>{{$book->category->name}}</td>
                  </tr>
                  <tr>
                    <th scope="row">Pages</th>
                    <td>{{$book->pages}}</td>
                  </tr>
                  <tr>
                    <th scope="row">Publisher</th>
                    <td>{{$book->publisher->name}}</td>
                  </tr>
                  <tr>
                    <th scope="row">ISBN</th>
                    <td>{{$book->isbn}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-8">
      <h3 class="my-3">{{$book->name}}</h3>
      <p style="text-align: justify">{{$book->sinopsis}}</p>
      </div>

    </div>
    <!-- /.row -->

    <!-- Related Projects Row -->
    <h3 class="my-4">Related Projects</h3>

    <div class="row">

      <div class="col-md-3 col-sm-6 mb-4">
        <a href="#">
          <img class="img-fluid" src="http://placehold.it/500x300" alt="">
        </a>
      </div>

      <div class="col-md-3 col-sm-6 mb-4">
        <a href="#">
          <img class="img-fluid" src="http://placehold.it/500x300" alt="">
        </a>
      </div>

      <div class="col-md-3 col-sm-6 mb-4">
        <a href="#">
          <img class="img-fluid" src="http://placehold.it/500x300" alt="">
        </a>
      </div>

      <div class="col-md-3 col-sm-6 mb-4">
        <a href="#">
          <img class="img-fluid" src="http://placehold.it/500x300" alt="">
        </a>
      </div>

    </div>
  </div>
  <style type="text/css">
    .table th, .table td{
      border-top: 0px !important;
    }
    .card-header{
      text-align: center;
    }

    h3{
      margin-top: -1%;
    }
  </style>
  @endsection