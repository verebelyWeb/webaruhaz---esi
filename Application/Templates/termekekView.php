<form action="index.php?c=termekek" class="select" method="POST"> 
    <select name="category" id="">
        <?php foreach ($categories as $category) :?>
            <option value="<?=$category['id']?>"><?= $category['megnevezes'] ?></option>
        <?php endforeach ?>
    </select>
    <input type="submit" value="Küld">
</form>
<table class="table">
    <tr>
        <th>Kategória</th>
        <th>Termék</th>
        <th>Feszültség</th>
        <th>Teljesítmény</th>
        <th>Foglalat</th>
        <th>Élettartam</th>
        <th>Ár</th>   
        <th>Rendelések</th>     
        <th>Módosít</th>     
    </tr>
    <?php foreach($termekek as $termek): ?>
        <tr>
            <td><?= $termek['kategoria'] ?></td>
            <td><?= $termek['termek'] ?></td>
            <td><?= $termek['feszultseg'] ?></td>
            <td><?= $termek['teljesitmeny'] ?></td>
            <td><?= $termek['foglalat'] ?></td>
            <td><?= $termek['elettartam'] ?></td>
            <td><?= $termek['ar'] ?></td>
            <td>
                <a href="index.php?c=orders&termekId=<?= $termek['id'] ?>" class="btn btn-rng">Lekér</a>
            </td>
            <td>
                <a href="index.php?c=modyfyTermek&termekId=<?= $termek['id'] ?>" class="btn btn-grn">Módosítás</a>
            </td>
        </tr>
    <?php endforeach ?>
</table>