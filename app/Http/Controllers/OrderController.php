<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order\{
    Order,
    CustInformation,
    OrderInformation
};
use DB;

class OrderController extends Controller
{
    public function index()
    {
        return view('order.index');
    }

    public function create()
    {
    	$data['source']           = ['IG', 'FB', 'Google adds', 'offline'];
    	$data['grup']             = ['Jabodetabek', 'Jawa Barat', 'Banten'];
    	$data['masak_cabang']     = ['Depok', 'Jakarta', 'Bekasi Kota', 'Kabupaten Bekasi', 'Tangerang Kota', 'Kapubaten Tangerang', 'Bogor', 'Karawang', 'Sukabumi'];
        $data['cara_bayar']       = ['Credit', 'Tunai'];
        $data['jenis_pesanan']    = ['Paket Aqiqah', 'Catering Umum', 'Qurban'];
        $data['jenis_paket']      = ['Paket Ekonomis Manis (Bento)', 'Paket Ekonomis Mewah (Bento)', 'Paket Kambing Masak', 'Paket Nasi Box Hemat', 'Paket Nasi Box Praktis', 'Paket Nasi Box Special', 'Paket Nasi Box Arab', 'Paket Aqiqah Tumpeng'];
        $data['pilihan_nasi']     = ['Nasi Putih', 'Nasi Kuning', 'Nasi Mandhi', 'Nasi Kebuli', 'Nasi Biryani', 'Nasi Uduk'];
        $data['jenis_beras_arab'] = ['Beras Lokal', 'Beras', 'Basmati'];
        $data['pengiriman']       = ['Dikirim', 'Diambil sendiri', 'Disalurkan'];
        return view('order.create')->with($data);
    }

    public function show($id)
    {
        $data['source']           = ['IG', 'FB', 'Google adds', 'offline'];
        $data['grup']             = ['Jabodetabek', 'Jawa Barat', 'Banten'];
        $data['masak_cabang']     = ['Depok', 'Jakarta', 'Bekasi Kota', 'Kabupaten Bekasi', 'Tangerang Kota', 'Kapubaten Tangerang', 'Bogor', 'Karawang', 'Sukabumi'];
        $data['cara_bayar']       = ['Credit', 'Tunai'];
        $data['jenis_pesanan']    = ['Paket Aqiqah', 'Catering Umum', 'Qurban'];
        $data['jenis_paket']      = ['Paket Ekonomis Manis (Bento)', 'Paket Ekonomis Mewah (Bento)', 'Paket Kambing Masak', 'Paket Nasi Box Hemat', 'Paket Nasi Box Praktis', 'Paket Nasi Box Special', 'Paket Nasi Box Arab', 'Paket Aqiqah Tumpeng'];
        $data['pilihan_nasi']     = ['Nasi Putih', 'Nasi Kuning', 'Nasi Mandhi', 'Nasi Kebuli', 'Nasi Biryani', 'Nasi Uduk'];
        $data['jenis_beras_arab'] = ['Beras Lokal', 'Beras', 'Basmati'];
        $data['pengiriman']       = ['Dikirim', 'Diambil sendiri', 'Disalurkan'];
        $data['data']             = Order::findOrFail($id);
        return view('order.create')->with($data);
    }

    public function store(Request $request)
    {
        // return $request->all();
        $request['created_by'] = \Auth::user()->id;
        $validator = \Validator::make($request->all(), 
            [ 
                'nama_customer'=> ['required', 'string', 'max:255'],
                'no_telp'      => ['required', 'numeric'],
                'source_order' => ['required', 'string', 'max:255']
            ]);
        if($validator->fails()) {
            return response()->json([
                'status'    => "fail",
                'messages'  => $validator->errors()->first(),
            ],422);
        }     

        DB::beginTransaction();
        try {
            if ($request->order_id) {
                $order = Order::updateOrCreate(
                    ['id' => $request->order_id],
                    $request->except('order_id')
                );
            }else{
                $order = Order::create($request->except('order_id'));
            }            
            DB::commit();

            return response()->json([
                'status'       => "ok",
                'messages'     => "Berhasil menambahkan data",
                'data'         =>  $order
            ], 200);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json([
                'status'    => "fail",
                'messages'  => "Ada kesalahan dalam input data",
            ],422);
        }
    }

    public function storeCustomerInformation(Request $request)
    {
        $request['created_by'] = \Auth::user()->id;
        $validator = \Validator::make($request->all(), 
            [ 
                'nama_sohilbul_aqiqah'=> ['required', 'string', 'max:255'],
                'gender_sohilbul_aqiqah'      => ['required'],
                'tanggal_lahir' => ['required', 'string', 'max:255'],
                'tanggal_kirim' => ['required', 'string', 'max:255'],
                'nama_ayah' => ['required', 'string', 'max:255'],
                'nama_ibu' => ['required', 'string', 'max:255'],
                'alamat' => ['required', 'string', 'max:255'],
                'grup_area' => ['required', 'string'],
                'kecamatan' => ['required', 'string', 'max:255'],
                'kelurahan' => ['required', 'string', 'max:255'],
                'kode_pos' => ['required', 'string', 'max:255'],
                'no_telp2' => ['required', 'string', 'max:255'],
                'masak_di_cabang' => ['required', 'string', 'max:255'],
            ]);
        if($validator->fails()) {
            return response()->json([
                'status'    => "fail",
                'messages'  => $validator->errors()->first(),
            ],422);
        }     

        DB::beginTransaction();
        try {
            $order = CustInformation::updateOrCreate(
                ['id' => $request->order_id],
                $request->all()
            );
            DB::commit();

            return response()->json([
                'status'       => "ok",
                'messages'     => "Berhasil menambahkan data",
                'data'         =>  $order
            ], 200);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json([
                'status'    => "fail",
                'messages'  => "Ada kesalahan dalam input data",
            ],422);
        }
    }
    
    public function storeOrderInformation(Request $request)
    {        
        $request['created_by'] = \Auth::user()->id;
        $validator = \Validator::make($request->all(), 
            [ 
                'cara_pembayaran'      => ['required'],
                'dokumen_ktp'      => ['required'],
                'dokumen_kk'      => ['required'],
                'dokumen_bukti_tf'      => ['required'],
                'jumlah_kambing'=> ['required', 'string', 'max:255'],
                'jenis_kelamin_kambing'      => ['required'],
                'jenis_pesanan'      => ['required'],
                'is_maklon'      => ['required'],
                'jenis_paket'      => ['required'],
                'pilihan_nasi'      => ['required'],
                'alamat'      => ['required'],
                'jenis_beras_arab'      => ['required'],
                'jumlah_order'      => ['required'],
                'tanggal_kirim'      => ['required'],
                'jam_tiba_lokasi'      => ['required'],
                'jam_konsumsi'      => ['required'],
                'pengiriman'      => ['required'],
                'total_harga'      => ['required'],
                'adjusment'      => ['required', 'numeric'],
                'keterangan'      => ['required'],
            ]);
        if($validator->fails()) {
            return response()->json([
                'status'    => "fail",
                'messages'  => $validator->errors()->first(),
            ],422);
        }     

        DB::beginTransaction();
        try {
            if ($request->hasFile('dokumen_ktp')) {
                $request['ktp'] = $this->storeFile("users/ktp", $request->dokumen_ktp);
            }
            if ($request->hasFile('dokumen_kk')) {
                $request['kk'] = $this->storeFile("users/kk", $request->dokumen_kk);
            }
            if ($request->hasFile('dokumen_bukti_tf')) {
                $request['bukti_tf'] = $this->storeFile("users/bukti_tf", $request->dokumen_bukti_tf);
            }
            $request['is_maklon'] = $request->is_maklon == "Ya" ? 1 : 0;

            $order = OrderInformation::updateOrCreate(
                ['id' => $request->order_id],
                $request->except(['dokumen_ktp', 'dokumen_kk', 'dokumen_bukti_tf'])
            );
            DB::commit();

            return response()->json([
                'status'       => "ok",
                'messages'     => "Berhasil menambahkan data",
                'data'         =>  $order
            ], 200);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json([
                'status'    => "fail",
                'messages'  => "Ada kesalahan dalam input data",
            ],422);
        }
    }
}
