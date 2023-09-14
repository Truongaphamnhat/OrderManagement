{{-- @extends('frontend.layouts.app_frontend') --}}
@extends('frontend.layouts.representer')
@section('content')
    <div class="main-content-inner">
        <div class="row">
            <!-- Data table start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="head-title-addbtn">
                            <h4 class="header-title">Người đại diện cho khách hàng</h4>
                            <!-- AddNew & OtherOptions Btn -->
                            <div class="head-title-btn">
                                <a href="{{ route('get.representer_create') }}">
                                    <button type="button" class="btn btn-primary btn-addtrans mb-3"><i
                                            class="fa fa-plus-circle" aria-hidden="true"></i></i><span>Thêm
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
                                        <th>Đại diện cho khách hàng</th>
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

                                            <td>{{ $item->customer->name ?? '[N/A]' }}</td>

                                            {{-- {{ $name_customer = $item->customer->name ?? '[N/A]' }}

                                            @if ($name_customer == '[N/A]')
                                            
                                                <td>[N/A]</td>
                                            @else
                                                <td> {{ strlen($item->customer->name) > 20 ? mb_substr($item->customer->name, 0, 15, 'UTF-8') . '...' : $item->customer->name }} </td>
                                            @endif --}}
                                           
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
            <!-- Data table end -->
        </div>
    </div>
@stop
