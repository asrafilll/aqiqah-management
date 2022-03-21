<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Branch;
use App\Models\ChickenMenu;
use App\Models\Customers;
use App\Models\EggMenu;
use App\Models\MeatMenu;
use App\Models\OffalMenu;
use App\Models\Order\CustInformation;
use App\Models\Order\Order;
use App\Models\Order\OrderInformation;
use App\Models\OrderPackage;
use App\Models\Orders;
use App\Models\Package;
use App\Models\PackageChicken;
use App\Models\PackageEgg;
use App\Models\PackageMeat;
use App\Models\PackageOffal;
use App\Models\PackageRice;
use App\Models\PackageVegetable;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\RiceMenu;
use App\Models\Shipping;
use App\Models\TypeOrder;
use App\Models\UsersBranch;
use App\Models\VegetableMenu;
use App\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function index()
    {
        return view('order.index');
    }

    public function json() {
        $user = Auth::user();
        $userBranch = UsersBranch::where('users_id', $user->id)->with('branch')->first();
        if ($userBranch == null) {
            $where = 'id > 0';
        } else {
            $where = 'branch_id = ' . $userBranch->branch_id;
        }
        $order = Orders::with(['orderPackage.package'])
            ->whereRaw($where)
            ->get();
        $view = view('order.partials.table-list', ['data' => $order])->render();
        return json_encode([
            'message' => 'Data retrieve',
            'data' => [
                'view' => $view,
                'data' => $order,
                'user' => $userBranch
            ]
        ]);
    }

    public function create()
    {
        // get branch from user
        $user = Auth::user();
        $userBranch = UsersBranch::where('users_id', $user->id)->with('branch')->first();
        $allBranch = Branch::all();
        $data['branch'] = $userBranch;
        $data['allBranch'] = $allBranch;
        $data['payment'] = Payment::all();
        $data['typeOrder'] = TypeOrder::all();
        $data['package'] = Package::all();
        $data['shippings'] = Shipping::all();
        return view('order.create-backup')->with($data);
    }

    public function checkQuota(Request $request) {
        $branchId = $request->branch;
        $time = $request->times;
        $splitTime = explode(':', $time);
        $plus = $splitTime[0] + 1 . ':00';
        $start = $request->dates . " $splitTime[0]:00";
        $end = $request->dtes . " $plus";
        $data = Orders::select('id', 'qty')
            ->whereRaw(
                "send_date > '$start' AND send_date < '$end' and branch_id = $branchId"
            )->get();

        if (count($data) == 0) {
            $quota = 300;
        } else {
            $sum = [];
            foreach($data as $d) {
                $sum[] = $d->qty;
            }
            $quota = 300 - array_sum($sum);
        }

        return json_encode([
            'message' => 'Data retrieve',
            'data' => $quota
        ]);
    }

    public function getDetailPackage(Request $request) {
        $id = $request->packageId;
        $index = $request->index;
        $meat = MeatMenu::all();
        $offal = OffalMenu::all();
        $egg = EggMenu::all();
        $chicken = ChickenMenu::all();
        $rice = RiceMenu::all();
        $vegie = VegetableMenu::all();

        $order = "";
        if ($request->isEdit == 'edit') {
            $order = Orders::where('id', $request->orderId)
                ->with(['orderPackage.package'])->first();
        } else {
            $order = "";
        }
        // return json_encode([
        //     'req' => $request->isEdit,
        //     'order' => $order
        // ]);

        
        $view = "";
        if ($id == 1) {
            $view = view('order.partials.package1', [
                'meats' => $meat,
                'offals' => $offal,
                'rices' => $rice,
                'index' => $index,
                'order' => $order
            ])->render();
        } else if ($id == 2) {
            $view = view('order.partials.package2', [
                'meats' => $meat,
                'offals' => $offal,
                'rices' => $rice,
                'index' => $index,
                'order' => $order
            ])->render();
        } else if ($id == 3) {
            $view = view('order.partials.package3', [
                'meats' => $meat,
                'offals' => $offal,
                'eggs' => $egg,
                'rices' => $rice,
                'vegies' => $vegie,
                'index' => $index,
                'order' => $order
            ])->render();
        } else if ($id == 4) {
            $view = view('order.partials.package4', [
                'meats' => $meat,
                'offals' => $offal,
                'chickens' => $chicken,
                'rices' => $rice,
                'vegies' => $vegie,
                'index' => $index,
                'order' => $order
            ])->render();
        } else if ($id == 5) {
            $view = view('order.partials.package5', [
                'meats' => $meat,
                'offals' => $offal,
                'rices' => $rice,
                'index' => $index,
                'order' => $order
            ])->render();
        } else if ($id == 6) {
            $view = view('order.partials.package6', [
                'meats' => $meat,
                'vegies' => $vegie,
                'rices' => $rice,
                'index' => $index,
                'order' => $order
            ])->render();
        } else if ($id == 7) {
            $view = view('order.partials.package7', [
                'meats' => $meat,
                'chickens' => $chicken,
                'rices' => $rice,
                'index' => $index,
                'order' => $order
            ])->render();
        } else {
            $view = view('order.partials.package8', [
                'meats' => $meat,
                'offals' => $offal,
                'eggs' => $egg,
                'vegies' => $vegie,
                'rices' => $rice,
                'index' => $index,
                'order' => $order
            ])->render();
        }

        return json_encode([
            'status' => $view != "" ? 200 : 401,
            'message' => 'Data retrieve',
            'data' => [
                'view' => $view,
                'order' => $order,
                'index' => $index
            ]
        ]);
    }

    function showCardPackage(Request $request) {
        $index = $request->id;
        $view = view('order.partials.card-package', [
            'id' => $index,
            'package' => Package::all()
        ])->render();

        return json_encode([
            'message' => "Data retrieve",
            'data' => [
                'view' => $view
            ]
        ]);
    }

    public function show($id)
    {
        // get branch from user
        $user = Auth::user();
        $branch = UsersBranch::where('branch_id', $user->id)->with('branch')->first();
        $data['branch'] = $branch;
        $data['allBranch'] = Branch::all();
        $data['payment'] = Payment::all();
        $data['typeOrder'] = TypeOrder::all();
        $data['package'] = Package::all();
        $data['shippings'] = Shipping::all();
        $data['order'] = Orders::where('id', $id)->with(['orderPackage.package', 'customer', 'branch'])->first();
        $data['id'] = $id;
        return view('order.show')->with($data);
    }

    public function store(Request $request)
    {
        $dataCustomer = [
            'name' => $request->name,
            'name_of_aqiqah' => $request->name_of_aqiqah,
            'gender_of_aqiqah' => $request->gender_of_aqiqah,
            'birth_of_date' => $request->birth_of_date,
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'address' => $request->address,
            'district_id' => $request->district_id,
            'village_id' => $request->village_id,
            'postalcode' => $request->postalcode,
            'phone_1' => $request->phone_1,
            'phone_2' => $request->number_2,
            'created_at' => Carbon::now()
        ];
        $dataOrder = [
            'payment_id' => $request->payment,
            'branch_id' => $request->branchId,
            'send_date' => $request->send_date,
            'send_time' => $request->send_time,
            'consumsion_time' => $request->consumsion_time,
            'branch_group_id' => $request->branch_group,
            'number_of_goats' => $request->number_of_goats,
            'gender_of_goats' => $request->gender_of_goats,
            'type_order_id' => $request->type_order,
            'maklon' => $request->maklon,
            'notes' => $request->notes,
            'qty' => $request->qty_order,
            'shipping_id' => $request->shipping,
            'source_order_id' => $request->source_order,
            'additional_price' => $request->additional_price ?? 0,
            'discount_price' => $request->discount_price ?? 0,
            'total' => $request->total,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now()
        ];
        // return json_encode($request->all());
        DB::beginTransaction();
        try {
            $customer = Customers::insertGetId($dataCustomer);
            $dataOrder['customer_id'] = $customer;

            // save images
            if ($request->has('proof_of_payment')) {
                $ext = $request->file('proof_of_payment')->getClientOriginalExtension();
                $name = 'customer_pay_branch_' . $request->branchId . '.' . $ext;
                $path = Storage::putFileAs(
                    'public/customers', $request->file('proof_of_payment'), $name, 'public'
                );
                $dataOrder['proof_of_payment_img'] = 'storage/customers/' . $name;
            }
            if ($request->has('kk')) {
                $ext = $request->file('kk')->getClientOriginalExtension();
                $name = 'customer_kk_branch_' . $request->branchId . '.' . $ext;
                $path = Storage::putFileAs(
                    'public/customers', $request->file('kk'), $name, 'public'
                );
                $dataOrder['kk_img'] = 'storage/customers/' . $name;
            }
            if ($request->has('ktp')) {
                $ext = $request->file('ktp')->getClientOriginalExtension();
                $name = 'customer_ktp_branch_' . $request->branchId . '.' . $ext;
                $path = Storage::putFileAs(
                    'public/customers', $request->file('ktp'), $name, 'public'
                );
                $dataOrder['ktp_img'] = 'storage/customers/' . $name;
            }
            $order = Orders::insertGetId($dataOrder);

            // insert many to many relation
            for ($a = 0; $a < count($request->package); $a++) {
                // insert to order package table
                $orderPackge = OrderPackage::insertGetId([
                    'package_id' => $request->package[$a]['package_id'],
                    'order_id' => $order,
                    'created_at' => Carbon::now()
                ]);

                // insert to relation
                if (isset($request->package[$a]['meat_menu'])) {
                    PackageMeat::insert([
                        'order_id' => $orderPackge,
                        'package_id' => $request->package[$a]['package_id'],
                        'meat_menu_id' => $request->package[$a]['meat_menu'],    
                        'created_at' => Carbon::now()
                    ]);
                }
                if (isset($request->package[$a]['offal_menu'])) {
                    PackageOffal::insert([
                        'order_id' => $orderPackge,
                        'package_id' => $request->package[$a]['package_id'],
                        'offal_menu_id' => $request->package[$a]['offal_menu'],
                        'created_at' => Carbon::now()
                    ]);
                }
                if (isset($request->package[$a]['rice_menu'])) {
                    PackageRice::insert([
                        'order_id' => $orderPackge,
                        'package_id' => $request->package[$a]['package_id'],
                        'rice_menu_id' => $request->package[$a]['rice_menu'],
                        'created_at' => Carbon::now()
                    ]);
                }
                if (isset($request->package[$a]['vegetable_menu'])) {
                    PackageVegetable::insert([
                        'order_id' => $orderPackge,
                        'package_id' => $request->package[$a]['package_id'],
                        'vegetable_menu_id' => $request->package[$a]['vegetable_menu'],
                        'created_at' => Carbon::now()
                    ]);
                }
                if (isset($request->package[$a]['egg_menu'])) {
                    PackageEgg::insert([
                        'order_id' => $orderPackge,
                        'package_id' => $request->package[$a]['package_id'],
                        'egg_menu_id' => $request->package[$a]['egg_menu'],
                        'created_at' => Carbon::now()
                    ]);
                }
                if (isset($request->package[$a]['chicken_menu'])) {
                    PackageChicken::insert([
                        'order_id' => $orderPackge,
                        'package_id' => $request->package[$a]['package_id'],
                        'chicken_menu_id' => $request->package[$a]['chicken_menu'],
                        'created_at' => Carbon::now()
                    ]);
                }
            }

            DB::commit();
            return json_encode([
                'message' => 'Success',
                'status' => 200,
                'data' => []
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return json_encode([
                'status' => 422,
                'message' => $th->getMessage()
            ]);
        }
    }

    public function showFileUploader(Request $request) {
        $id = $request->id;
        $order = "";
        if ($request->has('isEdit')){
            $order = Orders::where('id', $request->orderId)->first();
        }
        $view = "";
        if ($id == 1) {
            $view = view('order.partials.file-cash', ['order' => $order])->render(); 
        } else {
            $view = view('order.partials.file-credit', ['order' => $order])->render(); 
        }
        return json_encode([
            'message' => 'Data retrieve',
            'data' => [
                'view' => $view
            ]
        ]);
    }

    public function storeCustomerInformation(Request $request)
    {
        $request['created_by'] = Auth::user()->id;
        $validator = Validator::make($request->all(), 
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
        $request['created_by'] = Auth::user()->id;
        $validator = Validator::make($request->all(), 
            [ 
                'cara_pembayaran'      => ['required'],
                // 'dokumen_ktp'      => ['required'],
                // 'dokumen_kk'      => ['required'],
                // 'dokumen_bukti_tf'      => ['required'],
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
            $request['total_harga_setelah_adjusment'] = $request->total_harga + $request->biaya_tambahan - $request->diskon;

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
