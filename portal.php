<?php
$_mk = p_wiki_xhtml(':mo:megakampan');
if(preg_match('/Stránka s tímto názvem ještě neexistuje/i',$_mk)==0): ?>
<div class="row-fluid">
     <div id="col-center" class="span12">
          <?php echo $_mk; ?>
     </div>
</div>
<?php
endif;
/* ?>
<div class="row-fluid">
     <div id="col-center" class="span12">
          <?php include('box-mega-banner.php') ?>
     </div>
</div>
<?php
 */
/*
<div class="row-fluid">
     <div id="col-center" class="span12">
          <?php include('box-mega-volby.php') ?>
     </div>
          </div>
 */ ?>
<div id="main" class="row-fluid">
     <div id="col-left" class="span6">
          <?php include('box-menu.php'); ?>
          <?php include('box-tz.php'); ?> 
          <?php include('box-news.php'); ?>
          <?php include('box-youtube.php'); ?>
     </div>
     <div id="col-right" class="span6">
          <?php include('box-campaign.php'); ?>
          <?php include('box-calendar.php'); ?>
          <?php include('box-fo.php'); ?>
     </div>
</div>
