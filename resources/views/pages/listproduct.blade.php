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
                <th>Đã xoá</th>
                <th>Tuỳ chọn</th>
              </tr>
            </thead>
            <tbody>
                <?php $i = 0;?>
                @foreach($products as $p)
                <tr>
                    <td>{{++$i}}</td>
                    <td id="name-{{$p->id}}">{{$p->name}}</td>
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
                    <td style="color:red" class="deleted-{{$p->id}}">
                        @if($p->deleted==1)
                        Đã xoá
                        @endif
                    </td>
                    <td style="width:80px">
                        <a href="{{route('edit-product',$p->id)}}"><i class="fa fa-edit fa-2x"></i> Sửa </a>
                        <br>
                    @if($p->deleted==0)
                    <a href="" data-toggle="modal" data-target="#deleteProduct" class="btnDelete" id="btnDelete-{{$p->id}}" data-id="{{$p->id}}" title="{{$p->name}}"><i class="fa fa-trash-o fa-2x"></i> Xoá</a>
                    @endif
                    </td>
                </tr>
              @endforeach

            </tbody>
          </table>

          {{$products->links()}}
    </div>
</div>
<div id="deleteProduct" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body">
          <p>Xoá sản phẩm <b id="name-sp">...</b> ?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="btnOk">OK</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
</div>

<div id="message" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-body">
            <p id="message-box">...</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
        </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
    $('.btnDelete').click(function(){
        var idSP = $(this).attr('data-id')
        var name = $('#name-'+idSP).text()
        // var name = $(this).attr('title')
        $('#name-sp').html(name)
        $('#btnOk').click(function(){
            $.ajax({
                url:"{{route('post-delete-product')}}",
                data:{
                    id:idSP,
                    _token:"{{csrf_token()}}"
                },
                type:"POST",
                success:function(res){
                    $('#deleteProduct').modal('hide')
                    if(res.result == true){
                        $('#message-box').html('Xoá thành công')
                        $('.deleted-'+idSP).html('Đã xoá')
                        $('#btnDelete-'+idSP).remove()
                    }
                    else $('#message-box').html('Xoá thất bại')

                    $('#message').modal('show')
                },
                error:function(){
                    alert('Error!')
                }
            })
        })
    })
})
</script>
@endsection