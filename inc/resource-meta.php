<?php
/**
 * 資料（resource）カスタム投稿タイプ用メタボックス
 */

// ======================================
// メタボックスを登録
// ======================================
add_action('add_meta_boxes', 'ivr_resource_add_meta_boxes');

function ivr_resource_add_meta_boxes() {
    add_meta_box(
        'resource_details',
        '資料の詳細情報',
        'ivr_resource_meta_box_callback',
        'resource',
        'normal',
        'high'
    );
}

// ======================================
// メタボックスのHTML出力
// ======================================
function ivr_resource_meta_box_callback($post) {
    wp_nonce_field('ivr_resource_meta_nonce', 'resource_meta_nonce');

    $page_count    = get_post_meta($post->ID, '_resource_page_count', true);
    $last_updated  = get_post_meta($post->ID, '_resource_last_updated', true);
    $target        = get_post_meta($post->ID, '_resource_target', true);
    $main_content  = get_post_meta($post->ID, '_resource_main_content', true);
    $points        = get_post_meta($post->ID, '_resource_points', true);
    ?>

    <style>
        .resource-meta-table { width: 100%; border-collapse: collapse; }
        .resource-meta-table th { width: 150px; text-align: left; padding: 12px 10px; vertical-align: top; background: #f9f9f9; }
        .resource-meta-table td { padding: 12px 10px; }
        .resource-meta-table input[type="text"],
        .resource-meta-table input[type="number"],
        .resource-meta-table input[type="date"],
        .resource-meta-table textarea { width: 100%; }
        .resource-meta-table textarea { min-height: 80px; }
    </style>

    <table class="resource-meta-table">
        <tr>
            <th><label for="resource_page_count">ページ数</label></th>
            <td>
                <input type="number" id="resource_page_count" name="resource_page_count"
                       value="<?php echo esc_attr($page_count); ?>" min="1" style="width: 100px;">
                <span>ページ</span>
            </td>
        </tr>
        <tr>
            <th><label for="resource_last_updated">最終更新日</label></th>
            <td>
                <input type="date" id="resource_last_updated" name="resource_last_updated"
                       value="<?php echo esc_attr($last_updated); ?>" style="width: 200px;">
            </td>
        </tr>
        <tr>
            <th><label for="resource_target">対象者</label></th>
            <td>
                <textarea id="resource_target" name="resource_target" rows="2"><?php echo esc_textarea($target); ?></textarea>
                <p class="description">例：イベント受付の効率化を検討している企業・団体の担当者</p>
            </td>
        </tr>
        <tr>
            <th><label for="resource_main_content">資料の主な内容</label></th>
            <td>
                <textarea id="resource_main_content" name="resource_main_content" rows="3"><?php echo esc_textarea($main_content); ?></textarea>
                <p class="description">例：サービス概要、よくある課題と解決方法、利用フロー、ユースケース</p>
            </td>
        </tr>
        <tr>
            <th><label for="resource_points">おすすめポイント</label></th>
            <td>
                <textarea id="resource_points" name="resource_points" rows="3"><?php echo esc_textarea($points); ?></textarea>
                <p class="description">例：月額料金不要の使い切り型でコストを抑えられる</p>
            </td>
        </tr>
    </table>

    <?php
}

// ======================================
// メタデータを保存
// ======================================
add_action('save_post_resource', 'ivr_resource_save_meta');

function ivr_resource_save_meta($post_id) {
    // Nonceチェック
    if (!isset($_POST['resource_meta_nonce']) ||
        !wp_verify_nonce($_POST['resource_meta_nonce'], 'ivr_resource_meta_nonce')) {
        return;
    }

    // 自動保存時はスキップ
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // 権限チェック
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // 各フィールドを保存
    $fields = [
        'resource_page_count'   => '_resource_page_count',
        'resource_last_updated' => '_resource_last_updated',
        'resource_target'       => '_resource_target',
        'resource_main_content' => '_resource_main_content',
        'resource_points'       => '_resource_points',
    ];

    foreach ($fields as $post_key => $meta_key) {
        if (isset($_POST[$post_key])) {
            $value = sanitize_textarea_field($_POST[$post_key]);
            update_post_meta($post_id, $meta_key, $value);
        }
    }
}

// ======================================
// フロントエンド用：メタデータ取得関数
// ======================================
function ivr_get_resource_meta($post_id = null) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }

    return [
        'page_count'   => get_post_meta($post_id, '_resource_page_count', true),
        'last_updated' => get_post_meta($post_id, '_resource_last_updated', true),
        'target'       => get_post_meta($post_id, '_resource_target', true),
        'main_content' => get_post_meta($post_id, '_resource_main_content', true),
        'points'       => get_post_meta($post_id, '_resource_points', true),
    ];
}

/**
 * 最終更新日をフォーマットして返す
 */
function ivr_format_resource_date($date_str) {
    if (empty($date_str)) {
        return '';
    }
    $timestamp = strtotime($date_str);
    return date_i18n('Y年n月j日', $timestamp);
}
