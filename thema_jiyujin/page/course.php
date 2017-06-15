

<?php
$pg_template_path = get_template_directory().'/course/';
if( get_post_type() == "page" || is_tax()):
$course = array(
    'post_type' => 'course',
    'showposts' => 0
);
query_posts( $course );
?>


<div class="mainTitle">
  <h1 class="headline1"><span class="jp">ツアー一覧</span><span class="en">TOUR</span></h1>
</div>

<div class="breadNav">
  <ul>
    <li><a href="/">HOME</a></li>
    <li>ツアー一覧</li>
  </ul>
</div>


<!-- =======================contents=====contents============================ -->
<main class="contents" id="contents">

  <div class="contentsCont">

    <nav class="categoryMenu borderBlue">
        <ul>
            <?php
              $args = array(
                "get"=>"all",
                "fields"=>"all",
                "orderby"=>"id",
                "order"=>"DESC"
                );
               $cats = get_terms("course_cat", $args);
               foreach($cats as $val) :
                $link = $val->slug;
                $nm = $val->name;
              ?>
                <li><a href="/course/course_cat/<?php echo $link;?>"><?php echo $nm;?></a></li>
            <?php endforeach;?>
        </ul>
    </nav>

<?php include get_template_directory().'/common/course-list-block.php';?>
  </div>

</main>
<!-- /============================contents============================ -->


<?php elseif(get_post_type() == "course" ):
	$pg_template_path .= 'single.php';
    include $pg_template_path;
?>

<?php endif;?>

