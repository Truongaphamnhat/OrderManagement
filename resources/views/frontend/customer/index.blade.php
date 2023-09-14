{{-- @extends('frontend.layouts.app_frontend') --}}
@extends('frontend.layouts.customer')
@section('content')
    <div class="main-content-inner">
        <div class="row">
            <!-- Data table start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="head-title-addbtn">
                            <h4 class="header-title">Khách hàng</h4>
                            <!-- AddNew & OtherOptions Btn -->
                            <div class="head-title-btn">
                                <a href="{{ route('get.customer_create') }}">
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
                                        <th>Tên khách hàng</th>
                                        <th>Địa chỉ</th>
                                        <th>Mã số thuế</th>
                                        <th>Trạng thái</th>
                                        <th>Thao tác</th>
                                        {{-- <th>Ngày tạo</th> --}}
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($customers ?? [] as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ strlen($item->name) > 20 ? mb_substr($item->name, 0, 15, 'UTF-8') . '...' : $item->name }}
                                            </td>
                                            <td>
                                                <span> {{ $item->province->name ?? '...' }} -
                                                    {{ $item->district->name ?? '...' }} -
                                                    {{ $item->ward->name ?? '...' }}</span>
                                                    {{-- <br> --}}
                                                {{-- {{ $item->address }} --}}
                                            </td>
                                            <td>{{ $item->tax_code }}</td>
                                            <td>
                                                <span
                                                    class="{{ $item->getStatus($item->status)['class'] ?? 'badge badge-light' }}">
                                                    {{ $item->getStatus($item->status)['name'] ?? 'Mới' }}
                                                </span>
                                            </td>
                                            <td>
                                                <ul class="d-flex justify-content-center">
                                                    <li class="mr-2"><a
                                                            href="{{ route('get.customer_detail', $item->id) }}"
                                                            class="text-primary"><i class="fa fa-info-circle"
                                                                aria-hidden="true"></i></a></li>
                                                    <li class="mr-2"><a
                                                            href="{{ route('get.customer_update', $item->id) }}"
                                                            class="text-primary"><i class="fa fa-edit"></i></a></li>
                                                    <li><a href="{{ route('get.customer_delete', $item->id) }}"
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
