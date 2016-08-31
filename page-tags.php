<?php
/**
 * Template Name: 标签模板
 *
 * The template for tags
 *
 * @author Javis <javismay@gmail.com>
 * @license MIT
 */

get_header();
?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<article <?php post_class('box'); ?>>
    <header class="entry-header">
		<h2 class="entry-name">
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h2>
		<ul class="entry-meta">
			<li><i class="fa fa-clock-o"></i> <?php the_time('d,m,Y');?></li>
			<li><i class="fa fa-eye"></i> <?php lo_post_views(' '.__('Views', 'quench'));?></li>
		</ul>
    </header>
    <div class="entry-content tags-page" itemprop="description">
        <?php specs_show_tags(); ?>
    </div>
	<footer class="entry-footer clearfix">
		<div class="post-share">
			<a href="javascript:;"><i class="fa fa-share-alt"></i><?php _e('share', 'quench');?></a>
			<ul>
				<li><a href="http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>" target="_blank"><i class="fa fa-qq"></i></a></li>
				<li><a href="http://service.weibo.com/share/share.php?title=<?php the_title(); ?>&amp;url=<?php the_permalink(); ?>" target="_blank"><i class="fa fa-weibo"></i></a></li>
				<li><a href="http://share.renren.com/share/buttonshare?link=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>" target="_blank"><i class="fa fa-renren"></i></a></li>
				<li><a href="http://twitter.com/share?url=<?php the_permalink(); ?>&amp;text=<?php the_title(); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
			</ul>
		</div>
		<div class="post-love">
			<a href="javascript:;" data-action="ding" data-id="<?php the_ID(); ?>" class="favorite post-love-link <?php if(isset($_COOKIE['lo_ding_'.$post->ID])) echo ' done';?>" title="Love this">
			<span class="love-count">
				<?php if( get_post_meta($post->ID,'lo_ding',true) ){
                    echo get_post_meta($post->ID,'lo_ding',true);
                 } else {
                    echo '0';
                 }?>
			</span> <i class="fa fa-heart-o"></i></a>
		</div>
	</footer>
</article>


<?php endwhile; endif;?>
</div></div>
<?php
get_sidebar();
get_footer();
?>
