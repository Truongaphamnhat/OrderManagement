@extends('backend.layouts.app_backend')
@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h2>Thêm mới (Khách hàng)</h2>
    <a href="{{ route('get_admin.customer.index') }}" class="btn btn-dark">Trở về</a>
</div>

<div class="row">
    <div class="col-md-12">
        @include('backend.customer.form')
    </div>
</div>

@stop