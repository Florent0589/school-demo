
<p style="">
    List of Students
</p>
@if(count($students) > 0)
    <table>
        <tr>
        <td>#</td>
        <td>ID NUMBER</td>
        <td>NAMES</td>
        <td>CONTACT</td>
        <td>GRADE</td>
        <td>GURDIAN</td>
        <td>BALANCE</td>
        </tr>
        </tr>
        @foreach($students as $index => $student)
            <tr>
                <td>{{$index+1}}</td>
                <td>{{$student->id_number}}</td>
                <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                <td>{{ $student->email }} {{ $student->mobile }}</td>
                <td>{{ $student->getGrade($student->grade_id) }}</td>
                <td>{{ $student->getGurdian($student->gurdian_id) }}</td>
                <td>SZL {{ $student->balance }}</td>                
            </tr>
        @endforeach
    </table>
@else
    <p>no students yet</p>
@endif
