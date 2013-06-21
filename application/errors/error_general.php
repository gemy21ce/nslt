<!DOCTYPE HTML>
<html>
    <head>
        <title>3ash</title>
        <link rel="stylesheet" type="tetext/css" href="/assets/frontend/css/style.css" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <div class="container">
            <div class="logo">
                <a href="/">
                    <img src="/assets/frontend/images/logo.png" alt="3ash">
                </a>
            </div>
            <div class="error" style="float:none;margin-left: 25%;">
                <img src="/assets/frontend/images/error.png"  alt="error" width="500"/>
            </div>
            <div class="error-sep"  style="margin-left: 30%;">
                <img src="/assets/frontend/images/separator.png" alt="" />
            </div>
            <div class="footer f">
                <div class="to-right f"></div>
                <span class="f">
                    <span class="red-color">Sorry</span>, but the page you are looking for not <br/>
                    been found. Try checking the <span class="red-color" style="margin: 0;">URL</span> For Error
                </span>
                <div class="clear"></div>
                <p style="text-align: center;">
                    go to : <a href="/">www.3ash.net</a>
                </p>
            </div>
            <div style="display: none;" id="content">
		<h1><?php echo $heading; ?></h1>
                <p><?php echo $message; ?></p>
	</div>
        </div>
    </body>
</html>