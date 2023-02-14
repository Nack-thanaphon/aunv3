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
    <?php foreach ($news as $row) { ?>
        <div class="row m-0 p-0" onclick="countStat('news','counter',<?= $row['id'] ?>,'p_views','posts')">
            <div class="col-12 m-0 p-0 d-sm-block d-none">
                <img src="<?= $this->Helper_model->renderImg($row['cover']) ?>" class="w-100" alt="">
            </div>
            <div class="col-sm-8 col-12 m-0 p-0 mt-3">
                <b class="badge rounded-pill bg-danger"><?= $row['type'] ?></b>
            </div>
            <div class="col-sm-4 col-12 m-0 p-0 mt-3 ">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= site_url('/') ?>">หน้าหลัก</a></li>
                        <li class="breadcrumb-item"><a href="<?= site_url('news/') ?>">ข่าว</a></li>
                        <li class="breadcrumb-item text-truncate col-8 active" aria-current="page"><?= $news[0]['title'] ?></li>
                    </ol>
                </nav>
            </div>
            <h1 class="col-12 py-sm-3 p-0 m-0 fw-bold text-justify text-danger"><?= $row['title'] ?></h1>
            <hr class="d-block d-sm-none my-2">
            <div class="col-12 col-sm-8 m-0 p-0 mb-4">
                <input type="hidden" id="news_id" value="<?= $row['id'] ?>">
                <div class="row mb-2 m-0 p-0 ">
                    <div class="col-12 col-sm-8 m-0  p-0 ">
                        <small class="text-muted"><i class="fas fa-calendar-week"></i> <?= $row['date'] ?></small>
                    </div>
                    <div class="col-12 col-sm-4 m-0 pt-2 p-sm-0 p-0">
                        <div class="row m-0 p-0  text-start text-sm-end">
                            <div class="col-12 col-sm-10 text-sm-end m-0 p-0">
                                <a type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="text-decoration-none text-danger"><i class="fa-sharp fa-solid fa-images "></i> ดูอัลบั้มรูปภาพ (<?= count($row['image']) ?>)</a>
                            </div>
                            <div class="col-12 col-sm-2 m-0 p-0">
                                <small class="text-muted"><i class="fa-solid fa-eye"></i> <?= $row['views'] ?></small>
                            </div>
                        </div>
                    </div>
                </div>
                <img src="<?= $this->Helper_model->renderImg($row['cover']) ?>" class="w-100" alt="">
                <div id="share-bar" class="p-0 p-sm-3"></div>
                <div class="my-4  mx-auto ">
                    <h5 class="text-reset" style="line-height: 35px;"><?= $row['detail'] ?></h5>
                </div>

                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <?php foreach ($row['image'] as $key => $image) { ?>
                            <div class="carousel-item  <?= ($key == 0) ? 'active' : '' ?>">
                                <img src="<?= $this->Helper_model->renderImg($image) ?>" class="d-block w-100" alt="...">
                            </div>
                        <?php } ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>


            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">อัลบั้มรูปภาพ</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row m-0 p-0">
                                <?php foreach ($row['image'] as $key => $image) { ?>
                                    <div class="col-4">
                                        <a class="fancybox" data-fancybox="gallery" href="<?= $this->Helper_model->renderImg($image) ?>">
                                            <img src="<?= $this->Helper_model->renderImg($image) ?>" class="d-block w-100" alt="...">
                                        </a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php $this->load->view('includes/aside'); ?>
        </div>
</div>




<script>
    function countStat(controller, func, id, name = null, table) {
        let BASE_URL = "<?= base_url() ?>"
        $.ajax({
            type: "post",
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            url: BASE_URL + 'Helper/counter',
            data: {
                id: id,
                name: name,
                table: table,
            },
            success: function(data) {
                console.log("good", data);
            },
            error: function(err) {
                console.log("fail", err);
            }
        })
    }
</script>