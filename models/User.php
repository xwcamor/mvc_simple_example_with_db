<?php
class User extends Model {
    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM users");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($name, $email) {
        $stmt = $this->db->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
        return $stmt->execute([$name, $email]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM users WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function update($id, $column, $value) {
        $stmt = $this->db->prepare("UPDATE users SET `$column` = ? WHERE id = ?");
        return $stmt->execute([$value, $id]);
    }
}
