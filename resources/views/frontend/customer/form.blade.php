<form method="POST" action="" autocomplete="off" enctype="multipart/form-data">
    <div class="row">
        <div class="col-sm-6">
            @csrf
            <div class="form-group">
                <label class="col-form-label input-label" for="exampleInputEmail1">Danh mục (List khách hàng) <span style="color: red">*</span></label>
                <select name="category_id" class="custom-select-height form-control" id="">
                    <option value="">----Chọn----</option>
                    @foreach ($categories ?? [] as $item)
                        <option value="{{ $item->id }}"
                            {{ ($customer->category_id ?? 0) == $item->id ? 'selected' : '' }}>{{ $item->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <small id="emailHelp" class="form-text text-danger">{{ $errors->first('category_id') }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label class="col-form-label input-label" for="exampleInputEmail1">Trạng thái</label>
                <select name="status" class="custom-select-height form-control" id="">
                    @foreach ($status ?? [] as $key => $item)
                        <option value="{{ $key }}" {{ ($customer->status ?? 0) == $key ? 'selected' : '' }}>
                            {{ $item['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label class="col-form-label input-label" for="exampleInputEmail1">Tên khách hàng <span style="color: red">*</span></label>
                <input type="text" name="name" placeholder="Tên khách hàng ..." class="form-control"
                    value="{{ old('name', $customer->name ?? '') }}">
                @error('name')
                    <small id="" class="form-text text-danger">{{ $errors->first('name') }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label class="col-form-label input-label" for="exampleInputEmail1">Điện thoại <span style="color: red">*</span></label>
                <input type="text" name="phone" placeholder="Số điện thoại ..." class="form-control"
                    value="{{ old('phone', $customer->phone ?? '') }}">
                @error('phone')
                    <small id="" class="form-text text-danger">{{ $errors->first('phone') }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label class="col-form-label input-label" for="exampleInputEmail1">Email</label>
                <input type="text" name="email" placeholder="Địa chỉ email ..." class="form-control"
                    value="{{ old('email', $customer->email ?? '') }}">
                @error('email')
                    <small id="" class="form-text text-danger">{{ $errors->first('email') }}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-addorder btn-back"><i class="fa fa-floppy-o"
                    aria-hidden="true"></i><span> Lưu dữ liệu</span></button>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label class="col-form-label input-label" for="exampleInputEmail1">Mã số thuế  <span style="color: red">*</span></label>
                <input type="text" name="tax_code" placeholder="Mã số thuế ..." class="form-control"
                    value="{{ old('tax_code', $customer->tax_code ?? '') }}">
                @error('tax_code')
                    <small id="" class="form-text text-danger">{{ $errors->first('tax_code') }}</small>
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
                                        {{ ($customer->province_id ?? 0) == $item->id ? 'selected' : '' }}>
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
                <textarea name="address" id="" class="form-control" placeholder="Địa chỉ cụ thể ..." cols="30"
                    rows="2">{{ old('address', $customer->address ?? '') }}</textarea>
                @error('address')
                    <small id="" class="form-text text-danger">{{ $errors->first('address') }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label class="col-form-label input-label" for="exampleInputEmail1">Mô tả</label>
                <textarea name="description" id="" class="form-control" placeholder="Mô tả ..." cols="30" rows="2">{{ old('description', $customer->description ?? '') }}</textarea>
                @error('description')
                    <small id="" class="form-text text-danger">{{ $errors->first('description') }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label class="col-form-label input-label" for="exampleInputPassword1">Hình ảnh</label>
                <input type="file" class="form-control" name="avatar">

                @if (isset($customer->avatar) && $customer->avatar)
                    <img src="{{ pare_url_file($customer->avatar) }}"
                        style="width: 60px; height: 60px; border-radius: 10px; margin-top: 10px" alt="avatar customer">
                @endif
            </div>
        </div>
    </div>
</form>
