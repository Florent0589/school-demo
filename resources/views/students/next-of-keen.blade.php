@if($arrNextOfKeen != null && isset($arrNextOfKeen['id']))
    <form method="POST" action="/updateGurdain/{{ $arrNextOfKeen['id'] }}">
@else
    <form method="POST" action="/saveNextOfKeen">
@endif
    @csrf
    <div class="card-body">
        <div class="card-header">
            Gurdain Details
            <br><hr>
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                <div class="col-md-6">
                    @if($arrNextOfKeen != null)
                        <input id="first_name" type="text" class="form-control" name="first_name" value="{{ $arrNextOfKeen['first_name'] }}" required autofocus>
                    @else
                        <input id="first_name" type="text" class="form-control" name="first_name" value="" required autofocus>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                <div class="col-md-6">
                    @if($arrNextOfKeen != null)
                        <input id="last_name" type="text" class="form-control" name="last_name" value="{{ $arrNextOfKeen['last_name'] }}" required autofocus>
                    @else
                        <input id="last_name" type="text" class="form-control" name="last_name" value="" required autofocus>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="relationship_id" class="col-md-4 col-form-label text-md-right">{{ __('Relationship') }}</label>
                <div class="col-md-6">
                    <select name="relationship_id" class="form-control">
                        <option value=""> --- Select --- </option>
                        @foreach($relationship as $type)
                            @if($arrNextOfKeen != null && $arrNextOfKeen['relationship_id'] == $type->id)
                                <option value="{{ $type->id }}" selected>{{ $type->name }}</option>
                            @endif
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="date_of_birth" class="col-md-4 col-form-label text-md-right">{{ __('Date Of Birth') }}</label>

                <div class="col-md-6">
                    @if($arrNextOfKeen != null && isset($arrNextOfKeen['date_of_birth']))
                        <input id="date_of_birth" type="date" class="form-control" name="date_of_birth" value="{{ $arrNextOfKeen['date_of_birth'] }}" required autofocus>
                    @else
                        <input id="date_of_birth" type="date" class="form-control" name="date_of_birth" value="" required autofocus>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="identification_type_id" class="col-md-4 col-form-label text-md-right">{{ __('Identification Type') }}</label>

                <div class="col-md-6">
                    <select name="identification_type_id" class="form-control">
                        <option value=""> --- Select --- </option>
                        @foreach($types as $type)
                            @if($arrNextOfKeen != null && $arrNextOfKeen['identification_type_id'] == $type->id)
                                <option value="{{ $type->id }}" selected>{{ $type->name }}</option>
                            @endif
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="id_number" class="col-md-4 col-form-label text-md-right">{{ __('ID Number') }}</label>

                <div class="col-md-6">
                    @if($arrNextOfKeen != null)
                        <input id="id_number" type="text" class="form-control" name="id_number" value="{{ $arrNextOfKeen['id_number'] }}" required autofocus>
                    @else
                        <input id="id_number" type="text" class="form-control" name="id_number" value="" required autofocus>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="passport_number" class="col-md-4 col-form-label text-md-right">{{ __('PassPort Number') }}</label>

                <div class="col-md-6">
                    @if($arrNextOfKeen != null)
                        <input id="passport_number" type="text" class="form-control" name="passport_number" value="{{ $arrNextOfKeen['passport_number'] }}">
                    @else
                        <input id="passport_number" type="text" class="form-control" name="passport_number" value="">
                    @endif
                </div>
            </div>
        </div>
        <div class="card-header">
             Contact
            <br><hr>
            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email Address') }}</label>

                <div class="col-md-6">
                    @if($arrNextOfKeen != null)
                        <input id="email" type="email" class="form-control" name="email" value="{{ $arrNextOfKeen['email'] }}" required autofocus>
                    @else
                        <input id="email" type="email" class="form-control" name="email" value="" required autofocus>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="mobile" class="col-md-4 col-form-label text-md-right">{{ __('Cell Number') }}</label>

                <div class="col-md-6">
                    @if($arrNextOfKeen != null)
                        <input id="mobile" type="text" class="form-control" name="mobile" value="{{ $arrNextOfKeen['mobile'] }}" required autofocus>
                    @else
                        <input id="mobile" type="text" class="form-control" name="mobile" value="" required autofocus>
                    @endif

                </div>
            </div>
            <div class="form-group row">
                <label for="home_number" class="col-md-4 col-form-label text-md-right">{{ __('Home Number') }}</label>

                <div class="col-md-6">
                    @if($arrNextOfKeen != null)
                        <input id="home_number" type="text" class="form-control" name="home_number" value="{{ $arrNextOfKeen['home_number'] }}" required autofocus>
                    @else
                        <input id="home_number" type="text" class="form-control" name="home_number" value="" required autofocus>
                    @endif

                </div>
            </div>
            <div class="form-group row">
                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Home Address') }}</label>

                <div class="col-md-6">
                    @if($arrNextOfKeen != null)
                        <input id="address" type="text" class="form-control" name="address" value="{{ $arrNextOfKeen['address'] }}" required autofocus>
                    @else
                        <input id="address" type="text" class="form-control" name="address" value="" required autofocus>
                    @endif

                </div>
            </div>
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
        </div>

    </div>
</form>

