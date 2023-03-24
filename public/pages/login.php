<section class="section login container-fluid">
    <div class="row">
        <div class="col-4"></div>
        <div class="card text-center col-4">
            <div class="card-header">
                <h4 class="card-title">Password</h4>
            </div>

            <form action="services/auth/login.php" method="POST">
                <div class="card-body">
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Enter password">
                    </div>
                </div>
            </form>
        </div>
        <div class="col-4"></div>
    </div>
</section>