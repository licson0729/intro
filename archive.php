<?php get_header(); ?>
<?php get_sidebar(); ?>
<div id="content" class="flexcroll">
	<div id="banner">
		<h2><?php if(is_category()){
			echo 'Category: ';
			single_cat_title();
		}
		else if(is_author()){
			$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
			echo 'Author: ' . $curauth->nickname;
		}
		else if(is_tag()){
			echo 'Tag: ';
			single_tag_title('', true);
		}
		else if(is_day()){
			the_time(get_option('date_format'));
		}
		else if(is_month()){
			the_time('F, Y');
		}
		else if(is_year()){
			the_time('Y');
		} ?></h2>
	</div>
	<?php while (have_posts()) : the_post(); ?>
	<article>
		<header class="entry-header">
			<?php if(has_post_thumbnail()): ?>
			<div class="entry-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div>
			<?php endif; ?>
			<h2 class="entry-title">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
			</h2>
			<div class="postmeta">
				<span class="ion-ios7-clock-outline"></span>
				<span class="entry-time"><?php the_time('Y/m/d'); ?></span> 
				<span class="ion-ios7-photos-outline"></span>
				<span class="entry-cate"><?php the_category(','); ?></span> 
				<span class="ion-ios7-chatboxes-outline"></span>
				<span class="entry-comments"><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></span>
			</div>
		</header>
		<div class="entry-content">
			<?php the_content('More...');?>
		</div>
	</article>
	<?php endwhile; ?>
	<?php wp_reset_query(); ?>
	<div class="navigation"><?php pagenavi(true); ?></div>
<?php get_footer(); ?>