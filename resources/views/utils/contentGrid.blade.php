<?php
/**
 * Created by PhpStorm.
 * User: Anh Phạm
 * Date: 27-Mar-17
 * Time: 05:35
 */
?>
<div class="card col-xs-6 col-md-3 product-item @if($user->level == 1) card-vip-user @endif">
    <div class="card-top-thumbnail">
        <div class="feature-img-custom">
            <img class="card-img-top img-feature-product" src="{{ asset('resources/upload/'.$type.'s/'.$type.'-'.$item->id.'/'.$item->img) }}" alt="VietMarketPlace">
        </div>
        <div class="frame-hover-product w3-animate-top">
            <div class="button-area-product-item">
                <span class="btn favorite-product btn-for-product" title="Chi tiết">
                    <a class="button-view" href="{{route($type.'Detail',$item->id)}}">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                        <!-- <i class="fa fa-heart" aria-hidden="true"></i> -->
                    </a>
                </span>
                <span class="btn favorite-product btn-for-product" title="Xem sau">
                    <a class="button-fav" href="{{route('favorite',[$type,$item->id])}}">
                        @if ($fav == true)
                        <i class="fa fa-heart fa-lg" aria-hidden="true"></i>
                        @else
                        <i class="fa fa-heart-o fa-lg" aria-hidden="true"></i>
                        @endif
                    </a>
                </span>
            </div>
        </div>
    </div>
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
        <div class="status-tag <?php if ($item->status != 0) echo "old-tag"; ?>"><?php if ($item->status == 0) echo "HÀNG MỚI"; else echo "HÀNG CŨ";?></div>
        @if($user->level == 1)
        <div class="vip-tag">VIP</div>
        @endif
    </div>
    <div class="card-footer card-footer-product">
        @if(Route::current()->getName() == 'MyStore')
            <?php
                if ($type == 'stock') {
                    $match = $matchModel->getOrderNumber($item->id);
                }
                else {
                    $match = $matchModel->getStockNumber($item->id);
                }
            ?>
            <span class="card-name-author card-left-text">
                <div class="card-name-author-body">
                    <a class="btn btn-success btn-block" href="{{route('getMatch',[$type,$item->id])}}">
                        <h5 class="btn-for-my-store-custom">Match {!! $match !!}</h5>
                    </a>
                </div>
            </span>
            <span class="card-rate-author card-right-text">
                <a class="btn btn-danger btn-block" href="{{route('getDeleteProduct',[$type,$item->id])}}" name="" onclick="return confirmation('Có xóa {!! $item->name !!} không?')">
                    <h5 class="btn-for-my-store-custom">Xóa</h5>
                </a>
            </span>
        @else
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
        @endif
    </div>
</div>