<div class="row">
    <div class="col-8 offset-1 py-4">
    <!-- <form class="form create-form" action="/customer" method="POST"> -->
        
    <?= $this->Form->create(null,['url' => '/customer/save', 'type' => 'file', 'class' => 'form-horizontal','method'=>'POST']); ?>
        <input type="hidden" name="objectId" value="<?= isset($customer)?$customer->_id:''?>">
        <div class="card">
            <div class="card-header"><h3 class="text-center">Create a new Customer Information</h3></div>
            <div class="card-body">
                    <div class="mb-3">
                        <label for="customer-name" class="form-label">Customer Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" id="customer-name" value="<?= isset($customer)?$customer->name:'';?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="customer-phone" class="form-label">Phone No.</label>
                        <input type="text" name="phone" class="form-control" id="customer-phone" value="<?= isset($customer)?$customer->phone:'';?>">
                    </div>
                    <div class="mb-3">
                        <label for="customer-email" class="form-label">Email address <span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control" id="customer-email" aria-describedby="emailHelp" required value="<?= isset($customer)?$customer->email:'';?>"> 
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="customer-address" class="form-label">Customer Address <span class="text-danger">*</span></label>
                        <textarea name="addresss" id="customer-address" cols="30" rows="3" class="form-control" required>
                            <?= isset($customer)?$customer->name:'';?>
                        </textarea>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
            </div>
            <div class="card-footer">
                <div class="text-center">
                        <a href="/customer" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
        <?= $this->Form->end() ?>
    <!-- </form> -->
    </div>
</div>