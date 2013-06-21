<div id="footer">
<div class="separator f"></div>
<div class="clear"></div>
<div class="footer f">
    <div class="to-right f"></div>
    <span class="f"><?= lang('home.YouDon') ?> <a href="<?php echo base_url() . $this->lang->lang() . '/home/contact_3ash/' ?>" style="cursor: pointer;"><?= lang('home.Say') ?></a> </span>
</div>
<div class="clear"></div>
<!-- share -->
<div class="addThis f">
    <div class="social f facebook"><iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2F3ash.net&amp;send=false&amp;layout=button_count&amp;width=450&amp;show_faces=true&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:21px;" allowTransparency="true"></iframe></div>

    <div class="addthis_toolbox addthis_default_style ">
        <div class="social f"><a href="https://twitter.com/3ashTrend" class="twitter-follow-button" data-show-count="false" data-show-screen-name="false">Follow @3ashTrend</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></div>
        <div class="social f"><a class="addthis_button_google_plusone" g:plusone:size="medium"></a></div>
    </div>
    <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4f47db0b40410637"></script>


</div>

<div class="share f">
    <span class="f"><?= lang('home.followus') ?>:</span>
    <a href="http://www.facebook.com/3ash.net" target="_blanck"><img src="<?php echo base_url(); ?>assets/frontend/images/facebook-colored.png" longdesc="<?php echo base_url(); ?>assets/frontend/images/facebook-colored.png" alt="" /></a>
</div>
</div>
</div>
</div>
<div id="result"></div>
<div class="details-popup login-pop" id="login-pop" style="display: none;">
    <div class="contact-title"><span><?= lang('home.login') ?></span>
        <a onclick="hidePopupId('login-pop');" class="close f-r" style="cursor: pointer;" >
            <img src="<?php echo base_url(); ?>assets/frontend/images/close.png" alt="" />
        </a>
    </div>
    <form  action="<?php echo base_url() . $this->lang->lang(); ?>/usermanager/login" id="login-pop-form" method="post">                      
        <div class="form-row">
            <label><?= lang('home.Mail') ?></label>
            <br />
            <input type="text" id="email" name="email" class="required email">
        </div>
        <div class="form-row">
            <label><?= lang('home.password') ?></label>
            <br />
            <input type="password" id="password" name="password" class="required">
            <input type="hidden" id="target-url" name="target-url" value="<?php echo current_url() ?>">
        </div>
        <div class="form-row"><a href="<?php echo base_url() . $this->lang->lang(); ?>/usermanager/forgetpassword"> <?= lang('home.forgetpassword'); ?></a></div>
        <div class="form-row"><input type="submit"  value="<?= lang('home.login') ?>" class="f-r" /></div>
        <div class="clear"></div>
    </form>
</div>
<div class="details-popup signup-pop" id="signup-pop" style="display: none;">
    <div class="contact-title"><?= lang('home.signup') ?>&nbsp;<span><?= lang('home.register'); ?></span>
        <a onclick="hidePopupId('signup-pop');" class="close f-r" style="cursor: pointer;" >
            <img src="<?php echo base_url(); ?>assets/frontend/images/close.png" alt="" />
        </a>
    </div>
    <form action="<?php echo base_url() . $this->lang->lang(); ?>/usermanager/signup" id="signup" method="post">
        <div class="form-row">
            <label><?= lang('home.Name') ?></label>
            <br />
            <input type="text" id="name" name="name" class="">
        </div>
        <div class="form-row ">
            <label><?= lang('home.Mail') ?></label>
            <br />
            <input type="text" id="email" name="email" class="email checkuser" >
            <span id="signup-email" style="color: red;"></span>
        </div>
        <div class="form-row">
            <label><?= lang('home.phone') ?></label>
            <br />
            <input type="text" id="phone" name="phone" class="">
        </div>
        <div class="form-row">
            <label><?= lang('home.password') ?></label>
            <br />
            <input type="password" id="pass" name="pass" class="">
        </div>
        <div class="form-row">
            <label><?= lang('home.confirmpassword') ?></label>
            <br />
            <input type="password" id="ppassword" name="ppassword" equalto="pass" class="">
        </div>
        <div class="form-row">
            <label><?= lang('home.birthday') ?></label>
            <br />
            <select id="year" name="year">
                <?php
                for ($index = 1950; $index < 2012; $index++) {
                    echo '<option value="' . $index . '">' . $index . '</option>';
                }
                ?>
            </select>
            <select id="month" name="month">
                <?php
                for ($index = 1; $index < 13; $index++) {
                    echo '<option value="' . $index . '">' . $index . '</option>';
                }
                ?> 
            </select>
            <select id="day" name="day">
                <?php
                for ($index = 1; $index < 32; $index++) {
                    echo '<option value="' . $index . '">' . $index . '</option>';
                }
                ?> 
            </select>
        </div>
        <div class="form-row">
            <label><?= lang('home.country') ?></label>
            <br />
            <select id="country" name="country" class="required big-select">
                <?php
                $country = new Country();
                $countries = $country->get();
                foreach ($countries as $coun) {
                    echo ' <option value="' . $coun->id . '">' . lang('home.' . $coun->name) . '</option>';
                }
                ?>


            </select>
        </div>
        <div class="form-row">
            <label><?= lang('home.city') ?></label>
            <br />
            <select id="city" name="city" class="big-select" >
                <?php
                $city = new City();
                $city->where('country_id', 1);
                $city->order_by('name');
                $cities = $city->get();
                foreach ($city as $cit) {
                    echo ' <option value="' . $cit->id . '">' . lang('home.' . $cit->name) . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="form-row">
            <label><?= lang('home.gender') ?></label>
            <br />
            <select id="sex" name="sex"  class="big-select">
                <option value="1"><?= lang('home.male'); ?></option>
                <option value="2"><?= lang('home.female'); ?></option>
            </select>
        </div>
        <div class="form-row">
            <label><?= lang('home.address') ?></label>
            <br />
            <textarea id="address" name="address" ></textarea>
        </div>
        <div class="form-row"><input type="button"  value="<?= lang('home.register'); ?>" class="f-r signup-submit" /></div>
        <div class="clear"></div>
    </form>
</div>

<script>
    var userAleradyExist=false;
    function showPopupId(id){
        $("html, body").animate({scrollTop: 0}, "fast");
        $(".popup-overlay").show();
        $(".popup-overlay").css({
            height:$(document).height()
        });
        var popupTop = ($(window).height()-$("#"+id).outerHeight() )/2;
        $("#"+id).show();  
        $(".details-popup").css({
            left:"50%",
            'margin-left':($(".details-popup").outerWidth()/2*-1),
            marginBottom: ($(".details-popup").outerHeight() / 2) * -1,
            top:popupTop > 0? popupTop:0
        });
    }
    function hidePopupId(id){
        $(".popup-overlay").hide();
        $("#"+id).hide();  
    }

    $('.checkuser').ready(function(){
        $('.checkuser').blur(function(){
            $.ajax({
                type: "POST",
                url: "<?php echo base_url() . $this->lang->lang(); ?>/usermanager/checkuser/",
                data: 'email='+$('.checkuser').val()
            }).done(function( msg ) {
                if(msg=='true'){
                    userAleradyExist=true;
                    $("#signup-email").html("<?=lang('home.thisuserisalreadyexist')?>");
                   // $('.signup-submit').hide();
                }else{
                    userAleradyExist=false;
                    $("#signup-email").html("");
                    //$('.signup-submit').show();
                }
            });
        });
    });
    $('.f-r.signup-submit').click(function(){
    if($("#signup").valid())
        if(!userAleradyExist)$("#signup").submit();
    });
    $(function(){
        $("#signup").validate({
            rules:{
                name:{
                    required:true,
                    minlength:3
                },
                email:{
                    required:true,
                    email:true
                },
                phone:{
                    required:true,
                    minlength:10,
                    digits:true
                },
                pass:{
                    required:true,
                    minlength:6
                },
                ppassword:{
                    required:true,
                    equalTo:"#pass"
                },
                address:{
                    required:true,
                    minlength:10
                }
            },
            messages:{
                name:{
                    required:"<?= lang('home.thisfieldisrequired') ?>",
                    minlength:"<?= lang('home.minlengthValidate10') ?>"
                },
                email:{
                    required:"<?= lang('home.thisfieldisrequired') ?>",
                    email:"<?= lang('home.emailfieldrequired') ?>"
                },
                phone:{
                    required:"<?= lang('home.thisfieldisrequired') ?>",
                    minlength:"<?= lang('home.phoneValidate') ?>",
                    digits:"<?= lang('home.phoneValidate') ?>"
                },
                pass:{
                    required:"<?= lang('home.thisfieldisrequired') ?>",
                    minlength:"<?= lang('home.minlengthValidate6') ?>"
                },
                ppassword:{
                    required:"<?= lang('home.thisfieldisrequired') ?>",
                    equalTo:"<?= lang('home.passwordMismatch') ?>"
                },
                address:{
                    required:"<?= lang('home.thisfieldisrequired') ?>",
                    minlength:"<?= lang('home.minlengthValidate10') ?>"
                }
            }
        });
        $("#login-pop-form").validate({
            rules:{
                email:{
                    required:true,
                    email:true
                },
                password:{
                    required:true,
                    minlength:6
                }
            },
            messages:{
                email:{
                    required:"<?= lang('home.thisfieldisrequired') ?>",
                    email:"<?= lang('home.emailfieldrequired') ?>"
                },
                password:{
                    required:"<?= lang('home.thisfieldisrequired') ?>",
                    minlength:"<?= lang('home.minlengthValidate6') ?>"
                }
            }
        })
        $("#signup").submit(function(){
            submitMe(this,"",function(jqXHR, textStatus){
                if(jqXHR && jqXHR.status == 200){
                    hidePopupId('signup-pop')
                    jalert('<?= lang("home.signupsuccess")?>',function(){
                        $("#signup")[0].reset();
                        jHide();
                    });
                }else{
                    jalert('<?= lang("home.errorRegister")?>');
                }
            },"<?= lang('home.saving')?>")
            return false;
        })
    })
</script>
<div class="popup-overlay" style="display: none;"></div>
<!-- The JavaScript -->

<script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-31479388-1']);
    _gaq.push(['_setDomainName', '3ash.net']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
</script>
</body>
</html>
