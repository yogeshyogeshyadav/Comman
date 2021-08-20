/***********************************************************************************************/
/* Adding style css on dashboard */
/***********************************************************************************************/
function bvg_admin_enqueue_scripts(){
    wp_enqueue_style( 'bvg-admin-css', THEMEURI.'/admin-style.css', array(), 1);
}
add_action( 'admin_enqueue_scripts', 'bvg_admin_enqueue_scripts' );
