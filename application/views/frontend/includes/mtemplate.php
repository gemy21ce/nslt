<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<table border="1">
    <thead>
        <tr>
            <th>name</th>
            <th></th>
            <th>email</th>
            <th>message</th>
        </tr>
    </thead>
    <tbody>
        <? foreach ($ds as $d) { ?>
            <tr>
                <td><input type="checkbox"/></td>
                <td class="message"><?= $d['email'] ?></td>
                <td><?= $d['name'] ?></td>
                <td class="message"><?= $d['message'] ?></td>
            </tr>
        <? } ?>
    </tbody>
</table>
<script type="text/javascript">
    $(function(){
        $('input[type="checkbox"]').change(function(){
            if(this.checked){
                $(this).parent('td').parent('tr').css('background-color','gray');
            }else{
                $(this).parent('td').parent('tr').css('background-color','white');
            }
        });
    })
</script>