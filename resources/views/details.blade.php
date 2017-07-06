@extends('main')
@section('title', ' Details')
@section('content')
    <div class="container-fluid">
        <h2>Order Details</h2>
        {{csrf_field()}}

        <div class="row">
            <div class="col-md-2">
                <input type="text" class="form-control" id="query_shipper_name" name="query_shipper_name" placeholder="shipper name..">
            </div>
            <div class="col-md-3">
                <button type="button" class="btn btn-md btn-primary" value="Search" id="search" name="search">Search</button>
            </div>
        </div>
        <table class="table table-hover" id="detailsTable">
            <thead>
            <tr>
                <th>Order ID</th>
                <th>Customer Name</th>
                <th>Employee Name</th>
                <th>Shipper</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Order Date</th>
            </tr>
            </thead>
            <tbody id="tableBody">

            </tbody>
        </table>
        <div class="row" id="noResult">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body" id="">
                        <center>
                            <h2>No orders found!</h2>
                        </center>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-1" style="float: right">
                <select id="pageSize" name="pageSize" class="form-control">
                    <option selected="selected" value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
        </div>
        <ul id="pagination" class="pagination pagination-lg">
       </ul>
    </div>

@endsection
