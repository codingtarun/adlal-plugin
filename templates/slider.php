<?php


$args = array(
    'post_type' => 'slider',
    'post_status' => 'publish',
    'posts_per_page' => 1
); 

$query = new WP_Query($args);

$links = '';
$title = '';

if($query->have_posts()){
    while($query->have_posts()){
        $query->the_post();
        $link_ = get_post_custom(get_the_ID());
        print_r($link_);
        echo "HELLO-->".$link_."<--HII";
        foreach($link_ as $key => $value){
            echo $key.' => '.$value;
        }
        $title .= get_the_title();
    }
}

echo $title."-".$links;