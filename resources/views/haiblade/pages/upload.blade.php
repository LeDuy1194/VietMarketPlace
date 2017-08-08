@extends('layouts.master')
@section('css')
    <link rel="stylesheet" href="{{asset('public/css/client/upload.css')}}">
@endsection
@section('content')
        <div class="row-fluid img-banner-upload-custom parallax">
            {{--	<img class="banner-home-custom" src="{{url('/public/img/header/14.jpg')}}" alt="">--}}
            <div class="welcome-upload-custom welcome-custom">
                <div class="title-page-custom">
                    Đăng tin
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{url('/')}}">Trang Chủ</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Đăng Tin
                    </li>
                </ul>
            </div>
        </div>
        <div class="container upload-page-custom">
                @include('utils.message')
                <form class="row" role="form" action="{!!route('getupload')!!}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{!!csrf_token()!!}">
                    <div class="col-md-6 col-xs-12 col-info-upload">
                        <div class="card upload-product-custom">
                            <div class="card-header">
                                <h3 class="text-left">
                                    Thông Tin Vật Phẩm
                                </h3>
                            </div>
                            <div class="card-block">
                                    <div class="form-content">
                                        <div class="form-group">
                                            <label>
                                                Chọn Loại Tin *
                                            </label>
                                            <select class="form-control" id="prtcate" name="prtcate" >
                                                <option selected value="stock">Tin rao bán</option>
                                                <option value="order">Tin tìm mua</option>
                                            </select>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>
                                                        Chọn Danh mục *
                                                    </label>
                                                    <select class="form-control" id="cate" name="cate">
                                                        <option value="1">Điện thoại</option>
                                                        <option value="2">Máy tính</option>
                                                        <option value="3">Sách</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>
                                                        Chọn Tình Trạng *
                                                    </label>
                                                    <select class="form-control" id="status" name="status" >
                                                        <option selected value="0">Mới</option>
                                                        <option value="1">Cũ</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label for="itemname">
                                                Tên Vật Phẩm*
                                            </label>
                                            <input type="text" name="itemname" class="form-control" placeholder="Điền vào đây" required id="itemname">
                                        </div>
                                        <div class="form-group">
                                            <label for="tags">
                                                Tags*
                                            </label>
                                            <input type="text" name="tags" class="form-control" placeholder="Điền vào đây" required id="tags" onkeyup="showHint(this.value)" autocomplete="off">
                                            <div id="tagsHint"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="discription">
                                                Mô Tả*
                                            </label>
                                            <textarea name="discription" rows="5" cols="50" class="form-control" placeholder="Điền vào đây" style="resize: none;" id="discription"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="price">
                                                Giá (Tối thiểu 10.000 VNĐ)*
                                                <button type="button" id="sugestPrice" class="btn btn-info">Giá tham khảo</button>
                                            </label>
                                            <input type="number" id="price" name="price" min="10000" class="form-control" placeholder="Điền vào đây (Đơn vị VND)" required value="10000">
                                            <div id="sugestPriceResult"></div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group form-upload-img-custom">
                                        <label>Hình Đại Diện</label>
                                        <input type="file" name="image-main" onchange="readURL(this);" required>
                                        <img id="image-main-preview" class="img-upload-product" src="#" alt="Ảnh" />
                                        <br>
                                        <label>Hình Chi tiết 1</label>
                                        <input type="file" name="image-detail-1" onchange="readURL(this);" required>
                                        <img id="image-detail-1-preview" class="img-upload-product" src="#" alt="Ảnh" />
                                        <br>
                                        <label>Hình Chi tiết 2</label>
                                        <input type="file" name="image-detail-2" onchange="readURL(this);" required>
                                        <img id="image-detail-2-preview" class="img-upload-product" src="#" alt="Ảnh" />
                                        <br>
                                        <label>Hình Chi tiết 3</label>
                                        <input type="file" name="image-detail-3" onchange="readURL(this);" required>
                                        <img id="image-detail-3-preview" class="img-upload-product" src="#" alt="Ảnh" />
                                    </div>
                                    <input type="hidden" name="lat" id="lat">
                                    <input type="hidden" name="lng" id="lng">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12 col-map-upload">
                        <div class="card map-upload-product">
                            <div class="card-header">
                                <h3 class="text-left">
                                    Địa điểm giao dịch
                                </h3>
                            </div>
                            <div class="card-block">
                                <div class="form-group">
                                    <label>
                                        Địa Chỉ *
                                    </label>
                                    <input type="text" name="address" class="form-control" placeholder="Đường" required>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>
                                                Thành Phố *
                                            </label>
                                            <select class="form-control" name="ct" required>
                                                <option value="0">Chọn</option>
                                                @foreach($city as $item)
                                                    <option value="{!! $item["name"] !!}">{!! $item["name"] !!}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>
                                                Quận *
                                            </label>
                                            <select class="form-control" name="dt" required>
                                                <option value="0">Chọn</option>
                                                @foreach($district as $item)
                                                    <option value="{!! $item["name"] !!}">{!! $item["name"] !!}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <label>
                                    Bạn vui lòng chọn vị trí giao dịch *
                                </label>
                                <div id="map" style="height: 500px;width: auto;"></div>
                                <div class="checkbox checkbox-upload-custom">
                                    <label>
                                        <input name="checkedUpload" type="checkbox" required> Tôi đã đọc các điều lệ
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-success btn-submit-form-upload btn-block btn-pf" disabled>
                                    Gửi
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
        </div>
    @endsection()
@section('scripts')

{{--http://jsbin.com/uboqu3/1/edit?html,js,output--}}
{{--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>--}}
        <!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <script>

        $('input[name="checkedUpload"]').change(function() {
            if ($(this).prop('checked')==true){
                //do something
                $("button.btn-submit-form-upload").prop("disabled", false);
            }
            else {
                $("button.btn-submit-form-upload").prop("disabled", true);
            }
        });
        // Note: This example requires that you consent to location sharing when
        // prompted by your browser. If you see the error "The Geolocation service
        // failed.", it means you probably did not give permission for the browser to
        // locate you.
        var map, marker, infoWindow, messagewindow;
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 10.772846, lng: 106.660016},
                zoom: 15
            });
            infoWindow = new google.maps.InfoWindow({
                content: document.getElementById('form')
            });

            messagewindow = new google.maps.InfoWindow({
                content: document.getElementById('message')
            });
            google.maps.event.addListener(map, 'click', function(event) {

                placeMarker(event.latLng);

           var latLng = marker.getPosition();     
            $('input#lat').val(latLng.lat);
            $('input#lng').val(latLng.lng);
                google.maps.event.addListener(marker, 'click', function() {
                    infowindow.open(map, marker);
                });
            });

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };

                    infoWindow.setPosition(pos);
                    infoWindow.setContent('Vị Trí Hiện Tại');
                    infoWindow.open(map);
                    map.setCenter(pos);
                }, function() {
                    handleLocationError(true, infoWindow, map.getCenter());
                });
            } else {
                // Browser doesn't support Geolocation
                handleLocationError(false, infoWindow, map.getCenter());
            }

        }

        function placeMarker(location) {
            if ( marker ) {
                marker.setPosition(location);
            } else {
                marker = new google.maps.Marker({
                  position: location,
                  map: map
                });
            }
        }
        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(browserHasGeolocation ?
                'Error: The Geolocation service failed.' :
                'Error: Your browser doesn\'t support geolocation.');
            infoWindow.open(map);
        }

    </script>

    <script async defer
            src="{{url('https://maps.googleapis.com/maps/api/js?key=AIzaSyA9WOBv_HjdT4h03JtNFLoPHxdaMrP1Dyk&callback=initMap')}}">
    </script>

    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $("#" + input.name + "-preview")
                        .attr('src', e.target.result)
                        .width(150)
                        .height(auto);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        function addTag(str) {
            var tags = $('#tags').val();
            var sltTag = tags.split(',');
            sltTag.pop();
            var checkOrther = str.search(':');
            str = str.slice(checkOrther + 1);
            var tmp = sltTag.find(function(a) {
                return a.toLowerCase() == str.toLowerCase();
            });
            if (!tmp) {
                sltTag.push(str+',');
                $('#tags').focus();
                $('#tags').val(sltTag.toString());
                $('#tagsHint').empty();                }
            else {
                $('#tags').focus();
                $('#tags').val(sltTag.toString()+',');
                $('#tagsHint').empty();
                $('#tagsHint').append('<p>Trùng tag!</p>');
            }
        }
        function showHint(str) {
            var xhttp;
            var url = baseUrl+'/api/gethint?q='+str;
            if (str.length == 0) { 
                document.getElementById("tagsHint").innerHTML = "";
                return;
            }
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var str = this.responseText;
                    var result = str.split(',');
                    $('#tagsHint').empty();
                    for (var i=0; i < result.length; i++) {
                        $('#tagsHint').append(
                            '<button role="button" class="btn btn-default" onclick="addTag(this.value)" value="'+result[i]+'">'
                            +result[i]+'</button>'
                        );
                    }
                }
            };
            xhttp.open("GET", url, true);
            xhttp.send();
        }
    </script>

    <script type="text/javascript">
        var baseUrl = '<?php echo url('/'); ?>';
        $('#sugestPrice').click(function(e) {
            e.stopPropagation();
            var temp_form = $(this).closest(".form-content"),
                Inputs = temp_form.find("input[type='text'], input, select"),
                isValid = true;

            $(".form-group").removeClass("has-error");
            for (var i = 0; i < Inputs.length; i++) {
                if (!Inputs[i].validity.valid) {
                    isValid = false;
                    $(Inputs[i]).closest(".form-group").addClass("has-error");
                }
            }

            if (isValid) {
                $('#sugestPriceResult').empty();
                $('#sugestPriceResult').append('<img id="loading" src="{{ asset("resources/upload/loading.gif") }}" alt="loading"/>');
                var url = baseUrl+'/api/suggestprice?itemname='+$('#itemname').val()+'&prtcate='+$('#prtcate').val()+'&cate='+$('#cate').val()+'&tags='+$('#tags').val()+'&status='+$('#status').val();
                $('#sugestPriceResult').append('<p>'+url+'</p>');
                
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("sugestPriceResult").innerHTML = this.responseText;
                        $('.btn-price').click(function(){
                            $('input[name="price"]').val(parseInt(this.value));
                        });
                    }
                };
                xhttp.open("GET", url, true);
                xhttp.send();
            }
            else {
                $('#sugestPriceResult').empty();
                $('#sugestPriceResult').append('<p>Error</p>');
            }
        });
    </script>
@endsection()