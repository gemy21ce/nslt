<div class="clear"></div> 
<?php if ($cart = $this->cart->contents()): ?>
                                <div id="cart">
                                    <table cellpadding="5" cellspacing="0" width="100%">
                                            <tr>
                                                <th><?=lang('cartView.item')?></th>
                                                <th><?=lang('cartView.Quantity')?></th>
                                                <th><?=lang('cartView.Option')?></th>
                                                <th><?=lang('cartView.Price')?></th>
                                                <th><?=lang('cartView.Remove')?></th>
                                            </tr>
                                        <?php                                        
                                        foreach ($cart as $item): ?>
                                            <tr>
                                                <?php
                                                    if ($this->cart->has_options($item['rowid'])) {

                                                        foreach ($this->cart->product_options($item['rowid']) as $option => $value) {
                                                            if($option=='Sex')$sex=$value;
                                                                elseif ($option=='Size') $size=$value;
                                                                else $color=$value;
                                                        }
                                                    }
                                                    ?>
                                                <td><image width="50" src="<?php echo $item['name']; ?>"/></td>
                                                <td><?php echo $item['qty']; ?></td>
                                                <td>
                                                    <?php
                                                            echo  $sex . "<br />".$size. "<br />".$color."<br />";
                                                     
                                                    ?>
                                                </td>
                                                <td><?php echo $item['subtotal']; ?> <?= lang('home.le')?></td>
                                                <td class="remove">
                                                    <a class="delete cart-button" href="<?php echo base_url().$this->lang->lang(). '/tshirts/cart_remove/' . $item['rowid']; ?>">
                                                        <img c src="<?php echo base_url(); ?>assets/frontend/images/delete.png" width="20">
                                                    </a>
                                                </td>
                                            </tr>
        <?php endforeach; ?>
                                        <tr class="total">
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td><?=lang('cartView.Total')?> : </td>
                                            <td><?php echo $this->cart->total(); ?> <?= lang('home.le')?></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                       
                                    </table>
                                    <p>
                                        <span class="f-r">
                                            <a class="cart-button f-r" href="<?php echo base_url().$this->lang->lang(). '/payment/'; ?>"><?=lang('cartView.CheckOut')?></a>
                                            <a class="cart-button f-r" href="<?php echo base_url().$this->lang->lang(). '/tshirts/cart_destroy/'; ?>"><?=lang('cartView.ClearAll')?></a>
                                        </span>
                                        
                                    </p>
                                    <div class="clear"></div>
                                </div>
                            <?php endif; ?>
                      