<?php

function view_block_games_line($attributes){
	$args = array (
		'post_type' => 'product',
		'posts_per_page' => $attributes['count'],
		'orderby' => 'date',
		'order' => 'DESC',
	);
	$games_query = new WP_Query($args);

	ob_start();

	echo '<div ' . get_block_wrapper_attributes() . '>';

	if($games_query->have_posts()){
		echo '<div class="games-line-container">';
			echo '<div class="swiper-wrapper">';
				while ($games_query->have_posts()){
					$games_query->the_post();
					$product = wc_get_product(get_the_ID());
					echo '<div class="swiper-slide game-item">';
						echo '<a href="' . get_the_permalink() . '">';
							echo $product->get_image('full');
						echo '</a>';
					echo '</div>';
				}
			echo '</div>';
		echo '</div>';
	}

	echo '</div>';

	wp_reset_postdata();

	return ob_get_clean();
}

function view_block_recent_news($attributes){
	$args = array (
		'post_type' => 'news',
		'posts_per_page' => $attributes['count'],
		'orderby' => 'date',
		'order' => 'DESC',
	);
	$news_query = new WP_Query($args);

	$image_bg = ($attributes['image']) ? 'style="background-image: url(' . $attributes['image'] . ')"' : '';

	ob_start();

    echo '<div ' . get_block_wrapper_attributes() . $image_bg . '>';

	if($news_query->have_posts()){
		if($attributes['title']) {
			echo '<h2>' . $attributes['title'] . '</h2>';
		}
		if($attributes['description']) {
			echo '<p>' . $attributes['description'] . '</p>';
		}
		echo '<div class="recent-news wrapper">';
			while ($news_query->have_posts()){
				$news_query->the_post();
				echo '<div class="news-item">';
					echo '<h3>' . get_the_title() . '</h3>';
					echo '<div class="news-thumbnail">';
						echo '<img src="' . get_the_post_thumbnail_url() . '" class="blur-image"  alt="' . get_the_title() . '">';
						echo '<img src="' . get_the_post_thumbnail_url() . '" class="original-image"  alt="' . get_the_title() . '">';
					echo '</div>';
					echo '<div class="news-excerpt">';
						echo get_the_excerpt();
					echo '</div>';
					echo '<a href="' . get_the_permalink() . '" class="read-more">Open the post</a>';
				echo '</div>';
			}
		echo '</div>';
	}

	echo '</div>';

	wp_reset_postdata();

	return ob_get_clean();
}
