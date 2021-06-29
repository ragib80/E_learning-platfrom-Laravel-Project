<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Exports\StudentsExport;

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

    public function edit($id)
    {
        $students = Student::find($id);
        return view('admin.student.edit')->with('student', $students);
    }

    public function updateStudent(Request $req, $id)
    {
        $student = Student::find($id);
        $student->st_name = $req->name;
        // $user->password = $req->password;
        $student->email = $req->email;
        $student->p_num = $req->phone;
        $student->c_id = $req->course_id;
        $student->address = $req->address;
        // $user->type = $req->type;
        $student->save();
        return redirect()->route('student.list');
        // return view('user.list')->with('userList', $users);
    }
    public function deleteStudent($id)
    {

        $student = Student::find($id);
        return view('admin.student.delete')->with('student', $student);
    }


    public function destroy(Request $req, $id)
    {

        Student::destroy($id);
        return redirect()->route('student.list');
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

    public function sheet()
    {
        return (new StudentsExport())->download('students.xlsx');
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
}