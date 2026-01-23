<?php
$pageTitle = "Destinasi Wisata";
include VIEW_PATH . '/layouts/header.php';
?>

<!-- Page Header -->
<section class="bg-gradient-to-r from-green-600 to-blue-600 text-white py-16">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-display font-bold mb-4">Destinasi Wisata Alam</h1>
        <p class="text-xl">Temukan destinasi wisata alam terbaik di Kalimantan Timur</p>
    </div>
</section>

<!-- Filters -->
<section class="bg-white shadow-md py-6">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row gap-4 items-center justify-between">
            <!-- Search -->
            <div class="w-full md:w-1/3">
                <form action="<?= BASE_URL ?>destinasi" method="GET" class="relative">
                    <input 
                        type="text" 
                        name="search" 
                        placeholder="Cari destinasi..." 
                        value="<?= isset($searchKeyword) ? htmlspecialchars($searchKeyword) : '' ?>"
                        class="input-field pr-12"
                    >
                    <button type="submit" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-green-600">
                        <i class="fas fa-search text-xl"></i>
                    </button>
                </form>
            </div>
            
            <!-- Category Filter -->
            <div class="flex gap-2 overflow-x-auto pb-2 md:pb-0">
                <a href="<?= BASE_URL ?>destinasi" 
                   class="badge <?= !isset($currentKategori) ? 'bg-green-600 text-white' : 'bg-gray-200 text-gray-700' ?> whitespace-nowrap">
                    Semua
                </a>
                <?php foreach ($kategoris as $kat): ?>
                <a href="<?= BASE_URL ?>destinasi?kategori=<?= $kat['id'] ?>" 
                   class="badge <?= isset($currentKategori) && $currentKategori == $kat['id'] ? 'bg-green-600 text-white' : 'bg-gray-200 text-gray-700' ?> whitespace-nowrap">
                    <?= htmlspecialchars($kat['nama']) ?>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- Destinations Grid -->
<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">
        <?php if (empty($destinasis)): ?>
            <div class="text-center py-16">
                <i class="fas fa-search text-6xl text-gray-400 mb-4"></i>
                <h3 class="text-2xl font-bold text-gray-600 mb-2">Destinasi Tidak Ditemukan</h3>
                <p class="text-gray-500">Coba kata kunci atau filter lain</p>
            </div>
        <?php else: ?>
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <?php foreach ($destinasis as $dest): ?>
                <div class="card">
                    <div class="relative h-48 overflow-hidden img-hover-zoom">
                        <img 
                            src="<?= BASE_URL ?>public/images/destinations/<?= $dest['foto_utama'] ?>" 
                            alt="<?= htmlspecialchars($dest['nama']) ?>"
                            class="w-full h-full object-cover"
                            onerror="this.src='https://via.placeholder.com/300x200/10b981/ffffff?text=<?= urlencode(substr($dest['nama'], 0, 20)) ?>'"
                        >
                        <div class="absolute top-3 right-3">
                            <span class="badge-green text-xs">
                                <i class="fas fa-star text-yellow-500 mr-1"></i>
                                <?= number_format($dest['rating'], 1) ?>
                            </span>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-bold text-gray-800 mb-2 line-clamp-1">
                            <?= htmlspecialchars($dest['nama']) ?>
                        </h3>
                        <p class="text-sm text-gray-600 mb-3 flex items-center">
                            <i class="fas fa-map-marker-alt text-red-500 mr-1 text-xs"></i>
                            <?= htmlspecialchars($dest['kabupaten_nama']) ?>
                        </p>
                        <div class="flex items-center justify-between">
                            <span class="text-green-600 font-semibold text-sm">
                                <?= $dest['harga_tiket'] ?>
                            </span>
                            <a href="<?= BASE_URL ?>destinasi/<?= $dest['id'] ?>" 
                               class="text-green-600 hover:text-green-700 font-semibold text-sm">
                                Detail <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php include VIEW_PATH . '/layouts/footer.php'; ?>
