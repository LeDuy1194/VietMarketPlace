<!--Created by: Nguyen Le Duy
Date: 17/02/2017
update: 03-05-2017 by Anh Pham
-->

<div class="container search-custom">
	<div class="row search-bar-home">
		<form class="form-inline justify-content-center form-search-custom" action="search" method="get">
			<input type="hidden" name="_token" value="{!!csrf_token()!!}"/>
			<div class="form-group">
				<input type="text" class="form-control" id="search-keyword" name="search_key" placeholder="Từ khóa tìm kiếm..."/>
			</div>

			<div class="form-group">
				<select class="form-control" id="search-type" name="search_type">
					<option value="" selected>Loại hàng</option>
					<option disabled>──────────</option>
					<option value="stocks">Kho hàng</option>
					<option value="orders">Đơn hàng</option>
				</select>
			</div>

			<div class="form-group">
				<select class="form-control" id="search-category" name="search_cate">
					<option value="" selected>Danh Mục</option>
					<option disabled>──────────</option>
					<option value="2">Máy tính</option>
					<option value="1">Điện thoại</option>
					<option value="3">Sách</option>
				</select>
			</div>

			<div class="form-group">
				<select class="form-control" id="search-status" name="search_status">
					<option value="" selected>Tình Trạng</option>
					<option disabled>──────────</option>
					<option value="0">Mới</option>
					<option value="1">Cũ</option>
				</select>
			</div>

			{{--<div class="form-group">--}}
			{{--<select class="form-control" id="search-rate" name="search_rate">--}}
			{{--<option value="" selected>Đánh giá</option>--}}
			{{--<option disabled>──────</option>--}}
			{{--<option value="1">*</option>--}}
			{{--<option value="2">**</option>--}}
			{{--<option value="3">***</option>--}}
			{{--<option value="4">****</option>--}}
			{{--<option value="5">*****</option>--}}
			{{--</select>--}}
			{{--</div>--}}

			<div class="form-group">
				<select class="form-control" id="search-city" name="search_city">
					<option value="" selected>Thành phố</option>
					<option disabled>──────────</option>
					<option value="hcm">Ho Chi Minh</option>
					<option value="hn">Ha Noi</option>
					<option value="hp">Hai Phong</option>
					<option value="dn">Dong Nai</option>
					<option value="bd">Binh Duong</option>
				</select>
			</div>

			<div class="form-group">
				<input type="submit" class="btn btn-primary form-control" id="search-submit" value="Tìm kiếm"/>
			</div>
		</form>
	</div>
</div>