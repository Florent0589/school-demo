<div class="card-body">
    <div class="card-header">
        Subjects
    </div>
    @if(count($subjects) > 0)
        <table class="table table-hover table-striped">
            <thead>
            <th>#</th>
            <th>SUBJECT</th>
            <th>CA MARK</th>
            <th>EXAM MARK</th>
            <th>FINAL MARK</th>
            <th>OPTIONS</th>
            </thead>
            <tbody>
            @foreach($subjects as $index => $subject)

                <tr>
                    <td>{{$index+1}}</td>
                    <td>{{ $subject->name }}</td>
                    <td>{{ $subject->ca_mark }}</td>
                    <td>{{ $subject->exam_mark }}</td>
                    <td>{{ $subject->final_mark }}</td>
                    <td>
                        <div class="btn-group btn-group-toggle">
                            <a class="btn btn-success btn-sm" href="/subjects/{{ $subject->id }}/show">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a class="btn btn-primary btn-sm" href="/subjects/{{ $subject->id }}/edit">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a class="btn btn-danger btn-sm" href="/subjects/{{ $subject->id }}/delete">
                                <i class="fa fa-trash"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <table class="table table-hover table-striped">
        <tr>
            <td style="text-align: center;font-size: large;"> Average {{ round($average, 1) }} %</td>
        </tr>
        </table>
    @else
        <p>no subjects yet</p>
    @endif
    <input type="hidden" name="grade_id" id="grade_id" value="{{ $arrPersonalInfo['grade_id'] }}">
</div>
