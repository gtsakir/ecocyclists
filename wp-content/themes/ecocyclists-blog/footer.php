<?php
/**
 * @package WordPress
 * @subpackage Adapt Theme
 */
?>

	</div><!-- /main -->
</div><!-- wrap --> 

 <div class="footer_top"></div>
    <div id="footer" class="clearfix">
    	<div id="wrap"> 
	    	<?php if( wpex_get_data( 'widgetized_footer', '1' ) == '1' ) { ?>
	        	<div id="footer-widget-wrap" class="clearfix">
	            	<div id="footer-one" class="footer-widget-col clearfix">
						<?php dynamic_sidebar('footer-one'); ?>
	                </div><!-- /footer-one -->
	                <div id="footer-two" class="footer-widget-col clearfix">
	                    <?php dynamic_sidebar('footer-two'); ?>
	                </div><!-- /footer-two -->
	                <div id="footer-three" class="footer-widget-col clearfix">
	                    <?php dynamic_sidebar('footer-three'); ?>
	                </div><!-- /footer-three -->
	                <div id="footer-four" class="footer-widget-col clearfix">
	                    <?php dynamic_sidebar('footer-four'); ?>
	                </div><!-- /footer-four -->
	            </div><!-- /footer-widget-wrap -->
	        <?php } ?>
			<!-- /footer-bottom -->
	       </div>
	</div><!-- /footer -->
	<div class="footer-bottom" class="clearfix color_test">
		<div id="wrap2">            
			<div id="copyright">
			<?php if ( wpex_get_data( 'footer_text' ) !== '' ) { ?>
			<?php echo wpex_get_data( 'footer_text' ); ?>
			<?php } else { ?>
			<?php } ?>
<!-- 			Designed & Coded by <a class="signature" href="https://graphicode.gr/" title="Graphicode" target="_blank">Graphicode</a>
 -->
		</div><!-- /copyright -->
		<div id="back-to-top">
			<a  href="#toplink" title="<?php _e('Scroll Up', 'wpex'); ?>"><?php _e('Scroll Up', 'wpex'); ?> &uarr;</a>
		</div><!-- /back-to-top -->a
	</div>
</div>

<?php wp_footer(); ?>
</body>
</html>