<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo $tshirt->name; ?></title>
        <?php $tshirt->file->get(); ?>
        <meta name="keywords" content="<?php echo $tshirt->name; ?>,<?php echo $tshirt->description; ?>" />
        <meta name="description" content="<?php echo $tshirt->name; ?>,<?php echo $tshirt->description; ?>"  />
        <meta property="og:title" content="<?php echo $tshirt->name; ?>" />
        <meta property="og:description" content="<?php echo $tshirt->name; ?>,<?php echo $tshirt->description; ?>" />
        <meta property="og:image" content="<?php echo base_url() . $tshirt->file->path ."3ash-". $tshirt->file->name; ?>" />
        <script type="text/javascript">
            window.setTimeout(function(){
                //window.location.href = "/";
            }, 1 *1000)
        </script>
    </head>
    <body>
        <img src="<?php echo base_url() . $tshirt->file->path ."3ash-". $tshirt->file->name; ?>" alt="<?php echo $tshirt->name; ?>"  /></div>
</body>
</html>
