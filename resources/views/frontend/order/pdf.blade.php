<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Thông tin Đơn Hàng</title>
    <style>
        body {
            font-family: 'DejaVu Sans';
        }

        .container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            text-align: center;
        }

        .order-details {
            margin-top: 20px;
        }

        .order-details h2 {
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .order-details table {
            width: 100%;
            border-collapse: collapse;
        }

        .order-details th, .order-details td {
            border: 1px solid #ccc;
            padding: 10px;
        }

        .order-details th {
            background-color: #f2f2f2;
        }

        .customer-info {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            background-color: #f2f2f2;
        }

        .customer-info h2 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .customer-info p {
            margin: 5px 0;
        }

        .total {
            margin-top: 20px;
            text-align: right;
        }

        .total h3 {
            font-size: 18px;
            font-weight: bold;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Thông Tin Đơn Hàng {{ $orders->code_order }}</h1>
        </div>

        <div class="customer-info">
            <h2>Thông Tin Khách Hàng</h2>
            <p><strong>Tên Khách Hàng:</strong> {{ $orders->customer->name }}</p>
            <p><strong>Mã số thuế:</strong> {{ $orders->customer->tax_code }}</p>
            <p><strong>Email:</strong> {{ $orders->customer->email }}</p>
            <p><strong>Điện thoại:</strong> {{ $orders->customer->phone }}</p>
            <p><strong>Địa Chỉ:</strong> {{ $orders->customer->ward->name }} 
            {{ $orders->customer->district->name }} - {{ $orders->customer->province->name }}</p>
        </div>

        <div class="order-details">
            <h2>Chi Tiết Đơn Hàng</h2>
            <table>
                <thead>
                    <tr>
                        {{-- <th>Mã hàng hóa</th> --}}
                        <th>Tên hàng hóa</th>
                        <th>Số lượng</th>
                        <th>Xuất xứ</th>
                        <th>Hãng SX</th>
                        <th>Bảo hành</th>
                        <th>Đơn vị tính</th>
                        {{-- <th>Giá nhập</th>
                        <th>Giá xuất</th>
                        <th>Tỉ lệ vênh</th>
                        <th>Thuế</th> --}}
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order_detail_has_id ?? [] as $item)
                    <tr>
                        {{-- <td>{{ $item->id }} </td> --}}
                        <td>{{  $item->goods->name }}</td>
                        <td>{{ $item->quantity}}</td>
                        <td>{{ $item->goods->origin }}</td>
                        <td>{{ $item->goods->manufacturer }}</td>
                        <td>{{ $item->goods->guarantee }}</td>
                        <td>{{ $item->goods->unit }}</td>
                        {{-- <td>{{ number_format($item->goods->input_price, 0, ',', '.') }}</td>
                        <td>{{ number_format($item->goods->output_price, 0, ',', '.') }}</td>
                        <td>{{ number_format($item->goods->markup_ratio, 0, ',', '.') }}</td>
                        <td>{{ number_format($item->goods->tax, 0, ',', '.') }}</td> --}}
                        <td>{{ $item->goods->total }}</td>
                    </tr>
                    
                    @endforeach
                </tbody>
            </table>
            <div class="total">
            @php
            setlocale(LC_MONETARY, 'vi_VN');    // Thiết lập locale cho tiền tệ (cần có extension intl)
            $totalOutput_price = 0;                     // Biến lưu tổng tiền hàng
            $totalTax = 0;                     // Biến lưu tổng thuế
            $totalOrder_price = 0;            // Biến lưu tổng giá trị đơn hàng
            $count = 0;
            $avgTax = 0;
            $total_price = 0;
        @endphp
        @foreach ($order_detail_has_id ?? [] as $item)
            @php
                $count++;
                $totalOutput_price += ($item->goods->output_price );
                $total_price += ($item->goods->total);
                $totalTax += $item->goods->tax;
                $avgTax = $totalTax / $count;
                $totalOrder_price = $totalOutput_price + $totalOutput_price*$avgTax/100;
            @endphp
        @endforeach
        
       
                    {{-- <span>Tiền hàng:</span><br>
                    <span>Tiền thuế:</span><br> --}}
                    {{-- <span>Tiền CK:</span><br> --}}
                    <span>Tổng tiền:</span> 
               
                  
                    {{-- <span>{{ number_format($totalOutput_price, 0, ',', '.') }}</span><br>
                    <span>{{ number_format($avgTax, 0, ',', '.') }}</span><br> --}}
                    <span>{{ number_format($total_price, 0, ',', '.') }}</span>
             
                </div>
        <div class="footer">
            <p>Cảm ơn bạn đã đặt hàng!</p>
        </div>
    </div>
</body>
</html>
