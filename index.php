<?php

require_once 'src/Feed.php';

$rss = Feed::loadRss('https://pta-manado.go.id/site/berita-seputar-peradilan?format=feed&amp;type=rss');


//function untuk ambil gambar pertama pada rss
function get_first_image_url($html)
{
    if (preg_match('/<img.+?src="(.+?)"/', $html, $matches)) {
        return $matches[1];
    } else return 'https://picsum.photos/id/237/200/300';
}


$gambarutama = [];
$linkUtama = [];
$titleUtama = [];


foreach ($rss->item as $items) {
    # code...
    array_push($gambarutama, get_first_image_url($items->description));
    array_push($linkUtama, $items->link);
    array_push($titleUtama, $items->title);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card Slider Using Bootstrap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>

<body>


    <section id="deals" class=" mt-2 py-3">
        <div class="container-fluid">
            <div class="row text-center">
                <div class="col-9 mx-auto">
                    <form action="searchnews.php" method="GET">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="search" aria-label="Recipient's username" aria-describedby="basic-addon2" name="searchkey">
                            <span class="input-group-text" id="basic-addon2">
                                <button class="btn">
                                    <i class="bi bi-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Lick Carousel -->
            <div class="product-list px-2 ps-md-5 ms-md-1">

                <div class="me-md-3 py-2">
                    <div class="card border-0 position-relative mx-1" style="min-height: 20rem; max-height:20rem; overflow: hidden;">
                        <div class="row">
                            <div class="col-auto">
                                <img src="<?= $gambarutama[0] ?>" alt="" class="card-img-top img-fluid" style="max-height: 160px; object-fit:cover;">
                                <div class="card-body">
                                    <a href="<?= $linkUtama[0] ?>" class="text-decoration-none text-secondary">
                                        <p><?= $titleUtama[0] ?></p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="me-md-3 py-2">
                    <div class="card border-0 position-relative mx-1" style="min-height: 20rem; max-height:20rem; overflow: hidden;">
                        <div class="row">
                            <div class="col-auto">
                                <img src="<?= $gambarutama[1] ?>" alt="" class="card-img-top img-fluid" style="max-height: 160px; object-fit:cover;">
                                <div class="card-body">
                                    <a href="<?= $linkUtama[1] ?>" class="text-decoration-none text-secondary">
                                        <p><?= $titleUtama[1] ?></p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="me-md-3 py-2">
                    <div class="card border-0 position-relative mx-1" style="min-height: 20rem; max-height:20rem; overflow: hidden;">
                        <div class="row">
                            <div class="col-auto">
                                <img src="<?= $gambarutama[2] ?>" alt="" class="card-img-top img-fluid" style="max-height: 160px; object-fit:cover;">
                                <div class="card-body">
                                    <a href="<?= $linkUtama[2] ?>" class="text-decoration-none text-secondary">
                                        <p><?= $titleUtama[2] ?></p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="me-md-3 py-2">
                    <div class="card border-0 position-relative mx-1" style="min-height: 20rem; max-height:20rem; overflow: hidden;">
                        <div class="row">
                            <div class="col-auto">
                                <img src="<?= $gambarutama[3] ?>" alt="" class="card-img-top img-fluid" style="max-height: 160px; object-fit:cover;">
                                <div class="card-body">
                                    <a href="<?= $linkUtama[3] ?>" class="text-decoration-none text-secondary">
                                        <p>3<?= $titleUtama[3] ?></p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>


    <!-- tampilan berita -->
    <section id="news" class="mx-4">
        <div class="row">
            <div class="col">
                <h3><?php echo htmlspecialchars($rss->title) ?></h3>
            </div>
        </div>

        <!-- lakukan looping -->
        <?php $count = 0; ?>
        <?php foreach ($rss->item as $item) : ?>
            <?php if ($count >= 4) : ?>

                <div class="row">
                    <div class="col">
                        <div class="card mb-3">
                            <div class="row g-0">
                                <div class="col-12">
                                    <img src="<?= get_first_image_url($item->description) ?>" class="img-fluid img-thumbnail card-img-top">
                                </div>
                                <div class="col-12">
                                    <div class="card-body">
                                        <a href="<?= $item->link; ?>" class="text-decoration-none">
                                            <h5 class="card-title"><?= $item->title; ?></h5>
                                        </a>
                                        <p class="card-text"><small class="text-muted"><?= $item->pubDate; ?></small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endif; ?>
            <?php $count++; ?>
        <?php endforeach;  ?>


    </section>





    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous">
    </script>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js">
    </script>

    <script>
        $('div').filter(function() {
            return $(this).text().toLowerCase() === 'penari';
        }).css('background-color', 'red');
    </script>
</body>

</html>