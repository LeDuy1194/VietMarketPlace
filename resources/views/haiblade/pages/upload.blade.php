@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <br>
        <div class="row">
            <div class="col-md-12">
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
        <div class="row">
            @include('utils.message')
            <div class="col-md-6">
                <div class="card">
                    <div class="card-block">
                        <h3 class="text-left">
                            Thông Tin Vật Phẩm
                        </h3>
                        <hr>
                        <form role="form" action="{!!route('getupload')!!}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{!!csrf_token()!!}">
                            <br>
                            <div class="form-content">
                                <div class="form-group">
                                    <label>
                                        Chọn Phần Mục *
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
                                <br>
                                <hr>
                                <br>
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
                                    <input type="text" name="tags" class="form-control" placeholder="Điền vào đây" required id="tags">
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
                                        <button type="button" id="sugestPrice" class="btn">Đề nghị.</button>
                                    </label>
                                    <input type="number" id="price" name="price" min="10000" class="form-control" placeholder="Điền vào đây (Đơn vị VND)" required>
                                    <div id="sugestPriceResult"></div>
                                </div>
                            </div>
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
                            <br>
                            <hr>
                            <br>
                            <div class="form-group">
                                <label>
                                    Đăng Hình Ảnh
                                </label>
                                <br>
                                <label>Hình Đại Diện Sản Phẩm</label>
                                <input type="file" name="image-main" onchange="readURL(this);" required>
                                <img id="image-main-preview" src="#" alt="Ảnh" />
                                <br>
                                <label>Hình Chi tiết 1</label>
                                <input type="file" name="image-detail-1" onchange="readURL(this);" required>
                                <img id="image-detail-1-preview" src="#" alt="Ảnh" />
                                <br>
                                <label>Hình Chi tiết 2</label>
                                <input type="file" name="image-detail-2" onchange="readURL(this);" required>
                                <img id="image-detail-2-preview" src="#" alt="Ảnh" />
                                <br>
                                <label>Hình Chi tiết 3</label>
                                <input type="file" name="image-detail-3" onchange="readURL(this);" required>
                                <img id="image-detail-3-preview" src="#" alt="Ảnh" />
                            </div>

                            <input type="hidden" name="lat" id="lat">
                            <input type="hidden" name="lng" id="lng">
                            <br>
                            <hr>
                            <br>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" required> Tôi đã đọc các điều lệ
                                </label>
                            </div>
                            <button type="submit" class="btn btn-block btn-pf">
                                Gửi
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-block">
                        <h3 class="text-left">
                            Địa điểm giao dịch
                        </h3>
                        <hr>
                        <br>
                        <label>
                            Bạn vui lòng chọn vị trí giao dịch *
                        </label>
                        <div id="map" style="height: 500px;width: auto;"></div>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>

    @endsection()
@section('scripts')

{{--http://jsbin.com/uboqu3/1/edit?html,js,output--}}
{{--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>--}}
        <!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <script>
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

                marker = new google.maps.Marker({
                    position: event.latLng,
                    map: map
                });

           var latLng = marker.getPosition();     
            $('input#lat').val(latLng.lat);
            $('input#lng').val(latLng.lng);
                google.maps.event.addListener(marker, 'click', function() {
                    infowindow.open(map, marker);
                });
            });

            //var latLng = marker.getPosition();
            
            //document.getElementById("lat").innerHTML = latLng.lat();
            //document.getElementById("lng").innerHTML = latLng.lng();

            // Try HTML5 geolocation.
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
        /*function saveData() {
         var latlng = marker.getPosition();
         var url = '&lat=' + latlng.lat() + '&lng=' + latlng.lng();
         document.getElementById("lat").innerHTML = latlng.lat();
         document.getElementById("lng").innerHTML = latlng.lng();
         downloadUrl(url, function(data, responseCode) {

         if (responseCode == 200 && data.length <= 1) {
         infowindow.close();
         messagewindow.open(map, marker);
         }
         });
         }
         function downloadUrl(url, callback) {
         var request = window.ActiveXObject ?
         new ActiveXObject('Microsoft.XMLHTTP') :
         new XMLHttpRequest;

         request.onreadystatechange = function() {
         if (request.readyState == 4) {
         request.onreadystatechange = doNothing;
         callback(request.responseText, request.status);
         }
         };

         request.open('GET', url, true);
         request.send(null);
         }

         function doNothing () {
         }
         */
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
    </script>

    <script type="text/javascript">
        var baseUrl = '<?php echo url('/'); ?>'
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
                var url = baseUrl+'/suggestprice?itemname='+$('#itemname').val()+'&prtcate='+$('#prtcate').val()+'&cate='+$('#cate').val()+'&tags='+$('#tags').val()+'&status='+$('#status').val();
                $('#sugestPriceResult').append('<p>'+url+'</p>');
                $.get(url, function(data) {
                    $('#sugestPriceResult').empty();
                    $('#sugestPriceResult').append(
                        '<label for="priceMax">Giá cao nhất: </label>\
                        <button type="button" class="btn btn-block" id="priceMax">'+data.priceMax+' VND</button>\
                        <label for="priceSuggest">Giá đề nghị: </label>\
                        <button type="button" class="btn btn-block" id="priceSuggest">'+data.priceSuggest+' VND</button>\
                        <label for="priceMin">Giá thấp nhất: </label>\
                        <button type="button" class="btn btn-block" id="priceMin">'+data.priceMin+' VND</button>'
                        );
                    $('#priceMax').click(function(){
                        $('input[name="price"]').val(data.priceMax);
                    });
                    $('#priceSuggest').click(function(){
                        $('input[name="price"]').val(data.priceSuggest);
                    });
                    $('#priceMin').click(function(){
                        $('input[name="price"]').val(data.priceMin);
                    });
                });
            }
            else {
                $('#sugestPriceResult').empty();
                $('#sugestPriceResult').append('<p>Error</p>');
            }
        });
    </script>
@endsection()