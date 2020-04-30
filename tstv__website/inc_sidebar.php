<?php
require_once("config.php");
$currentuserid = getCookie("userid");

$mycon = databaseConnect();
require_once("inc_dbfunctions.php");
$dataRead = New DataRead();

$contentslist_sidebar = $dataRead->articles_list($mycon, "ORDER BY rand() LIMIT 1", "");
$categorieslist_sidebar = $dataRead->categories_list($mycon);

?>

<div class="lx-sidebar">
<?php
    if(strpos(CurrentPageURL(),"contents-") !== false)
    {
?>
        <!-- Side Bar Item -->
        <div class="lx-sidebar-item" style="border-bottom: none;">
            <!-- Side Bar Item Title -->
            <div class="lx-sidebar-item-title">
                <h2>&nbsp;</h2>
            </div>
            <div class="lx-tags">
                    <ul>
    <?php
        foreach($categorieslist_sidebar as $row)
        {
            if($row['articlecount'] < 1)        continue;            
    ?>
                            <li><a href="contents-category.php?code=<?php echo $row['category_id'] ?>"><?php echo $row['name'] ?></a></li>
    <?php
        }
    ?>
                    </ul>
                    <div class="lx-clear-fix"></div>
            </div>
        </div>
<?php
    }
?>
        <!-- Side Bar Item -->
        <div class="lx-sidebar-item">
                <!-- Side Bar Item Title -->
                <!-- Side Bar Item Content -->
                <div class="lx-sidebar-item-content">
                        <!-- Tabs Nav -->
                        <div class="lx-clear-fix"></div>
                        <!-- Tabs Items -->
                        <div class="lx-latest-news lx-tab lx-main-tab">
                                <!-- Latest News Item -->
<?php
foreach($contentslist_sidebar as $row)
{
    //var_dump($row);
?>            
                                <div class="lx-latest-news-item">
                                        <div class="lx-latest-news-item-img lx-width-90" style="width: 100% !important">
                                                <a href="contents-view.php?code=<?php echo $row['article_id'] ?>"><img src="pictures/articles/<?php echo $row['article_id'] ?>_image.jpg" alt="<?php echo $row['headline'] ?>" /></a>
                                        </div>
                                        <div class="lx-clear-fix"></div>
                                </div>
<?php
}
?>
                        </div>
                </div>
        </div>
        <!-- Side Bar Item -->
        <div class="lx-sidebar-item">
                <!-- Side Bar Item Title -->
                <div class="lx-sidebar-item-title">
                        <h2>ADVERT</h2>
                </div>
                <!-- Side Bar Item Content -->
                <div class="lx-sidebar-item-content lx-p-0">
                        <!-- Side Bar Event -->
                        <?php require_once("inc_adverts.php"); show_advert_horizontal(); ?>
                </div>
        </div>
        <!-- Side Bar Item -->
        <div class="lx-sidebar-item">
                <!-- Side Bar Item Title -->
                <div class="lx-sidebar-item-title">
                        <h2>SOCIAL MEDIA</h2>
                </div>
                <!-- Side Bar Item Content -->
                <div class="lx-sidebar-item-content">
                        <!-- Side Bar Social Media -->
                        <div class="lx-sidebar-social-media">
                                <!-- Side Bar Social Media Item -->
                                <div class="lx-sidebar-social-media-item lx-facebook">
                                        <i class="fa fa-facebook"></i>
                                        <h3>JOIN US ON FACEBOOK</h3>
                                        <a href="https://www.facebook.com/TSTVAfrica/">@tstvafrica</a>
                                </div>
                                <!-- Side Bar Social Media Item -->
                                <div class="lx-sidebar-social-media-item lx-twitter">
                                        <i class="fa fa-twitter"></i>
                                        <h3>FOLLOW US ON TWITTER</h3>
                                        <a href="https://twitter.com/tstvafrica">@tstvafrica</a>
                                </div>
                                <!-- Side Bar Social Media Item -->
                                <div class="lx-sidebar-social-media-item lx-instagram">
                                        <i class="fa fa-instagram"></i>
                                        <h3>FOLLOW US ON INSTAGRAM</h3>
                                        <a href="https://www.instagram.com/tstvafrica">@tstvafrica</a>
                                </div>
                                <!-- Side Bar Social Media Item -->
                                <div class="lx-sidebar-social-media-item lx-youtube">
                                        <i class="fa fa-youtube"></i>
                                        <h3>STAY TUNE ON YOUTUBE</h3>
                                        <a href="https://www.youtube.com/tstvafrica_official">@tstvafrica_official</a>
                                </div>
                        </div>
                </div>
        </div>
        <!-- Side Bar Item -->
        <div class="lx-sidebar-item">
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.9";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>        
                <!-- Side Bar Item Title -->
                <div class="lx-sidebar-item-title">
                        
                </div>
                <!-- Side Bar Item Content -->
                <div class="fb-page" data-href="https://www.facebook.com/tstvafrica" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/tstvafrica" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/tstvafrica">TSTV</a></blockquote></div>
        </div>
        <!-- Side Bar Item -->
</div>