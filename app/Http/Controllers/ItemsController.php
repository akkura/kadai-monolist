<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Item;

class ItemsController extends Controller
{
  
    public function index()
    {
        //
    }

   
    public function create()
    {
        $keyword = request()->keyword;
        $items = [];
        if($keyword){
            $client = new \RakutenRws_Client();
            $client->setApplicationId(env('RAKUTEN_APPLICATION_ID'));
            
            $rws_response = $client->execute('IchibaItemSearch',[
                'keyword' => $keyword,
                'imageFlag' => 1,
                'hits' => 20,
                ]);
            
            // 扱いやすいようにItemとしてインスタンスを作成する(保存はしない)
            foreach($rws_response->getData()['Items'] as $rws_item ) {
                $item = new Item();
                $item->code = $rws_item['Item']['itemCode'];
                $item->name = $rws_item['Item']['itemName'];
                $item->url = $rws_item['Item']['itemUrl'];
                $item->image_url = str_replace('?_ex=128x128', '', $rws_item['Item']['mediumImageUrls'][0]['imageUrl']);
                $items[] = $item;
            }
        }
        
        return view('items.create',[
            'keyword' => $keyword,
            'items' => $items,
        ]);
       
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
