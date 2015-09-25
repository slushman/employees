<?php

/**
 * The view for the help page
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
<p>Here are the custom attributes accepted by the shortcode:</p>

<h4>department</h4>
<p>The department attribute limits the employee list to display only employees from the chosen department. The value needs to be the slug of the department.
<p>Examples:</p>
<ul>
	<li>department="sales"</li>
	<li>department="creditors-rights"</li>
</ul>

<h4>listview</h4>
<p>The listview attribute changes the output template for the list of employees. The value of this attribute should be the name of the file without the extension. The plugin will check the following locations for the file.</p>
<ol>
	<li>Theme Folder</li>
	<li>Parent Theme Folder</li>
	<li>"Templates" folder within the theme folder</li>
	<li>"Templates" folder within the parent theme folder</li>
</ol>
<p>If it doesn't find the file in one of those locations, it will use the default template in the plugin folder.</p>
<p>Examples:</p>
<ul>
	<li>listview="employees-ordered-list"</li>
	<li>listview="employees-custom"</li>
</ul>

<h4>WP_Query Keys</h4>
<p>The employeelist shortcode also accepts any of the keys for <a href="https://codex.wordpress.org/Class_Reference/WP_Query">WP_Query</a>.</p>
<p>Examples:</p>
<ul>
	<li>meta_key="order"</li>
	<li>orderby="meta_key"</li>
</ul>

<h3>Custom Templates</h3>
<p>The Employees plugin allows for three templates:</p>
<ul>
	<li>The employee list</li>
	<li>The single employee in the list</li>
	<li>The single employee page</li>
</ul>

<h4>Employee List</h4>
<p>This is the </p>

<h4>Single Employee in List</h4>
<p></p>

<h4>Single Employee Page</h4>
<p>The single employee page is part of the standard template hierarchy within WordPress.</p>
