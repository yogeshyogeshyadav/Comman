/***********************************************************************************************/
/* fix no editor on posts page */
/***********************************************************************************************/
function bvg_fix_no_editor_on_posts_page($post)
{
    if($post->ID != get_option('page_for_posts') || post_type_supports('page', 'editor'))
        return;
    
    remove_action('edit_form_after_title', '_wp_posts_page_notice');
    add_post_type_support('page', 'editor');
}
add_action('edit_form_after_title', 'bvg_fix_no_editor_on_posts_page', 0);
/***********************************************************************************************/
