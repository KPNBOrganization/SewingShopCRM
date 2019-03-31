@extends( 'environment' )

@section( 'content' )

    <div class="row">

        <div class="col-md-6">

            <h1 class="mb-4">
                Managers
            </h1>

        </div>

        <div class="col-md-6">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-end bg-white">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="/managers">Managers</a></li>
                </ol>
            </nav>

        </div>

    </div>

    <div class="row">

        <div class="col-md-12">

            <form action="" method="post">

                @csrf

                <div class="form-group">
                    <label for="inputUsername">Username</label>
                    <input type="text" name="Username" value="{{ @$manager->Username }}" class="form-control" id="inputUsername" placeholder="Enter Username">
                </div>

                <div class="form-group">
                    <label for="inputPassword">Password</label>
                    <input type="password" name="Password" class="form-control" id="inputPassword" placeholder="Password">
                </div>

                <div class="form-group">
                    <label for="inputEmail">Email</label>
                    <input type="email" name="Email" value="{{ @$manager->Email }}" class="form-control" id="inputEmail" placeholder="Enter Email">
                </div>

                <div class="form-group">
                    <label for="inputPhone">Phone</label>
                    <input type="text" name="Phone" value="{{ @$manager->Phone }}" class="form-control" id="inputPhone" placeholder="Enter Phone">
                </div>

                <div class="form-group">
                    <label for="inputFullname">Full name</label>
                    <input type="text" name="FullName" value="{{ @$manager->FullName }}" class="form-control" id="inputFullname" placeholder="Enter Full name">
                </div>

                @if( request()->id == 'create' )
                    <button type="submit" class="btn btn-primary">Create</button>
                @else
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmModal">Delete</button>
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