<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;

class AlamatController extends Controller
{

    public function tambahAlamat()
    {
        return view('akun.tambah_alamat');
    }

    public function saveAlamat(Request $request)
    {
        $request->validate([
            'alamat' => 'required',
            'jalan' => 'required',
            'kode_pos' => 'required',
        ]);
        $id_pelanggan = Auth::guard('pelanggan')->id();
        $alamat = new Alamat([
            'alamat' => $request->jalan . ", " . $request->alamat . ", " . $request->kode_pos,
            'id_pelanggan' => $id_pelanggan
        ]);
        $alamat->save();
        return redirect()->route('akun_saya')->with('success','data have been save!');
    }
    public function getProvinces()
    {
        // https://farizdotid.com/blog/dokumentasi-api-daerah-indonesia/
        $client = new Client();
        $response = $client->get('https://dev.farizdotid.com/api/daerahindonesia/provinsi');
        $data = json_decode($response->getBody(), true);
        $provinces = $data['provinsi'];

        return response()->json($provinces);
    }

    public function getCities(Request $request)
    {
        $idProvinsi = $request->input('id_provinsi');

        $client = new Client();
        $response = $client->get('https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=' . $idProvinsi);
        $data = json_decode($response->getBody(), true);
        $cities = $data['kota_kabupaten'];

        return response()->json($cities);
    }

    public function getDistricts(Request $request)
    {
        $idKota = $request->input('id_kota');

        $client = new Client();
        $response = $client->get('http://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=' . $idKota);
        $data = json_decode($response->getBody(), true);
        $districts = $data['kecamatan'];

        return response()->json($districts);
    }

    public function getVillages(Request $request)
    {
        $idKecamatan = $request->input('id_kecamatan');

        $client = new Client();
        $response = $client->get('https://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan=' . $idKecamatan);
        $data = json_decode($response->getBody(), true);
        $villages = $data['kelurahan'];

        return response()->json($villages);
    }

    public function hapus_alamat($id){
        $alamat= Alamat::find($id);
        $alamat->delete();
        return redirect('akun_saya')->with('success', 'data berhasil dihapus!');
    }
}
