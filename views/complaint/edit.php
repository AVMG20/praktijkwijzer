<form action="complaint@update" method="post">
    <div class="card-box">

        <h2>Klachten formulier</h2>
        <hr>

        <div class="form-group mb-3 d-none">
            <label for="id">id</label>
            <input type="text" name="id" value="<?php echo $data['id'] ?>" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label for="name">Voornaam</label>
            <input type="text" name="firstname" value="<?php echo $data['complaint']->firstname ?>" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label for="achternaam">Achternaam</label>
            <input type="text" name="lastname" value="<?php echo $data['complaint']->lastname ?>" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" value="<?php echo $data['complaint']->email ?>" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label for="subject">Onderwerp</label>
            <input type="text" name="subject" value="<?php echo $data['complaint']->subject ?>" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label for="name">Prioriteit</label>

            <select name="priority_id" class="form-control">
                <?php foreach ($data['priorities'] as $prior) {
                    ?> <option <?php if($data['complaint']->priority_id == $prior->id ) echo "selected"; ?> value="<?=$prior->id?>"><?=$prior->name?></option> <?php
                }?>
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="klacht">klacht</label>
            <textarea rows="8" type="text" name="complaint" class="form-control"><?php echo $data['complaint']->complaint ?></textarea>
        </div>


        <div class="form-group">
            <div class="text-right">
                <button type="submit" class="btn btn-primary">Store</button>
            </div>
        </div>

    </div>
</form>