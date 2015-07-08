<?php
require_once("models/class.php");
require_once("models/class-news.php");
?>
<style>
.xemthem1 a
{
	color:#0C0
}
.xemthem1 a:hover
{
	color:#C90
}
</style>

<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.3";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>



<div style="  width:700px;" class="news-detail">
        <!--lấy bài viết-->
        <?php
                $news_obj = new news();
                $news = $news_obj->getNewsById($_GET['n_id']);
        ?>
        <div class="doc-tintuc" style=" padding-top:20px;border:#287FA2 solid 1px; margin-top:10px; line-height:20px; padding-left:10px;padding-right:10px;">
            <ul>
                <li style=" text-align:center; line-height:40px; font-size:2em; font-weight:bold; color:#287FA2; margin-top:5px; margin-bottom:10px;">
                    <?php echo $news['title'] ;?>
                </li>
                <li>
                <p style="padding-top:3px; float:right;"><?php $date_int = strtotime( $news['ngaydangbai'] );
													$time_vietnam = date('d-m-Y', $date_int );
													echo $time_vietnam;  ?>
                 </p>
                 </li>
                <li style=" padding-top:20px;font-size:1.2em; font-weight:bold; margin-top:25px; margin-bottom:10px;">
                   <b><?php echo $news['tomtat'] ;?></b>
                </li>
               
                <li>
                 	
                            <div style="background-color:#F1F1F1; color:#090; margin-bottom:20px;" class="xemthem1">
                                <ul>
                                <li>
                                    <?php
										$new = $news_obj->getAllnewsDocThem($_GET['n_id']);
										foreach($new as $val){
                                    ?>
                                        <p style="color:#0F0"> &bull; <a href="index.php?view=news-detail&n_id=<?php echo $val["news_id"] ?>"><?php echo $val["title"] ?></a></p>
                                 </li>
                                    <?php }?>
                    		  </div><!-- end xemthem -->


                </li>
                <li>
                    <img style="margin-left:40px;" width="580" height="375" src="uploads/<?php echo $news['images']; ?>"  width="580">
                </li>
                
                <li style=" padding-top:20px;">
                    <?php echo $news['content']; ?>
                </li>
               
            </ul>
        </div>
        
        
        <div style="border:#CCC solid 1px;width:699px; margin-top:30px;" class="fb-comments" data-href="index.php?view=news-detail&n_id=<?php echo $news["news_id"] ?>" data-numposts="5" data-colorscheme="light"></div>
		</div>