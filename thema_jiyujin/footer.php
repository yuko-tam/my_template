
<?php
//↓footer↓
$bodyfooterParts = get_page_by_path('footer', null, '_setting');
if (is_object($bodyfooterParts) && property_exists($bodyfooterParts, 'post_content') && $bodyfooterParts->post_content != '' ): 
?>
<?php
	echo $bodyfooterParts->post_content;
?>
<?php
endif;
//↑footer↑
?>


<?php
//↓body-bottom-tag↓
$bodyBottomTagParts = get_page_by_path('body-bottom-tag', null, '_setting');
if (is_object($bodyBottomTagParts) && property_exists($bodyBottomTagParts, 'post_content') && $bodyBottomTagParts->post_content != '' ): 
?>
<?php
	echo $bodyBottomTagParts->post_content;
?>
<?php
endif;
//↑body-bottom-tag↑
?>

<?php wp_footer();?>

</body>
</html>