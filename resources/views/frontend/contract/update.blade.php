@extends('frontend.layouts.business_contract')
@section('content')
    <div class="main-content-inner">
        <div class="row">
            <div class="col-lg-12">
                {{-- <div class="row"> --}}
                    <div class="col-12 mt-5">
                        <div class="card card-header-main">
                            <div class="card-body">
                                <div class="card-header-order">
                                    <h4 class="header-title header-title-main">Chỉnh sửa hợp đồng bán ra</h4>
                                    <div class="btn-group-head-order">
                                        <button type="button" onclick="submitFormUpdate()" class="btn btn-addorder"><i class="fa fa-floppy-o" aria-hidden="true"></i><span>Lưu thay đổi</span></button>
                                        <script>
                                            function submitFormUpdate() {
                                                var form = document.getElementById('contractFormUpdate');
                                                form.submit();
                                            }
                                        </script>
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
                    @include('frontend.contract.form_update')
                    {{-- ------------------ --}}
                    <!-- Form thông tin Hàng hóa start -->
                    <div class="col-12 mt-2">
                        <div class="card">
                            <div class="card-body">
                                <div class="head-title-addbtn">
                                    <h4 class="header-title">Hàng Hóa</h4>
                                </div>
                                <div class="data-tables datatable-dark">
                                    <table id="dataTable" class="text-center table-business">
                                        <thead class="text-capitalize">
                                            <tr>
                                                <th>Mã hàng hóa</th>
                                                <th>Tên hàng hóa</th>
                                                <th>Đơn giá nhập</th>
                                                <th>Tỷ lệ vênh</th>
                                                <th>Đơn giá xuất</th>
                                                <th>Số lượng</th>
                                                <th>Thành tiền</th>
                                                <th>Tiền thuế</th>
                                                <th>Nguồn gốc</th>
                                                <th>Xuất xứ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($goods ?? [] as $item)
                                                <tr>
                                                    <td>{{ $item->id }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->input_price }}</td>
                                                    <td>{{ $item->markup_ratio }}</td>
                                                    <td>{{ $item->output_price }}</td>
                                                    <td>{{ $item->quantity }}</td>
                                                    <td>{{ $item->total_value }}</td>
                                                    <td>{{ $item->tax_value * $item->quantity}}</td>
                                                    <td>{{ $item->manufacturer }}</td>
                                                    <td>{{ $item->origin }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Form thông tin Hàng hóa end -->
                {{-- </div> --}}
            </div>
        </div>
    </div>
@stop
