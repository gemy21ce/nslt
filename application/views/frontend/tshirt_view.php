<style>
    .size-box{
        cursor: pointer;
    }
</style>
<div class="container">
    <div class="center-container f">
        <?php
        $tshirt->file->get();
        $related->file->get();
        $colorSet = array('red', 'green', 'white', 'black', 'gray', 'blue');
        $sexSet = array('man', 'woman');
        $picked = array_rand($colorSet, 1);
        $pickedSet = array_rand($sexSet, 1);
        ?>
        <div class="choose-t-shirt">
            <div class="t-shirt-preview f">
                <img src="<?php echo base_url() . $tshirt->file->path . "w-man-white-" . $tshirt->file->name; ?>" id="tShirt"  />
                <img src="<?php echo base_url() . $tshirt->file->path . "d-white-" . $tshirt->file->name; ?>" id="design"   />

            </div>
            <div class="details f">
                <form id="addBasket" action="<?php echo base_url() . $this->lang->lang() . '/tshirts/cart_add' ?>" method="post">
                    <input type="hidden" name="gotoBasket" value="0"/>
                    <?php if ($this->lang->lang() == 'ar') {
                        ?>
                        <h3><span dir="rtl" class="rtl"><?php echo $tshirt->price; ?> <?= lang('home.le') ?></span></h3>
                    <?php } else { ?>
                        <h3><span><?php echo $tshirt->price; ?> <?= lang('home.le') ?></span></h3>
                    <?php } ?>
                    <div class="title"><?= lang('home.starthere') ?></div>

                    <input type="hidden" name="id" id="id" value="<?php echo $tshirt->id; ?>"/>

                    <div>
                        <div id="arrow1">
                            <div class="to-right f"></div>
                        </div>
                        <span id="gender" class="f gender">
                            <?= lang('home.gayorgirl') ?>
                            <span class="f genderPalet" >
                                <input type="hidden" name="sex" id="sex" value="<?= $sex ?>"/>
                                <div style="cursor: pointer;" onclick="showSex(<?php echo $tshirt->id; ?>,this);" val="1" class="male f "></div>
                                <div style="cursor: pointer;" onclick="showSex(<?php echo $tshirt->id; ?>,this);" class="female f" val="2" ></div>
                            </span>
                        </span>
                        <script type="text/javascript">
                            $(".genderPalet").ready(function(){
                                $(".genderPalet").find('div[val="'+$(".genderPalet").find('input').val()+'"]').trigger('click');
                            });
                        </script>
                        <div id="arrow2" style="display: none;" class="f pop-pick-bottom">
                            <img src="<?php echo base_url(); ?>assets/frontend/images/picker-bottom.png" class="f" />
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="f-r size" id="slimz" style="display: none;"><a style="cursor: pointer;"> <?= lang('home.Slim') ?></a>  <?= lang('home.OR') ?> <a href="#"> <?= lang('home.Normal') ?></a>?</div>
                    <div class="clear"></div>


                    <div id="arrow3<?php echo $tshirt->id; ?>" style="display: none;" class="f-r choose-color">
                        <div class="to-right f"></div>
                        <span class="f gender">
                            <?= lang('home.pickacolour') ?>
                        </span>
                    </div>
                    <div class="clear"></div>

                    <div id="colors<?php echo $tshirt->id; ?>" style="cursor: pointer;" class="colorsPalets f-r">
                        <input type="hidden" name="color" id="color" value="<?= $color ?>"/>
                        <div class="color-pallete f-r dark-gray" val="4" onclick="showSize(<?php echo $tshirt->id; ?>, this,'black');"></div>
                        <div class="color-pallete f-r gray" val="5" onclick="showSize(<?php echo $tshirt->id; ?>, this,'gray');"></div>
                        <div class="color-pallete f-r green" val="2" onclick="showSize(<?php echo $tshirt->id; ?>, this,'green');"></div>
                        <div class="color-pallete f-r light-blue" val="6" onclick="showSize(<?php echo $tshirt->id; ?>, this,'blue');"></div>                    
                        <div class="color-pallete f-r red " val="1" onclick="showSize(<?php echo $tshirt->id; ?>, this,'red');"></div>
                        <div class="color-pallete f-r white" val="3" onclick="showSize(<?php echo $tshirt->id; ?>, this,'white');"></div>
                    </div>
                    <script type="text/javascript">
                        $(".colorsPalets").ready(function(){
                            $(".colorsPalets").find('div[val="'+$(".colorsPalets").find('input').val()+'"]').trigger('click');
                        });
                    </script>
                    <div class="clear"></div>
                    <div id="arrow4<?php echo $tshirt->id; ?>" style="display: none;" >
                        <div class="to-left f-r"></div>
                    </div>
                    <div id="arrow5<?php echo $tshirt->id; ?>" style="display: none;">
                        <div class="f to-bottom"></div>
                    </div>
                    <div style="display: none;" id="size<?php echo $tshirt->id; ?>" class="t-shirt-sizes f">
                        <div><?= lang('home.selectasize') ?></div>
                        <input type="hidden" name="sizenumber" id="sizenumber" value="1"/>
                        <div class="size-box f current" val="1" onclick="showFinal(<?php echo $tshirt->id; ?>, this);">S</div>
                        <div class="size-box f" val="2" onclick="showFinal(<?php echo $tshirt->id; ?>, this);">M</div>
                        <div class="size-box f" val="3" onclick="showFinal(<?php echo $tshirt->id; ?>, this);">L</div>
                        <div class="size-box f" val="4" onclick="showFinal(<?php echo $tshirt->id; ?>, this);">XL</div>
                        <div class="size-box f" val="5" onclick="showFinal(<?php echo $tshirt->id; ?>, this);">2XL</div>
                        <div class="size-box f" val="6" onclick="showFinal(<?php echo $tshirt->id; ?>, this);">3XL</div>
                    </div>

                    <div class="clear"></div>
                    <div id="finalForm<?php echo $tshirt->id; ?>" style="display: none;" class="t-shirt-sizes f">
                        <div class="t-shirt-sizes f">
                            <input type="submit" value="<?= lang('tshirtView.AddToBasket') ?>" class="f" />
                        </div>


                    </div>





                </form>
            </div>
        </div>
        <div class="side-colunm f-r">
            <p><?= lang('home.related') ?></p>
            <a href="<?php echo base_url() . $this->lang->lang() . '/tshirts/get/' . $related->name . '/' . $related->id . '/' . $pickedSet . '/' . $picked; ?>" class="thumbnail f">
                <img src="<?php echo base_url() . $related->file->path . "w-" . $sexSet[$pickedSet] . "-" . $colorSet[$picked] . "-" . $related->file->name; ?>" />
                <p><?php echo $related->price; ?> <?= lang('home.le') ?></p>
            </a>
        </div>

        <script>
            $(function(){
                $("#addBasket").submit(function(){
                    jalert('<?= lang("tshirtView.addedToBasket") ?>',function(){
                        $("#addBasket").unbind('submit').submit();
                    },'<?= lang("tshirtView.continueShopping") ?>');
                    return false;
                })
            })
            function showSex(id,element){
                $("#sex").val($(element).attr("val"));                    
                $("#arrow3"+id+",#colors"+id).show();
                var src =$("#tShirt").attr('src');
                var fsrc = src.substr(0, src.lastIndexOf("/"));
                var isrc = src.substr(src.lastIndexOf("/"));
                var cisrc = isrc.split("-");
                if($(element).attr("val") == 1){
                    cisrc[1] = 'man';
                }else{
                    cisrc[1] = 'woman';
                }
                isrc = '';
                for(var i = 0;i<cisrc.length;i++){
                    isrc+=cisrc[i];
                    if(i<cisrc.length-1){
                        isrc +="-";
                    }
                }
                $("#tShirt").attr('src',fsrc+isrc);
                $(element).siblings('.current').removeClass('current');
                $(element).addClass("current");
            }
            function showSize(id,element,pickedColor){
                //design image
                var des= $("#design").attr('src');
                var fdes = des.substr(0, des.lastIndexOf("/"));
                var ides = des.substr(des.lastIndexOf("/"));
                var cides = ides.split("-");
                cides[1] = pickedColor;
                ides = "";
                for(var i = 0;i<cides.length;i++){
                    ides+=cides[i];
                    if(i<cides.length-1){
                        ides+="-";
                    }
                }
                $("#design").attr('src',fdes+ides);
                //main image
                var src =$("#tShirt").attr('src');
                var fsrc = src.substr(0, src.lastIndexOf("/"));
                var isrc = src.substr(src.lastIndexOf("/"));
                var cisrc = isrc.split("-");
                cisrc[2] = pickedColor;
                isrc = '';
                for(var i = 0;i<cisrc.length;i++){
                    isrc+=cisrc[i];
                    if(i<cisrc.length-1){
                        isrc +="-";
                    }
                }
                $("#tShirt").attr('src',fsrc+isrc);
                
                $("#color").val($(element).attr("val")); 
                $("#arrow4"+id+",#size"+id).show();
                $("#arrow5"+id+",#finalForm"+id).show();
                $(element).siblings('.current').removeClass('current');
                $(element).addClass("current");
            }
            function showFinal(id,element){
                $("#sizenumber").val($(element).attr("val"));               
                $(element).siblings('.current').removeClass('current');
                $(element).addClass("current");
            }    
            $(document).ready(function(){
				
                $('#tShirt').hover(function() {
                    $('#design').animate({
                        top: 0
    
                    }, 500, function() {
                        // Animation complete.
                    });
			 
                });
                $('#design').mouseout(function() {
                    $(this).animate({
                        top: "399px"
    
                    }, 500, function() {
                        // Animation complete.
                    });
                });
            });
            function goToBasket(){
                $("input[name='gotoBasket']").val('1');
                $("#addBasket").unbind('submit').submit();
            }
        </script>