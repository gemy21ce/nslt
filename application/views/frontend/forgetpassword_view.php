<div class="clear"></div>
<div class="login-view">
    <div class="contact-title"> <?= lang('home.forgetpassword'); ?>&nbsp;<span></span>
    </div>
    <form  action="<?php echo base_url() . $this->lang->lang(); ?>/usermanager/forgetpasswordmail" method="post" id="forgetpassword_form_view">                      
        <div class="form-row">
            <label><?= lang('home.Mail') ?></label>
            <br />
            <input type="text" id="e_mail" name="e_mail" >   
            <div id="messagecheckusermail"></div>
        </div>
        <?php if (isset($message)): ?>
            <div class="contact-title"> 
                <?= lang('home.' . $message); ?>.
            </div>
        <?php endif; ?>
        <div class="form-row"><input type="submit"  value="<?= lang('home.Submit'); ?>" class="f-r forgetpassword" /></div>
        <div class="clear"></div>
    </form>
</div>
<div class="clear"></div>
<script type="text/javascript">
    $(function(){
        $("#forgetpassword_form_view").validate({
            rules:{
                e_mail:{
                    required:true,
                    email:true
                }
            },
            messages:{
                e_mail:{
                    required:"<?= lang('home.thisfieldisrequired') ?>",
                    email:"<?= lang('home.emailfieldrequired') ?>"
                }
            }
        })        
    });
</script>