<?php
// This file is generated. Do not modify it manually.
return array(
	'block-contact' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'blocks-gamestore/block-contact',
		'version' => '0.1.0',
		'title' => 'Contact form',
		'category' => 'gamestore',
		'icon' => 'smiley',
		'description' => 'Example block scaffolded with Create Block tool.',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false
		),
		'textdomain' => 'blocks-gamestore',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'viewScript' => 'file:./view.js'
	),
	'block-cta' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'blocks-gamestore/block-cta',
		'version' => '0.1.0',
		'title' => 'Call to Action',
		'category' => 'gamestore',
		'icon' => 'smiley',
		'description' => 'Call to Action Block',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false
		),
		'attributes' => array(
			'title' => array(
				'type' => 'string',
				'source' => 'html',
				'selector' => '.cta-title'
			),
			'description' => array(
				'type' => 'string',
				'source' => 'html',
				'selector' => '.cta-description'
			),
			'links' => array(
				'type' => 'array',
				'default' => array(
					
				)
			),
			'imageBg' => array(
				'type' => 'string'
			),
			'image' => array(
				'type' => 'string'
			)
		),
		'textdomain' => 'blocks-gamestore',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css'
	),
	'block-featured-products' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'blocks-gamestore/featured-products',
		'version' => '0.1.0',
		'title' => 'Featured Products',
		'category' => 'gamestore',
		'icon' => 'columns',
		'description' => 'Featured Products List',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false
		),
		'attributes' => array(
			'count' => array(
				'type' => 'number',
				'default' => 6
			),
			'title' => array(
				'type' => 'string'
			),
			'description' => array(
				'type' => 'string'
			)
		),
		'textdomain' => 'blocks-gamestore',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css'
	),
	'block-games-line' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'blocks-gamestore/block-games-line',
		'version' => '0.1.0',
		'title' => 'Games Line',
		'category' => 'gamestore',
		'icon' => 'columns',
		'description' => 'Dynamic Animated Line with Games',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false
		),
		'attributes' => array(
			'count' => array(
				'type' => 'number',
				'default' => 12
			)
		),
		'textdomain' => 'blocks-gamestore',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'viewScript' => 'file:./view.js'
	),
	'block-header' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'blocks-gamestore/block-header',
		'version' => '0.1.1',
		'title' => 'Header',
		'category' => 'gamestore',
		'icon' => 'layout',
		'description' => 'Site Header Block.',
		'supports' => array(
			'html' => false
		),
		'attributes' => array(
			'memberLink' => array(
				'type' => 'string'
			),
			'cartLink' => array(
				'type' => 'string'
			)
		),
		'textdomain' => 'blocks-gamestore',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'viewScript' => 'file:./view.js'
	),
	'block-hero' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'blocks-gamestore/block-hero',
		'version' => '0.1.0',
		'title' => 'Hero Block',
		'category' => 'gamestore',
		'icon' => 'smiley',
		'description' => 'Example block scaffolded with Create Block tool.',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false
		),
		'attributes' => array(
			'title' => array(
				'type' => 'string',
				'source' => 'html',
				'selector' => '.hero-title'
			),
			'description' => array(
				'type' => 'string',
				'source' => 'html',
				'selector' => '.hero-description'
			),
			'link' => array(
				'type' => 'string',
				'source' => 'attribute',
				'selector' => 'a',
				'attribute' => 'href'
			),
			'linkAnchor' => array(
				'type' => 'string',
				'source' => 'html',
				'selector' => 'a'
			),
			'video' => array(
				'type' => 'string'
			),
			'image' => array(
				'type' => 'string'
			),
			'isVideo' => array(
				'type' => 'boolean'
			),
			'slides' => array(
				'type' => 'array',
				'default' => array(
					
				)
			)
		),
		'textdomain' => 'blocks-gamestore',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'viewScript' => 'file:./view.js'
	),
	'block-recent-news' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'blocks-gamestore/recent-news',
		'version' => '0.1.0',
		'title' => 'Recent News',
		'category' => 'gamestore',
		'icon' => 'columns',
		'description' => 'Recent News Block',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false
		),
		'attributes' => array(
			'count' => array(
				'type' => 'number',
				'default' => 3
			),
			'title' => array(
				'type' => 'string'
			),
			'description' => array(
				'type' => 'string'
			),
			'image' => array(
				'type' => 'string'
			)
		),
		'textdomain' => 'blocks-gamestore',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css'
	),
	'block-subscribe' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'blocks-gamestore/block-subscribe',
		'version' => '0.1.0',
		'title' => 'Subscribe',
		'category' => 'gamestore',
		'icon' => 'smiley',
		'description' => 'Subscribe Block.',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false
		),
		'attributes' => array(
			'title' => array(
				'type' => 'string'
			),
			'description' => array(
				'type' => 'string'
			),
			'image' => array(
				'type' => 'string'
			),
			'shortcode' => array(
				'type' => 'string'
			)
		),
		'textdomain' => 'blocks-gamestore',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'viewScript' => 'file:./view.js'
	)
);
