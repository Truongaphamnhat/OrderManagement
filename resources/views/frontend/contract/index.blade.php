@extends('frontend.layouts.business_contract')
@php
    setlocale(LC_MONETARY, 'vi_VN');    // Thiết lập locale cho tiền tệ (cần có extension intl)
    $totalDebt = 0;                     // Biến lưu tổng nợ
    $totalPaid = 0;                     // Biến lưu tổng đã thanh toán
    $totalContractValue = 0;            // Biến lưu tổng giá trị all hợp đồng
@endphp
@section('content')
    <div class="main-content-inner">
        <div class="row">
            <!-- Data table start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="head-title-addbtn">
                            <h4 class="header-title">Hợp đồng bán ra</h4>
                            <!-- AddNew & OtherOptions Btn -->
                            <div class="head-title-btn">
                                <a href="{{ route('get.contract_create') }}">
                                    <button type="button" class="btn btn-primary btn-addtrans mb-3"><i class="fa fa-plus-circle" aria-hidden="true"></i><span>Thêm HĐ</span></button>
                                </a>
                                <a href="{{ route('get.contract_goods_detail_create') }}">
                                    <button type="button" class="btn btn-primary btn-addtrans mb-3 ml-2"><i class="fa fa-cart-plus" aria-hidden="true" style="font-size: medium !important"></i><span>Thêm HH vào HĐ</span></button>
                                </a>
                                <a href="{{ route('get.contract_type_index') }}">
                                    <button type="button" class="btn btn-primary btn-addtrans mb-3 ml-2"><i class="fa fa-folder-open" aria-hidden="true"></i><span>Loại HĐ</span></button>
                                </a>
                            </div>
                        </div>

                        <div class="data-tables datatable-dark">
                            <table id="dataTable3" class="text-center table-business">
                                <thead class="text-capitalize">
                                    <tr>
                                        <th>Tên hợp đồng</th>
                                        <th>Giá trị HĐ</th>
                                        <th>Đã thanh toán</th>
                                        <th>Nợ</th>
                                        <th>Khách hàng</th>
                                        <th>Chủ sở hữu</th>
                                        <th>Người liên hệ</th>
                                        <th>Trạng thái</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contracts ?? [] as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ number_format($item->value, 0, ',', '.') }}</td>
                                            <td>{{ number_format($item->payment_amount, 0, ',', '.') }}</td>
                                            <td>{{ number_format($item->value - $item->payment_amount, 0, ',', '.')  ?? "[N/A]" }}</td>  {{-- Nợ = Giá trị - Tiền đã thanh toán --}}
                                            <td>{{ $item->customer->name ?? '[N/A]'}}</td>
                                            <td>{{ $item->user->name ?? '[N/A]' }}</td>
                                            <td>{{ $item->contact->name ?? '[N/A]' }}</td>
                                            <td>
                                                <span
                                                    class="{{ $item->getStatus($item->status)['class'] ?? 'badge badge-light' }}">
                                                    {{ $item->getStatus($item->status)['name'] ?? 'Hợp đồng mới lập' }}
                                                </span>
                                            </td>
                                            <td>
                                                <ul class="d-flex justify-content-center">
                                                    <li class="mr-2"><a href="{{ route('get.contract_detail', $item->id) }}"
                                                            class="text-primary"><i class="fa fa-info-circle"
                                                                aria-hidden="true"></i></a></li>
                                                    <li class="mr-2"><a href="{{ route('get.contract_update', $item->id) }}"
                                                            class="text-primary"><i class="fa fa-edit"></i></a></li>
                                                    <li><a href="{{ route('get.contract_delete', $item->id) }}"
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
            <!-- Thống kê tổng -->
            @foreach ($contracts ?? [] as $item)
                @php
                    $totalDebt += ($item->value - $item->payment_amount);
                    $totalPaid += $item->payment_amount;
                    $totalContractValue += $item->value;
                @endphp
            @endforeach
            <div class="card-body card-body-order">
                <div class="statistics-total">
                    <div class="total-label">
                        <span>Nợ:</span><br>
                        <span>Đã thanh toán:</span><br>
                        <span>Giá trị hợp đồng:</span>
                    </div>
                    <div class="total-money">
                        <span>{{ number_format($totalDebt, 0, ',', '.') }}</span><br>
                        <span>{{ number_format($totalPaid, 0, ',', '.') }}</span><br>
                        <span>{{ number_format($totalContractValue, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
