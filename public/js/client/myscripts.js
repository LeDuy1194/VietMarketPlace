$( document ).ready(function() {
    var openNoti = false;
    var myId = $('#auth_id_socket').data('user-id-socket');
    var baseUrl = window.location.protocol + "//" + window.location.host + "/";
    console.log(baseUrl);
    var ajaxGetMatchNotiUrl = baseUrl + 'getMatchNotification/' + myId;
    console.log(ajaxGetMatchNotiUrl);
    $('#wish-list-tabs a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });
    $('.tabs-custom a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });

    $('#list-cate-tabs a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });

    $('#notification-tabs a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });

    $('.noti-status').click(function (e) {
        // alert('match noti');
        // e.preventDefault();
        if (!openNoti) {
            openNoti = true;
            $('#notifications-container-menu').show();
        }
        else {
            openNoti = false;
            $('#notifications-container-menu').hide();
        }
        $.ajax({
            type: "GET",
            url: ajaxGetMatchNotiUrl,
            dataType: "json",
            success: function (data) {
                console.log(data);
                // console.log(data.stockNotis[0].id);
                var stockNotis = data.stockNotis;
                var orderNotis = data.orderNotis;
                var numberStockNoti = stockNotis.length;
                var numberOrderNoti = orderNotis.length;
                $('#stockNotification').html('');
                if (numberStockNoti != 0) {
                    $('.stock-notification-number').show();
                    $('.stock-notification-number').html(numberStockNoti);
                    for (var i = 0; i < numberStockNoti; i++) {
                        $('#stockNotification').append(
                            '<div class="item-notification">'
                                + '<a href="http://vietmarketplace.dev/match/stock--' + stockNotis[i].id + '" class="link-to-match">'
                                    + '<span class="img-product-noti">'
                                        + '<img alt="' + stockNotis[i].name + '" src="../resources/upload/stocks/stock-' + stockNotis[i].id + '/' + stockNotis[i].img + '" class="img-product-noti-header" />'
                                    + '</span>'
                                    + '<span class="item-content-noti">'
                                        + '<div class="item-body-noti">'
                                            + '<strong>VietMarketPlace</strong> vừa có kết quả matching mới cho <strong>' + stockNotis[i].name + '</strong>'
                                        + '</div>'
                                        + '<div class="item-time-noti">'
                                            + '<span class="img-time-noti">'
                                                + '<img alt="time-noti" src="../public/img/original/time.png" class="img-time-noti" />'
                                            + '</span>'
                                            + '<span class="time-ago-noti">'
                                                + 'Cách đây 1h'
                                            + '</span>'
                                        + '</div>'
                                    + '</span>'
                                + '</a>'
                            + '</div>');
                    }
                }
                else {
                    $('.stock-notification-number').hide();
                }

                if (numberOrderNoti != 0) {
                    $('.order-notification-number').show();
                    $('.order-notification-number').html(numberOrderNoti);
                    for (var i = 0; i < numberOrderNoti; i++) {
                        $('#orderNotification').append(
                            '<div class="item-notification">'
                            + '<a href="http://vietmarketplace.dev/match/order--' + orderNotis[i].id + '" class="link-to-match">'
                            + '<span class="img-product-noti">'
                            + '<img alt="' + orderNotis[i].name + '" src="../resources/upload/orders/order-' + orderNotis[i].id + '/' + orderNotis[i].img + '" class="img-product-noti-header" />'
                            + '</span>'
                            + '<span class="item-content-noti">'
                            + '<div class="item-body-noti">'
                            + '<strong>VietMarketPlace</strong> vừa có kết quả matching mới cho <strong>' + orderNotis[i].name + '</strong>'
                            + '</div>'
                            + '<div class="item-time-noti">'
                            + '<span class="img-time-noti">'
                            + '<img alt="time-noti" src="../public/img/original/time.png" class="img-time-noti" />'
                            + '</span>'
                            + '<span class="time-ago-noti">'
                            + 'Cách đây 1h'
                            + '</span>'
                            + '</div>'
                            + '</span>'
                            + '</a>'
                            + '</div>');
                    }
                }
                else {
                    $('.order-notification-number').hide();
                }
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

});