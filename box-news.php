<?php
if(!defined('DOKU_TEMP')) define('DOKU_TEMP',DOKU_INC.'data/tmp/');
if(!file_exists(DOKU_TEMP.'tpl')) mkdir(DOKU_TEMP.'tpl');
$cacheFile = DOKU_TEMP.'tpl/news.tmpo';
$updateInterval = 1800;
$data = new stdClass();
$data->timestamp = 0;
$data->novinky = array();
if(file_exists($cacheFile)){
     $handle = fopen($cacheFile,'r');
     $data = unserialize(fread($handle, filesize($cacheFile)));
     fclose($handle);
}
//
if((time()-$data->timestamp)>$updateInterval){
     $data->novinky = array();
     $feed = new FeedParser();
     $feed->set_feed_url('http://www.pirati.cz/piznam/feed.php?mode=blogtng&blog=tz&ns=stanoviska&num=5&linkto=current&content=html');
     $feed->init();
     $novinky = $feed->get_items();
     foreach($novinky as $num=>$new){
          $data->novinky[] = array(
               'title' => $new->get_title(),
               'link' => $new->get_link(),
               'date' => $new->get_local_date('%e.&nbsp;%B&nbsp;%Y')
          );
     }
     if(!empty($data->novinky)) $data->timestamp = time();
     $handle = fopen($cacheFile,'w');
     fwrite($handle,serialize($data));
     fclose($handle);
}
?>
     <div class="iblock mo">
          <h6>
               <span class="right"><a href="http://www.pirati.cz/piznam/feed.php?mode=blogtng&amp;log=tz&amp;ns=stanoviska&amp;num=3&amp;linkto=current&amp;content=html" title="RSS"><img src="<?php echo DOKU_TPL; ?>images/rss.png" alt="rss"></a></span>
               <a href="<?php echo wl('novinky'); ?>">Novinky <span>Všechny novinky &raquo;</span></a>
          </h6>
          <div class="content">
               <ul id="news">
                    <?php foreach($data->novinky as $num=>$new): ?>
                         <li>
                              <i class="news-icon"></i>
                              <div>
                                   <small><?php echo $new['date']; ?></small><br/>
                                   <a href="<?php echo $new['link']; ?>"><?php echo $new['title']; ?></a>
                              </div>
                         </li>
                    <?php endforeach; ?>
               </ul>
          </div>
     </div>

