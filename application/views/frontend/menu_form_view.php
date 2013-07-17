<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/additional-methods.js"></script>
<script src="<?php echo base_url(); ?>assets/frontend/js/ajax.submit.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
    $(function() {


        var pages = ['clientInfo', 'scoops', 'shakes', 'plates', 'menutype', 'menutheme', 'menuprices', 'finalmenu', 'costdelivery', 'menusaved'];
        var pageId = '<?php echo $tab; ?>';
        if (pageId === 'scoops' || pageId === 'shakes' || pageId === 'plates') {
            $("#menutabs .active").removeClass('active');
            $("#menutabs").find('[href="#scoops"]').addClass('active');
        }
        var getPricesItems = function() {
            $("#prices").html('');
            var items = $("input[name='scoop[]']:checked, input[name='plate[]']:checked, input[name='shake[]']:checked").parents('.scoop-holder').clone().get();
            items.reverse();
            //console.log(items.length);
            var docs = Math.floor(items.length / 4 + 1);
            for (var i = 0; i < docs; i++) {
                var div = document.createElement('div');
                div.setAttribute("class", "menu-holder-all");
                $(div).append(items.splice(0, 4));
                //console.log("div",div);

                $(div).find('input').removeAttr('checked');
                $(div).find('input').attr('type', 'text');
                $(div).find('input').val('');
                $(div).find('.scoop-holder-text').removeClass('scoop-holder-text').addClass('price-holder-text');
                $(div).find('input').attr('placeholder', 'LE');
                $("#prices").append(div);
            }
            $("#prices").find('input[type="text"]').each(function() {
                $(this).attr('name', $(this).attr('name').substr(0,$(this).attr('name').length -2) + "_" + $(this).attr('value') + "_price");
            });
        };
        var openTab = function(id, el) {
            pageId = id;
            if ($("#" + id).length === 0) {
                return;
            }
            $(".tabs").hide();
            $("#" + id).show();
            $(el).parents('ul').find(".active").removeClass('active');
            $(el).addClass('active');
            window.history.pushState(null, "Title", "<?php echo base_url() . $this->lang->lang() ?>/menus/createmenu/" + id);
            if (id === 'menuprices') {
                getPricesItems();
            }
        };
        if (pageId !== '' && $("#" + pageId).length !== 0) {
            openTab(pageId, $('[href="#' + pageId + '"]').first());
        }
        $('.opener').click(function(e) {

            e.preventDefault();
            if (!$('#menuForm').valid()) {
                return;
            }

            var id = $(this).attr('href').substr(1);
            openTab(id, this);
        });

        $("#menuForm").validate({
            debug: true,
            rules: {
                name: {
                    required: true,
                    alphanumeric: true
                },
                phone: {
                    required: true,
                    digits: true
                },
                mobile: {
                    required: true,
                    digits: true
                },
                email: {
                    required: true,
                    email: true
                },
                address: {
                    required: true
                },
                sales: {
                    required: true
                },
                title: {
                    required: true
                },
                quantity: {
                    required: true,
                    digits: true
                }
            },
            messages: {
                name: {
                    required: "<?= lang('menuform.required') ?>",
                    alphanumeric: "<?= lang('menuform.alphanumeric') ?>"
                },
                phone: {
                    required: "<?= lang('menuform.required') ?>",
                    digits: "<?= lang('menuform.digits') ?>"
                },
                mobile: {
                    required: "<?= lang('menuform.required') ?>",
                    digits: "<?= lang('menuform.digits') ?>"
                },
                email: {
                    required: "<?= lang('menuform.required') ?>",
                    email: "<?= lang('menuform.email') ?>"
                },
                address: {
                    required: "<?= lang('menuform.required') ?>"
                },
                sales: {
                    required: "<?= lang('menuform.required') ?>"
                },
                title: {
                    required: "<?= lang('menuform.required') ?>"
                },
                quantity: {
                    required: "<?= lang('menuform.required') ?>",
                    digits: "<?= lang('menuform.digits') ?>"
                }
            },
            submitHandler: function() {
                if (!$('#menuForm').valid()) {
                    $('a[href="#clientInfo"]').trigger('click');
                    return false;
                }
                if($("input[name='name']").val() === ''){
                    $('a[href="#clientInfo"]').trigger('click');
                    return false;
                }
                if($("input[name='scoop[]']:checked, input[name='plate[]']:checked, input[name='shake[]']:checked").length === 0){
                    $('a[href="#scoops"]').trigger('click');
                    return false;
                }
                if($("input[name='type']:checked").length === 0){
                    $('a[href="#menutype"]').trigger('click');
                    return false;
                }
                if($("input[name='theme']:checked").length === 0){
                    $('a[href="#menutheme"]').trigger('click');
                    return false;
                }
                var data = new FormData($('#menuForm')[0]);
                data.append("upload", $("input[type='file']")[0]);
                jloading('Saving');
                $.ajax({
                    url: "<?php echo base_url() . $this->lang->lang() ?>/menus/saveMenu",
                    type: 'POST',
                    contentType: false,
                    processData: false,
                    data: data,
                    success: function() {
                        jHide();
                        $('.tabs').hide();
                        $("#menusaved").show();
                        $('.opener').unbind('click');
                        window.history.pushState(null, "Title", "<?php echo base_url() . $this->lang->lang() ?>/menus/createmenu/menusaved");
                        return false;
                    }
                });
            }
        });
        if (pageId === 'menusaved') {
            $("#menutabs .active").removeClass('active');
            $("#menutabs").find('[href="#costdelivery"]').addClass('active');
            $('.opener').unbind('click');
        }
        if (pageId === 'menuprices') {
            getPricesItems();
        }

        if (pageId === 'menusaved') {
            $("#footerback, #footernext").hide();
        }
        if (pageId === '') {
            pageId = pages[0];
        }

        $("#footernext").click(function() {
            var index = pages.indexOf(pageId);
            $("[href='#" + pages[index + 1] + "']").trigger('click');
        });
        $("#footerback").click(function() {
            var index = pages.indexOf(pageId);
            $("[href='#" + pages[index - 1] + "']").trigger('click');
        });
    });
</script>
<style>
    .error{
        color: white;
        font-size: 14px;
    }
</style>
<div class="conatiner-border">
    <div id="menutabs" class="menu">
        <ul>
            <li class="first"><a class="opener" href="#Signin"><?= lang('menuform.step1') ?><br/><span><?= lang('menuform.signIn') ?></span></a></li>
            <li><a  href="#clientInfo" class="opener active"><?= lang('menuform.step2') ?><br/><span><?= lang('menuform.clientInfo') ?></span></a></li>
            <li><a href="#scoops" class="opener"><?= lang('menuform.step3') ?><br/><span><?= lang('menuform.menuItems') ?></span></a></li>
            <li><a href="#menutype"class="opener"><?= lang('menuform.step4') ?><br/><span><?= lang('menuform.menuShape') ?></span></a></li>
            <li><a href="#menutheme"class="opener"><?= lang('menuform.step5') ?><br/><span><?= lang('menuform.theme') ?></span></a></li>
            <li><a href="#menuprices"class="opener"><?= lang('menuform.step6') ?><br/><span><?= lang('menuform.price') ?></span></a></li>
            <li><a href="#finalmenu"class="opener"><?= lang('menuform.step7') ?><br/><span><?= lang('menuform.finalmenu') ?></span></a></li>
            <li class="last"><a href="#costdelivery"class="opener"><?= lang('menuform.step8') ?><br/><span><?= lang('menuform.cost') ?></span></a></li>
        </ul>
    </div>
    <!--change this-->
    <div  class="conatiner-data">

        <form name="menuForm"  action="<?php echo base_url() . $this->lang->lang() ?>/menus/saveMenu" id="menuForm" method="post" accept-charset="utf-8" enctype="multipart/form-data" >
            <div class="tabs" id="clientInfo" >
                <div class="info-contaner">
                    <div class="text-info-container"><?= lang('menuform.st1.header') ?> </div>
                    <div class="info-input-container"><div class="input-wide"><?= lang('menuform.st1.name') ?></div><input required="true" id="name" name="name" type="text" /> </div>
                    <div class="info-small-container"><div class="input-small"><?= lang('menuform.st1.phone') ?></div><input required="true" name="phone" type="text" /> </div>
                    <div class="info-small-container"><div class="input-small"><?= lang('menuform.st1.mobile') ?></div><input  required="true" name="mobile" type="text" /> </div>
                    <div class="info-input-container"><div class="input-wide"><?= lang('menuform.st1.email') ?></div><input  required="true" name="email" type="text" /> </div>
                    <div class="info-input-container"><div class="input-wide"><?= lang('menuform.st1.address') ?></div><input  required="true" name="address" type="text" /> </div>
                    <div class="info-input-container"><div class="input-wide"><?= lang('menuform.st1.salesman') ?></div><input  required="true" name="sales" type="text" /> </div>
                    <div class="info-input-container"><div class="input-wide"><?= lang('menuform.st1.title') ?></div><input name="title" type="text" /> </div>
                    <div class="input-container"><div class="input-wide"><?= lang('menuform.st1.logo') ?></div> </div>
                    <div class=" browse"><input name="logo" type="file" /></div>
                </div>
            </div>
            <div id="scoops" style="display: none; " class="tabs scoops-contaner">
                <div class="text-scoops-container"><?= lang('menuform.st2.title') ?></div>
                <div class="scoops-menu">
                    <ul>
                        <li><a href="#scoops" class="opener activescope"><?= lang('menuform.st2.scoops') ?></a></li>
                        <li class="seprated"></li>
                        <li><a href="#shakes" class="opener"><?= lang('menuform.st2.shakes') ?></a></li>
                        <li class="seprated"></li>
                        <li><a href="#plates" class="opener"><?= lang('menuform.st2.plates') ?></a></li>
                    </ul>
                </div>
                <div class="scoops-change">

                    <div class="menu-holder-all">
                        <div class="scoop-holder">
                            <div class="scoop-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/vanilla.png" width="221" height="162" alt="Vanilla" /></div>
                            <div class="scoop-holder-text"><input name="scoop[]" type="checkbox" value="1" /><?= lang('menuform.st2.vanilla') ?></div>
                        </div>
                        <div class="scoop-holder">
                            <div class="scoop-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/strawberry.png" width="221" height="162" alt="strawberry" /></div>
                            <div class="scoop-holder-text"><input name="scoop[]" type="checkbox" value="2" /><?= lang('menuform.st2.strawberry') ?></div>
                        </div>
                        <div class="scoop-holder">
                            <div class="scoop-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/mango.png" width="221" height="162" alt="mango" /></div>
                            <div class="scoop-holder-text"><input name="scoop[]" type="checkbox" value="3" /><?= lang('menuform.st2.mango') ?></div>
                        </div>
                        <div class="scoop-holder">
                            <div class="scoop-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/chocolate.png" width="221" height="162" alt="chocolate" /></div>
                            <div class="scoop-holder-text"><input name="scoop[]" type="checkbox" value="4" /><?= lang('menuform.st2.chocolate') ?></div>
                        </div>
                    </div>

                </div>
            </div>
            <div id="shakes" style="display: none" class="tabs scoops-contaner">
                <div class="text-scoops-container"><?= lang('menuform.st2.title') ?></div>
                <div class="scoops-menu">
                    <ul>
                        <li><a href="#scoops" class="opener"><?= lang('menuform.st2.scoops') ?></a></li>
                        <li class="seprated"></li>
                        <li><a href="#shakes" class="opener activescope"><?= lang('menuform.st2.shakes') ?></a></li>
                        <li class="seprated"></li>
                        <li><a href="#plates" class="opener"><?= lang('menuform.st2.plates') ?></a></li>
                    </ul>
                </div>
                <div class="scoops-change">

                    <div class="menu-holder-all">
                        <div class="scoop-holder">
                            <div class="scoop-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/1.png" width="221" height="162" /></div>
                            <div class="scoop-holder-text"><input name="shake[]" type="checkbox" value="1" /><?= lang('menuform.st3.shake1') ?></div>
                        </div>
                        <div class="scoop-holder">
                            <div class="scoop-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/2.png" width="221" height="162"/></div>
                            <div class="scoop-holder-text"><input name="shake[]" type="checkbox" value="2" /><?= lang('menuform.st3.shake2') ?></div>
                        </div>
                        <div class="scoop-holder">
                            <div class="scoop-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/3.png" width="221" height="162"/></div>
                            <div class="scoop-holder-text"><input name="shake[]" type="checkbox" value="3" /><?= lang('menuform.st3.shake3') ?></div>
                        </div>
                        <div class="scoop-holder">
                            <div class="scoop-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/4.png" width="221" height="162"/></div>
                            <div class="scoop-holder-text"><input name="shake[]" type="checkbox" value="4" /><?= lang('menuform.st3.shake4') ?></div>
                        </div>
                    </div>

                    <div class="menu-holder-all">
                        <div class="scoop-holder">
                            <div class="scoop-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/5.png" width="221" height="162" /></div>
                            <div class="scoop-holder-text"><input name="shake[]" type="checkbox" value="5" /><?= lang('menuform.st3.shake5') ?></div>
                        </div>
                        <div class="scoop-holder">
                            <div class="scoop-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/6.png" width="221" height="162"/></div>
                            <div class="scoop-holder-text"><input name="shake[]" type="checkbox" value="6" /><?= lang('menuform.st3.shake6') ?></div>
                        </div>
                        <div class="scoop-holder">
                            <div class="scoop-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/7.png" width="221" height="162"/></div>
                            <div class="scoop-holder-text"><input name="shake[]" type="checkbox" value="7" /><?= lang('menuform.st3.shake7') ?></div>
                        </div>
                        <div class="scoop-holder">
                            <div class="scoop-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/8.png" width="221" height="162"/></div>
                            <div class="scoop-holder-text"><input name="shake[]" type="checkbox" value="8" /><?= lang('menuform.st3.shake8') ?></div>
                        </div>
                    </div>

                    <div class="menu-holder-all">
                        <div class="scoop-holder">
                            <div class="scoop-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/9.png" width="221" height="162" /></div>
                            <div class="scoop-holder-text"><input name="shake[]" type="checkbox" value="9" /><?= lang('menuform.st3.shake9') ?></div>
                        </div>
                        <div class="scoop-holder">
                            <div class="scoop-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/10.png" width="221" height="162"/></div>
                            <div class="scoop-holder-text"><input name="shake[]" type="checkbox" value="10" /><?= lang('menuform.st3.shake10') ?></div>
                        </div>
                    </div>

                </div>
            </div>
            <div id="plates" style="display: none;" class=" tabs scoops-contaner">
                <div class="text-scoops-container"><?= lang('menuform.st2.title') ?></div>
                <div class="scoops-menu">
                    <ul>
                        <li><a href="#scoops" class="opener"><?= lang('menuform.st2.scoops') ?></a></li>
                        <li class="seprated"></li>
                        <li><a href="#shakes" class="opener"><?= lang('menuform.st2.shakes') ?></a></li>
                        <li class="seprated"></li>
                        <li><a href="#plates" class="opener activescope"><?= lang('menuform.st2.plates') ?></a></li>
                    </ul>
                </div>
                <div class="scoops-change">

                    <div class="menu-holder-all">
                        <div class="scoop-holder">
                            <div class="scoop-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/1-2.png" width="221" height="162"></div>
                            <div class="scoop-holder-text"><input name="plate[]" type="checkbox" value="1"><?= lang('menuform.st4.plate1') ?></div>
                        </div>
                        <div class="scoop-holder">
                            <div class="scoop-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/2-2.png" width="221" height="162"></div>
                            <div class="scoop-holder-text"><input name="plate[]" type="checkbox" value="2"><?= lang('menuform.st4.plate2') ?></div>
                        </div>
                        <div class="scoop-holder">
                            <div class="scoop-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/3-2.png" width="221" height="162"></div>
                            <div class="scoop-holder-text"><input name="plate[]" type="checkbox" value="3"><?= lang('menuform.st4.plate3') ?></div>
                        </div>
                        <div class="scoop-holder">
                            <div class="scoop-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/4-2.png" width="221" height="162"></div>
                            <div class="scoop-holder-text"><input name="plate[]" type="checkbox" value="4"><?= lang('menuform.st4.plate4') ?></div>
                        </div>
                    </div>

                    <div class="menu-holder-all">
                        <div class="scoop-holder">
                            <div class="scoop-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/5-2.png" width="221" height="162"></div>
                            <div class="scoop-holder-text"><input name="plate[]" type="checkbox" value="5"><?= lang('menuform.st4.plate5') ?></div>
                        </div>
                        <div class="scoop-holder">
                            <div class="scoop-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/6-2.png" width="221" height="162"></div>
                            <div class="scoop-holder-text"><input name="plate[]" type="checkbox" value="6"><?= lang('menuform.st4.plate6') ?></div>
                        </div>
                        <div class="scoop-holder">
                            <div class="scoop-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/7-2.png" width="221" height="162"></div>
                            <div class="scoop-holder-text"><input name="plate[]" type="checkbox" value="7"><?= lang('menuform.st4.plate7') ?></div>
                        </div>
                        <div class="scoop-holder">
                            <div class="scoop-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/8-2.png" width="221" height="162"></div>
                            <div class="scoop-holder-text"><input name="plate[]" type="checkbox" value="8"><?= lang('menuform.st4.plate8') ?></div>
                        </div>
                    </div>

                    <div class="menu-holder-all">
                        <div class="scoop-holder">
                            <div class="scoop-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/9-2.png" width="221" height="162"></div>
                            <div class="scoop-holder-text"><input name="plate[]" type="checkbox" value="9"><?= lang('menuform.st4.plate9') ?></div>
                        </div>
                        <div class="scoop-holder">
                            <div class="scoop-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/10-2.png" width="221" height="162"></div>
                            <div class="scoop-holder-text"><input name="plate[]" type="checkbox" value="10"><?= lang('menuform.st4.plate10') ?></div>
                        </div>
                        <div class="scoop-holder">
                            <div class="scoop-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/11-2.png" width="221" height="162"></div>
                            <div class="scoop-holder-text"><input name="plate[]" type="checkbox" value="11"><?= lang('menuform.st4.plate11') ?></div>
                        </div>
                        <div class="scoop-holder">
                            <div class="scoop-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/12-2.png" width="221" height="162"></div>
                            <div class="scoop-holder-text"><input name="plate[]" type="checkbox" value="12"><?= lang('menuform.st4.plate12') ?></div>
                        </div>
                    </div>

                    <div class="menu-holder-all">
                        <div class="scoop-holder">
                            <div class="scoop-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/13-2.png" width="221" height="162"></div>
                            <div class="scoop-holder-text"><input name="plate[]" type="checkbox" value="13"><?= lang('menuform.st4.plate13') ?></div>
                        </div>
                    </div>

                </div>
            </div>
            <div  id="menutype" style="display: none;" class="tabs scoops-contaner">
                <div class="text-scoops-container"><?= lang('menuform.st5.title') ?></div>

                <div class="scoops-change">

                    <div class="menu-holder-all">
                        <div class="menu-holder">
                            <div class="menu-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/typea.png" width="176" height="197" alt="Type-A"></div>
                            <div class="menu-holder-text"><input name="type" type="radio" value="1"><?= lang('menuform.st5.type1') ?>
                            </div>
                        </div>
                        <div class="menu-holder">
                            <div class="menu-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/typeb.png" width="176" height="197" alt="Type-B"></div>
                            <div class="menu-holder-text"><input name="type" type="radio" value="2"><?= lang('menuform.st5.type2') ?>
                            </div>
                        </div>
                        <div class="menu-holder">
                            <div class="menu-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/typec.png" width="176" height="197" alt="Type-C"></div>
                            <div class="menu-holder-text"><input name="type" type="radio" value="3"><?= lang('menuform.st5.type3') ?>
                            </div>
                        </div>
                        <div class="menu-holder">
                            <div class="menu-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/typed.png" width="176" height="197" alt="Type-D"></div>
                            <div class="menu-holder-text"><input name="type" type="radio" value="4"><?= lang('menuform.st5.type4') ?>
                            </div>
                        </div>
                    </div>

                    <div class="menu-holder-all">
                        <div class="menu-holder">
                            <div class="menu-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/typee.png" width="176" height="197" alt="Type-E"></div>
                            <div class="menu-holder-text"><input name="type" type="radio" value="5"><?= lang('menuform.st5.type5') ?>
                            </div>
                        </div>
                        <div class="menu-holder">
                            <div class="menu-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/typef.png" width="176" height="197" alt="Type-F"></div>
                            <div class="menu-holder-text"><input name="type" type="radio" value="6"><?= lang('menuform.st5.type6') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div   id="menutheme" style="display: none;" class="tabs scoops-contaner">
                <div class="text-scoops-container"><?= lang('menuform.st6.title') ?></div>

                <div class="scoops-change">

                    <div class="menu-holder-all">
                        <div class="menu-holder">
                            <div class="menu-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/menu-1.png" width="176" height="197" alt="menu-1"></div>
                            <div class="menu-holder-text"><input name="theme" type="radio" value="1"></div>
                        </div>
                        <div class="menu-holder">
                            <div class="menu-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/menu-2.png" width="176" height="197" alt="menu-2"></div>
                            <div class="menu-holder-text"><input name="theme" type="radio" value="2"></div>
                        </div>
                        <div class="menu-holder">
                            <div class="menu-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/menu-3.png" width="176" height="197" alt="menu-3"></div>
                            <div class="menu-holder-text"><input name="theme" type="radio" value="3"></div>
                        </div>
                        <div class="menu-holder">
                            <div class="menu-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/menu-4.png" width="176" height="197" alt="menu-4"></div>
                            <div class="menu-holder-text"><input name="theme" type="radio" value="4"></div>
                        </div>
                    </div>

                    <div class="menu-holder-all">
                        <div class="menu-holder">
                            <div class="menu-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/menu-5.png" width="176" height="197" alt="menu-5"></div>
                            <div class="menu-holder-text"><input name="theme" type="radio" value="5"></div>
                        </div>
                        <div class="menu-holder">
                            <div class="menu-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/menu-6.png" width="176" height="197" alt="menu-6"></div>
                            <div class="menu-holder-text"><input name="theme" type="radio" value="6"></div>
                        </div>
                        <div class="menu-holder">
                            <div class="menu-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/menu-7.png" width="176" height="197" alt="menu-7"></div>
                            <div class="menu-holder-text"><input name="theme" type="radio" value="7"></div>
                        </div>
                        <div class="menu-holder">
                            <div class="menu-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/menu-8.png" width="176" height="197" alt="menu-8"></div>
                            <div class="menu-holder-text"><input name="theme" type="radio" value="8"></div>
                        </div>
                    </div>

                    <div class="menu-holder-all">
                        <div class="menu-holder">
                            <div class="menu-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/menu-9.png" width="176" height="197" alt="menu-9"></div>
                            <div class="menu-holder-text"><input name="theme" type="radio" value="9"></div>
                        </div>
                        <div class="menu-holder">
                            <div class="menu-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/menu-10.png" width="176" height="197" alt="menu-10"></div>
                            <div class="menu-holder-text"><input name="theme" type="radio" value="10"></div>
                        </div>
                        <div class="menu-holder">
                            <div class="menu-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/menu-11.png" width="176" height="197" alt="menu-11"></div>
                            <div class="menu-holder-text"><input name="theme" type="radio" value="11"></div>
                        </div>
                        <div class="menu-holder">
                            <div class="menu-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/menu-12.png" width="176" height="197" alt="menu-12"></div>
                            <div class="menu-holder-text"><input name="theme" type="radio" value="12"></div>
                        </div>
                    </div>

                </div>
            </div>
            <div id="menuprices" style="display: none;" class="tabs scoops-contaner">
                <div class="text-scoops-container"><?= lang('menuform.st7.title') ?>
                </div>

                <div id="prices" class="scoops-change">
                </div>
            </div>
            <div id="finalmenu" style="display: none;" class="tabs scoops-contaner">
                <div class="text-scoops-container"><?= lang('menuform.st8.title') ?></div>

                <div class="final-menu-change">
                    <div class="final-menu-one">
                        <div class="final-menu-one-img"><img src="<?php echo base_url(); ?>assets/frontend/images/front.png" width="240" height="304" alt="front"> </div>
                        <div class="final-menu-one-text"><?= lang('menuform.st8.front') ?></div></div>
                    <div class="final-menu-one">
                        <div class="final-menu-one-img"><img src="<?php echo base_url(); ?>assets/frontend/images/inner.png" width="240" height="304" alt="Inside"> </div>
                        <div class="final-menu-one-text"><?= lang('menuform.st8.inside') ?></div></div>
                </div>
            </div>
            <div id="costdelivery" style="display: none;" class="tabs info-contaner">
                <div class="text-info-container"><?= lang('menuform.st9.title') ?>
                </div>
                <div class="dilivery-input-container" style="padding-bottom: 10px;"><div class="input-wide"><?= lang('menuform.st9.quantity') ?></div><input name="quantity" type="text"><?= lang('menuform.st9.units') ?> 
                    <label for="quantity" class="error" style="display: none;"></label>
                </div>
                <div class="dilivery-input-container"><div class="input-wide"><?= lang('menuform.st9.deliverydate') ?></div>
                    <select name="day">
                        <option value="amex"  selected="true" disabled="true" ><?= lang('menuform.st9.day') ?></option>
                        <?php for ($i = 1; $i <= 31; $i++) { ?>
                            <option value="Discover"><? echo $i ?></option>
                        <?php } ?>
                    </select>
                    <span class="dilivery-seprator">/</span>
                    <select name="month">
                        <option value="amex" selected="true" disabled="true"><?= lang('menuform.st9.month') ?></option>
                        <?php for ($i = 1; $i <= 12; $i++) { ?>
                            <option value="Discover"><? echo $i ?></option>
                        <?php } ?>
                    </select>
                    <span class="dilivery-seprator">/</span>
                    <select name="day">
                        <option value="amex" selected="true" disabled="true" ><?= lang('menuform.st9.year') ?></option>
                        <option value="Discover">2013</option>
                    </select>
                </div>
                <div class="dilivery-input-container">
                    <div class="input-wide"><?= lang('menuform.st9.savemenu') ?></div>
                    <div class="browse">
                        <input type="submit" value="<?= lang('menuform.st9.save') ?>"/>
                    </div>
                </div>
            </div>
            <div id="menusaved" style="display: none;" class="tabs info-contaner">
                <div><?= lang('menuform.st10.final') ?></div>
            </div>
        </form>
    </div>
    <!--End change this-->
</div>