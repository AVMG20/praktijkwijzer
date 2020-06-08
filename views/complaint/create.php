<form action="example@store" method="post">
    <div class="card-box">

        <div class="form-group mb-3">
            <label for="name">name</label>
            <input type="text" name="name" value="<?php echo \Classes\Old::getOld('name') ?>" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label for="achternaam">achternaam</label>
            <input type="text" name="achternaam" value="<?php echo \Classes\Old::getOld('achternaam') ?>" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label for="email">email</label>
            <input type="email" name="email" value="<?php echo \Classes\Old::getOld('email') ?>" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label for="onderwerp">name</label>
            <input type="text" name="onderwerp" value="<?php echo \Classes\Old::getOld('onderwerp') ?>" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label for="name">prioriteit</label>
            <input type="select" name="prioriteit" value="<?php echo \Classes\Old::getOld('prioriteit') ?>" class="form-control">
        </div> 

        <div class="form-group mb-3">
            <label for="klacht">klacht</label>
            <input type="text" name="klacht" value="<?php echo \Classes\Old::getOld('klacht') ?>" class="form-control">
        </div>


       

        <div class="form-group">
            <div class="text-right">
                <button type="submit" class="btn btn-primary">Store</button>
            </div>
        </div>

    </div>
</form>