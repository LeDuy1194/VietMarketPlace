@extends('admin.master')
@section('controller')Category
@endsection
@section('action')Thêm
@endsection
@section('content')
<div class="col-lg-7 col-sm-12">
    @include('errors.input')
    <form action="{!!route('admin.cate.getAdd')!!}" method="POST">
        <input type="hidden" name="_token" value="{!!csrf_token()!!}"/>
        <div class="form-group">
            <label>Category Chính</label>
            <select class="form-control" name="sltParent">
                <option value="0">Chọn Category</option>
                <?php cate_parent($parent,0,"--",old('sltParent')); ?>
            </select>
        </div>
        <div class="form-group">
            <label>Tên Category</label>
            <input class="form-control" name="txtCateName" placeholder="Xin nhập tên Category" value="{!! old('txtCateName') !!}"/>
        </div>
        <div class="form-group">
            <label>Thứ tự Category</label>
            <input class="form-control" name="txtOrder" placeholder="Xin nhập thứ tự Category"  value="{!! old('txtOrder') !!}"/>
        </div>
        <button type="submit" class="btn btn-default">Thêm Category</button>
        <button type="reset" class="btn btn-default">Reset</button>
    </form>
</div>
@endsection