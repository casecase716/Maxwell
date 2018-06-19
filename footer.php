<?php if (!is_front_page()) {;?>

    <div class="row collapse swe-margin-top-5">
        <div class="large-8 large-centered columns ftr">
            <div class="row collapse">
                <div class="large-10 large-centered medium-10 medium-centered small-12 columns ">
                    <div class="row ftr-row">
                    <?php
                        // check if the repeater field has rows of data
                        if( have_rows('footer_info','options') ):
                            // loop through the rows of data
                            while ( have_rows('footer_info','options') ) : the_row();?>

                            <div class="large-2 medium-2 small-6 columns text-right end">
                                <h1><?php the_sub_field('footer_section_title', 'options');?></h1>
                                <?php the_sub_field('footer_section_info','options');?>
                            </div>

                            <?php endwhile;
                        else :
                            echo 'No listings';
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php };?>

            </div> <!-- end main content column -->
        </div> <!-- end main content row -->
        <a class="exit-off-canvas"></a><!-- close the off-canvas menu -->
    </div><!-- inner wrap div -->
</div> <!-- off canvas div -->
<?php wp_footer(); ?>
<script>
    jQuery(document).ready(function($) {
        $(document).foundation();
        $("ul.left-submenu").prepend("<li class='back'><a href='#'>Back</a></li>");
        // Hack to get off-canvas .menu-icon to fire on iOS
        $('.menu-icon').click(function(){ false });

        $(".firstWord").html(function(){
            var text= $(this).text().trim().split(" ");
            var first = text.shift();
            return (text.length >= 0 ? "<h2>"+ first + "</h2> " : first) + "<h1>" + text.join(" ") + "</h1>";
        });
        (function () {

            var scrollHandle = 0,
                scrollStep = 5,
                parent = $("#container");

            //Start the scrolling process
            $(".panner").on("mouseenter", function () {
                var data = $(this).data('scrollModifier'),
                    direction = parseInt(data, 10);

                $(this).addClass('active');

                startScrolling(direction, scrollStep);
            });

            //Kill the scrolling
            $(".panner").on("mouseleave", function () {
                stopScrolling();
                $(this).removeClass('active');
            });

            //Actual handling of the scrolling
            function startScrolling(modifier, step) {
                if (scrollHandle === 0) {
                    scrollHandle = setInterval(function () {
                        var newOffset = parent.scrollLeft() + (scrollStep * modifier);

                        parent.scrollLeft(newOffset);
                    }, 10);
                }
            }

            function stopScrolling() {
                clearInterval(scrollHandle);
                scrollHandle = 0;
            }

        }());
        });

</script>

</body>
</html>