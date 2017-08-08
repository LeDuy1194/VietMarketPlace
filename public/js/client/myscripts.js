var classReadNoti = '';
var typeProduct = '';
var openNoti = false;
var myId = $('#auth_id_socket').data('user-id-socket');
var baseUrl = window.location.protocol + "//" + window.location.host + "/";

$( document ).ready(function() {
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
        e.preventDefault();
        if (!openNoti) {
            openNoti = true;
            $('#notifications-container-menu').show();
            $('.noti-status').addClass('white-font-class');
        }
        else {
            openNoti = false;
            $('#notifications-container-menu').hide();
            $('.noti-status').removeClass('white-font-class');
        }
        loadAllNotification();
    });

    $('.see-all-notis').click(function (e) {
        markAllNotificationAsRead();
    });
});

$(document).mouseup(function(e)
{
    var container = $('.notification-status');

    // if the target of the click isn't the container nor a descendant of the container
    if (!container.is(e.target) && container.has(e.target).length === 0)
    {
        openNoti = false;
        $('#notifications-container-menu').hide();
        $('.noti-status').removeClass('white-font-class');
    }

});

function loadAllNotification() {
    var ajaxGetMatchNotiUrl = baseUrl + 'getMatchNotification/' + myId;
    $.ajax({
        type: "GET",
        url: ajaxGetMatchNotiUrl,
        dataType: "json",
        success: function (data) {
            console.log(data);
            var stockNotis = data.stockNotis;
            var orderNotis = data.orderNotis;
            var numberStockNoti = data.stockNoRead;
            var numberOrderNoti = data.orderNoRead;
            $('#stockNotification').html('');
            $('#orderNotification').html('');
            if (stockNotis.length != 0) {
                typeProduct = 0;
                if (numberStockNoti != 0) {
                    $('.stock-notification-number').show();
                    $('.stock-notification-number').html(numberStockNoti);
                }
                for (var i = 0; i < stockNotis.length; i++) {
                    if (stockNotis[i].read != 0) {
                        classReadNoti = 'seen-noti';
                    }
                    else classReadNoti = '';

                    var url_link_stock = '';
                    var content_noti_stock = '';
                    var type_noti_stock = '';

                    if (stockNotis[i].type_noti == 'autoDel') {
                        type_noti_stock = 0;
                        url_link_stock = 'http://vietmarketplace.dev/stock-detail/' + stockNotis[i].id;
                        content_noti_stock = 'Bạn có 1 bài viết <strong>' + stockNotis[i].name + '</strong> sắp hết hạn đăng, vui lòng kiểm tra lại!';
                    }

                    else {
                        type_noti_stock = 1;
                        url_link_stock = 'http://vietmarketplace.dev/match/stock--' + stockNotis[i].id;
                        content_noti_stock = '<strong>VietMarketPlace</strong> vừa có kết quả matching mới cho <strong>' + stockNotis[i].name + '</strong>'
                    }

                    $('#stockNotification').append(
                        '<div class="item-notification no-read ' + classReadNoti + '" onclick="readNotification(' + typeProduct + ', ' + type_noti_stock + ', ' + stockNotis[i].id + ')" data-id-noti="' + stockNotis[i].id + '">'
                        + '<a href="' + url_link_stock + '" class="link-to-match">'
                        + '<span class="img-product-noti">'
                        + '<img alt="' + stockNotis[i].name + '" src="../resources/upload/stocks/stock-' + stockNotis[i].id + '/' + stockNotis[i].img + '" class="img-product-noti-header" />'
                        + '</span>'
                        + '<span class="item-content-noti">'
                        + '<div class="item-body-noti">'
                        +  content_noti_stock
                        + '</div>'
                        + '<div class="item-time-noti">'
                        + '<span class="img-time-noti">'
                        + '<img alt="time-noti" src="../public/img/original/time.png" class="img-time-noti" />'
                        + '</span>'
                        + '<span class="time-ago-noti">'
                        + stockNotis[i].noti_updated
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

            if (orderNotis.length != 0) {
                if (numberOrderNoti != 0) {
                    $('.order-notification-number').show();
                    $('.order-notification-number').html(numberOrderNoti);
                }
                typeProduct = 1;
                for (var i = 0; i < orderNotis.length; i++) {
                    if (orderNotis[i].read != 0) {
                        classReadNoti = 'seen-noti';
                    }
                    else classReadNoti = '';

                    var url_link_order = '';
                    var content_noti_order = '';
                    var type_noti_order = '';

                    if (orderNotis[i].type_noti == 'autoDel') {
                        type_noti_order = 0;
                        url_link_order = 'http://vietmarketplace.dev/order-detail/' + orderNotis[i].id;
                        content_noti_order = 'Bạn có 1 bài viết <strong>' + orderNotis[i].name + '</strong> sắp hết hạn đăng, vui lòng kiểm tra lại!';
                    }

                    else {
                        type_noti_order = 1;
                        url_link_order = 'http://vietmarketplace.dev/match/order--' + orderNotis[i].id;
                        content_noti_order = '<strong>VietMarketPlace</strong> vừa có kết quả matching mới cho <strong>' + orderNotis[i].name + '</strong>'
                    }

                    $('#orderNotification').append(
                        '<div class="item-notification no-read ' + classReadNoti + '" onclick="readNotification(' + typeProduct + ', ' + type_noti_order + ', '  + orderNotis[i].id + ')">'
                        + '<a href="' + url_link_order + '" class="link-to-match">'
                        + '<span class="img-product-noti">'
                        + '<img alt="' + orderNotis[i].name + '" src="../resources/upload/orders/order-' + orderNotis[i].id + '/' + orderNotis[i].img + '" class="img-product-noti-header" />'
                        + '</span>'
                        + '<span class="item-content-noti">'
                        + '<div class="item-body-noti">'
                        +  content_noti_order
                        + '</div>'
                        + '<div class="item-time-noti">'
                        + '<span class="img-time-noti">'
                        + '<img alt="time-noti" src="../public/img/original/time.png" class="img-time-noti" />'
                        + '</span>'
                        + '<span class="time-ago-noti">'
                        +  orderNotis[i].noti_updated
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
}

function readNotification(type, type_noti, id) {
    var ajaxReadNotiUrl = baseUrl + 'readNotification/' + type + '--' + type_noti + '--' + id;
    $.ajax({
        type: "GET",
        url: ajaxReadNotiUrl,
        dataType: "json",
        success: function (data) {
            console.log('Success:', data);
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
}

function markAllNotificationAsRead() {
    var ajaxMarkAllNotificationAsRead = baseUrl + 'markAllNotificationAsRead/';
    $.ajax({
        type: "GET",
        url: ajaxMarkAllNotificationAsRead,
        dataType: "json",
        success: function (data) {
            $('sup.total-noti').hide();
            $('.stock-notification-number').hide();
            $('.order-notification-number').hide();
            $('.item-notification.no-read').each(function () {
                $(this).removeClass('no-read');
                $(this).addClass('seen-noti');
            });
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
}