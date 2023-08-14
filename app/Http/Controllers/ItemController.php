<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\User;

class ItemController extends Controller
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
     * 商品一覧
     */
    public function index(Request $request)
    {   
        $keyword = $request->input('keyword');
        $query = Item::query();
        if(!empty($keyword)) {
            $query= Item::where('name','LIKE', "%$keyword%")
            ->orwhere('type','LIKE',"%$keyword%")
            ->orwhere('detail','LIKE',"%$keyword%");
            $items = $query->get();
        }else{
            $items = Item::all();
        }
        // 商品一覧取得
    
        return view('item.index', compact('items','keyword'));
    }

    /**
     * 商品登録
     */
    public function add(Request $request)
    {
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'name' => 'required|max:100',
            ]);

            // 商品登録
            Item::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'type' => $request->type,
                'detail' => $request->detail,
                'stock' => $request->stock,
            ]);

            return redirect('/items');
        }

        return view('item.add');
    }
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('item.index')
        ->with('message','削除しました。');
    }

    public function edit(Request $request ,Item $item)
    {
        
        return view('item.edit',compact('item'));
        
    }
    public function update(Request $request,Item $item)
    {   
        $item->name = $request->name;
        $item->detail = $request->detail;
        $item->type = $request->type;
        $item->stock = $request->stock;
        $item->save();
        return redirect()->route('item.index');
    }
}
