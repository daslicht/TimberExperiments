<?php

/**
 * Social bar group
 *
 * @file           social-bar.php
 * @package        Luminescence-Lite 
 * @author         Andre 
 * @copyright      2013 Styledthemes.com
 * @license        license.txt
 * @version        Release: 1.0
 */
?>

<?php if( get_theme_mod( 'hide_social' ) == '') { ?>
	<div id="socialbar">
		<?php $options = get_theme_mods();								
		echo '<div id="social-icons">';										
		if (!empty($options['twitter_uid'])) echo '<a title="Twitter" href="' . $options['twitter_uid'] . '" target="_blank"><div id="twitter" class="genericon"></div></a>';
		if (!empty($options['facebook_uid'])) echo '<a title="Facebook" href="' . $options['facebook_uid'] . '" target="_blank"><div id="facebook" class="genericon"></div></a>';
		if (!empty($options['google_uid'])) echo '<a title="Google+" href="' . $options['google_uid'] . '" target="_blank"><div id="google" class="genericon"></div></a>';			
		if (!empty($options['linkedin_uid'])) echo '<a title="Linkedin" href="' . $options['linkedin_uid'] . '" target="_blank"><div id="linkedin" class="genericon"></div></a>';
		if (!empty($options['pinterest_uid'])) echo '<a title="Pinterest" href="' . $options['pinterest_uid'] . '" target="_blank"><div id="pinterest" class="genericon"></div></a>';
		if (!empty($options['flickr_uid'])) echo '<a title="Flickr" href="' . $options['flickr_uid'] . '" target="_blank"><div id="flickr" class="genericon"></div></a>';
		if (!empty($options['youtube_uid'])) echo '<a title="Youtube" href="' . $options['youtube_uid'] . '" target="_blank"><div id="youtube" class="genericon"></div></a>';
		if (!empty($options['vimeo_uid'])) echo '<a title="Vimeo" href="' . $options['vimeo_uid'] . '" target="_blank"><div id="vimeo" class="genericon"></div></a>';		 
		echo '</div>'
		?>	
	</div>
<?php } ?>