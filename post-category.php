$category_list = get_the_category($post->ID);
foreach($category_list as $cd){
echo '<br/>'.$cd->cat_name;
} 
