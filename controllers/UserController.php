<?php
require_once '../models/User.php';

class UserController extends Controller {
    public function index() {
        $user = new User();
        $data = $user->getAll();
        $this->view('users/index', ['users' => $data]);
    }

    public function create() {
        $user = new User();
        $user->create($_POST['name'], $_POST['email']);
    }

    public function delete($id) {
        $user = new User();
        $user->delete($id);
    }

    public function update() {
        $user = new User();
        $user->update($_POST['id'], $_POST['column'], $_POST['value']);
    }
}
