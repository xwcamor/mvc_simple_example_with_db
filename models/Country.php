<?php
class Country extends Model {
    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM countries ORDER BY name ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
