<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Document;

class NoteController extends Controller
{
    public function uploadfile(Request $request ){
        $data=new Document;
         if($request->file('file')){
             $file=$request->file('file');
             $filename=time().'.'.$file->getClientOriginalExtension();
             $request->file->move('storage/',$filename);
             $data->file=$filename;
         } 
         $data->c_id=$request->c_id;
         $data->title=$request->title;
         $data->description=$request->description;
         $data->save();
         return $data;
        // return response()->json($data, 200);
         //return redirect()->back();
 
         }

         public function view(){
            $file=Document::all();
            return $file;
         }
         public function download($file){
            //$data=Document::find($id);
           // return ('note.view',compact('data'));
           return response()->download('storage/'.$file);
           
         }

         public function show($id){
            $data=Document::find($id);
        return $data;
        }
}
