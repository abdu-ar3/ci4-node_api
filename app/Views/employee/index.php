<?php include(APPPATH . 'Views/includes/navbar.php'); ?>
<h1>Manajemen Pegawai</h1>
<a href="/employees/create" class="btn btn-primary mb-3">Tambah Pegawai</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Photo</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($employees as $employee): ?>
            <tr>
                <td><?= $employee['id'] ?></td>
                <td><?= $employee['name'] ?></td>
                <td><?= $employee['email'] ?></td>
                <td>
                    <?php if ($employee['photo']): ?>
                        <img src="<?= base_url('uploads/' . $employee['photo']) ?>" alt="Photo" width="50">
                    <?php endif; ?>
                </td>
                <td>
                    <a href="/employees/edit/<?= $employee['id'] ?>" class="btn btn-warning">Edit</a>
                    <a href="/employees/delete/<?= $employee['id'] ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php include(APPPATH . 'Views/includes/footer.php'); ?>
