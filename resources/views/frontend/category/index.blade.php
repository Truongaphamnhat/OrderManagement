{{-- @extends('frontend.layouts.app_frontend') --}}
@extends('frontend.layouts.list_customer')
@section('content')
    <div class="main-content-inner">
        <div class="row">
            <!-- data table start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="head-title-addbtn">
                            <h4 class="header-title">Danh mục khách hàng</h4>
                            <!-- AddNew & OtherOptions Btn -->
                            <div class="head-title-btn">
                                <a href="{{ route('get.category_create') }}">
                                    <button type="button" class="btn btn-primary btn-addtrans mb-3"><i
                                            class="fa fa-plus-circle" aria-hidden="true"></i></i><span>Thêm
                                            mới</span></button>
                                </a>
                            </div>
                        </div>
                        <div class="data-tables datatable-dark">
                            <table id="dataTable" class="text-center table-business">
                                <thead class="text-capitalize">
                                    <tr>
                                        <th>#</th>
                                        <th>Tên Nhóm</th>
                                        <th>Mô tả</th>
                                        <th>Ngày tạo</th>
                                        <th>Thao tác</th>
                                        {{-- <th>Số lượng</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories ?? [] as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->description }}</td>
                                            <td>{{ $item->created_at }}</td>

                                            <td>
                                                <ul class="d-flex justify-content-center">
                                                    {{-- <li class="mr-2"><a href="#" class="text-primary"><i
                                                                class="fa fa-info-circle" aria-hidden="true"></i></a></li> --}}
                                                    <li class="mr-2"><a href="{{ route('get.category_update', $item->id) }}" class="text-primary"><i
                                                                class="fa fa-edit"></i></a></li>
                                                    <li><a href="{{ route('get.category_delete', $item->id) }}" class="text-danger"><i class="ti-trash"></i></a></li>
                                                </ul>
                                            </td>
                                            {{-- <td>10</td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- data table end -->
        </div>
    </div>
@stop
