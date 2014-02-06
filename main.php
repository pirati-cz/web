<?php
// must be run from within DokuWiki
if (!defined('DOKU_INC')) die();
setlocale(LC_TIME,'cs_CZ.utf8');

// template config
@include(DOKU_TPLINC.'conf/default.php');
// template language
@include(DOKU_TPLINC.'lang/'.$conf['lang'].'/lang.php');

?>
<!DOCTYPE html>
<html lang="<?php echo $conf['lang']; ?>" dir="<?php echo $lang['direction']; ?>">
     <head>
          <!-- metas and title -->
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <?php $_site_name = (tpl_pagetitle(null,true)=='portal'?'Hlavní stránka':tpl_pagetitle(null,true)).' - '.strip_tags($conf['title']); ?>
          <title><?php echo $_site_name; ?></title>
          <!-- social metas -->
          <meta property="og:title" content="<?php echo $_site_name; ?>">
          <meta property="og:site_name" content="Pirati.CZ"/>
          <meta property="og:url" content="<?php echo htmlspecialchars(($_SERVER['HTTPS'] ? 'https://' : 'http://') . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']); ?>">
          <?php
               $_blogtng_helper =& plugin_load('helper', 'blogtng_entry');
               $_blogtng_helper->load_by_pid(md5($ID));
          if(!empty($_blogtng_helper->entry['page'])):
                    $_blogtng_helper =& plugin_load('helper', 'blogtng_entry');
                    $_blogtng_helper->load_by_pid(md5($ID));
                    $_blogtng = $_blogtng_helper->entry;
                    $_blogtng_helper_tags =& plugin_load('helper', 'blogtng_tags');
                    $_blogtng_helper_tags->load(md5($ID)); 
          ?>
               <meta property="og:type" content="article">
               <meta property="og:published_time" content="<?php echo $_blogtng['created']; ?>">
               <meta property="og:modified_time" content="<?php echo $_blogtng['lastmod']; ?>">
               <meta property="og:section" content="<?php echo $INFO['namespace']; ?>">
               <?php foreach($_blogtng_helper_tags->tags as $_tag): ?>
                    <meta property="og:tag" content="<?php echo $_tag; ?>">
               <?php endforeach; ?>
          <?php else: ?>
               <meta property="og:type" content="website">
          <?php endif; ?>

          <?php
               $_firstimage = p_get_metadata($ID, 'relation');
               if(is_array($_firstimage)) $_firstimage = $_firstimage['firstimage'];
               if(!empty($_firstimage)):
                    $_filepath = str_replace(':','/',$_firstimage);
                    $_firstimageinfo = getimagesize(DOKU_INC.'data/media/'.$_filepath);
          ?>
               <meta property="og:image" content="http://www.pirati.cz/_media/<?php echo $_filepath; ?>"/>
               <meta property="og:image:type" content="<?php echo $_firstimageinfo['mime']; ?>"/>
               <meta property="og:image:width" content="<?php echo $_firstimageinfo[0]; ?>" />
               <meta property="og:image:height" content="<?php echo $_firstimageinfo[1]; ?>" />
          <?php endif; ?>
          <meta property="og:image" content="http://www.pirati.cz/lib/tpl/pirati/images/fblogotyp.png"/>
          <meta property="og:image:type" content="image/png" />
          <meta property="og:image:width" content="1200" />
          <meta property="og:image:height" content="1200" />
          <meta property="og:image" content="http://www.pirati.cz/lib/tpl/pirati/images/fblogo.png"/>
          <meta property="og:image:type" content="image/png" />
          <meta property="og:image:width" content="1200" />
          <meta property="og:image:height" content="1200" />          
          <?php $_site_desc = (tpl_pagetitle(null,true)=='portal'?array('abstract'=>'Cílem Pirátské strany je na prvním místě prosazování základního práva člověka na svobodné šíření informací a striktní ochranu soukromí občana.'):p_get_metadata($ID, 'description')); ?>
          <meta property="og:description" content="<?php echo $_site_desc['abstract']; ?>"/>
          <meta property="fb:admins" content="1609075674"/>
          <meta property="fb:admins" content="1734211895"/>
          <meta property="fb:admins" content="1507905830"/>
          <?php echo tpl_favicon(array('favicon', 'mobile')) ?>
          <?php tpl_metaheaders(); ?>

          <?php /*old includehook/ @include(dirname(__FILE__).'/meta.html') */ ?>
          
          <?php if(isset($_GET['dev'])): ?>
               <?php include('sublayouts/layout_tdwfb_head.php'); ?>
          <?php endif; ?>
     </head>
     <body>
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-34662053-2']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<?php if(isset($_GET['dev'])): ?>
     <?php include('sublayouts/layout_tdwfb.php'); ?>
<?php endif; ?>

          <div class="dokuwiki">
 
               <?php $_tpl_navbar_class = '';  include('navbar.php'); ?>
               <?php if(isset($_GET['dev'])): $_tpl_navbar_class = ' navbar-inverse layout-tdwpb-bar'; ?>
                    <?php include('navbar.php'); ?>
               <?php endif; ?>

               <div id="dokuwiki_msgs">
                    <?php html_msgarea(); ?>
               </div>
               <div id="dokuwiki_acl">
                    <?php
                         $_f = array('class="li">','nemá','má','žádná oprávnění','číst','nahrávat','vytvářet','mazat','upravovat');
                         $_t = array('class="li"><b>','</b>nemá','</b>má','<i class="n">žádná oprávnění</i>','<i class="r">číst</i>','<i class="u">nahrávat</i>','<i class="c">vytvářet</i>','<i class="u">mazat</i>','<i class="u">upravovat</i>');
                    ?>
                    <?php echo str_replace($_f,$_t,p_render('xhtml',p_get_instructions("~~ACLINFO~~\n~~NOTOC~~"),$info)); ?>
               </div>
               <div id="page">
                    <div id="head">
                         <div id="headbox">
                              <div id="search" class="input-append">
                                   <form action="<?php echo wl(); ?>" method="get">
                                        <input type="hidden" name="do" value="search">
                                        <input type="text" name="id" placeholder="Vyhledávání..." id="qsearch__in" accesskey="f" title="Nápověda">
                                        <button type="submit" class="btn"><i class="icon-search"></i></button>
                                        <div id="qsearch__out" class="ajax_qsearch JSpopup"></div>
                                   </form>
                              </div>
                         </div>
                         <a href="<?php echo wl(); ?>" id="logo"></a>
                         <?php // <img src="<?p>images/logo.png" alt="Logo" width="249" height="89"></a> ?>
                         <!-- <div id="search-small" class="input-append hidden-desktop">
                              <input type="text" name="search" placeholder="Vyhledávání...">
                              <button class="btn"><i class="icon-search"></i></button>
                         </div> -->
                    </div>
                    <?php if(preg_match('/(.*)portal$/',$ID,$matches)>0 and $ACT=='show'):
                         $langs = explode(',',$conf['plugin']['translation']['translations']);
                         if(in_array($matches[1],$langs) and file_exists('_portal-'.$matches[1].'.php')){
                              include('portal-'.$matches[1].'.php');
                         } else {
                              include('portal.php');
                         }
                    else: ?>
                         <div id="youarehere">
                              <?php tpl_youarehere(); ?>
                         </div>
                         <div id="main" class="row-fluid">
                              <div class="container-fluid">
                                   <?php tpl_content(false); ?>
                              </div>
                         </div>
                    <?php endif; ?>
               </div>

               <div id="bottom">
                    <span style="-webkit-transform: rotate(180deg); -moz-transform: rotate(180deg); -o-transform: rotate(180deg); -khtml-transform: rotate(180deg); -ms-transform: rotate(180deg); transform: rotate(180deg); display: inline-block; font-size:1em">&copy;</span>
                    Piráti, <?php echo date('Y') ?>. Všechna práva vyhlazena. Sdílejte a nechte ostatní sdílet za stejných podmínek. <a href="<?php echo wl('web:podminky'); ?>">Podmínky použití</a>.<br/>
<?php /*
<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style ">
     <a class="addthis_button_facebook_like" fb:like:width="135" fb:like:layout="button_count" fb:like:href="https://www.facebook.com/ceska.piratska.strana"></a>
     <a class="addthis_button_tweet" tw:url="www.pirati.cz"></a>
     <a class="addthis_button_google_plusone" g:plusone:size="medium" g:plusone:href="http://www.pirati.cz"></a>
     <a class="addthis_counter addthis_button"><img src="https://static.pirati.cz/piznam/sdilet.gif" width="50" height="20" border="0" alt="Share" /></a>
</div>
<script type="text/javascript">var addthis_config = { ui_language: "cs" };</script>
<script type="text/javascript" src="https://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4fce6e2a54fe4220&amp;domready=1"></script>
 <!-- AddThis Button END -->
*/ ?>
               </div>

               <?php /*old includehook @include(dirname(__FILE__).'/footer.html') */ ?>
               <div class="no"><?php /* provide DokuWiki housekeeping, required in all templates  tpl_indexerWebBug() <-- Cron */ ?></div>

          </div>
     </body>
</html>
