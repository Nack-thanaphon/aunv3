<style>
    @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Thai&display=swap');

    .special {
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }

    p,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    small,
    span,
    a {
        font-family: 'Noto Sans Thai', sans-serif !important;
    }

    .list-item {
        cursor: pointer;
        transition: 0.3s;
    }

    .MsoNormal {
        margin: 0px !important;
    }
</style>






<div class="container">
    <div class="row m-0 p-0">

        <div class="col-12 p-sm-5 p-0">
            <!-- <div class="row m-0 p-0 d-flex justify-content-between"> -->
            <div class="row m-0 p-0">
                <div class="col-12 col-sm-12 my-1 m-0 p-0">
                    <a href="<?= site_url('news/') ?>" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
                </div>
                <div class="col-12 col-sm-12 card shadow-sm">

                    <?php foreach ($news as $row) { ?>
                        <div class="row p-0 m-0 pt-3 pb-2">
                            <small class="m-0 p-0"><?php echo  $row['n_type'] ?></small>
                            <h1 class="col-12 py-3 p-0 m-0 "><?php echo  $row['n_name'] ?></h1>
                            <input type="hidden" id="news_id" value="<?php echo  $row['n_id'] ?>">
                            <div class="col-8 m-0  p-0 text-start">
                                <small class="text-muted">Date: <?php echo  $row['n_date'] ?></small>
                            </div>
                            <div class="col-4 m-0  p-0 text-end">
                                <small class="text-muted">View : <?php echo  $row['n_views'] ?> ครั้ง</small>
                            </div>
                        </div>
                        <img src="https://info-AUN-HPN.com/bos/<?= $row['n_image'] ?>" class="w-100" alt="">
                        <div id="share-bar" class="p-0 p-sm-3"></div>
                        <div class="my-4 text-justify mx-auto">
                            <p class="m-0"><?php echo  $row['n_detail'] ?></p>
                        </div>

                    <?php } ?>
                </div>
                <!-- <div class="col-12 col-sm-3 mt-3 mt-sm-0 border">
            <h3 class="pt-2">Lastest News</h3>
            <a href="<?= site_url("news/singlenews") ?>" class="card col-12 p-1 border mb-2 text-decoration-none">
                <p class="p-0 m-0">Lorem, ipsum dolor.</p>
                <small class="text-muted">12 December 2022</small>
            </a>
            <a href="<?= site_url("news/singlenews") ?>" class="card col-12 p-1 border mb-2 text-decoration-none">
                <p class="p-0 m-0">Lorem, ipsum dolor.</p>
                <small class="text-muted">12 December 2022</small>
            </a>
            <a href="<?= site_url("news/singlenews") ?>" class="card col-12 p-1 border mb-2 text-decoration-none">
                <p class="p-0 m-0">Lorem, ipsum dolor.</p>
                <small class="text-muted">12 December 2022</small>
            </a>
            <a href="<?= site_url("news/singlenews") ?>" class="card col-12 p-1 border mb-2 text-decoration-none">
                <p class="p-0 m-0">Lorem, ipsum dolor.</p>
                <small class="text-muted">12 December 2022</small>
            </a>
            <a href="<?= site_url("news/singlenews") ?>" class="card col-12 p-1 border mb-2 text-decoration-none">
                <p class="p-0 m-0">Lorem, ipsum dolor.</p>
                <small class="text-muted">12 December 2022</small>
            </a>
        </div> -->
            </div>
        </div>

    </div>
</div>


<script>
    $(function() {
        var baseUrl = (window.location).href; // You can also use document.URL
        var id = document.getElementById("news_id").value;
        console.log(id)
        $.ajax({
            type: "post",
            dataType: "json",
            url: "<?= base_url('news/counter') ?>",
            data: {
                id: id,
            },
            success: function(data) {
                console.log(data);
            },
            error: function(err) {
                console.log("bad", err)
            }
        })

    })
    $('#share-bar').share({
        animate: false
    });
</script>