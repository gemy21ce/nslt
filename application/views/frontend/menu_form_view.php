<script type="text/javascript">
    $(function() {

        var pageId = '<?php echo $tab; ?>';

        if (pageId === 'scoops' || pageId === 'shakes' || pageId === 'plates') {
            $("#menutabs .active").removeClass('active');
            $("#menutabs").find('[href="#scoops"]').addClass('active');
        }
        var getPricesItems = function() {
            $("#prices").html('');
            var items = $("input[name='scoop']:checked, input[name='plate']:checked, input[name='shake']:checked").parents('.scoop-holder').clone().get();
            
            items.reverse();
            //console.log(items.length);
            var docs = Math.floor(items.length / 4 + 1);
            //console.log("docs",docs);
            for (var i = 0; i < docs; i++) {
                //console.log("i",i);
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
                $(this).attr('name', $(this).attr('value') + "_price");
            });
        };
        var openTab = function(id, el) {

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

            var id = $(this).attr('href').substr(1);
            openTab(id, this);
        });
        $('form').submit(function() {
            $('.tabs').hide();
            $("#menusaved").show();
            $('.opener').unbind('click');
            window.history.pushState(null, "Title", "<?php echo base_url() . $this->lang->lang() ?>/menus/createmenu/menusaved");
            return false;
        });

        if (pageId === 'menusaved') {
            $("#menutabs .active").removeClass('active');
            $("#menutabs").find('[href="#costdelivery"]').addClass('active');
            $('.opener').unbind('click');
        }
        if (pageId === 'menuprices') {
            getPricesItems();
        }
    });
</script>
<div class="conatiner-border">
    <div id="menutabs" class="menu">
        <ul>
            <li class="first"><a class="opener" href="#Signin">STEP 1<br/><span>Sign in </span></a></li>
            <li><a  href="#clientInfo" class="opener active">STEP 2<br/><span>Client Information</span></a></li>
            <li><a href="#scoops" class="opener">STEP 3<br/><span>Menu Items</span></a></li>
            <li><a href="#menutype"class="opener">STEP 4<br/><span>Menu Shape</span></a></li>
            <li><a href="#menutheme"class="opener">STEP 5<br/><span>Layout/Color Themes</span></a></li>
            <li><a href="#menuprices"class="opener">STEP 6<br/><span>Menu Pricing</span></a></li>
            <li><a href="#finalmenu"class="opener">STEP 7<br/><span>Final Menu</span></a></li>
            <li class="last"><a href="#costdelivery"class="opener">STEP 8<br/><span>Cost & Delivery</span></a></li>
        </ul>
    </div>
    <!--change this-->
    <div  class="conatiner-data">
        <form>
            <div class="tabs" id="clientInfo" >
                <div class="info-contaner">
                    <div class="text-info-container">Please provide your menu informations </div>
                    <div class="info-input-container"><div class="input-wide">Name</div><input name="name" type="text" /> </div>
                    <div class="info-small-container"><div class="input-small">Phone</div><input name="phone" type="text" /> </div>
                    <div class="info-small-container"><div class="input-small">Mobile</div><input name="mobile" type="text" /> </div>
                    <div class="info-input-container"><div class="input-wide">E-mail</div><input name="email" type="text" /> </div>
                    <div class="info-input-container"><div class="input-wide">Address</div><input name="address" type="text" /> </div>
                    <div class="info-input-container"><div class="input-wide">Sales man</div><input name="sales" type="text" /> </div>
                    <div class="info-input-container"><div class="input-wide">Menu Title</div><input name="title" type="text" /> </div>
                    <div class="input-container"><div class="input-wide">Upload Logo</div> </div>
                    <div class=" browse"><input name="Browse" type="file" value="Browse"/></div>
                </div>
            </div>
            <div id="scoops" style="display: none; " class="tabs scoops-contaner">
                <div class="text-scoops-container">Please choose the items to include in <br/>
                    Nestle’s ICE CREAM personalized menu</div>
                <div class="scoops-menu">
                    <ul>
                        <li><a href="#scoops" class="opener activescope">Scoops</a></li>
                        <li class="seprated"></li>
                        <li><a href="#shakes" class="opener">Snakes</a></li>
                        <li class="seprated"></li>
                        <li><a href="#plates" class="opener">Plates</a></li>
                    </ul>
                </div>
                <div class="scoops-change">

                    <div class="menu-holder-all">
                        <div class="scoop-holder">
                            <div class="scoop-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/vanilla.png" width="221" height="162" alt="Vanilla" /></div>
                            <div class="scoop-holder-text"><input name="scoop" type="checkbox" value="vanilla_scoop" />Vanilla</div>
                        </div>
                        <div class="scoop-holder">
                            <div class="scoop-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/strawberry.png" width="221" height="162" alt="strawberry" /></div>
                            <div class="scoop-holder-text"><input name="scoop" type="checkbox" value="strawberrt_scoop" />Strawberry</div>
                        </div>
                        <div class="scoop-holder">
                            <div class="scoop-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/mango.png" width="221" height="162" alt="mango" /></div>
                            <div class="scoop-holder-text"><input name="scoop" type="checkbox" value="mango_scoop" />Mango</div>
                        </div>
                        <div class="scoop-holder">
                            <div class="scoop-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/chocolate.png" width="221" height="162" alt="chocolate" /></div>
                            <div class="scoop-holder-text"><input name="scoop" type="checkbox" value="chocolate_scoop" />Chocolate</div>
                        </div>
                    </div>

                </div>
            </div>
            <div id="shakes" style="display: none" class="tabs scoops-contaner">
                <div class="text-scoops-container">Please choose the items to include in <br/>
                    Nestle’s ICE CREAM personalized menu</div>
                <div class="scoops-menu">
                    <ul>
                        <li><a href="#scoops" class="opener">Scoops</a></li>
                        <li class="seprated"></li>
                        <li><a href="#shakes" class="opener activescope">Snakes</a></li>
                        <li class="seprated"></li>
                        <li><a href="#plates" class="opener">Plates</a></li>
                    </ul>
                </div>
                <div class="scoops-change">

                    <div class="menu-holder-all">
                        <div class="scoop-holder">
                            <div class="scoop-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/1.png" width="221" height="162" /></div>
                            <div class="scoop-holder-text"><input name="shake" type="checkbox" value="strawberry_shake" />The Strawberry Shaker</div>
                        </div>
                        <div class="scoop-holder">
                            <div class="scoop-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/2.png" width="221" height="162"/></div>
                            <div class="scoop-holder-text"><input name="shake" type="checkbox" value="blueberry_shake" />Blue Berry Shaker</div>
                        </div>
                        <div class="scoop-holder">
                            <div class="scoop-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/3.png" width="221" height="162"/></div>
                            <div class="scoop-holder-text"><input name="shake" type="checkbox" value="lateaftereigh_shake" />Late After Eight</div>
                        </div>
                        <div class="scoop-holder">
                            <div class="scoop-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/4.png" width="221" height="162"/></div>
                            <div class="scoop-holder-text"><input name="shake" type="checkbox" value="chocolate_shake" />Chocolate Basbousa Shake</div>
                        </div>
                    </div>

                    <div class="menu-holder-all">
                        <div class="scoop-holder">
                            <div class="scoop-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/5.png" width="221" height="162" /></div>
                            <div class="scoop-holder-text"><input name="shake" type="checkbox" value="kitkat_shake" />Ki Kat Fusion</div>
                        </div>
                        <div class="scoop-holder">
                            <div class="scoop-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/6.png" width="221" height="162"/></div>
                            <div class="scoop-holder-text"><input name="shake" type="checkbox" value="chocolate_shake" />Choc-a-Lot</div>
                        </div>
                        <div class="scoop-holder">
                            <div class="scoop-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/7.png" width="221" height="162"/></div>
                            <div class="scoop-holder-text"><input name="shake" type="checkbox" value="basbousa_shake" />Basbousa Shake</div>
                        </div>
                        <div class="scoop-holder">
                            <div class="scoop-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/8.png" width="221" height="162"/></div>
                            <div class="scoop-holder-text"><input name="shake" type="checkbox" value="caramilla_shake" />Caramilla Shake</div>
                        </div>
                    </div>

                    <div class="menu-holder-all">
                        <div class="scoop-holder">
                            <div class="scoop-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/9.png" width="221" height="162" /></div>
                            <div class="scoop-holder-text"><input name="shake" type="checkbox" value="hippy_shake" />The Hippy Shake</div>
                        </div>
                        <div class="scoop-holder">
                            <div class="scoop-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/10.png" width="221" height="162"/></div>
                            <div class="scoop-holder-text"><input name="shake" type="checkbox" value="mango_shake" />Mango Dream</div>
                        </div>
                    </div>

                </div>
            </div>
            <div id="plates" style="display: none;" class=" tabs scoops-contaner">
                <div class="text-scoops-container">Please choose the items to include in <br>
                    Nestle’s ICE CREAM personalized menu</div>
                <div class="scoops-menu">
                    <ul>
                        <li><a href="#scoops" class="opener">Scoops</a></li>
                        <li class="seprated"></li>
                        <li><a href="#shakes" class="opener">Snakes</a></li>
                        <li class="seprated"></li>
                        <li><a href="#plates" class="opener activescope">Plates</a></li>
                    </ul>
                </div>
                <div class="scoops-change">

                    <div class="menu-holder-all">
                        <div class="scoop-holder">
                            <div class="scoop-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/1-2.png" width="221" height="162"></div>
                            <div class="scoop-holder-text"><input name="plate" type="checkbox" value="konafa_plate">Konafa Ice-Cream Sandwich</div>
                        </div>
                        <div class="scoop-holder">
                            <div class="scoop-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/2-2.png" width="221" height="162"></div>
                            <div class="scoop-holder-text"><input name="plate" type="checkbox" value="chocolate_plate">Chocolate Time</div>
                        </div>
                        <div class="scoop-holder">
                            <div class="scoop-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/3-2.png" width="221" height="162"></div>
                            <div class="scoop-holder-text"><input name="plate" type="checkbox" value="booster_plate">Booster Scoopster</div>
                        </div>
                        <div class="scoop-holder">
                            <div class="scoop-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/4-2.png" width="221" height="162"></div>
                            <div class="scoop-holder-text"><input name="plate" type="checkbox" value="iceraisin_plate">Ice Raisin Crepe</div>
                        </div>
                    </div>

                    <div class="menu-holder-all">
                        <div class="scoop-holder">
                            <div class="scoop-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/5-2.png" width="221" height="162"></div>
                            <div class="scoop-holder-text"><input name="plate" type="checkbox" value="banana_plate">Banana Split</div>
                        </div>
                        <div class="scoop-holder">
                            <div class="scoop-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/6-2.png" width="221" height="162"></div>
                            <div class="scoop-holder-text"><input name="plate" type="checkbox" value="stawberry_plate">Strawberry Dream</div>
                        </div>
                        <div class="scoop-holder">
                            <div class="scoop-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/7-2.png" width="221" height="162"></div>
                            <div class="scoop-holder-text"><input name="plate" type="checkbox" value="sugar_plate">Sugar High</div>
                        </div>
                        <div class="scoop-holder">
                            <div class="scoop-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/8-2.png" width="221" height="162"></div>
                            <div class="scoop-holder-text"><input name="plate" type="checkbox" value="icegold_plate">Ice Gold Apples</div>
                        </div>
                    </div>

                    <div class="menu-holder-all">
                        <div class="scoop-holder">
                            <div class="scoop-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/9-2.png" width="221" height="162"></div>
                            <div class="scoop-holder-text"><input name="plate" type="checkbox" value="smooth_plate">Smooth Crunch</div>
                        </div>
                        <div class="scoop-holder">
                            <div class="scoop-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/10-2.png" width="221" height="162"></div>
                            <div class="scoop-holder-text"><input name="plate" type="checkbox" value="mangokonafa_plate">Mango Konafa Madness</div>
                        </div>
                        <div class="scoop-holder">
                            <div class="scoop-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/11-2.png" width="221" height="162"></div>
                            <div class="scoop-holder-text"><input name=plate"" type="checkbox" value="biscuit_plate">Biscuit Crush</div>
                        </div>
                        <div class="scoop-holder">
                            <div class="scoop-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/12-2.png" width="221" height="162"></div>
                            <div class="scoop-holder-text"><input name="plate" type="checkbox" value="icedonut_plate">Ice Donut</div>
                        </div>
                    </div>

                    <div class="menu-holder-all">
                        <div class="scoop-holder">
                            <div class="scoop-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/13-2.png" width="221" height="162"></div>
                            <div class="scoop-holder-text"><input name="plate" type="checkbox" value="icechocolate_plate">Ice Chocolate Finger</div>
                        </div>
                    </div>

                </div>
            </div>
            <div  id="menutype" style="display: none;" class="tabs scoops-contaner">
                <div class="text-scoops-container">Please choose Nestle’s<br>
                    ICE CREAM<br>Printed Menu Shape</div>

                <div class="scoops-change">

                    <div class="menu-holder-all">
                        <div class="menu-holder">
                            <div class="menu-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/typea.png" width="176" height="197" alt="Type-A"></div>
                            <div class="menu-holder-text"><input name="type" type="checkbox" value="menu_type_a">Type A<br>
                                Size 30x15cm<br>
                                No. of Pages 2</div>
                        </div>
                        <div class="menu-holder">
                            <div class="menu-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/typeb.png" width="176" height="197" alt="Type-B"></div>
                            <div class="menu-holder-text"><input name="type" type="checkbox" value="menu_type_b">Type B<br>
                                Size 15x30cm<br>
                                No. of Pages 2</div>
                        </div>
                        <div class="menu-holder">
                            <div class="menu-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/typec.png" width="176" height="197" alt="Type-C"></div>
                            <div class="menu-holder-text"><input name="type" type="checkbox" value="menu_type_c">Type C<br>
                                Size 20x15cm<br>
                                No. of Pages 2</div>
                        </div>
                        <div class="menu-holder">
                            <div class="menu-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/typed.png" width="176" height="197" alt="Type-D"></div>
                            <div class="menu-holder-text"><input name="type" type="checkbox" value="menu_type_d">Type D<br>
                                Size 30x15cm<br>
                                Size2 in the envelope:<br>
                                30cmx5cm<br>
                                No. of Pages 4</div>
                        </div>
                    </div>

                    <div class="menu-holder-all">
                        <div class="menu-holder">
                            <div class="menu-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/typee.png" width="176" height="197" alt="Type-E"></div>
                            <div class="menu-holder-text"><input name="type" type="checkbox" value="menu_type_e">
                                Type E<br>
                                Size 30x15cm<br>
                                No. of Pages 4</div>
                        </div>
                        <div class="menu-holder">
                            <div class="menu-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/typef.png" width="176" height="197" alt="Type-F"></div>
                            <div class="menu-holder-text"><input name="type" type="checkbox" value="menu_type_f">
                                Type F<br>
                                Size 20x7cm<br>
                                No. of Pages 10</div>
                        </div>
                    </div>
                </div>
            </div>
            <div   id="menutheme" style="display: none;" class="tabs scoops-contaner">
                <div class="text-scoops-container">Please Select  to the menu color theme</div>

                <div class="scoops-change">

                    <div class="menu-holder-all">
                        <div class="menu-holder">
                            <div class="menu-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/menu-1.png" width="176" height="197" alt="menu-1"></div>
                            <div class="menu-holder-text"><input name="theme" type="checkbox" value="theme_1"></div>
                        </div>
                        <div class="menu-holder">
                            <div class="menu-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/menu-2.png" width="176" height="197" alt="menu-2"></div>
                            <div class="menu-holder-text"><input name="theme" type="checkbox" value="theme_2"></div>
                        </div>
                        <div class="menu-holder">
                            <div class="menu-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/menu-3.png" width="176" height="197" alt="menu-3"></div>
                            <div class="menu-holder-text"><input name="theme" type="checkbox" value="theme_3"></div>
                        </div>
                        <div class="menu-holder">
                            <div class="menu-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/menu-4.png" width="176" height="197" alt="menu-4"></div>
                            <div class="menu-holder-text"><input name="theme" type="checkbox" value="theme_4"></div>
                        </div>
                    </div>

                    <div class="menu-holder-all">
                        <div class="menu-holder">
                            <div class="menu-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/menu-5.png" width="176" height="197" alt="menu-5"></div>
                            <div class="menu-holder-text"><input name="theme" type="checkbox" value="theme_5"></div>
                        </div>
                        <div class="menu-holder">
                            <div class="menu-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/menu-6.png" width="176" height="197" alt="menu-6"></div>
                            <div class="menu-holder-text"><input name="theme" type="checkbox" value="theme_6"></div>
                        </div>
                        <div class="menu-holder">
                            <div class="menu-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/menu-7.png" width="176" height="197" alt="menu-7"></div>
                            <div class="menu-holder-text"><input name="theme" type="checkbox" value="theme_7"></div>
                        </div>
                        <div class="menu-holder">
                            <div class="menu-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/menu-8.png" width="176" height="197" alt="menu-8"></div>
                            <div class="menu-holder-text"><input name="theme" type="checkbox" value="theme_8"></div>
                        </div>
                    </div>

                    <div class="menu-holder-all">
                        <div class="menu-holder">
                            <div class="menu-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/menu-9.png" width="176" height="197" alt="menu-9"></div>
                            <div class="menu-holder-text"><input name="theme" type="checkbox" value="theme_9"></div>
                        </div>
                        <div class="menu-holder">
                            <div class="menu-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/menu-10.png" width="176" height="197" alt="menu-10"></div>
                            <div class="menu-holder-text"><input name="theme" type="checkbox" value="theme_10"></div>
                        </div>
                        <div class="menu-holder">
                            <div class="menu-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/menu-11.png" width="176" height="197" alt="menu-11"></div>
                            <div class="menu-holder-text"><input name="theme" type="checkbox" value="theme_11"></div>
                        </div>
                        <div class="menu-holder">
                            <div class="menu-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/menu-12.png" width="176" height="197" alt="menu-12"></div>
                            <div class="menu-holder-text"><input name="theme" type="checkbox" value="theme_12"></div>
                        </div>
                    </div>

                </div>
            </div>
            <div id="menuprices" style="display: none;" class="tabs scoops-contaner">
                <div class="text-scoops-container">Please add the prices to<br>
                    the items you<br>
                    include in the menu
                </div>

                <div id="prices" class="scoops-change">

                    <!--                    <div id="prices" class="menu-holder-all">
                                            <div class="scoop-holder">
                                                <div class="scoop-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/6-2.png" width="221" height="162"></div>
                                                <div class="price-holder-text"><input name="" type="text">LE</div>
                                            </div>
                                            <div class="scoop-holder">
                                                <div class="scoop-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/1.png" width="221" height="162"></div>
                                                <div class="price-holder-text"><input name="" type="text">LE</div>
                                            </div>
                                            <div class="scoop-holder">
                                                <div class="scoop-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/5.png" width="221" height="162"></div>
                                                <div class="price-holder-text"><input name="" type="text">LE</div>
                                            </div>
                                            <div class="scoop-holder">
                                                <div class="scoop-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/5-2.png" width="221" height="162"></div>
                                                <div class="price-holder-text"><input name="" type="text">LE</div>
                                            </div>
                                        </div>-->

                    <!--                    <div id="prices2" class="menu-holder-all">
                                            <div class="scoop-holder">
                                                <div class="scoop-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/6.png" width="221" height="162"></div>
                                                <div class="price-holder-text"><input name="" type="text">LE</div>
                                            </div>
                                        </div>-->
                    <!--                    <div id="prices3" class="menu-holder-all">
                                            <div class="scoop-holder">
                                                <div class="scoop-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/6.png" width="221" height="162"></div>
                                                <div class="price-holder-text"><input name="" type="text">LE</div>
                                            </div>
                                        </div>-->
                    <!--                    <div id="prices4" class="menu-holder-all">
                                            <div class="scoop-holder">
                                                <div class="scoop-holder-img"><img src="<?php echo base_url(); ?>assets/frontend/images/6.png" width="221" height="162"></div>
                                                <div class="price-holder-text"><input name="" type="text">LE</div>
                                            </div>
                                        </div>-->

                </div>
            </div>
            <div id="finalmenu" style="display: none;" class="tabs scoops-contaner">
                <div class="text-scoops-container">Your Final Menu will look like</div>

                <div class="final-menu-change">
                    <div class="final-menu-one">
                        <div class="final-menu-one-img"><img src="<?php echo base_url(); ?>assets/frontend/images/front.png" width="240" height="304" alt="front"> </div>
                        <div class="final-menu-one-text">Front</div></div>
                    <div class="final-menu-one">
                        <div class="final-menu-one-img"><img src="<?php echo base_url(); ?>assets/frontend/images/inner.png" width="240" height="304" alt="Inside"> </div>
                        <div class="final-menu-one-text">Inside</div></div>
                </div>
            </div>
            <div id="costdelivery" style="display: none;" class="tabs info-contaner">
                <div class="text-info-container">Quantity &amp; Delivery Information</div>
                <div class="dilivery-input-container"><div class="input-wide">Quantity</div><input name="" type="text">Units </div>
                <div class="dilivery-input-container"><div class="input-wide">Delivery Date</div>
                    <select name="day">
                        <option value="amex"  selected="true" disabled="true" >Day</option>
                        <?php for ($i = 1; $i <= 31; $i++) { ?>
                            <option value="Discover"><? echo $i ?></option>
                        <?php } ?>
                    </select>
                    <span class="dilivery-seprator">/</span>
                    <select name="month">
                        <option value="amex" selected="true" disabled="true">Month</option>
                        <?php for ($i = 1; $i <= 12; $i++) { ?>
                            <option value="Discover"><? echo $i ?></option>
                        <?php } ?>
                    </select>
                    <span class="dilivery-seprator">/</span>
                    <select name="day">
                        <option value="amex" selected="true" disabled="true" >Year</option>
                        <option value="Discover">2013</option>
                    </select>
                </div>
                <div class="dilivery-input-container"><div class="input-wide">Save Your Menu</div><input type="submit" value="Save"/></div>
            </div>
            <div id="menusaved" style="display: none;" class="tabs info-contaner">
                <div>Your new Nestle menu has been created Successfully we'll contact you soon to deliver it to you.</div>
            </div>
        </form>
    </div>
    <!--End change this-->
</div>