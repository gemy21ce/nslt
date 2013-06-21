<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?= lang('home.title') ?></title>
<link href="/favicon.ico" rel="icon" type="image/x-icon"/>
<noscript>
<meta http-equiv="refresh" runat="server" id="mtaJSCheck" content="0; url=/missing.html" />
</noscript>
<meta name="keywords" content="<?= lang('home.metakeywords') ?>" />
<meta name="description" content="<?= lang('home.metadescription') ?>"  />
<meta property="og:title" content="<?= lang('home.title') ?>" />
<meta property="og:description" content="<?= lang('home.metadescription') ?>" />
<meta property="og:image" content="<?php echo base_url(); ?>assets/frontend/images/logo.png" />
<!-- styles -->
<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/style.css" />
<?php if ($this->lang->lang() == 'ar') {
    ?>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/rtl.css" />
<?php } ?>
<!--<link type="text/css" rel="stylesheet" href="css/rtl.css" />-->
<!-- scripts -->
<!-- counter -->
<script src="<?php echo base_url(); ?>assets/frontend/js/jquery-1.7.1.min.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo base_url(); ?>assets/frontend/js/ajax.submit.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo base_url(); ?>assets/frontend/js/jquery.validate.js" type="text/javascript" charset="utf-8"></script>

<!-- slider -->
<script src="<?php echo base_url(); ?>assets/frontend/js/cufon-yui.js" type="text/javascript"></script>
<script type="text/javascript">
    //image hover effect
    $(function(){$(".share a, .gender a").mouseover(function(){var a=jQuery(this).find("img"),b=a.attr("src");a.attr("src",a.attr("longdesc"));a.attr("longdesc",b)}).mouseout(function(){var a=jQuery(this).find("img"),b=a.attr("src");a.attr("src",a.attr("longdesc"));a.attr("longdesc",b)})});
    // popup overlay height
    $(function(){
        $(".popup-overlay").css({
            height:$(document).height()
        });
        /*$(document).scroll(function(){
            $(".details-popup").css({
                top:(($(window).height() - $(".details-popup").outerHeight()) / 2) + $(window).scrollTop()
            });
        });*/
    });
</script>