<?php
/**
 * Template Name: Clean Content Template
 *
 * Clean content of posts.
 *
 * @package ThemeGrill
 * @subpackage ColorMag
 * @since ColorMag 1.0
 */
?>

<?php

$posts = new WP_Query(array(
        'post_type' => 'post',
        'posts_per_page' => -1
    ));
$count = 0;
if ($posts->have_posts()):
    while ($posts->have_posts()):
        $posts->the_post();
        $_post = get_post(get_the_ID());
        $content = $_post->post_content;
        if (preg_match('/<iframe.*src=\"(.*)\".*><\/iframe>/isU', $content)) {
            echo 'Bai viet co the chua virus: '. get_the_ID() .' -> ' . $post->post_title;
            echo '<br/>';
            $count += 1;
        }
        $content = preg_replace('/<iframe.*?\/iframe>/i','', $content);
        $_post->post_content = $content;
        wp_update_post($_post);
    endwhile;//while ($posts->have_posts()):
endif;//if ($posts->have_posts()):
echo '<br/>';
echo 'Đa lam sach noi dung: '. $count .' bai viet';
wp_reset_query();
