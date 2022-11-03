<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Repositories\User\UserRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class UserController extends Controller
{
    private $htmlSlelect = '';

    public function __construct(UserRepository $userRepo)
    {
        $this->htmlSlelect = '';
        $this->userRepo = $userRepo;
        $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','store']]);
        $this->middleware('permission:user-create', ['only' => ['create','store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $users = $this->userRepo->getAllWithRoles(10);
        return view("admin.user.index", ['data' => $users ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $data = $this->userRepo->findWithRelation($id, ['roles', 'posts']);
            $roles = Role::all();
        } catch (\Exception $e) {
            return redirect()->route('users.index')->with('error', $e->getMessage());
        }

        return view('admin.user.show', compact('data', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $data = $this->userRepo->findWithRelation($id, ['roles', 'posts']);
            $roles = Role::all();
        } catch (\Exception $e) {
            return redirect()->route('users.index')->with('error', $e->getMessage());
        }

        return view('admin.user.edit', compact('data', 'roles'));
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
        try {
            DB::beginTransaction();

            $data = array_merge(
                $request->only([
                    'email',
                    'phone',
                    'avatar',
                    'name',
                    'description',
                ]),
            );

            if($request->has("avatar")){
                $file = $request->file('avatar');
                $fileName = $file->getClientOriginalName();
                $destinationPath = public_path().'/assets/images/users/' ;
                $fileName = Str::slug(pathinfo($fileName, PATHINFO_FILENAME)) . '-' . Carbon::now()->timestamp;
                $fileExt = $file->getClientOriginalExtension();
                $file->move($destinationPath,$fileName . "." . $fileExt);
                $data['avatar'] = $fileName . "." . $fileExt;
            }

            $song = $this->userRepo->updateUser($id, $data, $request->input('roles') ?? []);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->with('error', $th->getMessage());
        }

        return redirect()->back()->with('success', __('update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
