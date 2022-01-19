<div class="row">
    <div class="col-12 h-100 text-center py-4">
        <h2 class="text-center d-inline-block">Customer Listing</h2>
        <a href="/customer/create" class="btn btn-success px-3 float-end">New</a>
        <table class="table table-responsive table-hover">
            <thead class="bg-dark text-white">
                <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($customers as $key => $customer):?>
                    <tr>
                        <td><?= $key+1?></td>
                        <td><?= $customer->_id?></td>
                        <td><?= $customer->name?></td>
                        <td><?= $customer->phone?></td>
                        <td><?= $customer->address?></td>
                        <td>
                            <a href="/customer/edit?_id=<?= $customer->_id?>" class="btn btn-sm btn-warning">Edit</a>
                            <?= $this->Form->create(null,['url' => "/customer/destory/$customer->_id",'class' => 'form-horizontal d-inline-block','id'=>'delete-customer','_method'=>'DELETE']); ?>
                            <button type="submit" id="btn-delete-customer" class="btn btn-sm btn-danger mx-2">Delete</button>
                            <?= $this->Form->end() ?>
                        </td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>