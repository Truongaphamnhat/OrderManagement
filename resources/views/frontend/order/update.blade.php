@extends('frontend.layouts.business_order')
@section('content')
<form method="POST" action="" id="orderForm" autocomplete="off" enctype="multipart/form-data">
    @csrf
    <div class="main-content-inner">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-12 mt-5">
                        <div class="card card-header-main">
                            <div class="card-body">
                                <div class="card-header-order">
                                    <h4 class="header-title header-title-main">Cập nhật đơn hàng</h4>
                                    <div class="btn-group-head-order">
                                        <button type="button" onclick="submitForm()" class="btn btn-addorder"><i class="fa fa-floppy-o" aria-hidden="true"></i><span>Cập nhật</span></button>
                                        <script>
                                            function submitForm() {
                                                var form = document.getElementById('orderForm');
                                                form.submit();
                                            }
                                        </script>
                                        <a href="{{ route('get.order_index') }}">
                                            <button type="button" class="btn btn-addorder btn-back"><i class="fa fa-chevron-left" aria-hidden="true"></i><span>Trở về</span></button>
                                        </a>
                                        <style>
                                            .btn:hover {
                                                color: #fff !important;
                                            }
                                        </style>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Form nhập thông tin Khách hàng start -->
                    <div class="col-12 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-header-order">
                                    <h4 class="header-title">Thông tin Khách hàng</h4>
                                </div>
                                <p class="text-muted font-14">Vui lòng điền thông tin cần thiết vào form bên dưới. Các trường có dấu <code>*</code> là bắt buộc phải điền.</p>
                                {{-- Modal Khách hàng --}}
                                    <div class="card">
                                        <div class="modal fade show" id="modal-customer" style="display: none; padding-right: 17px; background: rgba(0,0,0,0.3);" data-backdrop="static">
                                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Danh Sách Khách Hàng</h5>
                                                        <button type="button" class="close" id="modal-close-button"><span>×</span></button>
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
                                    {{-- Xử lý click chọn 1 khách hàng --}}
                                    <script>
                                        $(document).ready(function() {
                                            // Lắng nghe sự kiện nhấp chuột vào hàng trong bảng
                                            $('#dataTable3 tbody tr').click(function() {
                                                // Lấy giá trị trong các ô dữ liệu của hàng được nhấp
                                                var customerId = $(this).find('td:first').text();
                                                var customerName = $(this).find('td:nth-child(2)').text();
                                                var customerAddress = $(this).find('td:nth-child(3)').text();
                                                var customerPhone = $(this).find('td:nth-child(4)').text();
                                                var customerEmail = $(this).find('td:nth-child(5)').text();
                                                var customerTaxCode = $(this).find('td:nth-child(6)').text();

                                                // Hiển thị thông tin khách hàng được chọn vào các box
                                                $('#customer_id').val(customerId);
                                                $('#customer_name').val(customerName);
                                                $('#customer_address').val(customerAddress);
                                                $('#customer_phone').val(customerPhone);
                                                $('#customer_email').val(customerEmail);
                                                $('#customer_tax_code').val(customerTaxCode);

                                                // Đồng thời ẩn modal
                                                $('#modal-customer').modal('hide');
                                            });

                                            // Xử lý tắt bằng nút "x"
                                            $('#modal-close-button').click(function() {
                                                $('#modal-customer').modal('hide');
                                            });
                                        });
                                    </script>
                                    {{-- CSS để khi click "Chọn khách hàng" bảng mở ra không bị JS của dataTable tự đặt width khiến bảng bể --}}
                                    <style>
                                        #dataTable3 {
                                            width: 100% !important;
                                        }
                                    </style>
                                    {{-- End --}}
                                {{-- End Modal Khách hàng --}}
                                {{-- Modal Liên hệ --}}
                                <div class="card">
                                    <div class="modal fade show" id="modal-contact" style="display: none; padding-right: 17px; background: rgba(0,0,0,0.3);" data-backdrop="static">
                                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Danh Sách Liên Hệ</h5>
                                                    <button type="button" class="close" id="modal-close-button-contact"><span>×</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Bảng danh sách thông tin liên hệ start -->
                                                    <div class="data-tables datatable-dark">
                                                        <table id="dataTable2" class="text-center table-business">
                                                            <thead class="text-capitalize">
                                                                <tr>
                                                                    <th>Mã liên hệ</th>
                                                                    <th>Tên liên hệ</th>
                                                                    <th>Chức vụ</th>
                                                                    <th>Địa chỉ</th>
                                                                    <th>Điện thoại</th>
                                                                    <th>Email</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($contacts ?? [] as $item)
                                                                    <tr>
                                                                        <td>{{ $item->id }}</td>
                                                                        <td>{{ $item->name }}</td>
                                                                        <td>{{ $item->position->name }}</td>
                                                                        <td>{{ $item->address }}</td>
                                                                        <td>{{ $item->phone }}</td>
                                                                        <td>{{ $item->email }}</td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!-- Bảng danh sách thông tin liên hệ end -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Xử lý click chọn 1 liên hệ --}}
                                <script>
                                    $(document).ready(function() {
                                        // Lắng nghe sự kiện nhấp chuột vào hàng trong bảng
                                        $('#dataTable2 tbody tr').click(function() {
                                            // Lấy giá trị trong các ô dữ liệu của hàng được nhấp
                                            var contactId = $(this).find('td:nth-child(1)').text();
                                            var contactName = $(this).find('td:nth-child(2)').text();
                                            var contactPosition = $(this).find('td:nth-child(3)').text();
                                            var contactPhone = $(this).find('td:nth-child(5)').text();

                                            // Hiển thị thông tin khách hàng được chọn vào các box
                                            $('#contact_id').val(contactId);
                                            $('#contact_name').val(contactName);
                                            $('#contact_position').val(contactPosition);
                                            $('#contact_phone').val(contactPhone);

                                            // Đồng thời ẩn modal
                                            $('#modal-contact').modal('hide');
                                        });

                                        // Xử lý tắt bằng nút "x"
                                        $('#modal-close-button-contact').click(function() {
                                            $('#modal-contact').modal('hide');
                                        });
                                    });
                                </script>
                                {{-- CSS để khi click "Chọn liên hệ" bảng mở ra không bị JS của dataTable tự đặt width khiến bảng bể --}}
                                <style>
                                    #dataTable2 {
                                        width: 100% !important;
                                    }
                                </style>
                                {{-- End --}}
                            {{-- End Modal Liên hệ --}}
                                <div class="btn-load">
                                    <a href="{{ route ('get.order_goods_update', $order->id) }}">
                                        <button type="button" class="btn btn-xs btn-outline-dark mb-3 mt-3 mr-3" ><i class="fa fa-plus pr-1" aria-hidden="true"></i> Chọn Hàng Hóa</button>
                                    </a>
                                    <button type="button" class="btn btn-xs btn-outline-dark mb-3 mt-3 mr-3" data-toggle="modal" data-target="#modal-customer"><i class="fa fa-plus pr-1" aria-hidden="true"></i> Chọn Khách Hàng</button>
                                    <button type="button" class="btn btn-xs btn-outline-dark mb-3 mt-3 mr-3" data-toggle="modal" data-target="#modal-contact"><i class="fa fa-plus pr-1" aria-hidden="true"></i> Chọn Liên Hệ</button>
                                    @error('goods_name')
                                    <small id="emailHelp" class="form-text text-danger">{{ $errors->first('goods_name') }}</small>
                                @enderror
                                @error('customer_id')
                                    <small id="" class="form-text text-danger">{{ $errors->first('customer_id') }}</small>  
                                @enderror
                                @error('contact_name')
                                    <small id="" class="form-text text-danger">{{ $errors->first('contact_name') }}</small>  
                                @enderror
                                </div>
                             
                                    
<div class="row">
    <div class="col-4">
        <div class="form-group">
            <label for="example-text-input" class="col-form-label input-label">Mã đơn hàng<span style="color: red">*</span></label>
    
            <input class="form-control" name="code_order" type="text" value="{{ old('code_order', $order->code_order ?? '') }}"  id="example-datetime-local-input">
            @error('code_order')
                <small id="emailHelp" class="form-text text-danger">{{ $errors->first('code_order') }}</small>
            @enderror
            {{-- <select class="custom-select custom-select-height">
                <option value="KH" selected="selected">Chọn Khách Hàng</option>
                <option value="HD">Chọn Hợp Đồng</option>
                <option value="AddNewKH">Thêm Mới Khách Hàng</option>
                {{-- <option value="">----Chọn khách hàng----</option>
                @foreach ($customers ?? [] as $order)
                    <option value="{{ $order->id }}"
                        {{ ($order->code_customer ?? 0) == $order->id ? 'selected' : '' }}>{{ $order->name }}
                    </option>
                @endforeach --}}
            {{-- </select> --}} 
        </div>
        <div class="form-group">
            <label for="example-text-input" class="col-form-label input-label">Ngày đặt hàng:</label>
            <input class="form-control" type="datetime-local" name="order_date" value="{{ old('order_date', $order->order_date ?? '') }}"  id="example-datetime-local-input">
           
        </div>

        <!-- Ở mục chọn, khi chọn "Chọn hợp đồng" thì 2 trường dưới mới xuất hiện -->

        <!-- <div class="form-group">
            <label for="example-text-input" class="col-form-label input-label">Mã hợp đồng:</label>
            <input class="form-control" type="text" value="" id="example-text-input" disabled>
        </div>
        <div class="form-group">
            <label for="example-text-input" class="col-form-label input-label">Ngày bắt đầu HĐ:</label>
            <input class="form-control" type="text" value="" id="example-text-input" disabled>
        </div> -->
    </div>

    <div class="col-4">
      
        <div class="form-group">
            <label for="customer_id" class="col-form-label input-label">Mã khách hàng</label>
             
            <input class="form-control"  name="customer_id"  type="text" value="{{ old('customer_id', $order->customer_id ?? '') }}"   id="customer_id" readonly>
           
            @error('customer_id')
                <small id="" class="form-text text-danger">{{ $errors->first('customer_id') }}</small>  
            @enderror
       
            <input type="hidden" name="order_id" @foreach ($orders1 as $item) value="{{ $item->id }}" @endforeach>
                    
                
        </div>
       

        
        <div class="form-group">
            <label for="customer_name" class="col-form-label input-label">Tên khách hàng:</label>
            <input class="form-control" id="customer_name" value="{{ old('customer_id', $order->customer->name ?? '') }}" type="text"  readonly>
          
        </div>
        {{-- <div class="form-group">
            <label for="customer_address" class="col-form-label input-label">Địa chỉ:</label>
            <input class="form-control" type="text" id="customer_address" value="{{ old('customer_id', $order->customer->address ?? '') }}" type="text"  readonly >
            
        </div> --}}
        <div class="form-group">
            <label for="customer_email" class="col-form-label input-label">Email:</label>
            <input class="form-control" type="text" id="customer_email" value="{{ old('customer_id', $order->customer->email ?? '') }}" type="text"  readonly>
           
        </div>
        <div class="form-group">
            <label for="customer_phone" class="col-form-label input-label">Số điện thoại:</label>
            <input class="form-control" type="text" id="customer_phone" value="{{ old('customer_id', $order->customer->phone ?? '') }}" type="text"  readonly>
           
        </div>
        
        <div class="form-group">
            <label for="customer_tax" class="col-form-label input-label">Mã số thuế:</label>
            <input class="form-control" type="text" id="customer_tax" value="{{ old('customer_id', $order->customer->tax_code ?? '') }}" type="text"  readonly>
           
        </div>

        <div class="form-group">
            <label for="example-text-input" class="col-form-label input-label">Hình thức TT<span style="color: red">*</span></label>
            <input class="form-control" name="payments" type="text" value="{{ old('payments', $order->payments ?? '') }}" id="example-text-input">
            @error('payments')
                <small id="emailHelp" class="form-text text-danger">{{ $errors->first('payments') }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="example-text-input" class="col-form-label input-label">Ghi chú:</label>
            <input class="form-control" name="note" type="text" value="{{ old('note', $order->note ?? '') }}" id="example-text-input">
        </div>
    </div>

    <div class="col-4">
        <div class="form-group">   
            <label for="example-search-input" class="col-form-label input-label">Người giao<span style="color: red">*</span></label>
                <select name="deliver_id" class="custom-select custom-select-height" id="">
                    <option value="">---Chọn người giao---</option>
                    @foreach ($delivers ?? [] as $item)
                    <option value="{{ $item->id }}"
                        {{ ($order->deliver_id ?? 0) == $item->id ? 'selected' : '' }}>{{ $item->name }}
                    </option>
                    @endforeach
                </select>
            @error('deliver_id')
                <small id="emailHelp" class="form-text text-danger">{{ $errors->first('deliver_id') }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="contact_name" class="col-form-label input-label">Tên người liên hệ<span style="color: red">*</span></label>
            <input class="form-control" type="text" name="contact_name"  type="text" value="{{ old('contact_name', $order->contact_name ?? '') }}"   id="contact_name" readonly>
            @error('contact_name')
                <small id="emailHelp" class="form-text text-danger">{{ $errors->first('contact_name') }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="contact_phone" class="col-form-label input-label">Số điện thoại</label>
            <input class="form-control" type="text" name="contact_phone"  type="text" value="{{ old('contact_phone', $order->contact_phone ?? '') }}"   id="contact_phone" readonly>
        </div>
        <div class="form-group">
            <label for="example-text-input" class="col-form-label input-label">Bảo hành:</label>
            <input class="form-control" name="guarantee" type="text" value="{{ old('guarantee', $order->guarantee ?? '') }}"   id="contact_phone" id="example-text-input">
        </div>
        <div class="form-group">
            <label for="example-text-input" class="col-form-label input-label">Địa chỉ giao hàng<span style="color: red">*</span></label>
            <input class="form-control" name="delivery_address" type="text" value="{{ old('delivery_address', $order->delivery_address ?? '') }}" id="example-text-input">
            @error('delivery_address')
                <small id="emailHelp" class="form-text text-danger">{{ $errors->first('delivery_address') }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="example-datetime-local-input" class="col-form-label input-label">Thời gian GH:</label>
            <input class="form-control" name="delivery_time" type="datetime-local" value="{{ old('delivery_time', $order->delivery_time ?? '') }}" id="example-datetime-local-input">
        </div>
    </div>
</div>

                            </div>
                        </div>
                    </div>
                    <!-- Form nhập thông tin đơn hàng end -->

                    <!-- Bảng thông tin hàng hóa start -->
                    <div class="col-12 mt-2">
                        <div class="card">
                            <div class="card-body">
                                <div class="head-title-addbtn">
                                    <h4 class="header-title">Hàng hóa</h4>                       
                                </div>
                                <div class="data-tables datatable-dark">
                                    <table id="dataTable" class="text-center table-business">
                                        <thead class="text-capitalize">
                                            <tr>
                                                <th>Thao tác</th>
                                                {{-- <th>Mã hàng hóa</th> --}}
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
                                            @foreach ($order_detail_not_yet_id ?? [] as $item) 
                                                <td>
                                                    <ul class="d-flex justify-content-center">
                                                         <li><a href="{{ route('get.order_goods_delete', $item->id) }}" class="text-danger"><i class="ti-trash"></i></a></li>
                                                    </ul>
                                                </td>
                                                {{-- <td>{{ $item->goods_code }} </td> --}}
                                                <td ><input class="form-control" type="text" value="{{  $item->goods->name }}" readonly></td>

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

                                            @foreach ($order_detail_has_id ?? [] as $item)
                                            <tr>
                                              
                                                <td>
                                                    <ul class="d-flex justify-content-center">
                                                         <li><a href="{{ route('get.order_goods_delete', $item->id) }}" class="text-danger"><i class="ti-trash"></i></a></li>
                                                    </ul>
                                                </td>
                                                {{-- <td>{{ $item->goods_code }} </td> --}}
                                                <td ><input name="goods_name" class="form-control" type="text" value="{{  $item->goods->name }}" readonly></td>

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
                         $totalOutput_price1 = 0;                     // Biến lưu tổng tiền hàng
                         $totalTax1 = 0;                     // Biến lưu tổng thuế
                         $totalOrder_price1 = 0;            // Biến lưu tổng giá trị đơn hàng
                         $count1 = 0;
                         $avgTax1 = 0;

                         $totalOutput_price2 = 0;                     // Biến lưu tổng tiền hàng
                         $totalTax2 = 0;                     // Biến lưu tổng thuế
                         $totalOrder_price1 = 0;            // Biến lưu tổng giá trị đơn hàng
                         $count2 = 0;
                         $avgTax2 = 0;
                     @endphp
                     @foreach ($order_detail_has_id ?? [] as $item)
                         @php
                             $count1++;
                             $totalOutput_price1 += ($item->goods->output_price );
                             $totalTax1 += $item->goods->tax;
                             $avgTax1 = $totalTax1 / $count1;
                             $totalOrder_price1 = $totalOutput_price1 + $totalOutput_price1*$avgTax1/100;
                         @endphp
                     @endforeach

                     @foreach ($order_detail_not_yet_id ?? [] as $item)
                     @php
                         $count2++;
                         $totalOutput_price2 += ($item->goods->output_price );
                         $totalTax2 += $item->goods->tax;
                         $avgTax2 = $totalTax2 / $count2;
                         $totalOrder_price2 = $totalOutput_price2 + $totalOutput_price2*$avgTax2/100;
                     @endphp
                 @endforeach
                     
                @php
                    $count= $count1+$count2;
                    $totalOutput_price = $totalOutput_price1 + $totalOutput_price2;
                    $totalTax = $totalTax1 + $totalTax2;
                    $avgTax = $totalTax / $count;
                    $totalOrder_price = $totalOutput_price + $totalOutput_price * $avgTax / 100 ;
                @endphp
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
    </div>
</form>
@stop
