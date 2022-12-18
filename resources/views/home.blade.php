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
        <button type="button" class="btn btn-primary mb-3" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
            Add New Data
        </button>

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

        <table class="table align-middle mb-0 bg-white">
            <thead class="bg-light">
                <tr>
                    <th>{{ __('ID') }}</th>
                    <th>{{ __('Product Name')  }}</th>
                    <th>{{ __('Product Image') }}</th>
                    <th>{{ __('Action') }}</th>
                </tr>
            </thead>
            <tbody>
               @foreach($products as $key=>$product)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $product->name }}</td>
                    <td><img src="{{ asset('images/'.$product->image) }}" style="width: 80px; height: 60px;" alt=""></td>
                    <td>
                        <!-- <a href="">
                            <button type="button" class="btn btn-primary btn-sm btn-rounded">Show</button>
                        </a> -->

                        <a href="{{ route('edit.product',$product->id) }}">
                            <button type="button" class="btn btn-success btn-sm btn-rounded">Edit</button>
                        </a>

                        <a href="{{ route('delete.product',$product->id) }}" onclick="return confirm('Are you sure to delete?')">
                            <button type="button" class="btn btn-danger btn-sm btn-rounded">Delete</button>
                        </a>
                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>



        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                   
                    <form action="{{ route('store.product') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add New Data</h5>
                            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label" for="form12">Product Name</label>
                                <input type="text" id="form12" name="name" value="" class="form-control" required/>
                            </div>
                           
                            <div class="mb-3">
                                <label class="form-label" for="form12">Product Image</label>
                                <input type="file" id="form12" name="image" value="" class="form-control" required/> 
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>



<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.js"
></script>
        
    </body>
</html>
