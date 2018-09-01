<div class="row">
    <div class="col-sm-4 col-sm-offset-4">
        @if(Session::has('error'))
        <div class="alert alert-danger  alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{Session::get('error')}}
        </div>
        @endif
        @if(Session::has('success'))
        <div class="alert alert-success  alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{Session::get('success')}}
        </div>
        @endif
    </div> 
</div>