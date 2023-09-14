{{-- @extends('frontend.layouts.app_frontend') --}}
@extends('frontend.layouts.customer')
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
                                                aria-hidden="true"></i><a href="{{ route('get.index') }}"
                                                style="color: white"> <span>Trờ về</span></a> </span>
                                    </div>
                                </div>

                                @include('frontend.customer.form')

                            </div>
                        </div>
                    </div>
                    <!-- End -->
                    <div class="col-12 mt-2">
                        <div class="card">
                            <div class="card-body">
                                <div class="head-title-addbtn">
                                    <h4 class="header-title">Người đại diện</h4>
                                    <!-- AddNew & OtherOptions Btn -->
                                    <div class="head-title-btn">
                                        <a href="{{ route('get.representer_create') }}">
                                            <button type="button" class="btn btn-primary btn-addtrans mb-3"><i
                                                    class="fa fa-plus-circle" aria-hidden="true"></i><span>Thêm
                                                    mới</span></button>
                                        </a>
                                    </div>
                                </div>
                                <div class="data-tables datatable-dark">
                                    <table id="dataTable3" class="text-center table-business">
                                        <thead class="text-capitalize">
                                            <tr>
                                                <th>#</th>
                                                <th>Tên người đại diện</th>
                                                {{-- <th>Đại diện cho khách hàng</th> --}}
                                                <th>Email</th>
                                                <th>Thao tác</th>
                                                {{-- <th>Ngày tạo</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($representers ?? [] as $item)
                                                <tr>
                                                    <td>{{ $item->id }}</td>
                                                    <td>{{ strlen($item->name) > 20 ? mb_substr($item->name, 0, 15, 'UTF-8') . '...' : $item->name }}
                                                    </td>
                                                    {{-- <td>{{ $item->customer->name }}</td> --}}
                                                    {{-- <td>{{ strlen($item->customer->name) > 20 ? mb_substr($item->customer->name, 0, 15, 'UTF-8') . '...' : $item->customer->name }}
                                                    </td> --}}
                                                    {{-- <td>
                                                        <span> {{ $item->province->name ?? '...' }} -
                                                            {{ $item->district->name ?? '...' }} -
                                                            {{ $item->ward->name ?? '...' }}</span>
                                                    </td> --}}
                                                    <td>{{ $item->email }}</td>

                                                    <td>
                                                        <ul class="d-flex justify-content-center">
                                                            <li class="mr-2"><a
                                                                    href="{{ route('get.representer_detail', $item->id) }}"
                                                                    class="text-primary"><i class="fa fa-info-circle"
                                                                        aria-hidden="true"></i></a></li>
                                                            <li class="mr-2"><a
                                                                    href="{{ route('get.representer_update', $item->id) }}"
                                                                    class="text-primary"><i class="fa fa-edit"></i></a></li>
                                                            <li><a href="{{ route('get.representer_delete', $item->id) }}"
                                                                    class="text-danger"><i class="ti-trash"></i></a></li>
                                                        </ul>
                                                    </td>
                                                    {{-- <td>{{ $item->created_at }}</td> --}}
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
