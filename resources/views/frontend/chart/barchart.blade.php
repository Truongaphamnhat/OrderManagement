@extends('frontend.layouts.report_sales')
<head>
    <title>Biểu đồ cột sử dụng Bootstrap và Chart.js</title>
    <!-- Thêm Bootstrap và Chart.js -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
  </head>
@section('content')

    {{-- <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <canvas id="barChart"></canvas>
        </div>
      </div>
    </div> --}}
    <div class="container mt-4">
        <h2>Biểu đồ Doanh số bán hàng</h2>
        <div class="row">
          <div class="col-lg-8 mb-4">
            <canvas id="barChart"></canvas>
          </div>
          <div class="container">
            <h2>Thống kê số lượng hàng hóa và giá trị theo tháng</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Tháng</th>
                        <th>Tên hàng hóa</th>
                        <th>Số lượng</th>
                        <th>Tổng giá trị</th>
                        <th>Hàng hóa bán chạy</th>
                        <th>Hàng hóa ít được bán</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_table as $item)
                        <tr>
                            <td>{{ $item->thang }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->so_luong }}</td>
                            <td>{{ $item->gia_tri_hang_hoa }}</td>
                            <td>{{  $bestSellingGoodsNames[$item->thang] }}</td>
                            <td>{{ $worstSellingGoodsNames[$item->thang] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    <script>
        var labels = <?php echo json_encode($labels); ?>;
        var data = <?php echo json_encode($values); ?>;
        
        var ctx = document.getElementById('barChart').getContext('2d');
        var barChart = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: labels,
            datasets: [{
              label: 'Doanh số bán hàng theo thời gian',
              data: data,
              backgroundColor: 'rgba(75, 192, 192, 0.2)',
              borderColor: 'rgba(75, 192, 192, 1)',
              borderWidth: 1
            }]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
        });

        // Dữ liệu mẫu cho biểu đồ tròn
        var pieData = {
        labels: ['Hàng hóa A', 'Hàng hóa B', 'Hàng hóa C'],
        datasets: [{
            data: [3000, 4500, 2000],
            backgroundColor: ['rgba(255, 99, 132, 0.6)', 'rgba(75, 192, 192, 0.6)', 'rgba(255, 206, 86, 0.6)'],
            borderColor: ['rgba(255, 99, 132, 1)', 'rgba(75, 192, 192, 1)', 'rgba(255, 206, 86, 1)'],
            borderWidth: 1
        }]
        };

        var pieCtx = document.getElementById('pieChart').getContext('2d');
        var pieChart = new Chart(pieCtx, {
        type: 'pie',
        data: pieData,
        });
      </script>

@stop