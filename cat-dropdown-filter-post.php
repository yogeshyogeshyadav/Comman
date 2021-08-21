$category = get_queried_object();
$cat_dropdown = wp_dropdown_categories(array('show_option_none'=>'All News','class'=>'','value_field'=>'slug','selected'=>$category->slug, 'echo'=>false));
<?php echo $cat_dropdown; ?>


<script>
function onCatChange(dropdown) {
    switch(dropdown.id){
      case 'cat':
        pageSlug = "/latest-news/";
        pageSlugCat = "/latest-news/category/";
        break;
      case 'xplode_mag_category':
        pageSlug = "/xplode-mag/";
        pageSlugCat = "/xplode-mag-category/";
        break;
      default:
        pageSlug = "/404/";
        pageSlugCat = "/404/";
    }
    //console.log(dropdown.value);
    if ( dropdown.options[dropdown.selectedIndex].value != -1 ) {
        location.href = ajax_object.home_url+pageSlugCat+dropdown.options[dropdown.selectedIndex].value+'/';
    }else{
        location.href = ajax_object.home_url+pageSlug;
    }
    dropdown.closest('.form-group').classList.add("loading");
}

$(function () {
    
var dropdownCat = document.getElementById("cat");
if(typeof(dropdownCat) != 'undefined' && dropdownCat != null){
    dropdownCat.onchange = function(){ onCatChange(dropdownCat) };
}
var dropdownXplodeMagCat = document.getElementById("xplode_mag_category");
if(typeof(dropdownXplodeMagCat) != 'undefined' && dropdownXplodeMagCat != null){
    dropdownXplodeMagCat.onchange = function(){ onCatChange(dropdownXplodeMagCat) };
}

});
</script>
