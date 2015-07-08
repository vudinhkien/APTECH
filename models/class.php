<?php
class database{
	var $dbc;
	function database()
	{
		global $host, $user_db, $pass_db,$csdl;
		$this->dbc = mysqli_connect($host,$user_db,$pass_db,$csdl) or die("Co loi xay ra".mysqli_error());
		mysqli_set_charset($this->dbc, "utf8");
	}
	function __destruct()
	{
		//echo "đã hủy";
		mysqli_close($this->dbc);
	}
	private function getTableJoins($table_names,$join_conditions,$join_type)
   {
	   if(is_array($table_names))
		{	
			$loop_table=0;		
			foreach($table_names as $table_name)
			{
				if($loop_table==0)
				{
					$table_join=trim($table_name);
				}
				else
				{
					$table_join=$table_join." ". $join_type[$loop_table-1]." ".trim($table_name)." ON ".$join_conditions[$loop_table-1];}
					
				$loop_table++;
			}
		}	
		return $table_join;
   }
	protected function insert_data($table,$arr_cot_giatri)
	{
		$column = '';
		$values = '';
		foreach($arr_cot_giatri as $col => $val)
		{
			$column .= ''.$col.',';
			$values .= "'".mysqli_real_escape_string($this->dbc,$val)."',";
		}
		$column = rtrim($column,',');
		$values = rtrim($values,',');
		$sql = "INSERT INTO $table ($column) VALUES ($values)";
		//echo $sql;
		mysqli_query($this->dbc, $sql);
		if (mysqli_affected_rows($this->dbc)){
			//return true;
			return mysqli_insert_id($this->dbc);
		}
		else
		{
			return false;
		}
	}
	protected function insert_multi_data($table,$arr_2_chieu)
	{
		$arr_values = array();
		$values_new = '';
		foreach($arr_2_chieu as $arr_cot_giatri)
		{
			$values = '';
			$column = '';
			foreach($arr_cot_giatri as $col => $val)
			{
				$column .= $col.',';
				$values .= "'".$val."',";
			}
			//$column = rtrim($column,',');
			$values = rtrim($values,',');
			$arr_values[] = $values;
		}
		foreach($arr_values as $col)
		{
			$values_new .= "(".mysqli_real_escape_string($this->dbc,$col)."),";
		}
		$values_new = rtrim($values_new,',');
		$column = rtrim($column,',');
		//echo $values_new;
		$sql = "INSERT INTO $table ($column) VALUES $values_new";
		//echo $sql;
		if (mysqli_query($this->dbc, $sql)){
			echo 'insert thanh cong';
		}
		else
		{
			echo "thất bại";
		}
	}
	protected function updateDb($table,$arr_cot_giatri,$dieukien)
	{
		$column_value = '';
		foreach($arr_cot_giatri as $col => $val)
		{
			$column_value .= $col."='".mysqli_real_escape_string($this->dbc,$val)."',";
		}
		$column_value = rtrim($column_value,',');
		$sql = "UPDATE $table SET $column_value WHERE $dieukien";
		//echo $sql;
		mysqli_query($this->dbc, $sql);
		if (mysqli_affected_rows($this->dbc)){
			return true;
		}
		else
		{
			return false;
		}
	}
	protected function deleteDb($table,$dieukien)
	{
		$sql = "DELETE FROM $table WHERE $dieukien";
		mysqli_query($this->dbc, $sql);
		if (mysqli_affected_rows($this->dbc)){
			return true;
		}
		else
		{
			return false;
		}
	}
	protected function selectDb($table,$arr_cot,$dieukien='',$order_by='',$limit='')
	{
		$column = '';
		if(is_array($arr_cot))
		{
			foreach ($arr_cot as $col)
			{
				$column .= $col.",";	
			}
			$column = rtrim($column,", ");
		}
		elseif($arr_cot=="*")
		{
			$column = "*";
		}
		if($dieukien == '' && $order_by=='' && $limit=='')
		{
			$sql = "SELECT $column FROM $table";
		}
		elseif($dieukien != '' && $order_by!='' && $limit!='')
		{
			$sql = "SELECT $column FROM $table WHERE $dieukien $order_by $limit";
			
		}
		elseif($dieukien == '' && $order_by!='' && $limit=='')
		{
			$sql = "SELECT $column FROM $table $order_by";
		}
		elseif($dieukien != '' && $order_by!='' && $limit=='')
		{
			$sql = "SELECT $column FROM $table WHERE $dieukien $order_by";
		}
		elseif($dieukien != '' && $order_by=='' && $limit=='')
		{
			$sql = "SELECT $column FROM $table WHERE $dieukien";
		}
		
		elseif($dieukien == '' && $order_by!='' && $limit!='')
		{
			$sql = "SELECT $column FROM $table $order_by $limit";
		}
		elseif($dieukien != '' && $order_by=='' && $limit!='')
		{
			$sql = "SELECT $column FROM $table WHERE $dieukien $limit";
		}
		elseif($dieukien == '' && $order_by=='' && $limit!='')
		{
			$sql = "SELECT $column FROM $table $limit";
		}
		//echo $sql;
		$result = mysqli_query($this->dbc, $sql);
		$arr_group = array();
		while ($row = mysqli_fetch_assoc($result))
		{
			$arr_group[] = $row; 	
		}
		mysqli_free_result($result);
		return $arr_group;
	}
	function selectjoinDb($table_names,$join_conditions,$join_type,$arr_cot=array(),$dieukien='',$order_by='',$limit='')
	{
		$table_join = $this->getTableJoins($table_names,$join_conditions,$join_type);
		$column = '';
		foreach ($arr_cot as $col)
		{
			$column .= $col.",";	
		}
		$column = rtrim($column,", ");
		if($dieukien == '' && $order_by=='' && $limit=='')
		{
			$sql = "SELECT $column FROM $table_join";
		}
		elseif($dieukien != '' && $order_by!='' && $limit!=''){
			$sql = "SELECT $column FROM $table_join WHERE $dieukien $order_by $limit";
		}
		elseif($dieukien == '' && $order_by!='' && $limit==''){
			$sql = "SELECT $column FROM $table_join $order_by";
		}
		elseif($dieukien != '' && $order_by=='' && $limit=='')
		{
			$sql = "SELECT $column FROM $table_join WHERE $dieukien";
		}
		elseif($dieukien != '' && $order_by!='' && $limit=='')
		{
			$sql = "SELECT $column FROM $table_join WHERE $dieukien $order_by";
		}
		elseif($dieukien == '' && $order_by!='' && $limit!=''){
			$sql = "SELECT $column FROM $table_join $order_by $limit";
		}
		elseif($dieukien != '' && $order_by=='' && $limit!='')
		{
			$sql = "SELECT $column FROM $table_join WHERE $dieukien $limit";
		}
		elseif($dieukien == '' && $order_by=='' && $limit!='')
		{
			$sql = "SELECT $column FROM $table_join $limit";
		}
		//echo $sql;
		$result = mysqli_query($this->dbc, $sql);
		$arr_group = array();
		while ($row = mysqli_fetch_assoc($result))
		{
			$arr_group[] = $row; 	
		}
		mysqli_free_result($result);
		return $arr_group;
	}
	function countTable($table){
		
		$sql = "SELECT COUNT(*) FROM $table";
		$result = mysqli_query($this->dbc, $sql);
		while ($row = mysqli_fetch_row($result))
		{
			 return $row[0];	
		}
		
	}
		//đếm bản ghi kèm điều kiện
	function countTableWhere($table,$dieukien =""){
		if($dieukien=='')
		{
			$sql =  "SELECT COUNT(*) FROM $table";
		}
		elseif($dieukien != '')
		{
			$sql =  "SELECT COUNT(*) FROM $table WHERE $dieukien";
		}
		//$sql = "SELECT COUNT(*) FROM $table WHERE $dieukien";
		$result = mysqli_query($this->dbc, $sql);
		while ($row = mysqli_fetch_row($result))
		{
			 return $row[0];
		}

	}
	
	function getList($sql)
	{
		$temp = array();
		$result = mysqli_query($this->dbc, $sql);
		while ($row = mysqli_fetch_assoc($result)){
			$temp[] = $row;
		}
		mysqli_free_result($result); 
		if(!empty($temp)){
			return $temp;
		}
		else
			echo "Không có dữ liệu";
	}
	function getRow($sql)
	{
		$result = mysqli_query($this->dbc, $sql);
		$row = mysqli_fetch_assoc($result);
		mysqli_free_result($result);
		if ($row)
		{
			return $row;
		}
		else
		{
			$row = "khong co ban ghi";
			return $row;
		}
	}
}
?>