<form action="complaint@update" method="post">
    <div class="card-box">

        <h2>Klacht <?php echo $data['id'] ?></h2>
        <hr>

        <div class="form-group mb-3">
            <label for="id">id</label>
            <p><?php echo $data['id'] ?></p>
        </div>

        <div class="form-group mb-3">
            <label for="name">Voornaam</label>
            <p><?php echo $data['complaint']->firstname ?></p>
        </div>

        <div class="form-group mb-3">
            <label for="achternaam">Achternaam</label>
            <p><?php echo $data['complaint']->lastname ?></p>
        </div>

        <div class="form-group mb-3">
            <label for="email">Email</label>
            <p><?php echo $data['complaint']->email ?></p>
        </div>

        <div class="form-group mb-3">
            <label for="subject">Onderwerp</label>
            <p><?php echo $data['complaint']->subject ?></p>
        </div>

        <div class="form-group mb-3">
            <label for="name">Prioriteit</label>
            <?php foreach ($data['priorities'] as $prior) {
                ?> <?= $data['complaint']->priority_id == $prior->id ? "<p>" . $prior->name . "</p>": ''; ?><?php
            } ?>
        </div>

        <div class="form-group mb-3">
            <label for="klacht">klacht</label>
            <p><?php echo $data['complaint']->complaint ?></p>
        </div>


    </div>
</form>