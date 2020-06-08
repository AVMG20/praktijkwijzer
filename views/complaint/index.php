<h2>Complaints</h2>
<div class="text-right mb-2">
    <a class="btn btn-primary" href="<?php echo \Classes\Redirect::route('complaint-create')?>"><span
            class="btn-label"><i class="fe-plus"></i></span>Create</a>
</div>


<table class="table table-light table-striped" id="ExampleTable">
    <thead class="bg-soft-dark">
    <tr>
        <th>id</th>
        <th>name</th>
        <th>email</th>
        <th>priority</th>
        <th>subject</th>
        <th>updatedAt</th>
        <th>solved</th>
        <th>actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $complaint) {
        ?>
        <tr>
            <td><?php echo $complaint->id?></td>
            <td><?php echo $complaint->firstname . $complaint->lastname?></td>
            <td><?php echo $complaint->email?></td>
            <td><?php echo $complaint->priority_id?></td>
            <td><?php echo $complaint->subject?></td>
            <td><?php echo $complaint->updatedAt?></td>
            <td><?php echo (boolval($complaint->solved) ? 'true' : 'false')?></td>
            <td width="100">
                <a href="<?php echo \Classes\Redirect::route("complaint-edit?id={$complaint->id}")?>" class="btn btn-xs btn-info"><i class="fe-edit-1"></i></a>
                <a href="<?php echo \Classes\Redirect::route("complaint@destroy?id={$complaint->id}")?>"  class="btn btn-xs btn-danger"><i class="fe-trash"></i></a>
            </td>
        </tr>
    <?php
    } ?>
    </tbody>
</table>

<script>
    $(document).ready(() =>{
        $('#ExampleTable').dataTable();
    });
</script>