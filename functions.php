<?php
if (!defined('ABSPATH')) exit;

function gtvafrik_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', [
        'height' => 90,
        'width' => 300,
        'flex-height' => true,
        'flex-width' => true,
    ]);
    add_theme_support('html5', ['search-form','gallery','caption','style','script']);
    add_theme_support('responsive-embeds');
    add_theme_support('align-wide');
    register_nav_menus([
        'primary' => __('Primary Menu', 'gtvafrik'),
        'footer' => __('Footer Menu', 'gtvafrik'),
    ]);
}
add_action('after_setup_theme', 'gtvafrik_setup');

function gtvafrik_assets() {
    $css_path = get_template_directory() . '/assets/css/theme.css';
    $js_path = get_template_directory() . '/assets/js/theme.js';
    $version = wp_get_theme()->get('Version');
    wp_enqueue_style('gtvafrik-fonts', 'https://fonts.googleapis.com/css2?family=DM+Mono:wght@400;500&family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Space+Grotesk:wght@400;500;600;700&display=swap', [], null);
    wp_enqueue_style('gtvafrik-theme', get_template_directory_uri() . '/assets/css/theme.css', [], file_exists($css_path) ? filemtime($css_path) : $version);
    wp_enqueue_script('gtvafrik-theme', get_template_directory_uri() . '/assets/js/theme.js', [], file_exists($js_path) ? filemtime($js_path) : $version, true);
}
add_action('wp_enqueue_scripts', 'gtvafrik_assets');

function gtvafrik_resource_hints($urls, $relation_type) {
    if ('preconnect' === $relation_type) {
        $urls[] = ['href' => 'https://fonts.googleapis.com', 'crossorigin' => 'anonymous'];
        $urls[] = ['href' => 'https://fonts.gstatic.com', 'crossorigin' => 'anonymous'];
    }
    return $urls;
}
add_filter('wp_resource_hints', 'gtvafrik_resource_hints', 10, 2);

function gtvafrik_reading_time($post_id = null) {
    $post_id = $post_id ?: get_the_ID();
    $content = wp_strip_all_tags(get_post_field('post_content', $post_id));
    $words = str_word_count($content);
    return max(1, (int) ceil($words / 220));
}

function gtvafrik_primary_category($post_id = null) {
    $categories = get_the_category($post_id ?: get_the_ID());
    return !empty($categories) ? $categories[0] : null;
}

function gtvafrik_excerpt($length = 22) {
    return wp_trim_words(get_the_excerpt(), $length, '…');
}

function gtvafrik_post_count_label() {
    $count = (int) wp_count_posts('post')->publish;
    return sprintf(_n('%s published story', '%s published stories', $count, 'gtvafrik'), number_format_i18n($count));
}

function gtvafrik_posts_page_url() {
    $page_id = (int) get_option('page_for_posts');
    return $page_id ? get_permalink($page_id) : home_url('/newsroom/');
}

function gtvafrik_media_url($filename) {
    global $wpdb;
    static $cache = [];
    if (isset($cache[$filename])) return $cache[$filename];
    $like = '%/' . $wpdb->esc_like($filename);
    $attachment_id = $wpdb->get_var($wpdb->prepare(
        "SELECT post_id FROM {$wpdb->postmeta} WHERE meta_key = '_wp_attached_file' AND meta_value LIKE %s ORDER BY post_id DESC LIMIT 1",
        $like
    ));
    $cache[$filename] = $attachment_id ? wp_get_attachment_url((int) $attachment_id) : '';
    return $cache[$filename];
}

function gtvafrik_handle_contact() {
    if (!isset($_POST['gtvafrik_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['gtvafrik_nonce'])), 'gtvafrik_contact')) {
        wp_die('The form session expired. Please return and try again.');
    }
    $name = sanitize_text_field(wp_unslash($_POST['name'] ?? ''));
    $email = sanitize_email(wp_unslash($_POST['email'] ?? ''));
    $project = sanitize_text_field(wp_unslash($_POST['project'] ?? ''));
    $message = sanitize_textarea_field(wp_unslash($_POST['message'] ?? ''));
    $phone = sanitize_text_field(wp_unslash($_POST['phone'] ?? ''));
    $address = sanitize_text_field(wp_unslash($_POST['address'] ?? ''));
    $context = sanitize_key(wp_unslash($_POST['form_context'] ?? 'brief'));
    if (!$name || !is_email($email) || ('contact' !== $context && !$message)) wp_die('Please complete all required fields.');
    $subject = sprintf('%s from %s', 'contact' === $context ? 'Website contact' : 'Website brief', $name);
    $body = "Name: {$name}\nEmail: {$email}\nPhone: {$phone}\nAddress: {$address}\nProject: {$project}\n\n{$message}";
    wp_mail('info@gtvafrik.com', $subject, $body, ['Reply-To: ' . $name . ' <' . $email . '>']);
    wp_safe_redirect(add_query_arg('contact', 'sent', home_url('/#contact')));
    exit;
}
add_action('admin_post_gtvafrik_contact', 'gtvafrik_handle_contact');
add_action('admin_post_nopriv_gtvafrik_contact', 'gtvafrik_handle_contact');



/**
 * Render the GTVAFRIK header consistently, including pages previously controlled
 * by an Elementor Theme Builder header.
 */
function gtvafrik_render_global_header() {
    get_template_part('template-parts/home-header');
}
add_action('wp_body_open', 'gtvafrik_render_global_header', 20);


/**
 * Ensure the four public legal pages exist after theme updates.
 */
function gtvafrik_ensure_legal_pages() {
    $pages = [
        'disclaimer'     => 'Disclaimer',
        'cookies-policy' => 'Cookies Policy',
        'privacy-policy' => 'Privacy Policy',
        'terms-of-use'   => 'Terms of Use',
        'book-a-call'   => 'Book a Call',
        'contact-us'    => 'Contact Us',
        'past-work'     => 'Past Work',
    ];
    foreach ($pages as $slug => $title) {
        if (!get_page_by_path($slug, OBJECT, 'page')) {
            wp_insert_post([
                'post_title'   => $title,
                'post_name'    => $slug,
                'post_type'    => 'page',
                'post_status'  => 'publish',
                'post_content' => '',
            ]);
        }
    }
}
add_action('init', 'gtvafrik_ensure_legal_pages');


/**
 * Shared enquiry form used by the booking and contact pages.
 */
function gtvafrik_contact_form($heading = 'Booking desk') { ?>
    <form class="booking-form action-page__form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
      <input type="hidden" name="action" value="gtvafrik_contact"><?php wp_nonce_field('gtvafrik_contact','gtvafrik_nonce'); ?>
      <p class="eyebrow"><?php echo esc_html($heading); ?></p>
      <label>Your name<input name="name" required autocomplete="name" placeholder="Tell us what to call you"></label>
      <label>Email address<input name="email" type="email" required autocomplete="email" placeholder="you@company.com"></label>
      <label>Project type<select name="project"><option>Brand & Campaign</option><option>Programming & Production</option><option>Advocacy & Impact</option><option>Media Partnership</option><option>General enquiry</option><option>Other</option></select></label>
      <label>A little about the brief<textarea name="message" required rows="5" placeholder="What are we making matter?"></textarea></label>
      <button class="button button--pill" type="submit">Send the brief <span aria-hidden="true">↗</span></button>
    </form>
<?php }


/** Compact contact-details form for the Contact Us page. */
function gtvafrik_simple_contact_form() { ?>
    <form class="booking-form action-page__form contact-details-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
      <input type="hidden" name="action" value="gtvafrik_contact"><input type="hidden" name="form_context" value="contact"><?php wp_nonce_field('gtvafrik_contact','gtvafrik_nonce'); ?>
      <p class="eyebrow">Contact GTVAFRIK</p>
      <label>Your name<input name="name" required autocomplete="name" placeholder="Tell us what to call you"></label>
      <label>Email address<input name="email" type="email" required autocomplete="email" placeholder="you@company.com"></label>
      <label>Phone number<input name="phone" type="tel" required autocomplete="tel" placeholder="+234 …"></label>
      <label>Address<input name="address" required autocomplete="street-address" placeholder="Your city and address"></label>
      <button class="button button--pill" type="submit">Contact us <span aria-hidden="true">↗</span></button>
    </form>
<?php }


/**
 * Editable Past Work and Team content managed from the WordPress dashboard.
 */
function gtvafrik_register_showcase_types() {
    register_post_type('gtv_work', [
        'labels' => ['name'=>'Past Work','singular_name'=>'Work Item','add_new_item'=>'Add Work Item','edit_item'=>'Edit Work Item'],
        'public'=>true,'show_in_rest'=>true,'menu_icon'=>'dashicons-format-video',
        'supports'=>['title','thumbnail','page-attributes'],
        'rewrite'=>['slug'=>'work'],
    ]);
    register_post_type('gtv_team', [
        'labels' => ['name'=>'Team Members','singular_name'=>'Team Member','add_new_item'=>'Add Team Member','edit_item'=>'Edit Team Member'],
        'public'=>false,'show_ui'=>true,'show_in_rest'=>true,'menu_icon'=>'dashicons-groups',
        'supports'=>['title','thumbnail','page-attributes'],
    ]);
}
add_action('init','gtvafrik_register_showcase_types');

function gtvafrik_showcase_meta_boxes() {
    add_meta_box('gtvafrik_work_media','Work video and link','gtvafrik_work_meta_box','gtv_work','normal','high');
    add_meta_box('gtvafrik_team_details','Team member details','gtvafrik_team_meta_box','gtv_team','normal','high');
}
add_action('add_meta_boxes','gtvafrik_showcase_meta_boxes');

function gtvafrik_work_meta_box($post) {
    wp_nonce_field('gtvafrik_showcase_meta','gtvafrik_showcase_nonce');
    $video = get_post_meta($post->ID,'_gtv_work_video',true);
    $redirect = get_post_meta($post->ID,'_gtv_work_redirect',true);
    $description = get_post_field('post_content',$post->ID); ?>
    <p><label for="gtv_work_video"><strong>Video URL</strong></label><br><input class="widefat" id="gtv_work_video" name="gtv_work_video" type="url" value="<?php echo esc_attr($video); ?>" placeholder="YouTube URL or Media Library video URL"></p>
    <p><button class="button" id="gtv-select-video" type="button">Select video from Media Library</button></p>
    <p><label for="gtv_work_redirect"><strong>Optional redirect URL</strong></label><br><input class="widefat" id="gtv_work_redirect" name="gtv_work_redirect" type="url" value="<?php echo esc_attr($redirect); ?>" placeholder="https://…"></p>
    <p><label for="gtv_work_description"><strong>Project summary</strong></label><br><textarea class="widefat" rows="5" id="gtv_work_description" name="gtv_work_description" placeholder="Short description shown on the work card"><?php echo esc_textarea($description); ?></textarea></p><p>Use the Featured Image panel for the thumbnail.</p>
<?php }

function gtvafrik_team_meta_box($post) {
    wp_nonce_field('gtvafrik_showcase_meta','gtvafrik_showcase_nonce');
    $designation=get_post_meta($post->ID,'_gtv_team_designation',true);
    $location=get_post_meta($post->ID,'_gtv_team_location',true);
    $bio=get_post_field('post_content',$post->ID); ?>
    <p><label><strong>Designation</strong><br><input class="widefat" name="gtv_team_designation" value="<?php echo esc_attr($designation); ?>"></label></p>
    <p><label><strong>Location</strong><br><input class="widefat" name="gtv_team_location" value="<?php echo esc_attr($location); ?>"></label></p>
    <p><label><strong>Short bio</strong><br><textarea class="widefat" rows="6" name="gtv_team_bio" placeholder="A concise professional biography"><?php echo esc_textarea($bio); ?></textarea></label></p><p>Use the Featured Image panel for the portrait.</p>
<?php }

function gtvafrik_save_showcase_meta($post_id) {
    if (!isset($_POST['gtvafrik_showcase_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['gtvafrik_showcase_nonce'])),'gtvafrik_showcase_meta') || (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) || !current_user_can('edit_post',$post_id)) return;
    if ('gtv_work'===get_post_type($post_id)) {
        update_post_meta($post_id,'_gtv_work_video',esc_url_raw(wp_unslash($_POST['gtv_work_video'] ?? '')));
        update_post_meta($post_id,'_gtv_work_redirect',esc_url_raw(wp_unslash($_POST['gtv_work_redirect'] ?? '')));
        gtvafrik_update_showcase_content($post_id,wp_kses_post(wp_unslash($_POST['gtv_work_description'] ?? '')));
    }
    if ('gtv_team'===get_post_type($post_id)) {
        update_post_meta($post_id,'_gtv_team_designation',sanitize_text_field(wp_unslash($_POST['gtv_team_designation'] ?? '')));
        update_post_meta($post_id,'_gtv_team_location',sanitize_text_field(wp_unslash($_POST['gtv_team_location'] ?? '')));
        gtvafrik_update_showcase_content($post_id,wp_kses_post(wp_unslash($_POST['gtv_team_bio'] ?? '')));
    }
}
add_action('save_post','gtvafrik_save_showcase_meta');

function gtvafrik_showcase_admin_assets($hook) {
    global $post;
    if (!in_array($hook,['post.php','post-new.php'],true) || !$post || 'gtv_work'!==$post->post_type) return;
    wp_enqueue_media();
    wp_add_inline_script('media-editor', "document.addEventListener('DOMContentLoaded',function(){var b=document.getElementById('gtv-select-video'),i=document.getElementById('gtv_work_video');if(!b||!i)return;b.addEventListener('click',function(e){e.preventDefault();var f=wp.media({title:'Select a work video',library:{type:'video'},button:{text:'Use this video'},multiple:false});f.on('select',function(){i.value=f.state().get('selection').first().toJSON().url;});f.open();});});");
}
add_action('admin_enqueue_scripts','gtvafrik_showcase_admin_assets');

function gtvafrik_youtube_id($url) {
    if (preg_match('~(?:youtu\.be/|youtube(?:-nocookie)?\.com/(?:watch\?v=|embed/|shorts/))([A-Za-z0-9_-]{6,})~',$url,$match)) return $match[1];
    return '';
}

function gtvafrik_render_work_card($post_id,$index=1) {
    $video=get_post_meta($post_id,'_gtv_work_video',true);
    if (!$video) { $media_filename=get_post_meta($post_id,'_gtv_work_media_filename',true); if ($media_filename) $video=gtvafrik_media_url($media_filename); }
    $redirect=get_post_meta($post_id,'_gtv_work_redirect',true);
    $youtube=gtvafrik_youtube_id($video);
    $type=$youtube?'youtube':'video';
    $source=$youtube?'https://www.youtube-nocookie.com/embed/'.$youtube.'?autoplay=1':$video;
    $thumb=get_the_post_thumbnail_url($post_id,'large');
    if (!$thumb && $youtube) $thumb='https://i.ytimg.com/vi/'.$youtube.'/hqdefault.jpg';
    $title=get_the_title($post_id);
    $summary=wp_trim_words(wp_strip_all_tags(get_post_field('post_content',$post_id)),10,'…');
    $classes=['coral','cyan','yellow'];
    $class=$classes[($index-1)%count($classes)]; ?>
    <article class="proof-card proof-card--<?php echo esc_attr($class); ?>" data-proof-type="<?php echo esc_attr($type); ?>" data-proof-src="<?php echo esc_url($source); ?>" data-proof-title="<?php echo esc_attr($title); ?>" data-proof-redirect="<?php echo esc_url($redirect); ?>">
      <?php if ($thumb) : ?><span class="proof-card__preview" aria-hidden="true"><img src="<?php echo esc_url($thumb); ?>" alt=""></span><?php elseif ($video && !$youtube) : ?><span class="proof-card__preview" aria-hidden="true"><video muted loop playsinline preload="metadata" src="<?php echo esc_url($video); ?>"></video></span><?php endif; ?>
      <span class="proof-card__shade" aria-hidden="true"></span><span class="proof-card__case">Case / <?php echo esc_html(str_pad((string)$index,2,'0',STR_PAD_LEFT)); ?></span><span class="proof-card__shape" aria-hidden="true"></span><span class="proof-card__meta"><?php echo esc_html($summary ?: 'GTVAFRIK production'); ?></span><strong><?php echo esc_html($title); ?></strong>
      <span class="proof-card__actions"><?php if ($video) : ?><button type="button" class="proof-card__watch">Watch the work <b aria-hidden="true">▶</b></button><?php endif; ?><?php if ($redirect) : ?><a href="<?php echo esc_url($redirect); ?>">View project <b aria-hidden="true">↗</b></a><?php endif; ?></span>
    </article>
<?php }


/** GTVAFRIK showcase defaults and streamlined editorial admin. */
function gtvafrik_seed_default_work() {
    if (get_option('gtvafrik_default_work_seeded_v1')) return;
    $items = [
        ['Citizen Autopsy','DOCUMENTARY · PUBLIC INTEREST','https://www.youtube.com/watch?v=dK0AzE0KYjI','',1],
        ["Men's Table",'ORIGINAL PROGRAMMING · CULTURE','','Mens-Table.mp4',2],
        ['The Rock Restaurant Zanzibar','TRAVEL · HOSPITALITY','','The-Rock-Zanzibar.mp4',3],
    ];
    foreach ($items as $item) {
        $existing = new WP_Query(['post_type'=>'gtv_work','post_status'=>'any','title'=>$item[0],'fields'=>'ids','posts_per_page'=>1,'no_found_rows'=>true]);
        if ($existing->have_posts()) continue;
        $post_id = wp_insert_post(['post_type'=>'gtv_work','post_status'=>'publish','post_title'=>$item[0],'post_content'=>$item[1],'menu_order'=>$item[4]]);
        if (!is_wp_error($post_id)) {
            if ($item[2]) update_post_meta($post_id,'_gtv_work_video',$item[2]);
            if ($item[3]) update_post_meta($post_id,'_gtv_work_media_filename',$item[3]);
        }
    }
    update_option('gtvafrik_default_work_seeded_v1',1,false);
}
add_action('init','gtvafrik_seed_default_work',30);

function gtvafrik_remove_comment_url_field($fields) { unset($fields['url']); return $fields; }
add_filter('comment_form_default_fields','gtvafrik_remove_comment_url_field');

function gtvafrik_work_admin_columns($columns) {
    return ['cb'=>$columns['cb'],'gtv_thumb'=>'Preview','title'=>'Work title','gtv_source'=>'Video source','date'=>'Published'];
}
add_filter('manage_gtv_work_posts_columns','gtvafrik_work_admin_columns');
function gtvafrik_team_admin_columns($columns) {
    return ['cb'=>$columns['cb'],'gtv_thumb'=>'Portrait','title'=>'Team member','gtv_role'=>'Designation','gtv_location'=>'Location','date'=>'Published'];
}
add_filter('manage_gtv_team_posts_columns','gtvafrik_team_admin_columns');

function gtvafrik_showcase_admin_column($column,$post_id) {
    if ('gtv_thumb' === $column) {
        if (has_post_thumbnail($post_id)) echo get_the_post_thumbnail($post_id,[72,72]);
        else echo '<span class="gtv-admin-placeholder">No image</span>';
    }
    if ('gtv_source' === $column) {
        $video=get_post_meta($post_id,'_gtv_work_video',true);
        $filename=get_post_meta($post_id,'_gtv_work_media_filename',true);
        echo '<span class="gtv-admin-pill">'.esc_html(gtvafrik_youtube_id($video)?'YouTube':($video||$filename?'Media Library':'Not set')).'</span>';
    }
    if ('gtv_role' === $column) echo esc_html(get_post_meta($post_id,'_gtv_team_designation',true) ?: '—');
    if ('gtv_location' === $column) echo esc_html(get_post_meta($post_id,'_gtv_team_location',true) ?: '—');
}
add_action('manage_gtv_work_posts_custom_column','gtvafrik_showcase_admin_column',10,2);
add_action('manage_gtv_team_posts_custom_column','gtvafrik_showcase_admin_column',10,2);

function gtvafrik_showcase_admin_notice() {
    $screen=get_current_screen();
    if (!$screen || !in_array($screen->post_type,['gtv_work','gtv_team'],true) || 'edit' !== $screen->base) return;
    $is_work='gtv_work'===$screen->post_type;
    echo '<div class="notice gtvafrik-admin-intro"><h2>'.esc_html($is_work?'Manage Past Work':'Manage the GTVAFRIK Team').'</h2><p>'.esc_html($is_work?'Add a title, description, thumbnail and either a YouTube or Media Library video. Published items appear on the homepage and Past Work page automatically.':'Add a portrait, name, designation, location and short bio. Published profiles appear in the homepage carousel automatically.').'</p></div>';
}
add_action('admin_notices','gtvafrik_showcase_admin_notice');

function gtvafrik_showcase_admin_styles() {
    $screen=get_current_screen();
    if (!$screen || !in_array($screen->post_type,['gtv_work','gtv_team'],true)) return; ?>
    <style>
      body.post-type-gtv_work,body.post-type-gtv_team{--gtv-navy:#071936;--gtv-blue:#38b6ff}
      .gtvafrik-admin-intro{border-left:5px solid var(--gtv-blue);padding:18px 22px;background:linear-gradient(105deg,#071936,#103a60);color:#fff}
      .gtvafrik-admin-intro h2{margin:0 0 6px;color:#fff;font-size:22px}.gtvafrik-admin-intro p{margin:0;color:#c4d4e7}
      body.post-type-gtv_work .wp-heading-inline,body.post-type-gtv_team .wp-heading-inline{font-weight:700}
      body.post-type-gtv_work .page-title-action,body.post-type-gtv_team .page-title-action{background:var(--gtv-blue)!important;border-color:var(--gtv-blue)!important;color:#071936!important;border-radius:999px;padding:7px 16px}
      body.post-type-gtv_work .wp-list-table,body.post-type-gtv_team .wp-list-table{border-radius:10px;overflow:hidden;box-shadow:0 8px 28px rgba(7,25,54,.08)}
      .column-gtv_thumb{width:92px}.column-gtv_thumb img{width:64px;height:64px;object-fit:cover;border-radius:8px}.gtv-admin-placeholder{display:grid;place-items:center;width:64px;height:64px;border:1px dashed #9fb2c5;border-radius:8px;color:#66778a;font-size:11px}
      .gtv-admin-pill{display:inline-block;padding:5px 10px;border-radius:999px;background:#dff4ff;color:#07517b;font-weight:600}
      #gtvafrik_work_media,#gtvafrik_team_details{border:0;border-radius:10px;box-shadow:0 8px 28px rgba(7,25,54,.1);overflow:hidden}
      #gtvafrik_work_media .postbox-header,#gtvafrik_team_details .postbox-header{background:#071936;color:#fff}#gtvafrik_work_media .hndle,#gtvafrik_team_details .hndle{color:#fff}
      #gtvafrik_work_media .inside,#gtvafrik_team_details .inside{padding:18px 22px}#gtvafrik_work_media input,#gtvafrik_team_details input{padding:10px 12px;border-radius:7px}
    </style>
<?php }
add_action('admin_head','gtvafrik_showcase_admin_styles');


function gtvafrik_showcase_uses_custom_editor($use_block_editor,$post_type) {
    if (in_array($post_type,['gtv_work','gtv_team'],true)) return false;
    return $use_block_editor;
}
add_filter('use_block_editor_for_post_type','gtvafrik_showcase_uses_custom_editor',10,2);

function gtvafrik_update_showcase_content($post_id,$content) {
    if (get_post_field('post_content',$post_id) === $content) return;
    remove_action('save_post','gtvafrik_save_showcase_meta');
    wp_update_post(['ID'=>$post_id,'post_content'=>$content]);
    add_action('save_post','gtvafrik_save_showcase_meta');
}
