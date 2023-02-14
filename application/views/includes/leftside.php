<?php
// $CI     = &get_instance();
$type = $this->News_model->get_newstype();
$getmonth = $this->News_model->get_news_bymonth();
?>


<div class="col-12 col-sm-3 mb-3 ">
    <small class="text-muted"><i class="fa-solid fa-filter"></i> ค้นหา</small>
    <hr class="m-0 mb-2 p-0">
    <div class="py-1 shadow-sm m-0 p-3 rounded">
        <form action="<?= base_url('news/index') ?>" method="POST">
            <small class="text-muted">ประเภทข่าวสาร</small>
            <select name="type" class="form-control mb-2">
                <option selected="selected" value="0">เลือกประเภทข่าวสาร</option>
                <?php foreach ($type as $key => $row) { ?>
                    <option class="form-control" value="<?= $row->p_type_id ?>"><i class="fas fa-square-rss"></i> <?= $row->pt_name ?> ( <span class="text-danger"><?= $row->total ?></span> )</option>
                <?php } ?>
            </select>
            <small class="text-muted">ข่าวประจำเดือน</small>
            <select name="month" class="form-control mb-2">
                <option selected="selected" value="0"><i class="fas fa-calendar-days"></i>เลือกเดือนปี</option>
                <?php foreach ($getmonth as $key => $data) { ?>
                    <option class="form-control" value="<?= $data['month'] ?>"><i class="fas fa-square-rss"></i> <?= $data['month'] ?></option>
                <?php } ?>
            </select>
            <div class="btn-group w-100" role="group" aria-label="Basic example">
                <button type="submit" class="btn btn-danger w-75">ค้นหา</button>
                <form action="<?= base_url('news/index') ?>" method="POST">
                    <button type="submit" class="btn btn-tranparent">reset</button>
                </form>
            </div>
        </form>
    </div>

</div>