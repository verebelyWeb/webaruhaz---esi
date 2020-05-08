<table class="table">
    <tr>
        <th>Azonosító</th>
        <th>Dátum</th>        
        <th>Darabszám</th> 
        <th>Töröl</th>        
    </tr>
    <?php foreach($orders as $order): ?>
        <tr>
            <td><?= $order['id'] ?></td>
            <td><?= $order['datum'] ?></td>
            <td><?= $order['db'] ?></td>                      
            <td>
                <a href="index.php?c=deleteOrder&orderId=<?= $order['id'] ?>" class="btn btn-rd">Törlés</a>
            </td>           
        </tr>
    <?php endforeach ?>
</table>