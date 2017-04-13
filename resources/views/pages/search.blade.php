<!--
Author: Anh Pham
Create_at: 27/03/2017
-->

@extends('layouts.master')

@section('content')
    @include('utils.searchForm')
    <div class="container">
        @include('utils.message')
        <div class="row mt-2">
            @if (sizeof($articles['stocks']) != 0 )
            <div class="col-lg-12 p-0 m-0">
                <h2>Kho hàng</h2>
                @foreach($articles['stocks'] as $item)
                    <?php
                    $user = $userModel->getDetailUserByUserID($item->user_id);
                    $cate = $cateModel->getCateById($item->cate_id);
                    $vote = $reviewModel->getAverageVote($item->user_id);
                    ?>
                    @include('utils.contentTable',['item' => $item,'user' => json_decode($user),'cate' => json_decode($cate),'type' => 'stock','vote' => $vote])
                @endforeach
            </div>
            @endif
                @if (sizeof($articles['orders']) != 0 )
            <div class="col-lg-12 p-0 m-0">
                <h2>Đơn hàng</h2>
                @foreach($articles['orders'] as $item)
                    <?php
                    $user = $userModel->getDetailUserByUserID($item->user_id);
                    $cate = $cateModel->getCateById($item->cate_id);
                    $vote = $reviewModel->getAverageVote($item->user_id);
                    ?>
                    @include('utils.contentTable',['item' => $item,'user' => json_decode($user),'cate' => json_decode($cate),'type' => 'order','vote' => $vote])
                @endforeach
            </div>
                @endif
        </div>
    </div>
@endsection

@section('scripts')

@endsection