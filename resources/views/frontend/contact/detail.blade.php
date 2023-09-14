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
                                    <h4 class="header-title header-title-main">Chi tiết thông tin người liên hệ</h4>
                                    <div class="btn-group-head-order">
                                        {{-- <button onclick="window.location.href='../Customer/updateCustomer.php'"
                                        type="button" class="btn btn-addorder btn-back"><i
                                            class="fa fa-edit"></i></i><span>Sửa</span></button>
                                    <button onclick="window.location.href='../Customer/customer.php'" type="button"
                                        class="btn btn-addorder btn-back"><i class="fa fa-chevron-left"
                                            aria-hidden="true"></i><span>Trở về</span></button> --}}

                                        <span class="btn btn-addorder btn-back"><i class="fa fa-edit"></i>
                                            <a href="{{ route('get.contact_update', $contact->id) }}" style="color: white"><span>Sửa</span></a>
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
                                                    class="col-form-label input-label"><strong>Mã người
                                                        liên hệ (ID):</strong></label>
                                            </div>
                                            <div class="col-sm-7">
                                                <p class="col-form-label input-label">{{ $contact->id ?? "[N/A]"}}</p>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-sm-5">
                                                <label for="example-text-input"
                                                    class="col-form-label input-label"><strong>Tên người 
                                                        liên hệ:</strong></label>
                                            </div>
                                            <div class="col-sm-7">
                                                <p class="col-form-label input-label">{{ $contact->name ?? "[N/A]"}}</p>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-sm-5">
                                                <label for="example-text-input"
                                                    class="col-form-label input-label"><strong>Người tạo:</strong></label>
                                            </div>
                                            <div class="col-sm-7">
                                                <p class="col-form-label input-label">{{ $contact->user->name ?? "[N/A]"}}</p>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-sm-5">
                                                <label for="example-text-input"
                                                    class="col-form-label input-label"><strong>Chức vụ </strong></label>
                                            </div>
                                            <div class="col-sm-7">
                                                <p class="col-form-label input-label">{{ $contact->position->name ?? "[N/A]"}}</p>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-sm-5">
                                                <label for="example-text-input"
                                                    class="col-form-label input-label"><strong>Giới tính: </strong></label>
                                            </div>
                                            <div class="col-sm-7">
                                                <p class="col-form-label input-label">{{ $contact->getGender($contact->gender)['name'] ?? '[N\A]' }}</p>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-sm-5">
                                                <label for="example-text-input"
                                                    class="col-form-label input-label"><strong>Số điện
                                                        thoại:</strong></label>
                                            </div>
                                            <div class="col-sm-7">
                                                <p class="col-form-label input-label">{{ $contact->phone ?? "[N/A]"}}</p>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-sm-5">
                                                <label for="example-text-input"
                                                    class="col-form-label input-label"><strong>Email:</strong></label>
                                            </div>
                                            <div class="col-sm-7">
                                                <p class="col-form-label input-label">{{ $contact->email ?? "[N/A]"}}</p>
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
                                            <p class="col-form-label input-label">{{ $contact->address ?? "[N/A]"}}</p>
                                        </div>
                                    </div>
                                    
                                    
                        
                                    <div class="row form-group">
                                        <div class="col-sm-5">
                                            <label for="example-text-input"
                                                class="col-form-label input-label"><strong>Ngày tạo:</strong></label>
                                        </div>
                                        <div class="col-sm-7">
                                            <p class="col-form-label input-label">{{ $contact->created_at ?? "[N/A]"}}</p>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-sm-5">
                                            <label for="example-text-input"
                                                class="col-form-label input-label"><strong>Ngày cập
                                                    nhật:</strong></label>
                                        </div>
                                        <div class="col-sm-7">
                                            <p class="col-form-label input-label">{{ $contact->updated_at ?? "[N/A]"}}</p>
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
                                            <th>List Khách hàng</th>
                                            <th>Trạng thái</th>
                                            <th>Số điện thoại</th>
                                            <th>Địa chỉ</th>
                                            <th>Email</th>
                                            <th>Ngày tạo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                        <tr>
                                            <td>{{ $contact->customer->id }}</td>
                                            <td>{{ $contact->customer->name }}</td>
                                            <td>{{ $contact->customer->category->name ?? '[N\A]'}}</td>
                                            <td>{{ $contact->customer->getStatus($contact->customer->status)['name'] ?? 'Mới'  }}</td>
                                            <td>{{ $contact->customer->phone }}</td>
                                            <td>{{ $contact->customer->address }}</td>
                                            <td>{{ $contact->customer->email }}</td>
                                            <td>{{ $contact->customer->created_at }}</td>

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
