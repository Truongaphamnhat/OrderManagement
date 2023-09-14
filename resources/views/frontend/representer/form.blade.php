<form method="POST" action="" autocomplete="off" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="customer_name" class="col-form-label input-label">Tên khách hàng:</label>
                <input class="form-control custom-select-height" type="text"
                    value="{{ old('customer_name', $representer->customer->name ?? '') }}" id="customer_name" readonly>
            </div>
            <div class="form-group">
                <label for="customer_email" class="col-form-label input-label">Email:</label>
                <input class="form-control custom-select-height" type="text"
                    value="{{ old('customer_email', $representer->customer->email ?? '') }}" id="customer_email" readonly>
            </div>
            <div class="form-group">
                <label for="customer_phone" class="col-form-label input-label">Số điện thoại KH:</label>
                <input class="form-control custom-select-height" type="text"
                    value="{{ old('customer_phone', $representer->customer->phone ?? '') }}" id="customer_phone" readonly>
            </div>
            <div class="form-group">
                <label for="customer_tax_code" class="col-form-label input-label">Mã số thuế:</label>
                <input class="form-control custom-select-height" type="text"
                    value="{{ old('customer_tax_code', $representer->customer->tax_code ?? '') }}" id="customer_tax_code" readonly>
            </div>
            <div class="form-group">
                <label for="customer_id" class="col-form-label input-label">Mã khách hàng:</label>
                <input type="text" name="customer_id" class="form-control"
                    value="{{ old('customer_id', $representer->customer->id ?? '') }}" id="customer_id" readonly>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label class="col-form-label input-label" for="exampleInputEmail1">Tên khách người đại diện <span
                        style="color: red">*</span></label>
                <input type="text" name="name" placeholder="Nguyễn Văn A" class="form-control"
                    value="{{ old('name', $representer->name ?? '') }}">
                @error('name')
                    <small id="" class="form-text text-danger">{{ $errors->first('name') }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label class="col-form-label input-label" for="exampleInputEmail1">Điện thoại <span
                        style="color: red">*</span></label>
                <input type="text" name="phone" placeholder="0869 ... " class="form-control"
                    value="{{ old('phone', $representer->phone ?? '') }}">
                @error('phone')
                    <small id="" class="form-text text-danger">{{ $errors->first('phone') }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label class="col-form-label input-label" for="exampleInputEmail1">Email</label>
                <input type="text" name="email" placeholder="nguoidaidien@gmail.com" class="form-control"
                    value="{{ old('email', $representer->email ?? '') }}">
                @error('email')
                    <small id="" class="form-text text-danger">{{ $errors->first('email') }}</small>
                @enderror
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="col-form-label input-label" for="exampleInputEmail1">Tỉnh thành</label>
                            <select name="province_id" class="custom-select-height form-control" id="loadDistrict">
                                <option value="">Chọn tỉnh thành</option>
                                @foreach ($provinces ?? [] as $item)
                                    <option value="{{ $item->id }}"
                                        {{ ($representer->province_id ?? 0) == $item->id ? 'selected' : '' }}>
                                        {{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="col-form-label input-label" for="exampleInputEmail1">Quận huyện</label>
                            <select name="district_id" class="custom-select-height form-control" id="districtsData">
                                <option value="">Chọn quận huyện</option>
                                @foreach ($activeDistricts ?? [] as $key => $item)
                                    <option value="{{ $key }}" selected>{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="col-form-label input-label" for="exampleInputEmail1">Phường xã</label>
                            <select name="ward_id" class="custom-select-height form-control" id="wardData">
                                <option value="">Chọn phường xã</option>
                                @foreach ($activeWards ?? [] as $key => $item)
                                    <option value="{{ $key }}" selected>{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-form-label input-label" for="exampleInputEmail1">Địa chỉ cụ thể</label>
                <textarea name="address" id="" class="form-control" placeholder="Số nhà 299, ..." cols="30"
                    rows="2">{{ old('address', $representer->address ?? '') }}</textarea>
                @error('address')
                    <small id="" class="form-text text-danger">{{ $errors->first('address') }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label class="col-form-label input-label" for="exampleInputEmail1">Chức vụ</label>
                <textarea name="description" id="" class="form-control" placeholder="Phó giám đốc ..." cols="30"
                    rows="2">{{ old('description', $representer->description ?? '') }}</textarea>
                @error('description')
                    <small id="" class="form-text text-danger">{{ $errors->first('description') }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label class="col-form-label input-label" for="exampleInputPassword1">Hình ảnh</label>
                <input type="file" class="form-control" name="avatar">

                @if (isset($representer->avatar) && $representer->avatar)
                    <img src="{{ pare_url_file($representer->avatar) }}"
                        style="width: 60px; height: 60px; border-radius: 10px; margin-top: 10px"
                        alt="avatar representer">
                @endif
            </div>
            <button type="submit" class="btn btn-addorder btn-back"><i class="fa fa-floppy-o"
                    aria-hidden="true"></i><span>
                    Lưu dữ liệu</span></button>
        </div>
    </div>
</form>
