@extends('dashboard.layouts.main')

@section('dashboard_content')

<div class="align-baseline justify-content-around">
    <div class="container col-lg-8 p-5 rounded-3 shadow mb-5 bg-body-tertiary table-responsive">
        @include('dashboard.profiles.partials.update-profile-information-form')
    </div>
    <div class="container col-lg-8 p-5 rounded-3 shadow mb-5 bg-body-tertiary table-responsive">
        @include('dashboard.profiles.partials.update-password-form')
    </div>
    <div class="container col-lg-8 p-5 rounded-3 mb-5 bg-body-tertiary table-responsive" style="box-shadow: 0px 0px 15px red;">
        @include('dashboard.profiles.partials.delete-user-form')
    </div>
</div>
    </div>
</div>


@endsection
