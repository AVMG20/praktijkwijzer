<div class="card-box p-0">
    <table class="table table-striped table-borderless table-light">
        <thead class="border-bottom">
        <tr>
            <th>Users</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($data as $value){
            ?>
            <tr>
                <td><?php echo $value->username; ?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>