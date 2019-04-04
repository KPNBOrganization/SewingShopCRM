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
                    <li class="breadcrumb-item"><a href="/orders">Orders</a></li>
                </ol>
            </nav>

        </div>

    </div>

    <div class="row">

        <div class="col-md-12">

            <form action="" method="post">

                @csrf

                <div class="form-group">
                    <label for="inputManager">Manager</label>
                    <select class="form-control" id="inputManager" name="manager">

                        @foreach ( $managersList as $option )
                            <option value="{{ $option->ID }}"
                                {{ ( $option->ID == @$manager ? ' selected' : '' ) }}>
                                {{ $option->FullName }}
                            </option>
                        @endforeach

                    </select>
                </div>

                <div class="form-group">
                    <label for="inputClient">Client</label>
                    <select class="form-control" id="inputClient" name="client">
                        
                        @foreach ( $clientsList as $option )
                            <option value="{{ $option->ID }}"
                                {{ ( $option->ID == @$client ? ' selected' : '' ) }}>
                                {{ $option->FullName }}
                            </option>
                        @endforeach

                    </select>
                </div>

                <div class="form-group">
                    <label for="inputPointOfSale">Point Of Sale</label>
                    <select class="form-control" id="inputPointOfSale" name="pos">
                        
                        @foreach ( $posList as $option )
                            <option value="{{ $option->ID }}"
                                {{ ( $option->ID == @$pos ? ' selected' : '' ) }}>
                                {{ $option->Name }}
                            </option>
                        @endforeach

                    </select>
                </div>

                <table class="table">

                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Article</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Amount</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>

                        <!-- ko foreach: { data: orderProducts, as: 'product' } -->
                        <tr>
                            <th class="align-middle" scope="row" data-bind="text: ( $index() + 1 )"></th>
                            <td class="align-middle">
                                <select class="form-control" 
                                    data-bind="options: availableProducts,
                                                optionsText: 'Article',
                                                optionsValue: 'ID',
                                                optionsCaption: 'Choose...',
                                                value: product.ProductServiceID,
                                                event: { change: onProductChange }"></select>
                            </td>
                            <td class="align-middle" data-bind="text: product.Name"></td>
                            <td class="align-middle" data-bind="text: product.Description"></td>
                            <td class="align-middle" data-bind="text: product.Price"></td>
                            <td class="align-middle">
                                <input class="form-control" type="number" data-bind="value: product.Quantity" style="width: 100px;" />
                            </td>
                            <td class="align-middle" data-bind="text: product.Amount"></td>
                            <td class="align-middle">
                                <a href="#" class="text-danger" data-bind="click: $parent.delete">Delete</a>
                            </td>
                        </tr>
                        <!-- /ko -->

                        <tr>
                            <td colspan="2"><button class="btn btn-secondary" data-bind="click: add">Add Product</button></td>
                            <td colspan="4" class="text-right h2">Total:</td>
                            <td colspan="2" class="text-left h2" data-bind="text: totalAmount">99.99</td>
                        </tr>
                        
                    </tbody>

                </table>

                <input type="hidden" name="totalAmount" data-bind="value: totalAmount" />
                <input type="hidden" name="orderProducts" data-bind="value: ko.toJSON( orderProducts )" />

                @if( request()->id == 'create' )
                    <button type="submit" class="btn btn-primary mb-3">Create</button>
                @else
                    <button type="submit" class="btn btn-primary mb-3">Update</button>
                    <button type="button" class="btn btn-danger mb-3" data-toggle="modal" data-target="#confirmModal">Delete</button>
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

    <script>

        var availableProducts = JSON.parse( '@json( $productsList )' );
        var orderProductsRaw = JSON.parse( '@json( @$orderProducts )' );

        function Product() {

            var self = this;

            self.ProductServiceID = 0;

            self.Name           = ko.observable( '' );
            self.Description    = ko.observable( '' );
            self.Price          = ko.observable( 0.00 );

            self.onProductChange = function( data, event ) {

                let id = data.ProductServiceID;

                let product = availableProducts.find( function( item, index, array ) {
                    return item.ID === id;
                } );

                if( product ) {

                    self.Name( product.Name );
                    self.Description( product.Description );
                    self.Price( Number( product.Price ).toFixed( 2 ) );

                } else {

                    self.Name( '' );
                    self.Description( '' );
                    self.Price( 0.00 );

                }

            };

            self.Quantity = ko.observable( 0 );

            self.Amount = ko.pureComputed( function() {

                return Number( self.Price() * self.Quantity() ).toFixed( 2 );

            });

        }

        var orderProducts = [];
        
        if( orderProductsRaw ) {

            for( let productRaw of orderProductsRaw ) {

                var product = new Product();

                product.ProductServiceID = productRaw.ProductServiceID;

                product.Name( productRaw.Name );
                product.Description( productRaw.Description );
                product.Price( Number( productRaw.Price ).toFixed( 2 ) );

                product.Quantity( productRaw.Quantity );

                orderProducts.push( product );

            }

        }

        function AppViewModel() {
            
            var self = this;

            self.orderProducts = ko.observableArray( orderProducts );
            self.availableProducts = availableProducts;

            self.totalAmount = ko.pureComputed( function() {
                
                let result = 0.00;

                for( product of self.orderProducts() ) {
                    result += Number( product.Amount() );
                }

                return Number( result ).toFixed( 2 );

            } );

            self.add = function() {

                var product = new Product();

                self.orderProducts.push( product );

            };

            self.delete = function() {
                self.orderProducts.remove( this );
            };

        }

        ko.applyBindings( new AppViewModel() );

    </script>

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