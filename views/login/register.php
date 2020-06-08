<div class="row">
    <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2">
        <div class="card shadow-sm">
            <div class="card-header">
                <h5>Register</h5>
            </div>
            <form method="post" action="register@store" class="card-body">
                <div class="form-group mb-3">
                    <label for="username">username:</label>
                    <input type="text" name="username" value="<?php echo \Classes\Old::getOld('username'); ?>"  class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="username">email:</label>
                    <input type="email" name="email" value="<?php echo \Classes\Old::getOld('email'); ?>" class="form-control">
                </div>
                <div class="form-group mb-4">
                    <label for="password">password:</label>
                    <input type="password" name="password" value="<?php echo \Classes\Old::getOld('password'); ?>" class="form-control">
                </div>
                <div class="form-group">
                    <button class="btn btn-success btn-block">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>