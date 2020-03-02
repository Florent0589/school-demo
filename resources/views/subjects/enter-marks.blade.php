<form method="POST" action="/saveStudentMarks/{{$subject->id}}">
    @csrf
    <div class="card-body">
        @if(count($students) > 0)
            <div class="form-group row">
                <label for="assessment_type" class="col-md-4 col-form-label text-md-right">{{ __('Assessment Type') }}</label>

                <div class="col-md-6">
                    <select name="assessment_type" class="form-control">
                        <option value="" > --- Select --- </option>
                        <option value="1"> CA </option>
                        <option value="2"> EXAM </option>
                        <option value="3"> PRACTICAL </option>
                    </select>
                </div>
            </div>
            <hr>
            <table class="table table-hover table-striped">
                <thead>
                <th>#</th>
                <th>NAMES</th>
                <th>AVERAGE</th>
                <th>MARK INPUT</th>
                <th>OPTIONS</th>
                </thead>
                <tbody>
                @foreach($students as $index => $student)
                    <tr>
                        <td>{{$index+1}}</td>
                        <td>{{ $student->first_name }} {{ $student->last_name }}<br> {{$student->id_number}}</td>
                        <td>0</td>
                        <td>
                            <input type="number" class="form-control" id="{{$student->id}}_stdmark" name="{{$student->id}}_stdmark" placeholder="0">
                        </td>
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
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Save') }}
                    </button>
                    <a href="/users" class="btn btn-danger">
                        {{ __('Cancel') }}
                    </a>
                </div>
            </div>
        @else
            <p>no students yet</p>
        @endif
    </div>
</form>
