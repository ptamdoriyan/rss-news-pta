<?php

require_once 'src/Feed.php';

$rss = Feed::loadRss('https://pta-manado.go.id/site/berita-seputar-peradilan?format=feed&amp;type=rss');

function get_first_image_url($html)
{
    if (preg_match('/<img.+?src="(.+?)"/', $html, $matches)) {
        return $matches[1];
    }
    else return 'https://picsum.photos/id/237/200/300';
}

foreach ($rss->item as $item) {
    # code...
    echo '<img src="' .get_first_image_url($item->description). '"/>';
}




?>