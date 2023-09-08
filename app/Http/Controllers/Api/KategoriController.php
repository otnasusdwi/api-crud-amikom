<?php

namespace App\Http\Controllers\Api;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\KategoriResource;
use Illuminate\Support\Facades\Validator;


class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::latest()->paginate(5);

        return new KategoriResource(true, 'List Data Kategori', $kategoris);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id'     => 'required',
            'nama'   => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $kategori = Kategori::create([
            'id'     => $request->id,
            'nama'   => $request->nama,
        ]);

        //return response
        return new KategoriResource(true, 'Data Berhasil Ditambahkan!', $kategori);
    }

    public function show(Kategori $kategori)
    {
        //return single post as a resource
        return new KategoriResource(true, 'Data Ditemukan!', $kategori);
    }

    public function update(Request $request, Kategori $kategori)
    {
        $validator = Validator::make($request->all(), [
            'id'     => 'required',
            'nama'   => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

         else {
            $kategori->update([
                'id'     => $request->id,
                'nama'   => $request->nama,
            ]);
        }

        return new KategoriResource(true, 'Data Berhasil Diubah!', $kategori);
    }

    public function destroy(Kategori $kategori)
    {
        $kategori->delete();

        return new KategoriResource(true, 'Data Post Berhasil Dihapus!', null);
    }
}
