<?php include(APPPATH . 'Views/includes/navbar.php'); ?>
<h1>Manajemen User</h1>
<a href="/users/create" class="btn btn-primary mb-3">Tambah User</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= $user['username'] ?></td>
                <td>
                    <a href="/users/edit/<?= $user['id'] ?>" class="btn btn-warning">Edit</a>
                    <a href="/users/delete/<?= $user['id'] ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php include(APPPATH . 'Views/includes/footer.php'); ?>
