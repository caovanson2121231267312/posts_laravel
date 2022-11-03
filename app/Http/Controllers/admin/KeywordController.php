<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\KeywordRequest;
use App\Models\Keyword;
use App\Repositories\Keyword\KeywordRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Hash;
use Illuminate\Support\Arr;

class KeywordController extends Controller
{
    public function __construct(KeywordRepository $keywordRepo)
    {
        $this->keywordRepo = $keywordRepo;
        $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','store']]);
        $this->middleware('permission:user-create', ['only' => ['create','store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $keywords = $this->keywordRepo->getAllWithPaginate(10);
        return view("admin.keyword.index", ['data' => $keywords]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.keyword.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KeywordRequest $request)
    {
        $rs = $this->keywordRepo->create($request->except('_token'));
        return redirect()->route("keywords.index");
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $this->keywordRepo->delete($id);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->route('keywords.index')->with('delete-fail', $th->getMessage());
        }

        return redirect()->back()->with('delete-success', 'delete_success');
    }
}
