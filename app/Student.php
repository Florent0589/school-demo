<?php

namespace App;

use App\Grade;
use App\StudentSubject;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $table = 'students';

    public function getGrade($id)
    {
        $grade = Grade::find($id);
        return $grade->name .' '.$grade->code;
    }

    public function getGurdian($id)
    {
        $gurdian = StudentGurdain::find($id);
        return $gurdian->last_name .' '.$gurdian->first_name. ' '.$gurdian->mobile;
    }

    public function getAverage($id)
    {
        $average    = StudentSubject::where('student_id', $id)->avg('final_mark');
        return $average;
    }

    public function getLastThreeScores($id)
    {
        $subjects  = StudentSubject::getSubjectForStudent($id);
        return $subjects;
    }
}
