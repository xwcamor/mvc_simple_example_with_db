<?php
class Student extends Model {
    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM students");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $stmt = $this->db->prepare("
            INSERT INTO students (name, lastname, sex, date_born, country_id, district_id, carrer_id)
            VALUES (:name, :lastname, :sex, :date_born, :country_id, :district_id, :carrer_id)
        ");
        return $stmt->execute([
            ':name' => $data['name'],
            ':lastname' => $data['lastname'],
            ':sex' => $data['sex'],
            ':date_born' => $data['date_born'],
            ':country_id' => $data['country_id'],
            ':district_id' => $data['district_id'],
            ':carrer_id' => $data['carrer_id']
        ]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM students WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function update($id, $column, $value) {
        $allowed = ['name', 'lastname', 'sex', 'date_born', 'country_id', 'district_id', 'carrer_id'];
        if (!in_array($column, $allowed)) return false;

        $stmt = $this->db->prepare("UPDATE students SET `$column` = ? WHERE id = ?");
        return $stmt->execute([$value, $id]);
    }
}
