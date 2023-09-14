@extends('frontend.layouts.business_order')
@section('content')

            <div class="main-content-inner">
                <div class="row">
                    <!-- Data table start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="head-title-addbtn">
                                    <h4 class="header-title">Đơn hàng</h4>
                                    <!-- AddNew & OtherOptions Btn -->
                                    <div class="head-title-btn">
                                        <a href="{{ route('get.order_create') }}">
                                            <button type="button" class="btn btn-primary btn-addtrans mb-3"><i class="fa fa-plus-circle" aria-hidden="true"></i></i><span>Thêm mới</span></button>
                                        </a>
                                    </div>
                                </div>

                                <div class="data-tables datatable-dark">
                                    <table id="dataTable3" class="text-center table-business">
                                        <thead class="text-capitalize">
                                            <tr>
                                                <th>Thao tác</th>
                                                <th>Mã đơn hàng</th>
                                                <th>Khách hàng</th>
                                                {{-- <th>Ngày đặt</th> --}}
                                                {{-- <th>Ngày giao</th> --}}
                                                <th>Địa chỉ giao hàng</th>
                                                <th>Trạng thái</th>
                                                {{-- <th>Người giao</th> --}}
                                                {{-- <th>Ghi chú</th> --}}
                                                <th>Hình thức Thanh toán</th>
                                                {{-- <th>Mã hợp đồng</th> --}}
                                                {{-- <th>Người tạo</th> --}}
                                                {{-- <th>Tiền hàng</th>
                                                <th>Tiền thuế</th>
                                                <th>Tiền CK</th>
                                                <th>Tổng tiền</th> --}}
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders ?? [] as $item)
                                            <tr>
                                                <td>
                                                    <ul class="d-flex justify-content-center">
                                                        <li class="mr-2"><a href="{{ route('get.order_detail', $item->id) }}" class="text-primary"><i class="fa fa-info-circle" aria-hidden="true"></i></a></li>
                                                        <li class="mr-2"><a href="{{ route('get.order_update', $item->id) }}" class="text-primary"><i class="fa fa-edit"></i></a></li>
                                                        <li><a href="{{ route('get.order_delete', $item->id) }}" class="text-danger"><i class="ti-trash"></i></a></li>
                                                    </ul>
                                                </td>
                                                <td>{{ $item->code_order }}</td>
                                                <td>{{ $item->customer->name }}</td>
                                                {{-- <td>{{ $item->order_date }}</td> --}}
                                                {{-- <td>{{ $item->delivery_time }}</td> --}}
                                                <td>{{ strlen($item->delivery_address) > 20 ? mb_substr($item->delivery_address, 0, 15, 'UTF-8') . '...' : $item->delivery_address }}
                                                </td>
                                                <td><span class="status-p bg-primary">{{ strlen($item->status_order->name ) > 20 ? mb_substr($item->status_order->name , 0, 15, 'UTF-8') . '...' : $item->status_order->name  }}
                                                </td>
                                                
                                                {{-- <td>{{ $item->deliver->name }}</td> --}}
                                                {{-- <td>{{ $item->note }}</td> --}}
                                                <td>{{ $item->payments }}</td>
                                                {{-- <td>{{ $item->contract_id }}</td> --}}
                                                {{-- <td>{{ $item->user->name }}</td> --}}
                                                {{-- <td>1.900.000</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>1.900.000</td> --}}
                                                

                                            </tr>
                                            @endforeach
                                          
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Data table end -->
                    <!-- Thống kê tổng đơn hàng -->
                    {{-- <div class="card-body card-body-order">
                        <div class="statistics-total">
                            <div class="total-label">
                                <span>Tiền hàng:</span><br>
                                <span>Tiền thuế:</span><br>
                                <span>Tiền CK:</span><br>
                                <span>Tổng tiền:</span>
                            </div>
                            <div class="total-money">
                                <span>1.900.000</span><br>
                                <span>0</span><br>
                                <span>0</span><br>
                                <span>1.900.000</span>
                            </div>
                        </div>
                    </div> --}}
                    <!-- Thống kê tổng đơn hàng end -->
                </div>
            </div>
        </div>
     @stop 