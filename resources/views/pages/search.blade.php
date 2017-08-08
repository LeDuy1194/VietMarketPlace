<!--
Author: Anh Pham
Create_at: 27/03/2017
-->

@extends('layouts.master')
@section('meta-title')
    Search
@endsection
@section('content')
    @include('utils.advertise', ['key_search' => $key_search])
    @include('utils.searchForm')
    <div class="container">
        @include('utils.message')
        <ul class="nav nav-pills list-tab-custom" id="list-cate-tabs" role="tablist">
            <li class="nav-item nav-custom">
                <a class="nav-link active" href="#listStock" name="btnStock">Tin rao bán
                    <span class="badge badge-danger">{!! sizeof($articles['stocks']) !!}</span>
                </a>
            </li>
            <li class="nav-item nav-custom">
                <a class="nav-link" href="#listOrder" name="btnOrder">Tin tìm mua
                    <span class="badge badge-danger">{!! sizeof($articles['orders']) !!}</span>
                </a>
            </li>
        </ul>
        <div class="tab-content tab-content-custom">
            <div class="row tab-pane active" id="listStock" role="tabpanel">
                <?php $page = $articles['stocks']; ?>
                @foreach($articles['stocks'] as $item)
                    <?php
                    $user = $userModel->getDetailUserByUserID($item->user_id);
                    $cate = $cateModel->getCateById($item->cate_id);
                    $vote = $reviewModel->getAverageVote($item->user_id);
                    if ($author != NULL) {
                        $fav = $favModel->getFav($author->id,$item->id);
                        $fav != NULL ? $favCheck = true : $favCheck = false;
                    }
                    else {
                        $favCheck = false;
                    }
                    ?>
                    @include('utils.contentGrid',['item' => $item,'user' => json_decode($user),'cate' => json_decode($cate),'type' => 'stock','vote' => $vote,'fav' => $favCheck])
                @endforeach
            </div>
            <div class="row tab-pane" id="listOrder" role="tabpanel">
                <?php $page = $articles['orders'];?>
                @foreach($articles['orders'] as $item)
                    <?php
                    $user = $userModel->getDetailUserByUserID($item->user_id);
                    $cate = $cateModel->getCateById($item->cate_id);
                    $vote = $reviewModel->getAverageVote($item->user_id);
                    if ($author != NULL) {
                        $fav = $favOModel->getFav($author->id,$item->id);
                        $fav != NULL ? $favCheck = true : $favCheck = false;
                    }
                    else {
                        $favCheck = false;
                    }
                    ?>
                    @include('utils.contentGrid',['item' => $item,'user' => json_decode($user),'cate' => json_decode($cate),'type' => 'order','vote' => $vote,'fav' => $favCheck])
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection