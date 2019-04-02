@extends( 'environment' )

@section( 'content' )

    <div class="row">

        <div class="col-md-6">

            <h1 class="mb-4">
                Clients
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

        <a class="btn btn-primary float-right mb-3" href="/clients/create">Create</a>

    </div>

    <table class="table table-hover">

        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Full Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
            </tr>
        </thead>

        <tbody>

            @foreach( $clients as $client )
                
                <tr onclick="window.location = '{{ '/clients/' . $client->ID }}'">
                    <th scope="row">{{ $client->ID }}</th>
                    <td>{{ $client->FullName }}</td>
                    <td>{{ $client->Email }}</td>
                    <td>{{ $client->Phone }}</td>
                </tr>

            @endforeach

        </tbody>
        
    </table>

@endsection