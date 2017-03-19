@extends('admin.master')
@section('controller')Category
@endsection()
@section('action')Sửa
@endsection()
@section('content')
<div class="col-lg-7 col-sm-12" style="padding-bottom:120px">
    @include('errors.input')
    <form action="" method="POST">
        <input type="hidden" name="_token" value="{!!csrf_token()!!}"/>
        <div class="form-group">
            <label>Category Chính</label>
            <select class="form-control" name="sltParent">
                <option value="0">Chọn Category</option>
                <?php cate_parent($parent,0,"--",$data['parent_id']); ?>
            </select>
        </div>
        <div class="form-group">
            <label>Tên Category</label>
            <input class="form-control" name="txtCateName" placeholder="Xin nhập tên Category" value="{!! old('txtCateName',isset($data) ? $data['name'] : null) !!}" />
        </div>
        <div class="form-group">
            <label>Thứ tự Category</label>
            <input class="form-control" name="txtOrder" placeholder="Xin nhập thứ tự Category" value="{!! old('txtOrder',isset($data) ? $data['order'] : null) !!}" />
        </div>
        <button type="submit" class="btn btn-default">Sửa Category</button>
        <button type="reset" class="btn btn-default">Reset</button>
    </form>
</div>
@endsection()
