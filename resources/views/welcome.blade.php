@extends('main')
@section('title', ' ')

@section('content')

    <div class="container">
        <h2>Take Order</h2>
        <p></p>
        <form action="/order" method="post">
            <div class="row">
                <div class="col-md-10">
                    <div class="form-group">
                        {{ csrf_field() }}
                        <label for="sel1">Employee Name</label>
                        <select class="form-control" id="employee" name="employee">
                            <option value="" selected disabled>Select Employee</option>
                            @foreach($employees as $employees)
                                <option value="{{$employees->id}}">{{$employees->first_name.' '.$employees->last_name}}</option>
                            @endforeach
                        </select><br>
                        <label for="sel1">Customer Name</label>
                        <select class="form-control" id="customer" name="customer">
                            <option value="" selected disabled>Select Customer</option>
                            @foreach($customers as $customers)
                                <option value="{{$customers->id}}">{{$customers->customer_name}}</option>
                            @endforeach
                        </select><br>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="sel1">Category</label>
                                <select class="form-control" id="category" name="category">
                                    <option value="" selected disabled>Select Category</option>
                                    @foreach($categories as $categories)
                                        <option class="selectedC"
                                                value="{{$categories->id}}">{{$categories->category_name}}</option>
                                    @endforeach
                                </select><br></div>
                            <div class="col-md-3">
                                <label for="sel1">Supplier</label>
                                <select class="form-control" id="supplier" name="supplier">
                                    <option value="">All Suppliers</option>
                                    @foreach($suppliers as $suppliers)
                                        <option value="{{$suppliers->id}}">{{$suppliers->supplier_name}}</option>
                                    @endforeach
                                </select></div>
                            <div class="col-md-3">
                                <label for="sel1">Product</label>
                                <select class="form-control" id="product" name="product">
                                    <option selected>Select Product</option>
                                </select></div>
                            <div class="col-md-3">
                                <label for="sel1" id="priceLabel">Price</label>
                                <input type="text" id="price" name="price" readonly class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="sel1">Shipper</label>
                                <select class="form-control" id="shipper" name="shipper">
                                    @foreach($shippers as $shippers)
                                        <option value="{{$shippers->id}}">{{$shippers->shipper_name}}</option>
                                    @endforeach
                                </select></div>
                            <div class="col-md-2">
                                <label for="sel1">Quantity</label>
                                <input type="number" class="form-control" id="quantity" name="quantity"></div>
                            <div class="col-md-2" name="total">
                                <label for="sel1" id="totalLabel">Total</label>
                                <input type="text" class="form-control" value="0" readonly id="total">
                            </div>
                        </div>
                        <input type="submit" class="btn btn-lg btn-success" value="Order">
                    </div>
                </div>
            </div>
        </form>

@endsection
