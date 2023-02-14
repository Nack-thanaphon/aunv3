<style>
    /* .main1 {
        position: absolute;

    /* }  */

    .banner {
        height: auto !important;
        object-fit: cover !important;
    }
</style>

<div class="container p-0 ">
    <div class="row m-0 p-0">
        <div class="col-12 m-0 p-0 ">
            <div id="carouselExampleSlidesOnly main1" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner banner">
                    <?php if (!empty($banner)) { ?>
                        <?php foreach ($banner as  $key => $row) : ?>
                            <div type="button" onclick="getBannerDetail(<?= $row['id'] ?>)" class="carousel-item item <?= ($key == 0) ? "active" : "" ?>">
                                <img class="d-block w-100" style="object-fit: cover;" src="<?= $this->Helper_model->renderImg($row['image']) ?>" alt="<?= $row['name'] ?>">
                            </div>
                        <?php endforeach; ?>
                    <?php } else { ?>
                        <div class="carousel-item item active">
                            <img class="d-block w-100" style="object-fit: cover;" src="https://aihd.mahidol.ac.th/aun-hpn/img/popup/image_popup.jpg" alt="aun-hpn">
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 m-0  p-0">
            <div class="row m-0 p-0 main ">
                <div class="col-6  m-0 p-0">
                    <a href="about/ourMembers" target="blank" class="m-1 py-4 text-start text-sm-center px-2 card text-decoration-none">
                        <h2 class="m-0 p-0">MEMBERS</h2>
                        <small class="col-12 text-truncate text-muted"><i class="fas fa-circle-info"></i> ASEAN University Network - Health Promotion Network</small>
                    </a>
                </div>
                <div class="col-6  m-0 p-0">
                    <a href="https://hurs.mahidol.ac.th/#/" target="blank" class="bg-danger text-start text-sm-center text-decoration-none text-white m-1 py-4 px-2 card">
                        <h2 class="m-0 p-0">HURS</h2>
                        <small class="col-12 text-truncate "><i class="fa-solid fa-building-columns"></i> HEALTHY UNIVERSITY RATING SYSTEM</small>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="row mt-1 m-0 p-0">
        <div class="col-12 col-sm-12 m-0 my-3 p-0">
            <div class="row m-0 p-0">
                <h3>Core Responsibility</h3>
                <div class="col-6  m-0 p-0">
                    <div class="m-1 py-2 p-2 card">
                        เอกสารการประชุม : <span>Lorem, ipsum dolor.</span>
                    </div>
                </div>
                <div class="col-6  m-0 p-0">
                    <div class="m-1 py-2 p-2 card">
                        เอกสารการประชุม : <span>Lorem, ipsum dolor.</span>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <div class=" m-0 p-0 my-3">
        <div class="row  m-0 p-0">
            <div class="col-12 col-sm-8 m-0 my-3 p-0">
                <div class="row m-0 p-0 ">
                    <div class="col-12 d-flex justify-content-between mb-sm-4 mb-1">
                        <a href="<?= base_url('news') ?>" class="text-reset text-decoration-none">
                            <small class="text-uppercase my-auto "><i class="fa-solid fa-newspaper "></i> News & Articles</small>
                        </a>
                        <!-- <i class="fa-solid fa-angles-right text-muted my-auto"></i> -->
                    </div>

                    <?php foreach ($news as $row) : ?>
                        <div class="col-sm-4 col-12  m-0 p-0 mb-3">
                            <div class="m-1  p-2 shadow-sm ">
                                <img class="card-img-top" src="<?= renderImg($row->image) ?>" style="width:100%;height: 190px; object-fit:cover;" alt="Card image cap">
                                <div class=" m-0 p-0 mt-2">
                                    <a href="<?= base_url('posts/' . $row->id .'/'. $row->title) ?>" class="text-decoration-none text-reset text-decoration-none">
                                        <h5 class="card-title text-truncate text-danger"><?= $row->title ?></h5>
                                    </a>
                                    <div class="mb-4"></div>
                                    <div class="d-flex justify-content-between text-muted">
                                        <small><?= $row->date  ?></small>
                                        <small><i class="fa-solid fa-eye"></i> <?= number_format($row->view) ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;  ?>


                </div>
            </div>
            <div class="col-12 col-sm-4 m-0 my-3 p-0">
                <div class="row m-0 p-0 ">
                    <div class="col-12 d-flex justify-content-between mb-sm-4 mb-1">
                        <a href="<?= base_url('events') ?>" class="text-reset text-decoration-none">
                            <small class="text-uppercase my-auto "><i class="fa-sharp fa-solid fa-calendar "></i> Events</small>
                        </a>
                        <!-- <i class="fa-solid fa-angles-right text-muted my-auto"></i> -->
                    </div>
                    <div class="col-sm-12 col-12    m-0 p-0 ">
                        <div class="m-1  p-0">
                            <div class="row m-0 p-0 ">
                                <?php foreach ($event as $row) : ?>
                                    <div class="col-sm-12 col-12  m-0 p-0 mb-3">
                                        <div class="m-1  p-3 bg-white shadow-sm h-100 rounded-2">
                                            <div class="d-flex justify-content-between m-0 p-0">
                                                <div class="mb-1 col-12">
                                                    <!-- <small class="text-muted">เรื่อง</small><br> -->
                                                    <p class="m-0 p-0 text-truncate  text-danger"><?= $row['title'] ?></p>
                                                    <small class="text-muted"><i class="fas fa-location-dot text-danger"></i> <span><?= $row['address'] ?></span></small><br>
                                                    <small class="text-muted"><i class="fas fa-calendar text-muted"></i> <?= $row['date'] ?></small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row m-0 mb-3 p-0 ">
            <div class="col-12 col-sm-8 m-0 my-3 p-0">
                <div class="row m-0 p-0">
                    <div class="col-12 d-flex justify-content-between mb-sm-4 mb-1">
                        <a href="<?= base_url('download') ?>" class="text-reset text-decoration-none">
                            <small class="text-uppercase my-auto "><i class="fas fa-bullhorn "></i> Announce</small>
                        </a>
                        <!-- <i class="fa-solid fa-angles-right text-muted my-auto"></i> -->
                    </div>
                    <?php foreach ($download as $row) : ?>
                        <div class="col-sm-12 col-12  m-0 p-0 mb-3">
                            <div class="m-1  p-2   h-100 rounded-2">
                                <div class="shadow-sm rounded-2">
                                    <div class="card-header my-2 bg-danger text-white">
                                        <small class=""><?= $row['group'] ?></small>
                                        <h4 class="m-0 p-0 "><?= $row['name'] ?></h4>
                                    </div>
                                    <div class="p-2">
                                        <small class="text-muted"><i class="fa-solid fa-clock"></i> <?= $row['date'] ?></small> <br>
                                        <small class="text-danger"><a class="text-reset text-decoration-none" href="<?= $this->Helper_model->renderImg($row['file']) ?>"><i class="fas fa-circle-down"></i> ดาวน์โหลด</a></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col-12 col-sm-4 m-0 my-3 p-0 ">
                <div class="d-flex justify-content">
                    <div class="fb-page w-100 m-2 m-sm-5" data-href="https://www.facebook.com/100080046321842" data-width="380" data-hide-cover="false" data-show-facepile="false"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="bannerDetail" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">รายละเอียดแบนเนอร์</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="bannerData">

            </div>
        </div>
    </div>
</div>




<script>
    function getBannerDetail(bid) {


        $.ajax({
            type: "post",
            dataType: "json",
            url: BASE_URL + 'banner/getbannerbyid',
            data: {
                id: bid,
            },
            success: function(data) {

                let img = data.img
                let link = data.link
                let html = ''
                html += `<img class="w-100" src="<?= $this->Helper_model->renderImg('${img}') ?>" alt="">
                    <hr>
                    <p class="m-0 p-0 text-muted">หัวข้อ : <span class="text-dark">${data.title}</span></p>
                    <p class="m-0 p-0 text-muted my-3">รายละเอียด <br>
                        <span class="text-dark">${data.detail}</span>
                    </p>
                    <p class="m-0 p-0 text-muted">ลิงค์ : <span class="text-dark">${link?'<a href="'+link+'" target="blank">ไปที่ลิงค์</a>':'ไม่พบข้อมูล'}</span></p>
                `
                $('#bannerData').html(html)
                $('#bannerDetail').modal('show')
            },
            error: function(err) {
                console.log("fail", err);
            }
        })
    }
</script>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v15.0&appId=419942886747714&autoLogAppEvents=1" nonce="JxS1A5kt"></script>