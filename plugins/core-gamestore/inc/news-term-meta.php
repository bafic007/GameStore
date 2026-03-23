<?php

function news_category_add_meta_field() {
    ?>
    <div class="form-field term-group">
        <label for="news_category_icon"><?php _e('Icon', 'text_domain'); ?></label>
        <input type="text" id="news_category_icon" name="news_category_icon" value="" class="news-category-icon-field">
        <button class="upload-icon-button button"><?php _e('Upload Icon', 'text_domain'); ?></button>
    </div>
    <?php
}
add_action('news_category_add_form_fields', 'news_category_add_meta_field');

function news_category_edit_meta_field($term) {
    $icon = get_term_meta($term->term_id, 'news_category_icon', true);
    ?>
    <tr class="form-field term-group-wrap">
        <th scope="row"><label for="news_category_icon"><?php _e('Icon', 'text_domain'); ?></label></th>
        <td>
            <?php if($icon) {
                echo '<img src="' . esc_url($icon) . '" alt="">';
            } ?>
            <input type="text" style="margin-bottom:14px;" id="news_category_icon" name="news_category_icon" value="<?php echo esc_attr($icon); ?>" class="news-category-icon-field">
            <button class="upload-icon-button button"><?php _e('Upload Icon', 'text_domain'); ?></button>
        </td>
    </tr>
    <?php
}
add_action('news_category_edit_form_fields', 'news_category_edit_meta_field');

function save_news_category_meta($term_id) {
    if (isset($_POST['news_category_icon'])) {
        update_term_meta($term_id, 'news_category_icon', sanitize_text_field($_POST['news_category_icon']));
    }
}
add_action('created_news_category', 'save_news_category_meta');
add_action('edited_news_category', 'save_news_category_meta');

function enqueue_media_uploader() {
    if(isset($_GET['taxonomy']) && $_GET['taxonomy'] == 'news_category') {
      wp_enqueue_media();
      wp_enqueue_script('news-term-meta', GAMESTORE_PLUGIN_URL . '/assets/js/news-term-meta.js', array('jquery'), null, false);
    }
}
add_action('admin_enqueue_scripts', 'enqueue_media_uploader');

function news_category_add_icon_column($columns) {
    $columns['news_category_icon'] = __('Icon', 'text_domain');
    return $columns;
}
add_filter('manage_edit-news_category_columns', 'news_category_add_icon_column');

function news_category_icon_column_content($content, $column_name, $term_id) {
    if($column_name !== 'news_category_icon') {
        return $content;
    }
    $icon = get_term_meta($term_id, 'news_category_icon', true);
    if($icon) {
        $content = '<img src="' . esc_url($icon) . '" alt="" style="max-width: 100px;">';
    }
    return $content;
}
add_filter('manage_news_category_custom_column', 'news_category_icon_column_content', 10, 3);