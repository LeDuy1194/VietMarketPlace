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
    public function getProducts() {
        $mapStock = new Stock();
        $mapOrder = new Order();
        $stockProducts = $mapStock->getAllStock();
        $orderProducts = $mapOrder->getAllOrder();
        $dom = new \DOMDocument("1.0");
        $node = $dom->createElement("markers");
        $parnode = $dom->appendChild($node);
//        foreach ($stockProducts as $stockProduct) {
//            $node = $dom->createElement("marker");
//            $newnode = $parnode->appendChild($node);
//            $newnode->setAttribute("name", $stockProduct['name']);
//            $newnode->setAttribute("place", $stockProduct['place']);
//            $newnode->setAttribute("user_id", $stockProduct['user_id']);
//            $newnode->setAttribute("cate_id", $stockProduct['cate_id']);
//            $newnode->setAttribute("lat", $stockProduct['lat']);
//            $newnode->setAttribute("lng", $stockProduct['lng']);
//        }
        return $stockProducts;
}
}

