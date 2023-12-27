<?php

namespace App\Http\Controllers;

use App\Helpers\ApiHelpers;
use App\Models\Pegawai;
use Exception;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class PegawaiController extends Controller
{

    public function index(Request $request)
    {
        $data['title'] = 'Data Pegawai Perpustakaan';
        $data['q'] = $request->q;
        $data['rows'] = Pegawai::where('nama_pegawai', 'like', '%' . $request->q . '%')->get();
        return view('pegawai.index', $data);
    }

    public function read()
    {
        // $data = Pegawai::all();

        // if($data){
        //     return ApiHelpers::createAPI(200, 'Success', $data);
        // } else {
        //     return ApiHelpers::createAPI(400, 'Failed');
        // }

        $data = Pegawai::all();
        return response()->json([
            'pegawai' => $data
        ]);
    }

    public function create(Request $request)
    {
        $data['title'] = 'Tambah Data Pegawai';
        return view('pegawai.create', $data);
    }


    public function store(Request $request)
    {
        try
        {
          $request->validate([
            'nama_pegawai'=> 'required',
            'no_telp'=> 'required',
            'email'=> 'required',
            'nik'=> 'required',
            'tgl_lahir'=> 'required',
            'alamat'=> 'required'
          ]);

          $pegawai = Pegawai::create([
            'nama_pegawai' => $request->nama_pegawai,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'nik' => $request->nik,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat
          ]);

          $data = Pegawai::where('id','=', $pegawai->id)->get();
          return redirect('pegawai')->with('success', 'Tambah Data Berhasil');
            if($data){
                return ApiHelpers::createAPI(200, 'Success', $data);
            } else {
                return ApiHelpers::createAPI(400, 'Failed');
            }

        } catch(Exception $error) {
            return ApiHelpers::createAPI(400, 'Failed');
        }
    }

    public function show($id)
    {
        // $data = Pegawai::where('id','=', $id)->get();

        // if($data){
        //     return ApiHelpers::createAPI(200, 'Success', $data);
        // } else {
        //     return ApiHelpers::createAPI(400, 'Failed');
        // }

        $data = Pegawai::find($id);
            if (!$data) {
                return response()->json([
                    'message' => 'pegawai tidak ditemukan'
        ], 404);
    }
        return response()->json([
            'pegawai' => $data
        ]);
     }

    public function edit(Pegawai $pegawai)
    {
        $data['title'] = 'Ubah Data';
        $data['row'] = $pegawai;
        return view('pegawai.edit', $data);
    }


    public function update(Request $request, $id)
    {
        try
        {
          $request->validate([
            'nama_pegawai'=> 'required',
            'no_telp'=> 'required',
            'email'=> 'required',
            'nik'=> 'required',
            'tgl_lahir'=> 'required',
            'alamat'=> 'required'
          ]);

          $pegawai = Pegawai::findOrFail($id);

          $pegawai->update([
            'nama_pegawai' => $request->nama_pegawai,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'nik' => $request->nik,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat
          ]);

          $data = Pegawai::where('id','=', $pegawai->id)->get();

            if($data){
                return ApiHelpers::createAPI(200, 'Success', $data);
            } else {
                return ApiHelpers::createAPI(400, 'Failed');
            }

        } catch(Exception $error) {
            return ApiHelpers::createAPI(500, 'Failed');
        }
    }


        //     $data = Pegawai::find($id);

        //     if (!$data) {
        //         return response()->json([
        //             'message' => 'Pegawai tidak ditemukan'
        //         ], 404);
        //     }

        //     $data->validate($request, [
        //         'nama_pegawai'=> 'required',
        //         'no_telp'=> 'required',
        //         'email'=> 'required',
        //         'nik'=> 'required',
        //         'tgl_lahir'=> 'required',
        //         'alamat'=> 'required',
        //     ]);

        //     $data->nama_pegawai = $request->input('nama_pegawai');
        //     $data->no_telp = $request->input('no_telp');
        //     $data->email = $request->input('email');
        //     $data->nik = $request->input('nik');
        //     $data->tgl_lahir = $request->input('tgl_lahir');
        //     $data->alamat = $request->input('alamat');
        //     $data->save();

        //     return response()->json([
        //         'message' => 'Pegawai berhasil diperbarui',
        //         'pegawai' => $data
        //     ], 200);
        // }



    public function destroy($id)
    {
        $data = Pegawai::find($id);
            if (!$data) {
                return response()->json([
                    'message' => 'Pegawai tidak ditemukan'
                ], 404);
            }
        $data->delete();
            return response()->json([
                    'message' => 'Pegawai berhasil dihapus'
                ], 200);
    }
}