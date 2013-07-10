<div style="width: 700px;border: 4px solid #FFFFFF;float: left;margin-top: 57px;margin-left: 22%;padding: 20px;">
    <div>
        <label>User name: </label>
        <span><?php echo $menu->name ?></span>
    </div>
    <div>
        <label>User email:</label>
        <span><?php echo $menu->email ?></span>
    </div>
    <div>
        <label>Phone: </label>
        <span><?php echo $menu->phone ?></span>
    </div>
    <div>
        <label>Mobile: </label>
        <span><?php echo $menu->mobile ?></span>
    </div>
    <div>
        <label>Address: </label>
        <span><?php echo $menu->address ?></span>
    </div>
    <div>
        <label>Sales man: </label>
        <span><?php echo $menu->sales_man ?></span>
    </div>
    <div>
        <label>Menu Title: </label>
        <span><?php echo $menu->menu_title ?></span>
    </div>
    <div>
        <label>Quantities required: </label>
        <span><?php echo $menu->quantity ?></span>
    </div>
    <?php if ($menu->file->id != null) { ?>
        <br/>
        <div>
            <label style="text-align: center;margin-top: 20px;">Logo :</label>
            <span><img src="<?php echo base_url() . $menu->file->path ?>" width ="100" height="100" /></span>
        </div>
    <?php } ?>
        <br/>
        <div>
            <div style="">Scoops</div><br/>
            <?php foreach ($menu->menu_scopes as $scoop) { ?>
                <span><img src="<?php
                    $scoop->scope->get();
                    $scoop->scope->file->get();
                    echo base_url() . $scoop->scope->file->path
                    ?>" /></span>
                <div>name:  <?php echo $scoop->scope->name ?> </div>
                <div>price:  <?php echo $scoop->price ?> LE</div><br/>
            <?php } ?>
        </div>
    <br/>
    <div>
        <div style="clear: both;">Shakes</div><br/>
        <?php
        $menu->menu_shakes->get();
        foreach ($menu->menu_shakes as $shake) {
            ?>
            <span><img src="<?php
                $shake->shake->get();
                $shake->shake->file->get();
                echo base_url() . $shake->shake->file->path
                ?>" /></span>
            <div>name:  <?php echo $shake->shake->name ?> </div>
            <div>price:  <?php echo $shake->price ?> LE</div><br/>
        <?php } ?>
    </div>
    <br/>
    <div>
        <div style="clear: both;">Plates</div><br/>
        <?php
        $menu->menu_plates->get();
        foreach ($menu->menu_plates as $plate) {
            ?>
            <span><img src="<?php
                $plate->plate->get();
                $plate->plate->file->get();
                echo base_url() . $plate->plate->file->path
                ?>"  /></span>
            <div>name:  <?php echo $plate->plate->name ?> </div>
            <div>price:  <?php echo $plate->price ?> LE</div><br/>
        <?php } ?>
    </div>
    <br/>
    <div>
        <div style="clear: both;">Menu Shape/Type</div><br/>
        <?php $menu->type->get(); ?>
        <span><img src="<?php
            $menu->type->file->get();
            echo base_url() . $menu->type->file->path
            ?>"  /></span>
        <div>name:  <?php echo $menu->type->name ?> </div><br/>
    </div>
    <br/>
    <div>
        <div style="clear: both;">Menu Theme</div><br/>
        <?php $menu->theme->get(); ?>
        <span><img src="<?php
            $menu->theme->file->get();
            echo base_url() . $menu->theme->file->path
            ?>"  /></span>
        <div>name:  <?php echo $menu->theme->name ?> </div><br/>
    </div>
</div>