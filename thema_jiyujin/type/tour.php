


<?php
$pg_template_path = get_template_directory().'/tour/';
if( get_post_type() == "page" ):
$tour = array(
    'post_type' => 'tour',
    'showposts' => 0
);
query_posts( $tour );
?>
<?php include get_template_directory().'/common/course-list-block.php';?>
<?php elseif(is_tax()):
?>
<div class="mainTitle">
  <h1 class="headline1"><span class="jp">ツアー一覧</span><span class="en">TOUR</span></h1>
</div>

<div class="breadNav">
  <ul>
    <li><a href="/">HOME</a></li>
    <li><a href="/tour/">ツアー一覧</a></li>
    <li></li>
  </ul>
</div>


<!-- =======================contents=====contents============================ -->
<main class="contents" id="contents">

  <div class="contentsCont">

    <nav class="categoryMenu borderBlue">
        <ul>
            <li class="lineBlue"><a href="/tour/">全てのツアー</a></li>
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
                <li class="line<?php echo $link;?>"><a href="/tour/tour_cat/<?php echo $link;?>"><?php echo $nm;?></a></li>
            <?php endforeach;?>
        </ul>
    </nav>

<?php include get_template_directory().'/common/course-list-block.php';?>
  </div>

</main>
<!-- /============================contents============================ -->

<?php elseif(get_post_type() == "tour" ): ?>


<?php

	$pg_template_path .= 'single.php';
    include $pg_template_path;
?>

<?php endif;?>

