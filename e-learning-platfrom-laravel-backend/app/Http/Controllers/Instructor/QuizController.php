<?php

namespace App\Http\Controllers\Instructor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Quizes;
use App\Models\Questions;


class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=Quizes::all();
        return $data;
        return response()->json([
            'code'=>200, 
            'message' => 'Found SuccessFully!']);
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->all();
       $qz=Quizes::create($data);
       
       return $qz;
       return response()->json([
        'code'=>200, 
        'message' => 'Added SuccessFully!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Quizes::find($id);
        $questions=Questions::where('quizes_id',$id)->get();

        return response([
            'data'=> $data,
            'questions'=> $questions
           ], 200);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function delete($id)
    {
        $quizes = Quizes::find($id);
        return view('instructor.quiz.delete')->with('quizes', $quizes);
    }
    public function destroy($id)
    {
        Quizes::destroy($id);
        return redirect()->route('course.index');
        
    }
    public function AddQuestion($id)
    {
         
        $data=Quizes::find($id);
        return $data;

    }
    public function status($id)
    {
        $quiz=Quizes::all();        $data=Quizes::find($id);
        if($data->status=="1"){
            $data->status=0;
        }else{
        $data->status=1;
        }
        $data->save();

    }
}
