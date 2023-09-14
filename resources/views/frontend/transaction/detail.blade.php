@extends('frontend.layouts.business_transaction')
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
                                    <h4 class="header-title header-title-main">Chi tiết giao dịch</h4>
                                    <div class="btn-group-head-order">
                                        <a href="{{ route('get.transaction_update', $transaction->id) }}">
                                            <button type="button" class="btn btn-addorder btn-back"><i class="fa fa-edit"></i></i><span>Sửa</span></button>
                                        </a>
                                        <a href="{{ route('get.transaction_index') }}">
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
                                    <div class="col-6">
                                        <div class="row form-group" style="border-bottom: 1px solid #f3eeff;">
                                            <div class="col-sm-5">
                                                <label class="col-form-label input-label"><strong>Tên giao dịch:</strong></label>
                                            </div>
                                            <div class="col-sm-7">
                                                <p class="col-form-label input-label">{{ $transaction->name ?? "[N/A]" }}</p>
                                            </div>
                                        </div>
                                        <div class="row form-group" style="border-bottom: 1px solid #f3eeff;">
                                            <div class="col-sm-5">
                                                <label class="col-form-label input-label"><strong>Người phụ trách:</strong></label>
                                            </div>
                                            <div class="col-sm-7">
                                                <p class="col-form-label input-label">{{ $transaction->user->name ?? "[N/A]" }}</p>
                                            </div>
                                        </div>
                                        <div class="row form-group" style="border-bottom: 1px solid #f3eeff;">
                                            <div class="col-sm-5">
                                                <label class="col-form-label input-label"><strong>Ngày bắt đầu:</strong></label>
                                            </div>
                                            <div class="col-sm-7">
                                                <p class="col-form-label input-label">{{ $transaction->start_day ?? "[N/A]" }}</p>
                                            </div>
                                        </div>
                                        <div class="row form-group" style="border-bottom: 1px solid #f3eeff;">
                                            <div class="col-sm-5">
                                                <label class="col-form-label input-label"><strong>Hạn hoàn thành:</strong></label>
                                            </div>
                                            <div class="col-sm-7">
                                                <p class="col-form-label input-label">{{ $transaction->deadline_day ?? "[N/A]" }}<br></p>
                                            </div>
                                        </div>
                                        <div class="row form-group" style="border-bottom: 1px solid #f3eeff;">
                                            <div class="col-sm-5">
                                                <label class="col-form-label input-label"><strong>Ngày hoàn thành:</strong></label>
                                            </div>
                                            <div class="col-sm-7">
                                                <p class="col-form-label input-label">{{ $transaction->finish_day }}</p>
                                            </div>
                                        </div>
                                        <div class="row form-group" style="border-bottom: 1px solid #f3eeff;">
                                            <div class="col-sm-5">
                                                <label class="col-form-label input-label"><strong>Loại giao dịch:</strong></label>
                                            </div>
                                            <div class="col-sm-7">
                                                <p class="col-form-label input-label">{{ $transaction->transaction_type }}</p>
                                            </div>
                                        </div>
                                        <div class="row form-group" style="border-bottom: 1px solid #f3eeff;">
                                            <div class="col-sm-5">
                                                <label class="col-form-label input-label"><strong>Trạng thái:</strong></label>
                                            </div>
                                            <div class="col-sm-7 pt-2">
                                                <p class="input-label {{ $transaction->getStatus($transaction->status)['class'] ?? 'badge badge-light' }}">{{ $transaction->getStatus($transaction->status)['name'] ?? '[N\A]' }}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="row form-group" style="border-bottom: 1px solid #f3eeff; border-left: 1px solid #f3eeff;">
                                            <div class="col-sm-5">
                                                <label class="col-form-label input-label"><strong>Mức ưu tiên:</strong></label>
                                            </div>
                                            <div class="col-sm-7">
                                                <p class="col-form-label input-label">{{ $transaction->priority }}</p>
                                            </div>
                                        </div>
                                        <div class="row form-group" style="border-bottom: 1px solid #f3eeff; border-left: 1px solid #f3eeff;">
                                            <div class="col-sm-5">
                                                <label class="col-form-label input-label"><strong>Mô tả:</strong></label>
                                            </div>
                                            <div class="col-sm-7">
                                                <p class="col-form-label input-label">{{ $transaction->description }}</p>
                                            </div>
                                        </div>
                                        <div class="row form-group" style="border-bottom: 1px solid #f3eeff; border-left: 1px solid #f3eeff;">
                                            <div class="col-sm-5">
                                                <label class="col-form-label input-label"><strong>Người liên hệ:</strong></label>
                                            </div>
                                            <div class="col-sm-7">
                                                <p class="col-form-label input-label">{{ $transaction->contact->name ?? "[N/A]"}}</p>
                                            </div>
                                        </div>
                                        <div class="row form-group" style="border-bottom: 1px solid #f3eeff; border-left: 1px solid #f3eeff;">
                                            <div class="col-sm-5">
                                                <label class="col-form-label input-label"><strong>Chức vụ:</strong></label>
                                            </div>
                                            <div class="col-sm-7">
                                                <p class="col-form-label input-label">{{ $transaction->contact->position->name ?? "[N/A]" }}</p>
                                            </div>
                                        </div>
                                        <div class="row form-group" style="border-bottom: 1px solid #f3eeff; border-left: 1px solid #f3eeff;">
                                            <div class="col-sm-5">
                                                <label class="col-form-label input-label"><strong>Kết quả:</strong></label>
                                            </div>
                                            <div class="col-sm-7">
                                                <p class="col-form-label input-label">{{ $transaction->result }}</p>
                                            </div>
                                        </div>
                                        <div class="row form-group" style="border-bottom: 1px solid #f3eeff; border-left: 1px solid #f3eeff;">
                                            <div class="col-sm-5">
                                                <label class="col-form-label input-label"><strong>Địa chỉ giao dịch:</strong></label>
                                            </div>
                                            <div class="col-sm-7">
                                                <p class="col-form-label input-label">{{ $transaction->transaction_address }}</p>
                                            </div>
                                        </div>
                                        <div class="row form-group" style="border-bottom: 1px solid #f3eeff; border-left: 1px solid #f3eeff;">
                                            <div class="col-sm-5">
                                                <label class="col-form-label input-label"><strong>Tài liệu liên quan:</strong></label>
                                            </div>
                                            <div class="col-sm-7" style="padding-top: 5px !important;}">
                                                @if (isset($transaction->document) && $transaction->document)
                                                    <p>{{ $transaction->document }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Form thông tin end -->
                    <!-- Form thông tin khách hàng start -->
                    <div class="col-12 mt-2">
                        <div class="card">
                            <div class="card-body">
                                <div class="head-title-addbtn">
                                    <h4 class="header-title">Khách hàng</h4>
                                </div>
                                <div class="data-tables datatable-dark">
                                    <table id="dataTable3" class="text-center table-business">
                                        <thead class="text-capitalize">
                                            <tr>
                                                <th>Mã khách hàng</th>
                                                <th>Tên khách hàng</th>
                                                <th>Điện thoại</th>
                                                <th>Địa chỉ văn phòng</th>
                                                <th>Mã số thuế</th>
                                                <th>Trạng thái</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($customer ?? [] as $item)
                                                @if ($transaction->customer_id == $item->id)    {{-- Kiểm tra điều kiện id khách hàng tương ứng với giao dịch --}}
                                                    <tr>
                                                        <td>{{ $item->id }}</td>
                                                        <td>{{ $item->name }}</td>
                                                        <td>{{ $item->phone }}</td>
                                                        <td>{{ $item->address }}</td>
                                                        <td>{{ $item->tax_code }}</td>
                                                        <td>
                                                            <span
                                                                class="{{ $item->getStatus($item->status)['class'] ?? 'badge badge-light' }}">
                                                                {{ $item->getStatus($item->status)['name'] ?? 'Mới' }}
                                                            </span>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Form thông tin khách hàng end -->
                </div>
            </div>
        </div>
    </div>
@stop
