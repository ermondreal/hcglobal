<?php

/**
 * StraightArrow ACF
 *
 * @package           StraightArrow ACF
 * @author            StraightArrow Corp.
 * @copyright         2022 StraightArrow Corp.
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       StraightArrow ACF
 * Plugin URI:        https://www.straightarrow.com.ph
 * Description:       Your plugin's description
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            StraightArrow Corp.
 * Author URI:        https://www.straightarrow.com.ph
 * Text Domain:       straightarrow
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

defined('ABSPATH') or die('Create for the world');

if(!class_exists('Yourpluginclass')){
	class Yourpluginclass
	{
		public $plugin;

		function __construct() {
			$this->plugin = plugin_basename(__FILE__);
		}

		function register_admin() {
			// adding admin pages, admin enqueue, custom post types, etc.
		}

		function activate() {
			// custom post type registration, etc.

			flush_rewrite_rules();
		}

		function deactivate() {
			flush_rewrite_rules();
		}
	}

	$plugin = new Yourpluginclass();
	// $plugin->register_admin();

	register_activation_hook(__FILE__, [$plugin, 'activate']);
	register_deactivation_hook(__FILE__, [$plugin, 'deactivate']);
}

if(!class_exists('acf')){
	include_once(plugin_dir_path(__FILE__) . 'includes/acf/acf.php');

	function sac_acf_settings_path($path){
		$path = plugin_dir_path(__FILE__) . 'includes/acf/';
		return $path;
	}

	add_filter('acf/settings/path', 'sac_acf_settings_path');

	function sac_acf_settings_dir($path){
		$dir = plugin_dir_url(__FILE__) . 'includes/acf/';
		return $dir;
	}

	add_filter('acf/settings/dir', 'sac_acf_settings_dir');

	function sac_acf_json_save_point($path){
		$path = plugin_dir_path(__FILE__) . 'includes/acf-json/';
		return $path;
	}

	add_filter('acf/settings/save_json', 'sac_acf_json_save_point');

	function sac_acf_json_load_point($paths){
		$paths[] = plugin_dir_path(__FILE__) . 'includes/acf-json-load';
		return $paths;
	}

	add_filter('acf/settings/load_json', 'sac_acf_json_load_point');

	function sac_stop_acf_update_notifications($value){
		unset($value->response[plugin_dir_path(__FILE__) . 'includes/acf/acf.php']);
		return $value;
	}

	add_filter('site_transient_update_plugins', 'sac_stop_acf_update_notifications', 11);

	add_filter('acf/settings/show_admin', '__return_false');

	if(function_exists('acf_add_options_page')){
		acf_add_options_page([
			'page_title'	=> 'Theme Options',
			'menu-title'	=> 'Theme Options',
			'menu_slug'		=> 'straightarrow-theme-options',
			'capability'	=> 'edit_posts',
			'position'		=> 2,
			'redirect'		=> false
		]);
	}

	if(function_exists('acf_add_local_field_group')){
		acf_add_local_field_group([
			'key'		=> 'group_theme_options',
			'title'		=> 'Theme Optionsss',
			'fields'	=> [
				[
					'key'			=> 'header_logo',
					'label'			=> 'Header Logo',
					'name'			=> 'header_logo',
					'type'			=> 'image',
					'return_format'	=> 'array',
					'preview_size'	=> 'thumbnail',
					'wrapper'		=> ['width' => '25%']
				],[
					'key'			=> 'footer_logo',
					'label'			=> 'Footer Logo',
					'name'			=> 'footer_logo',
					'type'			=> 'image',
					'return_format'	=> 'array',
					'preview_size'	=> 'thumbnail',
					'wrapper'		=> ['width' => '75%']
				],[
					'key'			=> 'social_media',
					'label'			=> 'Social Media',
					'name'			=> 'social_media',
					'type'			=> 'repeater',
					'layout'		=> 'block',
					'button_lable'	=> 'Add item',
					'sub_fields'	=> [
						[
							'key'			=> 'social_media_icon',
							'label'			=> 'Icon',
							'name'			=> 'social_media_icon',
							'type'			=> 'image',
							'return_format'	=> 'array',
							'preview_size'	=> 'thumbnail',
							'wrapper'		=> ['width' => '25%']
						],
						[
							'key'			=> 'social_media_link',
							'label'			=> 'Link',
							'name'			=> 'social_media_link',
							'type'			=> 'text',
							'wrapper'		=> ['width' => '75%']
						]
					]
				]
			],
			'location'	=> [[[
				'param'		=> 'options_page',
				'operator'	=> '==',
				'value'		=> 'straightarrow-theme-options'
			]]]
		]);

		acf_add_local_field_group([
			'key'		=> 'group_flexible_modules',
			'title'		=> 'Flexible Modules',
			'fields'	=> [
				[
					'key'			=> 'flexible_modules',
					'label'			=> 'Sections/Modules',
					'name'			=> 'flexible_modules',
					'type'			=> 'flexible_content',
					'button_label'	=> 'Add section',
					'layouts'		=> [
						[
							// HERO BANNER
							'key'			=> 'hero_banner',
							'label'			=> 'Hero Banner',
							'name'			=> 'hero_banner',
							'display'		=> 'block',
							'sub_fields'	=> [
								[
									'key'			=> 'banner_type',
									'label'			=> 'Banner Type',
									'name'			=> 'banner_type',
									'type' 			=> 'radio',
									'return_format'	=> 'value',
									'choices' 		=> [
										'default' 		=> 'Default',
										'carousel' 		=> 'Carousel'
									],
									'default_value' => 'default',
									'wrapper'		=> ['width' => '15%']
								],[
									'key'			=> 'background_image',
									'label'			=> 'Background Image',
									'name'			=> 'background_image',
									'type'			=> 'image',
									'return_format'	=> 'url',
									'preview_size'	=> 'thumbnail',
									'wrapper'		=> ['width' => '15%']
								],[
									'key'			=> 'background_image_position',
									'label'			=> 'Background Position',
									'name'			=> 'background_image_position',
									'type' 			=> 'radio',
									'return_format'	=> 'value',
									'choices' 		=> [
										'top' 		=> 'Top',
										'center' 	=> 'Center',
										'bottom' 	=> 'Bottom'
									],
									'default_value' => 'center',
									'wrapper'		=> ['width' => '15%']
								],[
									'key'			=> 'add_gradient',
									'label'			=> 'Add Gradient',
									'name'			=> 'add_gradient',
									'type' 			=> 'true_false',
									'default_value' => 1,
									'ui' 			=> 1,
									'ui_on_text' 	=> 'Yes',
									'ui_off_text' 	=> 'No',
									'wrapper'		=> ['width' => '15%']
								],[
									'key'			=> 'grad_color_posotion',
									'label'			=> 'Gradient Color Position',
									'name'			=> 'grad_color_posotion',
									'type' 			=> 'radio',
									'return_format'	=> 'value',
									'choices' 		=> [
										'top' 		=> 'Top',
										'bottom' 	=> 'Bottom',
										'top-bot' 	=> 'Top and Bottom',
										'all' 		=> 'All'
									],
									'default_value' => 'center',
									'wrapper'		=> ['width' => '15%'],
									'conditional_logic'	=> [[[
										'field'		=> 'add_gradient',
										'operator'	=> '==',
										'value'		=> '1'
									]]]
								],[
									'key'			=> 'group_text',
									'label'			=> 'Contents',
									'name'			=> 'group_text',
									'type'			=> 'group',
									'sub_fields'	=> [
										[
											'key'				=> 'title_default',
											'label'				=> 'Title',
											'name'				=> 'title_default',
											'type'				=> 'text',
											'conditional_logic'	=> [[[
												'field'		=> 'banner_type',
												'operator'	=> '==',
												'value'		=> 'default'
											]]]
										],[
											'key'			=> 'content_default',
											'label'			=> 'Content',
											'name'			=> 'content_default',
											'type'			=> 'wysiwyg',
											'conditional_logic'	=> [[[
												'field'		=> 'banner_type',
												'operator'	=> '==',
												'value'		=> 'default'
											]]]
										],[
											'key'			=> 'carousel',
											'label'			=> 'Carousel',
											'name'			=> 'carousel',
											'type'			=> 'repeater',
											'button_label'	=> 'Add carousel',
											'sub_fields'	=> [
												[
													'key'				=> 'title_carousel',
													'label'				=> 'Title',
													'name'				=> 'title_carousel',
													'type'				=> 'text'
												],[
													'key'			=> 'content_carousel',
													'label'			=> 'Content',
													'name'			=> 'content_carousel',
													'type'			=> 'wysiwyg'
												]
											],
											'conditional_logic'	=> [[[
												'field'		=> 'banner_type',
												'operator'	=> '==',
												'value'		=> 'carousel'
											]]]
										]
									]
								]
							]
						]
					]
				]
			],
			'location'	=> [[[
				'param'		=> 'post_type',
				'operator'	=> '==',
				'value'		=> 'page'
			]]]
		]);
	}

	if(function_exists('acf_add_local_field')){
		acf_add_local_field([

		]);
	}
}
else
{
	add_filter('acf/settings/load_json', 'sac_acf_json_load_point');	
}

function hcglobal_menu() {
	register_nav_menus(
		array(
			'main-menu' 	=> __( 'Main Menu' ),
			'footer-menu' 	=> __( 'Footer Menu' )
		)
	);
}
add_action( 'after_setup_theme', 'hcglobal_menu' );