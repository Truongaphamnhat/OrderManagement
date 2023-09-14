<form id="contractForm" method="POST" action="" autocomplete="off" enctype="multipart/form-data">
    @csrf
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
                    <button type="button" class="btn btn-xs btn-outline-dark mb-3 mt-3 mr-3" data-toggle="modal" data-target="#modal-customer"><i class="fa fa-plus pr-1" aria-hidden="true"></i> Chọn Khách Hàng</button>
                    <button type="button" class="btn btn-xs btn-outline-dark mb-3 mt-3 mr-3" data-toggle="modal" data-target="#modal-contact"><i class="fa fa-plus pr-1" aria-hidden="true"></i> Chọn Liên Hệ</button>
                </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="customer_id" class="col-form-label input-label">Mã khách hàng<code>*</code>:</label>
                                <input type="text" name="customer_id" class="form-control" value="{{ old('customer_id', $contract->customer_id ?? '') }}" id="customer_id" readonly>
                                @error('customer_id')
                                    <small id="" class="form-text text-danger">{{ $errors->first('customer_id') }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="customer_name" class="col-form-label input-label">Tên khách hàng:</label>
                                <input class="form-control custom-select-height" type="text" value="" id="customer_name" readonly>
                            </div>
                            <div class="form-group">
                                <label for="customer_address_office" class="col-form-label input-label">Địa chỉ:</label>
                                <input class="form-control custom-select-height" type="text" value="" id="customer_address_office" readonly>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="customer_email" class="col-form-label input-label">Email:</label>
                                <input class="form-control custom-select-height" type="text" value="" id="customer_email" readonly>
                            </div>
                            <div class="form-group">
                                <label for="customer_phone" class="col-form-label input-label">Số điện thoại KH:</label>
                                <input class="form-control custom-select-height" type="text" value="" id="customer_phone" readonly>
                            </div>
                            <div class="form-group">
                                <label for="customer_tax_code" class="col-form-label input-label">Mã số thuế:</label>
                                <input class="form-control custom-select-height" type="text" value="" id="customer_tax_code" readonly>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="row">
                                <div class="col-6 form-group">
                                    <label for="contact_id" class="col-form-label input-label">Mã đại diện<code>*</code>:</label>
                                    <input type="text" name="contact_id" class="form-control" value="{{ old('contact_id', $contract->contact_id ?? '') }}" id="contact_id" readonly>
                                    @error('contact_id')
                                        <small id="" class="form-text text-danger">{{ $errors->first('contact_id') }}</small>
                                    @enderror
                                </div>
                                <div class="col-6 form-group">
                                    <label for="contact_name" class="col-form-label input-label">Người đại diện:</label>
                                    <input class="form-control custom-select-height" type="text" value="" id="contact_name" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="contact_position" class="col-form-label input-label">Chức vụ:</label>
                                <input class="form-control custom-select-height" type="text" value="" id="contact_position" readonly>
                            </div>
                            <div class="form-group">
                                <label for="contact_phone" class="col-form-label input-label">Số điện thoại LH:</label>
                                <input class="form-control custom-select-height" type="text" value="" id="contact_phone" readonly>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <!-- Form nhập thông tin Khách hàng end -->
    <!-- Form nhập thông tin Hợp đồng start-->
    <div class="col-12 mt-2">
        <div class="card">
            <div class="card-body">
                <div class="card-header-order">
                    <h4 class="header-title">Thông tin hợp đồng</h4>
                </div>
                <p class="text-muted font-14">Vui lòng điền thông tin cần thiết vào form bên dưới. Các trường có dấu <code>*</code> là bắt buộc phải điền.</p>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="choose_user" class="col-form-label input-label">Chủ sở hữu<code>*</code>:</label>
                            <select name="user_id" class="custom-select custom-select-height" id="choose_user" style="font-size: 14px !important;" onchange="loadUserPhone()">
                                <option value="">----Chọn chủ sở hữu----</option>
                                @foreach ($users ?? [] as $item)
                                    <option value="{{ $item->id }}"
                                        {{ ($user->user_id ?? 0) == $item->id ? 'selected' : '' }}>{{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <small id="" class="form-text text-danger">{{ $errors->first('user_id') }}</small>
                            @enderror
                        </div>
                        {{-- Xử lý khi chọn Chủ sở hữu tự động load số điện thoại --}}
                        <script>
                            function loadUserPhone() {
                                var select = document.getElementById('choose_user');
                                var selectedUserId = select.value;

                                var selectedUser = {!! json_encode($users ?? []) !!}
                                    .find(function (user) {
                                        return user.id == selectedUserId;
                                    });
                                document.getElementById('phone').value = selectedUser ? selectedUser.phone : '';
                            }
                        </script>
                        {{-- End --}}
                        <div class="form-group">
                            <label for="phone" class="col-form-label input-label">SĐT Chủ sở hữu:</label>
                            <input class="form-control custom-select-height" name="phone" type="text" value="{{ old('phone', $contract->phone ?? '') }}" id="phone">
                            @error('phone')
                                <small id="emailHelp" class="form-text text-danger">{{ $errors->first('phone') }}</small>
                             @enderror
                        </div>
                        {{-- Xử lý tự động load giá trị hợp đồng --}}
                        <script>
                            $(document).ready(function() {
                              $('#contract_value').on('input', function() {
                                var inputValue = $(this).val();
                                var formattedValue = parseFloat(inputValue).toLocaleString('vi-VN'); // Định dạng giá trị số thành chuỗi với phân cách hàng nghìn
                                $('#unit-price-ctrvalue').text(formattedValue);
                              });
                            });
                        </script>
                        {{-- End --}}
                        {{-- Xử lý thời gian --}}
                        <div class="row">

                            <div class="col-6 form-group">
                                <label for="start_day" class="col-form-label input-label">Ngày bắt đầu<code>*</code>:</label>
                                <input class="form-control custom-select-height" type="datetime-local" name="start_day" value="{{ old('start_day', $contract->start_day ?? '') }}" id="start_day">
                                @error('start_day')
                                <small id="" class="form-text text-danger">{{ $errors->first('start_day') }}</small>
                                @enderror
                            </div>
                            <div class="col-6 form-group">
                                <label for="finish_day" class="col-form-label input-label">Ngày kết thúc<code>*</code>:</label>
                                <input class="form-control custom-select-height" type="datetime-local" name="finish_day" value="{{ old('finish_day', $contract->finish_day ?? '') }}" id="finish_day">
                                @error('finish_day')
                                <small id="" class="form-text text-danger">{{ $errors->first('finish_day') }}</small>
                                @enderror
                            </div>
                        </div>
                        <input type="hidden" name="selected_start_day" id="selected_start_day">
                        <input type="hidden" name="selected_finish_day" id="selected_finish_day">
                        {{-- End --}}
                        <div class="form-group">
                            <label for="" class="col-form-label input-label">Trạng thái HĐ:</label>
                            <input type="hidden" name="status" value="0">
                            <select name="status_display" class="custom-select custom-select-height" style="font-size: 14px !important;" disabled>
                                @foreach ($status ?? [] as $key => $item)
                                    <option value="{{ $key }}" {{ ($contract->status ?? 0) == $key ? 'selected' : '' }}>
                                        {{ $item['name'] }}</option>
                                @endforeach
                            </select>
                            @error('status')
                                <small id="" class="form-text text-danger">{{ $errors->first('status') }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="contract_note" class="col-form-label input-label">Ghi chú:</label>
                            <input class="form-control custom-select-height" name="note" type="text" value="{{ old('note', $contract->note ?? '') }}" id="contract_note">
                            @error('note')
                                <small id="" class="form-text text-danger">{{ $errors->first('note') }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="name" class="col-form-label input-label">Tên hợp đồng<code>*</code>:</label>
                            <input class="form-control custom-select-height" name="name" type="text" value="{{ old('name', $contract->name ?? '') }}" id="name">
                            @error('name')
                                <small id="" class="form-text text-danger">{{ $errors->first('name') }}</small>
                            @enderror
                        </div>
                        {{-- Xử lý loại hợp đồng --}}
                        {{-- <div class="form-group">
                            <label for="choose_user" class="col-form-label input-label">Chủ sở hữu<code>*</code>:</label>
                            <select name="user_id" class="custom-select custom-select-height" id="choose_user" style="font-size: 14px !important;" onchange="loadUserPhone()">
                                <option value="">----Chọn chủ sở hữu----</option>
                                @foreach ($users ?? [] as $item)
                                    <option value="{{ $item->id }}"
                                        {{ ($user->user_id ?? 0) == $item->id ? 'selected' : '' }}>{{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <small id="" class="form-text text-danger">{{ $errors->first('user_id') }}</small>
                            @enderror
                        </div> --}}
                        <div class="form-group">
                            <label for="choose_contract" class="col-form-label input-label">Loại hợp đồng<code>*</code>:</label>
                            <select name="contract_type_id" class="custom-select custom-select-height" style="font-size: 14px !important;" id="choose_contract">
                                <option value="">----Chọn loại hợp đồng----</option>
                                @foreach ($contract_types ?? [] as $item)
                                    <option value="{{ $item->id }}"
                                        {{ ($contract_type->contract_type_id ?? 0) == $item->id ? 'selected' : '' }}>{{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('contract_type_id')
                                <small id="" class="form-text text-danger">{{ $errors->first('contract_type_id') }}</small>
                            @enderror
                        </div>
                        {{-- End --}}
                        <div class="form-group">
                            <label for="choose_payments" class="col-form-label input-label">Hình thức thanh toán:</label>
                            <select name="payments" class="custom-select custom-select-height" id="choose_payments" style="font-size: 14px !important;">
                                <option value="">----Chọn hình thức thanh toán----</option>
                                <option value="Trả trước" {{ old('payments') == "Trả trước" ? 'selected' : '' }}>Trả trước</option>
                                <option value="Trả sau" {{ old('payments') == "Trả sau" ? 'selected' : '' }}>Trả sau</option>
                                <option value="Trả góp" {{ old('payments') == "Trả góp" ? 'selected' : '' }}>Trả góp</option>
                                <option value="12 tháng" {{ old('payments') == "12 tháng" ? 'selected' : '' }}>12 tháng</option>
                            </select>
                            @error('payments')
                                <small id="emailHelp" class="form-text text-danger">{{ $errors->first('payments') }}</small>
                             @enderror
                        </div>
                        <div class="form-group">
                            <label for="choose_transportation" class="col-form-label input-label">Hình thức vận chuyển:</label>
                            <select name="transportation" class="custom-select custom-select-height" id="choose_transportation" style="font-size: 14px !important;">
                                <option value="">----Chọn hình thức vận chuyển----</option>
                                <option value="Vietnam Post" {{ old('transportation') == "Vietnam Post" ? 'selected' : '' }}>Vietnam Post</option>
                                <option value="Viettel Post" {{ old('transportation') == "Viettel Post" ? 'selected' : '' }}>Viettel Post</option>
                                <option value="J&T" {{ old('transportation') == "J&T" ? 'selected' : '' }}>J&T</option>
                                <option value="Ninja Van" {{ old('transportation') == "Ninja Van" ? 'selected' : '' }}>Ninja Van</option>
                                <option value="Loại hàng hóa không vận chuyển" {{ old('transportation') == "Loại hàng hóa không vận chuyển" ? 'selected' : '' }}>Loại hàng hóa không vận chuyển</option>
                            </select>
                            @error('transportation')
                                <small id="emailHelp" class="form-text text-danger">{{ $errors->first('transportation') }}</small>
                             @enderror
                        </div>
                        <div class="form-group">
                            <label for="choose_user_revenue" class="col-form-label input-label">Doanh số tính cho:</label>
                            <select name="revenue_for" class="custom-select custom-select-height" id="choose_user_revenue" style="font-size: 14px !important;">
                                <option value="">---- Chọn người nhận----</option>
                                @foreach ($users ?? [] as $item)
                                    <option value="{{ $item->name }}"
                                        {{ old('revenue_for') == $item->id ? 'selected' : '' }}>{{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('revenue_for')
                                <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- <div class="form-group">
                        <label for="payment_date" class="col-form-label input-label">Ngày thanh toán:</label>
                        <input class="form-control custom-select-height" type="datetime-local" name="payment_date" value="{{ old('payment_date', $contract->payment_date ?? '') }}" id="payment_date">
                        @error('payment_date')
                            <small id="" class="form-text text-danger">{{ $errors->first('payment_date') }}</small>
                        @enderror
                    </div>
                    <input type="hidden" name="selected_payment_date" id="selected_payment_date">
                    <div class="form-group">
                        <label for="choose_payment_type" class="col-form-label input-label">Loại thanh toán:</label>
                        <select name="payment_type" class="custom-select custom-select-height" id="choose_payment_type" style="font-size: 14px !important;">
                            <option value="">--Chọn loại thanh toán--</option>
                            <option value="Nhận tiền mặt" {{ old('payment_type') == "Nhận tiền mặt" ? 'selected' : '' }}>Nhận tiền mặt</option>
                            <option value="Nhận chuyển khoản" {{ old('payment_type') == "Nhận chuyển khoản" ? 'selected' : '' }}>Nhận chuyển khoản</option>
                        </select>
                        @error('payment_type')
                            <small id="emailHelp" class="form-text text-danger">{{ $errors->first('payment_type') }}</small>
                            @enderror
                    </div> --}}
                    {{-- <div class="form-group">
                        <label for="percentage_value" class="col-form-label input-label">% Giá trị HĐ:</label>
                        <div class="textbox-unitprice">
                            <input class="form-control custom-select-height" name="percentage_value" type="text" value="{{ old('percentage_value', $contract->percentage_value ?? '') }}" id="percentage_value" style="border-radius: 3px 0 0 3px !important;">
                            <span class="unit-price" style="border-radius: 0 3px 3px 0 !important;">%</span>
                        </div>
                        @error('percentage_value')
                            <small id="" class="form-text text-danger">{{ $errors->first('percentage_value') }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="payment_amount" class="col-form-label input-label">Tiền thanh toán:</label>
                        <div class="textbox-unitprice">
                            <input class="form-control custom-select-height" name="payment_amount" type="text" value="{{ old('payment_amount', $contract->payment_amount ?? '') }}" id="payment_amount" style="border-radius: 3px 0 0 3px !important;">
                            <span id="unit-price-payment_amount" class="unit-price unit-price-exp" style="border-radius: 0 3px 3px 0 !important;">0</span>
                        </div>
                        @error('payment_amount')
                            <small id="" class="form-text text-danger">{{ $errors->first('payment_amount') }}</small>
                        @enderror
                    </div> --}}
                    {{-- Xử lý tự động load dữ liệu lên ô "Tiền thanh toán" = "Giá trị HĐ" x "% Giá trị HĐ" --}}
                    <script>
                        $(document).ready(function() {
                            // Lắng nghe sự kiện khi giá trị trong ô % Giá trị HĐ thay đổi
                            $('#percentage_value').on('input', function() {
                                var contractValue = parseFloat($('#contract_value').val()); // Lấy giá trị từ ô Giá trị hợp đồng
                                var percentageValue = parseFloat($(this).val()); // Lấy giá trị từ ô % Giá trị HĐ
                                var payment = contractValue * (percentageValue / 100); // Tính toán giá trị tiền thanh toán
                                var formattedPayment = parseFloat(payment).toLocaleString('vi-VN'); // Định dạng giá trị số thành chuỗi với phân cách hàng nghìn
                                $('#payment_amount').val(payment); // Cập nhật giá trị vào ô Tiền thanh toán và giới hạn số lẻ thành 2 chữ số
                                $('#unit-price-payment_amount').text(formattedPayment); // Đồng thời cập nhật vào ô nổi bật nối sau
                            });
                            // Xử lý tự load tiền thanh toán khi nhập trực tiếp vào ô tiền thanh toán
                            $('#payment_amount').on('input', function() {
                                var inputValue = $(this).val();
                                var formattedValue = parseFloat(inputValue).toLocaleString('vi-VN');
                                var contractValue = parseFloat($('#contract_value').val());
                                var percentageValue = inputValue / contractValue * 100;
                                $('#percentage_value').val(percentageValue);
                                $('#unit-price-payment_amount').text(formattedValue);
                            });
                        });
                    </script>
                    {{-- End --}}

                </div>
                <div class="form-group btn-group-savetrans">
                    <button type="submit" class="btn btn-primary btn-savetrans mt-5 pl-3 pr-3"><i class="fa fa-floppy-o" aria-hidden="true"></i><span>Lưu & Thêm Mới</span></button>
                </div>
            </div>
        </div>
    </div>
    <!-- Form nhập thông tin Hợp đồng end -->
</form>
