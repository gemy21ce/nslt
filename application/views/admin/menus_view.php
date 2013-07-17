<?php $this->load->view('admin/home_view'); ?>
<div style="margin-top: 20px;">
    <table>
        <thead>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Email</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($menus as $menu) { ?>
            <tr>
                <td></td>
                <td><a style="color: white" href="<?php echo base_url().'en/admin/get/'. $menu->id; ?>"><?php echo $menu->name; ?></a></td>
                <td><?php echo $menu->email; ?></td>
                <td><?php echo $menu->quantity; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>