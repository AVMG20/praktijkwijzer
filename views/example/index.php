<h2>Example Products</h2>
<div class="text-right mb-2">
    <a class="btn btn-primary" href="<?php echo \Classes\Redirect::route('example-create')?>"><span
            class="btn-label"><i class="fe-plus"></i></span>Create</a>
</div>


<table class="table table-light table-striped" id="ExampleTable">
    <thead class="bg-soft-dark">
    <tr>
        <th>id</th>
        <th>name</th>
        <th>amount</th>
        <th>price</th>
        <th>options</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $product) {
        ?>
        <tr>
            <td><?php echo $product->id?></td>
            <td><?php echo $product->name?></td>
            <td><?php echo $product->amount?></td>
            <td>€<?php echo $product->price?></td>
            <td width="100">
                <a href="<?php echo \Classes\Redirect::route("example-edit?id={$product->id}")?>" class="btn btn-xs btn-info"><i class="fe-edit-1"></i></a>
                <a href="<?php echo \Classes\Redirect::route("example@destroy?id={$product->id}")?>"  class="btn btn-xs btn-danger"><i class="fe-trash"></i></a>
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