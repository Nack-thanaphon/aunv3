<?php
$CI     = &get_instance();
$result = $CI->News_model->get_newest();
?>

<div class="col-12 col-sm-4  m-0 p-0 mb-3 ">
    <div class="row m-0 p-0 p-sm-4">
        <h3 class="pt-2 p-1 m-0 fw-bold">Lastest News</h3>
        <hr class="d-block d-sm-none">
        <?php foreach ($result as $row) : ?>
            <div class="col-12 col-sm-12 m-0 p-0 ">
                <a href="<?= site_url("news/singlenews/" . $row->id) ?>" class=" text-decoration-none ">
                    <div class="row m-0  mb-2 rounded-sm p-1">
                        <div class="col-4 d-none d-sm-block m-0 p-0 my-auto">
                            <div class="p-1">
                                <img class=" m-0 p-0 rounded-sm w-100" src="<?= $this->Helper_model->renderImg($row->image) ?>" alt="<?= $row->title ?>">
                            </div>
                        </div>
                        <div class="col-12 col-sm-8  text-start   m-0 p-0 ">
                            <div class="p-1">
                                <p class="p-0 m-0 text-truncate "><?= $row->title ?></p>
                                <small class="text-muted m-0 p-0"><i class="fas fa-calendar-week"></i> <?= $row->date ?></small>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>