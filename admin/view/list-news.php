<?php
require_once('../models/class-news.php');
require_once('../models/class-cat.php');
require_once('../models/class-phan-trang.php');
$news_obj = new news();
$config = array(
    'current_page'  => isset($_GET['page']) ? $_GET['page'] : 1, // Trang hiện tại
    'total_record'  => $news_obj->countTable('news'), // Tổng số record
    'limit'         => 3,// số record mỗi trang
    'link_full'     => 'index.php?view=list-news&page={page}',// Link full có dạng như sau: domain.com/index.php?view=list-view&page={page}
    'link_first'    => 'index.php?view=list-news',// Link trang đầu tiên
    'range'         => 9 // Số button trang muốn hiển thị
);
$start = (($config['current_page'] - 1)*$config['limit']) ;
$sort = '';
if(isset($_GET['sort']))
{
	$sort = $_GET['sort'];
}
switch ($sort){ 
	case 'title':
		$a = $news_obj->getAllNews('title',array($start,$config['limit']));
		break;
	case 'cat_id':
		$a = $news_obj->getAllNews('cat_id',array($start,$config['limit']));
		break;
	default:
		$a = $news_obj->getAllNews('',array($start,$config['limit']));
}
?>
    <table class="table table-bordered table-striped table-condensed flip-content">
        <thead class="flip-content">
            <tr>
                <th>STT</th>
                <th><a href="index.php?view=list-news&sort=title">Tiêu đề</a></th>
                 <th class="numeric">Ảnh</th>
                 <th class="numeric">Mô tả ngắn</th>
                 <th class="numeric"><a href="index.php?view=list-news&sort=cat">Danh mục</a></th>
                <th class="numeric">Sửa</th>
                <th class="numeric">Xóa</th>
            </tr>
        </thead>
        <tbody>
        <?php
			$i = 0;
			foreach($a as $val)
			{
				$i++;
		?>
            <tr>
                <td><?php echo $i?></td>
                <td><a href="index.php?view=form-news&act=update&id=<?php echo $val['news_id']; ?>"><?php echo $val['title'];?></a></td>
                <td class="numeric"><img width="200" src="../uploads/<?php echo $val['images'];?>"</td>
                <td class="numeric"><?php echo $val['tomtat'];?></td>
                <?php
					$cat_obj = new category();
					$temp_cat = $cat_obj->getCatById($val['cat_id']);
				?>
                <td class="numeric"><?php echo $temp_cat['cat_name'];?></td>
                <form action="control/proccess-news.php" method="post">
                <td class="numeric">
                <a href="index.php?view=form-news&act=update&id=<?php echo $val['news_id']; ?>" class="btn default btn-xs purple"><i class="fa fa-edit"></i>
                Sửa</a></td>
                <td class="numeric">
                <input type="hidden" name="act" value="xoa" />
                <input type="hidden" name="id" value="<?php echo $val['news_id'];?>" />
                <input type="submit" value="Xóa" /></a><strong></strong></td>
                
                </form>
            </tr>
            <?php
			}
			?>
        </tbody>
    </table>
<?php
$paging = new PhanTrang($config);
echo $paging->html();
?>
