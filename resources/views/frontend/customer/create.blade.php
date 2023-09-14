{{-- @extends('frontend.layouts.app_frontend') --}}
@extends('frontend.layouts.customer')
@section('content')
    <!-- page title area end -->
    <div class="main-content-inner">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <!-- Form nhập thông tin liên hệ start-->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-header-order">
                                    <h4 class="header-title">Thêm mới khách hàng</h4>
                                    <div class="btn-group-head-order">
                                        <span class="btn btn-addorder btn-back"><i class="fa fa-chevron-left"
                                                aria-hidden="true"></i><a href="{{ route('get.index') }}"
                                                style="color: white"> <span>Trờ về</span></a> </span>
                                    </div>
                                </div>
                                @include('frontend.customer.form')
                            </div>
                        </div>
                    </div>
                    <!-- Form nhập thông tin hàng hóa end -->
                </div>
            </div>
        </div>
    </div>
    </div>
@stop
