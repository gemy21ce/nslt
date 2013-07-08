
<div>
    <span>User name</span>
    <span><?php echo $menu->name?></span>
</div>
<div>
    <span>User email</span>
    <span><?php echo $menu->email?></span>
</div>
<div>
    <span>Phone</span>
    <span><?php echo $menu->phone?></span>
</div>
<div>
    <span>Mobile</span>
    <span><?php echo $menu->mobile?></span>
</div>
<div>
    <span>Address</span>
    <span><?php echo $menu->address?></span>
</div>
<div>
    <span>Sales man</span>
    <span><?php echo $menu->sales_man?></span>
</div>
<div>
    <span>Menu Title</span>
    <span><?php echo $menu->menu_title?></span>
</div>
<div>
    <span>Logo</span>
    xx<?php echo var_dump($menu->file->path)  ;?>xx<br/>
    xx<?php echo var_dump($menu->theme->id)  ;?>xx
    <span><img src="<?php echo base_url(). $menu->file->path ?>" width ="100" height="100" /></span>
</div>