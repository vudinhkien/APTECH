<?php
class product extends database{
	var $table = "product";
	var $table1 = "product_cat_relation";
	function insertProduct($pro_name,$image,$tomtat,$description,$price_niemyet,$price_sale,$thongsokythuat,$image_phu,$ma_sp,$soluong,$position,$hot,$status,$cat_id,$mausac)
	{
		$pro_id = parent::insert_data($this->table,array('pro_name'=>$pro_name,'image'=>$image,'tomtat'=>$tomtat,'description'=>$description,'price_niemyet'=>$price_niemyet,'price_sale'=>$price_sale,'thongsokythuat'=>$thongsokythuat,'image_phu'=>$image_phu,'ma_sp'=>$ma_sp,'soluong'=>$soluong,'position'=>$position,'hot'=>$hot,'status'=>$status,'mausac'=>$mausac,'ngaydangbai'=>date('Y-m-d H:i:s')));
		if($pro_id!='')
		{
			$arr = array();
			$arr['pro_id'] = $pro_id;
			for($i=0;$i<count($cat_id);$i++)
			{
				$arr['cat_id'][] = parent::insert_data($this->table1,array('pro_id'=>$pro_id,'cat_id'=>$cat_id[$i]));
			}
			return $arr;
		}
		else
		{
			return false;
		}
	}
	function updateProduct($pro_name,$image,$tomtat,$description,$price_niemyet,$price_sale,$thongsokythuat,$image_phu,$ma_sp,$soluong,$position,$hot,$status,$cat_id,$mausac,$dieukien)
	{
		if($pro_name!='')
		{
			$a['pro_name'] = $pro_name;
		}
		if($image!='')
		{
			$a['image'] = $image;
		}
		if($mausac!='')
		{
			$a['mausac'] = $mausac;
		}
		if($description!='')
		{
			$a['description'] = $description;
		}
		if($tomtat!='')
		{
			$a['tomtat'] = $tomtat;
		}
		if($price_niemyet!='')
		{
			$a['price_niemyet'] = $price_niemyet;
		}
		if($price_sale!='')
		{
			$a['price_sale'] = $price_sale;
		}
		if($thongsokythuat!='')
		{
			$a['thongsokythuat'] = $thongsokythuat;
		}
		if($image_phu!='')
		{
			$a['image_phu'] = $image_phu;
		}
		if($ma_sp!='')
		{
			$a['ma_sp'] = $ma_sp;
		}
		if($soluong!='')
		{
			$a['soluong'] = $soluong;
		}
		if($position!='')
		{
			$a['position'] = $position;
		}
		if($hot!='')
		{
			$a['hot'] = $hot;
		}
		if($status!='')
		{
			$a['status'] = $status;
		}
		if($cat_id!='')
		{
			parent::updateDb($this->table1,array("cat_id"=>$cat_id),"pro_id".$dieukien);
		}
		return parent::updateDb($this->table,$a,"pro_id=".$dieukien);
	}
	function delProduct($pro_id)
	{
		return parent::deleteDb($this->table,"pro_id=$pro_id");
	}
	function getAllProduct($order_by='',$limit='')
	{
		if($order_by!='' && $limit==''){
			$product_obj = parent::selectDb($this->table,'*','','ORDER BY ' .$order_by.' ASC','');
		}
		elseif($order_by=='' && $limit=='')
		{
			$product_obj = parent::selectDb($this->table,'*','','');
		}
		elseif($order_by=='' && $limit!='')
		{
			$product_obj = parent::selectDb($this->table,'*','','',"LIMIT $limit[0],$limit[1]");
		}
		elseif($order_by!='' && $limit!='')
		{
			$product_obj = parent::selectDb($this->table,'*','','ORDER BY ' .$order_by.' ASC',"LIMIT $limit[0],$limit[1]");
		}
		if(isset($product_obj) && !empty($product_obj))
		{
			$table_join	= array("product_cat_relation","category_product");
			$dk_join	= array('product_cat_relation.cat_id=category_product.cat_id');
			$kieu_join	= array('inner join');
			$cot_giatri	= array('category_product.cat_id','category_product.cat_name');
			foreach($product_obj as $key => $val){
				$product_obj[$key]['cat'] = parent::selectjoinDb($table_join,$dk_join,$kieu_join,$cot_giatri,'product_cat_relation.pro_id='.$val['pro_id'],'','');
				}
		return $product_obj;
		}
	}
	
	function getProductByCatId($cat_id,$order_by='',$limit='')
	{
		$table_join	= array("product","product_cat_relation","category_product");
		$dk_join	= array('product.pro_id=product_cat_relation.pro_id','product_cat_relation.cat_id=category_product.cat_id');
		$kieu_join	= array('inner join','inner join');
		$cot_giatri	= array('product.pro_id','pro_name','image','tomtat','description','price_niemyet','price_sale','thongsokythuat','image_phu','ma_sp','soluong','product.position','hot','status','mausac','category_product.cat_id','category_product.cat_name');
		if($order_by!='' && $limit==''){
			return parent::selectjoinDb($table_join,$dk_join,$kieu_join,$cot_giatri,'category_product.cat_id='.$cat_id,'ORDER BY ' .$order_by.' ASC','');
		}
		elseif($order_by=='' && $limit=='')
		{
			return parent::selectjoinDb($table_join,$dk_join,$kieu_join,$cot_giatri,'category_product.cat_id='.$cat_id,'','');
		}
		elseif($order_by=='' && $limit!='')
		{
			return parent::selectjoinDb($table_join,$dk_join,$kieu_join,$cot_giatri,'category_product.cat_id='.$cat_id,'',"LIMIT $limit[0],$limit[6]");
		}
		elseif($order_by!='' && $limit!='')
		{
			return parent::selectjoinDb($table_join,$dk_join,$kieu_join,$cot_giatri,'category_product.cat_id='.$cat_id,'ORDER BY ' .$order_by.' ASC',"LIMIT $limit[0],$limit[6]");
		}
	}
	function getProductOfCat($cat_id,$order_by='',$limit='')
	{
		$table_join	= array("product","product_cat_relation");
		$dk_join	= array('product.pro_id=product_cat_relation.pro_id');
		$kieu_join	= array('inner join');
		$cot_giatri	= array('product.pro_id','pro_name','image','tomtat','description','price_niemyet','price_sale','thongsokythuat','image_phu','ma_sp','soluong','product.position','hot','status','mausac','product_cat_relation.cat_id');
		if($order_by!='' && $limit==''){
			return parent::selectjoinDb($table_join,$dk_join,$kieu_join,$cot_giatri,"product_cat_relation.cat_product_id= ".$cat_id,'ORDER BY ' .$order_by.' DESC','');
		}
		elseif($order_by=='' && $limit=='')
		{
			return parent::selectjoinDb($table_join,$dk_join,$kieu_join,$cot_giatri,"product_cat_relation.cat_id=".$cat_id,'','');
		}
		elseif($order_by=='' && $limit!='')
		{
			return parent::selectjoinDb($table_join,$dk_join,$kieu_join,$cot_giatri,"product_cat_relation.cat_id=".$cat_id,'',"LIMIT $limit[0],$limit[1]");
		}
		elseif($order_by!='' && $limit!='')
		{
			return parent::selectjoinDb($table_join,$dk_join,$kieu_join,$cot_giatri,'product_cat_relation.cat_id='.$cat_id,'ORDER BY ' .$order_by.' DESC',"LIMIT $limit[0],$limit[1]");
		}
	}
	function getProductById($id)
	{
		$a = parent::selectDb($this->table,'*',"pro_id=".$id);
		if(!empty($a))
		{
			return $a[0];
		}
		else
		{
			echo "Khong co du lieu";
		}
	}
	function getCatByProductId($pro_id)
	{
		$table_join	= array("product_cat_relation","category_product");
		$dk_join	= array('product_cat_relation.cat_id=category_product.cat_id');
		$kieu_join	= array('inner join');
		$cot_giatri	= array('category_product.cat_id','category_product.cat_name');			
		return parent::selectjoinDb($table_join,$dk_join,$kieu_join,$cot_giatri,'product_cat_relation.pro_id='.$pro_id,'','');
	}
	
	
	
	//tự xây dựng
	
	function getProductBySanphammoi()
	{
		return parent::selectDb($this->table,array('pro_id','pro_name','image','tomtat','description','price_niemyet','price_sale','thongsokythuat','image_phu','ma_sp','soluong','position','hot','status','mausac'),"hot=0",'ORDER BY pro_id desc',"LIMIT 0,6");
	}
	
	function getProductBySanphamnoibat()
	{
		return parent::selectDb($this->table,array('pro_id','pro_name','image','tomtat','description','price_niemyet','price_sale','thongsokythuat','image_phu','ma_sp','soluong','position','hot','status','mausac'),"hot=1",'ORDER BY pro_id desc',"LIMIT 0,3");
	}
	
	
	function getProductByCat($cat_id)
	{
		$table_join	= array("product","product_cat_relation","category_product");
		$dk_join	= array('product.pro_id=product_cat_relation.pro_id','product_cat_relation.cat_id=category_product.cat_id');
		$kieu_join	= array('inner join','inner join');
		$cot_giatri	= array('product.pro_id','pro_name','image','tomtat','description','price_niemyet','price_sale','thongsokythuat','image_phu','ma_sp','soluong','product.position','hot','status','mausac','category_product.cat_id','category_product.cat_name');
			return parent::selectjoinDb($table_join,$dk_join,$kieu_join,$cot_giatri,'category_product.cat_id='.$cat_id,'ORDER BY pro_id desc',"LIMIT 0,6");

	}
	
	function getProductByKhuyenmai()
	{
		return parent::selectDb($this->table,array('pro_id','pro_name','image','tomtat','description','price_niemyet','price_sale','thongsokythuat','image_phu','ma_sp','soluong','position','hot','status','mausac','ngaydangbai'),'','ORDER BY pro_id desc',"LIMIT 0,3");
	}
	
	function getAllKhuyenmai($order_by='',$limit='')
	{
		if($order_by!='' && $limit==''){
			return parent::selectDb($this->table,array('pro_id','pro_name','image','tomtat','description','price_niemyet','price_sale','thongsokythuat','image_phu','ma_sp','soluong','position','hot','status','mausac'),'hot=1','ORDER BY ' .$order_by.' DESC','');
		}
		elseif($order_by=='' && $limit=='')
		{
			return parent::selectDb($this->table,array('pro_id','pro_name','image','tomtat','description','price_niemyet','price_sale','thongsokythuat','image_phu','ma_sp','soluong','position','hot','status','mausac'),'hot=1','','');
		}
		elseif($order_by=='' && $limit!='')
		{
			return parent::selectDb($this->table,array('pro_id','pro_name','image','tomtat','description','price_niemyet','price_sale','thongsokythuat','image_phu','ma_sp','soluong','position','hot','status','mausac'),'hot=1','',"LIMIT $limit[0],$limit[1]");
		}
		elseif($order_by!='' && $limit!='')
		{
			return parent::selectDb($this->table,array('pro_id','pro_name','image','tomtat','description','price_niemyet','price_sale','thongsokythuat','image_phu','ma_sp','soluong','position','hot','status','mausac'),'hot=1','ORDER BY ' .$order_by.' DESC',"LIMIT $limit[0],$limit[1]");
		}
	}
	
	/*chon tieu đề tin ko cho show cái tiêu đề đang ở đó*/
	function getAllProDocThem($id,$order_by='')
	{
		if($order_by!=''){
			return parent::selectDb($this->table,array("pro_id","pro_name","tomtat"),'pro_id!='.$id,'ORDER BY ' .$order_by.'DESC','limit 0,4');
		}
		else
		{
			return parent::selectDb($this->table,array("pro_id","pro_name","tomtat"),'pro_id!='.$id,'','limit 0,4');
		}
	}
}
?>