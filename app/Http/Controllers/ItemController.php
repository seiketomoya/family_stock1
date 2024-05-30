<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\item;

class ItemController extends Controller
{
    // indexメソッド: 在庫一覧を表示します。
    public function index()
    {
        $items = Item::all(); // Itemモデルを使用してデータベースから全アイテムを取得
        return view('item.index', compact('items')); // 取得したアイテムをビューに渡す
    }

     // createメソッド: 商品登録フォームを表示します。
     public function create()
     {
         return view('item.create');
     }

     // registerメソッド: 商品登録処理を行います。
     public function register(Request $request)
     {
         // バリデーションルール
         $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'stock' => 'required|integer',
            'category' => 'required|string',
            'user' => 'required|string',
            'memo' => 'nullable|string',
         ]);
 
         // 登録処理を実行
         $item = Item::create($validatedData);
 
         // フラッシュメッセージをセッションに追加
         session()->flash('success', 'ID ' . $item->id . ' の登録は正常に行えました。');
 
         // 一覧画面へ遷移する
         return redirect('/items');
     }

      // editメソッド: 商品編集フォームを表示します。
    public function edit(Item $item)
    {
        return view('item.edit', compact('item'));
    }

    // updateメソッド: 商品情報を更新します。
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'stock' => 'required|integer',
            'category' => 'required|string',
            'user' => 'required|string',
            'memo' => 'nullable|string',// 在庫数の最大文字数を100文字に設定
        ]);

        $item->update($request->all());

        return redirect()->route('items.index')->with('success', '商品情報が更新されました。');
    }

     // destroyメソッドで商品の削除処理。
     public function destroy(Item $item)
     {
         $item->delete();
 
         return redirect()->route('items.index')->with('success', '商品が削除されました。');
     }
 }
 


