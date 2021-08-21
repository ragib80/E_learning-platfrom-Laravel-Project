<?php

namespace App\Http\Controllers\Instructor;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

//use App\Exports\CoursesExport;
//use App\Http\Requests\CourseRequest;
//use Maatwebsite\Excel\Facades\Excel;

use App\Models\Course;



class CourseController extends Controller
{
    public function index()
    {
          $course = Course::all();
          return $course;
    }
    /*public function details($c_id)
    {
        
        $course = Course::find($c_id);
        return view('course.details')->with('course', $course);
    }*/
    public function create(){
        return view('instructor.course.create');
    }
    public function insert(Request $req)
    {
    

        $course = new Course;
        $course->c_name = $req->input('c_name');
        $course->img = $req->file('img')->store('image');
        $course->status = $req->input('status');
        $course->description = $req->input('description');
        
        $course->save();
        return $course;
    }
    
    public function destroy($c_id){
        $deta = Course::find($c_id);
        $deta->delete();
        return $deta;
    }

    public function details($c_id)
    {
        
        $deta = Course::find($c_id);
        return $deta;
    }
    
    public function update(Request $req, $c_id)
    {
        
        $course = Course::find($c_id);
        
        $course->c_name = $req->input('c_name');
        //$course->img =  $req->file('img')->store('image');
        $course->status = $req->input('status');
        $course->description = $req->input('description');
        
        $course->save();
        return  $course;
    }

    public function searchCourse(Request $request,$keyowrd){

        $data=Course::where('c_id', 'like', '%' . $keyowrd . '%')
            ->orWhere('c_name', 'like', '%' . $keyowrd . '%')
            ->get();
            
        if($data){
            return response()->json($data, 200);
        }else{
            return response()->json([
                'code'=>401, 
                'message' => 'No Product Found!']);
        }
    }


   

    public function course()

    {

        return Excel::download(new CoursesExport, 'Courses.xlsx');

    }

 

    /*public function searching(Request $req){
        $q = $req->q;
        $course = Course::where('c_id', 'LIKE', '%'.$q.'%')
                            ->orWhere('c_name', 'LIKE', '%'.$q.'%')
                            ->get();
        if (count($course)>0) {
            return view('course.searchresult')->withDetails($course)->withQuery($q);
        }else{
            return view ('course.searchresult')->withMessage('No Details found. Try to search again !');
        }
    }*/

}
