<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\type;
use App\Models\Item;
use App\Models\User;

class TypeController extends Controller
{
    /**
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        
        $keyword = $request->input('keyword');

        $query = Type::query(); 

        if(!empty($keyword)) {
            $query= Type::where('name','LIKE', "%.$keyword.%");
            $types = $query->get();
        }else{
            $types = Type::all();
        }

       
        return view('types.index', compact('types','keyword'));
    }

    /**
     * カテゴリー登録
     *
     * @param Request $request
     * @return Response
     */
    public function create(Request $request)
    {
        // 新しくレコードを追加する
        $type = new type();
        $type->name = $request->name;
        $type->save();

        return redirect('/types');
    }

    /**
     * カテゴリー編集画面の表示
     * 
     *  @param Request $request
     *  @return Response
     */
    public function edit(Request $request, Type $type)
    {
        $types = type::all();

        return view('types.edit')->with(['type' => $type]);
    }

    /**
     * カテゴリーを編集する
     * 
     *  @param Request $request
     *  @return Response
     */
    public function update(Request $request, Type $type)
    {
        // 上書きする
        $type->name = $request->name;
        $type->save();

        return redirect('/types');
    }

    /**
     * @param Request $request
     * @param type $type
     * @return Response
     */
    public function destroy(Type $type)
    {
        $type->delete();

        return redirect('/types');
    }
}