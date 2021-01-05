<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $students = Student::all();
        return view ('students.index' ,compact('students'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
        // step 1: validate the request data
        $request->validate($this->validationRoutes());

        // step 2: store data in DB
        $student = new Student();
        $student->Name = $request->Name;
        $student->Course= $request->Course;
        $student->Country = $request->Country;
       
        $student->save();

        // step 3: redirection
        return redirect('/students')->with('success', 'New Student added successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
         return view('students.index')->with('students',$student);
     // return view('students.show',compact('students',$student));
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
       $student =Student::findOrFail($id);
        return view('students.edit',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //
        $validatedData = $request->validate(
            $this->validationRoutes());
    
            Student::whereId($id)->update($validatedData);

            return redirect('/students')->with('success', 'student Data is successfully updated');
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
        $student->delete();
  
        return redirect()->route('students.index')
                        ->with('success','Student deleted successfully');
    }


    private function validationRoutes(){
        return[
            'Name' => 'required',
            'Course' => 'required',
            'Country' => 'required'
        ];
    }
}
