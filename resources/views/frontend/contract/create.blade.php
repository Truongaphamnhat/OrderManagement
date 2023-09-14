@extends('frontend.layouts.business_contract')
@section('content')
    <div class="main-content-inner">
        <div class="row">
            <div class="col-lg-12">
                <div class="col-12 mt-5">
                    <div class="card card-header-main">
                        <div class="card-body">
                            <div class="card-header-order">
                                <h4 class="header-title header-title-main">Thêm mới hợp đồng bán ra</h4>
                                <div class="btn-group-head-order">
                                    <a href="{{ route('get.contract_index') }}">
                                        <button type="button" class="btn btn-addorder btn-back"><i class="fa fa-chevron-left" aria-hidden="true"></i><span>Trở về</span></button>
                                    </a>
                                    <style>
                                        .btn:hover {
                                            color: #fff !important;
                                        }
                                    </style>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- ------------------ --}}
                @include('frontend.contract.form_create')
                {{-- ------------------ --}}

            </div>
        </div>
    </div>
@stop
