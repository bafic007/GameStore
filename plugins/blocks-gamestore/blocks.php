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

function view_block_subscribe($attributes){
	$image_bg = ($attributes['image']) ? 'style="background-image: url(' . $attributes['image'] . ')"' : '';

	ob_start();

	echo '<div ' . get_block_wrapper_attributes(array('class' => 'alignfull')) . $image_bg . '>';
		echo '<div class="subscribe-inner wrapper">';
			echo '<h2 class="subscribe-title">' . $attributes['title'] . '</h2>';
			echo '<p class="subscribe-description">' . $attributes['description'] . '</p>';
			echo '<div class="subscribe-shortcode">' . do_shortcode($attributes['shortcode']) . '</div>';
		echo '</div>';
	echo '</div>';

	return ob_get_clean();
}

function view_block_featured_products($attributes){

	$featured_games = wc_get_products(array(
		'status' => 'publish',
		'limit' => $attributes['count'],
		'featured' => true,
	));

	ob_start();

    echo '<div ' . get_block_wrapper_attributes( array('class' => 'wrapper') ) . '>';

		if($attributes['title']) {
			echo '<h2>' . $attributes['title'] . '</h2>';
		}
		if($attributes['description']) {
			echo '<p>' . $attributes['description'] . '</p>';
		}

		$platforms = array('Xbox', 'PC', 'PlayStation');

		if(!empty($featured_games)){
			echo '<div class="games-list">';
				foreach($featured_games as $game) {
					echo '<div class="game-result">';
						echo '<a href="'. esc_url( $game->get_permalink() ) .'">';
							echo '<div class="game-featured-image">'. $game->get_image('full') .'</div>';
							echo '<div class="game-meta">';
								echo '<div class="game-price">'. $game->get_price_html() .'</div>';
								echo '<h3>'. $game->get_name() .'</h3>';
								echo '<div class="games-platforms">';
									foreach($platforms as $platform){
                                    	if(get_post_meta($game->get_id(), '_platform_'.strtolower($platform), true) === 'yes'){
                                    		echo '<div class="platform_'.strtolower($platform).'"></div>';
                                    	}
                                    }
								echo '</div>';
							echo '</div>';
						echo '</a>';
					echo '</div>';
				}
			echo '</div>';
		} else {
			echo '<p>No games found.</p>';
		}

	echo '</div>';

	return ob_get_clean();
}
