<?php
if(!defined('DOKU_TEMP')) define('DOKU_TEMP',DOKU_INC.'data/tmp/');
if(!file_exists(DOKU_TEMP.'tpl')) mkdir(DOKU_TEMP.'tpl');
$cacheFile = DOKU_TEMP.'tpl/fio.tmpo';
$updateInterval = 43200;
$data = new stdClass();
$data->timestamp = 0;
$data->balance = 0;
$data->in = array();
$data->out = array();
if(file_exists($cacheFile)){
     $handle = fopen($cacheFile,'r');
     $data = unserialize(fread($handle, filesize($cacheFile)));
     fclose($handle);
}
//
function fosort($a,$b){
     $a = strtotime($a['datum']);
     $b = strtotime($b['datum']);
     if($a == $b) return 0;
     return ($a > $b) ? -1 : 1;
}
//
if((time()-$data->timestamp)>$updateInterval){
     $start = date('Y-m-d',time()-2678400);
     $end = date('Y-m-d'); //date('Y-12-31');
     $data->in = array();
     $data->out = array();
     // main
     $content = file_get_contents('https://www.fio.cz/ib_api/rest/periods/'.$conf['tpl_box-fo_fio_main'].'/'.$start.'/'.$end.'/transactions.json');
     // michalek
     $content_michalek = file_get_contents('https://www.fio.cz/ib_api/rest/periods/'.$conf['tpl_box-fo_fio_michalek'].'/'.$start.'/'.$end.'/transactions.json');
     // ppi - NO OUR MONEY
     // $content = file_get_contents('https://www.fio.cz/ib_api/rest/periods/'.$conf['tpl_box-fo_fio_ppi'].'/'.$start.'/'.$end.'/transactions.json');
     // fio konto
     $content_spor = file_get_contents('https://www.fio.cz/ib_api/rest/periods/'.$conf['tpl_box-fo_fio_sporici'].'/'.$start.'/'.$end.'/transactions.json');
     // termin konto
     $content_termin = file_get_contents('https://www.fio.cz/ib_api/rest/periods/'.$conf['tpl_box-fo_fio_termin'].'/'.$start.'/'.$end.'/transactions.json');

     $json = json_decode($content);
     $json_michalek = json_decode($content_michalek);
     $json_spor = json_decode($content_spor);
     $json_termin = json_decode($content_termin);
     //
     $data->balance = $json->accountStatement->info->closingBalance;
     $data->balance += $json_michalek->accountStatement->info->closingBalance;
     $data->balance += $json_spor->accountStatement->info->closingBalance;
     $data->balance += $json_termin->accountStatement->info->closingBalance;
     $data->balance = number_format($data->balance,2,',',' ');

     if(!is_null($json->accountStatement->transactionList)){
          $ts = $json->accountStatement->transactionList->transaction;
          foreach($ts as $k=>$v){ $v->account = $conf['tpl_box-fo_fio_main_acc']; $ts[$k] = $v; }
     } else $ts = array();
     if(!is_null($json_michalek->accountStatement->transactionList)){
          $ts_michalek = $json_michalek->accountStatement->transactionList->transaction;
          foreach($ts_michalek as $k=>$v){ $v->account = $conf['tpl_box-fo_fio_michalek_acc']; $ts_michalek[$k] = $v; }
     } else $ts_michalek = array();
     if(!is_null($json_spor->accountStatement->transactionList)){
          $ts_spor = $json_spor->accountStatement->transactionList->transaction;
          foreach($ts_spor as $k=>$v){ $v->account = $conf['tpl_box-fo_fio_sporici_acc']; $ts_spor[$k] = $v; }
     } else $ts_spor = array();
     if(!is_null($json_termin->accountStatement->transactionList)){
          $ts_termin = $json_termin->accountStatement->transactionList->transaction;
          foreach($ts_termin as $k=>$v){ $v->account = $conf['tpl_box-fo_fio_termin_acc']; $ts_termin[$k] = $v; }
     } else $ts_termin = array();

     $all_trans = array_merge($ts,$ts_michalek,$ts_spor,$ts_termin);
     foreach($all_trans as $trans){
          $datum = $trans->column0->value;
          $price = $trans->column1->value;
          $user = $trans->column7->value;
          $typ = $trans->column8->value;
          $msg = (empty($trans->column16->value)?(empty($typ)?'info viz. účet v bance':$typ):$trans->column16->value);
          $acc = $trans->account;

          if($price>0) $data->in[] = array('account' => $acc,'datum' => date('j.n.Y',strtotime($datum)), 'price' => number_format($price,2,',',' '), 'user' => $user, 'msg' => $msg);
          if($price<0) $data->out[] = array('account' => $acc,'datum' => date('j.n.Y',strtotime($datum)), 'price' => number_format($price,2,',',' '), 'user' => $user, 'msg' => $msg);
     }
     $data->in = array_slice($data->in,-7,7); usort($data->in,'fosort');
     $data->out = array_slice($data->out,-7,7); usort($data->out,'fosort');
     if(!empty($data->out)) $data->timestamp = time();
     $handle = fopen($cacheFile,'w');
     fwrite($handle,serialize($data));
     fclose($handle);
}
?>
<div class="iblock fo">
     <h6>
          <span class="right"><a href="http://www.pirati.cz/fo/seznam_uctu"><?php echo $data->balance; ?> Kč</a></span>
          <a href="<?php echo wl('fo'); ?>">Otevřené účetnictví <span>Všechny finance &raquo;</span></a>
     </h6>
     <div id="moneyservices">
          <a href="<?php echo wl('fo:dary'); ?>" class="btn btn-success btn-mini">Bankovní převod</a>
          <?php /* <a href="#fo-paypal" class="btn btn-mini">PayPal</a>
          <a href="#fo-bitcoin" class="btn btn-mini">bitcoin</a> */ ?>
     </div>
     <div class="content tabbable" id="money">

          <ul class="nav nav-tabs">
               <li class="active"><a data-toggle="tab" href="#income">Příjmy</a></li>
               <li><a data-toggle="tab" href="#outcome">Výdaje</a></li>
          </ul>
          <div class="tab-content">
               <div class="tab-pane active" id="income">
                    <table class="table table-condensed table-hover table-striped">
                         <tbody>
                              <?php foreach($data->in as $in): // TODO: change url to FO income document ?>
                              <tr>
                                   <td>
                                        <span class="date"><?php echo $in['datum']; ?></span>
                                        <span class="rockandrolla">+<?php echo $in['price']; ?> Kč</span>
                                        <a target="_blank" href="https://www.fio.cz/scgi-bin/hermes/dz-transparent.cgi?ID_ucet=<?php echo $in['account']; ?>&amp;pohyby_DAT_od=<?php echo $in['datum']; ?>&amp;pohyby_DAT_do=<?php echo $in['datum']; ?>&amp;castka_min=<?php echo $in['price']; ?>&amp;castka_max=<?php echo $in['price']; ?>&amp;UID=<?php echo urlencode(iconv('utf8','cp1250',$in['user'])); ?>&amp;smer=1" title="<?php echo (empty($in['user'])?$in['msg']:$in['user']) ?>"><?php echo (empty($in['user'])?$in['msg']:$in['user']); ?></a>
                                   </td>
                              </tr>
                              <?php endforeach; ?>
                         <tbody>
                    </table>
               </div>
               <div class="tab-pane" id="outcome">
                    <table class="table table-condensed table-hover table-striped">
                         <tbody>
                              <?php foreach($data->out as $out): // TODO: change url to FO outcome document  ?>
                              <tr>
                                   <td>
                                        <span class="date"><?php echo $out['datum']; ?></span>
                                        <span class="evil"><?php echo $out['price']; ?> Kč</span>
                                        <a target="_blank" href="https://www.fio.cz/scgi-bin/hermes/dz-transparent.cgi?ID_ucet=<?php echo $out['account']; ?>&amp;pohyby_DAT_od=<?php echo $out['datum']; ?>&amp;pohyby_DAT_do=<?php echo $out['datum']; ?>&amp;castka_min=<?php echo $out['price']; ?>&amp;UID=<?php echo urlencode(iconv('utf8','cp1250',$out['user'])); ?>&amp;smer=-1" title="<?php echo (empty($out['msg'])?$out['user']:$out['msg']) ?>"><?php echo (empty($out['msg'])?$out['user']:$out['msg']); ?></a>
                                   </td>
                              </tr>
                              <?php endforeach; ?>
                         <tbody>
                    </table>

               </div>
          </div>
     </div>
</div>
