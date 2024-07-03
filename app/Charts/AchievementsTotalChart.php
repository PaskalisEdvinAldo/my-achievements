<?php

namespace App\Charts;

use App\Models\Sertifikat;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;

class AchievementsTotalChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        // Inisialisasi array untuk menyimpan total prestasi untuk setiap tahun
        $dataAcademic = [];
        $dataNonAcademic = [];
        $years = [];

        // Mendapatkan tahun saat ini
        $currentYear = date('Y');
        
        // Menghitung rentang tahun (5 tahun terakhir termasuk tahun ini)
        $startYear = $currentYear - 5;

        // Loop dari startYear hingga currentYear
        for ($year = $startYear; $year <= $currentYear; $year++) {
            // Menghitung jumlah total prestasi akademik pada tahun ini
            $totalAcademic = Sertifikat::where('event_field', 'Academic')
                ->whereYear('certificate_date', $year)
                ->count();

            // Menghitung jumlah total prestasi non-akademik pada tahun ini
            $totalNonAcademic = Sertifikat::where('event_field', 'Non Academic')
                ->whereYear('certificate_date', $year)
                ->count();

            // Menambahkan jumlah total prestasi ke dalam array
            $dataAcademic[] = $totalAcademic;
            $dataNonAcademic[] = $totalNonAcademic;

            // Menambahkan tahun ke dalam array
            $years[] = $year;
        }

        // Membuat chart menggunakan LarapexChart
        return $this->chart->BarChart()
            ->setTitle("Overall Performance Graph Each Year")
            ->setSubtitle('Data of Academic and Non-Academic Events by Year')
            ->addData('Academic', $dataAcademic)
            ->addData('Non-Academic', $dataNonAcademic)
            ->setHeight(270)
            ->setXAxis($years); // Set the X-Axis to the years
        
    }
}
