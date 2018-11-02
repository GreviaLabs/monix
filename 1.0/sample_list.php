<?php 
require_once('core/core.php');

$q = 'SELECT * FROM grv_member LIMIT 20 ';
$db = new db;
$db->query($q);
$listdata = $db->resultAll();
debug($listdata);
?>

<table>
    <tr>
        <td>#</td>
        <td>Nama</td>
        <td>tgl join</td>
        <td>Opsi</td>
    </tr>
    <?php
    if (! empty($listdata)) 
    {
        foreach ($listdata as $key => $data)
        {
        ?>
    <tr>   
        <td><?php echo ($key+1) ?></td>
        <td><?php echo $data['name']?></td>
        <td><?php echo $data['full_name']?></td>
        <td></td>
    </tr>
    <?php
        }
       
    }
    else
    {
        ?>
    <tr>
        <td colspan="100%">Nodata</td>
    </tr>        
        <?php
    }
    ?>
</table>