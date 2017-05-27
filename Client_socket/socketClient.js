/**
 * Created by nobikun1412 on 27-May-17.
 */
var myId = $('#auth_id_socket').data('user-id-socket');
console.log('ID: ' + myId);
var socket = io.connect('http://vietmarket.dev:8890');
socket.emit('updateSocket', myId);
socket.on('message', function (data) {
    console.log('data: ' + data);
    var dataJSON = JSON.parse(data);
    var dataProduct = dataJSON.result_match;
    var url = 'http://vietmarket.dev/match/' + dataJSON.type + '--' + dataProduct.id;
    console.log('url link: ' + url);
    var img_feature = '../resources/upload/' + dataJSON.type + 's/' + dataJSON.type + '-' + dataProduct.id + '/' + dataProduct.img;
    console.log('data matching: ' + dataJSON.type);
    // console.log('data user: ' + result_match.user_id);
    notify = new Notification(
        'Bạn có một thông báo mới từ VietMarketPlace', // Tiêu đề thông báo
        {
            body: 'VietMarketPlace vừa có kết quả matching cho ' + dataProduct.name, // Nội dung thông báo
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