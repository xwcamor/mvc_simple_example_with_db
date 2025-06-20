<?php
class Controller {
    public function view($view, $data = []) {
        extract($data);
        $content_view = "../views/{$view}.php";
        include "../views/layout/main.php";
    }
}
