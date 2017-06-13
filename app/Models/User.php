<?php namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Models\Stock;
use App\Models\Order;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'level', 'fullname', 'address', 'city', 'district', 'phone', 'dob', 'avatar','activated'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

     /**
     * The channels the user receives notification broadcasts on.
     *
     * @return array
     */
    public function receivesBroadcastNotificationsOn() {
        return [
            new PrivateChannel('users.'.$this->id),
        ];
    }

    public function stock() {
        return $this->hasMany('App\Models\Stock');
    }

    public function unfinStock() {
        $stockModel = new Stock();
        $stock = $stockModel->getStockByUserId($this->id);
        return $stock;
    }

    public function order() {
        return $this->hasMany('App\Models\Order');
    }

    public function unfinOrder() {
        $orderModel = new Order();
        $order = $orderModel->getOrderByUserId($this->id);
        return $order;
    }

    public function matchNoti() {
        return $this->hasMany('App\Models\MatchNotification');
    }

    public function fav() {
        return $this->hasMany('App\Models\Fav');
    }

    //Get data detail user by username---- Anh Pham
    public function getDetailUserByUserName($username) {
        return $this->where('username', $username)->first();
    }

    //Get data detail user by user_id---- Anh Pham
    public function getDetailUserByUserID($user_id) {
        return $this->where('id', $user_id)->first();
    }

    //Get paginate
    public function getAdminPage($number) {
        return $this->select('id','username','email','phone','level')->where('level','<',2)->orderBy('id','asc')->paginate($number,['*'],'user');
    }
}
