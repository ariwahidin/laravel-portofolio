<?php

namespace App\Http\Controllers;

use App\Models\riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class experienceController extends Controller
{
    function __construct()
    {
        $this->_tipe = 'experience';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = riwayat::where('tipe', $this->_tipe)->orderBy('tgl_akhir', 'desc')->get();
        return view('dashboard.experience.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.experience.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('judul', $request->judul);
        Session::flash('info1', $request->info1);
        Session::flash('tanggal_mulai', $request->tanggal_mulai);
        Session::flash('tanggal_akhir', $request->tanggal_akhir);
        Session::flash('isi', $request->isi);

        $request->validate(
            [
                'judul' => 'required',
                'info1' => 'required',
                'tanggal_mulai' => 'required',
                'isi' => 'required',
            ],
            [
                'judul.required' => 'Judul wajib diisi',
                'info1.required' => 'Nama perusahaan wajib diisi',
                'tanggal_mulai.required' => 'Tanggal mulai wajib diisi',
                'isi.required' => 'Isian wajib diisi',
            ]
        );

        $data = [
            'judul' => $request->judul,
            'tipe' => $this->_tipe,
            'info1' => $request->info1,
            'tgl_mulai' => $request->tanggal_mulai,
            'tgl_akhir' => $request->tanggal_akhir,
            'isi' => $request->isi
        ];

        riwayat::create($data);
        return redirect()->route('experience.index')->with('success', 'Berhasil simpan data experience');
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
        $data = riwayat::where('id', $id)->where('tipe', $this->_tipe)->first();
        return view('dashboard.experience.edit')->with('data', $data);
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
        $request->validate(
            [
                'judul' => 'required',
                'info1' => 'required',
                'tanggal_mulai' => 'required',
                'isi' => 'required',
            ],
            [
                'judul.required' => 'Judul wajib diisi',
                'info1.required' => 'Nama perusahaan wajib diisi',
                'tanggal_mulai.required' => 'Tanggal mulai wajib diisi',
                'isi.required' => 'Isian wajib diisi',
            ]
        );

        $data = [
            'judul' => $request->judul,
            'tipe' => $this->_tipe,
            'info1' => $request->info1,
            'tgl_mulai' => $request->tanggal_mulai,
            'tgl_akhir' => $request->tanggal_akhir,
            'isi' => $request->isi
        ];

        riwayat::where('id', $id)->where('tipe', $this->_tipe)->update($data);
        return redirect()->route('experience.index')->with('success', 'Berhasil edit data experience');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        riwayat::where('id', $id)->where('tipe', $this->_tipe)->delete();
        return redirect()->route('experience.index')->with('success', 'Data experience telah dihapus');
    }
}
