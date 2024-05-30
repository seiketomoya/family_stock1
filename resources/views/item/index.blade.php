<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>おウチの在庫管理表</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        .custom-title {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-weight: bold;
            color: #333; /* テキストカラーをダークグレーに変更 */
            background-color: #f8f9fa; /* 落ち着いたグレー */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: 2px solid #dee2e6; /* ボーダーカラーを灰色に変更 */
            transition: background-color 0.3s ease;
        }
        .custom-title:hover {
            background-color: #e9ecef; /* ホバー時の色を明るいグレーに変更 */
        }

        .memo-column {
            width: 250px; /* メモの横幅を調整 */
        }

         /* スマートフォン対応 */
         @media (max-width: 768px) {
            .custom-title {
                font-size: 1.2rem;
                padding: 10px;
            }
            .table-responsive {
                overflow-x: auto;
            }
            .btn {
                font-size: 0.8rem;
                padding: 5px 10px;
            }
        }

    </style>
</head>
    <body>
    <div class="container">
     <div class="custom-title text-center mt-4 mb-4">
      <h2>おウチの在庫管理表</h2>
     </div>
       <!-- 商品登録ボタン -->
       <div class="text-right mb-4">
       <a href="{{ route('items.create') }}" class="btn btn-primary">登録へ</a>
       </div>
            <div class="table-responsive">
            <table class="table table-bordered table-striped text-center">
                <thead class="thead-light">
                <tr>
                    <th>品名</th>
                    <th>在庫数</th>
                    <th>カテゴリー</th>
                    <th>使用者</th>
                    <th>更新日</th>
                    <th class="memo-column">メモ</th>
                    <th>更新</th>
                    <th>削除</th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr>
                    <td>{{ $item->name }}</td>
                    <td class="stock">{{ $item->stock }}</td>
                    <td>{{ $item->category }}</td>
                    <td>{{ $item->user }}</td>
                    <td>{{ $item->updated_at->format('Y.m.d H:i') }}</td>
                    <td>{{ $item->memo }}</td>
                    <td><a href="{{ route('items.edit', $item->id) }}" class="btn btn-success">在庫の編集</a></td>
                    <td>
                            <form action="{{ route('items.destroy', $item->id) }}" method="POST" onsubmit="return confirm('本当に削除しますか？');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">項目削除</button>
                            </form>
                    </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
    </div>
    <!-- Bootstrap JS and dependencies (Optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Custom JS 在庫少なくなった時の警告 -->
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            document.querySelectorAll('td.stock').forEach(cell => {
                if (parseInt(cell.textContent) <= 1) { // 閾値を1に設定
                    cell.parentNode.style.backgroundColor = '#ff7777'; // 行全体の背景色を赤に変更
                }
            });
        });
    </script>
    </body>
</html>
