<div class="d-block d-sm-none  text-end my-3">
    <div class="m-0 p-0 " type="button" id="showsear"><i class="fa-solid fa-magnifying-glass"></i> กดเพื่อค้นข้อมูล</div>
</div>
<div class="py-3  m-0 p-3 rounded-sm" id="search">
    <small class="text-muted"><i class="fa-solid fa-filter"></i> ค้นหา</small>
    <hr class="m-0 mb-2 p-0">
    <div class="mb-2">
        <small class="text-muted">ค้นหา <?= $title ?></small>
        <input type="text" id="titleData" class="form-control" placeholder="ค้นหา <?= $title ?>">
    </div>
    <?php if ($type != '') { ?>
        <small class="text-muted">ประเภท <?= $title ?></small>
        <select id="typeData" class="form-control mb-2">
            <option selected="selected" value="" disabled>เลือกประเภท <?= $title ?></option>
            <?php foreach ($type as $key => $row) { ?>
                <option class="form-control" value="<?= $row['typeId'] ?>"><i class="fas fa-square-rss"></i> <?= $row['type'] ?></option>
            <?php } ?>
        </select>
    <?php } ?>
    <?php if ($date != '') { ?>
        <small class="text-muted"><?= $title ?> ประจำเดือน</small>
        <select id="dateData" class="form-control mb-2">
            <option selected="selected" value=""><i class="fas fa-calendar-days"></i>เลือกเดือนปี</option>
            <?php foreach ($date as $key => $data) { ?>
                <option class="form-control" value="<?= $data['monthValue'] ?>"><i class="fas fa-square-rss"></i> <?= $data['month'] ?></option>
            <?php } ?>
        </select>
    <?php } ?>
    <div class="btn-group w-100" role="group" aria-label="Basic example">
        <button type="button" id="submit" class="btn btn-danger w-75">ค้นหา</button>
        <button type="button" id="reset" class="btn btn-tranparent"><i class="fa-sharp fa-solid fa-rotate-left"></i></button>
    </div>
</div>

<script>
    $("#submit").click(function() {
        titleData = $("#titleData").val()
        typeData = $("#typeData").val()
        dateData = $("#dateData").val()
        getData()
    })

    $("#reset").click(function() {
        titleData = ''
        typeData = ''
        dateData = ''
        $("#titleData").val('')
        $("#typeData").val('')
        $("#dateData").val('')
        getData()
    })

    $('#showsear').click(function() {
        $('#search').toggleClass("d-none");
        $('#calendar').toggleClass("d-none");
    })
</script>