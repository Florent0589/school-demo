<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentSubject extends Model
{
    //
    protected $table = 'student_subjects';

    static public function getStudentSubject($id)
    {
        $arrStudents = [];
        $students    = self::where('subject_id', $id)->pluck('student_id', 'student_id');
        if ($students != null) {
            foreach ($students as $student) {
                $arrStudents[] = Student::find($student);
            }
        }
        return $arrStudents;
    }

    static public function getSubjectForStudent($student_id)
    {
        $sbujects    = self::where('student_id', $student_id)->get();

        foreach ($sbujects as $sbuject)
        {
            $get_sbuject  = Subject::find($sbuject->subject_id);
            $sbuject->name = $get_sbuject->name;
        }
        return $sbujects ;
    }
}
