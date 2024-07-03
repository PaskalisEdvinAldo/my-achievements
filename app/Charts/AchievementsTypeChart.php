<?php

namespace App\Charts;

use App\Models\Sertifikat;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\Auth;

class AchievementsTypeChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        $userId = Auth::id();
        $tipePrestasi = Sertifikat::where('user_id', $userId)->get();

        // Inisialisasi data prestasi dan label prestasi
        $dataPrestasi = [0, 0, 0];
        $labelPrestasi = [
            'Competence Certificate',
            'Accomplishments and Honors',
            'Self Development Program'
        ];

        // Hitung jumlah data untuk masing-masing klasifikasi dan tetapkan ke dataPrestasi jika ada
        $tipePrestasi->each(function ($sertifikat) use (&$dataPrestasi) {
            switch ($sertifikat->classification) {
                case 'Competence Certificate':
                    $dataPrestasi[0]++;
                    break;
                case 'Accomplishments and Honors':
                    $dataPrestasi[1]++;
                    break;
                case 'Self Development Program':
                    $dataPrestasi[2]++;
                    break;
            }
        });

        // Buat grafik hanya jika ada data yang tersedia
        if (array_sum($dataPrestasi) > 0) {
            return $this->chart->donutChart()
                ->setTitle('Achievements Type')
                ->setSubtitle('This Year')
                ->setHeight(283)
                ->addData($dataPrestasi)
                ->setLabels($labelPrestasi);
        } else {
            // Jika tidak ada data, buat grafik dengan warna abu-abu
            return $this->chart->donutChart()
                ->setTitle('Achievements Type')
                ->setSubtitle('This Year')
                ->setHeight(283)
                ->addData([1]) // Tambahkan dummy data
                ->setLabels(['No Data Available'])
                ->setColors(['#cccccc']); // Atur warna abu-abu
        }
    }
}
