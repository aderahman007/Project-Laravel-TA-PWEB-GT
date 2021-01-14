<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total = DB::table('wisata')->count();
        $carousel = DB::table('wisata')->select('wisata', 'descripsi', 'foto')->limit(10)->latest()->get();
                    // dd($total);
        return view('admin.dashboard', ['total' => $total, 'carousel' => $carousel]);
    }

    public function tentang(){
        $tentang = [
            'judul' => 'SI Parawisata Lampung',
            'gambar' => 'tentang.jpg',
            'tentang' => 'Perangkat lunak yang akan dibangun merupakan sistem informasi berbasis web. Tahap ini dilakukan untuk mempersiapkan proses perancangan sistem yang diinginkan dan untuk menggambarkan secara jelas proses-proses atau prosedur-prosedur yang terdapat didalam sistem sesuai dengan metode pendekatan yang digunakan, yaitu pendekatan Object Oriented yang dalam menggambarkan seluruh proses dan objeknya menggunakan UML (Unified Modeling Language ), yaitu Diagram  Use  Case,Diagram  Activity  dan  Diagram  Class.  Hal  ini  dilakukan  dengan  tujuan  untuk memenuhi  kebutuhan  sistem  yang  diperlukan  Masyarakat  dan  untuk  memberikan  Perangkat lunak ini memiliki menu atau fungsi utama yaitu sebagai media Promosi di Wisata Lampung Selatan dengan tujuan memberi gambaran informasi Wisata dan Fasilitas yang tersedia. Aplikasi ini adalah sistem yang mencakup seluruh Pariwisata yang ada di Lampung Selatan, sehingga setiap warga yang berada di seluruh Lampung Selatan dapat melihat dan Mengetahui update Pariwisata yang berada di Lampung Selatan kapan pun dan dimana pun.'];
        return view('admin.tentang', ['tentang' => $tentang]);
    }

    public function lokasi(){
        $lokasi = [
            'lokasi' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2032777.6115107099!2d104.12118333125!3d-5.6742298000000035!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e41254066994339%3A0x50e764509f602269!2sPahawang%20Lampung%20attractions!5e0!3m2!1sen!2sid!4v1610560237922!5m2!1sen!2sid" width="980" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>'
        ];

        return view('admin.lokasi', ['lokasi' => $lokasi]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
