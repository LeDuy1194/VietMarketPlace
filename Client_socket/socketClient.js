/**
 * Created by nobikun1412 on 27-May-17.
 */
Notification.requestPermission();
var myId = $('#auth_id_socket').data('user-id-socket');
console.log('ID: ' + myId);
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
    console.log('url link: ' + url);
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