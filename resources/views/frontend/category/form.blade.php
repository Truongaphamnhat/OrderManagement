
<form method="POST" action="" autocomplete="off" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="example-text-input" class="col-form-label">TÊN <span style="color: red">*</span></label>
        <input type="text" name="name" placeholder="Nhập vào tên nhóm" class="form-control"
            value="{{ old('name', $category->name ?? '') }}">
        @error('name')
            <small id="" class="form-text text-danger">{{ $errors->first('name') }}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="example-search-input" class="col-form-label">MÔ TẢ <span style="color: red">*</span></label>
        <textarea name="description" id="" class="form-control" placeholder="Mô tả ..." cols="30" rows="3">{{ old('description', $category->description ?? '') }}</textarea>
        @error('description')
            <small id="" class="form-text text-danger">{{ $errors->first('description') }}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Hình ảnh</label>
        <input type="file" class="form-control" name="avatar">

        @if (isset($category->avatar) && $category->avatar)
            <img src="{{ pare_url_file($category->avatar) }}"
                style="width: 60px; height: 60px; border-radius: 10px; margin-top: 10px" alt="">
        @endif

    </div>
    {{-- <button type="submit" class="btn btn-dark mt-4 pr-4 pl-4">Lưu</button> --}}
    <!-- <a  class="btn btn-outline-primary mt-4 pr-4 pl-4"> -->
    <!-- <input  type="button" value="Hủy"> -->
    {{-- <button onclick="window.location.href='../../View/List/listcustomer.php'" type="button"
        class="btn btn-outline-dark mt-4 pr-4">Trở về </button> --}}
    {{-- <span class="btn btn-dark mt-4 pr-4 pl-4"><a href="#" style="color: white">Lưu dữ liệu</a></span> --}}
    <span class="btn btn-outline-dark mt-4 pr-4"><a href="{{ route('get.category_index') }}"
            style="color: black">Trở về</a></span>
    <button type="submit" class="btn btn-outline-dark mt-4 pr-4">Lưu dữ liệu</button>
    <!-- </a> -->
</form>
