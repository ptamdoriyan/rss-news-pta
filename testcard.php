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

    <section class="bg-light pt-5 pb-5 shadow-sm">
        <div class="container">
            <div class="row pt-5">
                <div class="col-12">
                    <h3 class="text-uppercase border-bottom mb-4">Equal height Bootstrap 5 cards example</h3>
                </div>
            </div>
            <div class="row product-list">
                <!--ADD CLASSES HERE d-flex align-items-stretch-->
                <div class="col-lg-4 mb-3 d-flex align-items-stretch">
                    <div class="card">
                        <img src="https://i.postimg.cc/28PqLLQC/dotonburi-canal-osaka-japan-700.jpg" class="card-img-top" alt="Card Image">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Dōtonbori Canal</h5>
                            <p class="card-text mb-4">Is a manmade waterway dug in the early 1600's and now displays many landmark commercial locals and vivid neon signs.</p>
                            <a href="#" class="btn btn-primary mt-auto align-self-start">Book now</a>
                        </div>
                    </div>
                </div>
                <!--ADD CLASSES HERE d-flex align-items-stretch-->
                <div class="col-lg-4 mb-3 d-flex align-items-stretch">
                    <div class="card">
                        <img src="https://i.postimg.cc/4xVY64PV/porto-timoni-double-beach-corfu-greece-700.jpg" class="card-img-top" alt="Card Image">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Porto Timoni Double Beach</h5>
                            <p class="card-text mb-4">Near Afionas village, on the west coast of Corfu island. The two beaches form two unique bays. The turquoise color of the sea contrasts to the high green hills surrounding it.</p>
                            <a href="#" class="btn btn-primary mt-auto align-self-start">Book now</a>
                        </div>
                    </div>
                </div>
                <!--ADD CLASSES HERE d-flex align-items-stretch-->
                <div class="col-lg-4 mb-3 d-flex align-items-stretch">
                    <div class="card">
                        <img src="https://i.postimg.cc/TYyLPJWk/tritons-fountain-valletta-malta-700.jpg" class="card-img-top" alt="Card Image">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Tritons Fountain</h5>
                            <p class="card-text mb-4">Located just outside the City Gate of Valletta, Malta. It consists of three bronze Tritons holding up a large basin, balanced on a concentric base built out of concrete and clad in travertine slabs.</p>
                            <a href="#" class="btn btn-primary mt-auto align-self-start">Book now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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