<div>
    <table class="table" style="width: 100%; border-radius: 5px;text-align: center;border-bottom-style: solid;padding: 3px;">
        <tbody>
        <tr>
            <td> {{strtoupper('Student Academic Report')}}</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        </tbody>
    </table>
    <br>
    <br>
    <table class="table" style="width: 100%; border-radius: 5px;text-align: center;padding: 3px;">
        <tbody>
        <tr>
            <td> Personal Information</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        </tbody>
    </table>
    <br>
    <table class="table" style="width: 100%; border-radius: 5px;text-align: center; border-style: dashed;padding: 3px;">
        <thead class="thead-dark">
        <tr>
            <th scope="col"></th>
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
        <tr>
            <td> GURDAIN NAMES</td>
            <td>{{ $gurdain->first_name }} {{ $gurdain->last_name }}</td>
        </tr>
        <tr>
            <td>GURDAIN CONTACT</td>
            <td>{{ $gurdain->mobile }} / {{ $gurdain->home_number }}</td>
        </tr>
        <tr>
            <td>GURDAIN ADDRESS</td>
            <td>{{ $gurdain->address }}</td>
        </tr>
        </tbody>
    </table>
    <br>

    <br>
    <table class="table" style="width: 100%; border-radius: 5px;text-align: center;padding: 3px;">
        <tbody>
        <tr>
            <td> Academic Result</td>
            <td></td>
            <td></td>
            <td></td>
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
        <tr>
            <td  style="border-bottom:1px solid black !important;"></td>
            <td  style="border-bottom:1px solid black !important;"></td>
            <td  style="border-bottom:1px solid black !important;"></td>
            <td  style="border-bottom:1px solid black !important;"></td>
        </tr>
        <tr>
            <td>AGGREGATE</td>
            <td></td>
            <td></td>
            <td>{{ round($average, 1) }} %</td>
        </tr>
        <tr>
            <td>PASS / FAIL</td>
            <td></td>
            <td></td>
            <td>
                @if($grade->passing_mark < $average)
                    <p style="color: #1c7430; font-weight: bolder;">PASS</p>
                @else
                    <p style="color: #b91d19; font-weight: bolder;">FAIL</p>
                @endif
            </td>
        </tr>
        </tbody>
    </table>
</div>

