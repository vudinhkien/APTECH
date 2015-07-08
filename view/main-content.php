
        	
				<div id="main-content">
			<?php
						if(isset($_GET['view']))
						{
							switch ($_GET['view']) {
							case 'product-cat':
								include('view/pro-cat.php');
								break;
							case 'product':
								include('view/pro-all-menu.php');
								break;
							case 'news':
								include('view/news-all-menu.php');
								break;	
							case 'product-detail':
								include('view/pro-detail.php');
								break;
							case 'tintucsp-detail':
								include('view/tintuc-product-detail.php');
								break;
							case 'gioithieu':
								include('view/gioithieu.php');
								break;
							case 'search':
								include('view/search.php');
								break;
							
							case 'news-detail':
								include('view/news-detail.php');
								break;
							case 'lienhe':
								include('view/lienhe.php');
								break;
							case 'quangcao':
								include('view/quangcao.php');
								break;
							case 'cart':
								include('view/cart.php');
								break;
							case 'danhmuc-product-detail':
								include('view/danhmuc-product-detail.php');
								break;
			//				case 'check-out':
			//					include('view/check-out.php');
			//					break;
							}
						}
						else
						{
							include('view/home.php');	
						}
				?>
				</div>