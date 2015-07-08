<?php
class orders extends database{
	var $table = "orders";
	function insertOrders($order_name,$uid,$product_info,$total,$ship_address,$method_pay,$status)
	{
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		return parent::insert_data($this->table,array('order_name'=>$order_name,'u_id'=>$uid,'product_info'=>$product_info,'total'=>$total,'ngaydat'=>date('Y-m-d H:i:s'),'ship_address'=>$ship_address,'method_pay'=>$method_pay,'status'=>$status));
	}
	function updateOrder($order_name,$uid,$product_info,$total,$ship_address,$method_pay,$status,$dieukien)
	{
		if($order_name!='')
		{
			$a['order_name'] = $order_name;
		}
		if($uid!='')
		{
			$a['u_id'] = $uid;
		}
		if($product_info!='')
		{
			$a['product_info'] = $product_info;
		}
		if($total!='')
		{
			$a['total'] = $total;
		}
		if($ship_address!='')
		{
			$a['ship_address'] = $ship_address;
		}
		if($method_pay!='')
		{
			$a['method_pay'] = $method_pay;
		}
		if($status!='')
		{
			$a['status'] = $status;
		}
		return parent::updateDb($this->table,$a,"order_id=".$dieukien);
	}
	function delOrder($order_id)
	{
		return parent::deleteDb($this->table,"order_id=$order_id");
	}
	function getAllOrder($order_by='',$limit='')
	{
		if($order_by!='' && $limit==''){
			return parent::selectDb($this->table,'*','','ORDER BY ' .$order_by.' ASC','');
		}
		elseif($order_by=='' && $limit=='')
		{
			return parent::selectDb($this->table,'*','','');
		}
		elseif($order_by=='' && $limit!='')
		{
			return parent::selectDb($this->table,'*','','',"LIMIT $limit[0],$limit[1]");
		}
		elseif($order_by!='' && $limit!='')
		{
			return parent::selectDb($this->table,'*','','ORDER BY ' .$order_by.' ASC',"LIMIT $limit[0],$limit[1]");
		}
	}
	
	function getOrderById($id)
	{
		$a = parent::selectDb($this->table,'*',"order_id=".$id);
		if(!empty($a))
		{
			return $a[0];
		}
		else
		{
			echo "Khong co du lieu";
		}
	}
	
}
?>