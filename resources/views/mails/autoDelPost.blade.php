<?php
/**
 * Created by PhpStorm.
 * User: nobikun1412
 * Date: 04-Jun-17
 * Time: 17:17
 */
?>
@extends('mails.layout.master')
@section('content')
        <tr>
            <td style="font-size: 22px; text-align: left; padding: 10px 30px; padding-top: 20px;">
                Xin chào <strong>{{ $dataUser['username'] }}</strong>!,
            </td>
        </tr>
        <tr>
            <td style="padding: 10px 30px; font-size: 20px; text-align: left;">
                Bạn có 1 <?php if($dataType == 'stock') echo 'tin rao bán'; else echo 'tin tìm mua'; ?> cho <a href="http://vietmarketplace.dev/{{ $dataType }}-detail/{{ $dataPost->id }}"><strong>{{ $dataPost->name }}</strong></a> sắp hết hạn, vui lòng kiểm tra lại!
            </td>
        </tr>
        {{--<tr>--}}
            {{--<td style="text-align:center;font-size:0" align="center">--}}
                {{--<a href="#" style="color:#2752ff;text-decoration:none" target="_blank">--}}
                    {{--<img src="#">--}}
                {{--</a>--}}
            {{--</td>--}}
        {{--</tr>--}}
        <tr>
            <td style="text-align:center;padding: 20px 30px;" align="center">
                <a style="border-radius:3px;color:#ffffff;display:inline-block;font-size:18px;font-weight:bold;padding: 6px 20px;text-decoration:none;text-align:center;background-color: #5CB85C;" href="http://vietmarketplace.dev/{{ $dataType }}-detail/{{ $dataPost->id }}" target="_blank">
                    Chi tiết
                </a>
            </td>
        </tr>
@endsection
