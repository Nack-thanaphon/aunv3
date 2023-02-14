<style>

    .special {
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }

   

    .list-item {
        cursor: pointer;
        transition: 0.3s;
    }

    .news_img {
        height: 170px !important;
        object-fit: cover;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>


<div class="header-cover">
    <div class="centered">
        <h2 class="m-0 p-0">News</h2>
        <small class="text-white">ASEAN University Network - Health Promotion Network</small>

    </div>
    <img class="header-img" src="https://www.mitihoon.com/wp-content/uploads/2017/11/bg-footer-mitihoon.jpg" alt="">
</div>

<div class="container">
    <div class="row m-0 p-0">
        <div class="col-12 p-sm-5  m-0 p-0">
            <div class="row m-0 p-0 my-2">
            <div class="col-12 col-sm-3 m-0 mb-2 ">
                    <?php $this->load->view('layout/leftside', $title); ?>
                </div>
                <div class="col-12 col-sm-9 mt-3 mt-sm-0">
                    <div class="col-12 col-sm-12 m-0 p-0 text-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= site_url('/') ?>">หน้าหลัก</a></li>
                                <li class="breadcrumb-item text-truncate active">ข่าวทั้งหมด</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row m-0 p-0" id="newsData">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    // var data = [];
    var titleData = '';
    var typeData = '';
    var dateData = '';

    let BASE_URL = "<?= base_url() ?>"

    getData()

    function getData() {
        $.LoadingOverlay("show");
        $.ajax({
            url: "<?= base_url(); ?>news/getnews",
            method: "POST",
            data: {
                title: titleData,
                type: typeData,
                month: dateData
            },
            dataType: "JSON",
            success: function(response) {
                renderData(response)
            }
        })
        $.LoadingOverlay("hide");
    };


    function renderData(data) {
        renderObj = ''
        if (data != '') {
            for (let i = 0; i < data.length; i++) {
                let img = data[i].image
                renderObj +=
                    `
                <div class="col-12 col-sm-4 m-0 p-0 mb-1  ">
                        <a href="${BASE_URL+"posts/"+ data[i].id + "/" +data[i].title}" class=" text-reset text-decoration-none ">
                        <div class="shadow-sm m-1">
                        <img src="<?= renderImg('${img}') ?>" class="w-100" style="height: 150px;object-fit: cover;" alt="...">
                        <div class="m-0 p-2">
                        <small class="col-12 text-truncate fw-bold text-muted">${data[i].type}</small>
                        <h6 class="col-12 text-truncate fw-bold text-danger">${data[i].title}</h6>
                        <!-- <p class="text-muted mb-2"><i class="fas fa-calendar-week"></i> ${data[i].date}</p> -->
                        </div>
                        </div>
                        </a>
                </div>
                    `
            }
        } else {
            renderObj = '<p>ไม่พบข้อมูล</p>'
        }

        $("#newsData").html(renderObj)


    }
</script>