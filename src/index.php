<?php

ob_start();
if(isset($_GET['novinky'])){
     include('novinky.php');
} else {
     include('titulka.php');
}
$content = ob_get_clean();

?>
<!DOCTYPE html>
<html lang="cs" dir="ltr">
     <head>
          <!-- metas and title -->
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <meta name="generator" content="DokuWiki">
		<meta name="robots" content="index,follow">
		<meta name="keywords" content="portal">
          <meta name="description" content="Cílem Pirátské strany je na prvním místě prosazování základního práva člověka na svobodné šíření informací a striktní ochranu soukromí občana. Pirátský programProjektyČlenstvíKontakt">
          <title><?php echo $title; ?> - Pirati.CZ</title>
          <!-- social metas -->
          <meta property="og:title" content="Hlavní stránka - Pirati.CZ">
		<meta property="og:type" content="website">
		<meta property="og:url" content="http://www.pirati.cz/portal">
		<meta property="og:image" content="http://static.pirati.cz/piznam/logo.png">
		<meta property="og:image" content="http://www.pirati.cz/_media/icons/rss_yellow.jpeg">
		<meta property="og:image" content="https://www.pirati.cz/_media/tiskove-zpravy/logo_svobodna_hudba.png?w=380">
		<meta property="og:image" content="http://www.pirati.cz/_media/icons/rss_yellow.jpeg">
		<meta property="og:image" content="https://www.pirati.cz/_media/stanoviska/kopacky106.jpg?w=380">
		<meta property="og:image" content="http://www.pirati.cz/_media/icons/rss_yellow.jpeg">
		<meta property="og:image" content="http://www.pirati.cz/_media/static/sdilet.gif">
		<meta property="og:image" content="http://static.pirati.cz/piznam/plachta_bez_okraje.png">
		<meta property="og:description" content="Cílem Pirátské strany je na prvním místě prosazování základního práva člověka na svobodné šíření informací a striktní ochranu soukromí občana. Pirátský programProjektyČlenstvíKontakt">
          <meta property="fb:admins" content="1734211895">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <!-- links -->
          <link href="/favicon.png" rel="icon" type="image/png">
          <link rel="search" type="application/opensearchdescription+xml" href="/lib/exe/opensearch.php" title="Pirati.CZ">
		<link rel="start" href="/">
		<link rel="contents" href="/portal?do=index" title="Index">
          <link rel="canonical" href="https://www.pirati.cz/portal">
          <link rel="alternate" type="application/rss+xml" title="Tiskové zprávy a stanoviska České pirátské strany" href="http://www.pirati.cz/piznam/feed.php?mode=blogtng&amp;blog=default&amp;ns=tiskove-zpravy&amp;linkto=current&amp;content=html">
          <!-- stylesheets -->
		<link rel="stylesheet" media="all" type="text/css" href="/css/bootstrap.min.css">
          <link rel="stylesheet" media="all" type="text/css" href="/css/bootstrap-responsive.min.css">
          <link rel="stylesheet" media="all" type="text/css" href="/css/all.css">
          <link rel="stylesheet" media="all" type="text/css" href="/css/print.css">
          <!-- javscripts -->
          <script type="text/javascript"><!--//--><![CDATA[//><!--
		     var NS='';var SIG=' --- //[[vaclav.malek@pirati.cz|Václav Málek (Vaclav Malek)]] 01.03.2013 02:31//';var JSINFO = {"id":"portal","namespace":""};
		//--><!]]>
          </script>
          <script type="text/javascript" charset="utf-8" src="/js/jquery.min.js"></script>
		<script type="text/javascript" charset="utf-8" src="/js/bootstrap.min.js"></script>
          <script type="text/javascript" charset="utf-8" src="/js/raphael-min.js"></script>
          <script type="text/javascript" charset="utf-8" src="/js/script.js"></script>
     </head>
     <body>
          <div class="navbar navbar-fixed-top" id="pagebar">
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
                                        <a href="#web" class="dropdown-toggle" data-toggle="dropdown"><img src="/img/topmenu_web.png" alt="web">&nbsp;Web<b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                             <li><a href="#login">Přihlásit</a></li>
                                             <li class="divider"></li>
                                             <li class="dropdown-submenu">
                                                  <a href="#page">Stránka</a>
                                                  <ul class="dropdown-menu">
                                                       <li><a href="edit">Upravit stránku</a></li>
                                                       <li><a href="history">Starší verze</a></li>
                                                       <li><a href="permlink">Permanentní odkaz</a></li>
                                                       <li><a href="subscribe">Odebírat e-mailem změny</a></li>
                                                       <li><a href="cite">Citovat</a></li>
                                                  </ul>
                                             </li>
                                             <li class="divider"></li>
                                             <li><a href="#page">Správa webu</a></li>
                                             <li class="dropdown-submenu">
                                                  <a href="#page">Vzhled</a>
                                                  <ul class="dropdown-menu">
                                                       <li><a href="#001">Výchozí</a></li>
                                                       <li><a href="#002">steampunk</a></li>
                                                       <li><a href="#003">MLP</a></li>
                                                       <li><a href="#004">kopy</a></li>
                                                       <li><a href="#005">9000</a></li>
                                                </ul>
                                             </li>
                                             <li class="divider"></li>
                                             <li><a href="#index">Index stránek</a></li>
                                             <li><a href="#recent">Poslední úpravy</a></li>
                                             <li><a href="#help">Nápověda</a></li>
                                        </ul>
                                   </li>
                                   <li><a href="#forum"><img src="/img/topmenu_forum.png" alt="fórum">&nbsp;Fórum</a></li>
                                   <li><a href="#shop"><img src="/img/topmenu_shop.png" alt="obchod">&nbsp;Obchod</a></li>
                                   <li><a href="#novinky"><img src="/img/topmenu_news.gif" alt="zprávy">&nbsp;Zprávy</a></li>
                                   <li><a href="#images"><img src="/img/topmenu_foto.png" alt="obrázky">&nbsp;Obrázky</a></li>
                                   <li><a href="#videa"><img src="/img/topmenu_youtube.png" alt="videa">&nbsp;Videa</a></li>
                                   <li><a href="#facebook"><img src="/img/topmenu_facebook.png" alt="facebook">&nbsp;Facebook</a></li>
                                   <li><a href="#twitter"><img src="/img/topmenu_twitter.png" alt="twitter">&nbsp;Twitter</a></li>
                                   <li><a href="#gplus"><img src="/img/topmenu_gplus.png" alt="gplus">&nbsp;Google</a></li>
                              </ul>
                              <ul class="nav pull-right">
                                   <li><a href="#login"><img src="/img/topmenu_user.png" alt="uživatel">&nbsp;Nepřihlášený</a></li>
                              </ul>
                         </div>
                    </div>
               </div>
          </div>
          <div id="page">
               <div id="head">
                    <div id="headbox">
                         <div id="search" class="input-append visible-desktop">
                              <input type="text" name="search" placeholder="Vyhledávání...">
                              <button class="btn"><i class="icon-search"></i></button>
                         </div>
                    </div>
                    <a href="/"><img src="/img/logo.png" alt="Logo"></a>
                    <div id="search-small" class="input-append hidden-desktop">
                         <input type="text" name="search" placeholder="Vyhledávání...">
                         <button class="btn"><i class="icon-search"></i></button>
                    </div>
               </div>
               <div id="main" class="row-fluid">
                    <?php echo $content; ?>
               </div>
          </div>
          <div id="bottom">
               <span style="-webkit-transform: rotate(180deg); -moz-transform: rotate(180deg); -o-transform: rotate(180deg); -khtml-transform: rotate(180deg); -ms-transform: rotate(180deg); transform: rotate(180deg); display: inline-block; font-size:1em">&copy;</span>
               Piráti, <?php echo date('Y') ?>. Všechna práva vyhlazena. Sdílejte a nechte ostatní sdílet za stejných podmínek. <a href="#podminky">Podmínky použití</a>.
<?php /*               <div>
                    <div class="form-search">
                         <span id="sharing">
                              Tady se načtou socky...
                         </span>
                         <div class="input-append">
                              <a href="#sharing" class="btn btn-danger btn-mini">Sdílet &raquo;</a>
                         </div>
                    </div>
                    </div> */ ?>
          </div>
     </body>
</html>

