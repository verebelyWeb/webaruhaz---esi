<div class="form">
    Kérem válasszon kategóriát az alábbiak közül!
    <form action="index.php?c=newOrderForm" class="select" method="POST"> 
        <select name="categoryId" id="">
            <?php foreach ($categories as $category) :?>
                <option value="<?=$category['id']?>"><?= $category['megnevezes'] ?></option>
            <?php endforeach ?>
        </select>
        <input type="submit" value="Küld">
    </form>
</div>
