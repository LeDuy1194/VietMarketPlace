<?php
/**
 * Created by PhpStorm.
 * User: nobikun1412
 * Date: 27-Mar-17
 * Time: 05:35
 */
?>

<div class="col-xs-6 col-md-3 grid-products">
        <div class="card product">
            <div class="card-top-thumbnail">
                <img class="card-img-top img-feature-product" src="{{ asset('resources/upload/'.$type.'s/'.$type.'-'.$item->id.'/'.$item->img) }}" alt="VietMarketPlace">
            </div>
            <div class="card-block card-body-product">
                <a href="{{route($type.'Detail',$item->id)}}">
                    <h4 class="card-title title-product">{!! $item->name !!}</h4>
                </a>
                <!--            <p class="card-text short-desc-product"></p>-->
                <span class="card-cate-product card-left-text">
                <a href="{{route('listByCate',[$cate->id,'all'])}}">{!! $cate->name !!}</a>
            </span>
                <span class="card-price-product card-right-text">
                <h3>{!! number_format($item->price,0,",",".")." VNĐ" !!}</h3>
            </span>
            </div>
            <div class="card-footer card-footer-product">
            <span class="card-avatar-author card-left-text">
                <img src="{{ asset('resources/upload/user/'.$user->avatar) }}" class="media-object rounded-circle user-avatar"/>
            </span>
                <span class="card-name-author card-left-text">
                <div class="media-body">
					<a href="{!! url('profile', [$user->username]) !!}" >
                        <h5 class="media-heading"> {!! $user->username!!}</h5>
                    </a>
				</div>
            </span>
                <span class="card-rate-author card-right-text">
                <ul class="list-inline" name="rating">
					<li class="list-inline-item"><a class=""><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
					<li class="list-inline-item"><a class=""><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
					<li class="list-inline-item"><a class=""><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
					<li class="list-inline-item"><a class=""><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
					<li class="list-inline-item"><a class=""><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
				</ul>
            </span>
            </div>
        </div>
</div>