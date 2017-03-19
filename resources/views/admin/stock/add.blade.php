@extends('admin.master')
@section('controller')Kho hàng
@endsection()
@section('action')Thêm
@endsection()
@section('content')
<div class="col-lg-7" style="padding-bottom:120px">
    <form action="{!!route('admin.stock.getAdd')!!}" method="POST" enctype="multipart/form-data" name="data-form">
        @include('errors.input')
        <input type="hidden" name="_token" value="{!!csrf_token()!!}"/>
        <div class="form-group">
            <label>Category</label>
            <select class="form-control" name="sltParent">
                <option value="">Chọn Category</option>
                <?php cate_parent($cate,0,"--",old('sltParent')); ?>
            </select>
        </div>
        <div class="form-group">
            <label>Hình ảnh</label>
            <input type="file" name="fImages"  value="{!! old('txtCateName') !!}"/>
        </div>
        <div class="form-group">
            <label>Trạng thái</label>
            <label class="radio-inline">
                <input name="rdoStatus" value="new" checked="" type="radio">Mới
            </label>
            <label class="radio-inline">
                <input name="rdoStatus" value="second-hand" type="radio">Đồ cũ
            </label>
        </div>
        <div class="form-group">
            <label>Tên sản phẩm</label>
            <input class="form-control" name="txtName" placeholder="Xin nhập tên sản phẩm"  value="{!! old('txtName') !!}"/>
        </div>
        <div class="form-group">
            <label>Giá</label>
            <input class="form-control" name="txtPrice" placeholder="Xin nhập giá sản phẩm"  value="{!! old('txtPrice') !!}"/>
        </div>
        <div class="form-group">
            <label>Địa điểm</label>
            <input class="form-control" name="txtPlace" placeholder="Xin nhập địa điểm bán hàng"  value="{!! old('txtPlace') !!}"/>
        </div>
        <div class="form-group">
            <label>Miêu tả</label>
            <textarea class="form-control" rows="3" name="txtDescription">{!! old('txtDescription') !!}</textarea>
        </div>
        <button type="submit" class="btn btn-default">Thêm sản phẩm</button>
        <button type="reset" class="btn btn-default">Reset</button>
    </form>
</div>
<div class="col-lg-5">
        @for ($i = 1; $i <= 5; $i++)
        <div class="form-group">
            <label>Hình ảnh chi tiết {!! $i !!}</label>
            <input type="file" name="fStockDetail[]" form="data-form" />
        </div>
        @endfor
</div>
@endsection()