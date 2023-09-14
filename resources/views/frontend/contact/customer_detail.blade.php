{{-- @extends('frontend.layouts.app_frontend') --}}
@extends('frontend.layouts.contact_customer')
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
                                    <h4 class="header-title header-title-main">Chi tiết thông tin Khách hàng</h4>
                                    <div class="btn-group-head-order">
                                        {{-- <button onclick="window.location.href='../Customer/updateCustomer.php'"
                                        type="button" class="btn btn-addorder btn-back"><i
                                            class="fa fa-edit"></i></i><span>Sửa</span></button>
                                    <button onclick="window.location.href='../Customer/customer.php'" type="button"
                                        class="btn btn-addorder btn-back"><i class="fa fa-chevron-left"
                                            aria-hidden="true"></i><span>Trở về</span></button> --}}

                                        <span class="btn btn-addorder btn-back"><i class="fa fa-edit"></i>
                                            <a href="{{ route('get.contact_customer_update', $customer->id) }}" style="color: white"><span>Sửa</span></a>
                                        </span>
                                        <span class="btn btn-addorder btn-back"><i class="fa fa-chevron-left"
                                                aria-hidden="true"></i>
                                            <a href="{{ route('get.contact_index') }}" style="color: white"><span>Trở về</span></a>
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
                                                    class="col-form-label input-label"><strong>Mã khách
                                                        hàng (ID):</strong></label>
                                            </div>
                                            <div class="col-sm-7">
                                                <p class="col-form-label input-label">{{ $customer->id ?? "[N/A]"}}</p>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-sm-5">
                                                <label for="example-text-input"
                                                    class="col-form-label input-label"><strong>Tên khách
                                                        hàng:</strong></label>
                                            </div>
                                            <div class="col-sm-7">
                                                <p class="col-form-label input-label">{{ $customer->name ?? "[N/A]"}}</p>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-sm-5">
                                                <label for="example-text-input"
                                                    class="col-form-label input-label"><strong>Người tạo:</strong></label>
                                            </div>
                                            <div class="col-sm-7">
                                                <p class="col-form-label input-label">{{ $customer->user->name ?? "[N/A]"}}</p>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-sm-5">
                                                <label for="example-text-input"
                                                    class="col-form-label input-label"><strong>Danh mục: </strong></label>
                                            </div>
                                            <div class="col-sm-7">
                                                <p class="col-form-label input-label">{{ $customer->category->name ?? "[N/A]"}}</p>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-sm-5">
                                                <label for="example-text-input"
                                                    class="col-form-label input-label"><strong>Trạng thái: </strong></label>
                                            </div>
                                            <div class="col-sm-7">
                                                <p class="{{ $customer->getStatus($customer->status)['class'] ?? 'badge badge-light' }}">{{ $customer->getStatus($customer->status)['name'] ?? '[N\A]' }}</p>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-sm-5">
                                                <label for="example-text-input"
                                                    class="col-form-label input-label"><strong>Số điện
                                                        thoại:</strong></label>
                                            </div>
                                            <div class="col-sm-7">
                                                <p class="col-form-label input-label">{{ $customer->phone ?? "[N/A]"}}</p>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-sm-5">
                                                <label for="example-text-input"
                                                    class="col-form-label input-label"><strong>Email:</strong></label>
                                            </div>
                                            <div class="col-sm-7">
                                                <p class="col-form-label input-label">{{ $customer->email ?? "[N/A]"}}</p>
                                            </div>
                                        </div>
                                       
                                    </div>

                                <div class="col-6">
                                    <div class="row form-group">
                                        <div class="col-sm-5">
                                            <label for="example-text-input" class="col-form-label input-label"><strong>Địa
                                                    chỉ văn
                                                    phòng:</strong></label>
                                        </div>
                                        <div class="col-sm-7">
                                            <p class="col-form-label input-label">{{ $customer->address ?? "[N/A]"}}</p>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-sm-5">
                                            <label for="example-text-input" class="col-form-label input-label"><strong>Mô
                                                    tả:</strong></label>
                                        </div>
                                        <div class="col-sm-7">
                                            <p class="col-form-label input-label">{{ $customer->description ?? "[N/A]"}}</p>
                                        </div>
                                    </div>
                                    
                                    <div class="row form-group">
                                        <div class="col-sm-5">
                                            <label for="example-text-input" class="col-form-label input-label"><strong>Hình ảnh:</strong></label>
                                        </div>
                                        <div class="col-sm-7">
                                            <img src="{{ pare_url_file($customer->avatar) }}"
                                            style="width: 60px; height: 60px; border-radius: 10px" alt="">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-sm-5">
                                            <label for="example-text-input"
                                                class="col-form-label input-label"><strong>Ngày tạo:</strong></label>
                                        </div>
                                        <div class="col-sm-7">
                                            <p class="col-form-label input-label">{{ $customer->created_at ?? "[N/A]"}}</p>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-sm-5">
                                            <label for="example-text-input"
                                                class="col-form-label input-label"><strong>Ngày cập
                                                    nhật:</strong></label>
                                        </div>
                                        <div class="col-sm-7">
                                            <p class="col-form-label input-label">{{ $customer->updated_at ?? "[N/A]"}}</p>
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
                </div>
                <!-- Form thông tin khách hàng end -->
            </div>
        </div>

    </div>

    </div>
@stop
