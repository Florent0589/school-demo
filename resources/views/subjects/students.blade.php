<div class="card-body">
    @if(count($students) > 0)
        <table class="table table-hover table-striped">
            <thead>
            <th>#</th>
            <th>ID NUMBER</th>
            <th>NAMES</th>
            <th>RECENT MARK</th>
            <th>OPTIONS</th>
            </thead>
            <tbody>
            @foreach($students as $index => $student)
                <tr>
                    <td>{{$index+1}}</td>
                    <td>{{$student->id_number}}</td>
                    <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                    <td>0</td>
                    <td>
                        <div class="btn-group btn-group-toggle">
                            <a class="btn btn-success btn-sm" href="/students/{{ $student->id }}">
                                <i class="fa fa-history"></i>
                            </a>
                            <a class="btn btn-primary btn-sm" href="/students/{{ $student->id }}/edit">
                                <i class="fa fa-file-excel-o"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p>no students yet</p>
    @endif
</div>
