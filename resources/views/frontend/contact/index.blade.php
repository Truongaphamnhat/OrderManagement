{{-- @extends('frontend.layouts.app_frontend')x --}}
@extends('frontend.layouts.contact_customer')
@section('content')
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">
                    <!-- data table start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                            <div class="head-title-addbtn">
                                    <h4 class="header-title">Liên hệ với khách hàng</h4>
                                    <!-- AddNew & OtherOptions Btn -->
                                    <div class="head-title-btn">
                                        <a href="{{ route('get.contact_create') }}">
                                            <button type="button" class="btn btn-primary btn-addtrans mb-3"><i class="fa fa-plus-circle" aria-hidden="true"></i></i><span>Thêm mới</span></button>
                                        </a>
                                    </div>
                                </div>
                                <div class="data-tables datatable-dark">
                                    <table id="dataTable" class="text-center table-business">
                                        <thead class="text-capitalize">
                                            <tr>
                                                <th>Người liên hệ</th>
                                                <th>Khách hàng</th>
                                                <th>Chức vụ</th>
                                                <th>Email</th>
                                                <th>Địa chỉ liên hệ</th>
                                                <th>Giới tính</th>
                                                <th>Số điện thoại</th>
                                                <th>Ngày sinh</th>
                                                <th>Thao tác</th>
                                                <th>Ngày tạo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($contacts ?? [] as $item)
                                            <tr>
                                                <td>{{ $item->name }}</td>
                                                <td><a href="{{ route('get.contact_customer_detail', $item->customer->id) }}" >
                                                    {{ $item->customer->name }}
                                                </a></td>
                                                <td>{{ $item->position->name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->address }}</td>
                                                <td>{{ $item->gender }}</td>
                                                <td>{{ $item->tel }}</td>                                                
                                                <td>{{ $item->date }}</td>
                                                <td>
                                                    <ul class="d-flex justify-content-center">
                                                        <li class="mr-2"><a href="{{ route ('get.contact_detail', $item->id) }}" class="text-primary"><i class="fa fa-info-circle" aria-hidden="true"></i></a></li>
                                                        <li class="mr-2"><a href="{{ route ('get.contact_update', $item->id) }}" class="text-primary"><i class="fa fa-edit"></i></a></li>
                                                        <li><a href="{{ route('get.contact_delete', $item->id) }}" class="text-danger"><i class="ti-trash"></i></a></li>
                                                    </ul>
                                                </td>                                                
                                                <td>{{ $item->created_at }}</td>
                                                
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
@stop