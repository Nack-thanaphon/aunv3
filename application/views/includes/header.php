<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AUN-HPN | <?php echo isset($title) ? $title : 'ASEAN University Network-Health Promotion Network'; ?></title>
    <meta property="og:image" content="<?= isset($img) ? $this->Helper_model->renderImg($img) : '' ?>">
    <link rel="icon" href="<?= base_url('issets/img/logo/logo.png') ?>">
    <link rel="stylesheet" href="<?php echo Base_url('vendor/slickjs/slick/slick.css') ?>">
    <link rel="stylesheet" href="<?php echo Base_url('vendor/timeline/timeline.min.css') ?>">
    <link rel="stylesheet" href="<?php echo Base_url('vendor/summernote/summernote.min.css') ?>">
    <link rel="stylesheet" href="<?php echo Base_url('vendor/twbs/bootstrap/dist/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo Base_url('issets/dist/style.css') ?>">
    <link rel="stylesheet" href="<?php echo Base_url('vendor/viima/css/style.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" type="text/css" media="screen">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js">
    </script>

</head>

<body>
    <input type="hidden" id="webStat" name="ipAd" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>">

    <script>
        $(document).ready(function() {
            let ipAd = $('#webStat').val();
            let BASE_URL = "<?= base_url() ?>"

            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: BASE_URL + 'Helper/countervisiter',
                data: {
                    ip: ipAd,
                },
            }).done(function(data) {
                console.log('good', data)
            }).fail(function(err) {
                console.log('bad', err)
            })
        })
    </script>