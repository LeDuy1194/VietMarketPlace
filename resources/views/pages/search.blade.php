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
        <div class="row mt-2">
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
            <div class="col-lg-12 p-0 m-0 tab-content tab-content-custom">
                <div class="tab-pane active" id="listStock" role="tabpanel">
                    <?php $page = $articles['stocks']; ?>
                    @foreach($articles['stocks'] as $item)
                        <?php
                        $user = $userModel->getDetailUserByUserID($item->user_id);
                        $cate = $cateModel->getCateById($item->cate_id);
                        $vote = $reviewModel->getAverageVote($item->user_id);
                        ?>
                        @include('utils.contentTable',['item' => $item,'user' => json_decode($user),'cate' => json_decode($cate),'type' => 'stock','vote' => $vote])
                    @endforeach
                </div>
                <div class="tab-pane" id="listOrder" role="tabpanel">
                    <?php $page = $articles['orders'];?>
                    @foreach($articles['orders'] as $item)
                        <?php
                        $user = $userModel->getDetailUserByUserID($item->user_id);
                        $cate = $cateModel->getCateById($item->cate_id);
                        $vote = $reviewModel->getAverageVote($item->user_id);
                        ?>
                        @include('utils.contentTable',['item' => $item,'user' => json_decode($user),'cate' => json_decode($cate),'type' => 'order','vote' => $vote])
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection