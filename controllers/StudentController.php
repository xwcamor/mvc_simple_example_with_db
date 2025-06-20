<?php
require_once '../models/Student.php';
require_once '../models/Country.php';
require_once '../models/District.php';
require_once '../models/Carrer.php';

class StudentController extends Controller {
    
    public function index() {
        $student = new Student();
        $country = new Country();
        $district = new District();
        $carrer = new Carrer();

        $data = [
            'students' => $student->getAll(),
            'countries' => $country->getAll(),
            'district' => $district->getAll(),
            'carrer' => $carrer->getAll()
        ];

        $this->view('students/index', $data);
    }

    public function create() {
        $student = new Student();
        $student->create([
            'name' => 'Nuevo',
            'lastname' => 'Estudiante',
            'sex' => 'M',
            'date_born' => date('2000-01-01'),
            'country_id' => 1,
            'district_id' => 1,
            'carrer_id' => 1
        ]);
    }

    public function delete($id) {
        $student = new Student();
        $student->delete($id);
    }

    public function update() {
        $student = new Student();
        $student->update($_POST['id'], $_POST['column'], $_POST['value']);
    }
}
