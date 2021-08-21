<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Instructor;
use App\Models\User;
use App\Models\Shop;
use App\Models\Course;
use App\Models\Stuff;
use App\Models\Document;
use App\Exports\StudentsExport;
use App\Exports\InstructorsExport;
use App\Exports\StuffsExport;
use App\Exports\CoursesExport;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Pagination\Paginator as PaginationPaginator;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use App\http\Requests\StuffRequest;
use App\http\Requests\UpdateStuffRequest;
use App\http\Requests\UpdateStudentRequest;
use App\http\Requests\UpdateInstructorRequest;
use App\Models\Scholarship;
use Illuminate\Support\Facades\Validator;

use Illuminate\Contracts\Support\Jsonable;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response\
     *
     */

    public function index()
    {
        $students = Student::count()->where("status");
        $instructors = Instructor::count();
        $stuffs = Stuff::count();
        $courses = Course::count();

        return response()->json([
            'status' => 200,
            'courses' => $courses, 'students' => $students, 'instructors' => $instructors,
            'stuffs' => $stuffs

        ]);
        //
    }


    public function profile($id)
    {
        $users = User::find($id);
        return view('profile.index')->with('user', $users);
        //
    }
    public function noticeList()
    {
        $notices = Document::all();
        return view('notice.list')->with('notices', $notices);
        //
    }

    public function listStudent(Request $request)
    {
        $students = Student::all();

        return response()->json([
            'status' => 200,
            'students' => $students

        ]);
    }

    public function detailsStudent($id,$cid)
    {
        $students = Student::find($id);
        $courses = Course::find($cid);
        return response()->json([
            'status' => 200,
            'students' => $students,
            'students' => $courses


        ]);
    }

    public function editStudent($id)
    {
        $students = Student::find($id);
        return response()->json([
            'status' => 200,
            'students' => $students

        ]);
    }

    public function updateStudent(UpdateStudentRequest $req, $id)
    {
        $student = Student::find($id);
        $student->fullname = $req->fullname;
        // $user->password = $req->password;
        // $student->email = $req->email;
        $student->p_num = $req->p_num;
        $student->c_id = $req->c_id;
        $student->address = $req->address;
        $student->country = $req->country;
        // $user->type = $req->type;
        $student->save();
        return response()->json([
            'status' => 200,
            'students' => $student

        ]);
        // return view('user.list')->with('userList', $users);
    }
    public function activateStudent(Request $req, $id)
    {
        $students = Student::find($id);
        $students->status = "active";
        $students->save();
        return response()->json([
            'status' => 200,
            'courses' =>   $students

        ]);
    }
    public function deactivateStudent(Request $req, $id)
    {
        $students = Student::find($id);
        $students->status = "deactive";
        $students->save();
        return response()->json([
            'status' => 200,
            'courses' =>   $students

        ]);
    }
    public function deleteStudent($id)
    {

        $student = Student::find($id);
        return view('admin.student.delete')->with('student', $student);
    }


    public function destroyStudent(Request $req, $id)
    {

        Student::destroy($id);

        return response()->json([
            'status' => 200,
            'message' => "Deleted  Succesfully",

        ]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function searchStudent(Request $request)
    {
        // if ($request->ajax()) {
            $students = Student::where('fullname', 'LIKE', $request->search . '%')->get();

            // $output =
            //     '<tr class="table-info table-sm">' .
            //     '<td>' . 'Student ID' . '</td>' .
            //     '<td>' . 'Student Name' . '</td>' .
            //     '<td>' . 'Student Email' . '</td>' .
            //     '<td>' . 'Student Address' . '</td>' .
            //     '<td>' . 'Action' . '</td>' .

            //     '</tr>';

            // if (count($students) > 0) {
            //     if ($students) {
            //         foreach ($students as $key => $student) {
            //             $output .= '<tr>' .
            //                 '<td>' . $student->st_id . '</td>' .
            //                 '<td>' . $student->fullname . '</td>' .
            //                 '<td>' . $student->email . '</td>' .
            //                 '<td>' . $student->address . '</td>' .
            //                 '<td>' . '<a class="btn btn-info" href="' . route('student.details', ['id' => $student->st_id]) . '">Details</a>'  . '|'
            //                 . '<a class="btn btn-warning" href="' . route('student.edit', ['id' => $student->st_id]) . '">Edit</a>'  . '|'
            //                 . '<a class="btn btn-danger" href="' . route('student.delete', ['id' => $student->st_id]) . '">Delete</a>' . '</td>' . '|' .
            //                 '</tr>';
            //         }
            //         return Response($output);
            //     }
            // } else {

            //     $output .=
            //         '<tr>' . '<td colspan="5">' . 'No results' . '</td>' . '</tr>';
            //     return Response($output);
            // }
        // }
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
                    'extension'      => 'required|in:xlsx,xls,pdf',
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

            if ($file->move('upload', 'notice.' . $file->getClientOriginalExtension())) {
                $data = new Document;
                $file = $req->file('file');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $data->file = $filename;
                $req->session()->flash('success', 'File Uploaded Successful');
                $data->title = $req->title;
                $data->description = $req->description;
                $data->save();
                return redirect()->back();
            } else {
                $req->session()->flash('msg', 'File Uploaded Not Successful');
                return redirect()->route('notice.list');
            }
        } else {
            $req->session()->flash('msg', 'Please Upload a file to Load');
            return redirect()->route('notice.list');
        }
    }

    public function sheetStudent()
    {
        return Excel::download(new StudentsExport, 'students.xlsx');
    }

    public function NoticeDownload($id)
    {
        $notice = Document::where('id', $id)->firstOrFail();
        $pathToFile = storage_path('upload' . $notice->file);
        return response()->download($pathToFile);
    }
    public function listInstructor()
    {
        $instructors = Instructor::all();
        return response()->json([
            'status' => 200,
            'instructors' =>   $instructors

        ]);
    }
    public function detailsInstructor($id)
    {
        $instructors = Instructor::find($id);
        return response()->json([
            'status' => 200,
            'instructors' =>   $instructors

        ]);
    }

    public function editInstructor($id)
    {
        $instructors = Instructor::find($id);
        return view('admin.instructor.edit')->with('instructor', $instructors);
    }

    public function updateInstructor(UpdateInstructorRequest $req, $id)
    {
        $instructors = Instructor::find($id);
        $instructors->fullname = $req->fullname;
        // $user->password = $req->password;
        $instructors->email = $req->email;
        $instructors->p_num = $req->p_num;
        $instructors->c_id = $req->c_id;
        $instructors->address = $req->address;
        // $user->type = $req->type;
        $instructors->save();
        return response()->json([
            'status' => 200,
            'instructors' =>   $instructors

        ]);
    }
    public function deleteInstructor($id)
    {

        $instructor = Instructor::find($id);
        return view('admin.instructor.delete')->with('instructor', $instructor);
    }


    public function destroyInstructor(Request $req, $id)
    {
        Instructor::destroy($id);
        return response()->json([
            'status' => 200,
            'message' => "Deleted  Succesfully",

        ]);
    }
    public function activateInstructor(Request $req, $id)
    {
        $instructors = Instructor::find($id);
        $instructors->status = "active";
        $instructors->save();
        return response()->json([
            'status' => 200,
            'instructors' => $instructors

        ]);
    }
    public function deactivateInstructor(Request $req, $id)
    {
        $instructors = Instructor::find($id);
        $instructors->status = "deactive";
        $instructors->save();
        return response()->json([
            'status' => 200,
            'instructors' => $instructors

        ]);
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
        return response()->json([
            'status' => 200,
            'stuffs' =>   $stuffs

        ]);
    }
    public function detailsStuff($id)
    {
        $stuffs = Stuff::find($id);
        return response()->json([
            'status' => 200,
            'stuffs' =>   $stuffs

        ]);
    }

    public function editStuff($id)
    {
        $stuffs = Stuff::find($id);
        return view('admin.stuff.edit')->with('stuff', $stuffs);
    }

    public function updateStuff(UpdateStuffRequest $req, $id)
    {
        $stuff = Stuff::find($id);
        $stuff->fullname = $req->fullname;
        $stuff->username = $req->username;
        // $user->password = $req->password;
        $stuff->email = $req->email;
        $stuff->p_num = $req->phone;
        $stuff->address = $req->address;
        // $user->type = $req->type;
        $stuff->save();
        return response()->json([
            'status' => 200,
            'stuffs' =>   $stuff

        ]);
    }
    public function deleteStuff($id)
    {

        $stuff = Stuff::find($id);
        return view('admin.stuff.delete')->with('stuff', $stuff);
    }


    public function destroyStuff(Request $req, $id)
    {

        Stuff::destroy($id);
        return response()->json([
            'status' => 200,
            'message' =>   "Delete Success"

        ]);
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

    public function listCourse()
    {
        $courses = Course::all();
        return response()->json([
            'status' => 200,
            'courses' => $courses

        ]);
    }
    public function detailsCourse($id)
    {
        $courses = Course::find($id);
        return response()->json([
            'status' => 200,
            'courses' => $courses

        ]);
    }

    public function editCourse($id)
    {
        $courses = Course::find($id);
        return view('admin.course.edit')->with('course', $courses);
    }

    public function activateCourse(Request $req, $id)
    {
        $courses = Course::find($id);
        $courses->status = "active";
        $courses->save();
        return response()->json([
            'status' => 200,
            'courses' => $courses

        ]);
    }
    public function deactivateCourse(Request $req, $id)
    {
        $courses = Course::find($id);
        $courses->status = "deactive";
        $courses->save();
        return response()->json([
            'status' => 200,
            'courses' => $courses

        ]);
    }
    public function deleteCourse($id)
    {

        $course = Course::find($id);
        return view('admin.course.delete')->with('course', $course);
    }


    public function destroyCourse(Request $req, $id)
    {

        Course::destroy($id);
        return response()->json([
            'status' => 200,
            'message' => "Deleted  Succesfully",

        ]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function searchCourse(Request $request)
    {
        if ($request->ajax()) {
            $courses =
                Course::where('fullname', 'LIKE', $request->search . '%')
                ->get();

            $output =
                '<tr class="table-info table-sm">' .
                '<td>' . 'Course ID' . '</td>' .
                '<td>' . 'Course Name' . '</td>' .
                '<td>' . 'Course Email' . '</td>' .
                '<td>' . 'Course Address' . '</td>' .
                '<td>' . 'Action' . '</td>' .

                '</tr>';

            if (count($courses) > 0) {
                if ($courses) {
                    foreach ($courses as $key => $course) {
                        $output .= '<tr>' .
                            '<td>' . $course->st_id . '</td>' .
                            '<td>' . $course->fullname . '</td>' .
                            '<td>' . $course->email . '</td>' .
                            '<td>' . $course->address . '</td>' .
                            '<td>' . '<a class="btn btn-info" href="' . route('course.details', ['id' => $course->st_id]) . '">Details</a>'  . '|'
                            . '<a class="btn btn-warning" href="' . route('course.edit', ['id' => $course->st_id]) . '">Edit</a>'  . '|'
                            . '<a class="btn btn-danger" href="' . route('course.delete', ['id' => $course->st_id]) . '">Delete</a>' . '</td>' . '|' .
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

    public function sheetCourse()
    {
        return Excel::download(new CoursesExport, 'courses.xlsx');
    }
    public function addStuff()
    {
        return view('admin.stuff.add');
    }
    public function notice()
    {
        return view('admin.notice.notice');
    }
    public function createStuff(StuffRequest $req)
    {
        $stuff = new Stuff;
        $stuff->username = $req->username;
        $stuff->fullname = $req->fullname;
        $stuff->password = $req->password;
        $stuff->email = $req->email;
        $stuff->address = $req->address;
        $stuff->p_num = $req->phone;
        $stuff->dob =  $req->dob;
        // $stuff->type =  $req->type;
        // $user->profile_img = '';
        $stuff->save();

        $user = new User;
        $user->username = $req->username;
        $user->password = $req->password;
        $user->email = $req->email;
        $user->type =  $req->type;
        // $user->profile_img = '';
        $user->save();
        return redirect()->route('stuff.list');
    }
    public function uploadfile(Request $request)
    {
        $data = new Document;
        if ($request->file('file')) {
            $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $request->file->move('storage/', $filename);
            $data->file = $filename;
        }
        $data->c_id = $request->c_id;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->save();
        return redirect()->back();
    }
    public function listScholarship()
    {
        $scholarships = Scholarship::all();
        return response()->json([
            'status' => 200,
            'scholarships' => $scholarships

        ]);
    }
    public function acceptScholarship(Request $req, $id)
    {
        $scholarships = Scholarship::find($id);
        $scholarships->status = "accepted";
        $scholarships->save();

        return response()->json([
            'status' => 200,
            'scholarships' => $scholarships

        ]);
    }
    public function rejectScholarship(Request $req, $id)
    {
        $scholarships = Scholarship::find($id);
        $scholarships->status = "rejected";
        $scholarships->save();
        return response()->json([
            'status' => 200,
            'scholarships' => $scholarships

        ]);
    }
    // public function deleteScholarship($id)
    // {

    //     $scholarships = Scholarship::find($id);
    //     return response()->json([
    //         'status' => 200,
    //         'scholarships' => $scholarships

    //     ]);
    // }
}
