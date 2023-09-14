<form method="POST" action="" autocomplete="off" enctype="multipart/form-data">
    @csrf
    <div class="col-12 mt-3">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h4 class="header-title">Thông tin loại hợp đồng</h4>
                </div>
                <p class="text-muted font-14">Vui lòng điền thông tin cần thiết vào form bên dưới. Các trường có dấu <code>*</code> là bắt buộc phải điền.</p>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="contract_type_name" class="col-form-label input-label">Loại hợp đồng<code>*</code>:</label>
                            <input name="name" class="form-control" type="text" value="{{ old('name', $contract_type->name ?? '') }}" id="contract_type_name">
                            @error('name')
                                <small id="" class="form-text text-danger">{{ $errors->first('name') }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="contract_type_description" class="col-form-label input-label">Mô tả<code>*</code>:</label>
                            <textarea name="description" id="contract_type_description" class="form-control" style="width: 100%;" rows="3">{{ old('description', $contract_type->description ?? '') }}</textarea>
                            @error('description')
                                <small id="" class="form-text text-danger">{{ $errors->first('description') }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="btn-group-savetrans">
                    <button type="submit" class="btn btn-primary btn-savetrans mt-3"><i class="fa fa-floppy-o" aria-hidden="true"></i><span>Lưu</span></button>
                </div>
            </div>
        </div>
    </div>
</form>
