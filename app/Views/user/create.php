<?php include(APPPATH . 'Views/includes/navbar.php'); ?>
<h1>Tambah User</h1>
<form action="/users/store" method="post">
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
<?php include(APPPATH . 'Views/includes/footer.php'); ?>
