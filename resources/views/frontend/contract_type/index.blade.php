@extends('frontend.layouts.business_contract')
@section('content')
    <div class="main-content-inner">
        <div class="row">
            <!-- Data table start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="head-title-addbtn">
                            <h4 class="header-title">Loại hợp đồng</h4>
                            <!-- AddNew & OtherOptions Btn -->
                            <div class="head-title-btn">
                                <a href="{{ route('get.contract_type_create') }}">
                                    <button type="button" class="btn btn-primary btn-addtrans mb-3"><i class="fa fa-plus-circle" aria-hidden="true"></i></i><span>Thêm mới</span></button>
                                </a>
                                <a href="{{ route('get.contract_index') }}">
                                    <button type="button" class="btn btn-addorder btn-back mb-3"><i class="fa fa-chevron-left" aria-hidden="true"></i><span>Trở về</span></button>
                                </a>
                            </div>
                        </div>

                        <div class="data-tables datatable-dark">
                            <table id="dataTable3" class="text-center table-business">
                                <thead class="text-capitalize">
                                    <tr>
                                        <th>Mã loại hợp đồng</th>
                                        <th>Tên loại hợp đồng</th>
                                        <th>Mô tả</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contract_types ?? [] as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td style="padding-left: 10%; padding-right: 10%; !importan">{{ $item->description }}</td>
                                            <td>
                                                <ul class="d-flex justify-content-center">
                                                    <li class="mr-3"><a href="{{ route('get.contract_type_update', $item->id) }}" class="text-primary"><i class="fa fa-edit"></i></a></li>
                                                    <li><a href="{{ route('get.contract_type_delete', $item->id) }}" class="text-danger"><i class="ti-trash"></i></a></li>
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
