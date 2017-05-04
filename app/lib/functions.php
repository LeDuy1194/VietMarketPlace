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

function cate_parent ($data,$parent = 0,$str="--",$select=0) {
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

function compare_tag($data_1,$data_2) {
	$count = 0;
	$total = 0;
	foreach ($data_1 as $key_1 => $val_1) {
		$total++;
		foreach ($data_2 as $key_2 => $val_2) {
			if ($key_1 == $key_2) {
				$count++;
				break;
			}
			else if ($key_1 > $key_2) {
				break;
			}
			else {}
		}
	}
	$result = round($count / $total * 100);
	return $result;
}

/** Searching the product in table
* @param $data: the product request data.
* @param $match_type: the table to search the product.
**/
function match_searching($data,$match_type = 'orders') {
	$stockTagModel = new App\Models\StockTag;
	$orderTagModel = new App\Models\OrderTag;

	// Match categories
	$result = DB::table($match_type)->where('cate_id','=',$data->cate_id)->where('finished',0)->orwhere('name','LIKE','%'.$data->name.'%');

	if ($match_type == 'orders') {
		// Match price
		$price = $data->price * 0.9;
		$result = $result->where('price','>=',$price);

		// Match tag
		$temp_table = $result->get();
		$stock = $data;
		$stockTag = $stockTagModel->getTagByStockId($stock->id);
		foreach ($temp_table as $order) {
			$orderTag = $orderTagModel->getTagByOrderId($order->id);
			$point = compare_tag($stockTag, $orderTag);
			// Check and save
			if ($point >= 50) {
				$match = new App\Models\Match();
				$match->order_id = $order->id;
				$match->stock_id = $stock->id;
				$match->point = $point;
				$match->save();
			}
		}
	}
	else {
		// Match price
		$price = $data->price * 1.1;
		$result = $result->where('price','<=',$price);

		// Match tag
		$temp_table = $result->get();
		$order = $data;
		$orderTag = $orderTagModel->getTagByOrderId($order->id);
		foreach ($temp_table as $stock) {
			$stockTag = $stockTagModel->getTagByStockId($order->id);
			$point = compare_tag($orderTag, $stockTag);
			// Check and save
			if ($point >= 50) {
				$match = new App\Models\Match();
				$match->order_id = $order->id;
				$match->stock_id = $stock->id;
				$match->point = $point;
				$match->save();
			}
		}
	}
}

?>