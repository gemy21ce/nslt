<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/additional-methods.js"></script>
<style>
    .error{
        color: white;
        font-size: 14px;
    }
</style>
<div class="conatiner-border">
    <div id="menutabs" class="menu">
        <ul>
            <li class="first"><a class="opener active" style="cursor: pointer"><?= lang('menuform.step1') ?><br/><span><?= lang('menuform.signIn') ?></span></a></li>
            <li><a style="cursor: pointer" class="opener"><?= lang('menuform.step2') ?><br/><span><?= lang('menuform.clientInfo') ?></span></a></li>
            <li><a style="cursor: pointer" class="opener"><?= lang('menuform.step3') ?><br/><span><?= lang('menuform.menuItems') ?></span></a></li>
            <li><a style="cursor: pointer" class="opener"><?= lang('menuform.step4') ?><br/><span><?= lang('menuform.menuShape') ?></span></a></li>
            <li><a style="cursor: pointer" class="opener"><?= lang('menuform.step5') ?><br/><span><?= lang('menuform.theme') ?></span></a></li>
            <li><a style="cursor: pointer" class="opener"><?= lang('menuform.step6') ?><br/><span><?= lang('menuform.price') ?></span></a></li>
            <li><a style="cursor: pointer" class="opener"><?= lang('menuform.step7') ?><br/><span><?= lang('menuform.finalmenu') ?></span></a></li>
            <li class="last"><a style="cursor: pointer" class="opener"><?= lang('menuform.step8') ?><br/><span><?= lang('menuform.cost') ?></span></a></li>
        </ul>
    </div>
    <!--change this-->
    <div class="conatiner-data">
            <div class="signin-contaner">
                <form action="signin" method="post">
                    <div class="input-container"><div class="input-wide"><?= lang('login.username') ?></div><input name="username" type="text"> </div>
                    <div class="input-container"><div class="input-wide"><?= lang('login.password') ?></div><input name="password" type="password"> </div>
                    <div class=" button"><input name="Submit" type="submit" value="<?= lang('login.signin') ?>"></div>
                </form>
            </div>
    </div>
    <!--End change this-->
</div>