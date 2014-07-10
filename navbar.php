<div class="navbar<?php echo $_tpl_navbar_class; ?> navbar-fixed-top" id="pagebar">
     <div class="navbar-inner">
                         <div class="container">
                              <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                                   <span class="icon-bar"></span>
                                   <span class="icon-bar"></span>
                                   <span class="icon-bar"></span>
                              </a>
                              <div class="nav-collapse collapse">
                                   <ul class="nav">
          
                                        <li class="dropdown">
                                             <a class="dropdown-toggle" data-toggle="dropdown" href="#admin"><i class="icon-fire"></i>&nbsp;<b class="caret"></b></a>
                                                  <ul class="dropdown-menu">
                                                       <li class="dropdown-submenu">
                                                            <a href="<?php echo wl('rules:organizace'); ?>"><i class="icon-stop"></i>&nbsp;<?php echo $lang['authorities']; ?></a>
                                                            <ul class="dropdown-menu">
                                                                 <li><a href="<?php echo wl('cf'); ?>"><i class="tplobj-square tplbgcolor-cf"></i>&nbsp;<?php echo $lang['nationalforum']; ?></a></li>
                                                                 <li><a href="<?php echo wl('rv'); ?>"><i class="tplobj-square tplbgcolor-rv"></i>&nbsp;<?php echo $lang['nationalcomittee']; ?></a></li>
                                                                      <li><a href="<?php echo wl('rp'); ?>"><i class="tplobj-square tplbgcolor-rp"></i>&nbsp;<?php echo $lang['nationalbureau']; ?></a></li>
                                                                      <li><a href="<?php echo wl('garanti'); ?>"><i class="tplobj-square tplbgcolor-garanti"></i>&nbsp;Garanti</a></li>
                                                                      <li><a href="<?php echo wl('ao'); ?>"><i class="tplobj-square tplbgcolor-ao"></i>&nbsp;<?php echo $lang['admindep']; ?></a></li>
                                                                      <li><a href="<?php echo wl('fo'); ?>"><i class="tplobj-square tplbgcolor-fo"></i>&nbsp;Finanční odbor</a></li>
                                                                      <li><a href="<?php echo wl('mo'); ?>"><i class="tplobj-square tplbgcolor-mo"></i>&nbsp;Mediální odbor</a></li>
                                                                      <li><a href="<?php echo wl('po'); ?>"><i class="tplobj-square tplbgcolor-po"></i>&nbsp;Personální odbor</a></li>
                                                                      <li><a href="<?php echo wl('to'); ?>"><i class="tplobj-square tplbgcolor-to"></i>&nbsp;Technický odbor</a></li>
                                                                      <li><a href="<?php echo wl('zo'); ?>"><i class="tplobj-square tplbgcolor-zo"></i>&nbsp;<?php echo $lang['foreigndep']; ?></a></li>
                                                                      <li><a href="<?php echo wl('kk'); ?>"><i class="tplobj-square tplbgcolor-kk"></i>&nbsp;Kontrolní komise</a></li>
                                                                      <li><a href="<?php echo wl('rk'); ?>"><i class="tplobj-square tplbgcolor-rk"></i>&nbsp;Rozhodčí komise</a></li>
                                                                 </ul>
                                                            </li>
                                                            <li class="dropdown-submenu">
                                                                 <a href="<?php echo wl('regiony'); ?>"><i class="icon-globe"></i>&nbsp;<?php echo $lang['regionals']; ?></a>
                                                                 <ul class="dropdown-menu">
                                                                      <li class="dropdown-submenu">
                                                                           <a href="<?php echo wl('regiony:jiznicechy'); ?>">KS Jihočeský kraj</a></li>
                                                                      	   <ul class="dropdown-menu">
                                                                                <li><a href="<?php echo wl('regiony:jiznicechy:pisecko'); ?>">MS Písecko</a></li>
                                                                           </ul>
                                                                      <li class="dropdown-submenu">
                                                                           <a href="<?php echo wl('regiony:jiznimorava'); ?>">KS Jihomoravský kraj</a>
                                                                           <ul class="dropdown-menu">
                                                                                <li><a href="<?php echo wl('regiony:jiznimorava:slovacko'); ?>">MS Slovácko</a></li>
                                                                                <li><a href="<?php echo wl('regiony:jiznimorava:znojmo'); ?>">MS Znojmo</a></li>
                                                                           </ul>
                                                                      </li>
                                                                      <li class="dropdown-submenu">
                                                                           <a href="<?php echo wl('regiony:karlovarsko'); ?>">KS Karlovarský kraj</a>
                                                                           <ul class="dropdown-menu">
                                                                                <li><a href="<?php echo wl('regiony:karlovarsko:chodov'); ?>">MS Chodov</a></li>
                                                                                <li><a href="<?php echo wl('regiony:karlovarsko:valec'); ?>">MS Valeč</a></li>
                                                                                <li><a href="<?php echo wl('regiony:karlovarsko:marianskelazne'); ?>">MS Mariánské Lázně</a></li>
                                                                                <li><a href="<?php echo wl('regiony:karlovarsko:as'); ?>">MS Aš</a></li>
                                                                           </ul>
                                                                      </li>
                                                                      <li><a href="<?php echo wl('regiony:kralovehradecko'); ?>">KS Královéhradecký kraj</a></li>
                                                                      <li><a href="<?php echo wl('regiony:liberecko'); ?>">KS Liberecký kraj</a></li>
                                                                      <li class="dropdown-submenu">
                                                                           <a href="<?php echo wl('regiony:moravskoslezsko'); ?>">KS Moravskoslezský kraj</a>
                                                                           <ul class="dropdown-menu">
                                                                                <li><a href="<?php echo wl('regiony:moravskoslezsko:karvinsko'); ?>">MS Karvinsko</a></li>
                                                                                <li><a href="<?php echo wl('regiony:moravskoslezsko:moravska_ostrava_privoz'); ?>">MS Moravská Ostrava a Přívoz</a></li>
                                                                           </ul>
                                                                      </li>
                                                                      <li><a href="<?php echo wl('regiony:pardubicko'); ?>">KS Pardubický kraj</a></li>
                                                                      <li class="dropdown-submenu">
                                                                           <a href="<?php echo wl('regiony:plzensko'); ?>">KS Plzeňský kraj</a>
                                                                           <ul class="dropdown-menu">
                                                                                <li><a href="<?php echo wl('regiony:plzensko:plzen'); ?>">MS Plzeň</a></li>
                                                                                <li><a href="<?php echo wl('regiony:plzensko:tachovsko'); ?>">MS Tachovsko</a></li>
                                                                                <li><a href="<?php echo wl('regiony:plzensko:rokycansko'); ?>">MS Rokycansko</a></li>
                                                                           </ul>
                                                                      </li>
                                                                      <li class="dropdown-submenu">
                                                                           <a href="<?php echo wl('regiony:praha'); ?>">KS Praha</a>
                                                                           <ul class="dropdown-menu">
                                                                                <li><a href="<?php echo wl('regiony:praha:radotin'); ?>">MS Radotín</a></li>
                                                                           </ul>
                                                                      </li>
                                                                      <li class="dropdown-submenu">
                                                                      	<a href="<?php echo wl('regiony:olomoucko'); ?>">KS Olomoucký kraj</a></li>
									<ul class="dropdown-menu">
                                                                                <li><a href="<?php echo wl('regiony:olomoucko:olomouc'); ?>">MS Olomouc</a></li>
                                                                                <li><a href="<?php echo wl('regiony:olomoucko:piratska_tvrz'); ?>">MS Pirátská tvrz</a></li>
                                                                                <li><a href="<?php echo wl('regiony:olomoucko:prostejov'); ?>">MS Prostějov</a></li>
                                                                                <li><a href="<?php echo wl('regiony:olomoucko:prerov'); ?>">MS Přerov</a></li>
                                                                           </ul>
                                                                      <li class="dropdown-submenu">
                                                                           <a href="<?php echo wl('regiony:strednicechy'); ?>">KS Středočeský kraj</a>
                                                                           <ul class="dropdown-menu">
                                                                                <li><a href="<?php echo wl('regiony:strednicechy:nymburk'); ?>">MS Nymburk</a></li>
                                                                                <li><a href="<?php echo wl('regiony:strednicechy:pribram'); ?>">MS Příbram</a></li>
                                                                                <li><a href="<?php echo wl('regiony:strednicechy:kralupy'); ?>">MS Kralupy nad Vltavou</a></li>
                                                                           </ul>
								       </li>
							               <li class="dropdown-submenu">
								           <a href="<?php echo wl('regiony:ustecko'); ?>">KS Ústecký kraj</a>
									   <ul class="dropdown-menu">
										<li><a href="<?php echo wl('regiony:ustecko:zatec'); ?>">MS Žatec</a></li>
										<li><a href="<?php echo wl('regiony:ustecko:decin'); ?>">MS Děčín</a></li>
									   </ul>
								       </li>
								       <li><a href="<?php echo wl('regiony:vysocina'); ?>">KS Vysočina</a></li>
								  	 <li class="dropdown-submenu">
									   <a href="<?php echo wl('regiony:zlinsko'); ?>">KS Zlínský kraj</a></li>
									   <ul class="dropdown-menu">
									     <li><a href="<?php echo wl('regiony:zlinsko:pirati_vsetin'); ?>">MS Piráti Vsetín</a></li>
									  </ul>
								</ul>
                                                  </li>
                                             </ul>
                                        </li>



                                        <li class="dropdown">
                                             <a href="#web" class="dropdown-toggle" data-toggle="dropdown"><i class="tplicon-web"></i>&nbsp;Web<b class="caret"></b></a>
                                             <ul class="dropdown-menu">
                                                  <li class="dropdown-submenu">
                                                  <a href="#page"><i class="icon-file"></i>&nbsp;<?php echo $lang['page']; ?></a>
                                                       <ul class="dropdown-menu">
                                                            <?php if($ACT=='show' || $ACT=='search' and $INFO['writable']): ?>
                                                                 <li><?php tpl_actionlink('edit','<i class="icon-pencil"></i>&nbsp;'); ?></li>
                                                            <?php else: ?>
                                                                 <li><?php tpl_actionlink('edit','<i class="icon-eye-open"></i>&nbsp;'); ?></li>
                                                            <?php endif; ?>
                                                            <li><?php tpl_actionlink('history','<i class="icon-time"></i>&nbsp;'); ?></li>
                                                            <?php if(function_exists('cite_getPermURL')): ?>
                                                            <li><a href="<?php echo cite_getPermURL(); ?>" rel="nofollow"><i class="icon-bookmark"></i>&nbsp;Permanentní odkaz</a></li>
                                                            <?php endif; ?>
                                                            <li><?php tpl_actionlink('subscription','<i class="icon-envelope"></i>&nbsp;'); ?></li>
                                                            <li>
                                                                 <a href="#dokuwiki_acl" id="dokuwiki_acl_button"><i class="icon-warning-sign"></i>&nbsp;Oprávnění</a>
                                                            </li>
                                                       </ul>
                                                  </li>
                                                  <?php if($INFO['isadmin'] || $INFO['ismanager']): ?>
                                                       <li class="divider"></li>
                                                       <li class="dropdown-submenu">
                                                            <a href="#admin"><i class="icon-wrench"></i>&nbsp;Administrace</a>
                                                            <ul class="dropdown-menu">
                                                                 <li><a href="#dokuwiki_msgs" id="dokuwiki_msgs_button"><i class="icon-inbox"></i>&nbsp;Zprávy dokuwiki</a></li>
                                                                 <li><?php tpl_actionlink('admin','<i class="icon-wrench"></i>&nbsp;'); ?></li>
                                                                 <?php /* <li><?php tpl_actionlink('admin','<i class="icon-eye-open"></i>&nbsp;'); ?></li> */ ?>
                                                            </ul>
                                                       </li>
                                                  <?php endif; ?>
                                                  <li class="divider"></li>
                                                  <li><?php tpl_actionlink('index','<i class="icon-list"></i>&nbsp;'); ?></li>
                                                  <li><?php tpl_actionlink('recent','<i class="icon-time"></i>&nbsp;'); ?></li>
                                                  <li><?php tpl_actionlink('media','<i class="icon-picture"></i>&nbsp;'); ?></li>
                                                  <li><a href="<?php echo wl('napoveda'); ?>"><i class=" icon-question-sign"></i>&nbsp;Nápověda</a></li>
                                             </ul>
                                        </li>
                                        <li><a href="https://irc.pirati.cz/?channels=webchat"><i class="tplicon-chat"></i>&nbsp;Chat</a></li>
                                        <li><a href="https://forum.pirati.cz/"><i class="tplicon-forum"></i>&nbsp;Fórum</a></li>
                                        <li><a href="<?php echo wl('novinky') ?>"><i class="tplicon-news"></i>&nbsp;Novinky</a></li>
                                        <li class="dropdown">
                                             <a href="#zapoj_se" class="dropdown-toggle" data-toggle="dropdown"><i class="tplicon-po"></i>&nbsp;Zapoj se<b class="caret"></b></a>
                                             <ul class="dropdown-menu">
                                                  <li><?php tpl_pagelink(':projekty:start'); ?></li>
                                                  <?php /* <li><?php tpl_pagelink(':po:zapoj_se'); ?></li> */ ?>
                                                  <li><?php tpl_pagelink(':po:ukoly:start'); ?></li>
                                             </ul>
                                        </li>
                                        <li><a href="http://shop.pirati.cz"><i class="tplicon-shop"></i>&nbsp;Obchod</a></li>
                                        <li class="dropdown">
                                             <a href="#pirati-v-ziti" class="dropdown-toggle" data-toggle="dropdown"><i class="tplicon-con"></i>&nbsp;Piráti v síti<b class="caret"></b></a>
                                             <ul class="dropdown-menu">
                                                  <li><a href="http://www.flickr.com/photos/pirati/" target="_blank"><i class="tplicon-flickr"></i>&nbsp;Obrázky</a></li>
                                                  <li><a href="http://www.youtube.com/user/CeskaPiratskaStrana" target="_blank"><i class="tplicon-youtube"></i>&nbsp;Videa</a></li>
                                                  <li class="dropdown-submenu">
                                                       <a href="#facebook"><i class="tplicon-facebook"></i>&nbsp;Facebook</a>
                                                       <ul class="dropdown-menu">
                                                            <li><a href="https://www.facebook.com/ceska.piratska.strana" target="_blank"><i class="tplicon-facebook"></i>&nbsp;Hlavní stránka</a></li>
                                                            <li><a href="https://www.facebook.com/pages/%C4%8Cesk%C3%A1-pir%C3%A1tsk%C3%A1-strana-Jiho%C4%8Desk%C3%BD-kraj/375868542113" target="_blank"><i class="tplicon-facebook"></i>&nbsp;Jihočeský kraj</a></li>
                                                            <li><a href="https://www.facebook.com/CPS.JMK" target="_blank"><i class="tplicon-facebook"></i>&nbsp;Jihomoravský kraj</a></li>
                                                            <li><a href="https://www.facebook.com/pirati.karlovarsko" target="_blank"><i class="tplicon-facebook"></i>&nbsp;Karlovarský kraj</a></li>
                                                            <li><a href="https://www.facebook.com/pirati.khk" target="_blank"><i class="tplicon-facebook"></i>&nbsp;Královéhradecký kraj</a></li>
                                                            <li><a href="https://www.facebook.com/pages/%C4%8Cesk%C3%A1-pir%C3%A1tsk%C3%A1-strana-Kr%C3%A1lov%C3%A9hradeck%C3%BD-kraj/163186777045684" target="_blank"><i class="tplicon-facebook"></i>&nbsp;Královéhradecký kraj</a></li>
                                                            <li><a href="https://www.facebook.com/cpslbc" target="_blank"><i class="tplicon-facebook"></i>&nbsp;Liberecký kraj</a></li>
                                                            <li><a href="https://www.facebook.com/cpsmsk" target="_blank"><i class="tplicon-facebook"></i>&nbsp;Moravskoslezský kraj</a></li>
                                                            <li><a href="https://www.facebook.com/olomoucko.pirati" target="_blank"><i class="tplicon-facebook"></i>&nbsp;Olomoucký kraj</a></li>
                                                            <li><a href="https://www.facebook.com/pages/Pir%C3%A1ti-Pardubick%C3%BD-kraj/161396423900274" target="_blank"><i class="tplicon-facebook"></i>&nbsp;Pardubický kraj</a></li>
                                                            <li><a href="https://www.facebook.com/plzenska.piratska.strana" target="_blank"><i class="tplicon-facebook"></i>&nbsp;Plzeňský kraj</a></li>
                                                            <li><a href="https://www.facebook.com/groups/125479366717" target="_blank"><i class="tplicon-facebook"></i>&nbsp;Praha</a></li>
                                                            <li><a href="https://www.facebook.com/pirati.stc" target="_blank"><i class="tplicon-facebook"></i>&nbsp;Středočeský kraj</a></li>
                                                            <li><a href="https://www.facebook.com/pirati.ulk" target="_blank"><i class="tplicon-facebook"></i>&nbsp;Ústecký kraj</a></li>
                                                            <li><a href="https://www.facebook.com/pirati.vysocina" target="_blank"><i class="tplicon-facebook"></i>&nbsp;Vysočina</a></li>
                                                            <li><a href="https://www.facebook.com/groups/121441450941/" target="_blank"><i class="tplicon-facebook"></i>&nbsp;Zlínský kraj</a></li>
                                                       </ul>
                                                  </li>
                                                  <li class="dropdown-submenu">
                                                       <a href="#twitter"><i class="tplicon-twitter"></i>&nbsp;Twitter</a>
                                                       <ul class="dropdown-menu">
                                                            <li><a href="https://twitter.com/PiratePartyCZ" target="_blank"><i class="tplicon-twitter"></i>&nbsp;Hlavní</a></li>
                                                            <li><a href="https://twitter.com/CZPirates_en" target="_blank"><i class="tplicon-twitter"></i>&nbsp;Anglický / English</a></li>
                                                            <li><a href="https://twitter.com/piratipraha" target="_blank"><i class="tplicon-twitter"></i>&nbsp;Praha</a></li>
                                                            <li><a href="https://twitter.com/pirati_stc" target="_blank"><i class="tplicon-twitter"></i>&nbsp;Středočeský kraj</a></li>
                                                       </ul> 
                                                  </li>
                                                  <li><a href="https://plus.google.com/102273861916995533911/posts" target="_blank"><i class="tplicon-gplus"></i>&nbsp;Google</a></li>
                                             </ul>
                                        </li>
                                   </ul>
                                   <ul class="nav pull-right">
<?php /*
                                        <li class="dropdown">
                                             <a href="#sharing-is-caring" class="dropdown-toggle" data-toggle="dropdown"><i class="tplicon-share"></i>&nbsp;Sdílet<b class="caret"></b></a>
                                             <ul class="dropdown-menu">
                                                  <li><a href="#" onclick="pshare('Facebook','http://www.facebook.com/sharer/sharer.php?u=<?php echo DOKU_URL.wl(); ?>&amp;display=popup',650,306); return false;"><i class="tplicon-facebook"></i>&nbsp;Facebook</a></li>
                                                  <li><a href="https://twitter.com/intent/tweet?text=&url=" target="_blank"><i class="tplicon-twitter"></i>&nbsp;Twitter</a></li>
<!-- http://www.facebook.com/sharer/sharer.php?u=<?php echo DOKU_URL.wl(); ?>'); return false;" -->
                                                  <li><a href="#"><i class="tplicon-google"></i>&nbsp;Google+</a></li>
                                                  <li><a href="#"><i class="tplicon-blogger"></i>&nbsp;Blogger</a></li>
                                                  <li><a href="#"><i class="tplicon-reddit"></i>&nbsp;reddit</a></li>
                                                  <li><a href="#"><i class="tplicon-tumblr"></i>&nbsp;tumblr</a></li>
                                                  <li><a href="#"><i class="tplicon-livejournal"></i>&nbsp;LiveJournal</a></li>
                                                  <li><a href="#"><i class="tplicon-linkedin"></i>&nbsp;LinkedIn</a></li>
                                                  <li><a href="#"><i class="tplicon-hacker"></i>&nbsp;Hacker News</a></li>
                                                  <li><a href="#"><i class="tplicon-buffer"></i>&nbsp;Buffer</a></li>
                                                  <li><a href="#"><i class="tplicon-vkontakte"></i>&nbsp;ВКонтакте</a></li>
                                                  <li><a href="#"><i class="tplicon-odnoklassniki"></i>&nbsp;Одноклассники</a></li>
                                                  <li><a href="#"><i class="tplicon-ameba"></i>&nbsp;Ameba</a></li>
                                             </ul>
                                        </li>
 */ ?>
                                        <?php
                                             $tran = &plugin_load('helper','translation');
                                             if($tran){
                                                  list($lc,$idpart) = $tran->getTransParts($ID);
                                                  list($link, $l) = $tran->buildTransID($lc, $idpart);
                                                  $langs = $tran->getAvailableTranslations($ID);
                                                  $langscnt = count($langs);
                                        ?>
                                             <li<?php echo ($langscnt>0?' class="dropdown"':''); ?>>
                                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?php echo DOKU_BASE.'lib/plugins/translation/flags/'.hsc($l).'.gif'; ?>" alt="<?php echo $tran->getLocalName($l); ?>">&nbsp;<?php echo $tran->getLocalName($l); ?><?php echo ($langscnt>0?'<b class="caret"></b>':''); ?></a>
                                                  <?php if($langscnt>0): ?>
                                                       <ul class="dropdown-menu">
                                                            <?php foreach($langs as $name=>$link): ?>
                                                                 <li class=""><a href="<?php echo wl(ltrim($link,':')); ?>"><img src="<?php echo DOKU_BASE.'lib/plugins/translation/flags/'.hsc($name).'.gif'; ?>" alt="<?php echo $name; ?>">&nbsp;<?php echo $tran->getLocalName($name); ?></a></li>
                                                            <?php endforeach; ?>
                                                       </ul>
                                                  <?php endif; ?>
                                             </li>
                                        <?php } ?>
                                        <li class="dropdown">
                                             <?php if($INFO['userinfo']): ?>
                                                  <a href="#user" class="dropdown-toggle" data-toggle="dropdown"><i class="tplicon-user"></i>&nbsp;<?php echo $INFO['userinfo']['name']; ?><b class="caret"></b></a>
                                                  <ul class="dropdown-menu">
                                                       <li><a href="<?php echo wl('lide:'.$INFO['userinfo']['name']); ?>"><i class="icon-user"></i>&nbsp;Profil</a></li>
                                                       <li><?php tpl_actionlink('login','<i class="icon-off"></i>&nbsp;'); ?></li>
                                                  </ul>
                                             <?php else: ?>
                                                  <a href="#user" class="dropdown-toggle" data-toggle="dropdown"><i class="tplicon-user"></i>&nbsp;Nepřihlášený<b class="caret"></b></a>
                                                  <ul class="dropdown-menu">
                                                       <li><?php tpl_actionlink('login'); ?></li>
                                                  </ul>
                                             <?php endif; ?>
                                        </li>
                                   </ul>
                              </div>
                         </div>
                    </div>
               </div>
