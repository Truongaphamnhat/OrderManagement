{{-- @extends('frontend.layouts.app_frontend') --}}
@extends('frontend.layouts.representer')
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
                                    <h4 class="header-title header-title-main">Chi tiết thông tin người đại diện</h4>
                                    <div class="btn-group-head-order">
                                        <span class="btn btn-addorder btn-back"><i class="fa fa-edit"></i>
                                            <a href="{{ route('get.representer_update', $representer->id) }}" style="color: white"><span>Sửa</span></a>
                                        </span>
                                        <span class="btn btn-addorder btn-back"><i class="fa fa-chevron-left"
                                                aria-hidden="true"></i>
                                            <a href="{{ route('get.representer_index') }}" style="color: white"><span>Trở về</span></a>
                                        </span>
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
                                        <div class="row form-group">
                                            <div class="col-sm-5">
                                                <label for="example-text-input"
                                                    class="col-form-label input-label"><strong>Mã người đại diện (ID):</strong></label>
                                            </div>
                                            <div class="col-sm-7">
                                                <p class="col-form-label input-label">{{ $representer->id ?? "[N/A]"}}</p>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-sm-5">
                                                <label for="example-text-input"
                                                    class="col-form-label input-label"><strong>Tên người đại diện:</strong></label>
                                            </div>
                                            <div class="col-sm-7">
                                                <p class="col-form-label input-label">{{ $representer->name ?? "[N/A]"}}</p>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-sm-5">
                                                <label for="example-text-input"
                                                    class="col-form-label input-label"><strong>Đại diện cho khách hàng:</strong></label>
                                            </div>
                                            <div class="col-sm-7">
                                                <p class="col-form-label input-label">{{ $representer->customer->name ?? "[N/A]"}}</p>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-sm-5">
                                                <label for="example-text-input"
                                                    class="col-form-label input-label"><strong>Nhân viên tạo:</strong></label>
                                            </div>
                                            <div class="col-sm-7">
                                                <p class="col-form-label input-label">{{ $representer->user->name ?? "[N/A]"}}</p>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-sm-5">
                                                <label for="example-text-input"
                                                    class="col-form-label input-label"><strong>Số điện
                                                        thoại:</strong></label>
                                            </div>
                                            <div class="col-sm-7">
                                                <p class="col-form-label input-label">{{ $representer->phone ?? "[N/A]"}}</p>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-sm-5">
                                                <label for="example-text-input"
                                                    class="col-form-label input-label"><strong>Email:</strong></label>
                                            </div>
                                            <div class="col-sm-7">
                                                <p class="col-form-label input-label">{{ $representer->email ?? "[N/A]"}}</p>
                                            </div>
                                        </div>
                                       
                                    </div>

                                <div class="col-6">
                                    <div class="row form-group">
                                        <div class="col-sm-5">
                                            <label for="example-text-input" class="col-form-label input-label"><strong>Tỉnh thành:</strong></label>
                                        </div>
                                        <div class="col-sm-7">
                                            <p class="col-form-label input-label">{{ $representer->province->name ?? '...' }}</p>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-sm-5">
                                            <label for="example-text-input" class="col-form-label input-label"><strong>Quận huyện:</strong></label>
                                        </div>
                                        <div class="col-sm-7">
                                            <p class="col-form-label input-label">{{ $representer->district->name ?? '...' }}</p>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-sm-5">
                                            <label for="example-text-input" class="col-form-label input-label"><strong>Phường xã:</strong></label>
                                        </div>
                                        <div class="col-sm-7">
                                            <p class="col-form-label input-label">{{ $representer->ward->name ?? '...' }}</p>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-sm-5">
                                            <label for="example-text-input" class="col-form-label input-label"><strong>Địa
                                                    chỉ cụ thể:</strong></label>
                                        </div>
                                        <div class="col-sm-7">
                                            <p class="col-form-label input-label">{{ $representer->address ?? "[N/A]"}}</p>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-sm-5">
                                            <label for="example-text-input" class="col-form-label input-label"><strong>Chức vụ:</strong></label>
                                        </div>
                                        <div class="col-sm-7">
                                            <p class="col-form-label input-label">{{ $representer->description ?? "[N/A]"}}</p>
                                        </div>
                                    </div>
                                    
                                    <div class="row form-group">
                                        <div class="col-sm-5">
                                            <label for="example-text-input" class="col-form-label input-label"><strong>Hình ảnh:</strong></label>
                                        </div>
                                        <div class="col-sm-7">
                                            <img src="{{ pare_url_file($representer->avatar) }}"
                                            style="width: 60px; height: 60px; border-radius: 10px" alt="">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-sm-5">
                                            <label for="example-text-input"
                                                class="col-form-label input-label"><strong>Ngày tạo:</strong></label>
                                        </div>
                                        <div class="col-sm-7">
                                            <p class="col-form-label input-label">{{ $representer->created_at ?? "[N/A]"}}</p>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-sm-5">
                                            <label for="example-text-input"
                                                class="col-form-label input-label"><strong>Ngày cập
                                                    nhật:</strong></label>
                                        </div>
                                        <div class="col-sm-7">
                                            <p class="col-form-label input-label">{{ $representer->updated_at ?? "[N/A]"}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Form thông tin end -->
                <!-- Form thông tin khách hàng start -->
                {{-- <div class="col-12 mt-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="head-title-addbtn">
                                <h4 class="header-title">Liên hệ</h4>
                            </div>
                            <div class="data-tables datatable-dark">
                                <table id="dataTable3" class="text-center table-business">
                                    <thead class="text-capitalize">
                                        <tr>
                                            <th>Người liên hệ</th>
                                            <th>Chức vụ</th>
                                            <th>Số điện thoại</th>
                                            <th>Địa chỉ</th>
                                            <th>Email</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Lê Minh Thắng</td>
                                            <td>Kỹ thuật</td>
                                            <td>0334567878</td>
                                            <td>...</td>
                                            <td>thang@gmail.com</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- Form thông tin khách hàng end -->
            </div>
        </div>

    </div>

    </div>
@stop
