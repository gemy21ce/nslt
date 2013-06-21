<!DOCTYPE HTML>
<html>
    <head>
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
                var widowHeight = $(window).height();
                var footerHeigh = $('#footer').height();
                var headerHeight = $('#header').height();
                var minHeight = widowHeight - (footerHeigh + headerHeight +70 );
                if ($('body').height() <  widowHeight ) {
                    $('#center-container').css('min-height' , minHeight);
                }
                /*$(document).scroll(function(){
                    $(".details-popup").css({
                        top:(($(window).height() - $(".details-popup").outerHeight()) / 2) + $(window).scrollTop()
                    });
                });*/
            });
        </script>         

    </head>
    <body>
        <!-- CONTAINER -->

        <div class="container">


            <div class="center-container f">
                <!--logo-->
                <div id="header">
                <div class="logo">
                    <a href="<?= base_url() . $this->lang->lang() ?>">
                        <img src="<?= base_url() ?>assets/frontend/images/logo.png" alt="3ash" />
                    </a>
                </div>
                <!-- language -->
                <div class="lang f-r">
                    <?php
                    $user = $this->session->all_userdata();
                    if (!empty($user['username'])):
                        ?>
                        <?= lang('home.welcome') ?>&nbsp;<a class="current" href="<?= base_url() . $this->lang->lang() . '/usermanager/profile' ?>"><?php $namearray = explode(" ", $user['username']);
                    echo $namearray[0]; ?></a>
                        <?= anchor($this->lang->lang() . '/usermanager/logout', lang('home.logout')) ?>
<?php else: ?>
                        <a style="cursor: pointer;" onclick="showPopupId('login-pop');" ><?= lang('home.login') ?></a>
                        | <a style="cursor: pointer;" onclick="showPopupId('signup-pop');" ><?= lang('home.register') ?></a>
<?php endif; ?>

                    <select class="f-r" id="langs">
                        <option value="en" >English</option>
                        <option value="ar" >عربى</option>
                        <option value="fr" >Franco</option>
                    </select>
                    <div class="basket f-r">
                        <?php if ($this->cart->contents()): ?>
                            <a href="<?php echo base_url() . $this->lang->lang(); ?>/tshirts/cart">     <img alt="basket" src="<?php echo base_url(); ?>assets/frontend/images/basket.jpg" /><?= lang('home.basket') ?> <?php echo $this->cart->total_items(); ?> <?= lang('home.items') ?> <?php echo $this->cart->total(); ?><?= lang('home.le') ?></a>
                        <?php else : ?>
                            <img alt="basket" src="<?php echo base_url(); ?>assets/frontend/images/basket.jpg" /> <?= lang('home.yourbasketisempty') ?>
<?php endif; ?>

                    </div>
                </div>
                <script type="text/javascript">
                    $(function(){
                        $('#langs').val('<?php echo $this->lang->lang(); ?>');
                        $('#langs').change(function(){
                            var destination= '';
                            var location = window.location.href;
                            if(location.indexOf('<?php echo $this->lang->lang(); ?>')!= -1){
                                destination = location.substr(location.indexOf('<?php echo $this->lang->lang(); ?>')+2);
                            }
                            window.location.href='<?php echo base_url(); ?>'+$(this).val()+destination;
                        });                       
                    });
                </script>
                <div style="float: right;position:absolute;top:28px;right:0;"><?php //$this->load->view('frontend/cart_view');      ?></div>



                <div class="menu rtl">
                    <a id="1" class="menu" href="<?php echo base_url() . $this->lang->lang() ?>"><?= lang('home.menuHome') ?></a>|
                    <a id="2" class="menu" href="<?php echo base_url() . $this->lang->lang() . '/tshirts/men/' ?>"><?= lang('home.menuMen') ?></a>|
                    <a id="3" class="menu" href="<?php echo base_url() . $this->lang->lang() . '/tshirts/women/' ?>"><?= lang('home.menuWomen') ?></a>|
                    <a id="4" class="menu" href="<?php echo base_url() . $this->lang->lang() . '/home/about_3ash/' ?>"><?= lang('home.menuAbout3ash') ?></a>|
                    <a id="5" class="menu" href="<?php echo base_url() . $this->lang->lang() . '/home/contact_3ash/' ?>"><?= lang('home.menuContact3ash') ?></a>
<!--                    <a id="6" class="menu" href="<?php echo base_url() . $this->lang->lang() . '/home/how_to_order/' ?>"><?= lang('home.menuHelp') ?></a>-->
                </div>
                <div class="separator f"></div>
            </div>
                <!-- slideer -->


