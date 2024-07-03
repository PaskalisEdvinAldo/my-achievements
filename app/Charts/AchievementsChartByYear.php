<?php

namespace App\Charts;

use App\Models\Sertifikat;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AchievementsChartByYear
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $userId = Auth::id();

        // Mengambil tahun-tahun unik dari data sertifikat
        $currentYear = date('Y');

        // Tentukan jumlah tahun sebelum tahun saat ini yang ingin ditampilkan di grafik
        $yearsBeforeCurrent = 3;

        // Hitung tahun awal yang akan ditampilkan di grafik
        $startYear = max($currentYear - $yearsBeforeCurrent, 2020); // Misalnya, batasi tahun awal hingga 2020

        // Tentukan rentang tahun untuk sumbu X
        $yearsRange = range($startYear, $currentYear);

        // Inisialisasi array untuk menyimpan total prestasi untuk setiap tahun
        $dataTotalPrestasi = [];

        foreach ($yearsRange as $year) {
            // Menghitung jumlah total prestasi untuk pengguna yang login pada tahun tertentu
            $totalPrestasi = Sertifikat::where('user_id', $userId)
                ->whereYear('certificate_date', $year)
                ->count('classification'); // Menggunakan SUM untuk menjumlahkan nilai classification

            // Menambahkan jumlah total prestasi ke dalam array
            $dataTotalPrestasi[] = $totalPrestasi;
        }

        // Membuat chart menggunakan LarapexChart
        return $this->chart->barChart()
            ->setTitle("Students' Performance Graph Each Year")
            ->setSubtitle('Overall Data of Skills Certification, Achievements and Awards, Self-Development Programs Each Year')
            ->addData('Yearly Achievement Graph', $dataTotalPrestasi)
            ->setHeight(270)
            ->setXAxis($yearsRange);
    }
}
