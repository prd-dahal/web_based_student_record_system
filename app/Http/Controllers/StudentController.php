<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use DB;
class StudentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students=Student::all();
        return view('students.index')->with('students',$students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $this->validate($request,[
            'name'=>'required',
            'address'=>'required',
            'faculty'=>'required',
            'semester'=>'required',
            'student_photo'=>'image |nullable|max:1999'
        ]);

        //hadnle file upload
        if($request->hasFile('student_photo')){
            //get filename with the extension
            $filenameWithExt=$request->file('student_photo')->getClientOriginalName();
            //get just file name
            $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
            //get just extension
            $extension=$request->file('student_photo')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore=$filename.'_'.time().'.'.$extension;
            //upload image
            $path=$request->file('student_photo')->storeAs('public/student_photos',$fileNameToStore);
        }
        else{
            $fileNameToStore='noimage.jpg';
        }
         $student=new Student;
         
         $student->name=$request->input('name');
         $student->address=$request->input('address');
         $student->faculty=$request->input('faculty');
         $student->semester=$request->input('semester');
         $student->details=$request->input('details');
         $student->student_photo=$fileNameToStore;
         $student->save();
         return redirect('/student')->with('success','Student Added to Database');
        // DB::table('students')->insertGetId(
        //     ['name'=>$request->input('name'),'address'=>$request->input('address'),'faculty'=>$request->input('faculty'),'semester'=>$request->input('semester')]
        // );
        // Student::create([
        //     's_id'=>auth()->id(),
        //     'name'=>$request->input('name'),
        //     'address'=>$request->input('address'),
        //     'faculty'=>$request->input('faculty'),
        //     'semester'=>$request->input('semester')
        // ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student=Student::find($id);
       // $student= DB::select("SELECT * from students where s_id=$id");
        
        return view('students.show')->with('student',$student);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student=Student::find($id);
        return view('students.edit')->with('student',$student);
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
        $this->validate($request,[
            'name'=>'required',
            'address'=>'required',
            'faculty'=>'required',
            'semester'=>'required'
        ]);
        $student=Student::find($id);
        $student->name=$request->input('name');
        $student->address=$request->input('address');
        $student->faculty=$request->input('faculty');
        $student->semester=$request->input('semester');
        $student->details=$request->input('details');
        $student->save();
        return redirect('/student')->with('success','Student\'s details updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
       Student::where('id',$id)->delete();
     
        return redirect('/student')->with('success','Student Removed');
    }
}
