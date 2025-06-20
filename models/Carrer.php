<?php
class Carrer extends Model {
    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM carrers ORDER BY name ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
