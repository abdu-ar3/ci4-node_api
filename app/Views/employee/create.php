<?php include(APPPATH . 'Views/includes/navbar.php'); ?>
<h1>Edit Pegawai</h1>
<form action="/employees/update/<?= $employee['id'] ?>" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="name" class="form-label">Nama</label>
        <input type="text" class="form-control" id="name" name="name" value="<?= $employee['name'] ?>" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="<?= $employee['email'] ?>" required>
    </div>
    <div class="mb-3">
        <label for="photo" class="form-label">Foto (Kosongkan jika tidak ingin mengubah)</label>
        <input type="file" class="form-control" id="photo" name="photo" accept="image/jpeg,image/jpg">
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
<?php include(APPPATH . 'Views/includes/footer.php'); ?>
