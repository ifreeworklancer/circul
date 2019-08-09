<?php

get_header();

$sections = ['intro', 'categories', 'catalog'];

foreach ($sections as $section) {
    get_template_part('template-parts/'.$section);
}

get_footer();