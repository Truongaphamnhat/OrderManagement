<form id="contractFormUpdate" method="POST" action="" autocomplete="off" enctype="multipart/form-data">
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
                                <input type="text" name="customer_name" class="form-control" value="{{ old('customer_name', $contract->customer->name ?? '') }}" id="customer_name" readonly>
                                @error('customer_name')
                                    <small id="" class="form-text text-danger">{{ $errors->first('customer_name') }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="customer_address" class="col-form-label input-label">Đại chỉ:</label>
                                <input type="text" name="customer_address" class="form-control" value="{{ old('customer_address', $contract->customer->address ?? '') }}" id="customer_address" readonly>
                                @error('customer_address')
                                    <small id="" class="form-text text-danger">{{ $errors->first('customer_address') }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="customer_email" class="col-form-label input-label">Email:</label>
                                <input type="text" name="customer_email" class="form-control" value="{{ old('customer_email', $contract->customer->email ?? '') }}" id="customer_email" readonly>
                                @error('customer_email')
                                    <small id="" class="form-text text-danger">{{ $errors->first('customer_email') }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="customer_phone" class="col-form-label input-label">SĐT Khách hàng:</label>
                                <input type="text" name="customer_phone" class="form-control" value="{{ old('customer_phone', $contract->customer->phone ?? '') }}" id="customer_phone" readonly>
                                @error('customer_phone')
                                    <small id="" class="form-text text-danger">{{ $errors->first('customer_phone') }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="customer_tax_code" class="col-form-label input-label">Mã số thuế:</label>
                                <input type="text" name="customer_tax_code" class="form-control" value="{{ old('customer_tax_code', $contract->customer->tax_code ?? '') }}" id="customer_tax_code" readonly>
                                @error('customer_tax_code')
                                    <small id="" class="form-text text-danger">{{ $errors->first('customer_tax_code') }}</small>
                                @enderror
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
                                    <input type="text" name="contact_name" class="form-control" value="{{ old('contact_name', $contract->contact->name ?? '') }}" id="contact_name" readonly>
                                    @error('contact_name')
                                        <small id="" class="form-text text-danger">{{ $errors->first('contact_name') }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="contact_position" class="col-form-label input-label">Chức vụ:</label>
                                <input type="text" name="contact_position" class="form-control" value="{{ old('contact_position', $contract->contact->position->name ?? '') }}" id="contact_position" readonly>
                                @error('contact_position')
                                    <small id="" class="form-text text-danger">{{ $errors->first('contact_position') }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="contact_phone" class="col-form-label input-label">SĐT Liên hệ:</label>
                                <input type="text" name="contact_phone" class="form-control" value="{{ old('contact_phone', $contract->contact->phone ?? '') }}" id="contact_phone" readonly>
                                @error('contact_phone')
                                    <small id="" class="form-text text-danger">{{ $errors->first('contact_phone') }}</small>
                                @enderror
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
                    <div class="col-4">
                        <div class="form-group">
                            <label for="choose_user" class="col-form-label input-label">Chủ sở hữu<code>*</code>:</label>
                            <select name="user_id" class="custom-select custom-select-height" id="choose_user" style="font-size: 14px !important;" onchange="loadUserPhone()">
                                <option value="">----Chọn chủ sở hữu----</option>
                                @foreach ($users ?? [] as $item)
                                    <option value="{{ $item->id }}" {{ ($item->id == old('user_id', $contract->user_id ?? null)) ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <small id="" class="form-text text-danger">{{ $message }}</small>
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
                            <label for="choose_user_revenue" class="col-form-label input-label">Doanh số tính cho:</label>
                            <select name="revenue_for" class="custom-select custom-select-height" id="choose_user_revenue" style="font-size: 14px !important;">
                                <option value="">---- Chọn người nhận----</option>
                                @foreach ($users ?? [] as $item)
                                    <option value="{{ $item->name }}" {{ ($item->name == old('revenue_for', $contract->revenue_for ?? null)) ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('revenue_for')
                                <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        {{-- Xử lý TTHĐ:
                            - Nếu HĐ đang TT "Chưa có hàng hóa" thì không thể đổi thàn TT khác mà phải thêm HH để hệ thống tự thay đổi thành "Hợp đồng mới" trước.
                            - Nếu HĐ đang TT khác "Chưa có hàng hóa" thì trong mục chọn thay đổi TT sẽ không có "Chưa có hàng hóa" tức là không thể quay lại TT đó được vì lúc này HH đã được thêm rồi. --}}
                        <div class="form-group">
                            <label for="" class="col-form-label input-label">Trạng thái:</label>
                            @if (($contract->status ?? 0) == 0)
                                <input type="hidden" name="status" value="0">
                                <select name="status" class="custom-select custom-select-height" style="font-size: 14px !important;" disabled>
                                    @foreach ($status ?? [] as $key => $item)
                                        <option value="{{ $key }}" {{ ($contract->status ?? 0) == $key ? 'selected' : '' }}>
                                            {{ $item['name'] }}</option>
                                    @endforeach
                                </select>
                            @else
                                <select name="status" class="custom-select custom-select-height" style="font-size: 14px !important;">
                                    @foreach ($status ?? [] as $key => $item)
                                        @if (($contract->status ?? 0) == 0 || $key != 0)
                                            <option value="{{ $key }}" {{ ($contract->status ?? 0) == $key ? 'selected' : '' }}>
                                                {{ $item['name'] }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            @endif
                            @error('status')
                                <small id="" class="form-text text-danger">{{ $errors->first('status') }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            <label for="name" class="col-form-label input-label">Tên hợp đồng<code>*</code>:</label>
                            <input class="form-control custom-select-height" name="name" type="text" value="{{ old('name', $contract->name ?? '') }}" id="name">
                            @error('name')
                                <small id="" class="form-text text-danger">{{ $errors->first('name') }}</small>
                            @enderror
                        </div>
                        {{-- Xử lý loại hợp đồng --}}
                        <div class="form-group">
                            <label for="choose_contract" class="col-form-label input-label">Loại hợp đồng<code>*</code>:</label>
                            <select name="contract_type_id" class="custom-select custom-select-height" style="font-size: 14px !important;" id="choose_contract">
                                <option value="">----Chọn loại hợp đồng----</option>
                                @foreach ($contract_types ?? [] as $item)
                                    <option value="{{ $item->id }}" {{ ($item->id == old('contract_type_id', $contract->contract_type_id ?? null)) ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('contract_type_id')
                                <small id="" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        {{-- End --}}
                        <div class="row">
                            <div class="col-5 form-group">
                                <label for="choose_payments" class="col-form-label input-label">Hình thức thanh toán:</label>
                                <select name="payments" class="custom-select custom-select-height" id="choose_payments" style="font-size: 14px !important;">
                                    <option value="">----Chọn HTTT----</option>
                                    <option value="Trả trước" {{ old('payments', $contract->payments) == "Trả trước" ? 'selected' : '' }}>Trả trước</option>
                                    <option value="Trả sau" {{ old('payments', $contract->payments) == "Trả sau" ? 'selected' : '' }}>Trả sau</option>
                                    <option value="Trả góp" {{ old('payments', $contract->payments) == "Trả góp" ? 'selected' : '' }}>Trả góp</option>
                                    <option value="12 tháng" {{ old('payments', $contract->payments) == "12 tháng" ? 'selected' : '' }}>12 tháng</option>
                                </select>
                                @error('payments')
                                    <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-7 form-group">
                                <label for="choose_transportation" class="col-form-label input-label">Hình thức vận chuyển:</label>
                                <select name="transportation" class="custom-select custom-select-height" id="choose_transportation" style="font-size: 14px !important;">
                                    <option value="">----Chọn HTVC----</option>
                                    <option value="Vietnam Post" {{ old('transportation', $contract->transportation) == "Vietnam Post" ? 'selected' : '' }}>Vietnam Post</option>
                                    <option value="Viettel Post" {{ old('transportation', $contract->transportation) == "Viettel Post" ? 'selected' : '' }}>Viettel Post</option>
                                    <option value="J&T" {{ old('transportation', $contract->transportation) == "J&T" ? 'selected' : '' }}>J&T</option>
                                    <option value="Ninja Van" {{ old('transportation', $contract->transportation) == "Ninja Van" ? 'selected' : '' }}>Ninja Van</option>
                                    <option value="Loại hàng hóa không vận chuyển" {{ old('transportation', $contract->transportation) == "Loại hàng hóa không vận chuyển" ? 'selected' : '' }}>Loại hàng hóa không vận chuyển</option>
                                </select>
                                @error('transportation')
                                    <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="contract_note" class="col-form-label input-label">Ghi chú:</label>
                            <input class="form-control custom-select-height" name="note" type="text" value="{{ old('note', $contract->note ?? '') }}" id="contract_note">
                            @error('note')
                                <small id="" class="form-text text-danger">{{ $errors->first('note') }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="contract_value" class="col-form-label input-label">Giá trị hợp đồng<code>*</code>:</label>
                            <div class="textbox-unitprice">
                                <input class="form-control custom-select-height" name="value" type="text" value="{{ old('value', $contract->value ?? '') }}" id="contract_value" style="border-radius: 3px 0 0 3px !important;" readonly>
                                <span id="unit-price-ctrvalue" class="unit-price unit-price-exp" style="border-radius: 0 3px 3px 0 !important;">0</span>
                            </div>
                            @error('value')
                                    <small id="" class="form-text text-danger">{{ $errors->first('value') }}</small>
                            @enderror
                        </div>
                        {{-- Xử lý ô span của Giá trị HĐ --}}
                        <script>
                            // Lấy giá trị từ ô input
                            var valueInput = document.getElementById('contract_value');
                            var value = parseFloat(valueInput.value.replace(/[^0-9.-]+/g, '')); // Lấy giá trị số từ chuỗi

                            // Định dạng giá trị theo định dạng tiền tệ Việt Nam (VND)
                            var formatter = new Intl.NumberFormat('vi-VN');
                            var formattedValue = formatter.format(value);

                            // Gán giá trị định dạng vào ô span
                            var unitPriceSpan = document.getElementById('unit-price-ctrvalue');
                            unitPriceSpan.textContent = formattedValue;
                        </script>
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

                    </div>

                    <div class="col-4">
                        <div class="row">
                            <div class="col-6 form-group">
                                <label for="payment_date" class="col-form-label input-label">Ngày thanh toán:</label>
                                <input class="form-control custom-select-height" type="datetime-local" name="payment_date" value="{{ old('payment_date', $contract->payment_date ?? '') }}" id="payment_date">
                                @error('payment_date')
                                    <small id="" class="form-text text-danger">{{ $errors->first('payment_date') }}</small>
                                @enderror
                            </div>
                            <input type="hidden" name="selected_payment_date" id="selected_payment_date">
                            <div class="col-6 form-group">
                                <label for="choose_payment_type" class="col-form-label input-label">Loại thanh toán:</label>
                                <select name="payment_type" class="custom-select custom-select-height" id="choose_payment_type" style="font-size: 14px !important;">
                                    <option value="">--Chọn loại thanh toán--</option>
                                    <option value="Nhận tiền mặt" {{ old('payment_type', $contract->payment_type) == "Nhận tiền mặt" ? 'selected' : '' }}>Nhận tiền mặt</option>
                                    <option value="Nhận chuyển khoản" {{ old('payment_type', $contract->payment_type) == "Nhận chuyển khoản" ? 'selected' : '' }}>Nhận chuyển khoản</option>
                                    <option value="Thẻ ATM" {{ old('payment_type', $contract->payment_type) == "Thẻ ATM" ? 'selected' : '' }}>Thẻ ATM</option>
                                </select>
                                @error('payment_type')
                                    <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="payment_amount" class="col-form-label input-label">Số tiền đã thanh toán:</label>
                            @if (($contract->status ?? 0) == 0)
                                <div class="textbox-unitprice">
                                    <input class="form-control custom-select-height" name="payment_amount" type="text" value="{{ old('payment_amount', $contract->payment_amount ?? '') }}" id="payment_amount" style="border-radius: 3px 0 0 3px !important;" readonly>
                                    <span id="unit-price-payment_amount" class="unit-price unit-price-exp" style="border-radius: 0 3px 3px 0 !important;">0</span>
                                </div>
                            @else
                                <div class="textbox-unitprice">
                                    <input class="form-control custom-select-height" name="payment_amount" type="text" value="{{ old('payment_amount', $contract->payment_amount ?? '') }}" id="payment_amount" style="border-radius: 3px 0 0 3px !important;">
                                    <span id="unit-price-payment_amount" class="unit-price unit-price-exp" style="border-radius: 0 3px 3px 0 !important;">0</span>
                                </div>
                            @endif
                            @error('payment_amount')
                                <small id="" class="form-text text-danger">{{ $errors->first('payment_amount') }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="previous_debt" class="col-form-label input-label">Nợ còn lại:</label>
                            <div class="textbox-unitprice">
                                <input class="form-control custom-select-height" name="previous_debt" type="text" value="{{ old('previous_debt', $contract->debt ?? '') }}" id="previous_debt" style="border-radius: 3px 0 0 3px !important;" disabled>
                                <span id="unit-price-previous_debt" class="unit-price unit-price-exp" style="border-radius: 0 3px 3px 0 !important;">0</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 form-group">
                                <label for="percentage_value" class="col-form-label input-label">% Giá trị HĐ:</label>
                                @if (($contract->status ?? 0) == 0)
                                    <div class="textbox-unitprice">
                                        <input class="form-control custom-select-height" name="percentage_value" type="text" value="{{ old('percentage_value', $contract->percentage_value ?? '') }}" id="percentage_value" style="border-radius: 3px 0 0 3px !important;" readonly>
                                        <span class="unit-price" style="border-radius: 0 3px 3px 0 !important; padding-left: 15px !important; padding-right: 15px !important;">%</span>
                                    </div>
                                @else
                                    <div class="textbox-unitprice">
                                        <input class="form-control custom-select-height" name="percentage_value" type="text" value="{{ old('percentage_value', $contract->percentage_value ?? '') }}" id="percentage_value" style="border-radius: 3px 0 0 3px !important;">
                                        <span class="unit-price" style="border-radius: 0 3px 3px 0 !important; padding-left: 15px !important; padding-right: 15px !important;">%</span>
                                    </div>
                                @endif
                                @error('percentage_value')
                                    <small id="" class="form-text text-danger">{{ $errors->first('percentage_value') }}</small>
                                @enderror
                            </div>
                            <div class="col-8 form-group">
                                <label for="payment_amount_temporary" class="col-form-label input-label">Tiền thanh toán lần này:</label>
                                @if (($contract->status ?? 0) == 0)
                                    <div class="textbox-unitprice">
                                        <input class="form-control custom-select-height" name="payment_amount_temporary" type="text" id="payment_amount_temporary" style="border-radius: 3px 0 0 3px !important;" readonly>
                                        <span id="unit-price-payment_amount_temporary" class="unit-price unit-price-exp" style="border-radius: 0 3px 3px 0 !important;">0</span>
                                    </div>
                                @else
                                    <div class="textbox-unitprice">
                                        <input class="form-control custom-select-height" name="payment_amount_temporary" type="text" id="payment_amount_temporary" style="border-radius: 3px 0 0 3px !important;">
                                        <span id="unit-price-payment_amount_temporary" class="unit-price unit-price-exp" style="border-radius: 0 3px 3px 0 !important;">0</span>
                                    </div>
                                @endif
                                @error('payment_amount_temporary')
                                    <small id="" class="form-text text-danger">{{ $errors->first('payment_amount_temporary') }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="debt" class="col-form-label input-label">Nợ sau thanh toán lần này:</label>
                            @if (($contract->status ?? 0) == 0)
                                <div class="textbox-unitprice">
                                    <input class="form-control custom-select-height" name="debt" type="text" value="{{ old('debt', $contract->debt ?? '') }}" id="debt" style="border-radius: 3px 0 0 3px !important;" readonly>
                                    <span id="unit-price-debt" class="unit-price unit-price-exp" style="border-radius: 0 3px 3px 0 !important;">0</span>
                                </div>
                            @else
                                <div class="textbox-unitprice">
                                    <input class="form-control custom-select-height" name="debt" type="text" value="{{ old('debt', $contract->debt ?? '') }}" id="debt" style="border-radius: 3px 0 0 3px !important;">
                                    <span id="unit-price-debt" class="unit-price unit-price-exp" style="border-radius: 0 3px 3px 0 !important;">0</span>
                                </div>
                            @endif
                            @error('debt')
                                <small id="" class="form-text text-danger">{{ $errors->first('debt') }}</small>
                            @enderror
                        </div>
                        {{-- Xử lý ô span của Nợ --}}
                        <script>
                            // Nợ hiện tại
                            // Lấy giá trị từ ô input
                            var valueInputPreDebt = document.getElementById('previous_debt');
                            var valuePreDebt = parseFloat(valueInputPreDebt.value.replace(/[^0-9.-]+/g, '')); // Lấy giá trị số từ chuỗi

                            // Định dạng giá trị theo định dạng tiền tệ Việt Nam (VND)
                            var formatterPreDebt = new Intl.NumberFormat('vi-VN');
                            var formattedValuePreDebt = formatterPreDebt.format(valuePreDebt);

                            // Gán giá trị định dạng vào ô span
                            var preDebtSpan = document.getElementById('unit-price-previous_debt');
                            preDebtSpan.textContent = formattedValuePreDebt;

                            // Nợ sau thanh toán
                            var valueInputDebt = document.getElementById('debt');
                            var valueDebt = parseFloat(valueInputDebt.value.replace(/[^0-9.-]+/g, ''));

                            var formatterDebt = new Intl.NumberFormat('vi-VN');
                            var formattedValueDebt = formatterDebt.format(valueDebt);

                            var debtSpan = document.getElementById('unit-price-debt');
                            debtSpan.textContent = formattedValueDebt;
                        </script>
                        {{-- Xử lý tự động load dữ liệu lên ô "Tiền thanh toán" = "Giá trị HĐ" x "% Giá trị HĐ" --}}
                        <script>
                            $(document).ready(function() {
                                // Lắng nghe sự kiện khi giá trị trong ô % Giá trị HĐ thay đổi
                                $('#percentage_value').on('input', function() {
                                    var contractValue = parseFloat($('#contract_value').val()); // Lấy giá trị từ ô Giá trị hợp đồng
                                    var percentageValue = parseFloat($(this).val()); // Lấy giá trị từ ô % Giá trị HĐ
                                    var payment = contractValue * (percentageValue / 100); // Tính toán giá trị tiền thanh toán
                                    var formattedPayment = parseFloat(payment).toLocaleString('vi-VN'); // Định dạng giá trị số thành chuỗi với phân cách hàng nghìn
                                    var previousDebt =  parseFloat($('#previous_debt').val()); // Lấy giá trị Nợ hiện tại
                                    var debtAfterPayment = previousDebt - payment;
                                    var formattedDebt = parseFloat(debtAfterPayment).toLocaleString('vi-VN'); // Định dạng giá trị số thành chuỗi với phân cách hàng nghìn

                                    var paymentAmountTotal = contractValue - debtAfterPayment;
                                    var formattedpayAmtTotal = parseFloat(paymentAmountTotal).toLocaleString('vi-VN');

                                    $('#payment_amount_temporary').val(payment); // Cập nhật giá trị vào ô Tiền thanh toán
                                    $('#debt').val(debtAfterPayment); // Cập nhật giá trị vào ô Nợ
                                    $('#unit-price-payment_amount_temporary').text(formattedPayment); // Đồng thời cập nhật vào ô nổi bật nối sau
                                    $('#unit-price-debt').text(formattedDebt); // Đồng thời cập nhật vào ô nổi bật nối sau

                                    $('#payment_amount').val(paymentAmountTotal);
                                    $('#unit-price-payment_amount').text(formattedpayAmtTotal);
                                });

                                // Hàm định dạng thập phân:
                                // - Nếu nhiều hơn số cho phép ('3' ở phần code bên dưới) thì sẽ giới hạn hiển thị tối đa số giới hạn đó (3) số thập phân.
                                // - Nếu bé hơn giới hạn thập phân (3) thì sẽ xuất hiện đúng giá trị đó.
                                function formatDecimal(number, maximumFractionDigits) {
                                    var decimalPart = number.toString().split('.')[1];
                                    var fractionDigits = decimalPart ? decimalPart.length : 0;

                                    if (fractionDigits > maximumFractionDigits) {
                                        return number.toFixed(maximumFractionDigits);
                                    }

                                    return number;
                                }

                                // Xử lý tự load tiền thanh toán khi nhập trực tiếp vào ô tiền thanh toán
                                $('#payment_amount_temporary').on('input', function() {
                                    var inputValue = $(this).val();
                                    var parsedValue = parseFloat(inputValue);
                                    var formattedValue;
                                    var previousDebt =  parseFloat($('#previous_debt').val()); // Lấy giá trị Nợ hiện tại
                                    var debtAfterPayment = previousDebt - parsedValue;
                                    var formattedDebt = parseFloat(debtAfterPayment).toLocaleString('vi-VN'); // Định dạng giá trị số thành chuỗi với phân cách hàng nghìn

                                    if (Number.isInteger(parsedValue)) {
                                        formattedValue = parsedValue.toLocaleString('vi-VN');
                                    } else {
                                        formattedValue = formatDecimal(parsedValue, 3).toLocaleString('vi-VN');
                                    }

                                    var contractValue = parseFloat($('#contract_value').val());
                                    var percentageValue = parsedValue / contractValue * 100;
                                    var formattedPercentage = formatDecimal(percentageValue, 3).toLocaleString('vi-VN');

                                    var paymentAmountTotal = contractValue - debtAfterPayment;
                                    var formattedpayAmtTotal = parseFloat(paymentAmountTotal).toLocaleString('vi-VN');

                                    $('#percentage_value').val(formattedPercentage);
                                    $('#unit-price-payment_amount_temporary').text(formattedValue);
                                    $('#debt').val(debtAfterPayment); // Cập nhật giá trị vào ô Nợ
                                    $('#unit-price-debt').text(formattedDebt); // Đồng thời cập nhật vào ô nổi bật nối sau
                                    $('#payment_amount').val(paymentAmountTotal);
                                    $('#unit-price-payment_amount').text(formattedpayAmtTotal);
                                });


                            });
                            // Xử lý span tự tải cho ô Tiền thanh toán
                            // Lấy giá trị từ ô input
                            var valueInputPayment = document.getElementById('payment_amount');
                            var valuePayment = parseFloat(valueInputPayment.value.replace(/[^0-9.-]+/g, '')); // Lấy giá trị số từ chuỗi

                            // Định dạng giá trị theo định dạng tiền tệ Việt Nam (VND)
                            var formatterPayment = new Intl.NumberFormat('vi-VN');
                            var formattedValuePayment = formatterPayment.format(valuePayment);

                            // Gán giá trị định dạng vào ô span
                            var unitPaymentSpan = document.getElementById('unit-price-payment_amount');
                            unitPaymentSpan.textContent = formattedValuePayment;

                            // // Xử lý nếu Tiền thanh toán cũ = 0 thì làm trống ô Tiền thanh toán
                            // var paymentAmountInput = $('#payment_amount_temporary');
                            // var paymentAmountValue = "{{ old('payment_amount_temporary', $contract->payment_amount_temporary ?? '') }}";
                            // if (paymentAmountValue === '0') {
                            //     paymentAmountInput.val('');
                            // } else {
                            //     paymentAmountInput.val(paymentAmountValue);
                            // }

                        </script>
                        {{-- End --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Form nhập thông tin Hợp đồng end -->
</form>
