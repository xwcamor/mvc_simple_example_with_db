


<h3>Estudiantes</h3>

<table id="studentTable" class="table table-bordered table-dark table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Sexo</th>
            <th>Fecha de Nacimiento</th>
            <th>País</th>
            <th>Distrito</th>
            <th>Carrera</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($students as $student): ?>
            <tr data-id="<?= $student['id'] ?>">
                <td><?= $student['id'] ?></td>
                <td contenteditable="true" data-column="name"><?= $student['name'] ?></td>
                <td contenteditable="true" data-column="lastname"><?= $student['lastname'] ?></td>
                <td>
                    <select class="form-select form-select-sm sex-select" data-column="sex">
                        <option value="M" <?= $student['sex'] === 'M' ? 'selected' : '' ?>>M</option>
                        <option value="F" <?= $student['sex'] === 'F' ? 'selected' : '' ?>>F</option>
                    </select>
                </td>
                <td><input type="date" class="form-control form-control-sm born-date" data-column="date_born" value="<?= $student['date_born'] ?>"></td>
                <td>
                    <select class="form-select form-select-sm country-select" data-column="country_id">
                        <?php foreach ($countries as $country): ?>
                            <option value="<?= $country['id'] ?>" <?= $student['country_id'] == $country['id'] ? 'selected' : '' ?>>
                                <?= $country['name'] ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </td>
                <td>
                    <select class="form-select form-select-sm district-select" data-column="district_id">
                        <?php foreach ($district as $d): ?>
                             <option value="<?= $d['id'] ?>" <?= $student['district_id'] == $d['id'] ? 'selected' : '' ?>>
                                 <?= htmlspecialchars($d['name']) ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </td>
                <td>
                <select class="form-select form-select-sm carrer-select" data-column="carrer_id">
                        <?php foreach ($carrer as $c): ?>
                            <option value="<?= $c['id'] ?>" <?= $student['carrer_id'] == $c['id'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($c['name']) ?>
                            </option>
                        <?php endforeach; ?>
                </select>

                </td>
                <td><button class="btn btn-danger btn-sm delete-student-btn">Eliminar</button></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<button class="btn btn-success" id="addStudent">Nuevo</button>
