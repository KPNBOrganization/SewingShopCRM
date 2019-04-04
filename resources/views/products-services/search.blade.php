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
                </ol>
            </nav>

        </div>

    </div>

    <div class="table-controls">

        <a class="btn btn-primary float-right mb-3" href="/products-services/create">Create</a>

    </div>

    <table class="table table-hover">

        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Article</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <!-- <th scope="col">Quantity</th> -->
            </tr>
        </thead>

        <tbody>

            @foreach( $products as $product )
                
                <tr onclick="window.location = '{{ '/products-services/' . $product->ID }}'">
                    <th scope="row">{{ $product->ID }}</th>
                    <td>{{ $product->Article }}</td>
                    <td>{{ $product->Name }}</td>
                    <td>{{ number_format( $product->Price, 2, '.', '' ) }}</td>
                    <!-- <td>{{ $product->Quantity }}</td> -->
                </tr>

            @endforeach

        </tbody>
        
    </table>

@endsection