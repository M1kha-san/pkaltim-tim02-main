<?php
// Kategori Model - Mock Data Version


class Kategori {
    
    private static function getMockData() {
        return [
            ['id' => 1, 'nama' => 'Hutan', 'slug' => 'hutan', 'deskripsi' => 'Wisata hutan tropis dan konservasi', 'icon' => 'fa-tree', 'jumlah_destinasi' => 2],
            ['id' => 2, 'nama' => 'Pantai', 'slug' => 'pantai', 'deskripsi' => 'Pesona pantai dan laut Kalimantan Timur', 'icon' => 'fa-umbrella-beach', 'jumlah_destinasi' => 2],
            ['id' => 3, 'nama' => 'Sungai', 'slug' => 'sungai', 'deskripsi' => 'Keindahan sungai dan wisata air', 'icon' => 'fa-water', 'jumlah_destinasi' => 0],
            ['id' => 4, 'nama' => 'Danau', 'slug' => 'danau', 'deskripsi' => 'Danau dan telaga alami', 'icon' => 'fa-water', 'jumlah_destinasi' => 1],
            ['id' => 5, 'nama' => 'Gunung', 'slug' => 'gunung', 'deskripsi' => 'Pendakian dan wisata pegunungan', 'icon' => 'fa-mountain', 'jumlah_destinasi' => 0],
            ['id' => 6, 'nama' => 'Air Terjun', 'slug' => 'air-terjun', 'deskripsi' => 'Keindahan air terjun alami', 'icon' => 'fa-water', 'jumlah_destinasi' => 1],
        ];
    }
    
    public function getAllWithCount() {
        return self::getMockData();
    }
    
    public function findAll($limit = null, $offset = 0) {
        $data = self::getMockData();
        if ($limit) {
            return array_slice($data, $offset, $limit);
        }
        return $data;
    }
    
    public function count() {
        return count(self::getMockData());
    }
}
