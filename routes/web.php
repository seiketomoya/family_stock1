<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController; // ItemControllerを読み込む

// トップページに在庫一覧を表示させるため
Route::get('/', function () {
    return redirect()->route('items.index');
});

// 'item' URLにアクセスするとItemControllerのindexメソッドが呼ばれ、在庫一覧が表示される
Route::get('/items', [ItemController::class, 'index'])->name('items.index');
// 商品登録画面へのルート'items/create' URLにアクセスするとItemControllerのcreateメソッドが呼ばれ、商品登録フォームが表示される
Route::get('/items/create', [ItemController::class, 'create'])->name('items.create');
// 'items/create' URLへのPOSTリクエストを処理し、ItemControllerのregisterメソッドで商品を登録する
Route::post('/items/create', [ItemController::class, 'register']);
// 編集画面へのルート
Route::get('/items/{item}/edit', [ItemController::class, 'edit'])->name('items.edit');
// 更新処理のルート
Route::put('/items/{item}', [ItemController::class, 'update'])->name('items.update');
// 削除処理
Route::delete('/items/{item}', [ItemController::class, 'destroy'])->name('items.destroy');
