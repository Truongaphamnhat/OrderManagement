@extends('frontend.layouts.business_order')
@section('content')

            <div class="main-content-inner">
                <div class="row">
                    <div class="col-lg-12 col-ml-12">
                        <div class="row">
                            <!-- Tiêu đề -->
                            <div class="col-12 mt-5">
                                <div class="card card-header-main">
                                    <div class="card-body">
                                        <div class="card-header-order">
                                            <h4 class="header-title header-title-main">Chi tiết đơn hàng</h4>
                                            <div class="btn-group-head-order">
                                                <a href="{{ route('get.order_update', $orders->id ) }}">
                                                    <button type="button" class="btn btn-addorder btn-back"><i class="fa fa-edit"></i></i><span>Sửa</span></button>
                                                </a>
                                                {{-- <a href="{{ route('get.order_print') }}">
                                                    <button type="button" class="btn btn-addorder"><i class="fa fa-print" aria-hidden="true"></i><span>In đơn hàng</span></button>
                                                </a> --}}
                                                {{-- <a href="../Contract/addnewContract.php">
                                                    <button type="button" class="btn btn-addorder"><i class="fa fa-folder-open" aria-hidden="true"></i><span>Sinh hợp đồng</span></button>
                                                </a> --}}
                                                <a href="{{ route('get.order_index') }}">
                                                    <button type="button" class="btn btn-addorder btn-back"><i class="fa fa-chevron-left" aria-hidden="true"></i><span>Trở về</span></button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End -->
                            <!-- Form thông tin start -->
                            <div class="col-12 mt-2">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="row form-group">
                                                    <div class="col-sm-5">
                                                        <label for="example-text-input" class="col-form-label input-label"><strong>Mã đơn hàng:</strong></label>
                                                    </div>
                                                    <div class="col-sm-7">
                                                        <p class="col-form-label input-label">{{ $orders->code_order }}</p>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col-sm-5">
                                                        <label for="example-text-input" class="col-form-label input-label"><strong>Trạng thái đơn hàng:</strong></label>
                                                    </div>
                                                    <div class="col-sm-7">
                                                        <p class="col-form-label input-label">{{ $orders->status_order->name }}</p>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col-sm-5">
                                                        <label for="example-text-input" class="col-form-label input-label"><strong>Ngày đặt:</strong></label>
                                                    </div>
                                                    <div class="col-sm-7">
                                                        <p class="col-form-label input-label">{{ $orders->order_date }}</p>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col-sm-5">
                                                        <label for="example-text-input" class="col-form-label input-label"><strong>Tên người liên hệ:</strong></label>
                                                    </div>
                                                    <div class="col-sm-7">
                                                        <p class="col-form-label input-label">{{ $orders->contact_name }}</p>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col-sm-5">
                                                        <label for="example-text-input" class="col-form-label input-label"><strong>Số điện thoại:</strong></label>
                                                    </div>
                                                    <div class="col-sm-7">
                                                        <p class="col-form-label input-label">{{ $orders->contact_phone }}</p>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col-sm-5">
                                                        <label for="example-text-input" class="col-form-label input-label"><strong>Ghi chú:</strong></label>
                                                    </div>
                                                    <div class="col-sm-7">
                                                        <p class="col-form-label input-label">{{ $orders->note }}</p>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col-sm-5">
                                                        <label for="example-text-input" class="col-form-label input-label"><strong>Người tạo:</strong></label>
                                                    </div>
                                                    <div class="col-sm-7">
                                                        <p class="col-form-label input-label">{{ $orders->user->name }}</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="row form-group">
                                                    <div class="col-sm-5">
                                                        <label for="example-text-input" class="col-form-label input-label"><strong>Mã khách hàng:</strong></label>
                                                    </div>
                                                    <div class="col-sm-7">
                                                        <p class="col-form-label input-label">{{ $orders->customer->id }}</p>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col-sm-5">
                                                        <label for="example-text-input" class="col-form-label input-label"><strong>Khách hàng:</strong></label>
                                                    </div>
                                                    <div class="col-sm-7">
                                                        <p class="col-form-label input-label">{{ $orders->customer->name }}</p>
                                                    </div>
                                                </div>


                                                <div class="row form-group">
                                                    <div class="col-sm-5">
                                                        <label for="example-text-input" class="col-form-label input-label"><strong>Tỉnh thành:</strong></label>
                                                    </div>
                                                    <div class="col-sm-7">
                                                        <p class="col-form-label input-label">{{ $orders->customer->province->name ?? '...' }}</p>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col-sm-5">
                                                        <label for="example-text-input" class="col-form-label input-label"><strong>Quận huyện:</strong></label>
                                                    </div>
                                                    <div class="col-sm-7">
                                                        <p class="col-form-label input-label">{{ $orders->customer->district->name ?? '...' }}</p>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col-sm-5">
                                                        <label for="example-text-input" class="col-form-label input-label"><strong>Phường xã:</strong></label>
                                                    </div>
                                                    <div class="col-sm-7">
                                                        <p class="col-form-label input-label">{{ $orders->customer->ward->name ?? '...' }}</p>
                                                    </div>
                                                </div>


                                                <div class="row form-group">
                                                    <div class="col-sm-5">
                                                        <label for="example-text-input" class="col-form-label input-label"><strong>Số nhà:</strong></label>
                                                    </div>
                                                    <div class="col-sm-7">
                                                        <p class="col-form-label input-label">{{ $orders->customer->address }}</p>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col-sm-5">
                                                        <label for="example-text-input" class="col-form-label input-label"><strong>Điện thoại:</strong></label>
                                                    </div>
                                                    <div class="col-sm-7">
                                                        <p class="col-form-label input-label">{{ $orders->customer->phone }}</p>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col-sm-5">
                                                        <label for="example-text-input" class="col-form-label input-label"><strong>Mã số thuế:</strong></label>
                                                    </div>
                                                    <div class="col-sm-7">
                                                        <p class="col-form-label input-label">{{ $orders->customer->tax_code }}</p>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- <div class="col-3">
                                                <div class="row form-group">
                                                    <div class="col-sm-5">
                                                        <label for="example-text-input" class="col-form-label input-label"><strong>Số HĐ:</strong></label>
                                                    </div>
                                                    <div class="col-sm-7">
                                                        <p class="col-form-label input-label">...</p>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col-sm-5">
                                                        <label for="example-text-input" class="col-form-label input-label"><strong>Tên HĐ:</strong></label>
                                                    </div>
                                                    <div class="col-sm-7">
                                                        <p class="col-form-label input-label">...</p>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col-sm-5">
                                                        <label for="example-text-input" class="col-form-label input-label"><strong>Ngày bắt đầu:</strong></label>
                                                    </div>
                                                    <div class="col-sm-7">
                                                        <p class="col-form-label input-label">16/05/2023 18:25:00</p>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col-sm-5">
                                                        <label for="example-text-input" class="col-form-label input-label"><strong>Ngày kết thúc:</strong></label>
                                                    </div>
                                                    <div class="col-sm-7">
                                                        <p class="col-form-label input-label">16/05/2023 23:59:00</p>
                                                    </div>
                                                </div>
                                            </div> --}}

                                            <div class="col-4">
                                                <div class="row form-group">
                                                    <div class="col-sm-5">
                                                        <label for="example-text-input" class="col-form-label input-label"><strong>Ngày giao hàng:</strong></label>
                                                    </div>
                                                    <div class="col-sm-7">
                                                        <p class="col-form-label input-label">{{ $orders->delivery_time }}</p>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col-sm-5">
                                                        <label for="example-text-input" class="col-form-label input-label"><strong>Người giao</strong></label>
                                                    </div>
                                                    <div class="col-sm-7">
                                                        <p class="col-form-label input-label">{{ $orders->deliver->name }}</p>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col-sm-5">
                                                        <label for="example-text-input" class="col-form-label input-label"><strong>Hình thức thanh toán:</strong></label>
                                                    </div>
                                                    <div class="col-sm-7">
                                                        <p class="col-form-label input-label">{{ $orders->payments }}</p>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col-sm-5">
                                                        <label for="example-text-input" class="col-form-label input-label"><strong>Địa chỉ giao hàng:</strong></label>
                                                    </div>
                                                    <div class="col-sm-7">
                                                        <p class="col-form-label input-label">{{ $orders->delivery_address }}</p>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col-sm-5">
                                                        <label for="example-text-input" class="col-form-label input-label"><strong>Thời gian giao hàng:</strong></label>
                                                    </div>
                                                    <div class="col-sm-7">
                                                        <p class="col-form-label input-label">...</p>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col-sm-5">
                                                        <label for="example-text-input" class="col-form-label input-label"><strong>Bảo hành:</strong></label>
                                                    </div>
                                                    <div class="col-sm-7">
                                                        <p class="col-form-label input-label">{{ $orders->guarantee }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Form thông tin end -->

                            {{-- Cập nhật trạng thái start --}}
                            <div class="col-12 mt-2">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="head-title-addbtn">
                                            <h4 class="header-title">Cập nhật trạng thái</h4>
                                        </div>

                                        @if($orders->status == 1)
                                            <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                <div class="progress-bar" style="width: 20%">Chờ xử lý</div>
                                            </div>
                                        
                                        @elseif($orders->status == 2)
                                          <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-bar" style="width: 40%">Đang xử lý</div>
                                          </div>
                                        
                                        @elseif($orders->status == 3)
                                          <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-bar" style="width: 60%">Đã xử lý</div>
                                          </div>
                                        
                                        @elseif($orders->status == 4)
                                          <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-bar" style="width: 80%">Đang giao</div>
                                          </div>
                                        
                                        @elseif($orders->status == 5)
                                          <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-bar" style="width: 100%">Đã giao</div>
                                          </div>                                        
                                        @endif

                                        @if($orders->status == 0)
                                        <div class="progress" role="progressbar" aria-label="Danger example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-bar bg-danger" style="width: 100%">Đã hủy</div>
                                        </div>                                                                               
                                        @endif

                                        <div class="row">
                                            <div class="col-10">
                                                <div class="form-group">
                                                    <form action="" method="post" >
                                                        @csrf
                                                        <input type="hidden" name="status" value="{{ $orders->status }}">
                                                    
                                                    @if($orders->status == 1 || $orders->status == 0)
                                                        <button type="submit" name="submit_previous" class="btn btn-xs btn-outline-dark mb-3 mt-3" disabled>Lùi tiến độ</button>
                                                    @else
                                                        <button type="submit" name="submit_previous" class="btn btn-xs btn-outline-dark mb-3 mt-3" >Lùi tiến độ</button>
                                                    @endif
                                                    
                                                    @if($orders->status == 5 || $orders->status == 0)
                                                        <button type="submit"  name="submit_next" class="btn btn-xs btn-outline-dark mb-3 mt-3" disabled>Cập nhật tiến độ</button>
                                                    @else
                                                        <button type="submit"  name="submit_next" class="btn btn-xs btn-outline-dark mb-3 mt-3" >Cập nhật tiến độ</button>
                                                    @endif
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="col-1">
                                                <div class="form-group">
                                                    <form action="" method="post" >
                                                    @csrf
                                                        @if($orders->status == 0)
                                                        <input type="hidden" name="status" value="1">
                                                            <button type="submit"  name="submit_start" class="btn btn-xs btn-outline-dark mb-3 mt-3" >Quay lại tiến độ</button>
                                                        @else
                                                            <button type="submit"  name="submit_start" class="btn btn-xs btn-outline-dark mb-3 mt-3" hidden >Cập nhật tiến độ</button>
                                                        @endif
                                                    </form>     
                                                </div>
                                            </div>
                                            <div class="col-1">
                                                <div class="form-group">
                                                    <form action="" method="post" >
                                                    @csrf
                                                        <input type="hidden" name="status" value="0">
                                                        <button type="submit"  name="submit_cancel" class="btn btn-xs btn-outline-dark mb-3 mt-3" >Hủy đơn</button>

                                                    </form>     
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                               
                            {{-- Cập nhật trạng thái end --}}


                            <!-- Form thông tin hàng hóa start -->
                            <div class="col-12 mt-2">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="head-title-addbtn">
                                            <h4 class="header-title">Hàng hóa</h4>
                                        </div>
                                        <div class="data-tables datatable-dark">
                                            <table id="dataTable3" class="text-center table-business">
                                                <thead class="text-capitalize">
                                                    <tr>
                                                        <th>Mã hàng hóa</th>
                                                        <th>Tên hàng hóa</th>
                                                        <th>Mô tả</th>
                                                        <th>Xuất xứ</th>
                                                        <th>Hãng SX</th>
                                                        <th>Bảo hành</th>
                                                        <th>Đơn vị tính</th>
                                                        <th>Giá nhập</th>
                                                        <th>Giá xuất</th>
                                                        <th>Tỉ lệ vênh</th>
                                                        <th>Thuế</th>
                                                        <th>Thành tiền</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($order_detail_has_id ?? [] as $item)
                                                    <tr>
                                                        <td>{{ $item->id }} </td>
                                                        <td>{{  $item->goods->name }}</td>
                                                        <td>{{ $item->goods->describe }}</td>
                                                        <td>{{ $item->goods->origin }}</td>
                                                        <td>{{ $item->goods->manufacturer }}</td>
                                                        <td>{{ $item->goods->guarantee }}</td>
                                                        <td>{{ $item->goods->unit }}</td>
                                                        <td>{{ number_format($item->goods->input_price, 0, ',', '.') }}</td>
                                                        <td>{{ number_format($item->goods->output_price, 0, ',', '.') }}</td>
                                                        <td>{{ number_format($item->goods->markup_ratio, 0, ',', '.') }}</td>
                                                        <td>{{ number_format($item->goods->tax, 0, ',', '.') }}</td>
                                                        <td>{{ $item->goods->total }}</td>
                                                    </tr>
                                                    
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Form thông tin khách hàng end -->
                            <!-- Thống kê tổng đơn hàng -->
                    @php
                    setlocale(LC_MONETARY, 'vi_VN');    // Thiết lập locale cho tiền tệ (cần có extension intl)
                    $totalOutput_price = 0;                     // Biến lưu tổng tiền hàng
                    $totalTax = 0;                     // Biến lưu tổng thuế
                    $totalOrder_price = 0;            // Biến lưu tổng giá trị đơn hàng
                    $count = 0;
                    $avgTax = 0;
                @endphp
                @foreach ($order_detail_has_id ?? [] as $item)
                    @php
                        $count++;
                        $totalOutput_price += ($item->goods->output_price );
                        $totalTax += $item->goods->tax;
                        $avgTax = $totalTax / $count;
                        $totalOrder_price = $totalOutput_price + $totalOutput_price*$avgTax/100;
                    @endphp
                @endforeach
                
                <div class="card-body card-body-order">
                    <div class="statistics-total">
                        <div class="total-label">
                            {{-- <span>Tiền hàng:</span><br>
                            <span>Tiền thuế:</span><br> --}}
                            {{-- <span>Tiền CK:</span><br> --}}
                            <span>Tổng tiền:</span> 
                        </div>
                        <div class="total-money">
                          
                            {{-- <span>{{ number_format($totalOutput_price, 0, ',', '.') }}</span><br>
                            <span>{{ number_format($avgTax, 0, ',', '.') }}</span><br> --}}
                            <span>{{ number_format($totalOutput_price, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>
                        </div>
                    </div>
                </div>
     @stop 