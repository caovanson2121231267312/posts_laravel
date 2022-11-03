<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Repositories\Category\CategoryRepository;
use App\Components\cate;
use Exception;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    private $htmlSlelect = '';

    public function __construct(CategoryRepository $categoryRepo)
    {
        $this->htmlSlelect = '';
        $this->categoryRepo = $categoryRepo;
        $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
        $this->middleware('permission:role-create', ['only' => ['create','store']]);
        $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $categories = $this->categoryRepo->getCategory();
        return view("admin.category.index", ['data' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = category::all();
        $cate = new cate($data);
        $htmlSlelect = $cate->cate('',0,'');
        return view("admin.category.add",['html'=>$htmlSlelect]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = $this->categoryRepo->create($request->only(['name', 'parent_id']));

        return redirect('admin/categories')->with('mess', "Đã thêm 1 danh mục tin mới");
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
        $category = Category::find($id);
        $data = Category::all();
        $cate = new cate($data);
        $html = $cate->cate($category->parent_id,0,'');
        return view('admin.category.edit',["data" => $category, "html" => $html]);
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
            $category = $this->categoryRepo
                ->update($id, $request->only(['name', 'description']));
        } catch (Exception $e) {
            return redirect()->route('admin.categories')->with('mess', "lỗi");
        }

        return redirect('admin/categories')->with('mess', "lỗi");
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

            $this->categoryRepo->delete($id);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();

            return redirect('admin/categories')
                ->with('error', __('have_error'));
        }

        return redirect('admin/categories')
                ->with('mess', "Đã xóa");
    }
}
