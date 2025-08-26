<?php

namespace Database\Seeders;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = [
            [
                'title' => 'Curi Besi hingga Terpal Truk, Dua Bajing Loncat Dibekuk Polisi di Cakung',
                'slug' => Str::slug('Curi Besi hingga Terpal Truk, Dua Bajing Loncat Dibekuk Polisi di Cakung', '-'),
                'category_id' => '1',
                'user_id' => '1',
                'content' => 'Jakarta – Polisi meringkus dua pelaku bajing loncat yang kerap meresahkan sopir truk di kawasan Jalan Raya Bekasi, Cakung, Jakarta Timur. Penangkapan dilakukan Unit Reskrim Polres Metro Jakarta Timur setelah aksi mereka viral di media sosial. Kedua pelaku diamankan pada Rabu (20/8/2025) pagi. Mereka adalah Diki, yang mencuri potongan besi dari atas truk, serta Gunawan, yang mengambil terpal. Barang hasil curian tersebut dijual ke lapak barang bekas dengan harga murah. Diki mengaku nekat karena ingin mencari tambahan uang. “Saya warga asli situ, saya enggak tahu pak kalau video saya viral,” ujarnya saat diperiksa polisi. Ia mengaku besi curian dijual seharga Rp5.000 per kilogram. Sementara Gunawan berdalih hanya mengambil terpal setelah rekannya selesai beraksi. “Pas dia sudah turun baru saya ambil terpal dan bawa untuk dijual,” katanya. Kanit Ranmor Polres Metro Jakarta Timur, AKP M Zein, menyebutkan aksi kedua pelaku sangat meresahkan pengguna jalan, khususnya sopir truk. “Pelaku masih kami dalami guna mencari barang bukti besi yang sudah dijual,” jelasnya. Dengan penangkapan ini, polisi berharap keamanan di jalur truk kawasan Cakung kembali terjaga.',
                'description' => 'description',
                'image' => 'image',
                'created_at' => Carbon::now(),

            ],
            [
                'title' => 'Ayah Tiri di Matraman Diduga Cabuli Anak Tirinya, Diamankan Polisi',
                'slug' => Str::slug('Ayah Tiri di Matraman Diduga Cabuli Anak Tirinya, Diamankan Polisi', '-'),
                'category_id' => '1',
                'user_id' => '1',
                'content' => 'Jakarta – Seorang pria berinisial NAW ditangkap warga usai diduga mencabuli anak tirinya, RA (14), di rumah kawasan Kecamatan Matraman, Jakarta Timur, Jumat (15/8/2025). Kasus ini terungkap setelah sang istri memergoki rekaman video di ponsel NAW yang memperlihatkan dirinya tengah berhubungan badan dengan korban. Saat berusaha kabur, pelaku berhasil diamankan warga sebelum diserahkan kepada Unit Perlindungan Perempuan dan Anak (PPA) Polres Metro Jakarta Timur. Salah seorang tetangga, Roy Marten (45), mengungkapkan bahwa korban sebenarnya hanya datang untuk menemui ibunya. Namun, saat itu sang ibu sedang tidak berada di rumah.',
                'description' => 'description',
                'image' => 'image',
                'created_at' => Carbon::now(),
            ]
        ];
        Post::insert($posts);
    }
}
