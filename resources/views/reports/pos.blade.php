@extends( 'environment' )

@section( 'content' )

    <div class="row">

        <div class="col-md-6">

            <h1 class="mb-4">
                Points of Sales Report
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
                <th scope="col">Name</th>
                <th scope="col">Amount</th>
            </tr>
        </thead>

        <tbody>

            @foreach( $pos as $place )
                
                <tr onclick="window.location = '{{ '/pos/' . $place->ID }}'">
                    <th scope="row">{{ $place->ID }}</th>
                    <td>{{ $place->Name }}</td>
                    <td>{{ number_format( $place->Amount, 2, '.', '' ) }}</td>
                </tr>

            @endforeach

        </tbody>
        
    </table>

@endsection