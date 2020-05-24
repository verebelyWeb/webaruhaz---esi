<form action="index.php?c=newOrder" method="POST">
    <fieldset class="form">
        <legend>Új rendelés felvétele</legend>
        <select name="termekId" id="">
            <?php foreach($products as $product): ?>
                <option value="<?=$product['id']?>"><?=$product['termek']?></option>
            <?php endforeach ?>
        </select>
        <br>
        <br>
        <label for="">Darabszám</label>
        <input type="number" min="1" step="1" value="1" name="count">
        <br>
        <br>
        <input type="submit" value="Megrendel" class="btn btn-grn" >
    </fieldset>
</form>