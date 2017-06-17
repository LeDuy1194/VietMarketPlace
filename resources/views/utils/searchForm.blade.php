<!--Created by: Nguyen Le Duy
Date: 17/02/2017
update: 03-05-2017 by Anh Pham
-->

<div class="container search-custom">
	<div class="row search-bar-home">
		<form class="form-inline justify-content-center form-search-custom" action="{{route('search')}}" method="get">
			<input type="hidden" name="_token" value="{!!csrf_token()!!}"/>
			<div class="form-group form-group-custom form-group-key">
				<input type="text" class="form-control" id="search-keyword" name="search_key" placeholder="Từ khóa tìm kiếm..."/>
			</div>

			<div class="form-group form-group-custom form-group-select-custom form-group-type">
				<select class="form-control" id="search-type" name="search_type">
					<option value="" selected>Loại hàng</option>
					<option disabled>──────────</option>
					<option value="stocks">Tin rao bán</option>
					<option value="orders">Tin tìm mua</option>
				</select>
			</div>

			<div class="form-group form-group-custom form-group-select-custom form-group-cate">
				<select class="form-control" id="search-category" name="search_cate">
					<option value="" selected>Danh Mục</option>
					<option disabled>──────────</option>
					<option value="2">Máy tính</option>
					<option value="1">Điện thoại</option>
					<option value="3">Sách</option>
				</select>
			</div>

			<div class="form-group form-group-custom form-group-select-custom form-group-status">
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

			<div class="form-group form-group-custom form-group-select-custom form-group-city">
				<select class="form-control" id="search-city" name="search_city">
					<option value="" selected>Thành phố</option>
					<option disabled>──────────</option>
					<option value="hcm">Hồ Chí Minh</option>
					{{--<option value="hn">Hà Nội</option>
					<option value="hp">Hải Phòng</option>
					<option value="dn">Đồng Nai</option>
					<option value="bd">Bình Dương</option>--}}
				</select>
			</div>

			<div class="form-group form-group-custom form-group-btn-search">
				<input type="submit" class="btn btn-primary form-control search-submit-custom" id="search-submit" value="Tìm kiếm"/>
			</div>
		</form>
	</div>
</div>