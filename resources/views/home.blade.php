@extends('layouts.mainlayout')
@section('content')

<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/ Empty</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->

<div class="row">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
        {{ session('status') }}

        </div>
    @endif

    {{ __('You are logged in! ') }}
    {{ $name }}

    
</div>

<div class="row">
    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
        <div class="card custom-card text-center">
            <div class="card-body">
                <div>
                    <h6 class="card-title mb-1">Success alert</h6>
                    <p class="text-muted card-sub-title">A Success Message</p>
                </div>
                <div class="btn ripple btn-success-gradient" id='swal-success'>
                    Click me !
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

