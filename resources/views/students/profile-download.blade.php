<div>
    <table class="table" style="width: 100%; border-radius: 5px;text-align: center; border-style: dashed;padding: 3px;">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Personal Information</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>FIRSTNAME</td>
            <td>{{ $student->first_name }}</td>
        </tr>
        <tr>
            <td>LASTNAME</td>
            <td>{{ $student->last_name }}</td>
        </tr>
        <tr>
            <td>ID NUMBER</td>
            <td>{{ $student->id_number }}</td>
        </tr>
        <tr>
            <td>CONTACT</td>
            <td>{{ $student->mobile }} / {{ $student->home_number }}</td>
        </tr>
        <tr>
            <td>EMAIL</td>
            <td>{{ $student->email }}</td>
        </tr>
        <tr>
            <td>GRADE</td>
            <td>{{ $student->getGrade($student->grade_id) }}</td>
        </tr>
        <tr>
            <td>BALANCE</td>
            <td>{{ $student->balance }}</td>
        </tr>
        <tr>
            <td>ADDRESS</td>
            <td>{{ $student->physical_address }}</td>
        </tr>
        </tbody>
    </table>
    <br>
    <table class="table" style="width: 100%; border-radius: 5px;text-align: center;border-style: dashed;padding: 3px;">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Student Gurdain</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>FIRSTNAME</td>
            <td>{{ $gurdain->first_name }}</td>
        </tr>
        <tr>
            <td>LASTNAME</td>
            <td>{{ $gurdain->last_name }}</td>
        </tr>
        <tr>
            <td>LASTNAME</td>
            <td>{{ $gurdain->last_name }}</td>
        </tr>
        <tr>
            <td>ID NUMBER</td>
            <td>{{ $gurdain->id_number }}</td>
        </tr>
        <tr>
            <td>CONTACT</td>
            <td>{{ $gurdain->mobile }} / {{ $gurdain->home_number }}</td>
        </tr>
        <tr>
            <td>EMAIL</td>
            <td>{{ $gurdain->email }}</td>
        </tr>
        <tr>
            <td>ADDRESS</td>
            <td>{{ $gurdain->address }}</td>
        </tr>
        </tbody>
    </table>
    <br>
    <table class="table" style="width: 100%; border-radius: 5px;text-align: center;border-style: dashed;padding: 3px;">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Subject</th>
            <th scope="col">Ca Mark</th>
            <th scope="col">Exam Mark</th>
            <th scope="col">Final Mark</th>
        </tr>
        </thead>
        <tbody>
        @foreach($subjects as $subject)
        <tr>
            <td>{{ $subject->name }}</td>
            <td>{{ $subject->ca_mark }}</td>
            <td>{{ $subject->exam_mark }}</td>
            <td>{{ $subject->final_mark }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>

