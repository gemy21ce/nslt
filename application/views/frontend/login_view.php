<div class="clear"></div>
<div class="login-view">
<div class="contact-title"><?= lang('home.login') ?></div>
<?php
if (isset($errormessage)):
    ?>
    <div class="contact-title message">
        <?= lang('home.errorlogin'); ?>
    </div>
<?php endif; ?>

<form  action="<?php echo base_url() . $this->lang->lang(); ?>/usermanager/login" method="post" id="login_form_view">                      
    <div class="form-row">
        <label><?= lang('home.Mail') ?></label>
        <br />
        <input type="text" id="email" name="email" >      
    </div>
    <div class="form-row">
        <label><?= lang('home.password') ?></label>
        <br />
        <input type="password" id="password" name="password">
    </div>
      <input type="hidden" id="target-url" name="target-url" value="<?=$this->session->flashdata('redirectToCurrent');?>" >
      <div class="form-row"><a  href="<?php echo base_url() . $this->lang->lang(); ?>/usermanager/forgetpassword"> <?= lang('home.forgetpassword'); ?></a></div>
    <div class="form-row"><input type="submit"  value="<?= lang('home.Submit'); ?>" class="f-r" /></div>
    <div class="clear"></div>
</form>
</div>
<div class="clear"></div>
<script type="text/javascript">
        $(function(){
                    $("#login_form_view").validate({
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
        });

</script>