<?php

namespace App\Http\Controllers\Instructor;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Exports\StudentsExport;

use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    public function index(){
        $student = Student::all();
        return view('instructor.student.index')->with('studentList', $student);
           
       
    }
    public function details($s_id)
    {
        
        $student = Student::find($s_id);
        return view('instructor.student.details')->with('student', $student);
    }
    public function dwonload()

    {

        return Excel::download(new StudentsExport, 'Students.xlsx');

    }

   

   /* public function searching(Request $req){
        $q = $req->q;
        $student = Student::where('s_id', 'LIKE', '%'.$q.'%')
                            ->orWhere('st_name', 'LIKE', '%'.$q.'%')
                            ->get();
        if (count($student)>0) {
            return view('student.searchresult')->withDetails($student)->withQuery($q);
        }else{
            return view ('student.searchresult')->withMessage('No Details found. Try to search again !');
        }
    }*/

    public function searchStudent(Request $request)
    {
        if ($request->ajax()) {
            $students =
                Student::where('st_name', 'LIKE', $request->search . '%')
                ->orWhere('s_id','LIKE', $request->search . '%')
                ->get();

            $output =
                '<tr class="table-info table-sm">' .
                '<td td colspan="5">' . 'Student ID' . '</td>' .
                '<td td colspan="5">' . 'Student Name' . '</td>' .
                '<td>' . 'Student Email' . '</td>' .
                '<td>' . 'Student Address' . '</td>' .
                '<td>' . 'Action' . '</td>' .

                '</tr>';

            if (count($students) > 0) {
                if ($students) {
                    foreach ($students as $key => $student) {
                        $output .= '<tr>' .
                            '<td colspan="5">' . $student->s_id . '</td>' .
                            '<td colspan="5">' . $student->st_name . '</td>' .
                            '<td colspan="5">' . $student->email . '</td>' .
                            '<td colspan="5">' . $student->address . '</td>' .
                            '<td colspan="5">' . '<a class="btn btn-info" href="' . route('student.details', ['id' => $student->s_id]) . '">Details</a>'  . '|'
                            . '<a class="btn btn-warning" href="' . route('student.edit', ['id' => $student->s_id]) . '">Edit</a>'  . '|'
                            . '<a class="btn btn-danger" href="' . route('student.delete', ['id' => $student->s_id]) . '">Delete</a>' . '</td>' . '|' .
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


    
    public function verify(){
        echo "posted";
    }
}
