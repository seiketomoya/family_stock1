<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>品物の登録</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2 class="mb-4">品物の登録</h2>
        <form action="{{ route('items.create') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">品名</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="stock">在庫数</label>
                <input type="number" class="form-control" id="stock" name="stock">
            </div>
            <div class="form-group">
                <label for="category">カテゴリー</label>
                <select class="form-control" id="category" name="category">
                    <option>選択してください</option>
                    <option value="食料品">食料品</option>
                    <option value="日用品">日用品</option>
                    <option value="子供用品">子供用品</option>
                    <option value="薬品">薬品</option>
                    <option value="その他">その他</option>
                </select>
            </div>
                <div class="form-group">
                    <label for="user">使用者</label>
                    <select class="form-control" id="user" name="user">
                        <option value="">選択してください</option>
                        <option value="智也">智也</option>
                        <option value="亜樹">亜樹</option>
                        <option value="寧々花">寧々花</option>
                        <option value="希々椛">希々椛</option>
                        <option value="家族全員">家族全員</option>
                        <option value="大人のみ">大人のみ</option>
                        <option value="子供たち">子供たち</option>
                    </select>
                </div>
                    <div class="form-group">
                    <label for="memo">メモ</label>
                    <textarea class="form-control" id="memo" name="memo"></textarea>
                    </div>

                        <button type="submit" class="btn btn-primary">登録する</button>
        </form>
    </div>
    <!-- Bootstrap JS and dependencies (Optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
