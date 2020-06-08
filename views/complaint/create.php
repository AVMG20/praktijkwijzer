<form action="complaint@store" method="post">
    <div class="card-box">

        <h2>Klachten formulier</h2>
        <hr>

        <div class="form-group mb-3">
            <label for="name">Voornaam</label>
            <input type="text" name="firstname" value="<?php echo \Classes\Old::getOld('firstname') ?>" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label for="achternaam">Achternaam</label>
            <input type="text" name="lastname" value="<?php echo \Classes\Old::getOld('lastname') ?>" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" value="<?php echo \Classes\Old::getOld('email') ?>" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label for="subject">Onderwerp</label>
            <input type="text" name="subject" value="<?php echo \Classes\Old::getOld('subject') ?>" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label for="name">Prioriteit</label>

            <select name="priority_id" value="<?php echo \Classes\Old::getOld('priority_id') ?>" class="form-control">
                <?php foreach ($data as $prior) {
                    ?> <option value="<?=$prior->id?>"><?=$prior->name?></option> <?php
                }?>
            </select>
        </div> 

        <div class="form-group mb-3">
            <label for="klacht">klacht</label>
            <textarea rows="8" type="text" name="complaint" value="<?php echo \Classes\Old::getOld('complaint') ?>" class="form-control"></textarea>
        </div>


        <div class="form-group">
            <div class="text-right">
                <button type="submit" class="btn btn-primary">Store</button>
            </div>
        </div>

    </div>
</form>