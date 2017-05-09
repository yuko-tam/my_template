	    	<h1 class="headline1">施工事例</h1>
	    	<p>志馬建設がモットーとしているのは、一軒ごとにテーマを持った「コンセプト住宅」です。<br>横浜市内の注文住宅をご検討中の方はぜひ、家づくりの参考にご覧ください。</p>
	    	<ul class="ancList">
	    	    <li><a href="<?php echo home_url();?>/works/">ALL</a></li>
	    	    <li<?php if(esc_html(get_queried_object()->name) == "コンセプト住宅"):?> class="current"<?php endif; ?>><a href="<?php echo home_url();?>/works/category/concept/"><span>コンセプト</span>住宅</a></li>
	    	    <li<?php if(esc_html(get_queried_object()->name) == "注文住宅"):?> class="current"<?php endif; ?>><a href="<?php echo home_url();?>/works/category/order/">注文住宅</a></li>
		    </ul>


			<ul class="worksList">

<?php include get_template_directory().'/common/works-list-block.php';?>


			</ul>

