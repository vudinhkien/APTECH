<?php
class search extends database
{
	public $keyword;//thuộc tính chứa từ khóa tìm kiém
	public $table; //thuộc tính dạng mảng chứa danh sách các bảng muốn tìm kiếm
	public $column_dk; //thuộc tính dạng mảng 2 chiều, chứa danh sách các cột điều kiện tìm kiếm
	public $column_kq;//thuộc tính dạng mảng 2 chiều, chứa danh sách các cột dữ liệu muốn lấy ra
	
	//phương thức này dùng để kiểm tra xem 1 mảng có phải là 2 chiều hay không
	private function check_array_2dimension($arr)
	{
		foreach($arr as $val) // vòng lặp thứ nhất kiểm tra xem giá trị của mảng truyền vào có phải là mảng hay không
		{
			if(!is_array($val)) // nếu không phải tức là mảng này có ít nhất 1 phần tử có giá trị không phải là mảng nên return false luôn
			{
				return false;
			}
			else // nếu phải tức là phần tử này của mảng là mảng, nên ta kiểm tra tiếp giá trị của mảng đó có phải mảng hay không, nếu phải thì tức là phần tử này của mảng ít nhất là 3 chiều trở lên, nếu là 3 chiều trở lên thì return false luôn
			{
				foreach($val as $val1)
				{
					if(is_array($val1))
					{
						return false;
					}
				}
			}
		}
		return true;// nếu các vòng kiểm tra ở trên không có bất kỳ phần tử nào bị return false thì có nghĩa mảng này là mảng 2 chiều
	}
	
	// Nếu sử dụng phương pháp fulltext search thì bắt buộc phải gọi phương thức này đầu tiên (chỉ gọi 1 lần, chạy xong thì xóa đi). Phương thức này cập nhật lại các cột trong bảng thêm thuộc tính add fulltext cho bảng
	function setFullIndexTable()
	{
		if(is_array($this->table) && $this->check_array_2dimension($this->column_dk))//kiểm tra xem mảng table có đúng là mảng hay không, kiểm tra xem mảng chứa các cột điều kiện lọc có đúng là mảng 2 chiều hay không
		{
			$str = '';
			$flag = array();
			for($i=0;$i<count($this->table);$i++)// duyệt qua các phần tử của mảng table
			{
				foreach($this->column_dk[$i] as $val) // với mỗi phần tử của mảng table được duyệt qua tương ứng với việc duyệt qua từng phần tử trong mảng column_dk, vì mảng column_dk là mảng 2 chiều nên ta dùng 1 vòng lặp nữa để duyệt phần tử thứ i của mảng column_dk để lấy ra danh sách các cột
				{
					$str .= $val.',';//nối chuỗi, chuyển từ dạng mảng về dạng chuỗi list các cột trong bảng, cách nhau bởi dấu phẩy theo cú pháp mysql
				}
				$str = rtrim($str,',');//kết thúc vòng lặp thì sẽ bị thừa dấu phẩy ở cuối cùng nên dùng hàm rtrim để cắt dấu phẩy cuối cùng đi
				$tb = $this->table[$i];// tạo một biến tạm để lưu trữ tên bảng thứ i
				$sql = "ALTER TABLE $tb ADD FULLTEXT($str)"; //cú pháp câu lệnh sql ALTER TABLE ten_bang ADD FULLTEXT(ten_cot_1,ten_cot_2,...)
				mysqli_query($this->dbc,$sql);// thực hiện câu lệnh query;
				if(mysqli_affected_rows($this->dbc))//kiểm tra xem sau khi alter bảng có thay đổi gì không
				{
					$flag["$tb"] = 1;//nếu có tức là thành công, đánh dấu mảng flag với khóa là tên bảng với giá trị bằng 1
				}
				else
				{
					$flag["$tb"] = 0;//nếu có tức là thất bại, đánh dấu mảng flag với khóa là tên bảng với giá trị bằng 0
				}
				$str = '';//reset lại biến string để tiếp tục sử dụng cho vòng lặp kế tiếp
			}
			if(!in_array(0,$flag))//kiểm tra xem có bất kỳ phần tử nào của mảng flag có giá trị bằng 0 hay không, nếu không có giá trị nào bằng 0 thì tức là cập nhật thành công hoàn toàn
			{
				echo "Cập nhật bảng thành công";
			}
			else//nếu không thành công thì duyệt mảng flag, in ra cho người dùng biết là bảng nào cập nhật không thành công
			{
				foreach($flag as $key => $val)//duyệt theo 2 giá trị key và value
				{
					if($val==0) //nếu có val nào bằng 0 thì in ra key của phần tử mảng đó
					{
						echo "Bảng $key cập nhật không thành công";
					}
				}
			}
		}
		else //nếu người đưa sai dữ liệu dạng mảng đầu vào thì sẽ thông báo lỗi
		{
			echo "Table và column bạn phải nhập dưới dạng mảng, chú ý mảng column là mảng 2 chiều";
		}
	}
	
	//Phương thức tìm kiếm bằng LIKE, chú ý là phương thức này trong thực tế ít dùng bởi vì khi dùng LIKE thì Mysql không index mà sẽ duyệt toàn bộ các record trong bảng được tìm kiếm, vì vậy tốc độ tìm kiếm sẽ rất chậm, không phù hợp với dữ liệu lớn, và LIKE thì không hỗ trợ tìm kiếm gần đúng. Tuy nhiên tôi vẫn viết phương thức này để cho mọi ng tham khảo
	function seachLikeMethod()
	{
		if(is_array($this->table) && $this->check_array_2dimension($this->column_dk) && $this->check_array_2dimension($this->column_kq))//kiểm tra mảng đầu vào có đúng tiêu chuẩn hay không. Kiểm tra xem mảng table có đúng là mảng hay không, kiểm tra xem mảng chứa các cột điều kiện lọc có đúng là mảng 2 chiều hay không, mảng chứa các cột kết quả có đúng là mảng hay không
		{
			$str='';
			$str1='';
			$sql = '';
			$count = count($this->table);//lấy kích thước mảng
			$this->keyword = mysqli_real_escape_string($this->dbc,$this->keyword);//mã hóa các ký tự đặc biệt (nếu có) trước khi query
			if($count==1)// trường hợp mảng có 1 phần tử, tức là chỉ tìm kiếm từ 1 bảng
			{
				foreach($this->column_kq[0] as $val)//vì table chỉ có 1 nên tương ứng cũng chỉ có 1 phần tử trong mảng column_kq nên ta duyệt phần tử 0
				{
					$str .= $val.',';//nối chuỗi, chuyển từ dạng mảng về dạng chuỗi list các cột trong bảng, cách nhau bởi dấu phẩy theo cú pháp mysql
				}
				$str = rtrim($str,',');//kết thúc vòng lặp thì sẽ bị thừa dấu phẩy ở cuối cùng nên dùng hàm rtrim để cắt dấu phẩy cuối cùng đi
				foreach ($this->column_dk[0] as $val) //vì table chỉ có 1 nên tương ứng cũng chỉ có 1 phần tử trong mảng column_dk nên ta duyệt phần tử 0
				{
					$str1 .= $val." LIKE '%$this->keyword%' OR ";//nối chuỗi, với mỗi cột ta gắn thêm mệnh đề LIKE với từ khóa tìm kiếm được truyền vào
				}
				$str1 = rtrim($str1,' OR ');//kết thúc vòng lặp thì sẽ thừa ký tự ' OR ' ở cuối nên dùng hàm rtrim để cắt
				$tb = $this->table[0];
				$sql = "SELECT $str FROM $tb WHERE $str1";//SELECT cot1,cot2,cot... WHERE ten_bang LIKE cot1 'tu_khoa_tim_kiem' or LIKE cot2 'tu_khoa_tim_kiem'
			}
			else //ý nghĩa các dòng lệnh tương tự ở trên, chỉ khác là khi mảng table >1, tức là tìm kiếm nhiều hơn 1 bảng thì ta duyệt bảng bằng vòng for
			{
				for($i=0;$i<$count;$i++)//duyệt bảng
				{
					foreach($this->column_kq[$i] as $val)
					{
						$str .= $val.',';
					}
					$str = rtrim($str,',');//kết thúc vòng lặp thì sẽ bị thừa dấu phẩy ở cuối cùng nên dùng hàm rtrim để cắt dấu phẩy cuối cùng đi
					foreach($this->column_dk[$i] as $val)
					{
						$str1 .= $val." LIKE '%$this->keyword%' OR ";
					}
					$str1 = rtrim($str1,' OR ');
					$tb = $this->table[$i];
					$sql .= "SELECT $str FROM $tb WHERE $str1 UNION "; //kết thúc mỗi lần duyệt foreach thì ta thêm UNION ở cuối để nối kết quả tìm kiếm của bảng khác
					$str = '';
					$str1 = '';
				}
				$sql = rtrim($sql,' UNION ');//kết thúc vòng for sẽ thừa 1 từ ' UNION ' nên dùng rtrim để cắt
				echo $sql;
			}
			return $this->getList($sql);// gọi tới phương thức getList kế thừa từ class database, để lấy ra kết quả dạng mảng
		}
	}
	
	//tìm kiếm bằng fulltext search, một số chú ý như sau: để tìm kiếm không dấu thì tất cả nội dung phải chuyển về utf8 nhé. Trong class database. Ở hàm tạo database tôi có gõ nhầm mysqli_set_charset($this->dbc, "utf-8") -> các bạn sửa thành mysqli_set_charset($this->dbc, "utf8"); nhé. Sau khi sửa thì những text cũ trong db sẽ bị lỗi, mọi ng nhập lại hoặc sửa trực tiếp trong db nh
function setTableToMyISAM()
{
		if(is_array($this->table))
		{
			$flag = array();
			foreach($this->table as $tbl)
		{
			$sql = "ALTER TABLE $tbl ENGINE=MyISAM;";
			mysqli_query($this->dbc,$sql);
		if(mysqli_affected_rows($this->dbc))
		{
		$flag["$tbl"] = 1;
		}
		else
		{
		$flag["$tbl"] = 0;
		}
		}
		if(!in_array(0,$flag))
		{
		echo "Cập nhật bảng thành công";
		}
		else
		{
		foreach($flag as $key => $val)
		{
		if($val==0)
		{
		echo "Bảng $key cập nhật không thành công";
		}
		}
		}
		}
		}
function setTableToInnoDB()
{
if(is_array($this->table))
{
$flag = array();
foreach($this->table as $tbl)
{
$sql = "ALTER TABLE $tbl ENGINE=InnoDB;";
mysqli_query($this->dbc,$sql);
if(mysqli_affected_rows($this->dbc))
{
$flag["$tbl"] = 1;
}
else
{
$flag["$tbl"] = 0;
}
}
if(!in_array(0,$flag))
{
echo "Cập nhật bảng thành công";
}
else
{
foreach($flag as $key => $val)
{
if($val==0)
{
echo "Bảng $key cập nhật không thành công";
}
}
}
}
}
	function seachFullTextMethod()
	{
		if(is_array($this->table) && $this->check_array_2dimension($this->column_dk) && $this->check_array_2dimension($this->column_kq))// kiểm tra bảng
		{
			$str='';
			$str1='';
			$sql = '';	
			$count = count($this->table);
			$this->keyword = mysqli_real_escape_string($this->dbc,$this->keyword);
			if($count==1)
			{
				foreach($this->column_kq[0] as $val)
				{
					$str .= $val.',';
				}
				$str = rtrim($str,',');
				$str1 = "MATCH (";
				foreach ($this->column_dk[0] as $val)
				{
					$str1 .= $val.",";
				}
				$str1 = rtrim($str1,',');
				$str1 .= ") AGAINST ('$this->keyword')"; 
				$tb = $this->table[0];
				$sql = "SELECT $str FROM $tb WHERE $str1";// cú pháp fulltext search là: SELECT cot1,cot2.. FROM ten_bang MATCH(cot dieu kien) AGAINST ('từ khóa tìm kiếm')
			}
			else
			{
				for($i=0;$i<$count;$i++)
				{
					foreach($this->column_kq[$i] as $val)
					{
						$str .= $val.',';
					}
					$str = rtrim($str,',');
					$str1 = "MATCH (";
					foreach($this->column_dk[$i] as $val)
					{
						$str1 .= $val.",";
					}
					$str1 = rtrim($str1,',');
					$str1 .= ") AGAINST ('$this->keyword')";
					$tb = $this->table[$i];
					$sql .= "SELECT $str FROM $tb WHERE $str1 UNION "; 
					$str = '';
					$str1 = '';
				}
				$sql = rtrim($sql,' UNION ');
				
			}
			//echo $sql;
			return $this->getList($sql); // gọi tới phương thức getList kế thừa từ class database, để lấy ra kết quả dạng mảng
		}
	}
}
?>