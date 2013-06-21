<div class="clear"></div>
<div class="address">
<div class="contact-title"><?= lang('home.Confirm Address') ?> &nbsp;<span></span>
</div>

<form  action="<?php echo base_url() . $this->lang->lang(); ?>/payment/saveorder" method="post" id="save_order" >
    <div class="form-row">
        <label><?=lang('paymentView.deliveryAddress')?></label>
        <br />
        <textarea type="text" id="address" name="address"><?= $user->address; ?></textarea>
    </div>
    <div class="form-row"><input type="submit"  value="<?= lang('home.confirm'); ?>" class="f-r" /></div>
    <div class="clear"></div>
</form>
</div>

<script type="text/javascript">
    $(function(){
        $("#save_order").validate({
            rules:{
                address:{
                    required:true
                }
            },
             messages:{
                address:{
                    required:"<?= lang('home.thisfieldisrequired') ?>"
                    }
                    }
        })
        $('#save_order').submit(function(){
            if($(this).valid()){
                jloading('');
                $('.f-r').remove();
            }
        })
        
    });
    
</script>