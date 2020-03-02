<?php

namespace App\Http\Controllers;

use App\Grade;
use App\GradeClass;
use App\IdentificaitonType;
use App\Relationship;
use App\Student;
use App\StudentGurdain;
use App\StudentSubject;
use App\Subject;
use App\Status;
use App\User;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //
        $students = Student::orderBy('last_name', 'asc')->paginate(10);
        $statuses = Status::all();
        $grades = Grade::all();
        return view('students.index', compact('students', 'statuses', 'grades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $arrPersonalInfo        = \Session::has('personal-info') ? \Session::get('personal-info') : [];
        $arrNextOfKeen          = \Session::has('next-of-keen') ? \Session::get('next-of-keen') : [];
        $arrPayament            = \Session::has('payment') ? \Session::get('payment') : [];
        $arrSubject             = \Session::has('subject') ? \Session::get('subject') : [];



        $types = IdentificaitonType::all();
        $grades = Grade::all();
        $relationship = Relationship::all();
        return view('students.create',compact('types',
                                                        'grades',
                                                        'relationship',
                                                        'arrPersonalInfo',
                                                        'arrPayament',
                                                        'arrNextOfKeen',
                                                        'arrSubject'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
    }

    public function savePersonalInfo()
    {
        //
        $form_data = \request()->all();
        \Session::put('personal-info', $form_data);

        return redirect()->back()->with('success', 'Successfully saved Person Info Details');
    }

    public function saveNextOfKeen()
    {
        //
        $form_data = \request()->all();
        \Session::put('next-of-keen', $form_data);

        return redirect()->back()->with('success', 'Successfully saved Next of Keen Details');
    }

    public function savePayments()
    {
        //
        $form_data = \request()->all();
        \Session::put('payment', $form_data);

        return redirect()->back()->with('success', 'Successfully saved Payment Details');
    }

    public function saveSubjects()
    {
        //
        $form_data = \request()->all();
        \Session::put('subject', $form_data);

        return redirect()->back()->with('success', 'Successfully saved Subject Details');
    }

    public function saveStudent()
    {
        //
        $arrPersonalInfo        = \Session::get('personal-info');
        $arrNextOfKeen          = \Session::get('next-of-keen');
        $arrPayament            = \Session::get('payment');
        $arrSubject             = \Session::get('subject');

        if (!empty($arrPersonalInfo) && !empty($arrNextOfKeen)) {

            $new_gurdain = new StudentGurdain();
            $new_gurdain->first_name = $arrNextOfKeen['first_name'];
            $new_gurdain->last_name = $arrNextOfKeen['last_name'];
            $new_gurdain->mobile = $arrNextOfKeen['mobile'];
            $new_gurdain->email = $arrNextOfKeen['email'];
            $new_gurdain->home_number = $arrNextOfKeen['home_number'];
            $new_gurdain->date_of_birth = $arrNextOfKeen['date_of_birth'];
            $new_gurdain->identificaiton_type_id = $arrNextOfKeen['identification_type_id'];
            $new_gurdain->id_number = $arrNextOfKeen['id_number'];
            $new_gurdain->passport_number = $arrNextOfKeen['passport_number'];
            $new_gurdain->address = $arrNextOfKeen['address'];
            $new_gurdain->created_by = Auth::user()->id;
            $new_gurdain->save();

            $this->createUserAccout($arrNextOfKeen, 4);

            $new_student = new Student();
            $new_student->first_name = $arrPersonalInfo['first_name'];
            $new_student->last_name = $arrPersonalInfo['last_name'];
            $new_student->mobile = $arrPersonalInfo['mobile'];
            $new_student->email = $arrPersonalInfo['email'];
            $new_student->home_number = $arrPersonalInfo['home_number'];
            $new_student->date_of_birth = $arrPersonalInfo['date_of_birth'];
            $new_student->identificaiton_type_id = $arrPersonalInfo['identification_type_id'];
            $new_student->id_number = $arrPersonalInfo['id_number'];
            $new_student->relationship_id = $arrNextOfKeen['relationship_id'];
            $new_student->passport_number = $arrPersonalInfo['passport_number'];
            $new_student->student_type_id = 1;
            $new_student->grade_id = $arrSubject['grade_id'];
            $new_student->grade_class_id = $arrSubject['grade_class_id'];
            $new_student->balance = $arrPayament['total_fee'];
            $new_student->gurdian_id = $new_gurdain->id;
            $new_student->physical_address = $arrPersonalInfo['address'];
            $new_student->status_id = 1;
            $new_student->created_by = Auth::user()->id;
            $new_student->pin = '';
            $new_student->save();

            if(isset($new_student->id))
            {
                $this->createUserAccout($arrPersonalInfo, 3);

                foreach ($arrSubject['subject_id'] as $subject_id) {

                    $new_subject = new StudentSubject();
                    $new_subject->student_id = $new_student->id;
                    $new_subject->subject_id = $subject_id;
                    $new_subject->grade_id = $new_student->grade_id;
                    $new_subject->grade_class_id = $new_student->grade_class_id;
                    $new_subject->exam_mark = 0;
                    $new_subject->final_mark = 0;
                    $new_subject->ca_mark = 0;
                    $new_subject->user_id = 1;
                    $new_subject->status_id = 1;
                    $new_subject->created_by = Auth::user()->id;
                    $new_subject->save();
                }

                \Session::forget('personal-info');
                \Session::forget('next-of-keen');
                \Session::forget('payment');
                \Session::forget('subject');
            }

        } else {
            return redirect('/students')->with('error', 'fill all the tab form');
        }
        return redirect('/students')->with('success', 'Successfully added a new student');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $arrPersonalInfo        = Student::find($id)->toArray();
        $arrPersonalInfo['address'] = $arrPersonalInfo['physical_address'];
        $arrNextOfKeen          = StudentGurdain::find($arrPersonalInfo['gurdian_id'])->toArray();
        $arrPayament            = [];
        $arrSubject             = StudentSubject::where('student_id', $id)->pluck('id', 'id');
        $subjects               = StudentSubject::getSubjectForStudent($id);
        $types = IdentificaitonType::all();
        $grades = Grade::all();
        $grade = Grade::find($arrPersonalInfo['grade_id']);
        $relationship = Relationship::all();
        $average    = StudentSubject::where('student_id', $id)->avg('final_mark');
        return view('students.show',compact('types',
            'grades',
            'relationship',
            'arrPersonalInfo',
            'arrPayament',
            'arrNextOfKeen',
            'arrSubject', 'subjects', 'average', 'grade'));

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
        $arrPersonalInfo        = Student::find($id)->toArray();
        $arrPersonalInfo['address'] = $arrPersonalInfo['physical_address'];
        $arrNextOfKeen          = StudentGurdain::find($arrPersonalInfo['gurdian_id'])->toArray();
//        $arrNextOfKeen['address'] = $arrNextOfKeen['physical_address'];
        $arrPayament            = [];
        $arrSubject             = StudentSubject::where('student_id', $id)->pluck('id', 'id');



        $types = IdentificaitonType::all();
        $grades = Grade::all();
        $relationship = Relationship::all();
        return view('students.edit',compact('types',
            'grades',
            'relationship',
            'arrPersonalInfo',
            'arrPayament',
            'arrNextOfKeen',
            'arrSubject'));
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

    public function updatePersonalInfo($id)
    {
        //
        $arrPersonalInfo = \request()->all();

        $update_student =  Student::find($id);
        $update_student->first_name = $arrPersonalInfo['first_name'];
        $update_student->last_name = $arrPersonalInfo['last_name'];
        $update_student->mobile = $arrPersonalInfo['mobile'];
        $update_student->email = $arrPersonalInfo['email'];
        $update_student->home_number = $arrPersonalInfo['home_number'];
        $update_student->date_of_birth = $arrPersonalInfo['date_of_birth'];
        $update_student->identification_type_id = $arrPersonalInfo['identification_type_id'];
        $update_student->id_number = $arrPersonalInfo['id_number'];
        $update_student->passport_number = $arrPersonalInfo['passport_number'];
        $update_student->student_type_id = 1;
        $update_student->physical_address = $arrPersonalInfo['address'];
        $update_student->save();

        return redirect()->back()->with('success', 'Successfully updated Personal Info Details');
    }

    public function updateNextOfKeen($id)
    {
        //
        $arrNextOfKeen = \request()->all();

        $new_gurdain =  StudentGurdain::find($id);
        $new_gurdain->first_name = $arrNextOfKeen['first_name'];
        $new_gurdain->last_name = $arrNextOfKeen['last_name'];
        $new_gurdain->mobile = $arrNextOfKeen['mobile'];
        $new_gurdain->email = $arrNextOfKeen['email'];
        $new_gurdain->home_number = $arrNextOfKeen['home_number'];
        $new_gurdain->date_of_birth = $arrNextOfKeen['date_of_birth'];
        $new_gurdain->identification_type_id = $arrNextOfKeen['identification_type_id'];
        $new_gurdain->id_number = $arrNextOfKeen['id_number'];
        $new_gurdain->passport_number = $arrNextOfKeen['passport_number'];
        $new_gurdain->address = $arrNextOfKeen['address'];
        $new_gurdain->save();

        return redirect()->back()->with('success', 'Successfully updated gurdain Details');
    }

    public function updatePayments($id)
    {
        //
        $form_data = \request()->all();

        $update_student =  Student::find($id);
        $update_student->balance = $form_data['total_fee'];
        $update_student->save();

        return redirect()->back()->with('success', 'Successfully updated Fees Details');
    }

    public function updateSubjects($id)
    {
        //
        $form_data = \request()->all();
        $student   = Student::find($id);

        foreach ($form_data['subject_id'] as $subject_id) {

            $chek_subject =  StudentSubject::where(['student_id' => $id, 'subject_id' => $subject_id])->first();

            if(!isset($chek_subject->id))
            {
                $new_subject = new StudentSubject();
                $new_subject->student_id = $id;
                $new_subject->subject_id = $subject_id;
                $new_subject->grade_id = $student->grade_id;
                $new_subject->grade_class_id = $student->grade_class_id;
                $new_subject->exam_mark = 0;
                $new_subject->final_mark = 0;
                $new_subject->ca_mark = 0;
                $new_subject->user_id = 1;
                $new_subject->status_id = 1;
                $new_subject->created_by = Auth::user()->id;
                $new_subject->save();
            }
        }

        return redirect()->back()->with('success', 'Successfully updated Subject Details');
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

    public function studentProfile($id)
    {
        $student = Student::find($id);
        $gurdain = StudentGurdain::find($student->gurdian_id);
        $subjects  = StudentSubject::getSubjectForStudent($id);

        $pdf  = \App::make('dompdf.wrapper');
        $view = view('students.profile-download', compact('student', 'gurdain', 'subjects'))->render();
        $pdf->loadHTML($view);
        return $pdf->stream();

    }

    public function academicReport($id)
    {
        $student = Student::find($id);
        $gurdain = StudentGurdain::find($student->gurdian_id);
        $subjects  = StudentSubject::getSubjectForStudent($id);
        $average    = StudentSubject::where('student_id', $id)->avg('final_mark');
        $grade = Grade::find($student->grade_id);

        $pdf  = \App::make('dompdf.wrapper');
        $view = view('students.academic-report', compact('student', 'gurdain', 'subjects', 'average','grade'))->render();
        $pdf->loadHTML($view);
        return $pdf->stream();
    }

    public function exportToPdf()
    {
        $form_data = \request()->all();
        $query     = Student::where('status_id', '!=', null);

        if($form_data['status_id'] != null)
        {
            $query->whereIn('status_id', $form_data['status_id']);
        }

        if($form_data['grade_id'] != null)
        {
            $query->where('grade_id', $form_data['grade_id']);
        }

        $students = $query->get();

        $pdf  = \App::make('dompdf.wrapper');
        $view = view('students.export', compact('students'))->render();
        $pdf->loadHTML($view);
        return $pdf->stream();
    }

    public function createUserAccout($data, $role_id)
    {
        User::createUserAccount($data, $role_id);
    }

}
