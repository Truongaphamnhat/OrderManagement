<!-- contract.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Hợp đồng</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Hợp đồng</h1>

        <div class="row">
            <div class="col-md-6">
                <h3>Thông tin hợp đồng</h3>
                <p>Mã hợp đồng: {{ $contract->id }}</p>
                <p>Ngày ký: {{ $contract->start_day }}</p>
                <p>Người ký: {{ $contract->user->name }}</p>
            </div>
            <div class="col-md-6">
                <h3>Thông tin khách hàng</h3>
                <p>Tên khách hàng: {{ $contract->customer->name }}</p>
                <p>Email: {{ $contract->customer->email }}</p>
                <p>Địa chỉ: {{ $contract->customer->address }}</p>
            </div>
        </div>

        {{-- <h3>Danh sách hàng hóa</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Mã hàng hóa</th>
                    <th>Tên hàng hóa</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($goods as $good)
                    <tr>
                        <td>{{ $good->id }}</td>
                        <td>{{ $good->name }}</td>
                        <td>{{ $good->output_price }}</td>
                        <td>{{ $good->pivot->quantity }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table> --}}
    </div>
</body>
</html>
