{{-- @extends('frontend.layouts.app_frontend') --}}
@extends('frontend.layouts.representer')
@section('content')
    <!-- page title area end -->
    <div class="main-content-inner">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <!-- Form nhập thông tin liên hệ start-->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-header-order">
                                    <h4 class="header-title">Thêm mới người đại diện</h4>
                                    <div class="btn-group-head-order">
                                        <span class="btn btn-addorder btn-back"><i class="fa fa-chevron-left"
                                                aria-hidden="true"></i><a href="{{ route('get.representer_index') }}"
                                                style="color: white"> <span>Trờ về</span></a> </span>
                                    </div>
                                </div>

                                <div class="btn-load">
                                    <button type="button" name="btn-choose-customer" class="btn btn-xs btn-outline-dark mb-3 mt-3 mr-3"
                                        data-toggle="modal" data-target="#modal-representer"><i class="fa fa-plus pr-1"
                                            aria-hidden="true"></i> Chọn Khách
                                        Hàng</button>
                                    @error('customer_id')
                                        <small id="" class="form-text text-danger">{{ $errors->first('customer_id') }}</small>  
                                    @enderror
                                </div>

                                <div class="card">
                                    <div class="modal fade show" id="modal-representer"
                                        style="display: none; padding-right: 17px; background: rgba(0,0,0,0.3);"
                                        data-backdrop="static">
                                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Danh Sách Khách Hàng</h5>
                                                    <button type="button" class="close"
                                                        id="modal-close-button"><span>×</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Bảng danh sách thông tin khách hàng start -->
                                                    <div class="data-tables datatable-dark">
                                                        <table id="dataTable3" class="text-center table-business">
                                                            <thead class="text-capitalize">
                                                                <tr>
                                                                    <th>Mã khách hàng</th>
                                                                    <th>Tên khách hàng</th>
                                                                    <th>Địa chỉ</th>
                                                                    <th>Điện thoại</th>
                                                                    <th>Email</th>
                                                                    <th>Mã số thuế</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($customers ?? [] as $item)
                                                                    <tr>
                                                                        <td>{{ $item->id }}</td>
                                                                        <td>{{ $item->name }}</td>
                                                                        <td>{{ $item->address }}</td>
                                                                        <td>{{ $item->phone }}</td>
                                                                        <td>{{ $item->email }}</td>
                                                                        <td>{{ $item->tax_code }}</td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!-- Bảng danh sách thông tin khách hàng end -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                    $(document).ready(function() {
                                        // Lắng nghe sự kiện nhấp chuột vào hàng trong bảng
                                        $('#dataTable3 tbody tr').click(function() {
                                            // Lấy giá trị trong các ô dữ liệu của hàng được nhấp
                                            var customerId = $(this).find('td:first').text();
                                            var customerName = $(this).find('td:nth-child(2)').text();
                                            // var customerAddress = $(this).find('td:nth-child(3)').text();
                                            var customerPhone = $(this).find('td:nth-child(4)').text();
                                            var customerEmail = $(this).find('td:nth-child(5)').text();
                                            var customerTaxCode = $(this).find('td:nth-child(6)').text();

                                            // Hiển thị thông tin khách hàng được chọn vào các box
                                            $('#customer_id').val(customerId);
                                            $('#customer_name').val(customerName);
                                            // $('#customer_address').val(customerAddress);
                                            $('#customer_phone').val(customerPhone);
                                            $('#customer_email').val(customerEmail);
                                            $('#customer_tax_code').val(customerTaxCode);

                                            // Đồng thời ẩn modal
                                            $('#modal-representer').modal('hide');
                                        });

                                        // Xử lý tắt bằng nút "x"
                                        $('#modal-close-button').click(function() {
                                            $('#modal-representer').modal('hide');
                                        });
                                    });
                                </script>
                                {{-- CSS để khi click "Chọn khách hàng" bảng mở ra không bị JS của dataTable tự đặt width khiến bảng bể --}}
                                <style>
                                    #dataTable3 {
                                        width: 100% !important;
                                    }
                                </style>

                                @include('frontend.representer.form')

                            </div>
                        </div>
                    </div>
                    <!-- Form nhập thông tin hàng hóa end -->
                </div>
            </div>
        </div>
    </div>
    </div>
@stop
