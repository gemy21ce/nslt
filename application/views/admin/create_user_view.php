<?php $this->load->view('admin/home_view'); ?>
<style>
    label{
        font-size: 18px;
        float: left;
        clear: both;
    }
    input{
        width: 278px;
        height: 30px;
        padding: 0 10px;
        margin-top: 5px;
        margin-bottom: 15px;
        font: 14px Arial, Helvetica, sans-serif;
        color: #c1c1c1;
    }
    form div{
        width: 300px;
    }
    .contain{
        margin-left: auto;
        margin-right: auto;
        width: 960px;
    }
    .error{
        color: yellowgreen;
    }
</style>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/additional-methods.js"></script>
<script type="text/javascript">
    $(function(){
        $('form').validate({
            rules:{
                username:{
                    required:true,
                    minlength:8,
                    alphanumeric: true
                },
                password:{
                    required:true,
                    minlength:8
                },
                cpassword:{
                    equalTo:"#password"
                },
                name:{
                    required:true
                },
                phone:{
                    required:true,
                    digits:true
                },
                email:{
                    required:true,
                    email:true
                }
            }
        });
    });
</script>
<div class="contain" style="margin-top: 20px;">
    <?php if(!empty($error)){ ?>
    <div style="color: red">username already exist please choose another one!</div>
    <? }?>
    <form action="saveuser" method="post">
        <div>
            <label for="username">
                username:
            </label>
            <input type="text" name="username"/>
        </div>
        <div>
            <label for="username">
                password:
            </label>
            <input type="password" id="password" name="password"/>
        </div>
        <div>
            <label for="username">
                confirm password:
            </label>
            <input type="password" name="cpassword"/>
        </div>
        <div>
            <label for="username">
                name:
            </label>
            <input type="text" name="name"/>
        </div>
        <div>
            <label for="username">
                phone:
            </label>
            <input type="text" name="phone"/>
        </div>
        <div>
            <label for="username">
                email:
            </label>
            <input type="text" name="email"/>
        </div>
        <div>
            <label for="type">
                user type:
            </label>
            <select name="type">
                <option value="menu_user">Menu user</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        <div>
            <input type="submit" style="color: black;" value="Save user"/>
        </div>
    </form>
</div>