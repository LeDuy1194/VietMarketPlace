<!--Created by: Nguyen Le Duy
Date: 17/02/2017
Update: 03-05-2017 by Bi Pham
-->
<?php
//dd($cate);
?>
@if(Route::current()->getName() == 'MyStore')
	<div class="row-fluid outer-banner-custom img-banner-store-custom parallax">
		<div class="middle-banner-custom">
			<div class="welcome-store-custom inner-banner-custom">
				<div class="title-welcome title-banner-custom">
					CHÀO MỪNG BẠN ĐẾN VỚI
				</div>
				<div class="name-store-welcome name-banner-custom">
					CỬA HÀNG - VIỆT MARKETPLACE
				</div>
				<div class="content-store content-banner-custom">
					Đây là nơi bạn có thể quản lý tất cả các tin rao vặt mua hoặc bán của bạn một cách dễ dàng và trực quan!
				</div>
			</div>
		</div>
	</div>
@elseif(Route::current()->getName() == 'myMark')
	<div class="row-fluid outer-banner-custom img-banner img-banner-wish-custom parallax">
		<div class="middle-banner-custom">
			<div class="welcome-wish-page-custom inner-banner-custom welcome-custom">
				<div class="name-wish-page-welcome title-page-custom name-banner-custom">
					Danh sách xem sau
				</div>
			</div>
		</div>
	</div>
@elseif(Route::current()->getName() == 'getMatch')
	<div class="row-fluid img-banner outer-banner-custom img-banner-matching-custom parallax">
		<div class="middle-banner-custom">
			<div class="welcome-matching-page-custom inner-banner-custom welcome-custom">
				<div class="name-matching-page-welcome title-page-custom name-banner-custom">
					Matching
				</div>
			</div>
		</div>
	</div>
@elseif(Route::current()->getName() == 'search')
	<div class="row-fluid img-banner outer-banner-custom img-banner-search-result-custom parallax">
		<div class="middle-banner-custom">
			<div class="search-result-page-custom inner-banner-custom welcome-custom">
				<div class="name-search-result-page-welcome title-page-custom name-banner-custom">
					Kết quả tìm kiếm cho: "{!! $key_search !!}"
				</div>
			</div>
		</div>
	</div>
@elseif(Route::current()->getName() == 'listByCate')
        @if ($id != 0)
        <?php
        $bg = array('dt-bg.jpg', 'mt-bg-01.jpg', 'sach-bg.jpg');
        $id_cate = $cate->id - 1;
        $selectedBg = "$bg[$id_cate]";
        ?>
        <div class="row-fluid outer-banner-custom img-banner img-banner-list-cate-custom parallax"
             style="background-image: url('/public/img/<?php echo $selectedBg; ?>');
                    background-attachment: fixed;
                    background-position: center;
                    background-repeat: no-repeat;
                    background-size: cover;
                    ">
            <div class="middle-banner-custom">
                <div class="welcome-list-cate-page-custom inner-banner-custom welcome-custom">
                    <div class="name-list-cate-page-welcome title-page-custom name-banner-custom">
                        <?php echo $cate->name; ?>
                    </div>
                </div>
            </div>
        </div>
        @else
            <div class="row-fluid outer-banner-custom img-banner img-banner-list-cate-custom parallax"
                 style="background-image: url('/public/img/bg-search.jpg');
                         background-attachment: fixed;
                         background-position: center;
                         background-repeat: no-repeat;
                         background-size: cover;
                         ">
                <div class="middle-banner-custom">
                    <div class="welcome-list-cate-page-custom inner-banner-custom welcome-custom">
                        <div class="name-list-cate-page-welcome title-page-custom name-banner-custom">
                            Tất cả sản phẩm
                        </div>
                    </div>
                </div>
            </div>
        @endif
@else
	<div class="row-fluid outer-banner-custom img-banner-home-custom parallax">
		<div class="middle-banner-custom">
			<div class="welcome-web-custom inner-banner-custom">
				<div class="title-welcome title-banner-custom">
					CHÀO MỪNG BẠN ĐẾN VỚI
				</div>
				<div class="name-website-welcome name-banner-custom">
					VIỆT MARKETPLACE
				</div>
				<div class="content-welcome content-banner-custom">
					Website đăng tin rao vặt miễn phí, đảm bảo bán được hàng nhanh nhất!
				</div>
			</div>
		</div>
	</div>
@endif


