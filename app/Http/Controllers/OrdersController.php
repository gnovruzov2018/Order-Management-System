<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Product;
use App\Category;
use App\Shipper;
use App\Supplier;
use App\Order;
use App\OrderDetail;
use App\Employee;
use Illuminate\Support\Facades\DB;


class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        $employees = Employee::all();
        $categories = Category::all();
        $suppliers = Supplier::all();
        $products = Product::all();
        $shippers = Shipper::all();
        return view('welcome')->with('customers', $customers)->with('employees', $employees)->with('categories', $categories)->with('suppliers', $suppliers)->with('products', $products)->with('shippers', $shippers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function useAjax1($id)
    {

        $products = Category::find($id)->products;
        return json_encode($products);

    }

    public function useAjax2($category_id, $sup_id)
    {
        $products = Category::find($category_id)->products->where('supplier_id', $sup_id);
        return json_encode($products);
    }

    public function useAjaxForPrice($prod_id)
    {
        $price = Product::where('id', $prod_id)->get();
        return json_encode($price);
    }

    public function showDetails(Request $request)
    {

        return view('details');
    }
    public function showDetailsJson($pageNum){
        $orders = DB::select('select data.* from fn_customfunction1(?,?) as data', array(4, $pageNum));
        return json_encode($orders);
    }
    public function showDetailsSearchJson($query_name,$pageNum){
        $orders = DB::select('select data.* from fn_customfunction(?,?,?) as data', array(4, $pageNum, $query_name));
        return json_encode($orders);
    }

    public function storeRecords(Request $request)
    {
        $order = new Order;
        $order->customer_id = $request->customer;
        $order->employee_id = $request->employee;
        $order->shipper_id = $request->shipper;
        $order->order_date = '2017-12-12';
        $order->save();
        $orderDetail = new OrderDetail;
        $orderDetail->order_id = $order->id;
        $orderDetail->product_id = $request->product;
        $orderDetail->quantity = $request->quantity;
        $orderDetail->save();

        return view('orderStored');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
