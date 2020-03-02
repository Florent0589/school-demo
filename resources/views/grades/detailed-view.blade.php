
    <div class="card">
        <div class="card-header">
            {{ $grade->name }} subjects
            <a class="btn btn-primary"  onclick="event.preventDefault();showLess()" href="">Less Details </a>
        </div>
        
        
        <div class="card-body">
        @if(count($subjects) > 0)
                <table class="table table-hover table-striped">
                    <thead>
                    <th>#</th>
                    <th>NAME</th>
                    <th>CODE</th>
                    <th>PASSING_MARK</th>
                    <th>CA MARK</th>
                    <th>EXAM MARK</th>
                    <th>NUMBER OF CA TEST</th>
                    </thead>
                    <tbody>
                        @foreach($subjects as $index => $grade)
                        <tr>

                            <td>{{$index+1}}</td>
                            <td>{{ $grade->name }}</td>
                            <td>{{ $grade->code }}</td>
                            <td>{{ $grade->passing_mark }}</td>
                            <td>{{ $grade->ca_mark }}</td>
                            <td>{{ $grade->exam_mark }}</td>
                            <td>{{ $grade->number_of_ca }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>no subjects yet</p>
            @endif  
        </div>
    </div>
 
