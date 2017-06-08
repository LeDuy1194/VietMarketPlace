<?php
function stripUnicode($str) {
	if (!$str) {

	}
	else {
		$unicode = array(
			'a' => 'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
			'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
			'd' => 'đ',
			'D' => 'Đ',
			'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
			'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
			'i' => 'í|ì|ỉ|ĩ|ị',
			'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
			'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
			'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Õ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
			'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
			'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
			'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
			'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
		);
		foreach($unicode as $khongdau=>$codau) {
			$arr = explode("|",$codau);
			$str = str_replace($arr,$khongdau,$str);
		}
		return $str;
	}
}

function changeTitle($str) {
	$str=trim($str);
	if ($str=="") {
		$str = "";
	}
	else {
		$str = str_replace('"','',$str);
		$str = str_replace("'",'',$str);
		$str = stripUnicode($str);
		$str = mb_convert_case($str,MB_CASE_LOWER,'utf-8');
		$str = str_replace(' ','-',$str);
	}
	return $str;
}

function cateParent ($data,$parent = 0,$str="--",$select=0) {
	foreach ($data as $key => $val) {
		$id = $val["id"];
		$name = $val["name"];
		if ($val["parent_id"] == $parent) {
			if (($select != 0)&&($id == $select)) {
				echo "<option value='$id' selected='selected'>$str $name</option>";
			}
			else {
				echo "<option value='$id'>$str $name</option>";
			}
			cate_parent($data,$id,$str."--");
		}
		
	}
}

/** Comparing two sorted numeric array(tag_id)
* @param $data_1: base for the compare and calculation.
* @param $data_2: reference array.
**/
function compareTag($data_1,$data_2) {
	$count = 0;
	$total = count($data_1);
    asort($data_1);
    asort($data_2);
	foreach ($data_1 as $key_1 => $val_1) {
		foreach ($data_2 as $key_2 => $val_2) {
            // echo 'Val: '.$val_1.' - '.$val_2.'<br>';
			if ($val_1 == $val_2) {
				$count++;
				break;
			}
            else if ($val_1 < $val_2){
                break;
            }
		}
	}
	// echo "Result: ".$count." - ".$total."<br>";
	$result = round($count / $total * 100);
	return $result;
}

/** Searching the product in table
* @param $data: the product request data.
* @param $match_type: the table to search the product.
**/
function matchSearching($data,$match_type = 'orders') {
    $stockTagModel = new App\Models\StockTag();
    $orderTagModel = new App\Models\OrderTag();
    $userModel = new App\Models\User();
    $count = 0;

    // Match categories
    $result = DB::table($match_type)->where('cate_id','=',$data->cate_id)->where('finished',0);
    $result_data = [];
    $result_matching = [];
    if ($match_type == 'orders') {
        echo "matching stock with orders<br>";
        // Match price
        $temp_item = $result->orderBy('price','asc')->first();
        $price = intval($data->price * 0.9);
        $result = $result->where('price','>=',$price);
        $result_data['type_match'] = 'order';
        // Match tag
        $temp_table = $result->get();
        $stock = $data;
        $stockTag = $stockTagModel->getTagByStockId($stock->id);
        foreach ($temp_table as $order) {
            $orderTag = $orderTagModel->getTagByOrderId($order->id);
            $point = compareTag($stockTag, $orderTag);
            // Check and save
            if ($point >= 50) {
                $user = $userModel->getDetailUserByUserID($order->user_id);
//				$user->notify(new App\Notifications\Matching($order, 'order'));
                $result_matching[] = $order;
                $match = new App\Models\Match();
                $match->order_id = $order->id;
                $match->stock_id = $stock->id;
                $match->point = $point;
                $match->save();
                $count++;
            }
        }
        $result_data['matching'] = $result_matching;
    }
    else {
        echo "matching order with stocks<br>";
        // Match price
        $price = intval($data->price * 1.1);
        $result = $result->where('price','<=',$price);
        $result_data['type_match'] = 'stock';
        // Match tag
        $temp_table = $result->get();
        $order = $data;
        $orderTag = $orderTagModel->getTagByOrderId($order->id);
        foreach ($temp_table as $stock) {
            $stockTag = $stockTagModel->getTagByStockId($stock->id);
            $point = compareTag($orderTag, $stockTag);
            // Check and save
            if ($point >= 50) {
                $user = $userModel->getDetailUserByUserID($stock->user_id);
//				$user->notify(new App\Notifications\Matching($stock, 'stock'));
                $result_matching[] = $stock;
                $match = new App\Models\Match();
                $match->order_id = $order->id;
                $match->stock_id = $stock->id;
                $match->point = $point;
                $match->save();
                $count++;
            }
        }
        $result_data['matching'] = $result_matching;
    }
    // echo "<br>Match: ";
    // var_dump($result_data);
    // echo "<br>";
    return $result_data;
}

function timeago($date) {
    $timestamp = strtotime($date);

    $strTime = array("giây", "phút", "giờ", "ngày", "tháng", "năm");
    $length = array("60","60","24","30","12","10");

    $currentTime = time();
    if($currentTime >= $timestamp) {
        $diff     = time()- $timestamp;
        for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
            $diff = $diff / $length[$i];
        }

        $diff = round($diff);
        return $diff . " " . $strTime[$i] . " trước";
    }
}

function checkTimePostToSendNoti ($date) {
    $timestamp = strtotime($date);
    $diff     = time()- $timestamp;
    if($diff >= 7 * 86400) {
        return 'invalid';
    }
    return 'valid';
}

function checkTimePostToDelete ($date) {
    $timestamp = strtotime($date);
    $diff     = time()- $timestamp;
    if($diff >= 10 * 86400) {
        return 'delete';
    }
    return 'noDel';
}
?>