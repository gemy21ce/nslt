<!DOCTYPE html>
<html>
    <head>
        <?php $this->load->view('frontend/includes/header'); ?>
    </head>
    <body>
        <div class="conatiner">
            <?php $this->load->view($main_content); ?>
            <?php $this->load->view('frontend/includes/footer'); ?>
        </div>
    </body>
</html>
