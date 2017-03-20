<!--
Created by: Nguyen Le Duy
Date: 17/02/2017
-->

@extends('layouts.master')

@section('content')
	@include('utils.advertise')
	<div class="container-fluid">
		<div class="row mt-2">
			<div class="col-lg-2">
				<div class="row">
					<div class="col-lg-6 col-sm-6 p-0 m-0">
						<button id="btnStock" type="button" onclick="" class="btn btn-primary btn-block active">Kho hàng</button>
					</div>
					<div class="col-lg-6 col-sm-6 p-0 m-0">
						<button id="btnOrder" type="button" onclick="" class="btn btn-primary btn-block">Đơn hàng</button>
					</div>
				</div>
				<a class="btn btn-secondary btn-lg btn-block mt-2" data-toggle="collapse" href="#collapseSidebar" aria-expanded="true" aria-controls="collapseSidebar"><h5>Catagories</h5></a>
				<div class="collapse show" id="collapseSidebar">
					<ul class="nav flex-column">
						<li class="nav-item">
							<a class="nav-link" href="#" focus>Máy tính</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Điện thoại</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Sách</a>
						</li>
					</ul>
				</div>
				<div class="col-lg-12 col-sm-12 m-0 p-0">
				</div>
				
			</div>
			<div class="col-lg-10">

				<!--Updated by: Duy
				Date: 23/02/2017
				Chỉnh lại bảng chứa dữ liệu.
				-->
				@for($i = 0; $i < 10; $i++)
				@include('utils.contentTable')
				@endfor

				<nav aria-label="Page navigation example">
					<ul class="pagination">
						<li class="page-item active"><a class="page-link" href="#">1</a></li>
						<li class="page-item"><a class="page-link" href="#">2</a></li>
						<li class="page-item"><a class="page-link" href="#">3</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
@endsection

@section('scripts')

@endsection