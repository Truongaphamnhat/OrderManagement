@extends('backend.layouts.app_backend')
@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h2>Khách hàng</h2>
        <a href="{{ route('get_admin.customer.create') }}" class="btn btn-primary" style="color: azure;">Thêm mới</a>
    </div>
    <form class="form-inline">
        <div class="form-group mb-2 mr-2">
            <label for="inputPassword2" class="sr-only">Tên</label>
            <input type="text" name="n" class="form-control" value="{{ Request::get('n') }}"
                placeholder="Nhập tên khách hàng ">
        </div>

        <div class="form-group mb-2 mr-2">
            <label for="inputPassword2" class="sr-only">Trạng thái</label>
            <select name="status" class="form-control" id="">
                <option value="">-- Tìm trạng thái --</option>
                @foreach ($status ?? [] as $key => $item)
                    <option value="{{ $key }}" {{ (Request::get('status') ?? 0) == $key ? 'selected' : '' }}>
                        {{ $item['name'] }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary mb-2">Tìm kiếm</button>
    </form>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Avatar</th>
                    <th>Tên khách hàng</th>
                    <th>Điện thoại</th>
                    <th>Email</th>
                    <th>Trạng thái</th>
                    <th>List khách hàng</th>
                    <th>Người tạo</th>
                    <th>Ngày tạo</th>
                    {{-- <th>Slug</th> --}}
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers ?? [] as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>
                            <img src="{{ pare_url_file($item->avatar) }}"
                                style="width: 60px; height: 60px; border-radius: 10px" alt="">
                        </td>
                        <td>{{ strlen($item->name) > 20 ? mb_substr($item->name, 0, 15, 'UTF-8') . '...' : $item->name }} <br>
                            <span> {{ $item->province->name ?? '...' }} - {{ $item->district->name ?? '...' }} -
                                {{ $item->ward->name ?? '...' }}</span>
                        </td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->email }}</td>
                        <td>
                            <span class="{{ $item->getStatus($item->status)['class'] ?? 'badge badge-light' }}">
                                {{ $item->getStatus($item->status)['name'] ?? 'Mới' }}
                            </span>
                        </td>
                        <td>{{ $item->category->name ?? '[N\A]' }}</td>
                        <td>{{ $item->user->name ?? '[N\A]' }}</td>
                        <td>{{ $item->created_at }}</td>
                        {{-- <td>{{ $item->slug }}</td> --}}
                        <td>
                            <a href="{{ route('get_admin.customer.update', $item->id) }}" class="btn btn-info"
                                style="padding: 5px">Edit</a>
                            {{-- <a href="#">|</a> --}}
                            <a href="{{ route('get_admin.customer.delete', $item->id) }}" class="btn btn-danger"
                                style="padding: 5px">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
