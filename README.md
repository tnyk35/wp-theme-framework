# wp-theme-framework
WordPressの自作テーマを効率よく作成するための骨組みを作成。

## ファイル構成
- template-parts　各ファイルで利用するパーツファイル
- 404.php　404ページ
- archive.php　一覧ページ
- footer.php　フッター
- front-page.php　トップページ
- functions.php　共通関数とかも一旦ここに記載
- header.php　ヘッダー
- index.php　テンプレに当てはまらないページを表示（基本は使わない）
- page.php　固定ページの詳細
- search.php　検索結果ページ
- sidebar.php　サイドバー
- single-xxxx.php　投稿タイプxxxx用詳細ページ
- single.php　記事詳細ページ
- style.css
- taxonomy-xxxx_cat.php　投稿タイプxxxxのタクソノミ（カテゴリ）一覧ページ
- template-lp.php　テンプレートファイル（LP用）

CSSやJSは極力ルートディレクトリに設置する方針。