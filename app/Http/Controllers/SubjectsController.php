<?php

namespace App\Http\Controllers;

use App\Student;
use App\StudentMark;
use App\StudentSubject;
use Illuminate\Http\Request;
use App\User;
use App\Grade;
use App\Subject;
use App\Role;
use Auth;

class SubjectsController extends Controller
{
    /**
     * const
     */
    const CA_MARK = 1;
    const EXAM = 2;
    const PRACTICAL = 3;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $request_data = \request()->all();

        $subjects = Subject::orderBy('id' , 'DESC')->paginate(8);
        if(Auth::user()->role_id == Role::TUTOR)
        {
            $subjects = Subject::where(['user_id' => Auth::user()->id])->orderBy('id' , 'DESC')->paginate(8);
        }

        if(isset($request_data['g']))
        {
            $grade = Grade::find($request_data['g']);
            $subjects = Subject::where(['user_id' => Auth::user()->id, 'grade_id' => $request_data['g']])->orderBy('id' , 'DESC')->get();
            return view('timetable.subjects', compact('subjects', 'grade'));
        }

        return view('subjects.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grades = Grade::all();
        $tutors = User::all();
        return view('subjects.create',compact('grades', 'tutors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $form_data = \request()->all();

        $new_subject                = new Subject();
        $new_subject->name          = $form_data['name'];
        $new_subject->other_name    = $form_data['other_name'];
        $new_subject->code          = null;
        $new_subject->user_id       = $form_data['user_id'];
        $new_subject->grade_id      = $form_data['grade_id'];
        $new_subject->passing_mark  = $form_data['passing_mark'];
        $new_subject->number_of_ca  = $form_data['number_of_ca'];
        $new_subject->ca_mark       = $form_data['ca_mark'];
        $new_subject->exam_mark     = $form_data['exam_mark'];
        $new_subject->save();

        return redirect('/subjects')->with('success', 'Successfully saved subject '. $new_subject->name);

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
        $students = StudentSubject::getStudentSubject($id);
        $subject = Subject::find($id);
        $grades = Grade::all();
        $tutors = User::all();
        return view('subjects.show',compact('grades', 'tutors', 'subject', 'students'));
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
        $subject = Subject::find($id);
        $grades = Grade::all();
        $tutors = User::all();
        return view('subjects.edit',compact('grades', 'tutors', 'subject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        //
        $form_data = \request()->all();
        $new_subject                =  Subject::find($id);
        $new_subject->name          = $form_data['name'];
        $new_subject->other_name    = $form_data['other_name'];
        $new_subject->code          = null;
        $new_subject->user_id       = $form_data['user_id'];
        $new_subject->grade_id      = $form_data['grade_id'];
        $new_subject->passing_mark  = $form_data['passing_mark'];
        $new_subject->number_of_ca  = $form_data['number_of_ca'];
        $new_subject->ca_mark       = $form_data['ca_mark'];
        $new_subject->exam_mark     = $form_data['exam_mark'];
        $new_subject->save();

        return redirect('/subjects')->with('success', 'Successfully saved subject '. $new_subject->name);
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

    public function subjectsTotal()
    {
        $subjects = \request()->all();
        $subject  = isset($subjects['subjects']) ? $subjects['subjects'] : [];
        if($subject == null)
        {
            if(\Session::has('subject'))
            {
                $subject = \Session::get('subject');
            }
        }

        $subjects_amount = [];
        foreach ($subject as $subject_id){
            $subject = Subject::find($subject_id);
        }

        $grade = Grade::find($subjects['grade_id']);

        $subjects_amount['exam']        = $grade->exam_fee;
        $subjects_amount['book']        = $grade->book_fee;
        $subjects_amount['tution']      = $grade->tution_fee;
        $subjects_amount['projects']    = $grade->projects_fee;
        $subjects_amount['total']       = $grade->projects_fee + $grade->tution_fee + $grade->book_fee + $grade->exam_fee;

        return response()->json($subjects_amount);
    }

    public function saveStudentMarks($id)
    {
        $form_data = \request()->all();
        $subject   = Subject::find($id);

        foreach ($form_data as $field => $value)
        {
            if(strpos($field, '_stdmark') !== false)
            {
                $student_id = explode('_', $field);
                $student    = Student::find($student_id[0]);

                $student_mark = new StudentMark();
                $student_mark->student_id = $student->id;
                $student_mark->status_id = 1;
                $student_mark->subject_id = $id;
                $student_mark->grade_id = $subject->grade_id;
                $student_mark->grade_class_id = $student->grade_class_id;
                $student_mark->mark_date = date('Y-m-d');
                $student_mark->assessment_type = $form_data['assessment_type'];
                $student_mark->mark = $value;
                $student_mark->created_by = Auth::id();
                $student_mark->save();

                //update student subject
                $average = Subject::calculateSubjectAverage($id, $student->id, $student->grade_id,  $form_data['assessment_type']);

                $student_subject = StudentSubject::where(['student_id' => $student->id, 'subject_id' => $id, 'grade_id' => $student->grade_id])->first();

                switch ($form_data['assessment_type'])
                {
                    case self::CA_MARK:
                        $student_subject->ca_mark = ($subject->ca_mark / 100) * $average;
                        break;
                    case self::EXAM:
                        $student_subject->exam_mark = ($subject->exam_mark / 100) * $average;
                        break;
                }
                $student_subject->final_mark = $student_subject->exam_mark + $student_subject->ca_mark;
                $student_subject->save();

            }
        }

        return redirect('/subjects/'.$id.'/show')->with('success', 'Successfully entered Student Marks');
    }
}
