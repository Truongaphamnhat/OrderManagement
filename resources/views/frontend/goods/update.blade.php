@extends('frontend.layouts.business_goods')
@section('content')
    <div class="main-content-inner">
        <div class="row">
            <div class="col-lg-12 col-ml-12">
                <!-- Tiêu đề -->
                <div class="col-12 mt-5">
                    <div class="card card-header-main">
                        <div class="card-body">
                            <div class="card-header-order">
                                <h4 class="header-title header-title-main">Chỉnh Sửa Hàng Hóa</h4>
                                <div class="btn-group-head-order">
                                    <a href="{{ route('get.goods_index') }}">
                                        <button type="button" class="btn btn-addorder btn-back"><i class="fa fa-chevron-left" aria-hidden="true"></i><span>Trở về</span></button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End -->
                {{-- Form nhập thông tin --}}
                @include('frontend.goods.form_update')
                {{-- End form --}}
            </div>
        </div>
    </div>
@stop
