<option value="" disabled> Select {{ $default_name }}</option>
@if(sizeof($data) > 0)
    @foreach( $data as $record )
        <option value="{{ $record->$id_field }}" > {{ $record->$name_field }}</option>
    @endforeach
@else
    <option value=""> No Records Found</option>
@endif
