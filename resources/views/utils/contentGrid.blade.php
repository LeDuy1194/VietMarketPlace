<?php
/**
 * Created by PhpStorm.
 * User: Anh Phạm
 * Date: 27-Mar-17
 * Time: 05:35
 */
?>
<div class="card col-xxs-12 col-xs-6 col-sm-6 col-md-3 product-item">
    <div class="card-top-thumbnail">
        <img class="card-img-top img-feature-product" src="{{ asset('resources/upload/'.$type.'s/'.$type.'-'.$item->id.'/'.$item->img) }}" alt="VietMarketPlace">
    </div>
<?php 
// dd($item); 
?>
    <div class="card-block card-body-product">
        <span class="name-product">
            <a href="{{route($type.'Detail',$item->id)}}">
                <h4 class="card-title title-product">{!! $item->name !!}</h4>
            </a>
        </span>
        <!--            <p class="card-text short-desc-product"></p>-->
        <span class="card-cate-product card-left-text">
                <a href="{{route('listByCate',[$cate->id,'all'])}}">{!! $cate->name !!}</a>
            </span>
        <span class="card-addr-text">
                {!! $item->district !!}, {!! $item->city !!}
        </span>
        <span class="card-price-product card-center-text">
                <h3 class="price-product-item">{!! number_format($item->price,0,",",".") !!}</h3>
			    <sup class="currency-price">đ</sup>
        </span>
        <div class="status-tag <?php if ($item->status != 0) echo "old-tag"; ?>"><?php if ($item->status == 0) echo "MỚI"; else echo "CŨ";?></div>
    </div>
    <div class="card-footer card-footer-product">
            <span class="card-avatar-author card-left-text">
                <img src="{{ asset('resources/upload/user/'.$user->avatar) }}" class="media-object rounded-circle user-avatar"/>
            </span>
        <span class="card-name-author card-left-text">
                <div class="card-name-author-body">
					<a href="{!! url('profile', [$user->username]) !!}" >
                        <h5 class="name-author"> {!! $user->username!!}</h5>
                    </a>
				</div>
            </span>
        <span class="card-rate-author card-right-text">
                <h5><i class="fa fa-thumbs-up" aria-hidden="true"></i> {!! number_format($vote*100,0) !!}&#37</h5>
            </span>
    </div>
</div>