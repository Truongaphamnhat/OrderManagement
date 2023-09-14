<form method="POST" action="" autocomplete="off" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="choose_contract" class="col-form-label input-label">Hợp đồng<code>*</code>:</label>
                <select name="contract_id" class="custom-select custom-select-height" id="choose_contract" onchange="showContractInfo()">
                    <option value="">----Chọn hợp đồng----</option>
                    @foreach ($contracts ?? [] as $item)
                        <option value="{{ $item->id }}"
                            {{ ($item->contract_id ?? 0) == $item->id ? 'selected' : '' }}>{{ $item->name }}
                        </option>
                    @endforeach
                </select>
                @error('contract_id')
                    <small id="" class="form-text text-danger">{{ $errors->first('contract_id') }}</small>
                @enderror
            </div>
            <div class="row">
                <div class="col-3 form-group">
                    <label for="contract_id" class="col-form-label input-label">Mã hợp đồng<code>*</code>:</label>
                    <input type="text" name="contract_id" class="form-control" value="{{ old('contract_id', $contract_goods_detail->contract_id ?? '') }}" id="contract_id" readonly>
                    @error('contract_id')
                        <small id="" class="form-text text-danger">{{ $errors->first('contract_id') }}</small>
                    @enderror
                </div>
                <div class="col-9 form-group">
                    <label for="contract_name" class="col-form-label input-label">Tên hợp đồng:</label>
                    <input class="form-control custom-select-height" type="text" value="" id="contract_name" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-6 form-group">
                    <label for="user_name" class="col-form-label input-label">Chủ sở hữu:</label>
                    <input type="text" name="user_name" class="form-control" value="" id="user_name" readonly>
                </div>
                <div class="col-6 form-group">
                    <label for="user_phone" class="col-form-label input-label">SĐT Chủ sở hữu:</label>
                    <input class="form-control custom-select-height" type="text" value="" id="user_phone" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-6 form-group">
                    <label for="customer_name" class="col-form-label input-label">Khách hàng:</label>
                    <input type="text" name="customer_name" class="form-control" value="" id="customer_name" readonly>
                </div>
                <div class="col-6 form-group">
                    <label for="customer_phone" class="col-form-label input-label">SĐT Khách hàng:</label>
                    <input class="form-control custom-select-height" type="text" value="" id="customer_phone" readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="contract_contract_type_id" class="col-form-label input-label">Loại hợp đồng:</label>
                <input type="text" class="form-control custom-select-height" value="" id="contract_contract_type_id" readonly>
            </div>
            <script>
                function showContractInfo() {
                    var select = document.getElementById('choose_contract');
                    var selectedContractId = select.value;
                    var selectedContract = {!! json_encode($contracts ?? []) !!}
                    .find(function (contract) {
                        return contract.id == selectedContractId;
                    });
                    var selectedContractTypeId = selectedContract?.contract_type_id;
                    var selectedContractType = {!! json_encode($contract_types ?? []) !!}
                    .find(function (contract_type) {
                        return contract_type.id == selectedContractTypeId;
                    });
                    var selectedUserId = selectedContract?.user_id;
                    var selectedUser = {!! json_encode($users ?? []) !!}
                    .find(function (user) {
                        return user.id == selectedUserId;
                    });
                    var selectedCustomerId = selectedContract?.customer_id;
                    var selectedCustomer = {!! json_encode($customers ?? []) !!}
                    .find(function (customer) {
                        return customer.id == selectedCustomerId;
                    });

                    document.getElementById('contract_id').value = selectedContract ? selectedContract.id : '';
                    document.getElementById('contract_name').value = selectedContract ? selectedContract.name : '';
                    document.getElementById('contract_contract_type_id').value = selectedContract ? selectedContractType.name : '';
                    document.getElementById('user_name').value = selectedContract ? selectedUser.name : '';
                    document.getElementById('user_phone').value = selectedContract ? selectedUser.phone : '';
                    document.getElementById('customer_name').value = selectedContract ? selectedCustomer.name : '';
                    document.getElementById('customer_phone').value = selectedContract ? selectedCustomer.phone : '';
                }
            </script>
        </div>

        <div class="col-6">
            <div class="row">
                <div class="col-6 form-group">
                    <label for="choose_goods" class="col-form-label input-label">Hàng Hóa<code>*</code>:</label>
                    <select name="goods_id" class="custom-select custom-select-height" id="choose_goods" onchange="showGoodsInfo()">
                        <option value="">----Chọn hàng hóa----</option>
                        @foreach ($goods ?? [] as $item)
                        <option value="{{ $item->id }}" {{ ($item->id == old('goods_id', $goods_id ?? null)) ? 'selected' : '' }}>
                            {{ $item->name }}
                        </option>
                        @endforeach
                    </select>
                    @error('goods_id')
                    <small id="" class="form-text text-danger">{{ $errors->first('goods_id') }}</small>
                    @enderror
                </div>
                <div class="col-3 form-group">
                    <label for="quantity" class="col-form-label input-label">Số lượng<code>*</code>:</label>
                    <input type="number" name="quantity" step="1" min="0" max="20" value="{{ old('quantity', 1) }}" class="form-control custom-select-height" id="quantity">
                    @error('quantity')
                        <small id="" class="form-text text-danger">{{ $errors->first('quantity') }}</small>
                    @enderror
                </div>
                <div class="col-3 form-group">
                    <label for="unit" class="col-form-label input-label">Đơn vị:</label>
                    <input type="text" value="" class="form-control custom-select-height" id="unit" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-3 form-group">
                    <label for="goods_id" class="col-form-label input-label">Mã hàng hóa<code>*</code>:</label>
                    <input type="text" name="goods_id" class="form-control" value="{{ old('goods_id', $contract_goods_detail->goods_id ?? '') }}" id="goods_id" readonly>
                    @error('goods_id')
                        <small id="" class="form-text text-danger">{{ $errors->first('goods_id') }}</small>
                    @enderror
                </div>
                <div class="col-9 form-group">
                    <label for="goods_name" class="col-form-label input-label">Tên hàng hóa:</label>
                    <input class="form-control custom-select-height" type="text" value="" id="goods_name" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-5 form-group">
                    <label for="price_input" class="col-form-label input-label">Đơn giá nhập:</label>
                    <div class="textbox-unitprice">
                        <input name="input_price" class="form-control custom-select-height" type="text" value="" id="price_input" style="border-radius: 3px 0 0 3px !important;" readonly>
                        <span id="unit-price-input" class="unit-price" style="border-radius: 0 3px 3px 0 !important;">0</span>
                    </div>
                </div>
                <div class="col-2 form-group">
                    <label for="markup_ratio" class="col-form-label input-label">Tỷ lệ vênh:</label>
                    <div class="textbox-unitprice">
                        <input name="markup_ratio" class="form-control custom-select-height" type="text" value="" id="markup_ratio" style="border-radius: 3px 0 0 3px !important; text-align: center;" readonly>
                        <span class="unit-price" style="border-radius: 0 3px 3px 0 !important; padding-left: 15px !important; padding-right: 15px !important;">%</span>
                    </div>
                </div>
                <div class="col-5 form-group">
                    <label for="price_output" class="col-form-label input-label">Đơn giá xuất:</label>
                    <div class="textbox-unitprice">
                        <input name="output_price" class="form-control custom-select-height" type="text" value="" id="price_output" style="border-radius: 3px 0 0 3px !important;" readonly>
                        <span id="unit-price-output" class="unit-price" style="border-radius: 0 3px 3px 0 !important;">0</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-2 form-group">
                    <label for="goods_tax" class="col-form-label input-label">Thuế:</label>
                    <div class="textbox-unitprice">
                        <input name="tax" class="form-control custom-select-height" type="text" value="" id="goods_tax" style="border-radius: 3px 0 0 3px !important;" readonly>
                        <span class="unit-price" style="border-radius: 0 3px 3px 0 !important; padding-left: 15px !important; padding-right: 15px !important;">%</span>
                    </div>
                </div>
                <div class="col-10 form-group">
                    <label for="value_after_tax" class="col-form-label input-label">Đơn giá xuất sau thuế:</label>
                    <div class="textbox-unitprice">
                        <input name="total" class="form-control custom-select-height" type="text" value="" id="value_after_tax" style="border-radius: 3px 0 0 3px !important;" readonly>
                        <span class="unit-price" style="border-radius: 0 3px 3px 0 !important;" id="value_after_tax_highlight">0</span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="total_value" class="col-form-label input-label">Thành tiền<code>*</code>:</label>
                <div class="textbox-unitprice">
                    <input name="total_value" class="form-control custom-select-height" type="text" value="{{ old('total_value', $contract_goods_detail->total_value ?? '') }}" id="total_value" style="border-radius: 3px 0 0 3px !important;" readonly>
                    <span class="unit-price unit-price-exp" style="border-radius: 0 3px 3px 0 !important;" id="goods_value_highlight">0</span>
                </div>
                @error('total_value')
                    <small id="" class="form-text text-danger">{{ $errors->first('total_value') }}</small>
                @enderror
            </div>
            <script>
                function formatCurrency(number) {
                   return number.toLocaleString('vi-VN');
                }

                function showGoodsInfo() {
                    var select = document.getElementById('choose_goods');
                    var selectedGoodsId = select.value;
                    var selectedGoods = {!! json_encode($goods ?? []) !!}.find(function (goods) {
                        return goods.id == selectedGoodsId;
                    });

                    document.getElementById('unit').value = selectedGoods ? selectedGoods.unit : '';
                    document.getElementById('goods_id').value = selectedGoods ? selectedGoods.id : '';
                    document.getElementById('goods_name').value = selectedGoods ? selectedGoods.name : '';
                    document.getElementById('price_input').value = selectedGoods ? selectedGoods.input_price : '';
                    document.getElementById('markup_ratio').value = selectedGoods ? selectedGoods.markup_ratio : '';
                    document.getElementById('price_output').value = selectedGoods ? selectedGoods.output_price : '';
                    document.getElementById('goods_tax').value = selectedGoods ? selectedGoods.tax : '';
                    document.getElementById('value_after_tax').value = selectedGoods ? selectedGoods.total : '';

                    document.getElementById('unit-price-input').innerText = selectedGoods ? formatCurrency(selectedGoods.input_price) : '0';
                    document.getElementById('unit-price-output').innerText = selectedGoods ? formatCurrency(selectedGoods.output_price) : '0';
                    document.getElementById('value_after_tax_highlight').innerText = selectedGoods ? formatCurrency(selectedGoods.total) : '0';

                    // Tính toán giá trị Thành tiền
                    var valueAfterTax = parseFloat(document.getElementById('value_after_tax').value) || 0;
                    var quantity = 1; // Giá trị mặc định là 1
                    var totalValue = valueAfterTax * quantity;

                    // Cập nhật giá trị trong ô Thành tiền
                    document.getElementById('total_value').value = totalValue;
                    document.getElementById('goods_value_highlight').innerText = formatCurrency(totalValue);

                    // Gọi hàm updateTotalValue để tính toán lại giá trị Thành tiền khi chọn hàng hóa
                    updateTotalValue();
                }

                // Lắng nghe sự kiện thay đổi của Số lượng để tự động tính và cập nhật hiển thị Thành tiền
                document.getElementById('quantity').addEventListener('change', updateTotalValue);

                function updateTotalValue() {
                    var valueAfterTax = parseFloat(document.getElementById('value_after_tax').value) || 0;
                    var quantity = parseInt(document.getElementById('quantity').value) || 1;
                    var selectedGoods = {!! json_encode($goods ?? []) !!}.find(function (goods) {
                        return goods.id == document.getElementById('choose_goods').value;
                    });
                    var totalValue = valueAfterTax * quantity;

                    document.getElementById('total_value').value = totalValue;
                    document.getElementById('goods_value_highlight').innerText = formatCurrency(totalValue);
                }

                document.getElementById('quantity').addEventListener('input', function() {
                    this.setAttribute('value', this.value);
                });
            </script>
        </div>
    </div>
    <div class="btn-group-head-order mt-3">
        <button type="submit" data-id="add_goods" name="add_goods" class="btn btn-addorder"><i class="fa fa-plus-circle" aria-hidden="true"></i><span>Thêm Hàng Hóa</span></button>
    </div>
</form>
