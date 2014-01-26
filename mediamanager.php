<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
/**
 * DokuWiki Default Template
 *
 * This is the template for the media manager popup
 *
 * You should leave the doctype at the very top - It should
 * always be the very first line of a document.
 *
 * @link   http://dokuwiki.org/templates
 * @author Andreas Gohr <andi@splitbrain.org>
 */
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $conf['lang']?>" lang="<?php echo $conf['lang']?>" dir="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>
    <?php echo hsc($lang['mediaselect'])?>
    [<?php echo strip_tags($conf['title'])?>]
  </title>
  <?php tpl_metaheaders()?>
  <link rel="shortcut icon" href="<?php echo DOKU_TPL?>images/favicon.ico" />
</head>

<body>
<div id="media__manager" class="dokuwiki">
    <div id="media__left">
        <?php html_msgarea()?>
        <h1><?php echo hsc($lang['mediaselect'])?></h1>

        <?php /* keep the id! additional elements are inserted via JS here */?>
        <div id="media__opts"></div>

        <?php tpl_mediaTree() ?>
    </div>

    <div id="media__right">
          <?php tpl_mediaContent() ?>
               <script type="text/javascript">
               
               jQuery(window).mousemove(function(){
                    if(jQuery('#media__ns').text()==':static'){
                         jQuery('#media__right .detail').remove();
                         jQuery('.odd a,.even a').each(function(){
                              var h = jQuery(this).attr('href');
                              var n = jQuery(this).attr('name');
                              if(h!=undefined){
                                   if(h.match(/\/static\/(.+)\.(png|jpg|jpeg|gif)/)){
                                        var r = h.split('/');
                                        jQuery(this).attr('href','http://static.pirati.cz/piznam/'+r[r.length-1]);
                                   }
                              }
                              if(n!=undefined && n.match(/^h_/)){
                                   jQuery(this).attr('name',n.replace(/:static:/,'http://static.pirati.cz/piznam/'));
                              }
                         });
                         jQuery('code').each(function(){
                              var code = jQuery(this).text();
                              jQuery(this).text(code.replace(/:static:/,'http://static.pirati.cz/piznam/'));
                         });
                    }
               });
          </script>

    </div>
</div>
</body>
</html>

