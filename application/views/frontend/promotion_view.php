<div class="container">
    <div class="center-container f">
        <?php
        $tshirt->file->get();
        $colors = array();
        $colors['1'] = 'red';
        $colors['2'] = 'green';
        $colors['3'] = 'white';
        $colors['4'] = 'black';
        $colors['5'] = 'gray';
        $colors['6'] = 'blue';
        $sexs = array();
        $sexs[1] = 'man';
        $sexs[2] = 'woman';
        ?>
        <script type="text/javascript">
            $(function(){
                $('input[name="email"]').val('<?= $email?>');
                $('input[name="name"]').val('<?= $name?>');
            })
        </script>
        <div class="choose-t-shirt">
            <div class="t-shirt-preview f">
                <img src="<?php echo base_url() . $tshirt->file->path . "w-" . $sexs[$sex] . "-" . $colors[$color] . "-" . $tshirt->file->name; ?>" id="tShirt"  />
                <img src="<?php echo base_url() . $tshirt->file->path . "d-" . $colors[$color] . "-" . $tshirt->file->name; ?>" id="design"   />
            </div>
            <div class="details f">
                <form id="promo" action="<?php echo base_url() . $this->lang->lang() . '/tshirts/add_promotion_cart/' . $code ?>" method="post">
                    <input type="hidden" name="gotoBasket" value="0"/>
                    <?php if ($this->lang->lang() == 'ar') {
                        ?>
                        <h3><span dir="rtl" class="rtl"><?= lang('promotionView.insteed') ?></span></h3>
                    <?php }else{ ?>
                        <h3><span class="rtl"><?= lang('promotionView.insteed') ?></span></h3>
                    <?php } ?>
                    <div class="title"><? //= lang('home.starthere')       ?></div>

                    <input type="hidden" name="id" id="id" value="<?php echo $tshirt->id; ?>"/>

                    <div>
                        <div id="arrow1">
                            <div class="to-right f"></div>
                        </div>
                        <span id="gender" class="f gender">
                            <? //=lang('home.gayorgirl') ?>
                            <span class="f" >
                                <input type="hidden" name="sex" id="sex" value="<?= $sex ?>"/>
                                <? if ($sex == 1) { ?>
                                    <div style="cursor: default;" onclick="" val="1" class="male f current"></div>
                                    <div style="cursor: default;" onclick="" class="female f" val="2" ></div>
                                <? } else { ?>
                                    <div style="cursor: default;" onclick="" val="1" class="male f"></div>
                                    <div style="cursor: default;" onclick="" class="female f current" val="2" ></div>
                                <? } ?>
                            </span>
                        </span>
                        <div id="arrow2" style="display: none;" class="f pop-pick-bottom">
                            <img src="<?php echo base_url(); ?>assets/frontend/images/picker-bottom.png" class="f" />
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="f-r size" id="slimz" style="display: none;"><a style="cursor: pointer;"> <?= lang('home.Slim') ?></a>  <?= lang('home.OR') ?> <a href="#"> <?= lang('home.Normal') ?></a>?</div>
                    <div class="clear"></div>


                    <div id="arrow3<?php echo $tshirt->id; ?>" style="" class="f-r choose-color">
    <!--                        <img src="<?php echo base_url(); ?>assets/frontend/images/picker-right.png" class="f" />-->
                        <div class="to-right f"></div>
                        <span class="f gender">
                            <?= lang('home.pickacolour') ?>
                        </span>
                    </div>
                    <div class="clear"></div>

                    <div id="colors<?php echo $tshirt->id; ?>" class="colorsContainer" style="cursor: default;" class="f-r">
                        <input type="hidden" name="color" id="color" value="<? $color ?>"/>
                        <? switch ($color) {
                            case 4: { ?>
                                    <div class="color-pallete f-r dark-gray current" value="black" ></div>
                                    <div class="color-pallete f-r gray" value="gray" ></div>
                                    <div class="color-pallete f-r green" value="green" ></div>
                                    <div class="color-pallete f-r light-blue" value="blue" ></div>
                                    <div class="color-pallete f-r white" value="white" ></div>
                                    <div class="color-pallete f-r red " value="red" ></div>
                                    <?
                                    break;
                                }
                            case 5: {
                                    ?>
                                    <div class="color-pallete f-r dark-gray" value="black" ></div>
                                    <div class="color-pallete f-r gray current" value="gray" ></div>
                                    <div class="color-pallete f-r green" value="green" ></div>
                                    <div class="color-pallete f-r light-blue" value="blue" ></div>
                                    <div class="color-pallete f-r white" value="white" ></div>
                                    <div class="color-pallete f-r red " value="red" ></div>
                                    <?
                                    break;
                                }
                            case 2: {
                                    ?>
                                    <div class="color-pallete f-r dark-gray" value="black" ></div>
                                    <div class="color-pallete f-r gray" value="gray" ></div>
                                    <div class="color-pallete f-r green current" value="green" ></div>
                                    <div class="color-pallete f-r light-blue" value="blue" ></div>
                                    <div class="color-pallete f-r white" value="white" ></div>
                                    <div class="color-pallete f-r red " value="red" ></div>
                                    <?
                                    break;
                                }
                            case 6: {
                                    ?>
                                    <div class="color-pallete f-r dark-gray" value="black" ></div>
                                    <div class="color-pallete f-r gray" value="gray" ></div>
                                    <div class="color-pallete f-r green" value="green" ></div>
                                    <div class="color-pallete f-r light-blue current" value="blue" ></div>
                                    <div class="color-pallete f-r white" value="white" ></div>
                                    <div class="color-pallete f-r red " value="red" ></div>
                                    <?
                                    break;
                                }
                            case 3: {
                                    ?>
                                    <div class="color-pallete f-r dark-gray" value="black" ></div>
                                    <div class="color-pallete f-r gray" value="gray" ></div>
                                    <div class="color-pallete f-r green" value="green" ></div>
                                    <div class="color-pallete f-r light-blue" value="blue" ></div>
                                    <div class="color-pallete f-r white current" value="white" ></div>
                                    <div class="color-pallete f-r red " value="red" ></div>
                                    <?
                                    break;
                                }
                            case 1: {
                                    ?>
                                    <div class="color-pallete f-r dark-gray" value="black" ></div>
                                    <div class="color-pallete f-r gray" value="gray" ></div>
                                    <div class="color-pallete f-r green" value="green" ></div>
                                    <div class="color-pallete f-r light-blue" value="blue" ></div>
                                    <div class="color-pallete f-r white" value="white" ></div>
                                    <div class="color-pallete f-r red current" value="red" ></div>
                                <? }
                        } ?>
                    </div>

                    <div class="clear"></div>
                    <div id="arrow4<?php echo $tshirt->id; ?>" style="display: none;" >
                        <div class="to-left f-r"></div>
                    </div>
                    <div id="arrow5<?php echo $tshirt->id; ?>" style="display: none;">
                        <div class="f to-bottom"></div>
                    </div>
                    <div style="" id="size<?php echo $tshirt->id; ?>" class="t-shirt-sizes f">
                        <div><?= lang('home.selectasize') ?></div>
                        <input type="hidden" name="sizenumber" id="sizenumber" value="<? $size ?>"/>
                        <? switch ($size) {
                            case 1: { ?>
                                    <div class="size-box f current" val="1" >S</div>
                                    <div class="size-box f" val="2">M</div>
                                    <div class="size-box f" val="3">L</div>
                                    <div class="size-box f" val="4">XL</div>
                                    <div class="size-box f" val="5">2XL</div>
                                    <div class="size-box f" val="6">3XL</div>
                                    <?
                                    break;
                                }
                            case 2: {
                                    ?>
                                    <div class="size-box f" val="1" >S</div>
                                    <div class="size-box f current" val="2">M</div>
                                    <div class="size-box f" val="3">L</div>
                                    <div class="size-box f" val="4">XL</div>
                                    <div class="size-box f" val="5">2XL</div>
                                    <div class="size-box f" val="6">3XL</div>
                                    <?
                                    break;
                                }
                            case 3: {
                                    ?>
                                    <div class="size-box f" val="1" >S</div>
                                    <div class="size-box f" val="2">M</div>
                                    <div class="size-box f current" val="3">L</div>
                                    <div class="size-box f" val="4">XL</div>
                                    <div class="size-box f" val="5">2XL</div>
                                    <div class="size-box f" val="6">3XL</div>
                                    <?
                                    break;
                                }
                            case 4: {
                                    ?>
                                    <div class="size-box f" val="1" >S</div>
                                    <div class="size-box f" val="2">M</div>
                                    <div class="size-box f" val="3">L</div>
                                    <div class="size-box f current" val="4">XL</div>
                                    <div class="size-box f" val="5">2XL</div>
                                    <div class="size-box f" val="6">3XL</div>
                                    <?
                                    break;
                                }
                            case 5: {
                                    ?>
                                    <div class="size-box f" val="1" >S</div>
                                    <div class="size-box f" val="2">M</div>
                                    <div class="size-box f" val="3">L</div>
                                    <div class="size-box f" val="4">XL</div>
                                    <div class="size-box f current" val="5">2XL</div>
                                    <div class="size-box f" val="6">3XL</div>
                                    <?
                                    break;
                                }
                            case 6: {
                                    ?>
                                    <div class="size-box f" val="1" >S</div>
                                    <div class="size-box f" val="2">M</div>
                                    <div class="size-box f" val="3">L</div>
                                    <div class="size-box f" val="4">XL</div>
                                    <div class="size-box f" val="5">2XL</div>
                                    <div class="size-box f current" val="6">3XL</div>
                                <? }
                        } ?>
                    </div>

                    <div class="clear"></div>
                    <div id="finalForm<?php echo $tshirt->id; ?>" style="" class="t-shirt-sizes f">
                        <div class="t-shirt-sizes f">
                            <input type="submit" value="<?= lang('promotionView.addToBasket') ?>" class="f" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="side-colunm f-r" style="width: 220px;text-align: justify;line-height: 22px;">
            <p>
                <?= lang('promotionView.helper') ?>
            </p>
        <!--<p>Related</p>
        <a href="" class="thumbnail f">
            <img src="images/thumb-4.jpg" />
            <p>89 Instead of 119</p>
        </a>-->
        </div>

        <script>
            
            $(function(){
                $("#promo").submit(function(){
                    jalert('<?= lang("tshirtView.addedToBasket") ?>',function(){
                        $("#promo").unbind('submit').submit();
                    },'<?= lang("tshirtView.continueShopping") ?>');
                    return false;
                });
                $('#tShirt').hover(function() {
                    $('#design').animate({
                        top: 0
    
                    }, 500, function() {
                        // Animation complete.
                    });
			 
                });
                $('#design').mouseout(function() {
                    $(this).animate({
                        top: "382px"
    
                    }, 500, function() {
                        // Animation complete.
                    });
                });
            })
            function goToBasket(){
                $("input[name='gotoBasket']").val('1');
                $("#promo").unbind('submit').submit();
            }
            //<?
                $user = $this->session->all_userdata();
                if (!isset($user['username'])) {
                    ?>
                                
                            $(function(){
                                showPopupId('signup-pop');
                                var input=document.createElement("input");
                                input.setAttribute("type", "hidden");
                                input.setAttribute("id", "target-url");
                                input.setAttribute("name", "target-url");
                                input.setAttribute("value", "<?php echo current_url() ?>");
                                $("#signup").prepend(input);

                            })//<? } ?>
        </script>