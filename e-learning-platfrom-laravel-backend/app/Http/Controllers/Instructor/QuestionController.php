<?php

namespace App\Http\Controllers\Instructor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quizes;
use App\Models\Questions;
use App\Models\Options;

class QuestionController extends Controller
{
    public function index()
    {
        $questions=Questions::all();
        return view('instructor.Exam.question.view',compact('questions'));
    }

   
    
     
    public function store(Request $request)
    {
           /*$this->validate($request,[
       'question'=>'required|unique:questions,question,NULL,id,quizes_id,'.$request->quizes_id,
        'quizes_id'=>'required',

       ]);*/

       $data=$request->all();
      $ques= Questions::create($data);
       
       if(count($request->option) > 0) {
        foreach ($request->option as $item=>$v) {
        $datad=array(
          'questions_id'=>$ques->id,
          'option'=>$request->option[$item]
        );
        Options::insert($datad);
      }
      }

       return redirect()->back()->with('success','Data add successfully');
    }

    
    public function show($id)
    {
        //
    }

     
    public function edit($id)
    {
        $data=Questions::find($id);
          $quiz=Quizes::all();
        return view('instructor.Exam.question.edit',compact('data','quiz'));
    }

    
    public function update(Request $request, $id)
    {
         $this->validate($request,[
        'quizes_id'=>'required',
        'question'=>'required',
       ]);
        $data=Questions::find($id);
        $new_data=$request->all();
        $data->update($new_data);

         if(count($request->option_id) > 0) {
        foreach ($request->option_id as $item=>$v) {
        $datad=array(
          
          'option'=>$request->option[$item]
           
        );
        $dbazar=Options::where('id',$request->option_id[$item])->first();
        $dbazar->update($datad);
      }
      }

        return redirect()->back()->with('success','Data update successfully');  
    }

    
    public function destroy($id)
    {
        //
    }
}
