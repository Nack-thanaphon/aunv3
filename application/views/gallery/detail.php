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
                    <a href="<?= site_url('Gallery/') ?>" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
                </div>
                <div class="col-12 col-sm-12 border shadow-sm">
                    <div class="row p-0 m-0 pt-3 pb-2">
                        <div class="py-3">
                            <h4 id="title">ชื่ออัลบั้ม : <?php echo  $gallery[0]['name'] ?> </h4>
                            <h6 id="date">วันเดือนปี : <?php echo  $gallery[0]['date'] ?> </h6>
                        </div>
                        <div>
                            <div class="row">

                                <?php foreach ($gallery as $row) { ?>
                                    <div class="col-sm-3 col-md-4 mb-3">
                                        <a class="fancybox" data-fancybox="gallery" href="https://info-AUN-HPN.com/bos/uploads/<?php echo $row['image'] ?>">
                                            <img width="100%" height="100%" src="https://info-AUN-HPN.com/bos/uploads/<?php echo $row['image'] ?>" alt="<?php echo $row['image'] ?>" />
                                        </a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div id="share-bar" class="p-0 p-sm-3"></div>


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
    $('#share-bar').share({
        animate: false
    });
</script>