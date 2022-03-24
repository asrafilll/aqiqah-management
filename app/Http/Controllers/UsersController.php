<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Branch;
use App\Models\Role;
use App\Models\UsersBranch;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    private $viewPath;

    public function __construct()
    {
        $this->viewPath = 'users_management.users';
    }

    public function index() {
        $user = User::with(['roles', 'branches.branch'])->get();
        $data = [
            'users' => $user
        ];

        // return json_encode($data);
        return view($this->viewPath . '.index')
            ->with($data);
    }

    /**
     * @param page
     * @param limit
     * @var JsonResponse
     */
    public function json($page, $limit) {
        $user = User::withTrashed()
            ->select('id', 'name', 'username', 'email', 'roles_id', 'deleted_at')
            ->skip($page)
            ->limit($limit)
            ->get();

        $data = [
            'users' => $user
        ];
        $view = view($this->viewPath . '.table-list')
            ->with($data)->render();

        return json_encode([
            'message' => 'Data retrieve',
            'data' => [
                'view' => $view
            ],
            'user' => $data
        ]);
    }

    /**
     * Get branch and role list
     */
    public function generalData() {
        $role = Role::all();
        $branch = Branch::all();

        $data = [
            'role' => $role,
            'branch' => $branch
        ];
        return json_encode([
            'message' => 'Data Retrieve',
            'data' => $data
        ]);
    }

    /**
     * @param name
     * @var JsonResponse
     */
    public function update(Request $request) {
        // validation
        $validate = Validator::make($request->all(), [
            'name' => 'required|string',
            'role' => 'required',
            'email' => 'required'
        ]);
        if ($validate->fails()) {
            $errors = $validate->errors()->toArray();
            $error = array_values($errors);
            $err = [];
            for ($a = 0; $a < count($error); $a++) {
                $err[] = implode(',', $error[$a]);
            }
            return json_encode([
                'message' => $err,
                'status' => 422
            ]);
        }
        $check = User::whereRaw("LOWER(username) = '$request->username'")
            ->first();
        if ($check) {
            return json_encode([
                'message' => 'Nama sudah ada di dalam database',
                'status' => 422
            ]);
        }
        
        // update
        $id = $request->id;
        $payload = [
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'roles_id' => $request->role,
            'created_at' => Carbon::now()
        ];
        if ($request->has('password') || $request->password != '') {
            $payload['password'] = Hash::make($request->password);
        }
        
        try {
            DB::beginTransaction();
            $currentUser = User::withTrashed()
                ->with('branches')
                ->findOrFail($id);

            if ($request->has('branch') || $request->branch != '') {
                if ($currentUser->branches != null) {
                    // update user branch table
                    UsersBranch::where('id', $currentUser->branches->id)
                        ->update([
                            'branch_id' => $request->branch,
                            'updated_at' => Carbon::now()
                        ]);
                } else {
                    // insert new branches if request has branch_id
                    UsersBranch::insert([
                        'branch_id' => $request->branch,
                        'created_at' => Carbon::now()
                    ]);
                }
            }

            // update user table
            User::where('id', $id)
                ->update($payload);
            DB::commit();
            return json_encode([
                'message' => 'Update success',
                'status' => 200,
                'data' => []
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return json_encode([
                'message' => $th->getMessage(),
                'status' => 422
            ]);
        }
    }

    public function store(Request $request) {
        /// validation
        $validate = Validator::make($request->all(), [
            'name' => 'required|string',
            'role' => 'required',
            'email' => 'required'
        ]);
        if ($validate->fails()) {
            $errors = $validate->errors()->toArray();
            $error = array_values($errors);
            $err = [];
            for ($a = 0; $a < count($error); $a++) {
                $err[] = implode(',', $error[$a]);
            }
            return json_encode([
                'message' => $err,
                'status' => 422
            ]);
        }
        $check = User::whereRaw("LOWER(username) = '$request->username'")
            ->first();
        if ($check) {
            return json_encode([
                'message' => 'Nama sudah ada di dalam database',
                'status' => 422
            ]);
        }

        // store
        $payload = [
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'roles_id' => $request->role,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now()
        ];
        $payloadBranch = [
            'branch_id' => $request->branch,
            'created_at'    => Carbon::now()
        ];
        try {
            DB::beginTransaction();

            $userId = User::insertGetId($payload);
            $payloadBranch['users_id'] = $userId;
            UsersBranch::inserT($payloadBranch);
            DB::commit();
            return json_encode([
                'message' => 'Save success',
                'status' => 200,
                'data' => [] 
            ]);
        } catch (\Throwable $th) {
            DB::rollback();
            return json_encode([
                'message' => $th->getMessage(),
                'status' => 422
            ]);
        }
    }

    /**
     * @param id
     * @var JsonResponse
     */
    public function edit($id) {
        $user = User::withTrashed()
            ->with('branches')->findOrFail($id);
        $role = Role::all();
        $branch = Branch::all();

        return json_encode([
            'message' => 'Data retrieve',
            'data' => [
                'user' => $user,
                'branch' => $branch,
                'role' => $role
            ]
        ]);
    }

    /**
     * @param id
     * @var JsonResponse
     */
    public function detail($id) {
        $user = User::withTrashed()
            ->with(['branches.branch'])
            ->where('id', $id)
            ->first();
        $data = [
            'user' => $user
        ];
        $view = view($this->viewPath . '.detail')
            ->with($data)
            ->render();
        return json_encode([
            'message' => 'Data retrieve',
            'status' => 200,
            'data' => [
                'view' => $view
            ]
        ]);
    }

    /**
     * @param id
     * @var JsonResponse
     */
    public function delete(Request $request) {
        $id = $request->id;
        $delete = User::where('id', $id)->delete();

        return json_encode([
            'message' => 'Delete success',
            'data' => []
        ]);
    }

    /**
     * Init user
     */
    public function init() {
        $user = Auth::user();
        $userBranch = User::with('branches')
            ->where('id', $user->id)
            ->first();

        return json_encode([
            'message' => 'Data retrieve',
            'data' => $userBranch
        ]);
    }
}
