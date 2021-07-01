<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Instructor;
use App\Models\Stuff;
use App\Exports\StudentsExport;
use App\Exports\InstructorsExport;
use App\Exports\StuffsExport;
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


    public function listStudent()
    {
        $students = Student::all();
        return view('admin.student.list')->with('students', $students);
    }
    public function detailsStudent($id)
    {
        $students = Student::find($id);
        return view('admin.student.details')->with('student', $students);
    }

    public function editStduent($id)
    {
        $students = Student::find($id);
        return view('admin.student.edit')->with('student', $students);
    }

    public function updateStudent(Request $req, $id)
    {
        $student = Student::find($id);
        $student->fullname = $req->name;
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


    public function destroyStudent(Request $req, $id)
    {

        Student::destroy($id);
        return redirect()->route('student.list');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function searchStudent(Request $request)
    {
        if ($request->ajax()) {
            $students =
                Student::where('fullname', 'LIKE', $request->search . '%')
                ->get();

            $output =
                '<tr class="table-info table-sm">' .
                '<td>' . 'Student ID' . '</td>' .
                '<td>' . 'Student Name' . '</td>' .
                '<td>' . 'Student Email' . '</td>' .
                '<td>' . 'Student Address' . '</td>' .
                '<td>' . 'Action' . '</td>' .

                '</tr>';

            if (count($students) > 0) {
                if ($students) {
                    foreach ($students as $key => $student) {
                        $output .= '<tr>' .
                            '<td>' . $student->st_id . '</td>' .
                            '<td>' . $student->fullname . '</td>' .
                            '<td>' . $student->email . '</td>' .
                            '<td>' . $student->address . '</td>' .
                            '<td>' . '<a class="btn btn-info" href="' . route('student.details', ['id' => $student->st_id]) . '">Details</a>'  . '|'
                            . '<a class="btn btn-warning" href="' . route('student.edit', ['id' => $student->st_id]) . '">Edit</a>'  . '|'
                            . '<a class="btn btn-danger" href="' . route('student.delete', ['id' => $student->st_id]) . '">Delete</a>' . '</td>' . '|' .
                            '</tr>';
                    }
                    return Response($output);
                }
            } else {

                $output .=
                    '<tr>' . '<td colspan="5">' . 'No results' . '</td>' . '</tr>';
                return Response($output);
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

    public function sheetStudent()
    {
        return Excel::download(new StudentsExport, 'students.xlsx');
    }



    public function listInstructor()
    {
        $instructors = Instructor::all();
        return view('admin.instructor.list')->with('instructors', $instructors);
    }
    public function detailsInstructor($id)
    {
        $instructors = Instructor::find($id);
        return view('admin.instructor.details')->with('instructor', $instructors);
    }

    public function editInstructor($id)
    {
        $instructors = Instructor::find($id);
        return view('admin.instructor.edit')->with('instructor', $instructors);
    }

    public function updateInstructor(Request $req, $id)
    {
        $instructor = Instructor::find($id);
        $instructor->fullname = $req->name;
        // $user->password = $req->password;
        $instructor->email = $req->email;
        $instructor->p_num = $req->phone;
        $instructor->c_id = $req->course_id;
        $instructor->address = $req->address;
        // $user->type = $req->type;
        $instructor->save();
        return redirect()->route('instructor.list');
        // return view('user.list')->with('userList', $users);
    }
    public function deleteInstructor($id)
    {

        $instructor = Instructor::find($id);
        return view('admin.instructor.delete')->with('instructor', $instructor);
    }


    public function destroyInstructor(Request $req, $id)
    {

        Instructor::destroy($id);
        return redirect()->route('instructor.list');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function searchInstructor(Request $request)
    {
        if ($request->ajax()) {
            $instructors =
                Instructor::where('fullname', 'LIKE', $request->search . '%')
                ->get();

            $output =
                '<tr class="table-info table-sm">' .
                '<td>' . 'Instructor ID' . '</td>' .
                '<td>' . 'Instructor Name' . '</td>' .
                '<td>' . 'Instructor Email' . '</td>' .
                '<td>' . 'Instructor Address' . '</td>' .
                '<td>' . 'Action' . '</td>' .

                '</tr>';

            if (count($instructors) > 0) {
                if ($instructors) {
                    foreach ($instructors as $key => $instructor) {
                        $output .= '<tr>' .
                            '<td>' . $instructor->i_id . '</td>' .
                            '<td>' . $instructor->fullname . '</td>' .
                            '<td>' . $instructor->email . '</td>' .
                            '<td>' . $instructor->address . '</td>' .
                            '<td>' . '<a class="btn btn-info" href="' . route('instructor.details', ['id' => $instructor->i_id]) . '">Details</a>'  . '|'
                            . '<a class="btn btn-warning" href="' . route('instructor.edit', ['id' => $instructor->i_id]) . '">Edit</a>'  . '|'
                            . '<a class="btn btn-danger" href="' . route('instructor.delete', ['id' => $instructor->i_id]) . '">Delete</a>' . '</td>' . '|' .
                            '</tr>';
                    }
                    return Response($output);
                }
            } else {

                $output .=
                    '<tr>' . '<td colspan="5">' . 'No results' . '</td>' . '</tr>';
                return Response($output);
            }
        }
    }


    public function sheetInstructor()
    {
        return Excel::download(new InstructorsExport, 'instructors.xlsx');
    }

    public function listStuff()
    {
        $stuffs = Stuff::all();
        return view('admin.stuff.list')->with('stuffs', $stuffs);
    }
    public function detailsStuff($id)
    {
        $stuffs = Stuff::find($id);
        return view('admin.stuff.details')->with('stuff', $stuffs);
    }

    public function editStuff($id)
    {
        $stuffs = Stuff::find($id);
        return view('admin.stuff.edit')->with('stuff', $stuffs);
    }

    public function updateStuff(Request $req, $id)
    {
        $stuff = Stuff::find($id);
        $stuff->fullname = $req->name;
        // $user->password = $req->password;
        $stuff->email = $req->email;
        $stuff->p_num = $req->phone;
        $stuff->c_id = $req->course_id;
        $stuff->address = $req->address;
        // $user->type = $req->type;
        $stuff->save();
        return redirect()->route('stuff.list');
        // return view('user.list')->with('userList', $users);
    }
    public function deleteStuff($id)
    {

        $stuff = Stuff::find($id);
        return view('admin.stuff.delete')->with('stuff', $stuff);
    }


    public function destroyStuff(Request $req, $id)
    {

        Stuff::destroy($id);
        return redirect()->route('stuff.list');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function searchStuff(Request $request)
    {
        if ($request->ajax()) {
            $stuffs =
                Stuff::where('fullname', 'LIKE', $request->search . '%')
                ->get();

            $output =
                '<tr class="table-info table-sm">' .
                '<td>' . 'Stuff ID' . '</td>' .
                '<td>' . 'Stuff Name' . '</td>' .
                '<td>' . 'Stuff Email' . '</td>' .
                '<td>' . 'Stuff Address' . '</td>' .
                '<td>' . 'Action' . '</td>' .

                '</tr>';

            if (count($stuffs) > 0) {
                if ($stuffs) {
                    foreach ($stuffs as $key => $stuff) {
                        $output .= '<tr>' .
                            '<td>' . $stuff->s_id . '</td>' .
                            '<td>' . $stuff->fullname . '</td>' .
                            '<td>' . $stuff->email . '</td>' .
                            '<td>' . $stuff->address . '</td>' .
                            '<td>' . '<a class="btn btn-info" href="' . route('stuff.details', ['id' => $stuff->s_id]) . '">Details</a>'  . '|'
                            . '<a class="btn btn-warning" href="' . route('stuff.edit', ['id' => $stuff->s_id]) . '">Edit</a>'  . '|'
                            . '<a class="btn btn-danger" href="' . route('stuff.delete', ['id' => $stuff->s_id]) . '">Delete</a>' . '</td>' . '|' .
                            '</tr>';
                    }
                    return Response($output);
                }
            } else {

                $output .=
                    '<tr>' . '<td colspan="5">' . 'No results' . '</td>' . '</tr>';
                return Response($output);
            }
        }
    }

    public function sheetStuff()
    {
        return Excel::download(new StuffsExport, 'stuffs.xlsx');
    }
}