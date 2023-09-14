@extends('frontend.layouts.business_contract')
@section('content')
    <div class="main-content-inner">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-12 mt-5">
                        <div class="card card-header-main">
                            <div class="card-body">
                                <div class="card-header-order">
                                    <h4 class="header-title header-title-main">Thêm hàng hóa vào hợp đồng</h4>
                                    <div class="btn-group-head-order">
                                        <a href="{{ route('get.contract_index') }}">
                                            <button type="button" class="btn btn-addorder btn-back"><i class="fa fa-chevron-left" aria-hidden="true"></i><span>Trở về</span></button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">
                                    <h4 class="header-title">Thông tin Hàng Hóa - Hợp Đồng</h4>
                                </div>
                                <p class="text-muted font-14">Vui lòng điền thông tin cần thiết vào form bên dưới. Các trường có dấu <code>*</code> là bắt buộc phải điền.</p>

                                @include('frontend.contract_goods_detail.form_create')

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
