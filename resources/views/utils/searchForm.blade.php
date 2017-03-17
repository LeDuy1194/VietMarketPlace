<!--Created by: Nguyen Le Duy
Date: 17/02/2017
-->

<div class="container-fluid search mt-2">
  <form class="form-inline">
  	<input type="hidden" name="_token" value="{!!csrf_token()!!}"/>
	<div class="form-group">
	  <input type="text" class="form-control" id="search-keyword" placeholder="Từ khóa tìm kiếm..."/>
	</div>
	
	<div class="form-group">
	  <select class="form-control" id="search-category">
		<option value="all" selected>Categories</option>
		<option disabled>──────────</option>
		<option value="computer">Máy tính</option>
		<option value="cellphone">Điện thoại</option>
		<option value="book">Sách</option>
	  </select>
	</div>
		
	<div class="form-group">
	  <select class="form-control" id="search-status">
		<option value="all" selected>Trạng thái</option>
		<option disabled>──────────</option>
		<option value="new">Mới</option>
		<option value="secondhand">Đồ cũ</option>
	  </select>
	</div>
	
    <div class="form-group">
	  <select class="form-control" id="search-rate">
		<option value="all" selected>Đánh giá</option>
		<option disabled>──────</option>
		<option value="1">1 sao</option>
		<option value="2">2 sao</option>
		<option value="3">3 sao</option>
		<option value="4">4 sao</option>
		<option value="5">5 sao</option>
	  </select>
	</div>
	
	<div class="form-group">
	  <select class="form-control" id="search-city">
		<option value="all" selected>Thành phố</option>
		<option disabled>──────────</option>
		<option value="hcm">Ho Chi Minh</option>
		<option value="hn">Ha Noi</option>
		<option value="hp">Hai Phong</option>
		<option value="dn">Dong Nai</option>
		<option value="bd">Binh Duong</option>
	  </select>
	</div>
	
	<div class="form-group">
	  <input type="submit" class="form-control" id="search-submit" value="Tìm kiếm"/>
	</div>
  </form>
</div>