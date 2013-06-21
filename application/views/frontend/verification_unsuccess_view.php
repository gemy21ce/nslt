<div class="clear"></div>
<div class="verification">
    <?= lang('home.verifyunsuccess') ?>
    <script type="text/javascript">
        $(function(){
            window.setTimeout(function(){
                window.location.href="<?= base_url().$this->lang->lang() ?>";
            },10000);
        })
    </script>
</div>