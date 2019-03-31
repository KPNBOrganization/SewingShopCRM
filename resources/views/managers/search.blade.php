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
                </ol>
            </nav>

        </div>

    </div>

    <div class="table-controls">

        <a class="btn btn-primary float-right mb-3" href="/managers/create">Create</a>

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

            @foreach( $managers as $manager )
                
                <tr onclick="window.location = '{{ '/managers/' . $manager->ID }}'">
                    <th scope="row">{{ $manager->ID }}</th>
                    <td>{{ $manager->FullName }}</td>
                    <td>{{ $manager->Email }}</td>
                    <td>{{ $manager->Phone }}</td>
                </tr>

            @endforeach

        </tbody>
        
    </table>

@endsection