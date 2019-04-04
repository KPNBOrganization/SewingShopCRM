@extends( 'environment' )

@section( 'content' )

    <div class="row">

        <div class="col-md-6">

            <h1 class="mb-4">
                Payments
            </h1>

        </div>

        <div class="col-md-6">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-end bg-white">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="/payments">Payments</a></li>
                </ol>
            </nav>

        </div>

    </div>

    <div class="row">

        <div class="col-md-12">

            <form action="" method="post">

                @csrf

                <div class="form-group">
                    <label for="inputAmount">Amount</label>
                    <input type="text" name="amount" value="{{ @$amount }}" class="form-control" id="inputAmount" placeholder="Enter Amount">
                </div>

                <div class="form-group">
                    <label for="inputManager">Manager</label>
                    <select class="form-control" id="inputManager" name="userid">

                        @foreach ( $managersList as $option )
                            <option value="{{ $option->ID }}"
                                {{ ( $option->ID == @$userid ? ' selected' : '' ) }}>
                                {{ $option->FullName }}
                            </option>
                        @endforeach

                    </select>
                </div>

                <div class="form-group">
                    <label for="inputOrder">Order</label>
                    <select class="form-control" id="inputOrder" name="orderid">
                        
                        @foreach ( $ordersList as $option )
                            <option value="{{ $option->ID }}"
                                {{ ( $option->ID == @$orderid ? ' selected' : '' ) }}>
                                {{ $option->Client . ' - ' . $option->ID }}
                            </option>
                        @endforeach

                    </select>
                </div>

                @if( request()->id == 'create' )
                    <button type="submit" class="btn btn-primary mb-3">Create</button>
                @else
                    <button type="submit" class="btn btn-primary mb-3">Update</button>
                    <!-- <button type="button" class="btn btn-danger mb-3" data-toggle="modal" data-target="#confirmModal">Delete</button> -->
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