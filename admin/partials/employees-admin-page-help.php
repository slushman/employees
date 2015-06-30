<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://slushman.com
 * @since      1.0.0
 *
 * @package    Employees
 * @subpackage Employees/admin/partials
 */

?><h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
<h3>Shortcode</h3>
<p>The simplest version of the shortcode is:</p>
<pre><code>[employeelist]</code></pre>
<p>Enter that in the Editor on any page or post to display a list of employees.</p>