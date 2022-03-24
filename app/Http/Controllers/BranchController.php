<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\UsersBranch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BranchController extends Controller
{
    private $viewPath;

    /**
     * Construct function
     */
    public function __construct()
    {
        $this->viewPath = 'users_management.branch';
    }

    /**
     * for list branch ui
     */
    public function index() {
        $branch = Branch::all();
        $data = [
            'branches' => $branch
        ];

        return view($this->viewPath . '.index')
            ->with($data);
    }

    /**
     * @param page
     * @param limit
     * @var JsonResponse
     */
    public function json($page, $limit) {
        $branch = Branch::select('id', 'name')
            ->skip($page)
            ->limit($limit)
            ->get();

        $data = [
            'branches' => $branch
        ];
        $view = view($this->viewPath . '.table-list')
            ->with($data)->render();

        return json_encode([
            'message' => 'Data retrieve',
            'data' => [
                'view' => $view
            ]
        ]);
    }

    /**
     * @param name
     * @var JsonResponse
     */
    public function update(Request $request) {
        // validation
        $validate = Validator::make($request->all(), [
            'name' => 'required|string'
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
        $payload = [
            'name' => $request->name
        ];
        
        // update
        try {
            Branch::where('id', $request->id)
                ->update($payload);

            return json_encode([
                'message' => 'Update success',
                'status' => 200,
                'data' => []
            ]);
        } catch (\Throwable $th) {
            return json_encode([
                'message' => $th->getMessage(),
                'status' => 422
            ]);
        }
    }

    public function store(Request $request) {
        /// validation
        $validate = Validator::make($request->all(), [
            'name' => 'required|string'
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
        $check = Branch::whereRaw("LOWER(name) = '$request->name'")
            ->first();
        if ($check) {
            return json_encode([
                'message' => 'Nama sudah ada di dalam database',
                'status' => 422
            ]);
        }

        // store
        $payload = [
            'name' => $request->name
        ];
        try {
            Branch::insert($payload);

            return json_encode([
                'message' => 'Save success',
                'status' => 200,
                'data' => [] 
            ]);
        } catch (\Throwable $th) {
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
        $branch = Branch::findOrFail($id);

        return json_encode([
            'message' => 'Data retrieve',
            'data' => $branch
        ]);
    }

    /**
     * @param id
     * @var JsonResponse
     */
    public function detail($id) {
        $branch = Branch::with(['userBranch', 'orders'])
            ->where('id', $id)
            ->first();
        $data = [
            'branch' => $branch
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
        // check relation to user
        $relation = UsersBranch::select('id')
            ->where('branch_id', $id)
            ->get();

        $isDelete = true;
        if (count($relation) > 0) {
            $isDelete = false;
        }

        try {
            $delete = 0;
            if ($isDelete) {
                $delete = Branch::where('id', $id)
                    ->delete();
            }
    
            return json_encode([
                'message' => !$isDelete ? 'Hapus gagal, cabang ini masih mempunyai relasi dengan user' : 'Success',
                'status' => !$isDelete ? 422 : 200
            ]);
        } catch (\Throwable $th) {
            return json_encode([
                'message' => $th->getMessage(),
                'data' => []
            ]);
        }
    }
}
