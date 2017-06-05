/**
 * Created by nobikun1412 on 27-May-17.
 */
// Notification.requestPermission();
var myId = $('#auth_id_socket').data('user-id-socket');
var oldTotalNoti = $('sup.total-noti').val();
console.log('ID: ' + myId);
console.log('oldTotalNoti: ' + oldTotalNoti);
var socket = io.connect('http://vietmarketplace.dev:8890');
socket.emit('updateSocket', myId);
socket.on('notification', function (data) {
    console.log('data: ' + data);
    var dataJSON = JSON.parse(data);
    var dataProduct = dataJSON.result_match;
    var type_noti = dataJSON.type_noti;
    var url = '';
    var body = '';

    if (type_noti == 'autoDel') {
        url = 'http://vietmarketplace.dev/' + dataJSON.type + '-detail/' + dataProduct.id;
        body = 'Bạn có 1 bài viết ' + dataProduct.name + ' sắp hết hạn đăng, vui lòng kiểm tra lại!';
    }

    else {
        url = 'http://vietmarketplace.dev/match/' + dataJSON.type + '--' + dataProduct.id;
        body = 'VietMarketPlace vừa có kết quả matching mới cho ' + dataProduct.name; // Nội dung thông báo
    }

    var type_product = '';
    if (dataJSON.type == 'order') {
        type_product = 'Tin tìm mua của bạn!';
    }
    else type_product = 'Tin rao bán của bạn!';

    var totalNoti = dataJSON.totalNoti;
    if (typeof oldTotalNoti === "undefined") {
        $('.print-number-noti').append('<sup class="total-noti">' + totalNoti + '</sup>');
    }
    else {
        $('sup.total-noti').html(totalNoti);
    }
    oldTotalNoti = totalNoti;

    console.log('url link: ' + url);
    console.log('$totalNoti: ' + totalNoti);

    var img_feature = '../resources/upload/' + dataJSON.type + 's/' + dataJSON.type + '-' + dataProduct.id + '/' + dataProduct.img;

    console.log('data matching: ' + dataJSON.type);

    notify = new Notification(
        type_product, // Tiêu đề thông báo
        {
            body: body,
            icon: img_feature, // Hình ảnh
            tag: url // Đường dẫn
        }
    );
    notify.onclick = function () {
        window.open(this.tag, '_blank');
        // window.location.href = this.tag; // Di chuyển đến trang cho url = tag
        window.focus();
    }
});
