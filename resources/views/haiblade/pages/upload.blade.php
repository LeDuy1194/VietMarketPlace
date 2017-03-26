@extends('layouts.master')
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
							<select class="form-control" id="hang" name="hang" >
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
										<option selected value="Mới">Mới</option>
										<option value="Cũ">Cũ</option>
									</select>
								</div>
							</div>
						</div>
						<br>
						<hr>
						<br>
						<div class="form-group">
							<label>
								Tên Vật Phẩm*
							</label>
							<input type="text" name="itemname" class="form-control" placeholder="Điền vào đây" required>
						</div>
						<div class="form-group">
							<label>
								Mô Tả*
							</label>
							<textarea name="discription" rows="5" cols="50" class="form-control" placeholder="Điền vào đây" style="resize: none;"></textarea>
						</div>
						<div class="form-group">

							<label>
								Giá *
							</label>
							<input type="number" name="price" class="form-control" placeholder="Điền vào đây (Đơn vị VND)" required>
						</div>
						<div class="form-group">

							<label>
								Địa Chỉ *
							</label>
							<input type="text" name="address" class="form-control" placeholder="Địa Chỉ" required>
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
							<input type="file" name="imagemain" required>
                            <br>
                            <label>Hình Chi tiết 1</label>
                            <input type="file" name="imagedetail1" required>
                            <br>
                            <label>Hình Chi tiết 2</label>
                            <input type="file" name="imagedetail2" required>
                            <br>
                            <label>Hình Chi tiết 3</label>
                            <input type="file" name="imagedetail3" required>
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