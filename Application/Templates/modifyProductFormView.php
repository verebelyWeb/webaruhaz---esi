<form action="index.php?c=modifyTermek" method="POST">
    <fieldset class="form">
        <legend>Kiválasztott termék módosítása</legend>
            <label for="">Megnevezés</label>
            <input type="text" name="megnevezes" value="<?= $product['megnevezes'] ?>">

            <label for="">Feszültség (V)</label>
            <input type="text" name="feszultseg" value="<?= $product['feszultseg'] ?>">

            <label for="">Teljesítmény (mA)</label>
            <input type="text" name="teljesitmeny" value="<?= $product['teljesitmeny'] ?>">

            <label for="">Foglalat</label>
            <input type="text" name="foglalat" value="<?= $product['foglalat'] ?>">

            <label for="">Élettartam (H)</label>
            <input type="text" name="elettartam" value="<?= $product['elettartam'] ?>">

            <label for="">Ár (ft)</label>
            <input type="text" name="ar" value="<?= $product['ar'] ?>">

            <input type="hidden" name="id" value="<?= $product['id'] ?>">
            <br>
            <input type="submit" value="Küld" class="btn btn-rng">
    </fieldset>
</form>