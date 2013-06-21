<div class="clear"></div>
<div class="thumbnail-container">
    <?php
    $colorSet = array('red', 'green', 'white', 'black', 'gray', 'blue');
    foreach ($tshirts as $tshirt):
        ?>
        <?php
        $tshirt->file->get();
        $picked = array_rand($colorSet, 1);
        ?>
        <a href="<?php echo base_url() . $this->lang->lang() . '/tshirts/get/' . $tshirt->name . '/' . $tshirt->id.'/1/'.$picked; ?>" class="thumbnail f">
            <img width="213" src="<?php echo base_url() . $tshirt->file->path ."w-man-".  $colorSet[$picked] . "-" . $tshirt->file->name; ?>" alt="<?php echo base_url() . $tshirt->file->path . $tshirt->file->name; ?>" class="getTshirt" id="<?php echo $tshirt->id; ?>" />
            <p><?php echo $tshirt->price; ?> <?= lang('home.le') ?></p>
        </a>
    <?php endforeach ?>

    <div class="clear"></div>
</div>
<script type="text/javascript">
    $(function(){$('.menu#2').addClass("current");});                     
</script>