$category = get_queried_object();
$cat_dropdown = wp_dropdown_categories(array('show_option_none'=>'All News','class'=>'','value_field'=>'slug','selected'=>$category->slug, 'echo'=>false));
<?php echo $cat_dropdown; ?>
