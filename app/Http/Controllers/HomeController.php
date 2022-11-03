<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Artisan;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function refresh()
    {
        Artisan::call('cache:clear');
        Artisan::call('route:cache');
        Artisan::call('route:clear');
        Artisan::call('view:clear');
        Artisan::call('config:cache');
        return redirect()->back();
    }

    public function index()
    {
        return view('home');
    }

    public function show($slug)
    {
        $data = News::findBySlugOrFail($slug);
        // dd($data);
        return view('client.show', ["data" => $data]);
    }
}
