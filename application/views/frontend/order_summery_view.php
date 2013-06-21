<div class="container">
    <?php foreach ($orders as $order): ?>
        <script type="text/javascript">
            $(document).ready(function(){
                $("#expand<?php echo $order->id; ?>").click(function () {
                    $(".id<?php echo $order->id; ?>").slideToggle("slow");
                    var src=$("#img<?php echo $order->id; ?>").attr('src');
                    if(src.indexOf('plus.png')!=-1)$("#img<?php echo $order->id; ?>").attr('src','<?php echo base_url() ?>assets/frontend/images/minus.png');
                    else $("#img<?php echo $order->id; ?>").attr('src','<?php echo base_url() ?>assets/frontend/images/plus.png');
                });
            });
        </script>
        <div>

            <table class="order-table" cellpadding="5" cellspacing="0" width="100%">
                <tr>
                    <td>
                        <div style="cursor: pointer" id="expand<?php echo $order->id; ?>">
                            <img id="img<?php echo $order->id; ?>" src="<?php echo base_url() ?>assets/frontend/images/plus.png" />
                        </div>
                    </td>
                    <td>
                        <?php echo $order->order_date; ?>
                    </td>
                    <td>
                        <?php if($order->status=='WAITING'):?>
                        <a class="current" href="<?php echo base_url().$this->lang->lang().'/payment/cancelorder/'.$order->id ?>" style="text-decoration:underline;cursor: pointer"> <?php echo $order->status; ?></a>
                        <?php else :?>
                        <?php echo $order->status; ?>
                        <?php endif;?>
                    </td>

                    <td>
                        <a href=""><?= lang('ordersummery.editaddress'); ?></a> 
                    </td>
                </tr>
            </table>
            <div id="cart" class="table id<?php echo $order->id; ?>">
                <table cellpadding="5" cellspacing="0" width="100%">
                    <tbody><tr>
                            <th><?= lang('cartView.item') ?></th>
                            <th><?= lang('cartView.Quantity') ?></th>
                            <th><?= lang('cartView.Option') ?></th>
                            <th><?= lang('cartView.Price') ?></th>

                        </tr>
                        <?php
                        $orderItemModel = new OrderItems();
                        $orderitems = $orderItemModel->where('order_id', $order->id)->get();
                        $total = 0;
                        foreach ($orderitems as $orderitem):
                            $orderitem->tshirt->get();
                            $tshirt = $orderitem->tshirt;
                            $tshirt->file->get();
                            $file = $tshirt->file;
                            $orderitem->size->get();
                            $orderitem->sex->get();
                            if ($orderitem->sex->id == 1) {
                                $sexName = "man";
                            } else {
                                $sexName = "woman";
                            }
                            $orderitem->color->get();
                            ?>
                            <tr>
                                <td><img width="50" src="<?php echo base_url() . $file->path . 'w-' . $sexName . '-' . $orderitem->color->color . '-' . $file->name; ?>"></td>
                                <td><?php echo $orderitem->quantity; ?></td>
                                <td>
                                    <?php echo $orderitem->size->name . '<br>' . $orderitem->sex->sex . '<br>' . $orderitem->color->color; ?><br>                                                </td>
                                <td><?php
                            $sub = intval($orderitem->price * $orderitem->quantity);
                            $total+=$sub;
                            echo $sub;
                                    ?> <?= lang('home.le') ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <tr class="total">
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td><?= lang('cartView.Total') ?> : </td>
                            <td><?php echo $total; ?> <?= lang('home.le') ?></td>
                            <td>&nbsp;</td>
                        </tr>

                    </tbody></table>

                <div class="clear"></div>

            </div>
        <?php endforeach; ?>
    </div>

</div>