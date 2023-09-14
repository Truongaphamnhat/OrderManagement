@extends('frontend.layouts.business_goods')
@section('content')
    <div class="main-content-inner">
        <div class="row">
            <!-- Data table start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="head-title-addbtn">
                            <h4 class="header-title">Hàng Hóa</h4>
                            <!-- AddNew & OtherOptions Btn -->
                            <div class="head-title-btn">
                                <a href="{{ route('get.goods_create') }}">
                                    <button type="button" class="btn btn-primary btn-addtrans mb-3"><i class="fa fa-plus-circle" aria-hidden="true"></i></i><span>Thêm mới</span></button>
                                </a>
                            </div>
                        </div>
                        <div class="data-tables datatable-dark">
                            <table id="dataTable3" class="text-center table-business">
                                <thead class="text-capitalize">
                                    <tr>
                                        <th>Mã hàng hóa</th>
                                        <th>Tên hàng hóa</th>
                                        <th>Hãng SX</th>
                                        <th>Xuất xứ</th>
                                        <th>Giá nhập vào</th>
                                        <th>Tỷ lệ vênh</th>
                                        <th>Giá bán ra</th>
                                        <th>Thuế</th>
                                        <th>Tổng tiền</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($goods ?? [] as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->manufacturer }}</td>
                                            <td>{{ $item->origin }}</td>
                                            <td>{{ $item->input_price }}</td>
                                            <td>{{ $item->markup_ratio }}</td>
                                            <td>{{ $item->output_price }}</td>
                                            <td>{{ $item->tax }}</td>
                                            <td>{{ $item->total }}</td>
                                            <td>
                                                <ul class="d-flex justify-content-center">
                                                    <li class="mr-2"><a href="{{ route('get.goods_detail', $item->id) }}"
                                                            class="text-primary"><i class="fa fa-info-circle"
                                                                aria-hidden="true"></i></a></li>
                                                    <li class="mr-2"><a href="{{ route('get.goods_update', $item->id) }}"
                                                            class="text-primary"><i class="fa fa-edit"></i></a></li>
                                                    <li><a href="{{ route('get.goods_delete', $item->id) }}"
                                                            class="text-danger"><i class="ti-trash"></i></a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Data table end -->
        </div>
    </div>
@stop
