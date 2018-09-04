@extends('pages.layout')
@section('content')
<script src="ckeditor/ckeditor.js"></script>
<div class="panel panel-default">
    <div class="panel-heading">
        <b>Thêm mới sản phẩm</b>
    </div>
    <div class="panel-body">
        <form method="POST" action="{{route('post-add-product')}}" enctype="multipart/form-data">
            @csrf
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label>Loại:</label>
                    <select name="type" class="form-control" required>
                        @foreach($menu as $m)
                        <option value="{{$m->id}}">{{$m->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Price:</label>
                    <input type="text" class="form-control" id="name" name="price" placeholder="Price" required>
                </div>
                <div class="form-group">
                    <label>Promotion Price:</label>
                    <input type="text" class="form-control" id="name" name="promotion_price" required value="0">
                </div>

                <div class="form-group">
                    <div class="checkbox">
                    <label><input type="checkbox" name="status" value="1"> Special Product</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="checkbox">
                        <label><input type="checkbox" name="new" value="1"> New Product</label>
                    </div>
                </div>
                <div class="form-group">
                    <input type="file" name="image" required>
                </div>

                <button type="submit" class="btn btn-primary">Add</button>
            
            </div>
            <div class="col-sm-6">
                    <div class="form-group">
                        <label>Detail:</label>
                        <textarea class="form-control" name="detail" rows="8" id="detail"></textarea>
                    </div>
                <div class="form-group">
                    <label>Promotion:</label>
                    <textarea class="form-control" name="promotion" rows="8" id="promotion"></textarea>
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