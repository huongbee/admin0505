@extends('pages.layout')
@section('content')
<div class="panel panel-default">
<div class="panel-heading">
    <b>
        Đơn hàng 
        @if($status==0)
         chưa xác nhận
        @elseif($status==1)
        đã xác nhận
        @elseif($status==2)
        đã hoàn tất
        @else
        đã huỷ
        @endif
    </b>
    </div>
    <div class="panel-body">
        <table class="table table-bordered">
            <thead>
              <tr>
                <th>STT</th>
                <th>Mã đơn hàng</th>
                <th>Thông tin khách hàng</th>
                <th>Sản phẩm (tên sp - đơn giá 1 sp - số lượng)</th>
                <th>Tổng tiền (chưa giảm)</th>
                <th>Tổng tiền (đã giảm) </th>
                <th>Ghi chú</th>
                @if($status==0 || $status==1) <th>Tuỳ chọn</th>@endif
              </tr>
            </thead>
            <tbody>
                <?php $i = 0;?>
                @foreach($bills as $bill)
                <tr>
                    <td>{{++$i}}</td>
                    <td>DH000-{{$bill->id}}</td>
                    <td>
                        <li>{{$bill->customer->name}}</li>
                        <li>{{$bill->customer->phone}}</li>
                        <li>{{$bill->customer->address}}</li>
                    </td>
                    <td>
                        @foreach($bill->billDetail as $bd)
                        <li>{{$bd->product->name}} 
                            - <b>{{number_format($bd->product->price)}}</b> 
                            - <b>{{$bd->quantity}}</b></li>
                        @endforeach
                    </td>
                    <td>
                        {{number_format($bill->total)}}
                    </td>
                    <td>
                        {{number_format($bill->promt_price)}}
                    </td>
                    <td>{{$bill->note}}</td>
                    @if($status==0 || $status==1) 
                    <td>
                        <a href=""  data-toggle="modal" data-target="#update-status">Huỷ đơn hàng</a> 
                        <hr>
                        @if($status==0)
                            Xác nhận đơn hàng
                        @else
                            Hoàn tất đơn hàng
                        @endif
                    </td>
                    @endif
                </tr>
              @endforeach

            </tbody>
        </table>
    </div>
</div>
<div id="update-status" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-body">
            <p>Bạn có chắc chắn Huỷ đơn hàng <b>....</b> ?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="btnOk">OK</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
        </div>
    </div>
</div>

@endsection