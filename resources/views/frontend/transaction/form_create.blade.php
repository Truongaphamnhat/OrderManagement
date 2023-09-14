<form method="POST" action="" autocomplete="off" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-sm-6">
            {{-- Tên giao dịch --}}
            <div class="form-group">
                <label for="transaction_name" class="col-form-label input-label">Tên giao dịch<span style="color: red">*</span>:</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $transaction->name ?? '') }}" id="transaction_name">
                @error('name')
                    <small id="" class="form-text text-danger">{{ $errors->first('name') }}</small>
                @enderror
            </div>
            {{-- Mô tả giao dịch --}}
            <div class="form-group">
                <label for="transaction_des" class="col-form-label input-label">Mô tả:</label>
                <textarea name="description" id="transaction_des" class="form-control" cols="30" rows="2">{{ old('description', $transaction->description ?? '') }}</textarea>
                @error('description')
                    <small id="" class="form-text text-danger">{{ $errors->first('description') }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="choose_customer" class="col-form-label input-label">Khách hàng<span style="color: red">*</span>:</label>
                <select name="customer_id" class="custom-select custom-select-height" id="choose_customer">
                    <option value="">----Chọn khách hàng----</option>
                    @foreach ($customers ?? [] as $item)
                        <option value="{{ $item->id }}"
                            {{ ($customer->customer_id ?? 0) == $item->id ? 'selected' : '' }}>{{ $item->name }}
                        </option>
                    @endforeach
                </select>
                @error('customer_id')
                    <small id="emailHelp" class="form-text text-danger">{{ $errors->first('customer_id') }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="" class="col-form-label input-label">Liên hệ<code>*</code>:</label>
                <select name="contact_id" class="custom-select custom-select-height" id="">
                    <option value="">----Chọn liên hệ----</option>
                    @foreach ($contacts ?? [] as $item)
                        <option value="{{ $item->id }}"
                            {{ ($contact->contact_id ?? 0) == $item->id ? 'selected' : '' }}>{{ $item->name }}
                        </option>
                    @endforeach
                </select>
                @error('contact_id')
                    <small id="emailHelp" class="form-text text-danger">{{ $errors->first('contact_id') }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="start_day" class="col-form-label col-form-label input-label">Ngày bắt đầu<code>*</code>:</label>
                <input class="form-control" type="datetime-local" name="start_day" value="{{ old('start_day') }}" id="start_day">
                @error('start_day')
                    <small id="" class="form-text text-danger">{{ $errors->first('start_day') }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="deadline_day" class="col-form-label col-form-label input-label">Hạn hoàn thành<code>*</code>:</label>
                <input class="form-control" type="datetime-local" name="deadline_day" value="{{ old('deadline_day') }}" id="deadline_day">
                @error('deadline_day')
                    <small id="" class="form-text text-danger">{{ $errors->first('deadline_day') }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="finish_day" class="col-form-label col-form-label input-label">Ngày hoàn thành:</label>
                <input class="form-control" type="datetime-local" name="finish_day" value="{{ old('finish_day') }}" id="finish_day">
                @error('finish_day')
                    <small id="" class="form-text text-danger">{{ $errors->first('finish_day') }}</small>
                @enderror
            </div>
            <input type="hidden" name="selected_start_day" id="selected_start_day">
            <input type="hidden" name="selected_deadline_day" id="selected_deadline_day">
            <input type="hidden" name="selected_finish_day" id="selected_finish_day">
        </div>
        <div class="col-sm-6">
            <div class="row">
                <div class="col-6 form-group">
                    <label for="user_id" class="col-form-label input-label">Mã phụ trách:</label>
                    <input type="text" name="user_id" class="form-control" value="{{ old('user_id', Auth::user()->id ?? '') }}" id="user_id" readonly>
                    @error('user_id')
                        <small id="" class="form-text text-danger">{{ $errors->first('user_id') }}</small>
                    @enderror
                </div>
                <div class="col-6 form-group">
                    <label for="user_name" class="col-form-label input-label">Người phụ trách:</label>
                    <input type="text" name="user_name" class="form-control" value="{{ old('user_name', Auth::user()->name ?? '') }}" id="user_name" readonly>
                    @error('user_name')
                        <small id="" class="form-text text-danger">{{ $errors->first('user_name') }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="choose_transaction" class="col-form-label input-label">Loại giao dịch<span style="color: red">*</span>:</label>
                <select name="transaction_type" class="custom-select custom-select-height" id="choose_transaction">
                    <option value="">----Chọn loại giao dịch----</option>
                    <option value="Giao dịch bán hàng" {{ old('transaction_type') == 1 ? 'selected' : '' }}>Giao dịch bán hàng</option>
                    <option value="Giao dịch cung cấp dịch vụ" {{ old('transaction_type') == 2 ? 'selected' : '' }}>Giao dịch cung cấp dịch vụ</option>
                    <option value="Giao dịch hợp tác đối tác" {{ old('transaction_type') == 3 ? 'selected' : '' }}>Giao dịch hợp tác đối tác</option>
                    <option value="Giao dịch mua sắm" {{ old('transaction_type') == 4 ? 'selected' : '' }}>Giao dịch mua sắm</option>
                    <option value="Giao dịch tài chính" {{ old('transaction_type') == 5 ? 'selected' : '' }}>Giao dịch tài chính</option>
                </select>
                @error('transaction_type')
                    <small id="emailHelp" class="form-text text-danger">{{ $errors->first('transaction_type') }}</small>
                 @enderror
            </div>
            <div class="form-group">
                <label for="" class="col-form-label input-label">Trạng thái:</label>
                <select name="status" class="custom-select custom-select-height" >
                    @foreach ($status ?? [] as $key => $item)
                        <option value="{{ $key }}" {{ ($transaction->status ?? 0) == $key ? 'selected' : '' }}>
                            {{ $item['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="result_trans" class="col-form-label input-label">Kết quả:</label>
                <input type="text" id="result_trans" name="result" class="form-control"
                    value="{{ old('result', $transaction->result ?? '') }}">
                @error('result')
                    <small id="" class="form-text text-danger">{{ $errors->first('result') }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="choose_priority" class="col-form-label input-label">Mức ưu tiên:</label>
                <select name="priority" class="custom-select custom-select-height" id="choose_priority">
                    <option value="">----Chọn mức ưu tiên----</option>
                    <option value="1" {{ old('priority') == 1 ? 'selected' : '' }}>1</option>
                    <option value="2" {{ old('priority') == 2 ? 'selected' : '' }}>2</option>
                    <option value="3" {{ old('priority') == 3 ? 'selected' : '' }}>3</option>
                    <option value="4" {{ old('priority') == 4 ? 'selected' : '' }}>4</option>
                    <option value="5" {{ old('priority') == 5 ? 'selected' : '' }}>5</option>
                </select>
                @error('priority')
                    <small id="emailHelp" class="form-text text-danger">{{ $errors->first('priority') }}</small>
                 @enderror
            </div>
            <div class="form-group">
                <label for="transaction_address" class="col-form-label input-label">Địa chỉ giao dịch:</label>
                <textarea name="transaction_address" id="transaction_address" class="form-control" cols="30" rows="2">{{ old('transaction_address', $transaction->transaction_address ?? '') }}</textarea>
                @error('transaction_address')
                    <small id="" class="form-text text-danger">{{ $errors->first('transaction_address') }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label class="col-form-label input-label" for="">Tài liệu giao dịch:</label>
                <input type="file" class="form-control" name="document">

                @if (isset($transaction->document) && $transaction->document)
                    <a href="{{ pare_url_file($transaction->document) }}" target="_blank">{{ $transaction->document }}</a>
                @endif
            </div>
        </div>
    </div>
    <div class="form-group btn-group-savetrans">
        <button type="submit" onclick="setSelectedDates()" class="btn btn-primary btn-savetrans mt-3 pl-3 pr-3"><i class="fa fa-floppy-o" aria-hidden="true"></i><span>Lưu & Thêm Mới</span></button>
    </div>
    <script>
        function setSelectedDates() {
            var startDay = document.getElementById('start_day').value;
            var deadlineDate = document.getElementById('deadline_day').value;
            var finishDay = document.getElementById('finish_day').value;

            document.getElementById('selected_start_day').value = startDay;
            document.getElementById('selected_deadline_day').value = deadlineDate;
            document.getElementById('selected_finish_day').value = finishDay;
        }
    </script>
</form>
