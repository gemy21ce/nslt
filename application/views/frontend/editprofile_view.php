<div class="clear"></div>
<div class="login-view" style="width: 400px;">
    <div class="contact-title">
        <p><?= lang('editprofile.editprofile') ?></p>
    </div>
    <form action="<?php echo base_url() . $this->lang->lang(); ?>/usermanager/saveprofile" id="editprofile" method="post">
        <div class="form-row">
            <label><?= lang('home.Name') ?></label>
            <br />
            <input type="text" id="name" name="name" value="<?= $user->name; ?>"/>
        </div>
        <div class="form-row">
            <label><?= lang('home.phone') ?></label>
            <br />
            <input type="text" id="phone" name="phone" value="<?= $user->phone; ?>"/>
        </div>
        <div class="form-row">
            <label id="changepasswordlabel" style="cursor: pointer;color: #E30606;" class="f"><?= lang('home.changepassword') ?></label>
            <a id="cancelchangepassword" style="display: none;cursor: pointer;" class="f-r"><img src="<?php echo base_url(); ?>assets/frontend/images/close.png" alt="" /></a>
            <span id="changepasswordcontainer" style="display: none;">
                <div class="form-row">
                    <label><?= lang('home.oldpassword') ?></label>
                    <br />
                    <input type="password" id="oldpass" name="oldpass" >
                </div>
                <div class="form-row">
                    <label><?= lang('home.password') ?></label>
                    <br />
                    <input type="password" id="pass" name="pass" >
                </div>
                <div class="form-row">
                    <label><?= lang('home.confirmpassword') ?></label>
                    <br />
                    <input type="password" id="ppassword" name="ppassword">
                </div>   
            </span>
        </div>
        <div>

        </div>
        <div class="form-row">
            <label><?= lang('home.birthday') ?></label>
            <br />
            <select id="year" name="year">
                <?php
                for ($index = 1950; $index <= 2012; $index++) {
                    echo '<option value="' . $index . '" ' . ($index == date("Y", strtotime($user->birth_day)) ? 'selected="true"' : '') . '>' . $index . '</option>';
                }
                ?>
            </select>
            <select id="month" name="month">
                <?php
                for ($index = 1; $index < 13; $index++) {
                    echo '<option value="' . $index . '"' . ($index == date("m", strtotime($user->birth_day)) ? 'selected="true"' : '') . '>' . $index . '</option>';
                }
                ?> 
            </select>
            <select id="day" name="day">
                <?php
                for ($index = 1; $index < 32; $index++) {
                    echo '<option value="' . $index . '" ' . ($index == date("d", strtotime($user->birth_day)) ? 'selected="true"' : '') . '>' . $index . '</option>';
                }
                ?> 
            </select>
        </div>
        <div class="form-row">
            <label><?= lang('home.country') ?></label>
            <br />
            <select id="country" name="country" class="required big-select">
                <?php
                $country = new Country();
                $countries = $country->get();
                foreach ($countries as $coun) {
                    echo ' <option value="' . $coun->id . '" ' . ($user->country_id == $coun->id ? 'selected="true"' : '') . '>' . lang('home.' . $coun->name) . '</option>';
                }
                ?>


            </select>
        </div>
        <div class="form-row">
            <label><?= lang('home.city') ?></label>
            <br />
            <select id="city" name="city" class="big-select" >
                <?php
                $city = new City();
                $city->where('country_id', 1);
                $city->order_by('name');
                $cities = $city->get();
                foreach ($city as $cit) {
                    echo ' <option value="' . $cit->id . '"' . ($user->city_id == $cit->id ? 'selected="true"' : '') . '>' . lang('home.' . $cit->name) . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="form-row">
            <label><?= lang('home.gender') ?></label>
            <br />
            <select id="sex" name="sex"  class="big-select">
                <option value="1" <?php if ($user->sex_id == 1): ?>selected="true"<?php endif; ?> ><?= lang('home.male'); ?></option>
                <option value="2" <?php if ($user->sex_id == 2): ?>selected="true"<?php endif; ?>><?= lang('home.female'); ?></option>
            </select>
        </div>
        <div class="form-row">
            <label><?= lang('home.address') ?></label>
            <br />
            <textarea id="address" name="address" ><?= $user->address; ?></textarea>
        </div>
        <div class="form-row"><input type="submit"  value="<?= lang('home.Submit'); ?>" class="f-r" /></div>
        <div class="clear"></div>
    </form>
</div>
<script type="text/javascript">
    $(function(){
        $("#editprofile").validate({
            rules:{
                name:{
                    required:true,
                    minlength:3
                },
                phone:{
                    required:true,
                    minlength:10,
                    digits:true
                },
                pass:{
                    required:true,
                    minlength:6
                },
                ppassword:{
                    required:true,
                    equalTo:"#pass"
                },
                address:{
                    required:true,
                    minlength:10
                }
            },
            messages:{
                name:{
                    required:"<?= lang('home.thisfieldisrequired') ?>",
                    minlength:"<?= lang('home.minlengthValidate10') ?>"
                },
                phone:{
                    required:"<?= lang('home.thisfieldisrequired') ?>",
                    minlength:"<?= lang('home.phoneValidate') ?>",
                    digits:"<?= lang('home.phoneValidate') ?>"
                },
                pass:{
                    required:"<?= lang('home.thisfieldisrequired') ?>",
                    minlength:"<?= lang('home.minlengthValidate6') ?>"
                },
                ppassword:{
                    required:"<?= lang('home.thisfieldisrequired') ?>",
                    equalTo:"<?= lang('home.passwordMismatch') ?>"
                },
                address:{
                    required:"<?= lang('home.thisfieldisrequired') ?>",
                    minlength:"<?= lang('home.minlengthValidate10') ?>"
                }
            }
        });
        var form = $("#editprofile");
        form.submit(function(){
            if($(this).valid()){
                submitMe(this,"something went wrong please check your information and try again!",function(jqXHR, textStatus){
                    if(jqXHR && jqXHR.status == 200){
                        window.location.href="profile";
                    }else if(jqXHR && jqXHR.status == 400){
                        jalert("Passowrd is not the same please confirm your old password!",function(){
                            $("#oldpass").focus();
                        });
                    }else{
                        jalert("something went wrong please check your information and try again!");
                    }
                    
                },"Saving information!")
            }
            return false;
        });
        $('#editprofile_link').addClass("current");
        $('#changepasswordlabel').click(function(){
            $('#changepasswordlabel').hide();
            $('#cancelchangepassword').show();
            $('#changepasswordcontainer').show();
        });
        $('#cancelchangepassword').click(function(){
            $('#changepasswordlabel').show();
            $('#cancelchangepassword').hide();
            $('#changepasswordcontainer').hide();
        });
    });  
</script>
