<?php
if(!defined('DOKU_TEMP')) define('DOKU_TEMP',DOKU_INC.'data/tmp/');
if(!file_exists(DOKU_TEMP.'tpl')) mkdir(DOKU_TEMP.'tpl');
$cacheFile = DOKU_TEMP.'tpl/tz.tmpo';
$updateInterval = 1800;
$data = new stdClass();
$data->timestamp = 0;
$data->tiskove_zpravy = array();
if(file_exists($cacheFile)){
     $handle = fopen($cacheFile,'r');
     $data = unserialize(fread($handle, filesize($cacheFile)));
     fclose($handle);
}
//
if((time()-$data->timestamp)>$updateInterval){
     $data->tiskove_zpravy = array();
     $feed = new FeedParser();
     $feed->set_feed_url('http://www.pirati.cz/piznam/feed.php?mode=blogtng&blog=tz&ns=tiskove-zpravy&num=5&linkto=current&content=html');
     $feed->init();
     $tiskove_zpravy = $feed->get_items();
     foreach($tiskove_zpravy as $num=>$tz){
          $img = preg_replace('/\?w=(\d*)/','?w=475&amp;h=180',preg_replace('/.*(<img[^>]*>).*/s', '\1', $tz->get_description()));
          $img = preg_replace('/align="(left|right)"/','',preg_replace('/width="(\d*)"/','width="475" height="180"',$img));
          $data->tiskove_zpravy[] = array(
               'title' => $tz->get_title(),
               'link' => $tz->get_link(),
               'date' => $tz->get_local_date('%e.&nbsp;%B&nbsp;%Y'),
               'image' => $img
          );
     }
     if(!empty($data->tiskove_zpravy)) $data->timestamp = time();
     $handle = fopen($cacheFile,'w');
     fwrite($handle,serialize($data));
     fclose($handle);
}
?>
     <div class="iblock mo">
          <h6>
               <span class="right"><a title="RSS" href="http://www.pirati.cz/piznam/feed.php?mode=blogtng&amp;blog=tz&amp;ns=tiskove-zpravy&amp;num=5&amp;linkto=current&amp;content=html"><img src="<?php echo DOKU_TPL; ?>images/rss.png" alt="rss"></a></span>
               <a href="<?php echo wl('tiskove-zpravy'); ?>">Tiskové zprávy <span>Všechny tiskové zprávy &raquo;</span></a>
          </h6>
          <div class="content">
               <div id="tz" class="carousel slide">
                    <ol class="carousel-indicators">
                         <?php foreach($data->tiskove_zpravy as $num=>$tz): ?> 
                              <li data-target="#tz" data-slide-to="<?php echo $num; ?>"<?php echo ($num==0?' class="active"':'') ?>></li>
                         <?php endforeach; ?>
                    </ol>
                    <div class="carousel-inner">
                         <?php foreach($data->tiskove_zpravy as $num=>$tz): ?>
                              <div class="item<?php echo ($num==0?' active':''); ?>">
                                   <a href="<?php echo $tz['link']; ?>">
                                        <?php echo $tz['image']; ?>
                                   </a>
                                   <div class="tz-content">
                                        <h4>
                                             <small><?php echo $tz['date']; ?></small><br/>
                                             <a href="<?php echo $tz['link']; ?>"><?php echo $tz['title']; ?></a>
                                        </h4>
                                   </div>
                              </div>
                         <?php endforeach; ?>
                    </div>
               </div>
          </div>
     </div>

