<?php

namespace App\Http\Controllers;

use App\Models\riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class educationController extends Controller
{
    function __construct()
    {
        $this->_tipe = 'education';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = riwayat::where('tipe', $this->_tipe)->orderBy('tgl_akhir', 'desc')->get();
        return view('dashboard.education.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.education.create');
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
        Session::flash('info2', $request->info2);
        Session::flash('info3', $request->info3);
        Session::flash('tanggal_mulai', $request->tanggal_mulai);
        Session::flash('tanggal_akhir', $request->tanggal_akhir);

        $request->validate(
            [
                'judul' => 'required',
                'info2' => 'required',
                'info3' => 'required',
                'tanggal_mulai' => 'required',
            ],
            [
                'judul.required' => 'Nama Instansi wajib diisi',
                'info2.required' => 'Program Studi wajib diisi',
                'info3.required' => 'Nama perusahaan wajib diisi',
                'tanggal_mulai.required' => 'Tahun mulai wajib diisi',
                'tanggal_akhir.required' => 'Tahun lulus wajib diisi',
            ]
        );

        $data = [
            'judul' => $request->judul,
            'tipe' => $this->_tipe,
            'info2' => $request->info2,
            'info3' => $request->info3,
            'tgl_mulai' => $request->tanggal_mulai,
            'tgl_akhir' => $request->tanggal_akhir,
        ];

        riwayat::create($data);
        return redirect()->route('education.index')->with('success', 'Berhasil simpan data education');
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
        return view('dashboard.education.edit')->with('data', $data);
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
                'info2' => 'required',
                'info3' => 'required',
                'tanggal_mulai' => 'required',
            ],
            [
                'judul.required' => 'Nama Instansi wajib diisi',
                'info2.required' => 'Nama Prodi wajib diisi',
                'info3.required' => 'IPK/Nilai akhir wajib diisi',
                'tanggal_mulai.required' => 'Tanggal mulai wajib diisi',
            ]
        );

        $data = [
            'judul' => $request->judul,
            'tipe' => $this->_tipe,
            'info2' => $request->info2,
            'info3' => $request->info3,
            'tgl_mulai' => $request->tanggal_mulai,
            'tgl_akhir' => $request->tanggal_akhir,
        ];

        riwayat::where('id', $id)->where('tipe', $this->_tipe)->update($data);
        return redirect()->route('education.index')->with('success', 'Berhasil edit data education');
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
        return redirect()->route('education.index')->with('success', 'Data education telah dihapus');
    }
}
