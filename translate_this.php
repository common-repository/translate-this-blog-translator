<?php
/*
Plugin Name: Translation
Plugin URI: http://www.translation-services-usa.com/free.php
Description: The best translator plugin for WordPress, over 100 languages are automatically translated easily and instantly. By Translation Cloud.
Version: 2.5.0
Author: Translation Cloud
Author URI: http://www.translation-services-usa.com/
License: GPL2
*/

/*
Copyright 2016 Translation Cloud (email : info@translation-services-usa.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

class TranslateThisWidget {
	private	$button_path		= '/wp-content/plugins/translate-this-blog-translator';
	private	$javascript_path	= '/javascript';
	private	$image_path			= '/images';
	private $translate_this_src;
	private	$translate_this_id;
	private	$tt_skip_jq;
	private $tt_button_id;
	private $tt_first_save;
	private $tt_show_branding;
	private $translate_this_trial_key		= null;
	private $translate_this_trial_expires	= null;
	private $translate_this_languages = array(
		'af' => 'Afrikaans', 
		'sq' => 'Albanian', 
		'am' => 'Amharic', 
		'ar' => 'Arabic', 
		'hy' => 'Armenian', 
		'az' => 'Azerbaijani', 
		'eu' => 'Basque', 
		'be' => 'Belarusian', 
		'bn' => 'Bengali', 
		'bs' => 'Bosnian', 
		'bg' => 'Bulgarian', 
		'ca' => 'Catalan', 
		'ceb' => 'Cebuano', 
		'ny' => 'Chichewa', 
		'zh-CN' => 'Chinese Simplified', 
		'zh-TW' => 'Chinese Traditional', 
		'co' => 'Corsican', 
		'hr' => 'Croatian', 
		'cs' => 'Czech', 
		'da' => 'Danish', 
		'nl' => 'Dutch', 
		'en' => 'English', 
		'eo' => 'Esperanto', 
		'et' => 'Estonian', 
		'tl' => 'Filipino', 
		'fi' => 'Finnish', 
		'fr' => 'French', 
		'fy' => 'Frisian', 
		'gl' => 'Galician', 
		'ka' => 'Georgian', 
		'de' => 'German', 
		'el' => 'Greek', 
		'gu' => 'Gujarati', 
		'ht' => 'Haitian Creole', 
		'ha' => 'Hausa', 
		'haw' => 'Hawaiian', 
		'iw' => 'Hebrew', 
		'hi' => 'Hindi', 
		'hmn' => 'Hmong', 
		'hu' => 'Hungarian', 
		'is' => 'Icelandic', 
		'ig' => 'Igbo', 
		'id' => 'Indonesian', 
		'ga' => 'Irish', 
		'it' => 'Italian', 
		'ja' => 'Japanese', 
		'jw' => 'Javanese', 
		'kn' => 'Kannada', 
		'kk' => 'Kazakh', 
		'km' => 'Khmer', 
		'ko' => 'Korean', 
		'ku' => 'Kurdish', 
		'ky' => 'Kyrgyz', 
		'lo' => 'Lao', 
		'la' => 'Latin', 
		'lv' => 'Latvian', 
		'lt' => 'Lithuanian', 
		'lb' => 'Luxembourgish', 
		'mk' => 'Macedonian', 
		'mg' => 'Malagasy', 
		'ms' => 'Malay', 
		'ml' => 'Malayalam', 
		'mt' => 'Maltese', 
		'mi' => 'Maori', 
		'mr' => 'Marathi', 
		'mn' => 'Mongolian', 
		'my' => 'Myanmar', 
		'ne' => 'Nepali', 
		'no' => 'Norwegian', 
		'ps' => 'Pashto', 
		'fa' => 'Persian', 
		'pl' => 'Polish', 
		'pt' => 'Portuguese', 
		'pa' => 'Punjabi', 
		'ro' => 'Romanian', 
		'ru' => 'Russian', 
		'sm' => 'Samoan', 
		'gd' => 'Scots Gaelic', 
		'sr' => 'Serbian', 
		'st' => 'Sesotho', 
		'sn' => 'Shona', 
		'sd' => 'Sindhi', 
		'si' => 'Sinhala', 
		'sk' => 'Slovak', 
		'sl' => 'Slovenian', 
		'so' => 'Somali', 
		'es' => 'Spanish', 
		'su' => 'Sundanese', 
		'sw' => 'Swahili', 
		'sv' => 'Swedish', 
		'tg' => 'Tajik', 
		'ta' => 'Tamil', 
		'te' => 'Telugu', 
		'th' => 'Thai', 
		'tr' => 'Turkish', 
		'uk' => 'Ukrainian', 
		'ur' => 'Urdu', 
		'uz' => 'Uzbek', 
		'vi' => 'Vietnamese', 
		'cy' => 'Welsh', 
		'xh' => 'Xhosa', 
		'yi' => 'Yiddish', 
		'yo' => 'Yoruba', 
		'zu' => 'Zulu', 
	);
	private $buttons = array(
		1 => array(
			'image_name' => 'translate1.gif', 
			'class_name' => 'translate1', 
			'additional_classes' => 'conveythis-drop', 
		), 
		2 => array(
			'image_name' => 'convey1.gif', 
			'class_name' => 'convey1', 
			'additional_classes' => 'conveythis-drop', 
		), 
		3 => array(
			'image_name' => 'translate2.gif', 
			'class_name' => 'translate2', 
			'additional_classes' => 'conveythis-drop', 
		), 
		4 => array(
			'image_name' => 'notext.gif', 
			'class_name' => 'notext', 
			'additional_classes' => 'conveythis-drop', 
		), 
		5 => array(
			'image_name' => 'translate3.gif', 
			'class_name' => 'translate3', 
			'additional_classes' => '', 
		), 
		6 => array(
			'image_name' => 'translate4.gif', 
			'class_name' => 'translate4', 
			'additional_classes' => 'conveythis-drop', 
		), 
		7 => array(
			'image_name' => 'convey2.gif', 
			'class_name' => 'convey2', 
			'additional_classes' => 'conveythis-drop', 
		), 
		8 => array(
			'image_name' => 'translate5.gif', 
			'class_name' => 'translate5', 
			'additional_classes' => 'conveythis-drop', 
		), 
		9 => array(
			'image_name' => 'notext2.gif', 
			'class_name' => 'notext2', 
			'additional_classes' => 'conveythis-drop', 
		), 
		10 => array(
			'image_name' => 'translate6.gif', 
			'class_name' => 'translate6', 
			'additional_classes' => '', 
		), 
	);
	
	// Constructor.
	function TranslateThisWidget() {
		// Add the full paths.
		$this->button_path		= plugins_url('translate-this-blog-translator');
		$this->javascript_path	= $this->button_path . $this->javascript_path;
		$this->image_path		= $this->button_path . $this->image_path;
		// Add functions to the content and excerpt.
		add_filter('the_content', array(&$this, 'codeToContent'));
		add_filter('get_the_excerpt', array(&$this, 'translateThisExcerptTrim'));
		add_filter('plugin_action_links_' . plugin_basename(__FILE__), array(&$this, 'pluginSettingsLink'));
		// Initialize the plugin.
		add_action('admin_menu', array(&$this, '_init'));
		// Display the admin notification
		add_action('admin_notices', array($this, 'plugin_activation'));
		// Get the plugin options.
		$this->translate_this_src			= get_option('translate_this_src', 'en');
		$this->translate_this_id			= get_option('translate_this_id', null);
		$this->tt_skip_jq					= get_option('tt_skip_jq', false);
		$this->tt_button_id					= get_option('tt_button_id', 1);
		$this->tt_first_save				= get_option('tt_first_save', 0);
		$this->tt_show_branding				= get_option('tt_show_branding', null);
		$this->translate_this_trial_key		= get_option('translate_this_trial_key', null);
		$this->translate_this_trial_expires	= get_option('translate_this_trial_expires', null);
		// Determine which "translate_this_id" value to use (free trial/registered).
		$translate_this_id_value = !empty($this->translate_this_id) ? (string)$this->translate_this_id : (string)$this->translate_this_trial_key;
		// Parameterize variables for script URL.
		$script_name = sprintf(
			'/e.js?conveythis_src=%s&conveythis_id=%s&skip_jq=%d', 
			(string)$this->translate_this_src, 
			$translate_this_id_value, 
			(int)$this->tt_skip_jq
		);
		// Register our scripts.
		wp_register_script('tt_translate_this', $this->javascript_path . $script_name, 'jquery', '4.0.1', true);
		wp_register_script('tt_admin_trial_ajax', plugins_url('translate-this-blog-translator') . '/admin-trial-ajax.js', 'jquery', '1.0.0', true);
	}
	
	function _init() {
		// Add the options page.
		add_options_page('Translation Settings', 'Translation', 'manage_options', 'translate_this', array(&$this, 'pluginOptions'));
		add_submenu_page(null, 'Reset Translation Settings', 'Reset Translation', 'manage_options', 'translate_this_reset', array(&$this, 'pluginReset'));
		// Register our plugin settings.
		register_setting('tt_options', 'translate_this_src', array(&$this, 'validateLanguage'));
		register_setting('tt_options', 'translate_this_id');
		register_setting('tt_options', 'tt_skip_jq');
		register_setting('tt_options', 'tt_button_id');
		register_setting('tt_options', 'tt_first_save');
		register_setting('tt_options', 'translate_this_trial_key');
		register_setting('tt_options', 'translate_this_trial_expires');
		register_setting('tt_options', 'tt_show_branding');
	}
	
	function plugin_activation() {
		if (current_user_can('manage_options') && !$this->tt_first_save) {
			echo <<<EOL
				<div class="error settings-error notice">
					<p><strong>Warning! Your Translation button is not set up yet!</strong></p>
					<p>Be sure to select your site's language and other options under <a href="options-general.php?page=translate_this">Translation Settings</a>!</p>
				</div>
EOL;
		}
	}
	
	// Print the dropdown, popup code in the footer.
	function translateThisFooter() {
		echo $this->getTranslateThisDropdown();
		echo $this->getTranslateThisPopup();
	}
	
	// Called whenever content is shown.
	function codeToContent($content) {
		// What we add depends on type.
		if (is_feed()) {
			// Add nothing to RSS feed.
			return $content;
		} else if (is_category()) {
			// Add nothing to categories.
			return $content;
		} else if (is_singular()) {
			// For singular pages we add the button to the content normally.
			wp_enqueue_script('jquery');
			wp_enqueue_script('tt_translate_this');
			add_action('wp_footer', array(&$this, 'translateThisFooter'));
			return $this->getTranslateThisCode() . $content;
		} else {
            // For everything else add nothing.
            return $content;
        }
	}
	
	// Get the actual button code.
	function getTranslateThisCode() {
		// Get the proper link
		$class_name			= $this->buttons[$this->tt_button_id]['class_name'];
		$additional_classes	= $this->buttons[$this->tt_button_id]['additional_classes'];
		$translate_this_code = <<<EOL
			<!-- Translation button: -->
			<script>var conveythis_plugin_path = "{$this->button_path}";</script>
			<span class="conveythis" translate="no"><span class="conveythis-image $additional_classes $class_name"></span></span>
			<!-- End Translation button code. -->
EOL;
		return $translate_this_code;
	}
	
	// Get Translate This dropdown.
	function getTranslateThisDropdown() {
		if ($this->tt_show_branding || is_null($this->tt_show_branding)) {
			$tt_dropdown_footer = <<<EOL
				<div class="conveythis-dropdown-footer">
					Get this free button at <a href="http://www.translation-services-usa.com/free.php?dropdown=y">Translate This</a><br />
					Powered by <a href="http://www.translation-services-usa.com">Translation Cloud</a>
				</div>
EOL;
		} else {
			$tt_dropdown_footer = '';
		}
		$tt_dropdown = <<<EOL
			<div id="conveythis-dropdown" class="conveythis-dropdown notranslate" translate="no">
				<div class="conveythis-dropdown-header">
					Select a target language
				</div>
				<div class="conveythis-dropdown-body">
					<ul id="conveythis-dropdown-list" class="conveythis-dropdown-list"></ul>
				</div>
				$tt_dropdown_footer
			</div>
EOL;
		return $tt_dropdown;
	}
	
	// Get Translate This popup.
	function getTranslateThisPopup() {
		if ($this->tt_show_branding || is_null($this->tt_show_branding)) {
			$tt_popup_header_branding	= '<p>Powered by Translation Cloud</p>';
			$tt_popup_body_class		= '';
			$tt_popup_footer = <<<EOL
				<div class="conveythis-popup-footer">
					<p><a href="http://www.translation-services-usa.com/free.php?dropdown=y">Get Your Own Free Translator</a></p>
					<p>Powered by <a href="http://www.translation-services-usa.com">Translation Cloud</a></p>
				</div>
EOL;
		} else {
			$tt_popup_header_branding	= '';
			$tt_popup_footer			= '';
			$tt_popup_body_class		= 'conveythis-unbranded';
		}
		$tt_popup = <<<EOL
			<div id="conveythis-popup" class="conveythis-popup notranslate" translate="no">
				<div class="conveythis-popup-dialog">
					<div class="conveythis-popup-content">
						<div class="conveythis-popup-header">
							<button type="button" class="conveythis-close" data-dismiss="conveythis-popup" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<p class="conveythis-popup-title">Translation</p>
							$tt_popup_header_branding
						</div>
						<div class="conveythis-popup-body $tt_popup_body_class">
							<p>Select a taget language:</p>
							<div id="conveythis-popup-languages"></div>
						</div>
						$tt_popup_footer
					</div>
				</div>
			</div>
EOL;
		return $tt_popup;
	}
	
	// Reset plugin options.
	function pluginReset() {
		if (!current_user_can('manage_options'))  {
			wp_die('You do not have sufficient permissions to access this page.');
		}
		?>
		<div class="wrap">
			<form method="post" action="options.php">
				<?php settings_fields('tt_options'); ?>
				<input name="tt_skip_jq" type="hidden" value="0" />
				<input name="tt_button_id" type="hidden" value="1" />
				<input name="translate_this_src" type="hidden" value="en" />
				<input name="translate_this_id" type="hidden" value="" />
				<input name="free_trial" type="hidden" value="0" />
				<input name="translate_this_trial_key" type="hidden" value="" />
				<input name="translate_this_trial_url" type="hidden" value="" />
				<input name="translate_this_trial_expires" type="hidden" value="" />
				<input name="tt_show_branding" type="hidden" value="0" />
				<input name="tt_first_save" type="hidden" value="0" />
				<h2>Reset Translation Options</h2>
				<p>Click the &quot;Reset Settings&quot; button below to reset the plugin's options to their default settings:</p>
				<table class="widefat">
					<thead>
						<tr>
							<th width="33.333%">Option</th>
							<th width="66.666%">Default Setting</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><b>jQuery version checking</b></td>
							<td>enabled</td>
						</tr>
						<tr>
							<td><b>Button style</b></td>
							<td><img src="<?php echo $this->image_path;?>/buttons/translate1.gif" alt="" style="vertical-align:middle;" /></td>
						</tr>
						<tr>
							<td><b>Source language</b></td>
							<td>English</td>
						</tr>
						<tr>
							<td><b>Registered ConveyThis account</b></td>
							<td>none</td>
						</tr>
						<tr>
							<td><b>Free trial settings</b></td>
							<td>unset</td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="submit" value="Reset Settings to Default" class="button-primary" /> 
								<a href="options-general.php?page=translate_this" class="button">Cancel</a>
							</td>
						</tr>
					</tbody>
				</table>
			</form>
		</div>
		<?php
	}
	
	// Admin page display.
	function pluginOptions() {
		if (!current_user_can('manage_options'))  {
			wp_die('You do not have sufficient permissions to access this page.');
		}
		// Enqueue scripts.
		wp_enqueue_script('jquery');
		wp_enqueue_script('tt_admin_trial_ajax');
		?>
		<div class="wrap">
			<form id="translate-this-settings" method="post" action="options.php">
				<?php settings_fields('tt_options'); ?>
				<input name="tt_skip_jq" type="hidden" value="0" />
				<input name="tt_button_id" type="hidden" value="1" />
				<input name="translate_this_src" type="hidden" value="en" />
				<input name="translate_this_id" type="hidden" value="" />
				<input name="free_trial" type="hidden" value="0" />
				<input name="translate_this_trial_key" type="hidden" value="" />
				<input name="translate_this_trial_url" type="hidden" value="" />
				<input name="translate_this_trial_expires" type="hidden" value="" class="translate_this_trial_expires" />
				<input name="tt_first_save" type="hidden" value="1" />
				<input name="tt_show_branding" type="hidden" value="0" />
				<h2>Translation Settings</h2>
				<p>Update the language and other settings for the Translation plugin.</p>
				<table class="widefat">
					<tbody>
						<tr>
							<td colspan="2"><input type="submit" value="Save Settings" class="button-primary" /></td>
						</tr>
						<tr>
							<td colspan="2" style="padding:10px;font-family:Verdana, Geneva, sans-serif;color:#666;border-bottom:1px dotted #ddd;">
								<p><label for="translate_this_src">Your Site's Current Language</label></p>
								<p>
									<select id="translate_this_src" name="translate_this_src">
										<?php
										$current_src = get_option('translate_this_src') ? get_option('translate_this_src') : $this->translate_this_src;
										asort($this->translate_this_languages);
										foreach ($this->translate_this_languages as $key => &$value) {
											$selected = $current_src == $key ? 'selected="selected"' : '';
											printf('<option %s value="%s">%s</option>', $selected, $key, $value);
										}
										unset($value);
										?>
									</select>
								<p>
								<p>Set this to whatever language your blog is written in. If your blog is in English, and you want visitors to be able to view it in Spanish, Russian, and Japanese, select &quot;English.&quot;</p>
							</td>
						</tr>
						<tr>
							<td colspan="2" style="padding:10px;font-family:Verdana, Geneva, sans-serif;color:#666;border-bottom:1px dotted #ddd;">
								<p><label for="button_id_1">Choose a Button Style</label></p>
								<?php
								// Divid the buttons into two columns.
								$column_rows	= round(count($this->buttons));
								$first_column	= array_slice($this->buttons, 0, $column_rows / 2, true);
								$second_column	= array_slice($this->buttons, $column_rows / 2, null, true);
								?>
								<table>
									<tfoot>
										<tr>
											<td colspan="2">* no dropdown menu when moused over.</td>
										</tr>
									</tfoot>
									<tbody>
										<tr>
											<td width="50%">
												<?php
												foreach ($first_column as $id => &$button) {
													?>
													<p><label for="button_id_<?php echo $id; ?>"><input id="button_id_<?php echo $id; ?>" <?php echo ($this->tt_button_id == $id) ? 'checked="checked"' : ''; ?> name="tt_button_id" type="radio" value="<?php echo $id; ?>" /> <img src="<?php echo $this->image_path;?>/buttons/<?php echo $this->buttons[$id]['image_name']; ?>" alt="" style="vertical-align:middle;" /></label> <?php echo empty($this->buttons[$id]['additional_classes']) ? '*' : ''; ?></p>
													<?php
												}
												unset($button);
												?>
											</td>
											<td width="50%">
												<?php
												foreach ($second_column as $id => &$button) {
													?>
													<p><label for="button_id_<?php echo $id; ?>"><input id="button_id_<?php echo $id; ?>" <?php echo ($this->tt_button_id == $id) ? 'checked="checked"' : ''; ?> name="tt_button_id" type="radio" value="<?php echo $id; ?>" /> <img src="<?php echo $this->image_path;?>/buttons/<?php echo $this->buttons[$id]['image_name']; ?>" alt="" style="vertical-align:middle;" /></label> <?php echo empty($this->buttons[$id]['additional_classes']) ? '*' : ''; ?></p>
													<?php
												}
												unset($button);
												?>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
						<tr>
							<td colspan="2" style="padding:10px;font-family:Verdana, Geneva, sans-serif;color:#666;border-bottom:1px dotted #ddd;">
								<p><label for="tt_skip_jq"><input id="tt_skip_jq" <?php echo $this->tt_skip_jq ? 'checked="checked"' : ''; ?> name="tt_skip_jq" type="checkbox" value="1" /> Disable jQuery version checking</p>
								<p>Use this only if you are having trouble getting the Translation button to work. This will force-skip jQuery detection by the plugin.</p>
							</td>
						</tr>
						<tr>
							<td colspan="2" style="padding:10px;font-family:Verdana, Geneva, sans-serif;color:#666;border-bottom:1px dotted #ddd;">
								<p><label for="tt_show_branding"><input id="tt_show_branding" <?php echo ($this->tt_show_branding || is_null($this->tt_show_branding)) ? 'checked="checked"' : ''; ?> name="tt_show_branding" type="checkbox" value="1" /> Tell somebody about Translation Cloud :-)</p>
								<p>Translation by Translation Cloud is not only free to use, it actually costs <i>us</i> money to support! Please help us out by allowing a small backlink to <i>translation-services-usa.com</i> in the button's dropdown/pop-up footer so everyone knows where to get our plugin.</p>
							</td>
						</tr>
						<tr>
							<td <?php echo empty($this->translate_this_id) ? 'width="50%"' : 'colspan="2"'; ?> style="padding:10px;font-family:Verdana, Geneva, sans-serif;color:#666;border-bottom:1px dotted #ddd;">
								<p><label for="translate_this_id">Registered ConveyThis Account Username</label> <input id="translate_this_id" name="translate_this_id" type="text" value="<?php echo htmlspecialchars($this->translate_this_id); ?>" /></p>
								<p>If you have a <a href="http://www.conveythis.com/" target="_blank">registered ConveyThis account</a>, enter your username here to activate your account benefits for your WordPress blog (<b>note:</b> be sure to add your blog URL, &quot;<?php echo bloginfo('url'); ?>&quot; to the approved domains list in your account settings).</p>
								<p>Registered users with a Google Translate API Key can translate their blog text directly on-page without redirecting through a separate frame. Read more at the <a href="http://www.conveythis.com/help.php#8" target="_blank">ConveyThis help</a> page.</p>
							</td>
							<?php
							if (empty($this->translate_this_id)) {
								?>
								<td width="50%" style="padding:10px;font-family:Verdana, Geneva, sans-serif;color:#666;border-bottom:1px dotted #ddd;">
									<?php
									if (empty($this->translate_this_trial_key)) {
										?>
										<p><label for="free_trial"><input id="free_trial" <?php echo (!$this->tt_first_save && empty($this->translate_this_trial_key)) ? 'checked="checked"' : ''; ?> name="free_trial" type="checkbox" value="1" /> Try API-powered translation free!</label></p>
										<p>Want to get a feel for how your blog will be translated with a registered ConveyThis account and Google Translate API Key? Just press the checkbox here to start your free trial!</p>
										<?php
									} else {
										?>
										<p>Your free trial information is below. Convinced? <a href="http://www.conveythis.com/" target="_blank">Register on ConveyThis.com!</a></p>
										<?php
									}
									?>
									<p><label for="translate_this_trial_url" style="display:inline-block; min-width:24%">Registered to</label> <input id="translate_this_trial_url" name="translate_this_trial_url" readonly type="text" value="<?php echo bloginfo('url'); ?>" style="min-width:74%;" /></p>
									<p><label for="translate_this_trial_key" style="display:inline-block; min-width:24%">Trial key</label> <input id="translate_this_trial_key" name="translate_this_trial_key" readonly type="text" value="<?php echo $this->translate_this_trial_key; ?>" style="min-width:74%;" /></p>
									<p><label for="translate_this_trial_expires" style="display:inline-block; min-width:24%">Expiration date</label> <input id="translate_this_trial_expires" name="translate_this_trial_expires" readonly type="text" value="<?php echo !empty($this->translate_this_trial_expires) ? date('Y-m-d g:i A T', strtotime($this->translate_this_trial_expires)) : ''; ?>" style="min-width:50%;" class="translate_this_trial_expires" /></p>
								</td>
								<?php
							}
							?>
						</tr>
						<tr>
							<td colspan="2" style="padding:10px;font-family:Verdana, Geneva, sans-serif;color:#666;">
								<b>Note:</b> if you are using any caching plugins, such as WP Super Cache, you will need to clear your cached pages after updating your Translation settings.
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="submit" value="Save Settings" class="button-primary" /> 
								<a href="options-general.php?page=translate_this_reset" class="button">Reset to Default Options</a>
							</td>
						</tr>
					</tbody>
				</table>
				<p><b>Translation</b> is a project by <a href="http://www.translation-services-usa.com/" target="_blank">Translation Cloud</a>. Get a free quote for your professional or personal translation project at Translation Cloud now!</p>
			</form>
		</div>
		<?php
	}
	
	// Add settings link on plugin page
	function pluginSettingsLink($links) { 
		$settings_link = '<a href="options-general.php?page=translate_this">Settings</a>'; 
		array_unshift($links, $settings_link); 
		return $links; 
	}
	
	// Remove (what's left of) our button code from excerpts.
	function translateThisExcerptTrim($text) {
		/*
		$pattern		= '/Translationvar translate_this_src = "(.*?)";/i';
		$replacement	= '';
		return preg_replace($pattern, $replacement, $text);
		*/
		return $text;
	}
	
	// Sanitize plugin settings options.
	function validateLanguage($language = null) {
		$return = $this->translate_this_src;
		if (array_key_exists($language, $this->translate_this_languages)) {
			$return = $language;
		}
		return $return;
	}
}

$translate_this &= new TranslateThisWidget();