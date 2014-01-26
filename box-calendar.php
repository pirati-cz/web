<?php

function cmp($a,$b){
    if ($a["start"] == $b["start"]) {
        return 0;
    }
    return ($a["start"] < $b["start"]) ? -1 : 1;
}


if(!defined('DOKU_TEMP')) define('DOKU_TEMP',DOKU_INC.'data/tmp/');
if(!file_exists(DOKU_TEMP.'tpl')) mkdir(DOKU_TEMP.'tpl');
$cacheFile = DOKU_TEMP.'tpl/calendar.tmpo';
$updateInterval = 21600;
$calendarUrl = 'https://www.google.com/calendar/feeds/kddvdvu3adcjef2kro4j6mm838@group.calendar.google.com/public/full';
$data = new stdClass();
$data->timestamp = 0;
$data->events = array();
if(file_exists($cacheFile)){
     $handle = fopen($cacheFile,'r');
     $data = unserialize(fread($handle, filesize($cacheFile)));
     fclose($handle);
}
if((time()-$data->timestamp)>$updateInterval){
     $data->events = array();

     $now = time(); 
     // min: prev year
     $startDate = date("Y-01-01\T00:00:00P",strtotime("-1 year",$now));
     // max: next year
     $endDate = date("Y-12-31\T23:59:59P",strtotime("+1 year",$now));
    
     $url="";
     $url.="start-min=".$startDate;
     $url.="&start-end=".$endDate;
     $url.="&recurrence-expansion-start=".$startDate;
     $url.="&recurrence-expansion-end=".$endDate;
     $url=str_replace("+","%2B",$url);
     
     $ch = curl_init();
     $furl = $calendarUrl."?".$url;
     curl_setopt($ch, CURLOPT_URL,$furl);
     curl_setopt($ch, CURLOPT_HEADER, false);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
     $xml = curl_exec($ch);
     curl_close($ch);
    
     $doc = new DOMDocument();
     $doc->loadXML($xml);
    
     $i = 0;
     foreach($doc->getElementsByTagName("entry") as $event){
          $title = $event->getElementsByTagName("title")->item(0)->textContent;
          $content = $event->getElementsByTagName("content")->item(0)->textContent;
          $where = $event->getElementsByTagName("where")->item(0)->attributes->getNamedItem("valueString")->nodeValue;

          if(!is_null($event->getElementsByTagName("when")->item(0))){
               foreach($event->getElementsByTagName("when") as $when){

                    if(!is_null($when->attributes->getNamedItem("endTime"))){
                         $allday = false;
                         if(strpos($when->attributes->getNamedItem("startTime")->nodeValue,'T')===false){
                              $allday = true;
                              $start = strtotime($when->attributes->getNamedItem("startTime")->nodeValue."T00:00:00.000+00:00");
                         } else $start = strtotime($when->attributes->getNamedItem("startTime")->nodeValue);
                         if(strpos($when->attributes->getNamedItem("endTime")->nodeValue,'T')===false){
                              $end = strtotime($when->attributes->getNamedItem("endTime")->nodeValue."T00:00:00.000+02:00");
                         } else $end = strtotime($when->attributes->getNamedItem("endTime")->nodeValue);
                         $events[] = array(
                              "title" => $title,
                              "content" => $content,
                              "where" => $where,
                              "start" => $start,
                              "end" => $end,
                              "dupla" => $title."-".$start,
                              "allday" => $allday
                         );
                         $i++;
                    }
               }
          } else {
               $start = 0;
               $end = 0;
               //$this->events[$i] = new Event(str_replace("\n","\\n",$title),str_replace("\n","\\n",$content),$where,$start,$end);
               $events[] = array(
                    "title" => $title,
                    "content" => $content,
                    "where" => $where,
                    "start" => $start,
                    "end" => $end,
                    "dupla" => $title."-".$start,
                    "allday" => true
               );
               $i++;
          }
     }
    
     //array_unique($events);
     usort($events,"cmp");
     $duplas = array();
     //$cache = "<?php\n\$date=".time().";\n";
     $i=0;
     foreach($events as $event){
          if(!in_array($event["dupla"],$duplas)){
               $data->events[] = $event;
               //$cache .= "\$events[$i]=array(\"title\"=>\"".str_replace("\"","\\\"",$event["title"])."\",\"content\"=>\"".str_replace("\"","\\\"",$event["content"])."\",\"where\"=>\"".str_replace("\"","\\\"",str_replace("\n","\\\n",$event["where"]))."\",\"start\"=>\"".$event["start"]."\",\"end\"=>\"".$event["end"]."\",\"allday\"=>\"".$event["allday"]."\");\n";
               $duplas[] = $event["dupla"];
               $i++;
          }
     }

     //
     if(!empty($data->events)) $data->timestamp = time();
     $handle = fopen($cacheFile,'w');
     fwrite($handle,serialize($data));
     fclose($handle);
}
/*
function translate_month($monthName){
     switch($monthName){
          case 'January': return 'Leden'; break;
          case 'February': return 'Únor'; break;
          case 'March': return 'Březen'; break;
          case 'April': return 'Duben'; break;
          case 'May': return 'Květen'; break;
          case 'June': return 'Červen'; break;
          case 'July': return 'Červenec'; break;
          case 'August': return 'Srpen'; break;
          case 'September': return 'Září'; break;
          case 'November': return 'Listopad'; break;
          case 'December': return 'Prosinec'; break;
     }
}*/
?>
<div class="iblock ao">
     <h6>
          <!--<span class="right">
               <a href="#rss-events" title="RSS"><img src="<?php echo DOKU_TPL; ?>/images/rss.png" alt="rss"></a>
               <a href="#filter-events" title="Filtr"><img src="<?php echo DOKU_TPL; ?>/images/filter.png" alt="filtr"></a>
          </span> -->
          <?php /*<a href="<?php echo wl('udalosti'); ?>">*/?>Události<!--  <span>Všechny události &raquo;</span> </a>-->
     </h6>
     <!---
     <div id="filter">
          <ul>
               <?php /*foreach($eventtypes as $num=>$et): ?>
                    <li>
                         <label class="checkbox event-type-<?php echo $num; ?>">
                              <input type="checkbox" checked="checked">&nbsp;<?php echo $et['title']; ?>
                         </label>
                    </li>
               <?php endforeach;*/ ?>
          </ul>
     </div>
     -->
     <div class="content">
          <table id="calendar">
<!-- 
               <thead>
                    <tr>
                         <th colspan="7">
                              <a href="#"><i class="icon-chevron-left"></i></a>
                              &nbsp;&nbsp;<?php echo ucfirst(strftime('%B %Y')); ?>&nbsp;&nbsp;
                              <a href="#"><i class="icon-chevron-right"></i></a>
                         </th>
                    </tr>
                    <tr>
                         <th>Po</th>
                         <th>Út</th>
                         <th>St</th>
                         <th>Čt</th>
                         <th>Pá</th>
                         <th>So</th>
                         <th>Ne</th>
                    </tr>
               </thead>
               <tbody>
                    <?php for($i=0; $i<5; $i++): ?>
                    <tr>
                         <?php for($j=1; $j<=7; $j++): ?>
                              <?php $d = ($j+($i*7)); ?>
                              <?php if($d<=date('t')): ?>
                                   <td data-day="<?php echo $d ?>. <?php echo ucfirst(strftime('%B %Y')) ?>" class="day<?php echo ($d==date('d')?' today':''); ?><?php echo ($d<date('d')?' old':''); ?><?php echo (!empty($events[$d])?' haveevents':'') ?>">
                                        <?php echo $d; ?>
                                        <?php //if(!empty($data->events[$d])): ?>
                                             <?php /*foreach($data->events as $k=>$ev): ?>
                                             <i<?php echo ($k%3==0?' style="clear:left"':''); ?> class="event-icon-day event-type-<?php echo $ev['type']; ?>" data-title="<?php echo $ev['title']; ?>" data-time="<?php echo $ev['time'] ?>" data-place="<?php echo $ev['place']; ?>" data-date="<?php echo $ev['date']; ?>" data-type="<?php echo $ev['type']; ?>" data-description="<?php echo $ev['description']; ?>"></i>
                                             <?php endforeach; */ ?>
                                        <?php //endif; ?>
                                   </td>
                              <?php else: ?>
                                   <td>&nbsp;</td>
                              <?php endif; ?>
                         <?php endfor; ?>
                    </tr>
                    <?php endfor; ?>
               </tbody>
-->
               <tfoot>
                    <tr><th colspan="7">
                         <ul id="events">
                              <?php $i=0; foreach($data->events as $event): ?>
                                   <?php if($event['start'] > time()): ?>
                                        <?php $i++; if($i>5) break; ?>
                                        <li>
                                             <i class="event-icon event-type-<?php //echo $e['type'] ?>"></i>
                                             <div>
                                                  <small>
                                                       <?php if(date('Ymd',$event['start'])==date('Ymd')): ?>
                                                            Dnes! <?php echo strftime(' - %k.%M',$event['start']); ?>
                                                       <?php elseif(date('Ymd',$event['start'])+1==date('Ymd')+1): ?>
                                                            Zítra <?php echo strftime(' - %k.%M',$event['start']); ?>
                                                       <?php else: ?>
                                                            <?php echo strftime('%e. %B %Y - %k.%M',$event['start']); ?>
                                                       <?php endif; ?>
                                                  </small><br/>
                                                  <!--<a href="#">--><?php echo $event['title']; ?><!-- </a> -->
                                             </div>
                                        </li>
                                   <?php endif; ?>
                              <?php endforeach; ?>
                         </ul>
                    </th></tr>
               </tfoot>
          </table>
     </div>
</div>
