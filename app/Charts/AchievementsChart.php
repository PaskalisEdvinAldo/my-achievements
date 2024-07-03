<?php

namespace App\Charts;

use App\Models\Sertifikat;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AchievementsChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $userId = Auth::id();

        // Inisialisasi array untuk menyimpan total prestasi untuk setiap bulan
        $dataTotalPrestasi = [];
        $monthDate = [];

        // Loop dari bulan Januari hingga Desember
        for ($i = 1; $i <= 12; $i++) {
            // Menghitung jumlah total prestasi untuk pengguna yang login pada bulan saat ini
            $totalPrestasi = Sertifikat::where('user_id', $userId)
                ->whereYear('certificate_date', date('Y'))
                ->whereMonth('certificate_date', $i)
                ->count();

            // Menambahkan jumlah total prestasi ke dalam array
            $dataTotalPrestasi[] = $totalPrestasi;
            
            // Menambahkan nama bulan ke dalam array
            $monthDate[] = Carbon::create()->month($i)->format('F');
        }

        // Membuat chart menggunakan LarapexChart
        return $this->chart->lineChart()
            ->setTitle("Student's Performance Graph Each Month In One Year")
            ->setSubtitle('Overall Data of Skills Certification, Achievements and Awards, Self-Development Programs This Month')
            ->addData('Monthly Achievement Graph', $dataTotalPrestasi)
            ->setHeight(270)
            ->setXAxis($monthDate);
        }
    }