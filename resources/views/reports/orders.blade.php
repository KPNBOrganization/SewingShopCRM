@extends( 'environment' )

@section( 'content' )

    <div class="row">

        <div class="col-md-6">

            <h1 class="mb-4">
                Orders Report
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

    <table class="table table-hover">

        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Date</th>
                <th scope="col">Client</th>
                <th scope="col">Amount</th>
                <th scope="col">Amount Paid</th>
                <th scope="col">Manager</th>
                <th scope="col">Point of Sale</th>
            </tr>
        </thead>

        <tbody>

            @foreach( $orders as $order )
                
                <tr onclick="window.location = '{{ '/orders/' . $order->ID }}'">
                    <th scope="row">{{ $order->ID }}</th>
                    <td>{{ $order->Date }}</td>
                    <td>{{ $order->Client }}</td>
                    <td>{{ number_format( $order->Amount, 2, '.', '' ) }}</td>
                    <td>{{ number_format( $order->PaidAmount, 2, '.', '' ) }}</td>
                    <td>{{ $order->Manager }}</td>
                    <td>{{ $order->PointOfSale }}</td>
                </tr>

            @endforeach

        </tbody>
        
    </table>

@endsection