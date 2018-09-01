@extends('pages.layout')
@section('content')
<script src="ckeditor/ckeditor.js"></script>
<div class="panel panel-default">
    <div class="panel-heading">
        <b>Cập nhật thông tin sản phẩm <i>{{$product->name}}</i></b>
    </div>
    <div class="panel-body">
        <form method="POST" action="{{route('post-edit-product',$product->id)}}" enctype="multipart/form-data">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$product->name}}">
                </div>
                <div class="form-group">
                    <label>Loại:</label>
                    <select name="type" class="form-control">
                        @foreach($menu as $m)
                        <option value="{{$m->id}}" @if($product->id_type==$m->id) selected @endif>{{$m->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Price:</label>
                    <input type="text" class="form-control" id="name" name="price" value="{{$product->price}}">
                </div>
                <div class="form-group">
                    <label>Promotion Price:</label>
                    <input type="text" class="form-control" id="name" name="promotion_price" value="{{$product->promotion_price}}">
                </div>

                <div class="form-group">
                    <div class="checkbox">
                    <label><input type="checkbox" name="status" @if($product->status==1) checked @endif value="1"> Special Product</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="checkbox">
                        <label><input type="checkbox" name="new"  @if($product->new==1) checked @endif value="1"> New Product</label>
                    </div>
                </div>
                <div class="form-group">
                    <img src="admin-master/img/products/{{$product->image}}" height="100px">
                    <br><br>
                    <input type="file" name="image">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            
            </div>
            <div class="col-sm-6">
                    <div class="form-group">
                        <label>Detail:</label>
                        <textarea class="form-control" name="detail" rows="8" id="detail">{{$product->detail}}</textarea>
                    </div>
                <div class="form-group">
                    <label>Promotion:</label>
                    <textarea class="form-control" name="promotion" rows="8" id="promotion">{{$product->promotion}}</textarea>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    CKEDITOR.replace('detail')
    CKEDITOR.replace('promotion')
</script>
@endsection