<form action="example@store" method="post">
    <div class="card-box">

        <div class="form-group mb-3">
            <label for="name">name</label>
            <input type="text" name="name" value="<?php echo \Classes\Old::getOld('name') ?>" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label for="name">amount</label>
            <input type="number" min="0" max="99999999" name="amount" value="<?php echo \Classes\Old::getOld('amount') ?>" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label for="name">price</label>
            <input type="text" name="price" value="<?php echo \Classes\Old::getOld('price') ?>" class="form-control">
        </div>

        <div class="form-group">
            <div class="text-right">
                <button type="submit" class="btn btn-primary">Store</button>
            </div>
        </div>

    </div>
</form>