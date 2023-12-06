<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function show_view(){
        return view('show');
    }
    public function list(){
        $companies = DB::table('Companies')->get();
        return response()->json(['Result' => 'OK', 'Records' => $companies]);
    }
    public function insert(Request $request){
        DB::table('Companies')->insert([
            'comp_name' => $request->comp_name
        ]);
        return response()->json(['Result' => 'OK']);
    }

    public function update(Request $request){
        $data = $request->all();
        DB::table('Companies')->where('id', $data['id'])->update($data);
        return response()->json(['Result' => 'OK']);
    }

    public function destroy(Request $request){
        $id = $request->input('id');
        DB::table('Companies')->where('id', $id)->delete();
        return response()->json(['Result' => 'OK']);
    }
}
