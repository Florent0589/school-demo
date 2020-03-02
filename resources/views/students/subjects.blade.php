@if($arrPersonalInfo != null && isset($arrPersonalInfo['id']))
    <form method="POST" action="/updateSubject/{{ $arrPersonalInfo['id'] }}">
@else
    <form method="POSt" action="/saveSubjects">
@endif
    @csrf
    <div class="card-body">
        <div class="card-header">
            Subjects
            <br><hr>
            <div class="form-group row">
                <label for="grade_id" class="col-md-4 col-form-label text-md-right">{{ __('Grade ') }}</label>
                @php
                    if(!isset($arrSubject['grade_id']))
                    {
                        $arrSubject['grade_id'] = isset($arrPersonalInfo['grade_id']) ? $arrPersonalInfo['grade_id']: null;
                        $arrSubject['grade_class_id'] = isset($arrPersonalInfo['grade_class_id']) ? $arrPersonalInfo['grade_class_id'] : null;
                        $arrSubject['subject_id'] = $arrSubject;
                    }
                @endphp

                <div class="col-md-6">
                    <select id="grade_id"  class="form-control" name="grade_id" required autofocus onchange="JavaScriptManager.getGradeClass(this.value)">
                        <option> -- Select Grade -- </option>
                        @foreach($grades as $grade)
                            @if($arrSubject != null && $arrSubject['grade_id'] == $grade->id)
                                <option value="{{ $grade->id }}" selected>{{ $grade->name }}</option>
                            @endif
                            <option value="{{ $grade->id }}"> {{ $grade->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="grade_class_id" class="col-md-4 col-form-label text-md-right">{{ __('Class ') }}</label>

                <div class="col-md-6">
                    <select id="grade_class_id"  class="form-control" name="grade_class_id" required autofocus>
                        <option> -- Select Class -- </option>
                        @if($arrSubject != null && $arrSubject['grade_class_id'] != null)
                            <option value="{{ $arrSubject['grade_class_id'] }}" selected>{{ $arrSubject['grade_class_id'] }}</option>
                        @endif
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="subject_id" class="col-md-4 col-form-label text-md-right">{{ __('Subjects') }}</label>

                <div class="col-md-6">
                    <select id="subject_id"  multiple="multiple" class="form-control" name="subject_id[]" required autofocus>
                        <option> -- Select Class -- </option>
{{--                        @if($arrSubject != null && $arrSubject['subject_id'] != null)--}}
{{--                            @foreach($arrSubject['subject_id'] as $subject)--}}
{{--                                <option value="{{ $subject }}" selected>{{ $subject }}</option>--}}
{{--                            @endforeach--}}
{{--                        @endif--}}
                    </select>
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
