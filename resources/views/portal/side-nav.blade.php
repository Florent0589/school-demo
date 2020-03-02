<div class="row">
    <div class="col-4">
        <div class="list-group" id="list-tab" role="tablist">
            <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">
                @if(\Session::has('personal-info'))
                    <i class="fa fa-check-circle"></i>
                @else
                    <i class="fa fa-question-circle"></i>
                @endif
                Personal Information
            </a>
            <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">
                @if(\Session::has('next-of-keen'))
                    <i class="fa fa-check-circle"></i>
                @else
                    <i class="fa fa-question-circle"></i>
                @endif
                Next of Keen
            </a>
            <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">
                @if(\Session::has('subject'))
                    <i class="fa fa-check-circle"></i>
                @else
                    <i class="fa fa-question-circle"></i>
                @endif
                Subject
            </a>
            <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings" onclick="JavaScriptManager.getSubjectForPayment()">
                @if(\Session::has('payment'))
                    <i class="fa fa-check-circle"></i>
                @else
                    <i class="fa fa-question-circle"></i>
                @endif
                Payment
            </a>
            @if(\Session::has('payment') && \Session::has('subject') && \Session::has('next-of-keen') && \Session::has('personal-info'))

                <a class="list-group-item list-group-item-action" id="payment-form-list" data-toggle="list" href="#payment-form" role="tab" aria-controls="messages">
                    Payment Advice Form
                </a>
                <a class="list-group-item list-group-item-action" id="" data-toggle="" href="/saveStudent" role="tab" aria-controls="">
                    Save Details
                </a>
            @endif
        </div>
    </div>
    <div class="col-10">
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                1
            </div>
            <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                2
            </div>
            <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
               3 
            </div>
            <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
                5
            </div>
            <div class="tab-pane fade" id="payment-form" role="tabpanel" aria-labelledby="payment-form-list">
                4
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('bootstrap/js/bootstrap.js') }}" defer></script>