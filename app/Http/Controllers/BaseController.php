<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;

class BaseController extends Controller
{
    public $pustaka2 ="<table border='1'>
        <thead>
          <th>Metoda yang digunakan dalam daftar pustaka</th> <th>Keunggulan</th> <th>Kelemahan</th>
        </thead>
        <tbody>
          <tr>
            <td>Metoda 1 (nama, tahun)</td><td></td><td></td>
          </tr>
          <tr>
            <td>Metoda 2 (nama, tahun)</td><td></td><td></td>
          </tr>
          <tr>
            <td>Metoda 3 (nama, tahun)</td><td></td><td></td>
          </tr>
          <tr>
            <td>Metoda 4 (nama, tahun)</td><td></td><td></td>
          </tr>
          <tr>
            <td>Metoda 5 (nama, tahun)</td><td></td><td></td>
          </tr>
          <tr>
            <td>Metoda 6 (nama, tahun)</td><td></td><td></td>
          </tr>
          <tr>
            <td>Metoda 7 (nama, tahun)</td><td></td><td></td>
          </tr>
          <tr>
            <td>Metoda 8 (nama, tahun)</td><td></td><td></td>
          </tr>
          <tr>
            <td>Metoda 9 (nama, tahun)</td><td></td><td></td>
          </tr>
          <tr>
            <td>Metoda 10 (nama, tahun)</td><td></td><td></td>
          </tr>
          <tr>
            <td>Metoda yang diusulkan</td><td></td><td></td>
          </tr>
        </tbody>
    </table>
    ";

    

    

    public function __construct() {
        $biaya="
            <p>
            <b>4.1 Anggaran Biaya</b><br>
            Penggunaan anggaran yang dibutuhkan untuk kegiatan ini adalah sebesar Rp x.xxx.xxx,-
            </p>
            <center>Tabel 4.1.1 Format Ringkasan Anggaran Biaya Kegiatan</center>

            <table border='1' cellspacing='0' cellpadding='0'> 
            <thead>
                <tr>
                <td>No.</td>
                <td>Jenis Pengeluaran</td>
                <td>Biaya (Rp)</td>
                </tr>
            </thead>
            <tbody>

            </tbody>
                <tr>
                <td style='text-align:center'>1</td>
                <td>Peralatan penunjang</td>
                <td>x.xxx.xxx</td>
                </tr>
                <tr>
                <td style='text-align:center'>2</td>
                <td>Bahan habis pakai <br> (Komponen utama dan pengujian)</td>
                <td>x.xxx.xxx</td>
                </tr>
                <tr>
                <td style='text-align:center'>3</td>
                <td>Biaya perjalanan</td>
                <td>x.xxx.xxx</td>
                </tr>
                <tr>
                <td style='text-align:center'>4</td>
                <td>Lain-lain</td>
                <td>x.xxx.xxx</td>
                </tr>
                <tr>
                <td colspan='2' style='text-align:center'>Jumlah</td>
                <td>x.xxx.xxx</td>
                </tr>
            </tbody>
            </table>
        ";

    $jadwal_kegiatan="
      <p>
        <b>4.2 Jadwal Kegiatan</b> <br>
        Tabel 4.2.1 Jadwal Kegiatan PKM-xxx
      </p>
    
      <table border='1' cellspacing='0' cellpadding='0'> 
        <thead>
            <tr>
                <td rowspan='3'>No. </td> <td rowspan='3'>Kegiatan</td> <td colspan='20'>Bulan</td>
            </tr>
            <tr>
                <td colspan='4'>Bulan Ke-1</td>
                <td colspan='4'>Bulan Ke-2</td>
                <td colspan='4'>Bulan Ke-3</td>
                <td colspan='4'>Bulan Ke-4</td>
                <td colspan='4'>Bulan Ke-5</td>
            </tr>
            <tr>
            <td style='text-align:center'>1</td>
            <td style='text-align:center'>2</td>
            <td style='text-align:center'>3</td>
            <td style='text-align:center'>4</td>
    
            <td style='text-align:center'>1</td>
            <td style='text-align:center'>2</td>
            <td style='text-align:center'>3</td>
            <td style='text-align:center'>4</td>
    
            <td style='text-align:center'>1</td>
            <td style='text-align:center'>2</td>
            <td style='text-align:center'>3</td>
            <td style='text-align:center'>4</td>
    
            <td style='text-align:center'>1</td>
            <td style='text-align:center'>2</td>
            <td style='text-align:center'>3</td>
            <td style='text-align:center'>4</td>
    
            <td style='text-align:center'>1</td>
            <td style='text-align:center'>2</td>
            <td style='text-align:center'>3</td>
            <td style='text-align:center'>4</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style='text-align:center'>1</td>
                <td>Koleksi data awal</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style='text-align:center'>2</td>
                <td>Mendesain alat (Menyusun desain teknis)</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style='text-align:center'>4</td>
                <td>Membuat alat (Proses realisasi alat)</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style='text-align:center'>5</td>
                <td>Uji keandalan alat</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style='text-align:center'>6</td>
                <td>Menganalisis data</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style='text-align:center'>7</td>
                <td>Evaluasi kinerja alat</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
    
        </tbody>
      </table>
    ";
    
    $justifikasi_anggaran ="
      <table border='1'>
          <tr>
            <td style='font-weight:bold'>1. Jenis Perlengkapan</td> <td>Volume</td> <td>Harga Satuan (Rp)</td> <td>Nilai (Rp)</td>
          </tr>
          <tr>
            <td></td><td></td><td></td><td></td>
          </tr>
          <tr>
            <td></td><td></td><td></td><td></td>
          </tr>
          <tr>
            <td colspan='3' style='text-align:right'>SUB TOTAL (Rp)</td><td></td>
          </tr>
    
          <tr>
            <td style='text-align:left'>2. Bahan Habis</td> <td>Volume</td> <td>Harga Satuan (Rp)</td> <td>Nilai (Rp)</td>
          </tr>
          <tr>
            <td></td><td></td><td></td><td></td>
          </tr>
          <tr>
            <td></td><td></td><td></td><td></td>
          </tr>
          <tr>
            <td colspan='3' style='text-align:right'>SUB TOTAL (Rp)</td><td></td>
          </tr>
    
          <tr>
            <td style='text-align:left'>3. Perjalanan</td> <td>Volume</td> <td>Harga Satuan (Rp)</td> <td>Nilai (Rp)</td>
          </tr>
          <tr>
            <td></td><td></td><td></td><td></td>
          </tr>
          <tr>
            <td></td><td></td><td></td><td></td>
          </tr>
          <tr>
            <td colspan='3' style='text-align:right'>SUB TOTAL (Rp)</td><td></td>
          </tr>
    
          <tr>
            <td style='text-align:left'>4. Lain - lain</td> <td>Volume</td> <td>Harga Satuan (Rp)</td> <td>Nilai (Rp)</td>
          </tr>
          <tr>
            <td></td><td></td><td></td><td></td>
          </tr>
          <tr>
            <td></td><td></td><td></td><td></td>
          </tr>
          <tr>
            <td colspan='3' style='text-align:right'>SUB TOTAL (Rp)</td><td></td>
          </tr>
          <tr>
            <td colspan='3' style='text-align:right'>TOTAL 1+2+3+4 (Rp)</td><td></td>
          </tr>
          <tr>
            <td colspan='4'>(Terbilang)</td>
          </tr>
        </table>
    ";
 
        View::share ( 'pustaka2', $this->pustaka2 );
        View::share ( 'biaya', $biaya );
        View::share ( 'jadwal_kegiatan',$jadwal_kegiatan );
        View::share ( 'justifikasi_anggaran', $justifikasi_anggaran );
     }  

}
