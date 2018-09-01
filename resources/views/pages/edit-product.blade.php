@extends('pages.layout')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <b>Cập nhật thông tin sản phẩm <i>{{$product->name}}</i></b>
    </div>
    <div class="panel-body">
        <form class="" action="">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$product->name}}">
                </div>
                <div class="form-group">
                    <label>Loại:</label>
                    <select name="type" class="form-control">
                        <option value="">ABC</option>
                        <option value="">ABC</option>
                        <option value="">ABC</option>
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
                        <label><input type="checkbox" name="status"> Special Product</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="checkbox">
                        <label><input type="checkbox" name="new"> New Product</label>
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
                        <textarea class="form-control" name="detail" rows="8">{{$product->detail}}</textarea>
                    </div>
                <div class="form-group">
                    <label>Promotion:</label>
                    <textarea class="form-control" id="name" name="promotion" rows="8">{{$product->promotion}}</textarea>
                </div>
            </div>
        </form>

    </div>
</div>
@endsection