<div class="clear"></div>
<div class="login-view" style="width: 515px;">
    <div class="contact-title"><?= lang('profile.profile') ?>&nbsp;
        <a class="order-button" href="<?php echo base_url() . $this->lang->lang() . '/usermanager/editprofile' ?>" id="editprofile_link"> <?= lang('editprofile.editprofile') ?></a>
        <a class="order-button" href="<?php echo base_url() . $this->lang->lang() . '/payment/ordersummery' ?>">Order Summery</a>
    </div>
    <div class="form-row">
        <label><?= lang('home.Name') ?></label>
        <br />
        <div><?= $user->name; ?></div>
    </div>
    <div class="form-row">
        <label><?= lang('home.phone') ?></label>
        <br />
        <div><?= $user->phone; ?></div>
    </div>
    <div>

    </div>
    <div class="form-row">
        <label><?= lang('home.birthday') ?></label>
        <br />
        <a><?= $user->birth_day ?></a>

    </div>
    <div class="form-row">
        <label><?= lang('home.country') ?>:</label>
        <div>

            <?php
            $country = new Country();
            $country = $country->get_by_id($user->country_id);
            echo $country->name;
            ?>
        </div>

    </div>
    <div class="form-row">
        <label><?= lang('home.city') ?></label>
        <br />
        <div>
            <?php
            $city = new City();
            $city->where('country_id', 1);
            $city->order_by('name');
            $city = $city->get_by_id($user->city_id);
            echo $city->name
            ?>
        </div>
    </div>
    <div class="form-row">
        <label><?= lang('home.gender') ?></label>
        <br />
        <div>
            <?php
            if ($user->sex_id == 1) {
                echo lang('home.male');
            } else {
                echo lang('female');
            }
            ?>
        </div>
    </div>
    <div class="form-row">
        <label><?= lang('home.address') ?></label>
        <br />
        <div><?= $user->address; ?></div>
    </div>
    <div class="clear"></div>
</form>
</div>