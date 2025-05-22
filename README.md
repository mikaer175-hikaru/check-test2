# 基礎学習ターム 確認テスト_もぎたて

---

## ✅ 機能概要

- 入力フォーム（バリデーション付き）
- 確認画面（入力内容の表示）
- サンクスページ（送信完了表示）
- 管理画面（検索／削除機能）
- ユーザー登録・ログイン機能

---

## 🚀 環境構築手順

### 1. リポジトリをクローン

```bash
git clone https://github.com/yourusername/your-repo.git
cd your-repo
```

### 2. Docker 起動

```bash
docker compose up -d --build
```

### 3. Laravel 初期設定

```bash
docker compose exec app composer install
docker compose exec app cp .env.example .env
docker compose exec app php artisan key:generate
docker compose exec app php artisan migrate --seed
```

### 4. パーミッション（必要に応じて）

```bash
chmod -R 777 storage bootstrap/cache
```

---

## 🛠 使用技術

- Laravel 10.x
- PHP 8.2
- MySQL 8.0
- Docker / Docker Compose
- CSS：BEM記法

---

## 🗂 URL構成

| 機能           | パス          |
|----------------|---------------|
| 入力ページ     | `/`           |
| 確認ページ     | `/confirm`    |
| サンクスページ | `/thanks`     |
| 管理画面       | `/admin`      |
| ユーザー登録   | `/register`   |
| ログイン       | `/login`      |

---

## 🧩 ER図

※ER図の画像ファイル（PNGなど）をプロジェクト内に配置し、以下のリンクを修正してください。

![ER図](./er-diagram.png)

- テーブル名はスネークケース・複数形
- カラム名はスネークケース
- カーディナリティ（1対多など）を明記

---

## 🔍 提出前チェックリスト

- [ ] マイグレーション・シーディングでエラーが出ないか
- [ ] ダミーデータが正しく作成されているか
- [ ] URLや画面表示に不備がないか
- [ ] GitHubにPush後、cloneして環境構築が可能か
- [ ] テーブル設計と実装・ER図が一致しているか

---

## 📄 ライセンス

このプロジェクトは [MITライセンス](https://opensource.org/licenses/MIT) のもとで公開されています。
