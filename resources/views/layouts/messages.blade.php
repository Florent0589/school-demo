@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div id="error" class="error">
            <i class="fa fa-danger"> {{ $error }}</i>
        </div>
    @endforeach
@endif

@if(session('success'))
    <div id="error" class="btn-success error">
        <i class="fa fa-check-circle"> {{ session('success') }}</i>
    </div>
@endif

@if(session('warning'))
    <div id="error" class="error">
        <i class="fa fa-warning"> {{ session('warning') }}</i>
    </div>
@endif

@if(session('error'))
    <div id="error" class="error">
        <i class="fa fa-exclamation-triangle"> {{ session('error') }}</i>
    </div>
@endif

<style>
    .error{
        border-radius: 5px;
        padding: 3px;
    }
</style>
