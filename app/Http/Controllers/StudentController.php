<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Session;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        Session::all(); Session::put('key','Asim');
        //$id = 1;
   // $data['detail']=Student::find($id);
    $data['detail']=Student::all();
 // return json_encode(Student::all());
     return  view('welcome',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        dd($request->all());
        // $student = Student::find(1);
        //or
        // $student = new Student;

        // $student->name = "Sharique";
        // $student->fname = "Raees";
        // $student->save();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($class, $section)
    {
        dd($class . " " . $section);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $student = new Student;
        $student->name = $request->name;
        $student->fname = $request->fname;
        $response = $student->save();
          // return response()->json(response);
    //   echo $student->name;
        $data  = [
             'id' =>  $student->id,
            'name' => $request->name,
            'fname' => $request->fname,
        ];
        // dd($data);
        // redirect(url('/'));
        return json_encode($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }
    public function js(Request $request)
    {
        return json_encode(Student::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
