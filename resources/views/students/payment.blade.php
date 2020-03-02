@if($arrPersonalInfo != null && isset($arrPersonalInfo['id']))
    <form method="POST" action="/updateFees/{{ $arrPersonalInfo['id'] }}">
@else
    <form method="POST" action="/savePayments">
@endif
    @csrf
    <div class="card-body">
        <div class="card-header">
            Payment Detials
            <br><hr>
            <div class="form-group row">
                <table class="table table-sm table-dark">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col"> Item </th>
                        <th scope="col"> Qty / Terms</th>
                        <th scope="col"> Amount (R)</th>
                    </tr>
                    </thead>
                    <tbody id="subject-amount">

                    </tbody>
                </table>
            </div>
            <div class="form-group row">
                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Total School Fee') }}</label>

                <div class="col-md-6">
                    <input id="payment_total" type="text" class="form-control" name="payment_total" value="" required autofocus>

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

