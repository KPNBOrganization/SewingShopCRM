@extends( 'environment' )

@section( 'content' )

    <div class="row">

        <div class="col-md-6">

            <h1 class="mb-4">
                Products & Services
            </h1>

        </div>

        <div class="col-md-6">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-end bg-white">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="/products-services">Products & Services</a></li>
                </ol>
            </nav>

        </div>

    </div>

    <div class="row">

        <div class="col-md-12">

            <form action="" method="post">

                @csrf

                <div class="form-group">
                    <label for="inputArticle">Article</label>
                    <input type="text" name="article" value="{{ @$article }}" class="form-control" id="inputArticle" placeholder="Enter Article">
                </div>

                <div class="form-group">
                    <label for="inputName">Name</label>
                    <input type="text" name="name" value="{{ @$name }}" class="form-control" id="inputName" placeholder="Enter Name">
                </div>

                <div class="form-group">
                    <label for="inputDescription">Description</label>
                    <input type="text" name="description" value="{{ @$description }}" class="form-control" id="inputDescription" placeholder="Enter Description">
                </div>

                <div class="form-group">
                    <label for="inputPrice">Price</label>
                    <input type="number" name="price" value="{{ @$price }}" class="form-control" id="inputPrice" placeholder="Enter Price" min="0" step="0.01">
                </div>

                <div class="form-group">
                    <label for="inputQuantity">Quantity</label>
                    <input type="number" name="quantity" value="{{ @$quantity }}" class="form-control" id="inputQuantity" placeholder="Enter Quantity" min="0">
                </div>

                @if( request()->id == 'create' )
                    <button type="submit" class="btn btn-primary mb-3">Create</button>
                @else
                    <button type="submit" class="btn btn-primary mb-3">Update</button>
                    <button type="button" class="btn btn-danger mb-3" data-toggle="modal" data-target="#confirmModal">Delete</button>
                @endif

                @if ( $errors->any() )

                    @foreach ( $errors->all() as $error )

                        <div class="alert alert-danger">
                            {{ $error }}
                        </div>

                    @endforeach

                @endif

            </form>

        </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Confirm Action</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <div class="modal-body">
                    Are you sure you want to delete this entity?
                </div>
                
                <div class="modal-footer">

                    <form action="" method="post">
                        
                        @method( 'DELETE' )
                        @csrf

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>

                    </form>

                </div>
            
            </div>
        </div>
    </div>

@endsection