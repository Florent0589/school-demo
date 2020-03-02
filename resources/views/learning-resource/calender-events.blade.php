<table class="table table-striped table-dark">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Description</th>
        <th scope="col">Created</th>
    </tr>
    </thead>
    <tbody>
    @foreach($upcoming_events as $index => $my_events)
        <tr>
            <th scope="row">{{ ($index + 1) }}</th>
            <td>{{ $my_events['title'] }}</td>
            <td>{{ $my_events['description'] }}</td>
            <td>{{ $my_events['title'] }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
