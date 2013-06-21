<div class="clear"></div>
<div class="login-view">
    <div class="contact-title"> <?= lang('home.changepassword'); ?>&nbsp;<span></span>
    </div>
    <form  action="<?php echo base_url() . $this->lang->lang(); ?>/usermanager/savepassword" method="post" id="savepassword_form_view">                      
        <div class="form-row">
            <label><?= lang('home.password') ?></label>
            <br />
            <input type="password" id="e_password" name="e_password" >  
        </div>
        <div class="form-row">
            <label><?= lang('home.confirmpassword') ?></label>
            <br />
            <input type="password" id="econfirm_password" name="econfirm_password" >  
            <input type="hidden" id="usermail" name="usermail" value="<?php echo $usermail;?>">  
            <input type="hidden" id="usercode" name="usercode" value="<?php echo $usercode;?>">
        </div>

        <div class="form-row"><input type="submit"  value="<?= lang('home.Submit'); ?>" class="f-r" /></div>
        <div class="clear"></div>
    </form>
</div>
<div class="clear"></div>
<script type="text/javascript">
    $(function(){
        $("#savepassword_form_view").validate({
            rules:{
                e_password:{
                    required:true,
                    minlength:6
                },
                econfirm_password:{
                    required:true,
                    equalTo:"#e_password"
                }
            },
            messages:{
          
                e_password:{
                    required:"<?= lang('home.thisfieldisrequired') ?>",
                    minlength:"<?= lang('home.minlengthValidate6') ?>"
                },
                econfirm_password:{
                    required:"<?= lang('home.thisfieldisrequired') ?>",
                    equalTo:"<?= lang('home.passwordMismatch') ?>"
                }
            }
        })        
    });
</script>