<?php
/**
 * The template for displaying search forms
 *
 * @package justg
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="sr-only" for="s"><?php esc_html_e( 'Search', 'justg' ); ?></label>
	<div class="input-group">
		<input class="field form-control rounded-0" id="s" name="s" type="text"
			placeholder="<?php esc_attr_e( 'Search &hellip;', 'justg' ); ?>" value="<?php the_search_query(); ?>">
		<span class="input-group-append">
			<input class="submit btn btn-secondary rounded-0" id="searchsubmit" name="submit" type="submit"
			value="<?php esc_attr_e( 'Search', 'justg' ); ?>">
		</span>
	</div>
</form>
