<?php
/**
 * Destinasi Model - Mock Data Version
 * Using static data array instead of database
 */

class Destinasi {
    
    // Mock data untuk destinasi
    private static function getMockData() {
        return [
            [
                'id' => 1,
                'nama' => 'Hutan Mangrove Kariangau',
                'slug' => 'hutan-mangrove-kariangau',
                'kategori_id' => 1,
                'kategori_nama' => 'Hutan',
                'kategori_icon' => 'fa-tree',
                'kabupaten_id' => 2,
                'kabupaten_nama' => 'Balikpapan',
                'deskripsi' => 'Hutan Mangrove Kariangau adalah kawasan konservasi mangrove yang terletak di Balikpapan. Tempat ini menawarkan pengalaman wisata edukasi dengan jembatan kayu sepanjang 1,2 km yang menembus hutan mangrove.',
                'sejarah' => 'Kawasan ini mulai dikembangkan sejak tahun 2010 sebagai upaya konservasi ekosistem pesisir dan menjadi destinasi wisata edukasi lingkungan.',
                'alamat' => 'Jl. Kariangau, Balikpapan Barat, Kota Balikpapan',
                'latitude' => -1.2137045987747082,
                'longitude' => 116.81029887496557,
                'harga_tiket' => 'Gratis',
                'jam_operasional' => '06:00 - 18:00 WITA',
                'foto_utama' => 'mangrove-kariangau.jpg',
                'is_featured' => true,
                'view_count' => 1245,
                'rating' => 4.7
            ],
            [
                'id' => 2,
                'nama' => 'Pantai Manggar Segara Sari',
                'slug' => 'pantai-manggar-segara-sari',
                'kategori_id' => 2,
                'kategori_nama' => 'Pantai',
                'kategori_icon' => 'fa-umbrella-beach',
                'kabupaten_id' => 2,
                'kabupaten_nama' => 'Balikpapan',
                'deskripsi' => 'Pantai Manggar atau yang dikenal dengan Segara Sari adalah pantai populer di Balikpapan dengan pasir putih dan ombak yang tenang. Cocok untuk berenang dan bersantai bersama keluarga.',
                'sejarah' => 'Pantai ini telah menjadi destinasi favorit warga Balikpapan sejak era 1980-an dan terus berkembang dengan berbagai fasilitas modern.',
                'alamat' => 'Manggar, Balikpapan Timur, Kota Balikpapan',
                'latitude' => -1.1234,
                'longitude' => 116.9876,
                'harga_tiket' => 'Rp 5.000 - Rp 10.000',
                'jam_operasional' => '24 Jam',
                'foto_utama' => 'Pantai-Manggar-Segarasari.jpg',
                'is_featured' => true,
                'view_count' => 2156,
                'rating' => 4.5
            ],
            [
                'id' => 3,
                'nama' => 'Pulau Beras Basah',
                'slug' => 'pulau-beras-basah',
                'kategori_id' => 2,
                'kategori_nama' => 'Pantai',
                'kategori_icon' => 'fa-water',
                'kabupaten_id' => 7,
                'kabupaten_nama' => 'Berau',
                'deskripsi' => 'Pulau Beras Basah di Bontang, Kalimantan Timur, adalah destinasi wisata pantai yang eksotis dengan keindahan alam bawah laut yang memukau. Terletak di tengah Laut Jawa, pulau ini menjadi surga bagi para pencinta alam',
                'sejarah' => 'Asal mula nama Beras Basah menurut cerita rakyat setempat berasal dari kata "beras" dan "basah". Dahulu kala, terdapat kapal milik kesultanan kutai yang sedang berlayar di Selat Makassar. Kapal tersebut membawa bahan pangan yang diantaranya adalah beras. Kapal tersebut tiba - tiba saja karam dan menumpahkan bawaannya. Karena perairan tempat kapal karam tersebut dangkal maka bawaan kapal tersebut yang sebagian besar adalah beras tidak tenggelam, melainkan muncul sebagian seperti gundukan. Lama - kelamaan gundukan beras tersebut berubah menjadi pulau berpasir putih seperti beras yang selalu basah karena dikelilingi oleh lautan.',
                'alamat' => 'Kabupaten Berau, Kalimantan Timur',
                'latitude' => 2.1234,
                'longitude' => 117.4567,
                'harga_tiket' => 'Gratis',
                'jam_operasional' => '24 Jam',
                'foto_utama' => 'Pulau-Beras-Basah.jpg',
                'is_featured' => true,
                'view_count' => 876,
                'rating' => 4.6
            ],
            [
                'id' => 4,
                'nama' => 'Taman Nasional Kutai',
                'slug' => 'taman-nasional-kutai',
                'kategori_id' => 1,
                'kategori_nama' => 'Hutan',
                'kategori_icon' => 'fa-tree',
                'kabupaten_id' => 5,
                'kabupaten_nama' => 'Kutai Timur',
                'deskripsi' => 'Taman Nasional Kutai adalah salah satu kawasan konservasi tertua di Indonesia dengan luas lebih dari 198.000 hektar. Habitat berbagai satwa langka seperti orangutan dan bekantan.',
                'sejarah' => 'Ditetapkan sebagai taman nasional pada tahun 1982, kawasan ini memiliki keanekaragaman hayati yang sangat tinggi.',
                'alamat' => 'Kabupaten Kutai Timur, Kalimantan Timur',
                'latitude' => 0.5678,
                'longitude' => 117.2345,
                'harga_tiket' => 'Rp 10.000 - Rp 50.000',
                'jam_operasional' => '07:00 - 17:00 WITA',
                'foto_utama' => 'taman-nasional-kutai.jpeg',
                'is_featured' => true,
                'view_count' => 3421,
                'rating' => 4.8
            ],
            [
                'id' => 5,
                'nama' => 'Labuan Cermin',
                'slug' => 'labuan-cermin',
                'kategori_id' => 4,
                'kategori_nama' => 'Danau',
                'kategori_icon' => 'fa-water',
                'kabupaten_id' => 4,
                'kabupaten_nama' => 'Berau',
                'deskripsi' => 'Labuan Cermin adalah salah satu destinasi wisata Kalimantan Timur terfavorit tepatnya berada di Berau. Air danaunya yang bening seperti cermin dan kondisi airnya yang sangat jernih membuat wisatawan penasaran karena keindahan alam yang memuaskan mata. Lokasi wisata danau alami ini berada di Desa Labuan Kelambu, Kecamatan Biduk-biduk, Kabupaten Berau, Kaltim.',
                'sejarah' => 'Pantai Amal telah menjadi ikon wisata Kutai Kartanegara sejak lama dan terus dikembangkan fasilitasnya.',
                'alamat' => 'Desa Labuan Kelambu, Kecamatan Biduk-biduk, Kabupaten Berau, Kalimantan Timur',
                'latitude' => -0.4123,
                'longitude' => 117.0234,
                'harga_tiket' => 'Rp. 10.000 per orang',
                'jam_operasional' => '24 Jam',
                'foto_utama' => 'Danau-Labuan-Cermin.jpg',
                'is_featured' => true,
                'view_count' => 1987,
                'rating' => 4.4
            ],
            [
                'id' => 6,
                'nama' => 'Air Terjun Tanah Merah',
                'slug' => 'air-terjun-tanah-merah',
                'kategori_id' => 6,
                'kategori_nama' => 'Air Terjun',
                'kategori_icon' => 'fa-water',
                'kabupaten_id' => 1,
                'kabupaten_nama' => 'Samarinda',
                'deskripsi' => 'Air terjun yang tersembunyi di tengah hutan dengan ketinggian sekitar 25 meter. Air yang jernih dan suasana yang sejuk membuat tempat ini sempurna untuk refreshing.',
                'sejarah' => 'Ditemukan oleh penduduk lokal dan kini menjadi destinasi favorit untuk pecinta alam.',
                'alamat' => 'Samarinda, Kalimantan Timur',
                'latitude' => -0.5012,
                'longitude' => 117.1534,
                'harga_tiket' => 'Rp 5.000',
                'jam_operasional' => '08:00 - 16:00 WITA',
                'foto_utama' => 'air-terjun-tanah-merah.jpg',
                'is_featured' => true,
                'view_count' => 1543,
                'rating' => 4.6
            ]
        ];
    }
    
    // Metode untuk mendapatkan data destinasi
    public function getFeatured($limit = 6) {
        $data = self::getMockData();
        $featured = array_filter($data, function($item) {
            return $item['is_featured'] === true;
        });
        return array_slice($featured, 0, $limit);
    }
    
    // Metode untuk mendapatkan destinasi berdasarkan ID dengan detail lengkap
    public function getWithDetails($id) {
        $data = self::getMockData();
        foreach ($data as $item) {
            if ($item['id'] == $id) {
                return $item;
            }
        }
        return null;
    }
    
    // Metode untuk mendapatkan destinasi berdasarkan kategori
    public function getByKategori($kategoriId, $limit = 12) {
        $data = self::getMockData();
        $filtered = array_filter($data, function($item) use ($kategoriId) {
            return $item['kategori_id'] == $kategoriId;
        });
        return array_slice($filtered, 0, $limit);
    }
    
    // Metode untuk mencari destinasi berdasarkan kata kunci searching 
    public function search($keyword, $limit = 12) {
        $data = self::getMockData();
        $keyword = strtolower($keyword);
        $results = array_filter($data, function($item) use ($keyword) {
            return stripos($item['nama'], $keyword) !== false || 
                   stripos($item['deskripsi'], $keyword) !== false;
        });
        return array_slice($results, 0, $limit);
    }
    
    // Metode untuk mendapatkan semua destinasi
    public function findAll($limit = null) {
        $data = self::getMockData();
        if ($limit) {
            return array_slice($data, 0, $limit);
        }
        return $data;
    }
    
    // Metode untuk menghitung total destinasi
    public function count() {
        return count(self::getMockData());
    }
    
    // Metode untuk menambah view count
    public function incrementViewCount($id) {
        // Mock - no action needed
        return true;
    }
    
    public function getFasilitas($destinasiId) {
        // Mock data fasilitas
        $fasilitas = [
            1 => [
                ['id' => 1, 'destinasi_id' => 1, 'nama' => 'Area Parkir', 'icon' => 'fa-parking', 'tersedia' => true],
                ['id' => 2, 'destinasi_id' => 1, 'nama' => 'Toilet', 'icon' => 'fa-restroom', 'tersedia' => true],
                ['id' => 3, 'destinasi_id' => 1, 'nama' => 'Mushola', 'icon' => 'fa-mosque', 'tersedia' => true],
                ['id' => 4, 'destinasi_id' => 1, 'nama' => 'Warung Makan', 'icon' => 'fa-utensils', 'tersedia' => true],
            ],
            2 => [
                ['id' => 5, 'destinasi_id' => 2, 'nama' => 'Area Parkir', 'icon' => 'fa-parking', 'tersedia' => true],
                ['id' => 6, 'destinasi_id' => 2, 'nama' => 'Toilet', 'icon' => 'fa-restroom', 'tersedia' => true],
                ['id' => 7, 'destinasi_id' => 2, 'nama' => 'Penginapan', 'icon' => 'fa-hotel', 'tersedia' => true],
                ['id' => 8, 'destinasi_id' => 2, 'nama' => 'Restoran', 'icon' => 'fa-utensils', 'tersedia' => true],
            ],
            4 => [
                ['id' => 9, 'destinasi_id' => 4, 'nama' => 'Pemandu Wisata', 'icon' => 'fa-user-tie', 'tersedia' => true],
                ['id' => 10, 'destinasi_id' => 4, 'nama' => 'Area Camping', 'icon' => 'fa-campground', 'tersedia' => true],
            ]
        ];
        
        return isset($fasilitas[$destinasiId]) ? $fasilitas[$destinasiId] : [];
    }
    
    public function getTips($destinasiId) {
        // Mock data tips
        $tips = [
            1 => [
                ['id' => 1, 'destinasi_id' => 1, 'judul' => 'Gunakan Alas Kaki yang Nyaman', 'konten' => 'Jembatan kayu cukup panjang, gunakan alas kaki yang nyaman untuk berjalan.', 'tipe' => 'tips', 'urutan' => 1],
                ['id' => 2, 'destinasi_id' => 1, 'judul' => 'Jangan Membuang Sampah Sembarangan', 'konten' => 'Jagalah kebersihan kawasan mangrove dengan tidak membuang sampah sembarangan.', 'tipe' => 'larangan', 'urutan' => 2],
            ],
            2 => [
                ['id' => 3, 'destinasi_id' => 2, 'judul' => 'Datang Saat Sore Hari', 'konten' => 'Pemandangan sunset di Pantai Manggar sangat indah, datanglah saat sore hari.', 'tipe' => 'tips', 'urutan' => 1],
                ['id' => 4, 'destinasi_id' => 2, 'judul' => 'Bawa Perlengkapan Renang', 'konten' => 'Ombak tenang dan cocok untuk berenang, jangan lupa bawa perlengkapan renang.', 'tipe' => 'tips', 'urutan' => 2],
            ],
            4 => [
                ['id' => 5, 'destinasi_id' => 4, 'judul' => 'Gunakan Pemandu Lokal', 'konten' => 'Untuk keamanan dan informasi lengkap, disarankan menggunakan pemandu wisata lokal.', 'tipe' => 'tips', 'urutan' => 1],
                ['id' => 6, 'destinasi_id' => 4, 'judul' => 'Jangan Mengganggu Satwa Liar', 'konten' => 'Hormati habitat satwa liar dan jangan memberi makan atau mengganggu mereka.', 'tipe' => 'larangan', 'urutan' => 2],
            ]
        ];
        
        return isset($tips[$destinasiId]) ? $tips[$destinasiId] : [];
    }
}
