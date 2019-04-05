@extends( 'environment' )

@section( 'content' )

    <div class="row">

        <div class="col-md-6">

            <h1 class="mb-4">
                Orders
            </h1>

        </div>

        <div class="col-md-6">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-end bg-white">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                </ol>
            </nav>

        </div>

    </div>

    <div class="table-controls">

        <form action="" method="get" class="float-left mb-3">

            <div class="form-row align-items-center">

                <div class="col-auto">
                    <input type="text" class="form-control mb-2" name="search" placeholder="Search" value="{{ request()->query( 'search' ) }}" />
                </div>

                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-2">Search</button>
                </div>

            </div>

        </form>

        @if( request()->session()->get( 'user' )->Role !== \App\Http\Models\UsersModel::CLIENT_ROLE )

            <a class="btn btn-primary float-right mb-3" href="/orders/create">Create</a>

        @endif

    </div>

    <table class="table table-hover">

        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Date</th>
                <th scope="col">Amount</th>
                <th scope="col">Manager</th>
                <th scope="col">Client</th>
                <th scope="col">Point of Sale</th>
            </tr>
        </thead>

        <tbody>

            @foreach( $orders as $order )
                
                <tr onclick="window.location = '{{ '/orders/' . $order->ID }}'">
                    <th scope="row">{{ $order->ID }}</th>
                    <td>{{ $order->Date }}</td>
                    <td>{{ number_format( $order->Amount, 2, '.', '' ) }}</td>
                    <td>{{ $order->Manager }}</td>
                    <td>{{ $order->Client }}</td>
                    <td>{{ $order->PointOfSale }}</td>
                </tr>

            @endforeach

        </tbody>
        
    </table>

@endsection