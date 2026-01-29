# 代表電話コネクト（IVR）- WordPressテーマ

## プロジェクト概要
- **サイト名**: 代表電話コネクト
- **テーマ名**: ivr
- **GitHub**: HayanoRyuki/ivr
- **本番URL**: https://ivr.receptionist.jp/
- **ステージングURL**: https://staging.ivr.receptionist.jp/

---

## デプロイ手順（ローカル → GitHub → 本番/staging）

すべての環境で「**ローカルが正**」となるように統一しています。

### 1. ローカルで編集 → Git に送信

```bash
cd "/Users/hayanoryuki12/Local Sites/ivr"
git add .
git commit -m "更新内容"
git push origin main
```

### 2. Staging へ反映（VPN ON必須）

```bash
# SSH接続
ssh -i ~/.ssh/event-invite-key bitnami@staging.ivr.receptionist.jp

# テーマディレクトリで実行
cd /opt/bitnami/wordpress/wp-content/themes/ivr
sudo /usr/bin/git restore .
sudo /usr/bin/git pull origin main
```

### 3. 本番へ反映

```bash
# SSH接続
ssh -i ~/.ssh/event-invite-key bitnami@ivr.receptionist.jp

# テーマディレクトリで実行
cd /opt/bitnami/wordpress/wp-content/themes/ivr
sudo /usr/bin/git restore .
sudo /usr/bin/git pull origin main
```

### 初回のみ必要な設定

```bash
sudo git config --global --add safe.directory /bitnami/wordpress/wp-content/themes/ivr
```

---

## 環境設定（wp-config.php）

以下の定数はGit管理外。各環境のwp-config.phpに直接設定する。

```php
// reCAPTCHA v3
define('IVR_RECAPTCHA_SITE_KEY', 'サイトキー');
define('IVR_RECAPTCHA_SECRET_KEY', 'シークレットキー');

// Pardot
define('IVR_PARDOT_CONTACT_ENDPOINT', 'お問い合わせ用エンドポイント');
define('IVR_PARDOT_REQUEST_ENDPOINT', '資料請求用エンドポイント');

// Slack Webhook
define('IVR_SLACK_WEBHOOK_URL', 'Webhook URL');
```

---

## カスタム投稿タイプ

| 投稿タイプ | スラッグ | 用途 |
|-----------|---------|------|
| resource | /resource/ | 資料（ホワイトペーパー等） |
| case | /case/ | 導入事例 |
| event | /event/ | イベント・セミナー |

---

## フォーム関連

### フォームファイル
- `form-parts/request-form.php` - 資料請求フォーム
- `form-parts/contact-form.php` - お問い合わせフォーム

### スパム対策
1. **Honeypot**: 隠しフィールド（website_url）
2. **reCAPTCHA v3**: スコア0.5以上で通過

### 送信処理
- `inc/form-handler.php` - AJAX処理、バリデーション
- `inc/recaptcha.php` - reCAPTCHA検証
- `inc/pardot.php` - Pardot連携
- Slack通知: form-handler.php内の`ivr_send_slack_notification()`

### サンクスページ
- `/resource-thanks/` - 資料請求完了
- `/contact-thanks/` - お問い合わせ完了

---

## ヘッダー/フッターバリエーション

| ファイル | 用途 |
|----------|------|
| header.php | 通常ヘッダー（ナビあり） |
| header-resource.php | 資料詳細用（ロゴのみ中央揃え） |
| footer.php | 通常フッター（CTAあり） |
| footer-simple.php | CTAなしフッター |
| footer-resource.php | 最小フッター（©のみ） |

---

## メタボックス（カスタムフィールド）

### 資料（resource）
- `inc/resource-meta.php`
- フィールド: ページ数、最終更新日、対象者、資料の主な内容、おすすめポイント

### 導入事例（case）
- `inc/case-functions.php`
- 外部確認URL機能付き

---

## CSS構成

```
assets/css/
├── common.css          # 共通スタイル
├── front-page.css      # トップページ
├── archive.css         # アーカイブ共通
├── archive-resource.css # 資料一覧
├── archive-case.css    # 導入事例一覧
├── archive-event.css   # イベント一覧
├── single-resource.css # 資料詳細
├── single-case.css     # 導入事例詳細
└── single-event.css    # イベント詳細
```

---

## 運用ポイント

- ローカル → GitHub → サーバー の**一方向に統一**
- サーバー側でファイル編集を**絶対にしない**
- `git restore .` によりサーバー側の変更を常に破棄
- Bitnami は `safe.directory` の設定が必須
- 反映前には必ず **VPN ON**
- wp-config.php の機密情報は**Git管理外**
