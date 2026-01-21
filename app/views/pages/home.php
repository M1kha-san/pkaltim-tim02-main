<?php
$pageTitle = "Explore Kaltim - Surga Alam Borneo";
$pageDescription = "Jelajahi keindahan alam Kalimantan Timur yang memukau.";
include VIEW_PATH . '/layouts/header.php';
?>

<!-- Hero Section -->
<section class="relative h-screen min-h-[700px] flex flex-col justify-center items-center text-white overflow-hidden">
    <!-- Background Image -->
    <div class="absolute inset-0 z-0">
        <!-- High quality nature image (Karst Sangkulirang or similar vibes) -->
        <img src="https://images.unsplash.com/photo-1533552755457-5b471cb2ab11?q=80&w=2670&auto=format&fit=crop" 
             alt="Wisata Alam Kaltim" 
             class="w-full h-full object-cover scale-105"
             data-aos="zoom-out" data-aos-duration="3000">
        <!-- Gradient Overlay matching the palette -->
        <div class="absolute inset-0 bg-gradient-to-b from-custom-primary/50 via-transparent to-custom-primary"></div>
    </div>

    <!-- Content -->
    <div class="relative z-10 container mx-auto px-4 text-center mt-12" data-aos="fade-up" data-aos-duration="1200">
        <h1 class="text-5xl md:text-7xl font-display font-bold mb-6 tracking-tight drop-shadow-2xl leading-none">
            WISATA ALAM<br><span class="text-custom-accent">KALTIM</span>
        </h1>
        <p class="text-lg md:text-xl text-gray-200 mb-10 max-w-2xl mx-auto font-light tracking-wide">
            Temukan ketenangan di surga tersembunyi Borneo. Hutan tropis, sungai legendaris, dan kepulauan eksotis menunggu Anda.
        </p>
        
        <!-- Search Widget Glass -->
        <div class="max-w-4xl mx-auto bg-white/10 backdrop-blur-md border border-white/20 rounded-full p-2 shadow-2xl flex flex-col md:flex-row items-center gap-2">
            <form action="<?= BASE_URL ?>destinasi" method="GET" class="w-full h-full flex flex-col md:flex-row gap-2">
                <div class="flex-grow relative h-14 group">
                    <div class="absolute inset-y-0 left-0 pl-6 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-400 group-focus-within:text-custom-accent transition"></i>
                    </div>
                    <input type="text" name="search" placeholder="Cari destinasi..." 
                           class="w-full h-full pl-12 pr-6 rounded-full bg-custom-light text-custom-primary placeholder-gray-500 outline-none focus:ring-2 focus:ring-custom-accent transition font-medium">
                </div>
                
                <div class="md:w-1/3 relative h-14 group">
                    <div class="absolute inset-y-0 left-0 pl-6 flex items-center pointer-events-none">
                        <i class="fas fa-map-marked-alt text-gray-400 group-focus-within:text-custom-accent transition"></i>
                    </div>
                    <select name="kategori" class="w-full h-full pl-12 pr-10 rounded-full bg-custom-light text-custom-primary outline-none focus:ring-2 focus:ring-custom-accent transition font-medium appearance-none cursor-pointer">
                        <option value="">Semua Kategori</option>
                        <?php foreach($kategoris as $k): ?>
                            <option value="<?= $k['id'] ?>"><?= $k['nama'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="absolute inset-y-0 right-0 pr-6 flex items-center pointer-events-none">
                        <i class="fas fa-chevron-down text-gray-400"></i>
                    </div>
                </div>

                <button type="submit" class="h-14 px-10 rounded-full bg-custom-secondary hover:bg-custom-primary text-white font-bold transition shadow-lg flex items-center justify-center transform hover:scale-105 active:scale-95 duration-200">
                    Cari
                </button>
            </form>
        </div>
    </div>
</section>

<!-- Destinasi Pilihan (Swiper Carousel) -->
<section class="py-24 bg-custom-light overflow-hidden relative" id="destinasi-populer">
    <div class="container mx-auto px-6 relative z-10">
        <div class="flex flex-col md:flex-row justify-between items-end mb-12">
            <div>
                <span class="text-custom-secondary font-bold uppercase tracking-widest text-xs mb-2 block">Pilihan Terbaik</span>
                <h2 class="text-4xl md:text-5xl font-display font-bold text-custom-primary">Jelajahi Surga Borneo</h2>
            </div>
            
            <!-- Custom Navigation -->
            <div class="flex space-x-4 mt-8 md:mt-0">
                <button class="swiper-button-prev-custom w-14 h-14 rounded-full border border-custom-primary/20 flex items-center justify-center text-custom-primary hover:bg-custom-primary hover:text-white transition duration-300">
                    <i class="fas fa-arrow-left text-lg"></i>
                </button>
                <button class="swiper-button-next-custom w-14 h-14 rounded-full border border-custom-primary/20 flex items-center justify-center text-custom-primary hover:bg-custom-primary hover:text-white transition duration-300">
                    <i class="fas fa-arrow-right text-lg"></i>
                </button>
            </div>
        </div>

        <!-- Swiper -->
        <div class="swiper mySwiper !overflow-visible">
            <div class="swiper-wrapper">
                <?php foreach ($featuredDestinasi as $destinasi): ?>
                <div class="swiper-slide h-auto">
                    <a href="<?= BASE_URL ?>destinasi/<?= $destinasi['id'] ?>" class="block h-full group">
                        <div class="bg-white rounded-[2rem] overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 h-[500px] relative">
                            <!-- Image -->
                            <img 
                                src="<?= BASE_URL ?>public/images/destinations/<?= $destinasi['foto_utama'] ?>" 
                                alt="<?= htmlspecialchars($destinasi['nama']) ?>"
                                class="w-full h-full object-cover transition duration-700 transform group-hover:scale-110"
                                onerror="this.src='https://via.placeholder.com/400x600/1d546d/ffffff?text=<?= urlencode($destinasi['nama']) ?>'"
                            >
                            
                            <!-- Overlay Gradient -->
                            <div class="absolute inset-0 bg-gradient-to-t from-custom-primary via-custom-primary/20 to-transparent opacity-90"></div>

                            <!-- Content Overlay -->
                            <div class="absolute bottom-0 left-0 w-full p-8 text-white transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                                <div class="flex items-center space-x-2 mb-3 opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100">
                                    <span class="px-3 py-1 rounded-full bg-custom-accent/90 backdrop-blur text-xs font-bold uppercase tracking-wider">
                                        <?= $destinasi['kategori_nama'] ?>
                                    </span>
                                    <span class="flex items-center text-sm">
                                        <i class="fas fa-star text-yellow-400 mr-1"></i> <?= number_format($destinasi['rating'], 1) ?>
                                    </span>
                                </div>
                                <h3 class="text-2xl md:text-3xl font-display font-bold mb-2 leading-tight">
                                    <?= htmlspecialchars($destinasi['nama']) ?>
                                </h3>
                                <div class="flex items-center text-gray-300 text-sm mb-4">
                                    <i class="fas fa-map-pin mr-2 text-custom-accent"></i>
                                    <?= htmlspecialchars($destinasi['kabupaten_nama']) ?>
                                </div>
                                <p class="text-gray-300 text-sm line-clamp-2 opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-200">
                                    <?= htmlspecialchars($destinasi['deskripsi']) ?>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- About / Highlight Section with new Colors -->
<section class="py-24 bg-custom-secondary text-white relative overflow-hidden" id="tentang">
    <!-- Abstract Shapes -->
    <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-custom-accent rounded-full blur-[120px] opacity-20 translate-x-1/2 -translate-y-1/2"></div>
    <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-custom-primary rounded-full blur-[100px] opacity-40 -translate-x-1/2 translate-y-1/2"></div>

    <div class="container mx-auto px-6 relative z-10">
        <div class="flex flex-col md:flex-row items-center gap-16">
            <div class="md:w-1/2 order-2 md:order-1 relative">
                <div class="relative rounded-[2rem] overflow-hidden shadow-2xl rotate-2 hover:rotate-0 transition duration-500">
                    <img src="https://images.unsplash.com/photo-1627894483216-2138af692e32?q=80&w=2574&auto=format&fit=crop" 
                         alt="Derawan Island" class="w-full object-cover">
                </div>
                <div class="absolute -bottom-10 -left-10 w-48 h-48 bg-custom-accent rounded-full blur-2xl -z-10"></div>
            </div>
            
            <div class="md:w-1/2 order-1 md:order-2" data-aos="fade-left">
                <span class="text-custom-accent font-bold uppercase tracking-widest text-xs mb-4 block">Tentang Kami</span>
                <h2 class="text-4xl md:text-6xl font-display font-bold mb-8 leading-tight">
                    Menjelajahi Jantung <br><span class="text-custom-accent">Kalimantan</span>
                </h2>
                <p class="text-gray-300 text-lg mb-8 leading-relaxed font-light">
                    Kami berdedikasi untuk memperkenalkan keajaiban alam Kalimantan Timur kepada dunia. Dari kedalaman hutan hujan yang menyimpan ribuan spesies langka hingga keindahan bawah laut Kepulauan Derawan yang mempesona.
                </p>
                
                <div class="grid grid-cols-3 gap-8 border-t border-white/10 pt-8">
                    <div>
                        <div class="text-4xl font-light text-white mb-2">10+</div>
                        <div class="text-xs tracking-widest text-custom-accent uppercase">Kabupaten</div>
                    </div>
                    <div>
                        <div class="text-4xl font-light text-white mb-2">100%</div>
                        <div class="text-xs tracking-widest text-custom-accent uppercase">Alam Asli</div>
                    </div>
                    <div>
                        <div class="text-4xl font-light text-white mb-2">24h</div>
                        <div class="text-xs tracking-widest text-custom-accent uppercase">Bantuan</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Grid -->
<section class="py-24 bg-white" id="galeri">
    <div class="container mx-auto px-6">
        <div class="flex justify-between items-end mb-16">
            <h2 class="text-4xl font-display font-bold text-custom-primary">Galeri Visual</h2>
            <a href="#" class="text-custom-secondary font-medium hover:text-custom-primary transition flex items-center gap-2">
                Lihat Semua <i class="fas fa-arrow-right"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 h-[600px]">
            <div class="relative rounded-3xl overflow-hidden group h-full" data-aos="fade-up">
                <img src="https://images.unsplash.com/photo-1596401057633-565652b5e6b7?q=80&w=2673&auto=format&fit=crop" class="w-full h-full object-cover transition duration-700 transform group-hover:scale-105" alt="Labuan Cermin">
                <div class="absolute bottom-0 left-0 p-8 w-full bg-gradient-to-t from-black/80 to-transparent">
                    <p class="text-white font-bold text-xl">Danau Labuan Cermin</p>
                    <p class="text-custom-accent text-sm">Berau</p>
                </div>
            </div>
            
            <div class="flex flex-col gap-8 h-full md:col-span-2">
                <div class="relative rounded-3xl overflow-hidden group h-1/2" data-aos="fade-up" data-aos-delay="100">
                    <img src="https://images.unsplash.com/photo-1590635185966-41f2389d5384?q=80&w=2670&auto=format&fit=crop" class="w-full h-full object-cover transition duration-700 transform group-hover:scale-105" alt="Sungai Mahakam">
                     <div class="absolute bottom-0 left-0 p-8 w-full bg-gradient-to-t from-black/80 to-transparent">
                        <p class="text-white font-bold text-xl">Sungai Mahakam</p>
                        <p class="text-custom-accent text-sm">Samarinda</p>
                    </div>
                </div>
                <div class="flex gap-8 h-1/2">
                     <div class="relative rounded-3xl overflow-hidden group w-1/2" data-aos="fade-up" data-aos-delay="200">
                        <img src="https://images.unsplash.com/photo-1518182170546-0766be6fec1d?q=80&w=2622&auto=format&fit=crop" class="w-full h-full object-cover transition duration-700 transform group-hover:scale-105" alt="Orangutan">
                         <div class="absolute bottom-0 left-0 p-6 w-full bg-gradient-to-t from-black/80 to-transparent">
                            <p class="text-white font-bold text-lg">Orangutan</p>
                        </div>
                    </div>
                     <div class="relative rounded-3xl overflow-hidden group w-1/2" data-aos="fade-up" data-aos-delay="300">
                        <img src="https://images.unsplash.com/photo-1592345279419-95a17ae0878f?q=80&w=2670&auto=format&fit=crop" class="w-full h-full object-cover transition duration-700 transform group-hover:scale-105" alt="Bukit Bangkirai">
                         <div class="absolute bottom-0 left-0 p-6 w-full bg-gradient-to-t from-black/80 to-transparent">
                            <p class="text-white font-bold text-lg">Canopy Bridge</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer Spacer & Script for Carousel -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            // pagination: {
            //     el: ".swiper-pagination",
            //     clickable: true,
            //     dynamicBullets: true,
            // },
            navigation: {
                nextEl: ".swiper-button-next-custom",
                prevEl: ".swiper-button-prev-custom",
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 30,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 40,
                },
            },
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            }
        });
    });
</script>

<?php include VIEW_PATH . '/layouts/footer.php'; ?>
