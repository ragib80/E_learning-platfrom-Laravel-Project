<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Exports\StudentsExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

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


    public function search(Request $request)
    {
        if ($request->ajax()) {
            $students =
                Student::where('st_name', 'LIKE', $request->search . '%')
                ->get();

            $output =
                '<tr class="table-info table-sm">' .
                '<td>' . 'Student ID' . '</td>' .
                '<td>' . 'Student Name' . '</td>' .
                '<td>' . 'Student Email' . '</td>' .
                '<td>' . 'Student Address' . '</td>' .

                '</tr>';

            if (count($students) > 0) {
                if ($students) {
                    foreach ($students as $key => $student) {
                        $output .= '<tr>' .
                            '<td>' . $student->st_id . '</td>' .
                            '<td>' . $student->st_name . '</td>' .
                            '<td>' . $student->email . '</td>' .
                            '<td>' . $student->address . '</td>' .
                            '<td>' . '<a class="btn btn-info" href="route("student.details", ["id" => ' . $student->st_id . '])">' . 'Details' . '</a>' . '</td>' . '|' .
                            '</tr>';
                    }
                    return Response($output);
                } else {

                    $output .= '<li class="list-group-item">' . 'No results' . '</li>';
                }
            }
        }
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
        return Excel::download(new StudentsExport, 'students.xlsx');
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