<form action="example@update" method="post">
    <div class="card-box">

        <input type="text" hidden name="id" value="<?php echo $data["id"]; ?>">

        <div class="form-group mb-3">
            <label for="name">name</label>
            <input type="text" name="name" value="<?php echo $data["product"]->name; ?>" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label for="name">amount</label>
            <input type="number" min="0" max="99999999" name="amount" value="<?php echo  $data["product"]->amount; ?>" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label for="name">price</label>
            <input type="text" name="price" value="<?php echo $data["product"]->price; ?>" class="form-control">
        </div>

        <div class="form-group">
            <div class="text-right">
                <button type="submit" class="btn btn-primary">Store</button>
            </div>
        </div>

    </div>
</form>