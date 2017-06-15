        <ul>
            <?php
              $args = array(
                "get"=>"all",
                "fields"=>"all",
                "orderby"=>"id",
                "order"=>"DESC"
                );
               $cats = get_terms("tour_cat", $args);
               foreach($cats as $val) :
                $link = $val->slug;
                $nm = $val->name;
              ?>
                <li><a href="/tour/tour_cat/<?php echo $link;?>"><?php echo $nm;?></a></li>
            <?php endforeach;?>
        </ul>



<?php
$pg_template_path = get_template_directory().'/tour/';
if( get_post_type() == "page" ):
$tour = array(
    'post_type' => 'tour',
    'showposts' => 0
);
query_posts( $tour );
?>
<?php include get_template_directory().'/common/tour-list-block.php';?>
<?php elseif(is_tax()):
?>
<?php include get_template_directory().'/common/tour-list-block.php';?>

<?php elseif(get_post_type() == "tour" ):
	$pg_template_path .= 'single.php';
    include $pg_template_path;
?>

<?php endif;?>

