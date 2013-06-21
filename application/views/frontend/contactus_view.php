<script type="text/javascript">
    $(function(){
        $("#contactusForm").validate({
            rules:{
                name:{
                    required:true
                },
                email:{
                    required:true,
                    email:true
                },
                message:{
                    required:true,
                    maxlength:1000
                }
            },
            messages:{
                name:{
                    required:"<?= lang('home.thisfieldisrequired') ?>"
                },
                email:{
                    required:"<?= lang('home.thisfieldisrequired') ?>",
                    email:"<?= lang('home.emailfieldrequired') ?>"
                },
                message:{
                    required:"<?= lang('home.thisfieldisrequired') ?>",
                    maxlength:"<?= lang('home.maxlength1000') ?>"
                }
            }
        });
        $('.menu#5').addClass("current");});                     
</script>
<script src="<?php echo base_url(); ?>assets/frontend/js/jquery.validate.js" type="text/javascript" charset="utf-8"></script> 
<div class="contactus">
    <form id="contactusForm" method="post" action="<?php echo base_url(). $this->lang->lang(); ?>/home/sendmail">
        <div class="clear"></div>        
        <div class="form-row">
            <label><?= lang('home.Name') ?></label>
            <br />
            <input type="text" id="name" name="name">
        </div>
        <div class="form-row">
            <label><?= lang('home.Mail') ?></label>
            <br />
            <input type="text" id="email" name="email" >
        </div>
        <div class="form-row">
            <label><?= lang('home.WhatisyouWant') ?></label>
            <br />
            <textarea id="message" name="message" ></textarea>
        </div>
        <div class="form-row"><input type="submit" value="<?= lang('home.Submit') ?>" class="f-r" /></div>
        <div class="form-row">
            <label style="color: #E30606;"><?= lang('home.contactinquiry')?></label>
             01000998931 
        </div>
        <div class="clear"></div>
    </form>
</div>
