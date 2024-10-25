
<?php
/*
Template Name: Coming Soon Template
*/
get_header(); 
?>
<div id="commingsoon">
    <main id="commingsoon-main" class="site-main" role="main">
        <div class="container clearfix">
            <h1><?php echo esc_html__( 'Coming Soon...', 'proghive' ) ?></h1>
            <p><?php echo esc_html__('Our website is under constructions. We will be back to you as soon as possible!', 'proghive') ?></p>
            <a class="ph-btn" href="<?php echo home_url() ?>">Contact Us</a>
        </div>
    </main>
</div>

<?php get_footer(); ?>
