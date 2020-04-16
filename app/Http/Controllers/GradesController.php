<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grade;
use App\GradeClass;
use App\Subject;
use App\Role;
use Auth;
use App\User;

class GradesController extends Controller
{
    const GRADE_CODE = 'CL';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $request_data = \request()->all();

        $grades = Grade::orderBy('id', 'DESC')->paginate(5);
        if(Auth::user()->role_id == Role::TUTOR)
        {
            $grades = Grade::where(['user_id' => Auth::user()->id])->orderBy('id' , 'DESC')->paginate(8);
        }
        if(isset($request_data['t']))
        {
            return view('timetable.index', compact('grades'));
        }
        return view('grades.grades', compact('grades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tutors = User::where('role_id', Role::TUTOR)->get();
        return view('grades.create', compact('tutors'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // get all data
        $request_data = $request->all();

        $grade                  = new Grade();
        $grade->name            = $request_data['name'];
        $grade->code            = 0000;
        $grade->passing_mark    = $request_data['passing_mark'];
        $grade->user_id         = $request_data['user_id'];
        $grade->tution_fee      = $request_data['tution_fee'];
        $grade->book_fee        = $request_data['book_fee'];
        $grade->exam_fee        = $request_data['exam_fee'];
        $grade->number_of_classes        = count($request_data['grade_class']);
        $grade->projects_fee    = $request_data['projects_fee'];
        $grade->save();

        if(isset($request_data['grade_class']))
        {
            foreach ($request_data['grade_class'] as $key => $value) {

                $grade_class                    = new GradeClass();
                $grade_class->name              = $grade->name .''. $value;
                $grade_class->user_id           = $request_data['user_id'];
                $grade_class->code              = $value;
                $grade_class->grade_id          = $grade->id;
                $grade_class->number_of_student = 0;
                $grade_class->save();

            }
        }

        $update_code = Grade::find($grade->id);
        $update_code->code = $this->generateCode($grade->id);
        $update_code->save();

        return redirect('/grades')->with('success', 'Successfully saved '. $grade->name.' details.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $tutors = User::where('role_id', Role::TUTOR)->get();
        $grade = Grade::find($id);
        $subjects = Subject::where('grade_id', $id)->get();;
        return view('grades.edit', compact('grade', 'subjects', 'tutors'));
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
        // get all data
        $request_data = $request->all();

        $grade                  =  Grade::find($id);
        $grade->name            = $request_data['name'];
        $grade->code            = $this->generateCode($id);
        $grade->passing_mark    = $request_data['passing_mark'];
        $grade->user_id         = $request_data['user_id'];
        $grade->tution_fee      = $request_data['tution_fee'];
        $grade->book_fee        = $request_data['book_fee'];
        $grade->exam_fee        = $request_data['exam_fee'];
        $grade->number_of_classes        = isset($request_data['grade_class']) ? count($request_data['grade_class']) : $grade->number_of_classes;
        $grade->projects_fee    = $request_data['projects_fee'];
        $grade->save();

        if(isset($request_data['grade_class']))
        {
            foreach ($request_data['grade_class'] as $key => $value) {

                if(!GradeClass::where(['code' => $value])->first())
                {
                    $grade_class                    = new GradeClass();
                    $grade_class->name              = $grade->name .''. $value;
                    $grade_class->user_id           = $request_data['user_id'];
                    $grade_class->code              = $value;
                    $grade_class->grade_id          = $grade->id;
                    $grade_class->number_of_student = 0;
                    $grade_class->save();
                }
            }
        }

        return redirect('/grades')->with('success', 'Successfully updated '. $grade->name.' details.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function generateCode($grade_id)
    {
        // $sub_code = self::GRADE_CODE.''$grade_id;

        // if(count($sub_code) <= )

        return self::GRADE_CODE.''.$grade_id;
    }


    public function getGradeClass($grade_id)
    {
        $classess = GradeClass::where('grade_id', $grade_id)->get();
        $data = $classess;
        $id_field = 'id';
        $name_field = 'name';
        $default_name = 'Grade Class';
        $grade_options = view('select.options', compact('data', 'id_field','name_field', 'default_name'))->render();

        $subjects = Subject::where('grade_id', $grade_id)->get();
        $data = $subjects;
        $id_field = 'id';
        $name_field = 'name';
        $default_name = 'Subjects';
        $sub_options = view('select.options', compact('data', 'id_field','name_field', 'default_name'))->render();

        return response()->json(['classgrade' => $grade_options, 'subjects' => $sub_options]);
    }
}
