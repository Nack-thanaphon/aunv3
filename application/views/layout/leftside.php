<div class="col-12 col-sm-3 my-3 d-block d-sm-none text-end">
    <button  class="btn btn m-0 p-0" id="showsear"><i class="fa-solid fa-magnifying-glass"></i> กดเพื่อค้นข้อมูล</button>
</div>
<div class="col-12 col-sm-3 mb-3 d-none d-sm-block" id="search">
    <div class="py-3 shadow-sm m-0 p-3 rounded-sm">
        <small class="text-muted"><i class="fa-solid fa-filter"></i> ค้นหา</small>
        <hr class="m-0 mb-2 p-0">
        <div class="mb-2">
            <small class="text-muted">ค้นหาข่าวสาร</small>
            <input type="text" id="titleData" class="form-control" placeholder="ค้นหาข่าวสาร บทความ..">
        </div>
        <small class="text-muted">ประเภทข่าวสาร</small>
        <select id="typeData" class="form-control mb-2">
            <option selected="selected" value="">เลือกประเภทข่าวสาร</option>
            <?php foreach ($type as $key => $row) { ?>
                <option class="form-control" value="<?= $row->p_type_id ?>"><i class="fas fa-square-rss"></i> <?= $row->pt_name ?> ( <span class="text-danger"><?= $row->total ?></span> )</option>
            <?php } ?>
        </select>
        <small class="text-muted">ข่าวประจำเดือน</small>
        <select id="dateData" class="form-control mb-2">
            <option selected="selected" value=""><i class="fas fa-calendar-days"></i>เลือกเดือนปี</option>
            <?php foreach ($date as $key => $data) { ?>
                <option class="form-control" value="<?= $data['month'] ?>"><i class="fas fa-square-rss"></i> <?= $data['month'] ?></option>
            <?php } ?>
        </select>
        <div class="btn-group w-100" role="group" aria-label="Basic example">
            <button type="button" id="submit" class="btn btn-danger w-75">ค้นหา</button>
            <button type="button" id="reset" class="btn btn-tranparent">reset</button>
        </div>
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
    })
</script>