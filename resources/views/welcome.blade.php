@extends( 'environment' )

@section( 'content' )

    <div class="row">

        <div class="col-md-12 mb-4">

            <h1>Welcome</h1>

        </div>

    </div>

    @if( request()->session()->get( 'user' )->Role == \App\Http\Models\UsersModel::CLIENT_ROLE )

        <div class="row">

            <div class="col-md-3 mb-3">

                <a href="/orders" class="rounded-lg shadow d-block h5 text-center py-5 px-2 bg-primary text-white text-decoration-none">
                
                    View My Orders

                </a>

            </div>

        </div>

    @elseif( request()->session()->get( 'user' )->Role == \App\Http\Models\UsersModel::MANAGER_ROLE or 
        request()->session()->get( 'user' )->Role == \App\Http\Models\UsersModel::ADMIN_ROLE )

        <div class="row">

            <div class="col-md-3 mb-3">

                <a href="/orders/create" class="rounded-lg shadow d-block h5 text-center py-5 px-2 bg-primary text-white text-decoration-none">
                
                    Create Order

                </a>

            </div>

            <div class="col-md-3 mb-3">

                <a href="/clients/create" class="rounded-lg shadow d-block h5 text-center py-5 px-2 bg-warning text-white text-decoration-none">
                
                    Create Client

                </a>

            </div>

            <div class="col-md-3 mb-3">

                <a href="/payments/create" class="rounded-lg shadow d-block h5 text-center py-5 px-2 bg-success text-white text-decoration-none">
                
                    Register Payment

                </a>

            </div>

            <div class="col-md-3 mb-3">

                <a href="/reports/orders" class="rounded-lg shadow d-block h5 text-center py-5 px-2 bg-info text-white text-decoration-none">
                
                    View Latest Orders

                </a>

            </div>

        </div>

    @endif

@endsection