  @extends('base')
  @section('body')
  <div class="container">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.html">Home</a>
      </li>
      <li class="breadcrumb-item"><a href="index.html">Books</a></li>
      <li class="breadcrumb-item atice">Let's go store a new book!</li>
    </ol>
    <form method="post" action="/book/edit/{{$book->id}}" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col-md-4">
          <div class="row">
           <div class="d-flex justify-content-start">
            <div class="image-container">
              <img id="imgProfile" src="{{ url("storage/book/{$book->image}") }}" style="width: 400px; height: 650px" class="img-thumbnail" />
              <div class="middle">
                <input type="button" class="btn btn-secondary" id="btnChangePicture" value="Change" />
                <input type="file" style="display: none;" id="profilePicture" name="file" />
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card my-4">
              <h5 class="card-header">About</h5>
              <div class="card-body">
                <table class="table">
                  <tbody>
                    <tr>
                      <th scope="row">Author</th>
                      <td><select class="form-control" name="author">
                        @foreach ($authors as $author)
                        @if($author->id == $book->author_id)
                        <option selected value="{{$author->id}}">{{$author->name}}</option>
                        @else
                        <option value="{{$author->id}}">{{$author->name}}</option>
                        @endif  
                        @endforeach
                      </select></td>
                    </tr>
                    <tr>
                      <th scope="row">Category</th>
                      <td><select class="form-control" name="category">
                        @foreach ($categorys as $category)
                        @if($category->id == $book->category_id)
                        <option selected value="{{$category->id}}">{{$category->name}}</option>
                        @else
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endif
                        @endforeach
                      </select></td>
                    </tr>
                    <tr>
                      <th scope="row">Pages</th>
                      <td><input type="number" class="form-control" name="pages" value="{{$book->pages}}"></td>
                    </tr>
                    <tr>
                      <th scope="row">Publisher</th>
                      <td><select class="form-control" name="publisher">
                        @foreach ($publishers as $publisher)
                        @if($publisher->id == $book->pub_comp_id)
                        <option selected value="{{$publisher->id}}">{{$publisher->name}}</option>
                        @else
                        <option value="{{$publisher->id}}">{{$publisher->name}}</option>
                        @endif
                        @endforeach
                      </select></td>
                    </tr>
                    <tr>
                      <th scope="row">Edition</th>
                      <td><input type="text" class="form-control" name="edition" value="{{$book->edition}}"></td>
                    </tr>
                    <tr>
                      <th scope="row">ISBN</th>
                      <td><input type="text" class="form-control" name="isbn" value="{{$book->isbn}}"></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="row">
          <div  class="col-md-11">
            <input type="text" class="form-control" name="name" placeholder="Book's name" value="{{$book->name}}">
          </div>
          <div class="col-md-1">
            <button class="btn btn-primary" type="submit">
              <span class="fa fa-save"></span>
            </button>
          </div>
        </div><br>
        <textarea class="form-control" rows="47" placeholder="Synopsis" name="synopsis" >{{$book->sinopsis}}</textarea>
      </div>
    </form>
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
<script type="text/javascript">
  $(document).ready(function () {
    $imgSrc = $('#imgProfile').attr('src');
    function readURL(input) {

      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
          $('#imgProfile').attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
      }
    }
    $('#btnChangePicture').on('click', function () {
                  // document.getElementById('profilePicture').click();
                  if (!$('#btnChangePicture').hasClass('changing')) {
                    $('#profilePicture').click();
                  }
                  else {
                      // change
                    }
                  });
    $('#profilePicture').on('change', function () {
      readURL(this);
    });
  });
</script>
<style type="text/css">
  .table th, .table td{
    border-top: 0px !important;
  }
  .card-header{
    text-align: center;
  }

  .image-container {
    position: relative;
  }

  .image {
    opacity: 1;
    display: block;
    width: 100%;
    height: auto;
    transition: .5s ease;
    backface-visibility: hidden;
  }

  .middle {
    transition: .5s ease;
    opacity: 0;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    text-align: center;
  }

  .image-container:hover .image {
    opacity: 0.3;
  }

  .image-container:hover .middle {
    opacity: 1;
  }
</style>
@endsection