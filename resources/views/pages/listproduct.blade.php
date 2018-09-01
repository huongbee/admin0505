@extends('pages.layout')
@section('content')
<div class="panel panel-default">
<div class="panel-heading"><b>Danh sách sản phẩm loại <i>{{$type->name}}</i></b>
    </div>
    <div class="panel-body">
        <table class="table table-bordered">
            <thead>
              <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Chi tiết</th>
                <th>Đơn giá</th>
                <th>Hình</th>
                <th>Trạng thái</th>
                <th>Tuỳ chọn</th>
              </tr>
            </thead>
            <tbody>
                <?php $i = 0;?>
                @foreach($products as $p)
                <tr>
                    <td>{{++$i}}</td>
                    <td>{{$p->name}}</td>
                    <td>{!!$p->detail!!}</td>
                    <td>{{number_format($p->price)}}</td>
                    <td>
                    <img src="admin-master/img/products/{{$p->image}}" width="100px">
                    </td>
                    <td>
                        @if($p->status==0)
                        Sản phẩm thường
                        @else
                        <span style="color:red">Sản phẩm đặc biệt</span>
                        @endif
                    </td>
                    <td style="width:80px">
                        <a href="{{route('edit-product',$p->id)}}"><i class="fa fa-edit fa-2x"></i> Sửa </a>
                        <br>
                        <a href=""><i class="fa fa-trash-o fa-2x"></i> Xoá</a>
                    </td>
                </tr>
              @endforeach

            </tbody>
          </table>

          {{$products->links()}}
    </div>
</div>
@endsection