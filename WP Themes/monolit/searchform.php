<?php
/* banner-php */

?>
<div class="searh-holder">
	<form role="search" method="get" class="searh-inner" action="<?php echo esc_url(home_url( '/' ) ); ?>">
		<input name="s" type="text" class="search" placeholder="<?php echo esc_attr_x( 'Search...', 'placeholder','monolit' ) ?>" value="<?php echo get_search_query() ?>" title="<?php echo esc_attr_x( '', 'label','monolit' ) ?>"/>
		<button class="search-submit" id="submit_btn"><i class="fa fa-search transition"></i> </button>
	</form>
</div>