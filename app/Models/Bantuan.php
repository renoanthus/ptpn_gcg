<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Bantuan extends Model
{
    public static function limitWord($string,$limit = 20)
    {
        return Str::limit($string,$limit);
    }
    public static function assetStorage($url)
    {
        return $url = str_replace('public', 'storage', $url);
    }
    public static function tglMiring($date)
    {
        return $date = Carbon::parse($date)->format('m/d/Y');
    }
    public static function Rupiah($nominal)
    {
        $hasil_rupiah = "Rp " . number_format($nominal, 0, ',', '.');
        return $hasil_rupiah;
    }
    public static function Persentase($nominal1, $nominal2)
    {
        if ($nominal1 == 0 || $nominal2 == 0) {
            return '0%';
        } else {
            $hasil_rupiah = ($nominal1 / $nominal2) * 100;
            return $hasil_rupiah . '%';
        }
    }

    public static function Rupiah_db($nominal)
    {
        $hasil_rupiah = " " . number_format($nominal, 0, ',', '.');
        return $hasil_rupiah;
    }

    public static function ReadNominal($nominal)
    {
        $format = number_format($nominal, 0, ',', '.');
        $potong = explode('.', $format);
        $slice = array_slice($potong, 1);
        $lebih = str_replace('.', ',', round($format, 1));
        // $angka = $potong[0].','.$lebih[1];
        switch (count($slice)) {
            case '2':
                return $lebih . ' Juta';
                break;

            case '3':
                return $lebih . ' M';
                break;
            case '4':
                return $lebih . ' T';
                break;
            default:
                return $format;
                break;
        }
    }

    public static function ReadNominal_nosign($nominal)
    {
        $format = number_format($nominal, 0, ',', '.');
        $potong = explode('.', $format);
        $slice = array_slice($potong, 1);
        $lebih = str_replace('.', ',', round($format, 1));
        // $angka = $potong[0].','.$lebih[1];
        switch (count($slice)) {
            case '2':
                return $lebih;
                break;

            case '3':
                return $lebih;
                break;
            case '4':
                return $lebih;
                break;
            default:
                return $format;
                break;
        }
    }


    public static function removedots($data)
    {
        $remover = str_replace(".", "", $data);
        return $remover;
    }

    public static function tglSaja($tanggalwaktu)
    {
        $tanggal = date('d-m-Y', strtotime($tanggalwaktu));
        return substr($tanggal, 0, 2);
    }
    public static function tglBulan($tanggalwaktu)
    {
        $nama = array(
            1 =>   'Jan',
            'Feb',
            'Mar',
            'Apr',
            'Mei',
            'Jun',
            'Jul',
            'Agu',
            'Sep',
            'Okt',
            'Nov',
            'Des'
        );
        $tanggal = date('d-m-Y', strtotime($tanggalwaktu));
        $tanggal = substr($tanggal, 3, 2);
        $tanggal = intval($tanggal);
        return $nama[$tanggal];
    }

    public static function tglIndo($tanggalwaktu, $cetak_hari = false, $cetak_waktu = false)
    {
        $hari = array(
            1 =>    'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
            'Minggu'
        );

        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );

        $tanggal = date('Y-m-d', strtotime($tanggalwaktu));
        $waktu = date('H:i', strtotime($tanggalwaktu));

        $split    = explode('-', $tanggal);
        $tgl_indo = $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];

        if ($cetak_hari && $cetak_waktu) {
            $num = date('N', strtotime($tanggal));
            return $hari[$num] . ', ' . $tgl_indo . ' ' . $waktu;
        } else if ($cetak_hari) {
            $num = date('N', strtotime($tanggal));
            return $hari[$num] . ', ' . $tgl_indo;
        } else if ($cetak_waktu) {
            return $tgl_indo . ' ' . $waktu;
        }

        return $tgl_indo;
    }

    public static function tglIndoPendek($tanggalwaktu, $cetak_hari = false, $cetak_waktu = false)
    {
        $hari = array(
            1 =>    'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
            'Minggu'
        );

        $bulan = array(
            1 =>   'Jan',
            'Feb',
            'Mar',
            'Apr',
            'Mei',
            'Jun',
            'Jul',
            'Agu',
            'Sep',
            'Okt',
            'Nov',
            'Des'
        );

        $tanggal = date('Y-m-d', strtotime($tanggalwaktu));
        $waktu = date('H:i', strtotime($tanggalwaktu));

        $split    = explode('-', $tanggal);
        $tgl_indo = $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];

        if ($cetak_hari && $cetak_waktu) {
            $num = date('N', strtotime($tanggal));
            return $hari[$num] . ', ' . $tgl_indo . ' ' . $waktu;
        } else if ($cetak_hari) {
            $num = date('N', strtotime($tanggal));
            return $hari[$num] . ', ' . $tgl_indo;
        } else if ($cetak_waktu) {
            return $tgl_indo . ' ' . $waktu;
        }

        return $tgl_indo;
    }

    public static function tgl($tanggalwaktu, $cetak_hari = false, $cetak_waktu = false)
    {
        $hari = array(
            1 =>    'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
            'Minggu'
        );

        $bulan = array(
            1 =>   1,
            2,
            3,
            4,
            5,
            6,
            7,
            8,
            9,
            10,
            11,
            12
        );

        $tanggal = date('Y-m-d', strtotime($tanggalwaktu));
        $waktu = date('H:i', strtotime($tanggalwaktu));

        $split    = explode('-', $tanggal);
        $tgl_indo = $split[2] . ' - ' . $bulan[(int)$split[1]] . ' - ' . $split[0];

        if ($cetak_hari && $cetak_waktu) {
            $num = date('N', strtotime($tanggal));
            return $hari[$num] . ', ' . $tgl_indo . ' ' . $waktu;
        } else if ($cetak_hari) {
            $num = date('N', strtotime($tanggal));
            return $hari[$num] . ', ' . $tgl_indo;
        } else if ($cetak_waktu) {
            return $tgl_indo . ' ' . $waktu;
        }

        return $tgl_indo;
    }

    public static function bulanIndo($tanggalwaktu, $cetak_hari = false, $cetak_waktu = false)
    {
        $hari = array(
            1 =>    'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
            'Minggu'
        );

        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );

        $tanggal = date('Y-m-d', strtotime($tanggalwaktu));
        $waktu = date('H:i', strtotime($tanggalwaktu));

        $split    = explode('-', $tanggal);
        $tgl_indo = $split[2] . ' ' . $bulan[(int)$split[1]];

        if ($cetak_hari && $cetak_waktu) {
            $num = date('N', strtotime($tanggal));
            return $hari[$num] . ', ' . $tgl_indo . ' ' . $waktu;
        } else if ($cetak_hari) {
            $num = date('N', strtotime($tanggal));
            return $hari[$num] . ', ' . $tgl_indo;
        } else if ($cetak_waktu) {
            return $tgl_indo . ' ' . $waktu;
        }

        return $bulan[(int)$split[1]];
    }
    public static function wordCutString($str, $start = 0, $words = 30)
    {
        $arr = preg_split("/[\s]+/",  $str, $words + 1);
        $arr = array_slice($arr, $start, $words);
        return join(' ', $arr);
    }
    public static function namaBulan($bulan)
    {
        $nama = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        return $nama[$bulan];
    }
    public static function selisihWaktu($waktu)
    {
        $to = Carbon::createFromFormat('Y-m-d H:s:i', $waktu);
        $from = Carbon::createFromFormat('Y-m-d H:s:i', Carbon::now());


        return $diff_in_minutes = $to->diffForHumans($from);
        // print_r($diff_in_minutes); // Output: 20
    }
}
