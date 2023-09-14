<form method="POST" action="" autocomplete="off" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="goods_name" class="col-form-label input-label">Tên hàng hóa<code>*</code>:</label>
                <input type="text" name="name" class="form-control custom-select-height" value="{{ old('name', $goods->name ?? '') }}" id="goods_name">
                @error('name')
                    <small id="" class="form-text text-danger">{{ $errors->first('name') }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="choose_unit" class="col-form-label input-label">Chọn đơn vị:</label>
                <select name="unit" class="custom-select custom-select-height" id="choose_unit" style="font-size: 14px !important;">
                    <option value="">----Chọn đơn vị----</option>
                    <option value="Gam" {{ old('unit') == 'Gam' ? 'selected' : '' }}>Gam</option>
                    <option value="Mét" {{ old('unit') == 'Mét' ? 'selected' : '' }}>Mét</option>
                    <option value="Chiếc" {{ old('unit') == 'Chiếc' ? 'selected' : '' }}>Chiếc</option>
                    <option value="Bộ" {{ old('unit') == 'Bộ' ? 'selected' : '' }}>Bộ</option>
                    <option value="Gói" {{ old('unit') == 'Gói' ? 'selected' : '' }}>Gói</option>
                    <option value="Hộp" {{ old('unit') == 'Hộp' ? 'selected' : '' }}>Hộp</option>
                    <option value="Thùng" {{ old('unit') == 'Thùng' ? 'selected' : '' }}>Thùng</option>
                    <option value="Lít" {{ old('unit') == 'Lít' ? 'selected' : '' }}>Lít</option>
                </select>
                @error('unit')
                    <small id="emailHelp" class="form-text text-danger">{{ $errors->first('unit') }}</small>
                 @enderror
            </div>
            <div class="form-group">
                <label for="manufacturer" class="col-form-label input-label">Hãng SX:</label>
                <input type="text" name="manufacturer" class="form-control custom-select-height" value="{{ old('manufacturer', $goods->manufacturer ?? '') }}" id="manufacturer">
                @error('manufacturer')
                    <small id="" class="form-text text-danger">{{ $errors->first('manufacturer') }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="goods_origin" class="col-form-label input-label">Xuất xứ:</label>
                <input type="text" name="origin" class="form-control custom-select-height" value="{{ old('origin', $goods->origin ?? '') }}" id="goods_origin">
                @error('origin')
                    <small id="" class="form-text text-danger">{{ $errors->first('origin') }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="guarantee" class="col-form-label input-label">Bảo hành:</label>
                <input type="text" name="guarantee" class="form-control custom-select-height" value="{{ old('guarantee', $goods->guarantee ?? '') }}" id="guarantee">
                @error('guarantee')
                    <small id="" class="form-text text-danger">{{ $errors->first('guarantee') }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="goods_describe" class="col-form-label input-label">Mô tả:</label>
                <input type="text" name="describe" class="form-control custom-select-height" value="{{ old('describe', $goods->describe ?? '') }}" id="goods_describe">
                @error('describe')
                    <small id="" class="form-text text-danger">{{ $errors->first('describe') }}</small>
                @enderror
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                <label class="col-form-label input-label" class="">Hình ảnh:</label>
                <input type="file" class="form-control custom-select-height" name="avatar">

                @if (isset($goods->avatar) && $goods->avatar)
                    <img src="{{ pare_url_file($goods->avatar) }}"
                        style="width: 60px; height: 60px; border-radius: 10px; margin-top: 10px" alt="avatar goods">
                @endif
            </div>
            <div class="form-group">
                <label for="price_input" class="col-form-label input-label">Đơn giá nhập:</label>
                <div class="textbox-unitprice">
                    <input name="input_price" class="form-control custom-select-height" type="text" value="{{ old('input_price', $goods->input_price ?? '') }}" id="price_input" style="border-radius: 3px 0 0 3px !important;">
                    <span id="unit-price-input" class="unit-price" style="border-radius: 0 3px 3px 0 !important;">0</span>
                </div>
                @error('input_price')
                    <small id="" class="form-text text-danger">{{ $errors->first('input_price') }}</small>
                @enderror
            </div>
            {{-- Xử lý tự load và hiển thị Đơn giá nhập --}}
            <script>
                $(document).ready(function() {
                  $('#price_input').on('input', function() {
                    var inputValue = $(this).val();
                    var formattedValue = parseFloat(inputValue).toLocaleString('vi-VN'); // Định dạng giá trị số thành chuỗi với phân cách hàng nghìn
                    $('#unit-price-input').text(formattedValue);
                  });
                });
            </script>
            {{-- End --}}
            <div class="form-group">
                <label for="markup_ratio" class="col-form-label input-label">Tỷ lệ vênh:</label>
                <div class="textbox-unitprice">
                    <input name="markup_ratio" class="form-control custom-select-height" type="text" value="{{ old('markup_ratio', $goods->markup_ratio ?? '') }}" id="markup_ratio" style="border-radius: 3px 0 0 3px !important;">
                    <span class="unit-price" style="border-radius: 0 3px 3px 0 !important;">%</span>
                </div>
                @error('markup_ratio')
                    <small id="" class="form-text text-danger">{{ $errors->first('markup_ratio') }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="price_output" class="col-form-label input-label">Đơn giá xuất:</label>
                <div class="textbox-unitprice">
                    <input name="output_price" class="form-control custom-select-height" type="text" value="{{ old('output_price', $goods->output_price ?? '') }}" id="price_output" style="border-radius: 3px 0 0 3px !important;">
                    <span id="unit-price-output" class="unit-price" style="border-radius: 0 3px 3px 0 !important;">0</span>
                </div>
                @error('output_price')
                    <small id="" class="form-text text-danger">{{ $errors->first('output_price') }}</small>
                @enderror
            </div>
            {{-- Xử lý tự động load dữ liệu lên ô "Đơn giá xuất" = "Đơn giá nhập" x "Tỷ lệ vênh" + "Đơn giá nhập" --}}
            <script>
                $(document).ready(function() {
                    // Lắng nghe sự kiện khi giá trị trong ô Tỷ lệ vênh thay đổi
                    $('#markup_ratio').on('input', function() {
                        var inputPrice = parseFloat($('#price_input').val()); // Lấy giá trị từ ô Đơn giá nhập
                        var markupRatio = parseFloat($(this).val()); // Lấy giá trị từ ô Tỷ lệ vênh
                        var outputPrice = inputPrice * (markupRatio / 100) + inputPrice; // Tính toán giá trị Đơn giá xuất
                        var formattedOutputPrice = parseFloat(outputPrice).toLocaleString('vi-VN'); // Định dạng giá trị số thành chuỗi với phân cách hàng nghìn
                        $('#price_output').val(outputPrice); // Cập nhật giá trị vào ô Đơn giá xuất
                        $('#unit-price-output').text(formattedOutputPrice); // Đồng thời cập nhật vào ô nổi bật nối sau
                    });
                    // Xử lý tự load Đơn giá xuất khi nhập trực tiếp vào ô Đơn giá xuất nổi bật phía sau
                    $('#price_output').on('input', function() {
                        var inputValue = $(this).val();
                        var formattedValue = parseFloat(inputValue).toLocaleString('vi-VN');
                        var inputPrice = parseFloat($('#price_input').val());
                        var markupRatio = (inputValue - inputPrice) / inputPrice * 100;
                        $('#markup_ratio').val(markupRatio);
                        $('#unit-price-output').text(formattedValue);
                    });
                });
            </script>
            {{-- End --}}
            <div class="row">
                <div class="col-6 form-group">
                    <label for="goods_tax" class="col-form-label input-label">Thuế:</label>
                    <div class="textbox-unitprice">
                        <input name="tax" class="form-control custom-select-height" type="text" value="{{ old('tax', $goods->tax ?? '') }}" id="goods_tax" style="border-radius: 3px 0 0 3px !important;">
                        <span class="unit-price" style="border-radius: 0 3px 3px 0 !important;">%</span>
                    </div>
                    @error('tax')
                        <small id="" class="form-text text-danger">{{ $errors->first('tax') }}</small>
                    @enderror
                </div>
                <div class="col-6 form-group">
                    <label for="tax_value" class="col-form-label input-label">Tiền thuế:</label>
                    <div class="textbox-unitprice">
                        <input name="tax_value" class="form-control custom-select-height" type="text" value="{{ old('tax_value', $goods->tax_value ?? '') }}" id="tax_value" style="border-radius: 3px 0 0 3px !important;">
                        <span id="unit-price-tax_value" class="unit-price" style="border-radius: 0 3px 3px 0 !important;">0</span>
                    </div>
                    @error('tax_value')
                        <small id="" class="form-text text-danger">{{ $errors->first('tax_value') }}</small>
                    @enderror
                </div>
            </div>
            <script>
                $(document).ready(function(){
                    // Lắng nghe sự kiện khi giá trị trong ô Thuế thay đổi
                    $('#goods_tax').on('input', function() {
                        var goodsTax = $(this).val();
                        var outputPrice = parseFloat($('#price_output').val()); // Lấy giá trị từ ô Đơn giá xuất
                        var totalValue = outputPrice - outputPrice * (goodsTax / 100);
                        $('#total_value_goods').val(totalValue);
                        var formattedTotal = parseFloat(totalValue).toLocaleString('vi-VN');
                        $('#total_highlight').text(formattedTotal);

                        var taxValue = outputPrice * (goodsTax / 100);
                        $('#tax_value').val(taxValue);
                        var formattedTaxValue = parseFloat(taxValue).toLocaleString('vi-VN');
                        $('#unit-price-tax_value').text(formattedTaxValue);
                    });
                })
            </script>
            <!-- Sau khi tính toán thuế và tất cả tính toán liên quan -->
            <div class="form-group">
                <label for="total_value_goods" class="col-form-label input-label">Tổng tiền mặt hàng:</label>
                <div class="textbox-unitprice">
                    <input name="total" class="form-control custom-select-height" type="text" value="{{ old('total', $goods->total ?? '') }}" id="total_value_goods" style="border-radius: 3px 0 0 3px !important;" readonly>
                    <span class="unit-price unit-price-exp" style="border-radius: 0 3px 3px 0 !important;" id="total_highlight">0</span>
                </div>
                @error('total')
                    <small id="" class="form-text text-danger">{{ $errors->first('total') }}</small>
                @enderror
            </div>
        </div>
    </div>
    <div class="btn-group-head-order mt-5">
        <button type="submit" class="btn btn-addorder"><i class="fa fa-plus-circle" aria-hidden="true"></i><span>Thêm Hàng Hóa</span></button>
    </div>
</form>
