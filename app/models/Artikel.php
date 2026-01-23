<?php
/**
 * Artikel Model - Mock Data Version
 */

class Artikel {
    
    private static function getMockData() {
        return [
            [
                'id' => 1,
                'judul' => 'Panduan Lengkap Berkunjung ke Kalimantan Timur',
                'slug' => 'panduan-lengkap-berkunjung-kaltim',
                'konten' => 'Kalimantan Timur menawarkan keindahan alam yang luar biasa. Dari hutan tropis hingga pantai yang eksotis, semuanya menunggu untuk dijelajahi...',
                'excerpt' => 'Panduan lengkap untuk wisatawan yang ingin menjelajahi Kalimantan Timur',
                'foto_thumbnail' => 'artikel-panduan.jpg',
                'kategori_artikel' => 'Panduan Wisata',
                'view_count' => 1234,
                'is_published' => true,
                'published_at' => '2026-01-15 10:00:00',
                'created_at' => '2026-01-15 10:00:00'
            ],
            [
                'id' => 2,
                'judul' => 'Musim Terbaik Mengunjungi Wisata Alam Kaltim',
                'slug' => 'musim-terbaik-wisata-kaltim',
                'konten' => 'Kalimantan Timur memiliki iklim tropis dengan dua musim utama. Musim terbaik untuk berkunjung adalah antara bulan April hingga Oktober...',
                'excerpt' => 'Kapan waktu terbaik untuk berlibur ke Kalimantan Timur?',
                'foto_thumbnail' => 'artikel-musim.jpg',
                'kategori_artikel' => 'Tips Perjalanan',
                'view_count' => 987,
                'is_published' => true,
                'published_at' => '2026-01-10 14:30:00',
                'created_at' => '2026-01-10 14:30:00'
            ],
            [
                'id' => 3,
                'judul' => '10 Kuliner Khas yang Wajib Dicoba di Kaltim',
                'slug' => '10-kuliner-khas-kaltim',
                'konten' => 'Selain keindahan alamnya, Kalimantan Timur juga kaya dengan kuliner khas yang menggugah selera. Dari amplang, ikan patin, hingga nasi bekepor...',
                'excerpt' => 'Jelajahi kelezatan kuliner tradisional Kalimantan Timur',
                'foto_thumbnail' => 'artikel-kuliner.jpg',
                'kategori_artikel' => 'Kuliner',
                'view_count' => 2156,
                'is_published' => true,
                'published_at' => '2026-01-05 09:00:00',
                'created_at' => '2026-01-05 09:00:00'
            ]
        ];
    }
    
    public function getPublished($limit = 6) {
        $data = self::getMockData();
        $published = array_filter($data, function($item) {
            return $item['is_published'] === true;
        });
        return array_slice($published, 0, $limit);
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
    
    public function incrementViewCount($id) {
        // Mock - no action needed
        return true;
    }
}
