<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use App\Models\Rating;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class WisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wisata = Wisata::simplePaginate(5);
        // dd($wisata);
        return view('admin.wisata', ['wisata' => $wisata]);
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
        $image = $request->file('foto');
        $filename = time() . "_" . $image->getClientOriginalName();
        $address = 'image_upload';
        $image->move($address, $filename);

        $item = [
            'wisata' => $request->input('wisata'),
            'layanan' => $request->input('layanan'),
            'descripsi' => $request->input('descripsi'),
            'foto' => $filename,
            'alamat' => $request->input('alamat'),
            'link_maps' => $request->input('link_maps'),
        ];

        Wisata::create($item);
        // dd($wisata);

        Session::flash('success', 'Wisata berhasil ditambah');
        return redirect()->route('wisata.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $wisata = Wisata::findOrFail($id);
        $komentar = DB::table('komentar')
            ->join('wisata', 'wisata.id', '=', 'komentar.id_wisata')
            ->where('komentar.id_wisata', '=', $id)
            ->simplePaginate(3);
        $show_rating = DB::table('rating')
            ->join('wisata', 'wisata.id', '=', 'rating.id_wisata')
            ->where('rating.id_wisata', '=', $id)
            ->avg('rating');
        // dd($wisata);
        return view('admin.detail_wisata', ['wisata' => $wisata, 'show_rating' => $show_rating, 'komentar' => $komentar]);
    }

    public function showMaps($id)
    {
        $data = Wisata::findOrFail($id);
        return $data;
    }

    public function rating(Request $request)
    {
        if ($request->input('selected_rating') == null) {
            # code...
            return redirect('admin/wisata/' . request()->segment(3));
        } else {
            $item = [
                'id_wisata' => request()->segment(3),
                'rating' => $request->input('selected_rating'),
            ];
        }
        // dd($item);
        Rating::create($item);
        return redirect('admin/wisata/' . request()->segment(3));
    }

    public function komentar(Request $request)
    {
        $item = [
            'id_wisata' => request()->segment(3),
            // 'parent_id' => '',
            'nama' => $request->input('nama'),
            'komentar' => $request->input('komentar'),
        ];
        // dd($item);
        Komentar::create($item);
        return redirect('wisata/' . request()->segment(3));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Wisata::findOrFail($id);
        return $data;
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
        $data = Wisata::findOrFail($id);

        $filename = $data->foto;
        if ($request->hasFile('foto')) {
            $image_path = public_path() . '/image_upload/' . $filename;
            if (file_exists($image_path))
                File::delete($image_path);
            $image = $request->file('foto');
            $filename = time() . "_" . $image->getClientOriginalName();
            $address = 'image_upload';
            $image->move($address, $filename);
        }

        $data->wisata = $request->wisata;
        $data->layanan = $request->layanan;
        $data->foto = $filename;
        $data->descripsi = $request->descripsi;
        $data->alamat = $request->alamat;
        $data->link_maps = $request->link_maps;

        // dd($data);
        $data->update();

        Session::flash('success', 'Wisata berhasil diubah');
        return redirect()->route('wisata.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Wisata::findOrFail($id);

        $data->delete();

        Session::flash('success', 'Wisata berhasil dihapus');
        return redirect()->route('wisata.index');
    }
}
