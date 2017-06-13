{{--
 * Created by: Le Duy
 * Date: 13/06/2017
 --}}
@extends('mails.layout.master')
@section('content')
        <tr>
            <td style="font-size: 22px; text-align: left; padding: 10px 30px; padding-top: 20px;">
                Xin chào <strong>{{ $dataUser['username'] }}</strong>,
            </td>
        </tr>
        <tr>
            <td style="padding: 10px 30px; font-size: 20px; text-align: left;">
            	Xin bạn vui lòng kích hoạt tài khoản:<br>
            </td>
        </tr>
        <tr>
            <td style="text-align:center;padding: 10px 30px;" align="center">
                <a style="border-radius:3px;color:#ffffff;display:inline-block;font-size:20px;font-weight:bold;padding: 10px 20px;text-decoration:none;text-align:center;background-color: #5CB85C;" href="{{$dataLink}}" target="_blank">
                    Kích hoạt
                </a>
            </td>
        </tr>
        <tr>
            <td style="padding: 10px 30px; font-size: 15px; text-align: left;">
            	Hoặc bạn có thể sao chép đường dẫn dưới đây vào trình duyệt web của bạn:<br>
                <a href="{{$dataLink}}">{{ $dataLink }}</a><br>
            </td>
        </tr>
@endsection
