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

    <div class="table-controls">

        <a class="btn btn-primary float-right mb-3" href="/pos/create">Create</a>

    </div>

    <table class="table table-hover">

        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
            </tr>
        </thead>

        <tbody>

        </tbody>
        
    </table>

@endsection