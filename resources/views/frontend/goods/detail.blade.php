@extends('frontend.layouts.business_goods')
@section('content')
    <div class="main-content-inner">
        <div class="row">
            <div class="col-lg-12 col-ml-12">
                <div class="row">
                    <!-- Tiêu đề -->
                    <div class="col-12 mt-5">
                        <div class="card card-header-main">
                            <div class="card-body">
                                <div class="card-header-order">
                                    <h4 class="header-title header-title-main">Chi tiết hàng hóa</h4>
                                    <div class="btn-group-head-order">
                                        <a href="{{ route('get.goods_update', $goods->id) }}">
                                            <button type="button" class="btn btn-addorder btn-back"><i class="fa fa-edit"></i></i><span>Sửa</span></button>
                                        </a>
                                        <a href="{{ route('get.goods_index') }}">
                                            <button type="button" class="btn btn-addorder btn-back"><i class="fa fa-chevron-left" aria-hidden="true"></i><span>Trở về</span></button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End -->
                    <!-- Form thông tin start -->
                    <div class="col-12 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="row form-group" style="border-bottom: 1px solid #f3eeff;">
                                            <div class="col-sm-5">
                                                <label class="col-form-label input-label"><strong>Mã hàng hóa:</strong></label>
                                            </div>
                                            <div class="col-sm-7">
                                                <p class="col-form-label input-label">{{ $goods->id ?? "[N/A]" }}</p>
                                            </div>
                                        </div>
                                        <div class="row form-group" style="border-bottom: 1px solid #f3eeff;">
                                            <div class="col-sm-5">
                                                <label class="col-form-label input-label"><strong>Tên hàng hóa:</strong></label>
                                            </div>
                                            <div class="col-sm-7">
                                                <p class="col-form-label input-label">{{ $goods->name ?? "[N/A]" }}</p>
                                            </div>
                                        </div>
                                        <div class="row form-group" style="border-bottom: 1px solid #f3eeff;">
                                            <div class="col-sm-5">
                                                <label class="col-form-label input-label"><strong>Đơn vị:</strong></label>
                                            </div>
                                            <div class="col-sm-7">
                                                <p class="col-form-label input-label">{{ $goods->unit ?? "[N/A]" }}</p>
                                            </div>
                                        </div>
                                        <div class="row form-group" style="border-bottom: 1px solid #f3eeff;">
                                            <div class="col-sm-5">
                                                <label class="col-form-label input-label"><strong>Hãng SX:</strong></label>
                                            </div>
                                            <div class="col-sm-7">
                                                <p class="col-form-label input-label">{{ $goods->manufacturer ?? "[N/A]" }}</p>
                                            </div>
                                        </div>
                                        <div class="row form-group" style="border-bottom: 1px solid #f3eeff;">
                                            <div class="col-sm-5">
                                                <label class="col-form-label input-label"><strong>Xuất xứ:</strong></label>
                                            </div>
                                            <div class="col-sm-7">
                                                <p class="col-form-label input-label">{{ $goods->origin ?? "[N/A]" }}<br></p>
                                            </div>
                                        </div>
                                        <div class="row form-group" style="border-bottom: 1px solid #f3eeff;">
                                            <div class="col-sm-5">
                                                <label class="col-form-label input-label"><strong>Bảo hành:</strong></label>
                                            </div>
                                            <div class="col-sm-7">
                                                <p class="col-form-label input-label">{{ $goods->guarantee }}</p>
                                            </div>
                                        </div>
                                        <div class="row form-group" style="border-bottom: 1px solid #f3eeff;">
                                            <div class="col-sm-5">
                                                <label class="col-form-label input-label"><strong>Mô tả:</strong></label>
                                            </div>
                                            <div class="col-sm-7">
                                                <p class="col-form-label input-label">{{ $goods->describe }}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="row form-group" style="border-bottom: 1px solid #f3eeff; border-left: 1px solid #f3eeff;">
                                            <div class="col-sm-5">
                                                <label class="col-form-label input-label"><strong>Đơn giá nhập:</strong></label>
                                            </div>
                                            <div class="col-sm-7">
                                                <p class="col-form-label input-label">{{ $goods->input_price }}</p>
                                            </div>
                                        </div>
                                        <div class="row form-group" style="border-bottom: 1px solid #f3eeff; border-left: 1px solid #f3eeff;">
                                            <div class="col-sm-5">
                                                <label class="col-form-label input-label"><strong>Tỷ lệ vênh:</strong></label>
                                            </div>
                                            <div class="col-sm-7">
                                                <p class="col-form-label input-label">{{ $goods->markup_ratio }}</p>
                                            </div>
                                        </div>
                                        <div class="row form-group" style="border-bottom: 1px solid #f3eeff; border-left: 1px solid #f3eeff;">
                                            <div class="col-sm-5">
                                                <label class="col-form-label input-label"><strong>Đơn giá xuất:</strong></label>
                                            </div>
                                            <div class="col-sm-7">
                                                <p class="col-form-label input-label">{{ $goods->output_price ?? "[N/A]"}}</p>
                                            </div>
                                        </div>
                                        <div class="row form-group" style="border-bottom: 1px solid #f3eeff; border-left: 1px solid #f3eeff;">
                                            <div class="col-sm-5">
                                                <label class="col-form-label input-label"><strong>Thuế:</strong></label>
                                            </div>
                                            <div class="col-sm-7">
                                                <p class="col-form-label input-label">{{ $goods->tax ?? "[N/A]" }}</p>
                                            </div>
                                        </div>
                                        <div class="row form-group" style="border-bottom: 1px solid #f3eeff; border-left: 1px solid #f3eeff;">
                                            <div class="col-sm-5">
                                                <label class="col-form-label input-label"><strong>Tổng tiền:</strong></label>
                                            </div>
                                            <div class="col-sm-7">
                                                <p class="col-form-label input-label">{{ $goods->total }}</p>
                                            </div>
                                        </div>
                                        <div class="row form-group" style="border-bottom: 1px solid #f3eeff; border-left: 1px solid #f3eeff;">
                                            <div class="col-sm-5">
                                                <label class="col-form-label input-label"><strong>Hình ảnh:</strong></label>
                                            </div>
                                            <div class="col-sm-7" style="padding-top: 5px !important;}">
                                                @if (isset($goods->avatar) && $goods->avatar)
                                                    <p>{{ $goods->avatar }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Form thông tin end -->
                </div>
            </div>
        </div>
    </div>
@stop
