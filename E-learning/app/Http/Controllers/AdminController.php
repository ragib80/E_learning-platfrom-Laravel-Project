<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
        //
    }
    public function student()
    {
        return view('student.index');
        //
    }

    public function list()
    {
        $students = Student::all();
        return view('admin.student.list')->with('students', $students);
    }
    public function details($id)
    {
        $students = Student::find($id);
        return view('admin.student.details')->with('student', $students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function physical()
    {

        $sales_today = Product::where('status', 'sold')
            ->where('channel', 'physical')
            ->where('date_sold', Carbon::now()->toDateString())
            ->count();

        $sales_week = Product::where('status', 'sold')
            ->where('channel', 'physical')
            ->whereBetween('date_sold', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->count();
        $avg_sales = Product::where('status', 'sold')
            ->where('channel', 'physical')
            ->whereYear('date_sold', Carbon::now()->year)
            ->whereMonth('date_sold', Carbon::now()->month)
            ->avg('quantity');

        $most_sales = Product::select('product_name')
            ->where('channel', 'physical')
            ->groupBy('product_name')
            ->orderByRaw('COUNT(*) DESC')
            ->limit(1)
            ->get();


        $product = DB::table('products')
            ->where('channel', 'physical')
            ->orderBy('date_sold', 'desc')
            ->get();

        return view('sales.physical')->with('productList', $product)
            ->with('sales_today', $sales_today)
            ->with('sales_week', $sales_week)
            ->with('avg_sales', $avg_sales)
            ->with('most_sales', $most_sales);
    }

    public function social()
    {

        $sales_today = Product::where('status', 'sold')
            ->where('channel', 'social')
            ->where('date_sold', Carbon::now()->toDateString())
            ->count();

        $sales_week = Product::where('status', 'sold')
            ->where('channel', 'social')
            ->whereBetween('date_sold', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->count();
        $avg_sales = Product::where('status', 'sold')
            ->where('channel', 'social')
            ->whereYear('date_sold', Carbon::now()->year)
            ->whereMonth('date_sold', Carbon::now()->month)
            ->avg('quantity');

        $most_sales = Product::select('product_name')
            ->where('channel', 'social')
            ->groupBy('product_name')
            ->orderByRaw('COUNT(*) DESC')
            ->limit(1)
            ->get();


        $product = DB::table('products')
            ->where('channel', 'social')
            ->orderBy('date_sold', 'desc')
            ->get();

        return view('sales.social')->with('productList', $product)
            ->with('sales_today', $sales_today)
            ->with('sales_week', $sales_week)
            ->with('avg_sales', $avg_sales)
            ->with('most_sales', $most_sales);
    }
    public function ecommerce()
    {

        $sales_today = Product::where('status', 'sold')
            ->where('channel', 'ecommerce')
            ->where('date_sold', Carbon::now()->toDateString())
            ->count();

        $sales_week = Product::where('status', 'sold')
            ->where('channel', 'ecommerce')
            ->whereBetween('date_sold', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->count();
        $avg_sales = Product::where('status', 'sold')
            ->where('channel', 'ecommerce')
            ->whereYear('date_sold', Carbon::now()->year)
            ->whereMonth('date_sold', Carbon::now()->month)
            ->avg('quantity');

        $most_sales = Product::select('product_name')
            ->where('channel', 'ecommerce')
            ->groupBy('product_name')
            ->orderByRaw('COUNT(*) DESC')
            ->limit(1)
            ->get();


        $product = DB::table('products')
            ->where('channel', 'ecommerce')
            ->orderBy('date_sold', 'desc')
            ->get();

        return view('sales.ecommerce')->with('productList', $product)
            ->with('sales_today', $sales_today)
            ->with('sales_week', $sales_week)
            ->with('avg_sales', $avg_sales)
            ->with('most_sales', $most_sales);
    }

    public function log()
    {

        return view('sales.sales_log');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $req)
    {

        $product = new Product;
        $product->customer_name = $req->fullname;
        $product->address = $req->address;
        $product->phone = $req->phone;
        $product->product_name = $req->productname;
        $product->product_id = $req->productid;
        $product->quantity = $req->quantity;
        $product->unit_price = $req->unitprice;
        $product->total_price = $req->totalprice;
        $product->status = 'pending';
        $product->payment_type = 'pending';
        $product->channel = 'physical';
        $product->date_sold = '2019/10/10';
        // $product->update_time = '';


        // $product->profile_img = '';
        $product->save();
        $req->session()->flash('msg', 'Product Registration Successful');
        return redirect()->route('sales.physical');
    }

    public function data(Request $req)
    {

        if ($req->hasFile('file')) {
            $validation = Validator::make(
                [
                    'file'      => $req->file,
                    'extension' => strtolower($req->file->getClientOriginalExtension()),
                ],
                [
                    'file'          => 'required',
                    'extension'      => 'required|in:xlsx,xls',
                ]
            );
            if ($validation->fails()) {
                return back()
                    ->with('errors', $validation->errors())
                    ->withInput();

                //return redirect()->route('login.index')->with('errors', $validation->errors());
            }

            $file = $req->file('file');
            echo "File Name: " . $file->getClientOriginalName() . "<br>";
            echo "File Extension: " . $file->getClientOriginalExtension() . "<br>";
            echo "File Mime Type: " . $file->getMimeType() . "<br>";
            echo "File Size: " . $file->getSize() . "<br>";

            if ($file->move('upload', 'sales_log.' . $file->getClientOriginalExtension())) {
                $req->session()->flash('msg', 'File Uploaded Successful');
                return redirect()->route('sales.physical');
            } else {
                $req->session()->flash('msg', 'File Uploaded Not Successful');
                return redirect()->route('sales.log');
            }
        } else {
            $req->session()->flash('msg', 'Please Upload a file to Load');
            return redirect()->route('sales.log');
        }
    }
    public function export()
    {
        return (new ProductsExport(06))->download('invoices.xlsx');
    }
    //

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function show(Sales $sales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function edit(Sales $sales)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sales $sales)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sales $sales)
    {
        //
    }
}