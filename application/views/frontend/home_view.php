<div class="f-r pick-home">
    <div class="f"><?= lang('home.pickyour') ?></div>
    <div class="pick-bottom f-r"></div>
</div>
</div></div>
<div id="st_main" class="st_main" style="clear:both; float:left; width:100%;">
    <ul id="st_nav" class="st_navigation">
        <li class="album">
            <div class="st_wrapper st_thumbs_wrapper">
                <div class="st_thumbs">
                    <?php
//                    $colorSet = array('red', 'green', 'white', 'black', 'gray', 'blue');
//                    $sexSet = array('man','woman');
//                    foreach ($tshirt_list as $tshirt):
                        ?>
                        <?php
                        //$tshirt->file->get();
                        //$picked = array_rand($colorSet, 1);
                        //$sexPicked = array_rand($sexSet,1);
                        ?>
                        <img src="<?php echo base_url() . $tshirt->file->path ."m-".$sexSet[$sexPicked]."-". $colorSet[$picked] . "-" . $tshirt->file->name; ?>" class="getTshirt" id="<?php echo $tshirt->id."/".$sexPicked."/".$picked; ?>" name="<?php echo $tshirt->name; ?>" />

                    <?php //endforeach ?>

                </div>
            </div>
        </li>

    </ul>
</div>

<div class="container">
    <div class="center-container f bottom">
        <div class="separator f"></div>
        <div class="clear"></div>
        <div class="viewed"><?= lang('home.mostViewed')?></div>
        <div class="thumbnail-container">
            <?php
            $colorSet = array('red', 'green', 'white', 'black', 'gray', 'blue');
            $sexSet = array('man','woman');
            foreach ($most_viewed as $tshirt):
                ?>
                <?php
                $tshirt->file->get();
                $picked = array_rand($colorSet, 1);
                $sexPicked = array_rand($sexSet,1);
                ?>
                <a href="<?php echo base_url() . $this->lang->lang() . '/tshirts/get/' . $tshirt->name . '/' . $tshirt->id.'/'.$sexPicked.'/'. $picked; ?>" class="thumbnail f">
                    <img width="213" src="<?php echo base_url() . $tshirt->file->path ."w-".$sexSet[$sexPicked]."-". $colorSet[$picked] . "-" . $tshirt->file->name; ?>" alt="<?php echo base_url() . $tshirt->file->path . $tshirt->file->name; ?>" class="" id="<?php echo $tshirt->id; ?>" />
                    <p><?php echo $tshirt->price; ?>  <?= lang('home.le') ?></p>
                </a>
            <?php endforeach ?>

            <div class="clear"></div>
        </div>
        <script type="text/javascript">
            $(function() {
                //the loading image
                var $loader		= $('#st_loading');
                //the ul element
                var $list		= $('#st_nav');
                //the current image being shown
                var $currImage 	= $('#st_main').children('img:first');

                buildThumbs();

                function buildThumbs(){
                    $list.children('li.album').each(function(){
                        var $elem = $(this);
                        var $thumbs_wrapper = $elem.find('.st_thumbs_wrapper');
                        var $thumbs = $thumbs_wrapper.children(':first');
                        //each thumb has 180px and we add 3 of margin
                        var finalW = $thumbs.find('img').length * 262;
                        $thumbs.css('width',finalW + 'px');
                        //make this element scrollable
                        makeScrollable($thumbs_wrapper,$thumbs);
                    });
                }
                //function to hide the current opened menu
                function hideThumbs(){
                    $list.find('li.current')
                    .animate({'height':'50px'},400,function(){
                        $(this).removeClass('current');
                    })
                    .find('.st_thumbs_wrapper')
                    .hide(200)
                    .andSelf()
                    .find('.st_link span')
                    .addClass('st_arrow_down')
                    .removeClass('st_arrow_up');
                }

                //makes the thumbs div scrollable
                //on mouse move the div scrolls automatically
                function makeScrollable($outer, $inner){
                    var extra 			= 80;
                    //Get menu width
                    var divWidth = $outer.width();
                    //Remove scrollbars
                    $outer.css({
                        overflow: 'hidden'
                    });
                    //Find last image in container
                    var lastElem = $inner.find('img:last');
                    $outer.scrollLeft(0);
                    //When user move mouse over menu
                    $outer.unbind('mousemove').bind('mousemove',function(e){
                        var containerWidth = lastElem[0].offsetLeft + lastElem.outerWidth() + 2*extra;
                        var left = (e.pageX - $outer.offset().left) * (containerWidth-divWidth) / divWidth - extra;
                        $outer.scrollLeft(left);
                    });
                }
                $('.getTshirt').click(function(){
                    
                    window.location.href='<?php echo base_url() . $this->lang->lang() . '/tshirts/get/'; ?>'+$(this).attr('name')+'/'+$(this).attr('id');
                });
            });
        </script>
        <script type="text/javascript">
            $(function(){$('.menu#1').addClass("current");});                     
        </script>
