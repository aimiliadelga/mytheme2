<?php get_header(); ?>

<div class="container">
    <h1>Welcome to <?php bloginfo('name'); ?></h1>

    <section id="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="hero-section" style="background-image: url('<?php echo esc_url(get_field('hero_image')['url']); ?>');">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="about-content">
                        <h2>About Me</h2>
                        <?php 
                        $about_content = get_field('about_content'); 
                        if ($about_content) : ?>
                            <p style="text-align: left; color: black;"><?php echo $about_content; ?></p>
                        <?php endif; ?>
                        <?php
                        $cv_url = get_field('download_cv'); 
                        if ($cv_url) : ?>
                            <a href="<?php echo esc_url($cv_url); ?>" download class="btn btn-download">Download CV</a>
                        <?php endif; ?>

                        <?php
                        $video_cv_url = get_field('video_cv'); 
                        if ($video_cv_url) : ?>
                            <a href="<?php echo esc_url($video_cv_url); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-watch-video">Video CV</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="projects">
        <h2>Projects</h2>
        <div class="project-container">
            <?php
            $args = array(
                'post_type' => 'project',
                'posts_per_page' => -1,
            );

            $project_query = new WP_Query($args);

            if ($project_query->have_posts()):
                while ($project_query->have_posts()): $project_query->the_post();
            ?>
                    <div class="card">
                        <h3><?php the_title(); ?></h3>
                        <div class="card-content">
                            <?php the_content(); ?>
                        </div>
                        <?php
                        $project_image = get_field('project_image');
                        if ($project_image): ?>
                            <img src="<?php echo esc_url($project_image['url']); ?>" alt="<?php echo esc_attr($project_image['alt']); ?>" class="card-img">
                        <?php endif; ?>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            else: ?>
                <p>No projects found.</p>
            <?php endif; ?>
        </div>
    </section>
</div>

<section id="footer">
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h3>Contact me</h3>
                    <p>Email: <?php echo get_theme_mod('contact_email', 'aimdel01@easv365.dk'); ?></p>
                    <p>Phone: <?php echo get_theme_mod('contact_phone', '+4542319032'); ?></p>
                </div>
                <div class="col-md-4">
                    <h3>Follow Us</h3>
                    <ul>
                        <li><a href="<?php echo get_field('linkedin'); ?>">LinkedIn</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</section>

<?php get_footer(); ?>
<?php wp_footer(); ?>
</body>
</html>
