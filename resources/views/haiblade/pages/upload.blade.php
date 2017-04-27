@extends('layouts.master')
@section('meta-title')
	Upload
@endsection
@section('content')
<div class="container-fluid">
    <br>
    <div class="row">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{url('/')}}">Trang Chủ</a>
                </li>
                <li class="breadcrumb-item active">
                    Đăng Tin
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
    	@include('utils.message')
        <div class="col-md-8">
            <div class="card">
                <div class="card-block">
                    <h3 class="text-left">
                        Thông Tin Vật Phẩm
                    </h3>
                    <hr>
                    <form role="form" action="{!!route('getupload')!!}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{!!csrf_token()!!}">
                        <br>
                        <div class="form-group">
                            <label>
                                Chọn Phần Mục *
                            </label>
                            <select class="form-control" id="prtcate" name="prtcate" >
                                <option selected value="Kho Hàng">Kho Hàng</option>
                                <option value="Đơn Hàng">Đơn Hàng</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>
                                        Chọn Danh mục *
                                    </label>
                                    <select class="form-control" name="cate">
                                        <option value="1">Điện thoại</option>
                                        <option value="2">Máy tính</option>
                                        <option value="3">Sách</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>
                                        Chọn Tình Trạng *
                                    </label>
                                    <select class="form-control" id="status" name="status" >
                                        <option selected value="0">Mới</option>
                                        <option value="1">Cũ</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        <hr>
                        <br>
                        <div class="form-group">
                            <label for="itemname">
                                Tên Vật Phẩm*
                            </label>
                            <input type="text" name="itemname" class="form-control" placeholder="Điền vào đây" required id="itemname">
                        </div>
                        <div class="form-group">
                            <label for="discription">
                                Mô Tả*
                            </label>
                            <textarea name="discription" rows="5" cols="50" class="form-control" placeholder="Điền vào đây" style="resize: none;" id="discription"></textarea>
                        </div>
                        <div class="form-group">

                            <label for="price">
                                Giá (Tối thiểu 10.000 VNĐ)*
                            </label>
                            <input type="number" id="price" name="price" min="10000" class="form-control" placeholder="Điền vào đây (Đơn vị VND)" required>
                        </div>
                        <div class="form-group">

                            <label>
                                Địa Chỉ *
                            </label>
                            <input type="text" name="address" class="form-control" placeholder="Đường" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>
                                        Thành Phố *
                                    </label>
                                    <select class="form-control" name="ct" required>
                                        <option value="0">Chọn</option>
                                        @foreach($city as $item)
                                            <option value="{!! $item["name"] !!}">{!! $item["name"] !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>
                                        Quận *
                                    </label>
                                    <select class="form-control" name="dt" required>
                                        <option value="0">Chọn</option>
                                        @foreach($district as $item)
                                            <option value="{!! $item["name"] !!}">{!! $item["name"] !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        <hr>
                        <br>
                        <div class="form-group">
                            <label>
                                Đăng Hình Ảnh
                            </label>
                            <br>
                            <label>Hình Đại Diện Sản Phẩm</label>
                            <input type="file" name="image-main" onchange="readURL(this);" required>
                            <img id="image-main-preview" src="#" alt="Ảnh" />
                            <br>
                            <label>Hình Chi tiết 1</label>
                            <input type="file" name="image-detail-1" onchange="readURL(this);" required>
                            <img id="image-detail-1-preview" src="#" alt="Ảnh" />
                            <br>
                            <label>Hình Chi tiết 2</label>
                            <input type="file" name="image-detail-2" onchange="readURL(this);" required>
                            <img id="image-detail-2-preview" src="#" alt="Ảnh" />
                            <br>
                            <label>Hình Chi tiết 3</label>
                            <input type="file" name="image-detail-3" onchange="readURL(this);" required>
                            <img id="image-detail-3-preview" src="#" alt="Ảnh" />
                        </div>
                        <br>
                        <hr>
                        <br>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" required> Tôi đã đọc các điều lệ
                            </label>
                        </div>
                        <button type="submit" class="btn btn-block btn-pf">
                            Gửi
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-block">
                    <h3 class="text-left">
                        Matching
                    </h3>
                    <hr>
                    <div id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="card">
                            <div class="card-header" role="tab" id="headingOne">
                                <h5 class="mb-0">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Kho Hàng
                                    </a>
                                </h5>
                            </div>

                            <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                                <div class="card-block">
                                    <div class="card" style="width: 20rem;">
                                        <img class="card-img-top" src="{{url('public/img/1.png')}}" alt="Card image cap">
                                        <div class="card-block">
                                            <h4 class="card-title">Card title</h4>
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                            <a href="#" class="btn btn-primary">Go somewhere</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" role="tab" id="headingTwo">
                                <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Đơn Hàng
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="card-block">
                                    None
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
</div>
@endsection()
@section('scripts')

{{--http://jsbin.com/uboqu3/1/edit?html,js,output--}}
{{--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>--}}
<!--[if IE]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $("#" + input.name + "-preview")
                    .attr('src', e.target.result)
                    .width(150)
                    .height(auto);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#price").focus(function() {
    	$('#price').placeholder('testing');
    });
</script>
@endsection()