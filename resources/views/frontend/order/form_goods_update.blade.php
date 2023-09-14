@extends('frontend.layouts.business_order')
@section('content')
<form method="POST" action="" >
    @csrf
            <div class="main-content-inner">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                           
                           
                            <!-- Form nhập thông tin hàng hóa start-->
                            
                            <div class="col-12 mt-2">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-header-order">
                                            <h4 class="header-title header-title-main">Hàng Hóa</h4>
                                            
                                        </div>                                        
                                        <div class="data-tables datatable-dark">
                                            <table id="dataTable3" class="text-center table-business">
                                                <thead class="text-capitalize">
                                                    <tr>
                                                        <th>Thao tác</th>
                                                        <th>Mã hàng hóa</th>
                                                        <th>Tên hàng hóa</th>
                                                        <th>Hãng SX</th>
                                                        <th>Xuất xứ</th>
                                                        <th>Giá nhập vào</th>
                                                        <th>Tỷ lệ vênh</th>
                                                        <th>Giá bán ra</th>
                                                        <th>Thuế</th>
                                                        <th>Tổng tiền</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($goods ?? [] as $item)
                                                        <tr>
                                                            <form action="" method="post" >
                                                                @csrf
                                                                <td>
                                                                    <ul class="d-flex justify-content-center">
                                                                        <button type="submit"  class="btn  btn-outline-primary" >   <li class="mr-2">
                                                                                <i class=""
                                                                                    aria-hidden="true" ></i>Chọn</li></button>
                                                       
                                                                    </ul>
                                                                    <input name="goods_id" type="hidden" value="{{  $item->id }}"  >  
                                                                </td>
                                                              
                                                                </form>
                                                            <td>{{ $item->id }}</td>
                                                            <td>{{ $item->name }}</td>
                                                            <td>{{ $item->manufacturer }}</td>
                                                            <td>{{ $item->origin }}</td>
                                                            <td>{{ $item->input_price }}</td>
                                                            <td>{{ $item->markup_ratio }}</td>
                                                            <td>{{ $item->output_price }}</td>
                                                            <td>{{ $item->tax }}</td>
                                                            <td>{{ $item->total }}</td>
                                                            
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                       
                            <!-- Form nhập thông tin hàng hóa end -->
                           
                        </div>
                    </div>
                </div>
            </form>
  @stop