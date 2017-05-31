/**
 * Created by nobikun1412 on 27-May-17.
 */
Notification.requestPermission();
var myId = $('#auth_id_socket').data('user-id-socket');
var oldTotalNoti = $('sup.total-noti').val();
console.log('ID: ' + myId);
console.log('oldTotalNoti: ' + oldTotalNoti);
var socket = io.connect('http://vietmarketplace.dev:8890');
socket.emit('updateSocket', myId);
socket.on('message', function (data) {
    console.log('data: ' + data);
    var dataJSON = JSON.parse(data);
    var dataProduct = dataJSON.result_match;
    var url = 'http://vietmarketplace.dev/match/' + dataJSON.type + '--' + dataProduct.id;
    var type_noti = '';
    if (dataJSON.type == 'order') {
        type_noti = 'Tin tìm mua của bạn!';
    }
    else type_noti = 'Tin rao bán của bạn!';
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
    // console.log('data user: ' + result_match.user_id);
    notify = new Notification(
        type_noti, // Tiêu đề thông báo
        {
            body: 'VietMarketPlace vừa có kết quả matching mới cho ' + dataProduct.name, // Nội dung thông báo
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