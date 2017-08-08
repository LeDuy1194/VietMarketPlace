<?php namespace App\Services;
/**
 * Created by PhpStorm.
 * User: ChouTruong
 * Date: 5/8/2017
 * Time: 10:09 AM
 */

use App\Models\Stock;
use App\Models\Order;
class productLocation {
    public function getStockProducts() {
        $mapStock = new Stock();
        $stockProducts = $mapStock->getAllStock();
        return $stockProducts;
    }

    public function getOrderProducts() {
        $mapOrder = new Order();
        $orderProducts = $mapOrder->getAllOrder();
        return $orderProducts;
    }
}

