$(document).ready(function () {
    $('#userTable').DataTable();

    $('[contenteditable]').on('blur', function () {
        let td = $(this);
        let id = td.closest('tr').data('id');
        let column = td.data('column');
        let value = td.text();

        $.post('?url=UserController/update', { id, column, value });
    });

    $('.delete-btn').click(function () {
        let row = $(this).closest('tr');
        let id = row.data('id');

        Swal.fire({
            title: '¿Estás seguro?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sí, eliminar'
        }).then(result => {
            if (result.isConfirmed) {
                $.post(`?url=UserController/delete/${id}`, () => {
                    row.remove();
                    Swal.fire('Eliminado!', '', 'success');
                });
            }
        });
    });

    $('#addUser').click(function () {
        $.post('?url=UserController/create', { name: 'Nuevo', email: 'nuevo@correo.com' }, () => {
            location.reload();
        });
    });
});


$(document).ready(function () {
    $('#userTable, #studentTable').DataTable();

    // Edición en línea (text, select, date)
    $('body').on('blur change', '[contenteditable], select[data-column], input[data-column]', function () {
        const el = $(this);
        const tr = el.closest('tr');
        const id = tr.data('id');
        const column = el.data('column');
        const value = el.is('[contenteditable]') ? el.text().trim() : el.val();
        const isStudent = tr.closest('table').attr('id') === 'studentTable';
        const url = isStudent ? '?url=StudentController/update' : '?url=UserController/update';

        $.post(url, { id, column, value });
    });

    // Eliminar estudiante
    $('body').on('click', '.delete-student-btn', function () {
        const row = $(this).closest('tr');
        const id = row.data('id');

        Swal.fire({
            title: '¿Eliminar estudiante?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sí, eliminar'
        }).then(result => {
            if (result.isConfirmed) {
                $.post(`?url=StudentController/delete/${id}`, () => {
                    row.remove();
                    Swal.fire('Eliminado', '', 'success');
                });
            }
        });
    });

    // Eliminar usuario
    $('body').on('click', '.delete-btn', function () {
        const row = $(this).closest('tr');
        const id = row.data('id');

        Swal.fire({
            title: '¿Eliminar usuario?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sí, eliminar'
        }).then(result => {
            if (result.isConfirmed) {
                $.post(`?url=UserController/delete/${id}`, () => {
                    row.remove();
                    Swal.fire('Eliminado', '', 'success');
                });
            }
        });
    });

    // Crear nuevo estudiante
    $('#addStudent').click(function () {
        $.post('?url=StudentController/create', () => {
            location.reload();
        });
    });

    // Crear nuevo usuario
    $('#addUser').click(function () {
        $.post('?url=UserController/create', () => {
            location.reload();
        });
    });
});
