<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel CRUD</title>

        <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        rel="stylesheet"
        />
        <!-- Google Fonts -->
        <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
        rel="stylesheet"
        />
        <!-- MDB -->
        <link
        href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.css"
        rel="stylesheet"
        />
    </head>
    <body>


    <div class="container mt-3">

        <!-- Button trigger modal -->
        <a href="/">
        <button type="button" class="btn btn-primary mb-3">
           All Product
        </button>
        </a>

                         @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if(Session::has('msg'))
                            <p class="alert alert-success">{{ Session::get('msg') }}</p>
                        @endif



                <div class="card p-4">
                   
                    <form action="{{ route('update.product',$product->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="">
                            <h5 class="modal-title" id="exampleModalLabel">Add New Data</h5>
                           
                        </div>
                        <div class="">
                            <div class="mb-3">
                                <label class="form-label" for="form12">Product Name</label>
                                <input type="text" id="form12" name="name" value="{{ $product->name }}" class="form-control" required/>
                            </div>
                           
                            <div class="mb-3">
                                <label class="form-label" for="form12">Product Image</label>
                                <img src="{{ asset('images/'.$product->image) }}" style="width: 80px; height: 60px;" alt="">
                                <input type="file" id="form12" name="image" value="" class="form-control" /> 
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
      

    </div>



<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.js"
></script>
        
    </body>
</html>
