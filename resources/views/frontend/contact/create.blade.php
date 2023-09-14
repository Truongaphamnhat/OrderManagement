{{-- @extends('frontend.layouts.app_frontend') --}}
@extends('frontend.layouts.contact_customer')
@section('content')
            <!-- page title area end -->
            <form method="POST" action="" >

            <div class="main-content-inner">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <!-- Tiêu đề -->
                            <div class="col-12 mt-5">
                                <div class="card card-header-main">
                                    <div class="card-body">
                                        <div class="card-header-order">
                                            <h4 class="header-title header-title-main">Thêm mới liên hệ</h4>
                                            <div class="btn-group-head-order">
                                                <button type="submit" class="btn btn-addorder"><i class="fa fa-floppy-o" aria-hidden="true"></i><span>Lưu</span></button>
                                                <a href="{{ route ('get.contact_index') }}">
                                                    <button type="button" class="btn btn-addorder btn-back"><i class="fa fa-chevron-left" aria-hidden="true"></i><span>Trở về</span></button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End -->
                            <!-- Form nhập thông tin liên hệ start-->

                            <div class="col-12 mt-2">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-header-order">
                                            <h4 class="header-title">Thông tin cơ bản</h4>
                                        </div>
                                        <p class="text-muted font-14">Vui lòng điền thông tin cần thiết vào form bên dưới. Các trường có dấu <code>*</code> là bắt buộc phải điền.</p>
                                        <div class="row"> 
                                            <div class="col-6">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="example-text-input" class="col-form-label input-label">Người liên hệ</label>
                                                    <input type="text" name="name" placeholder="Tên người liên hệ ..." class="form-control"
                                                        value="{{ old('name', $contacts->name ?? '') }}">
                                                    @error('name')
                                                        <small id="" class="form-text text-danger">{{ $errors->first('name') }}</small>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="example-search-input" class="col-form-label input-label">Khách hàng</label>
                                                    <select name="customer_id" class="custom-select custom-select-height" id="">
                                                        <option value="">----Chọn----</option>
                                                        @foreach ($customers ?? [] as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ ($contact->customer_id ?? 0) == $item->id ? 'selected' : '' }}>{{ $item->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('customer_id')
                                                        <small id="emailHelp" class="form-text text-danger">{{ $errors->first('customer_id') }}</small>
                                                    @enderror
                                                    
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-form-label input-label">Chức vụ:</label>
                                                    <select name="position_id" class="custom-select custom-select-height" id="">
                                                        <option value="">----Chọn----</option>
                                                        @foreach ($positions ?? [] as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ ($contact->position_id ?? 0) == $item->id ? 'selected' : '' }}>{{ $item->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('position_id')
                                                        <small id="emailHelp" class="form-text text-danger">{{ $errors->first('position_id') }}</small>
                                                    @enderror
                                                </div> 
                                                <div class="form-group">
                                                    <label for="example-email-input" class="col-form-label input-label">Email</label>
                                                    <input type="text" name="email" placeholder="truong@gmail.com" class="form-control"
                                                        value="{{ old('email', $contacts->email ?? '') }}">
                                                    @error('email')
                                                        <small id="" class="form-text text-danger">{{ $errors->first('email') }}</small>
                                                    @enderror
                                                </div>
                                                        
                                            </div>

                                            <div class="col-6 ">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="col-form-label input-label">Địa chỉ liên hệ</label>
                                                    <input type="text" name="address" placeholder="Bạc Liêu." class="form-control"
                                                        value="{{ old('address', $contacts->address ?? '') }}">
                                                       
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-form-label input-label">Giới tính</label>
                                                    <select name="gender" class="custom-select custom-select-height" id="">
                                                        @foreach ($gender ?? [] as $key => $item)
                                                            <option value="{{ $key }}" {{ ($contacts->gender ?? '') == $key ? 'selected' : '' }}>
                                                                {{ $item['name'] }}</option>
                                                        @endforeach          
                                                    </select>                                       
                                                </div>
                                                <div class="form-group">
                                                    <label for="example-tel-input" class="col-form-label input-label">Số điện thoại</label>
                                                    <input type="text" name="phone" placeholder="098760..." class="form-control"
                                                        value="{{ old('phone', $contacts->phone ?? '') }}">                                        
                                                </div>
                                                <div class="form-group">
                                                    <label for="example-datetime-local-input" class="col-form-label input-label">Ngày sinh</label>
                                                    <input type="date" name="birthday"class="form-control"
                                                        value="{{ old('birthday', $contacts->birthday ?? '') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                      
                            <!-- Form nhập thông tin hàng hóa end -->     
                        </div>
                    </div>
                    {{-- <!-- Form thông tin hàng hóa start -->
                    <div class="col-12 mt-2">
                        <div class="card">
                            <div class="card-body">
                                <div class="head-product-contact">
                                    <div class="head-title-addbtn">
                                        <h4 class="header-title">Khách Hàng</h4>
                                    </div>
                                    <div class="btn-load">
                                        <button type="button" class="btn btn-xs btn-outline-dark mb-3 mt-3" ><i class="ti-plus"></i> Chọn Khách Hàng</button>
                                    </div>
                                </div>
                                <div class="data-tables datatable-dark">
                                    <table id="dataTable3" class="text-center table-business">
                                        <thead class="text-capitalize">
                                            <tr>
                                                <th>Mã khách hàng</th>
                                                <th>Tên khách hàng</th>
                                                <th>Địa chỉ</th>
                                                <th>Số điện thoại</th>
                                                <th>Fax</th>
                                                <th>Bảo hành</th>
                                                <th>Đơn vị tính</th>
                                                <th>Giá nhập</th>
                                                <th>Giá xuất</th>
                                                <th>Thuế</th>
                                                <th>Thành tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
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
        </form>    

        {{-- </div> --}}
   
        <!-- main content area end -->
@stop