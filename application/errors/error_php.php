<!DOCTYPE HTML>
<html>
    <head>
        <title>3ash 500</title>
        <link rel="stylesheet" type="tetext/css" href="/assets/frontend/css/style.css" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <div class="container">
            <div class="footer f">
                <p style="text-align: center;">
                    error php
                </p>
            </div>

        </div>
        <div style="display: none;border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

            <h4>A PHP Error was encountered</h4>

            <p>Severity: <?php echo $severity; ?></p>
            <p>Message:  <?php echo $message; ?></p>
            <p>Filename: <?php echo $filepath; ?></p>
            <p>Line Number: <?php echo $line; ?></p>

        </div>
    </body>
</html>
