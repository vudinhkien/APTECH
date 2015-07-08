<?php
function thongbao($stt)
{
	if($stt=="success")
	{
		echo "thanh cong";
	}
	elseif($stt=="fail")
	{
		echo "that bai";
	}
}

function upload_image($filename,$newfilename)
{
	if($filename['size'] < 1048576 && $filename['type'] == "image/jpeg" || $filename['type'] == "image/png" || $filename['type'] == "image/gif")
			{
				$path 	= "../../uploads/";
				if(move_uploaded_file($filename['tmp_name'],$path.$newfilename))
				{
					return true;
				}
				else
				{
					return false;
				}
			}
			else
			{
				return false;
			}
}

function cattext($text, $count, $wrapText='...'){

    if(strlen($text)>$count){
        preg_match('/^.{0,' . $count . '}(?:.*?)\b/siu', $text, $matches);
        $text = $matches[0];
    }else{
        $wrapText = '';
    }
    return $text . $wrapText;
}
function reDirect($url)
{
	echo '<script>window.location.replace("'.$url.'");</script>';
}

// This function will take $_SERVER['REQUEST_URI'] and build a breadcrumb based on the user's current path
function breadcrumbs($separator = ' &raquo; ', $home = 'Home') {
    // This gets the REQUEST_URI (/path/to/file.php), splits the string (using '/') into an array, and then filters out any empty values
    $path = array_filter(explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));

    // This will build our "base URL" ... Also accounts for HTTPS :)
    $base = ($_SERVER['HTTPS'] ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';

    // Initialize a temporary array with our breadcrumbs. (starting with our home page, which I'm assuming will be the base URL)
    $breadcrumbs = Array("<a href=\"$base\">$home</a>");

    // Find out the index for the last value in our path array
    $last = end(array_keys($path));

    // Build the rest of the breadcrumbs
    foreach ($path AS $x => $crumb) {
        // Our "title" is the text that will be displayed (strip out .php and turn '_' into a space)
        $title = ucwords(str_replace(Array('.php', '_'), Array('', ' '), $crumb));

        // If we are not on the last index, then display an <a> tag
        if ($x != $last)
            $breadcrumbs[] = "<a href=\"$base$crumb\">$title</a>";
        // Otherwise, just display the title (minus)
        else
            $breadcrumbs[] = $title;
    }

    // Build our temporary array (pieces of bread) into one big string :)
    return implode($separator, $breadcrumbs);
}

//cách gọi hàm breadcrumb
//<p> breadcrumbs() </p>
//<p> breadcrumbs(' > ') </p>
//<p> breadcrumbs(' ^^ ', 'Index') </p>

function buildMenuFrontend($items, $parent = 0)
{
    $menu_con = false;
	if($parent!=0){
		$menu_html = '<ul id="sub-menu">%s</ul>';
	}
	else
	{
		$menu_html = '<ul>%s</ul>';
	}
    $menu_con_html = '';

    foreach($items as $item)
    {
        if ($item['parent_id'] == $parent) {
            $menu_con = true;
			$url = $item['url'];
            $menu_con_html .= "<li><a href='index.php?$url'>".$item['menu_name']."</a>";         
            $menu_con_html .= buildMenuFrontend($items, $item['menu_id']);         
            $menu_con_html .= '</li>';        
        }
    }

    // Không có menu con thì bỏ thẻ ul
    if (!$menu_con) {
        $menu_html = '';
    }

    return sprintf($menu_html, $menu_con_html);//hàm sprintf dùng để điền một chuỗi với tham số %s
}

?>