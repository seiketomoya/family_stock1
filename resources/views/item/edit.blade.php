<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品編集</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>商品編集</h1>
        <form action="{{ route('items.update', $item->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">品名</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $item->name }}" required>
            </div>
            <div class="form-group">
                <label for="stock">在庫数</label>
                <input type="number" class="form-control" id="stock" name="stock" value="{{ $item->stock }}" required>
            </div>
            <div class="form-group">
                <label for="category">カテゴリー</label>
                <select class="form-control" id="category" name="category" required>
                    <option value="食料品" {{ $item->category == '食料品' ? 'selected' : '' }}>食料品</option>
                    <option value="日用品" {{ $item->category == '日用品' ? 'selected' : '' }}>日用品</option>
                    <option value="子供用品" {{ $item->category == '子供用品' ? 'selected' : '' }}>子供用品</option>
                    <option value="薬品" {{ $item->category == '薬品' ? 'selected' : '' }}>薬品</option>
                    <option value="その他" {{ $item->category == 'その他' ? 'selected' : '' }}>その他</option>
                    <!-- その他のオプション -->
                </select>
            </div>
            <div class="form-group">
                <label for="user">使用者</label>
                <select class="form-control" id="user" name="user" required>
                    <option value="智也" {{ $item->user == '智也' ? 'selected' : '' }}>智也</option>
                    <option value="亜樹" {{ $item->user == '亜樹' ? 'selected' : '' }}>亜樹</option>
                    <option value="寧々花" {{ $item->user == '寧々花' ? 'selected' : '' }}>寧々花</option>
                    <option value="希々椛" {{ $item->user == '希々椛' ? 'selected' : '' }}>希々椛</option>
                    <option value="家族全員" {{ $item->user == '家族全員' ? 'selected' : '' }}>家族全員</option>
                    <option value="大人のみ" {{ $item->user == '大人のみ' ? 'selected' : '' }}>大人のみ</option>
                    <option value="子供たち" {{ $item->user == '子供たち' ? 'selected' : '' }}>子供たち</option>
                    <!-- その他のオプション -->
                </select>
            </div>
            <div class="form-group">
                <label for="memo">メモ</label>
                <textarea class="form-control" id="memo" name="memo">{{ $item->memo }}</textarea>
            </div>
            <button type="submit" class="btn btn-success">更新</button>
            <a href="{{ route('items.index') }}" class="btn btn-secondary">戻る</a>
        </form>
    </div>
</body>
</html>
