<?php
if(!defined('DOKU_TEMP')) define('DOKU_TEMP',DOKU_INC.'data/tmp/');
if(!file_exists(DOKU_TEMP.'tpl')) mkdir(DOKU_TEMP.'tpl');
$cacheFile = DOKU_TEMP.'tpl/youtube.tmpo';
$updateInterval = 43200;
$data = new stdClass();
$data->timestamp = 0;
$data->data = array();
if(file_exists($cacheFile)){
     $handle = fopen($cacheFile,'r');
     $data = unserialize(fread($handle, filesize($cacheFile)));
     fclose($handle);
}
//
if((time()-$data->timestamp)>$updateInterval){
     $contents = file_get_contents('https://gdata.youtube.com/feeds/api/users/CeskaPiratskaStrana/uploads?v=2&alt=json&max-results=3');
     $json = json_decode($contents);
     $data->data = array();
     foreach($json->feed->entry as $entry){
          $minutes = floor($entry->{'media$group'}->{'media$content'}[0]->duration/60);
          $seconds = $entry->{'media$group'}->{'media$content'}[0]->duration-$minutes*60;
          if($seconds<10) $seconds='0'.$seconds;
          $data->data[] = array(
               'minutes' => $minutes,
               'seconds' => $seconds,
               'url_player' => str_replace('&','&amp;',$entry->{'media$group'}->{'media$player'}->url),
               'url_thumb' => $entry->{'media$group'}->{'media$thumbnail'}[0]->url,
               'title' => $entry->title->{'$t'}
          );
     }
     if(!empty($data->data)) $data->timestamp = time();
     $handle = fopen($cacheFile,'w');
     fwrite($handle,serialize($data));
     fclose($handle);
}
?>
<div class="iblock you">
     <h6><a href="http://www.youtube.com/CeskaPiratskaStrana" target="_blank">Youtube videa <span>Youtube kanál &raquo;</span></a></h6>
     <div id="youtube" class="content">
          <ul>
               <?php foreach($data->data as $entry): ?>
                    <li>
                         <div class="time"><?php echo $entry['minutes']; ?>.<?php echo $entry['seconds']; ?></div>
                         <a class="html5lightbox" href="<?php echo $entry['url_player']; ?>"><img src="<?php echo $entry['url_thumb']; ?>" alt="<?php echo $entry['title']; ?>" title="<?php echo $entry['title']; ?>" width="120" height="90"/></a><br/>
                         <a href="<?php echo $entry['url_player']; ?>" title="<?php echo $entry['title']; ?>"><?php echo $entry['title']; ?></a>
                    </li>
               <?php endforeach; ?>
          </ul>
     </div>
     <div class="clearfix"></div>
</div>
