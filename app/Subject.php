<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'subjects';

    static public function calculateSubjectAverage($id, $student_id, $grade_id, $assessment_id)
    {
        return StudentMark::where([
                                        'student_id' => $student_id,
                                        'grade_id'   => $grade_id,
                                        'assessment_type' => $assessment_id,
                                        'subject_id'  => $id
                                    ]
                                    )->avg('mark');
    }

    public function getGrade($id)
    {
        $grade = Grade::find($id);
        return $grade->name.' '.$grade->code;
    }
}
