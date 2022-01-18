<h2 class="text-center">Dashboard</h2>

<hr>
<h3 class="text-center  py-2">Database List</h3>
<div class="row">
    <?php foreach ($dbs as $key => $db) :?>
    <div class="col-lg-3 col-6 py-3">
        <div class="rounded bg-danger text-center p-3">
            <h3 class="text-center"><strong class="py-3"><?= $db['name']?></strong></h3>
        </div>
    </div>
    <?php endforeach;?>
</div>