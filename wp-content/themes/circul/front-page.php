<?php

get_header();

?>



        <?php

        $sections = [
            'intro',
            'categories',
            'catalog'
        ];

        foreach ($sections as $section) {
            get_template_part('template-parts/' . $section);
        }

        ?>

<?php

get_footer();