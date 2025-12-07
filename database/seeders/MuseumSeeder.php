<?php
/**
 * Visita - Museum Seeder
 * File: database/seeders/MuseumSeeder.php
 * 
 * Cara run: php artisan db:seed --class=MuseumSeeder
 */

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Museum;
use Illuminate\Support\Facades\DB;

class MuseumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing data (optional)
        DB::table('museums')->truncate();

        $museums = [
            [
                'nama_museum' => 'Museum Geologi Bandung',
                'deskripsi' => 'Museum Geologi didirikan pada tanggal 16 Mei 1929. Museum ini telah direnovasi dengan dana dari JICA dengan konsep baru yang lebih modern. Museum ini menyimpan dan mengelola berbagai koleksi geologi yang sangat berharga.',
                'alamat' => 'Jl. Diponegoro No.57, Cihaur Geulis, Kec. Cibeunying Kaler, Kota Bandung, Jawa Barat 40122',
                'latitude' => -6.900641,
                'longitude' => 107.621777,
                'jam_operasional' => 'Senin-Kamis: 08.00-15.30 WIB, Sabtu-Minggu: 08.00-13.30 WIB',
                'harga_tiket' => 'Rp 3.000 (Dewasa), Rp 2.000 (Anak)',
                'foto_url' => 'https://example.com/geologi.jpg',
            ],
            [
                'nama_museum' => 'Museum Konferensi Asia Afrika',
                'deskripsi' => 'Museum yang mengabadikan peristiwa bersejarah Konferensi Asia Afrika tahun 1955. Gedung ini menjadi saksi bisu persatuan negara-negara Asia dan Afrika dalam melawan kolonialisme.',
                'alamat' => 'Jl. Asia Afrika No.65, Braga, Kec. Sumur Bandung, Kota Bandung, Jawa Barat 40111',
                'latitude' => -6.921459,
                'longitude' => 107.609344,
                'jam_operasional' => 'Selasa-Minggu: 09.00-16.00 WIB',
                'harga_tiket' => 'Gratis',
                'foto_url' => 'https://example.com/kaa.jpg',
            ],
            [
                'nama_museum' => 'Museum Pos Indonesia',
                'deskripsi' => 'Museum Pos Indonesia menyimpan koleksi perangko dan berbagai peralatan pos dari masa ke masa. Museum ini menampilkan sejarah perkembangan pos di Indonesia.',
                'alamat' => 'Jl. Cilaki No.73, Citarum, Kec. Bandung Wetan, Kota Bandung, Jawa Barat 40115',
                'latitude' => -6.902777,
                'longitude' => 107.626388,
                'jam_operasional' => 'Selasa-Minggu: 09.00-15.00 WIB',
                'harga_tiket' => 'Rp 5.000',
                'foto_url' => 'https://example.com/pos.jpg',
            ],
            [
                'nama_museum' => 'Museum Barli',
                'deskripsi' => 'Museum seni yang didirikan oleh Barli Sasmitawinata, pelukis terkenal Indonesia. Menampilkan berbagai karya seni lukis dan patung.',
                'alamat' => 'Jl. Prof. Sutami No.91, Sukarasa, Kec. Sukasari, Kota Bandung, Jawa Barat 40152',
                'latitude' => -6.870555,
                'longitude' => 107.594166,
                'jam_operasional' => 'Senin-Sabtu: 09.00-15.00 WIB',
                'harga_tiket' => 'Rp 10.000',
                'foto_url' => 'https://example.com/barli.jpg',
            ],
            [
                'nama_museum' => 'Museum Sri Baduga',
                'deskripsi' => 'Museum Sri Baduga atau Museum Negeri Provinsi Jawa Barat adalah museum yang menyimpan berbagai koleksi budaya Sunda, mulai dari alat musik, wayang golek, hingga berbagai benda bersejarah.',
                'alamat' => 'Jl. BKR No.185, Pelindung Hewan, Kec. Astanaanyar, Kota Bandung, Jawa Barat 40243',
                'latitude' => -6.935833,
                'longitude' => 107.586944,
                'jam_operasional' => 'Selasa-Minggu: 08.00-15.30 WIB',
                'harga_tiket' => 'Rp 5.000',
                'foto_url' => 'https://example.com/sribaduga.jpg',
            ],
            [
                'nama_museum' => 'Museum Mandala Wangsit Siliwangi',
                'deskripsi' => 'Museum militer yang menampilkan berbagai koleksi perlengkapan dan sejarah Kodam III/Siliwangi. Terdapat berbagai diorama pertempuran dan koleksi senjata.',
                'alamat' => 'Jl. Lembong No.38, Braga, Kec. Sumur Bandung, Kota Bandung, Jawa Barat 40111',
                'latitude' => -6.918611,
                'longitude' => 107.608611,
                'jam_operasional' => 'Senin-Jumat: 08.00-15.00 WIB',
                'harga_tiket' => 'Gratis',
                'foto_url' => 'https://example.com/siliwangi.jpg',
            ],
            [
                'nama_museum' => 'Museum Virajati Seskoad',
                'deskripsi' => 'Museum yang menampilkan sejarah Sekolah Staf dan Komando Angkatan Darat (Seskoad) dan berbagai koleksi militer.',
                'alamat' => 'Jl. Gatot Subroto No.96, Kota Bandung, Jawa Barat',
                'latitude' => -6.884722,
                'longitude' => 107.638611,
                'jam_operasional' => 'Senin-Jumat: 08.00-14.00 WIB',
                'harga_tiket' => 'Gratis',
                'foto_url' => 'https://example.com/virajati.jpg',
            ],
            [
                'nama_museum' => 'Museum Mainan dan Boneka',
                'deskripsi' => 'Museum yang menampilkan berbagai koleksi mainan dan boneka dari berbagai negara dan era. Cocok untuk wisata keluarga.',
                'alamat' => 'Jl. Sumur Bandung, Kota Bandung, Jawa Barat',
                'latitude' => -6.920277,
                'longitude' => 107.607777,
                'jam_operasional' => 'Selasa-Minggu: 10.00-17.00 WIB',
                'harga_tiket' => 'Rp 15.000',
                'foto_url' => 'https://example.com/mainan.jpg',
            ],
        ];

        foreach ($museums as $museum) {
            Museum::create($museum);
        }

        $this->command->info('Museum data seeded successfully!');
    }
}