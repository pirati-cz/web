<?php

$title = 'Hlavní stránka';
$icons = '1';
$tzs = array(
     0 => array('img'=>'tz1.jpg','title'=>'Pirátská strana vyzvala prezidenta ke zveřejnění dokumentů o amnestii'),
     1 => array('img'=>'tz2.jpg','title'=>'Předseda Pirátů Ivan Bartoš bude diskutovat o svobodě Internetu na Zlínském jaru'),
     2 => array('img'=>'tz3.jpg','title'=>'Piráti se aktivně zúčastní demonstrace za legalizaci konopí')
);
$news = array(
     0 => 'Stanovisko Pirátů k pokračujícím protestům proti KSČM v krajských radách &raquo;',
     1 => 'Nejcennější dokument v historii www &raquo;',
     2 => 'Ministerstvo životního prostředí a vláda ČR neplní své sliby. 8 let slibovaná a potřebná novela zákona o odpadech nebude &raquo;'
);
$eventtypes = array(
     0 => array('color'=>'','title'=>'Piráti se zúčastní'),
     1 => array('color'=>'','title'=>'Schůze'),
     2 => array('color'=>'','title'=>'Hlasování'),
     3 => array('color'=>'','title'=>'Státní událost'),
     4 => array('color'=>'','title'=>'Mezinárodní událost')
);
$events = array(
     23 => array(
          array(
               'date'=>'23.5.',
               'title'=>'Beseda o bitcoinu, Zlín, klub LOFT',
               'type'=>0,
               'time'=>'18:00',
               'place'=>'Zlín, klub LOFT',
               'description'=>'Zlín, klub LOFT Lorem ipsum...'),
          array(
               'date'=>'23.5.',
               'title'=>'Středočeský kraj - schůze',
               'type'=>1,
               'time'=>'18:00',
               'place'=>'Praha, Motokáry letňany',
               'description'=>'Lorem ipsum...')
     ),
     25 => array(
          array(
               'date'=>'25.5.',
               'title'=>'Interaktivní přednáška o možnosti fungování bezplatné dopravy v Praze',
               'type'=>0,
               'time'=>'18:00',
               'place'=>'Praha',
               'description'=>'Lorem ipsum...')
     ),
     30 => array(
          array(
               'date'=>'30.5.',
               'title'=>'Plzeňský kraj - schůze',
               'type'=>1,
               'time'=>'18:00',
               'place'=>'Plzeň, někde...',
               'description'=>'Lorem ipsum...')
     ),
     31 => array(
          array(
               'date'=>'31.5.',
               'title'=>'Něco mezinárodního 2...',
               'type'=>4,
               'time'=>'18:00',
               'place'=>'planeta Země',
               'description'=>'Lorem ipsum...')
     ),
     16 => array(
          array(
               'date'=>'16.5.',
               'title'=>'Něco mezinárodního...',
               'type'=>4,
               'time'=>'18:00',
               'place'=>'soustava Mléčná dráha',
               'description'=>'Lorem<br>Lorem ipsum...'),
          array(
               'date'=>'16.5.',
               'title'=>'Něco státního...',
               'type'=>3,
               'time'=>'18:00',
               'place'=>'Česká republika',
               'description'=>'Lorem ipsum...'),
          array(
               'date'=>'16.5.',
               'title'=>'Nějaké hlasování...',
               'type'=>2,
               'time'=>'18:00',
               'place'=>'Republikový výbor',
               'description'=>'Lorem ipsum...'),
          array(
               'date'=>'16.5.',
               'title'=>'Schůze...',
               'type'=>1,
               'time'=>'16:00',
               'place'=>'Brno',
               'description'=>'Lorem ipsum...'),
          array(
               'date'=>'16.5.',
               'title'=>'Schůze 2...',
               'type'=>1,
               'time'=>'17:39',
               'place'=>'Hřbitov',
               'description'=>'Lorem ipsum...'),
          array(
               'date'=>'16.5.',
               'title'=>'Piráti se zúčastní...',
               'type'=>0,
               'time'=>'00:00',
               'place'=>'Hluboký les',
               'description'=>'Lorem ipsum...')
     )
);
$finance = array(
     'vydaje' => array(
          array('date'=>'21.5.2013','price'=>'-2360','description'=>'RP, Webstep, s.r.o., internetové domény'),
          array('date'=>'13.5.2013','price'=>'-436','description'=>'FO 19_2013, KS Ústecký kraj, Vít Konečný, Nákup prázdných DVD pro šíření přednášky dr. Tomana Broda'),
          array('date'=>'7.5.2013','price'=>'-6237,55','description'=>'FO 18_2013, RP+KS Praha+MO, Pressterminal s.r.o., Letáky-filtry na MMM'),
          array('date'=>'6.5.2013','price'=>'-151','description'=>'FO 17_2013, MO, Petr Stehlík, prodloužení domény piratstvi.cz'),
          array('date'=>'21.4.2013','price'=>'-4078','description'=>'FO 10_2013, ZO, Petr Kopač, Delegace na programovou konferenci PP-EU Záhřeb'),
          array('date'=>'18.4.2013','price'=>'-5082','description'=>'FO 15_2013, ZO, Bário s.r.o., Tisk letáků na kampaňování v Chorvatsku'),
          array('date'=>'15.4.2013','price'=>'-154','description'=>'FO 16_2013, RP, OSA o.s., Poplatek za dovoz flashdisků')
     ),
     'prijmy' => array(
          array('date'=>'21.5.2013','price'=>'300','description'=>'Adam Zábranský'),
          array('date'=>'21.5.2013','price'=>'128','description'=>'Pirati Zatec !!!'),
          array('date'=>'21.5.2013','price'=>'128','description'=>'Petr Vyhnal, Mozartova 2, Jablonecnad Nisou, 18.1.1982'),
          array('date'=>'20.5.2013','price'=>'250','description'=>'LUKÁŠ ČERNOHORSKÝ, PETŘVALDSKÁ 15,OSTRAVA,19.11.1984'),
          array('date'=>'20.5.2013','price'=>'500','description'=>'Simona Skorepova -clensky prispevek2013'),
          array('date'=>'19.5.2013','price'=>'500','description'=>'Podpora pro ČPS'),
          array('date'=>'17.5.2013','price'=>'256','description'=>'JAROSLAV KUCERA, MOSNOVA 29, BRNO 615 00')
     )
);

if(isset($_GET['icons'])){
     switch($_GET['icons']){
          case '2': $icons = '2'; break;
     }
}

?>
<div id="col-left">
     <div class="iblock">
          <h6><a href="#map">Rozcestník <span>Mapa webu &raquo;</span></a></h6>
          <div class="content">
               <ul id="indexmenu">
                    <li><a href="#about"><img src="/img/icons/<?php echo $icons; ?>_about.png" alt="o nás">O&nbsp;nás</a></li>
                    <li><a href="#members"><img src="/img/icons/<?php echo $icons; ?>_members.png" alt="členství">Členství</a></li>
                    <li><a href="#program"><img src="/img/icons/<?php echo $icons; ?>_program.png" alt="program">Program</a></li>
                    <li class="crmap"><a href="#regions"><img src="/img/icons/<?php echo $icons; ?>_regions.png" alt="regiony">Regiony</a></li>
                    <li><a href="#contact"><img src="/img/icons/<?php echo $icons; ?>_contact.png" alt="kontakt">Kontakt</a></li>
               </ul>
               <div class="clearfix"></div>
         </div>
     </div>

     <div class="iblock mo">
          <h6>
               <span class="right"><a title="RSS" href="#rss-tz"><img src="/img/rss.png" alt="rss"></a></span>
               <a href="#tz">Tiskové zprávy <span>Všechny tiskové zprávy &raquo;</span></a>
          </h6>
          <div class="content">
               <div id="tz" class="carousel slide">
                    <ol class="carousel-indicators">
                         <?php foreach($tzs as $num=>$tz): ?> 
                              <li data-target="#tz" data-slide-to="<?php echo $num; ?>"<?php echo ($num==0?' class="active"':'') ?>></li>
                         <?php endforeach; ?>
                    </ol>
                    <div class="carousel-inner">
                         <?php foreach($tzs as $num=>$tz): ?>
                              <div class="item<?php echo ($num==0?' active':''); ?>">
                                   <a href="#tz<?php echo $num; ?>">
                                        <img src="/img/<?php echo $tz['img']; ?>" alt="blabla">
                                   </a>
                                   <div class="tz-content">
                                        <h4><a href="#tz<?php echo $num; ?>"><?php echo $tz['title']; ?></a></h4>
                                   </div>
                              </div>
                         <?php endforeach; ?>
                    </div>
               </div>
          </div>
     </div>

     <div class="iblock mo">
          <h6>
               <span class="right"><a href="#rss-news" title="RSS"><img src="/img/rss.png" alt="rss"></a></span>
               <a href="/?novinky">Novinky <span>Všechny novinky &raquo;</span></a>
          </h6>
          <div class="content">
               <ul id="news">
                    <?php foreach($news as $num=>$new): ?>
                         <li><a href="#new<?php echo $num; ?>"><?php echo $new; ?></a></li>
                    <?php endforeach; ?>
               </ul>
          </div>
     </div>

     <div class="iblock you">
          <h6><a href="#youtube">Youtube videa <span>Youtube kanál &raquo;</span></a></h6>
          <div id="youtube" class="content"><ul></ul></div>
     </div>

</div>
<div id="col-right">
     <div class="iblock mo">
          <h6><a href="#camp">Aktuální kampaně <span>Všechny kampaně &raquo;</span></a></h6>
          <div class="content">
               <a class="k1" href="#kampan1"><img src="/img/kampan1.png" alt="kampan1"></a>
               <a class="k0" href="#kampan0"><img src="/img/kampan0.png" alt="kampan0"></a>
         </div>
     </div>
     <div class="iblock ao">
          <h6>
               <span class="right">
                    <a href="#rss-events" title="RSS"><img src="/img/rss.png" alt="rss"></a>
                    <a href="#filter-events" title="Filtr"><img src="/img/filter.png" alt="rss"></a>
               </span>
               <a href="#events">Události <span>Všechny události &raquo;</span></a>
          </h6>
          <div id="filter">
               <ul>
                    <?php foreach($eventtypes as $num=>$et): ?>
                         <li>
                              <label class="checkbox event-type-<?php echo $num; ?>">
                                   <input type="checkbox" checked="checked">&nbsp;<?php echo $et['title']; ?>
                              </label>
                         </li>
                    <?php endforeach; ?>
               </ul>
          </div>
          <div class="content">
               <table id="calendar">
                    <thead>
                         <tr>
                              <th colspan="7">
                                   <a href="#"><i class="icon-chevron-left"></i></a>
                                   &nbsp;&nbsp;Květen 2013&nbsp;&nbsp;
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
                                   <?php if($d<=31): ?>
                                        <td data-day="<?php echo $d ?>. Květen 2013" class="day<?php echo ($d==date('d')?' today':''); ?><?php echo ($d<date('d')?' old':''); ?><?php echo (!empty($events[$d])?' haveevents':'') ?>">
                                             <?php echo $d; ?>
                                             <?php if(!empty($events[$d])): ?>
                                                  <?php foreach($events[$d] as $k=>$ev): ?>
                                                  <i<?php echo ($k%3==0?' style="clear:left"':''); ?> class="event-icon-day event-type-<?php echo $ev['type']; ?>" data-title="<?php echo $ev['title']; ?>" data-time="<?php echo $ev['time'] ?>" data-place="<?php echo $ev['place']; ?>" data-date="<?php echo $ev['date']; ?>" data-type="<?php echo $ev['type']; ?>" data-description="<?php echo $ev['description']; ?>"></i>
                                                  <?php endforeach; ?>
                                             <?php endif; ?>
                                        </td>
                                   <?php else: ?>
                                        <td>&nbsp;</td>
                                   <?php endif; ?>
                              <?php endfor; ?>
                         </tr>
                         <?php endfor; ?>
                    </tbody>
                    <tfoot>
                         <tr><th colspan="7">
                              <ul id="events">
                                   <?php $i=0; foreach($events as $day=>$ev): ?>
                                        <?php foreach($ev as $e): ?>
                                             <?php $i++; if($i>5) break; ?>
                                             <li>
                                                  <i class="event-icon event-type-<?php echo $e['type'] ?>"></i>
                                                  <div><a href="#"><?php echo $e['date'].' '.$e['title']; ?></a></div>
                                             </li>
                                        <?php endforeach; ?>
                                   <?php endforeach; ?>
                              </ul>
                         </th></tr>
                    </tfoot>
               </table>
          </div>
     </div>
     <div class="iblock fo">
          <h6>
               <span class="right"><a href="#odkaz-asi-zatim-do-fio-cely-vypis">282 293,37 Kč</a></span>
               <a href="#fo">Transparentní finance <span>Všechny finance &raquo;</span></a>
          </h6>
          <div id="moneyservices">
               <a href="#fo-fio" class="btn btn-success btn-mini">Bankovní převod</a>
               <a href="#fo-paypal" class="btn btn-mini">PayPal</a>
               <a href="#fo-bitcoin" class="btn btn-mini">bitcoin</a>
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
                                   <?php for($i=0;$i<7;$i++): ?>
                                   <tr>
                                        <td>
                                             <span class="date"><?php echo $finance['prijmy'][$i]['date']; ?></span>
                                             <span class="rockandrolla">+<?php echo $finance['prijmy'][$i]['price'] ?> Kč</span>
                                             <a href="#odkaz-do-fio-na-prislusny-prijem"><?php echo $finance['prijmy'][$i]['description']; ?></a>
                                        </td>
                                   </tr>
                                   <?php endfor; ?>
                              <tbody>
                         </table>
                    </div>
                    <div class="tab-pane" id="outcome">
                         <table class="table table-condensed table-hover table-striped">
                              <tbody>
                                   <?php for($i=0;$i<7;$i++): ?>
                                   <tr>
                                        <td>
                                             <span class="date"><?php echo $finance['vydaje'][$i]['date']; ?></span>
                                             <span class="evil"><?php echo $finance['vydaje'][$i]['price'] ?> Kč</span>
                                             <a href="#odkaz-do-spisu-fo"><?php echo $finance['vydaje'][$i]['description']; ?></a>
                                        </td>
                                   </tr>
                                   <?php endfor; ?>
                              <tbody>
                         </table>

                    </div>
               </div>
          </div>
     </div>
</div>

