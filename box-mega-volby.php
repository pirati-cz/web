<?php
if(!defined('DOKU_TEMP')) define('DOKU_TEMP',DOKU_INC.'data/tmp/');
if(!file_exists(DOKU_TEMP.'tpl')) mkdir(DOKU_TEMP.'tpl');
$cacheFile = DOKU_TEMP.'tpl/volby.tmpo';
$updateInterval = 43200;
$data = new stdClass();
$data->timestamp = 0;
$data->kandidati = array();
if(file_exists($cacheFile)){
     $handle = fopen($cacheFile,'r');
     $data = unserialize(fread($handle, filesize($cacheFile)));
     fclose($handle);
}
//
if((time()-$data->timestamp)>$updateInterval){
     $data->kandidati = array();
     $r = array('praha'=>'Praha','strednicechy'=>'Středočeský kraj','jiznimorava'=>'Jihomoravský kraj','kralovehradecko'=>'Královéhradecký kraj','liberecko'=>'Liberecký kraj','moravskoslezsko'=>'Moravskoslezský kraj','plzensko'=>'Plzeňský kraj','ustecko'=>'Ústecký kraj','vysocina'=>'Vysočina','zlinsko'=>'Zlínský kraj','karlovarsko'=>'Karlovarský kraj','pardubicko'=>'Pardubický kraj','olomoucko'=>'Olomoucký kraj','jiznicechy'=>'Jihočeský kraj');
     foreach($r as $f=>$kraj){
          $file = DOKU_INC.'data/pages/regiony/'.$f.'/volby2013/kandidatka.txt';
          $handle = fopen($file,'r');
          $kandidatka = fread($handle, filesize($file));
          $lines = explode("\n",$kandidatka);
          foreach($lines as $line){
               if(preg_match('/^\| /',trim($line))){
                    $td = explode('|',$line);

                    preg_match('/\[\[(.*)\]\]/',$line,$matches);
                    $rn = explode('|',$matches[1]);
                    if(!empty($rn[1])){
                         $nameurl = $rn[0];
                         $name = $rn[1];
                         $povolani = trim($td[5]);
                    } else {
                         $nameurl = $matches[1];
                         $name = p_get_first_heading($matches[1]);
                         $povolani = trim($td[4]);
                    }
                    //
                    $img = trim(str_replace(array(':','{','}'),array('/','',''),$td[2]));
                    if(preg_match('/(\/)/',$img)){
                         $img = '/_media/'.$img;
                    } else {
                         $img = '/_media/regiony/'.$f.'/volby2013/'.$img;
                    }
                    $image = str_replace(array('//','?60x60','&nolink'),array('/','?w=120&amp;h=120',''),$img);
                    //
                    $fff = DOKU_INC.'data'.str_replace(array('_media','//','?60x60'),array('media'.'/',''),$img);
                    if(file_exists($fff) and !is_dir($fff))
                    $data->kandidati[] = array(
                         'name' => $name,
                         'nameurl' => trim(str_replace('cz//','cz/',wl($nameurl,'',true))),
                         'image' => $image,
                         'povolani' => ((substr($povolani,0,3)=='OSV' or substr($povolani,0,2)=='SŠ' or substr($povolani,0,3)=='ICT' or substr($povolani,0,2)=='IT')?$povolani:lcfirst($povolani)),
                         'krajname' => $kraj,
                         'krajurl' => wl('regiony:'.$f.':volby2013:kandidatka')
                    );
               }
          }
          fclose($handle);
     }
     shuffle($data->kandidati);
     $data->timestamp = time();
     $handle = fopen($cacheFile,'w');
     fwrite($handle,serialize($data));
     fclose($handle);
}
/*
foreach($data->kandidati as $kk){
     $file = DOKU_INC.'data'.str_replace(array('_media','?w=120&amp;h=120'),array('media',''),$kk['image']); //echo $file; die();
     if(!file_exists($file))
          echo 'no image:'. $file." | ".$kk['kraj']."<br/>";
}
echo '<br/>';
foreach($data->kandidati as $kk){
     if(empty($kk['name']))
          echo 'no name:'. $kk['name']." | ".$kk['kraj']." | ".$kk['povolani']."<br/>";
}
die();
 */
?> 
<div class="iblock volby">
     <h6><a href="<?php echo wl('volby2013'); ?>">Volby 2013 <span>stránka voleb &raquo;</span></a></h6>
     <div class="content">
          <div class="row-fluid">
               <div class="span12 center">
                    <!-- <h1>KAŽDÁ DOBA <span>MĚLA SVÉ PIRÁTY</span></h1> -->
                    <div class="fundraising">
                         <a href="<?php echo wl('fo:dary') ?>">Přispějte</a> drobným darem na kampaň strany. Variabilní symbol: 190000<br/>
                         <?php echo p_wiki_xhtml(':mo:template:volby2013'); ?>
                         <?php // echo p_render('xhtml',p_get_instructions("<pirati fund>\nvs: 190000\ntype: volby2013\n</pirati>"),$info); ?>
                    </div>
               </div>
          </div>
          <div class="row-fluid">
               <div class="span3">
                    <h2 class="leftpad">VOLEBNÍ <span>PROGRAM</span></h2>
                    <ul>
                         <li>Volební <a href="<?php echo wl('volby2013:volebni_program'); ?>">program</a> pro předčasné volby 2013 vychází z našeho <a href="<?php echo wl('program'); ?>">dlouhodobého programu</a>.</li>
                         <li>Podívat se můžete také na <a href="<?php echo wl('faq:volby2013'); ?>">často kladené dotazy</a>.</li>
                    </ul>
               </div>
               <div class="span4">
                    <h2>PROČ <span>VOLIT PIRÁTY</span></h2>
                    <ul>
                         <li>Jsme duchem mladí lidé, kteří <a href="http://piratstvi.cz/" target="_blank">chtějí změnu</a></li>
                         <li>Zveřejňujeme <a href="<?php echo wl('fo:rozpocet2013'); ?>">účetnictví</a>, <a href="<?php echo wl('ao:list'); ?>">smlouvy</a> i <a href="https://forum.pirati.cz/post161386.html#p161386" target="_blank">lobbisty</a></li>
                         <li>Vznikli jsme zdola na občanském principu</li>
                         <li>Naši kandidáti mají svou <a href="<?php echo wl('volby2013'); ?>">prezentaci</a> na webu</li>
                         <li>Máme široký <a href="<?php echo wl('program'); ?>">dlouhodobý program</a></li>
                         <li>Věnujeme se klíčovým tématům budoucnosti</li>
                         <li>Jsme součástí mezinárodního Pirátského hnutí</li>
                    </ul>
               </div>
               <div class="span2">
                    <h2><span>ZAPOJTE</span> SE</h2>
                    <ul>
                         <li><a href="<?php echo wl('fo:dary'); ?>">Přispějte</a> drobným darem na transparentní účet strany</li>
                         <li>Přihlašte se do <a href="<?php echo wl('volby2013:ovk'); ?>">volební komise</a> (možnost přivýdělku)</li>
                         <li><a href="<?php echo wl('stanoviska:jak_muzete_piratum_pred_volbami_pomoci'); ?>">Pomocte nám</a> s kampaní jako dobrovolník</li>
                    </ul>
               </div>

               <div class="span3">
                    <h2>KANDIDÁTI</h2>
                    <div id="volby-kandidati" class="cycle-slideshow auto" 
                         data-cycle-loader="true"
                         data-cycle-progressive="#images"
                         data-cycle-slides=">div"
                         data-cycle-fx="fade"
                         data-cycle-pause-on-hover="true">
                              <?php foreach($data->kandidati as $num=>$k): ?>
                                   <?php /* <div class="item <?php echo ($num==0?' active':''); ?>"> */ ?>
                                   <div>
                                        <a href="<?php echo $k['nameurl']; ?>"><img src="<?php echo $k['image']; ?>" alt="<?php echo $k['name']?>"/></a>
                                        <h3><a href="<?php echo $k['nameurl']; ?>"><?php echo $k['name']; ?></a></h3>
                                        <?php echo $k['povolani']; ?><br />
                                        <strong><a href="<?php echo $k['krajurl']; ?>"><?php echo $k['krajname']; ?></a></strong>
                                   </div>
                              <?php break; endforeach; ?>
                         <script id="images" type="text/cycle" data-cycle-split="---">
<?php $cnt = count($data->kandidati)-1; ?>
<?php foreach($data->kandidati as $num=>$k): if($num>0): ?>
<div>
     <a href="<?php echo $k['nameurl']; ?>"><img src="<?php echo $k['image']; ?>" alt="<?php echo $k['name']; ?>"/></a>
     <h3><a href="<?php echo $k['nameurl']; ?>"><?php echo $k['name']; ?></a></h3>
     <?php echo $k['povolani']; ?><br />
     <strong><a href="<?php echo $k['krajurl']; ?>"><?php echo $k['krajname']; ?></a></strong>
</div>
<?php echo ($cnt==$num?'':"---\n"); ?>
<?php endif; endforeach; ?>
                         </script>
                    </div>
               </div>
          </div>
     </div>
     <div class="clear"></div>
</div>
