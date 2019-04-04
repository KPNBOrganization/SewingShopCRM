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
                </ol>
            </nav>

        </div>

    </div>

    <div class="table-controls">

        <a class="btn btn-primary float-right mb-3" href="/payments/create">Create</a>

    </div>

    <table class="table table-hover">

        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Date</th>
                <th scope="col">Amount</th>
                <th scope="col">Manager</th>
                <th scope="col">Order</th>
            </tr>
        </thead>

        <tbody>

            @foreach( $payments as $payment )
                
                <tr onclick="window.location = '{{ '/payments/' . $payment->ID }}'">
                    <th scope="row">{{ $payment->ID }}</th>
                    <td>{{ $payment->Date }}</td>
                    <td>{{ $payment->Amount }}</td>
                    <td>{{ $payment->Manager }}</td>
                    <td>{{ $payment->OrderID }}</td>                    
                </tr>

            @endforeach

        </tbody>
        
    </table>

@endsection