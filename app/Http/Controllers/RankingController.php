<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Item;

class RankingController extends Controller
{
     public function want()
    {
        $items = [];
        if (Item::exists()) {
            $items = \DB::table('item_user')->join('items', 'item_user.item_id', '=', 'items.id')->select('items.*', \DB::raw('COUNT(*) as count'))->where('type', 'want')->groupBy('items.id')->orderBy('count', 'DESC')->take(10)->get();
        }

        return view('ranking.want', [
            'items' => $items,
            'type'  => 'Want',
        ]);
    }
    public function have()
    {
        $items = [];
        if (Item::exists()) {
            $items = \DB::table('item_user')->join('items', 'item_user.item_id', '=', 'items.id')->select('items.*', \DB::raw('COUNT(*) as count'))->where('type', 'have')->groupBy('items.id')->orderBy('count', 'DESC')->take(10)->get();
            
            
        }
        
        return view('ranking.have', [
            'items' => $items,
            'type'  =>'Have',
        ]);
    }
   
    public function index()
    {
        //
    }

   
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        //
    }

  
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        //
    }

  
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }
}
