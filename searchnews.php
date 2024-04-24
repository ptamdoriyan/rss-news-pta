<?php

require_once 'src/Feed.php';

$rss = Feed::loadRss('https://pta-manado.go.id/site/berita-seputar-peradilan?format=feed&amp;type=rss');

if (!isset($_GET['searchkey'])) {
    $searchkey = '';
} else {
    $searchkey = $_GET['searchkey'];
}



//function untuk ambil gambar pertama pada rss
function get_first_image_url($html)
{
    if (preg_match('/<img.+?src="(.+?)"/', $html, $matches)) {
        return $matches[1];
    } else return 'https://picsum.photos/id/237/200/300';
}

// $i = 1;
// foreach ($rss->item as $item) {
//     $title = $item->title;
//     if (stripos($title, $searchkey) !== false) {
//         echo $title;
//     } else {
//         # code...
//         echo "gagal ke {$i} ";
//     }
//     $i++;
// }

// die;

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>

    <section id="searchnews" class="mt-5 p-3">

        <div class="row mt-2 mb-3" id="Judul">
            <div class="col">
                <h4>Berita Terkait</h4>
            </div>
        </div>
        <!-- lakukan pengulangan -->

        <div id="searchNews">

            <?php foreach ($rss->item as $item) : ?>
                <?php $title = $item->title; ?>
                <?php if (stripos($title, $searchkey) !== false) : ?>

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

                <?php endif ?>

            <?php endforeach ?>
        </div>


    </section>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <script>
        console.log("Hallo")

        if ($('#searchNews').children().length == 0) {
            console.log('tidak ada data');
            $notfound = `
            <div class="row">
                <div class="col">
                    <div class="card text-bg-warning">
                        <div class="card-body">
                            <h3>Hasil Pencarian Tidak Ditemukan!</h3>
                            <p>Silahkan Mencari dengan kata kunci lain.</p>
                            <a href="#" class="btn btn-danger" id="back" onclick="history.back()">Kembali Ke Berita</a>
                        </div>
                        </div>
                </div>
            </div>
             `
            $("#searchNews").append($notfound);

        }
    </script>
</body>

</html>