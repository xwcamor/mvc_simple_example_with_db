<h3>Usuarios</h3>
<table id="userTable" class="table table-bordered table-dark table-striped">
    <thead>
        <tr><th>ID</th><th>Nombre</th><th>Email</th><th>Acciones</th></tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
            <tr data-id="<?= $user['id'] ?>">
                <td><?= $user['id'] ?></td>
                <td contenteditable="true" data-column="name"><?= $user['name'] ?></td>
                <td contenteditable="true" data-column="email"><?= $user['email'] ?></td>
                <td><button class="btn btn-danger btn-sm delete-btn">Eliminar</button></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<button class="btn btn-success" id="addUser">Nuevo</button>
