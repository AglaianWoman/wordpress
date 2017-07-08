<article id="post-<?php the_ID(); ?>" <?php post_class('item'); ?>>
	<?php if ( is_singular( get_post_type() ) ) : ?>
		<?php the_title( '<h1 class="post-title">', '</h1>' ); ?>
		<div class="post-meta">
			<?php printf(
				__( 'Published by %1$s on %2$s', 'latte' ),
				'<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . get_the_author() . '</a>',
				'<time>' . get_the_time( get_option( 'date_format' ) ) . '</time>'
			);	?>
		</div>
		<div class="content">
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div>
		<?php endif; ?>
			<div class="post-content">
				<?php the_content(); ?>
			</div>
			<?php
				wp_link_pages( array(
					'before'	  => '<ul class="pager">',
					'after'	   => '</ul>',
					'link_before' => '<li><span>',
					'link_after'  => '</span></li>',
				) );
			?>
			<div class="post-meta">
				<span><?php _e('Categories:','latte'); ?> <?php the_category(', '); ?></span>
				<span><?php the_tags(__( 'Tags: ', 'latte' ) , ', '); ?></span>
			</div>
		</div>
	<?php else: ?>
		<a href="<?php the_permalink(); ?>">
			<?php the_title( '<h2 class="post-title">', '</h2>' ); ?>
		</a>
		<div class="post-subtitle">
			<?php if ( has_excerpt() ) : ?>
				<?php the_excerpt(); ?>
			<?php else: ?>
				<?php the_content(); ?>
			<?php endif; ?>
		</div>
		<div class="post-meta">
			<?php printf(
				__( 'Published by %1$s on %2$s | %3$s', 'latte' ),
				'<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . get_the_author() . '</a>',
				'<time>' . get_the_time( get_option( 'date_format' ) ) . '</time>',
				'<a href="' . esc_url( get_permalink() ) . '">' . __( 'Permalink', 'latte' ) . '</a>'
			);	?>
		</div>
	<?php endif; ?>
</article>
