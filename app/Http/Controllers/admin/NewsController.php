<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\NewsRequest;
use App\Models\News;
use App\Repositories\News\NewsRepository;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Keyword\KeywordRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function __construct(NewsRepository $newsRepo, CategoryRepository $categoryRepo, KeywordRepository $keywordRepo)
    {
        $this->newsRepo = $newsRepo;
        $this->categoryRepo = $categoryRepo;
        $this->keywordRepo = $keywordRepo;
        $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','store']]);
        $this->middleware('permission:user-create', ['only' => ['create','store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $news = $this->newsRepo->getAllWithUser(6);
        // dd($news);
        return view("admin.news.index", ['data' => $news]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoryRepo->getAll();
        $keywords = $this->keywordRepo->getAll();

        return view("admin.news.add", compact('categories', 'keywords'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
        // $request->validate([
        //     'product_image.*' => 'mimes:doc,pdf,docx,zip,jpeg,png,jpg,gif,svg',
        // ]);
        try {
            DB::beginTransaction();

            $file = $request->file('image') ;
            $fileName = $file->getClientOriginalName() ;
            $destinationPath = public_path().'/assets/images/news/' ;
            $file->move($destinationPath,$fileName);

            $data = array_merge(
                $request->only([
                    'title',
                    'description',
                    'content',
                    'check',
                ]),
                [
                    'image' => $file->getClientOriginalName(),
                    'user_id' => Auth()->user()->id,
                    'keyword'=> "",
                ]
            );

            if(Auth()->user()->hasRole('Admin|Super-Admin')){
                $data['checked'] = 1;
            }else{
                $data['checked'] = 0;
            }

            $news = $this->newsRepo->createNews($data, $request->category ?? [], $request->keyword ?? []);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->route('news.index')->with('error', $e->getMessage());
        }

        return redirect()->route('news.index')->with('success', 'create_success');
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
        try {
            $data = $this->newsRepo->findNewsById($id);
            $categories = $this->categoryRepo->getAll();
            $keywords = $this->keywordRepo->getAll();
        } catch (\Exception $e) {
            return redirect()->route('news.index')->with('error', $e->getMessage());
        }

        return view('admin.news.edit', compact('data', 'categories', 'keywords'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsRequest $request, $id)
    {
        try {
            DB::beginTransaction();

            $data = array_merge(
                $request->only([
                    'title',
                    'description',
                    'content',
                ]),
                [
                    'user_id' => Auth()->user()->id,
                ]
            );
            if($request->has("image")){
                $file = $request->file('image') ;
                $fileName = $file->getClientOriginalName() ;
                $destinationPath = public_path().'/assets/images/news/' ;
                $file->move($destinationPath,$fileName);
                $data['image'] = $file->getClientOriginalName();
            }

            $song = $this->newsRepo->updateNews($id, $data, $request->input('category') ?? [], $request->input('keyword') ?? []);

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
        try {
            DB::beginTransaction();

            $this->newsRepo->delete($id);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->route('news.index')->with('error', $th->getMessage());
        }

        return redirect()->back()->with('success', 'delete_success');
    }
}
