{{-- @extends('frontend.layouts.app_frontend') --}}
@extends('frontend.layouts.contact_customer')
@section('content')
    <div class="main-content-inner">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <!-- Tiêu đề -->
                    <div class="col-12 mt-5">
                        <div class="card card-header-main">
                            <div class="card-body">
                                <div class="card-header-order">
                                    <h4 class="header-title header-title-main">Cập Nhật Thông Tin Khách Hàng</h4>
                                    <div class="btn-group-head-order">
                                        <span class="btn btn-addorder btn-back"><i class="fa fa-chevron-left"
                                                aria-hidden="true"></i><a href="{{ route('get.contact_customer_detail', $customer->id) }}"
                                                style="color: white"> <span>Trờ về</span></a> </span>
                                    </div>
                                </div>
                                @include('frontend.contact.customer_form')
                            </div>
                        </div>
                    </div>
                    <!-- End -->
                </div>
            </div>
        </div>
    </div>
@stop
