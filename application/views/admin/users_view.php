<?php $this->load->view('admin/home_view'); ?>
<style>
    td{
        padding: 5px;
        text-align: center;
        min-width: 25px;

    }
    th{
        min-width: 25px;
    }
</style>
<div style="margin-top: 20px;">
    <table style="padding: 2px;">
        <thead>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Last Login</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) { ?>
                <tr>
                    <td></td>
                    <td><?php echo $user->name; ?></td>
                    <td><?php echo $user->email; ?></td>
                    <td><?php echo $user->phone; ?></td>
                    <td><?php echo $user->last_login; ?></td>
                    <td><a style="color: white" href="usermenus/<?php echo $user->id; ?>"> created menus </a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>