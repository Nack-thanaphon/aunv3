<style>
    .navbar-collapse {
        flex-grow: 0 !important;
    }
</style>
<?php
$data = $this->Helper_model->getContact();
?>

<?php foreach ($data as $row) {; ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-danger navbar-dark shadow M-0 P-0">
        <div class="container my-2 py-1 ">
            <a class="navbar-brand d-flex justify-content-between  " href="<?= site_url('./') ?>">
                <!-- <img class="d-none d-sm-block" src="./img/logo/logo2.png" alt=""> -->
                <img width="60px" height="60px" class=" d-block " src="<?= $this->Helper_model->renderImg($row->logo) ?>" alt="">
                <div class="navbar-detail text-white my-auto mx-2">
                    <h4 class="p-0 m-0" style="font-size: 1.7rem;"><?= $row->nickname ?></h4>
                    <p class="p-0 m-0 d-none d-sm-block" style="font-size: 1rem;"><?= $row->name ?></p>
                </div>
            </a>

            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-content">
                <div class="hamburger-toggle">
                    <div class="hamburger">
                        <span class="navbar-toggler-icon"></span>
                    </div>
                </div>
            </button>
            <div class="collapse navbar-collapse  " id="navbar-content">
                <ul class="navbar-nav m-auto  ">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">About</a>
                        <ul class="dropdown-menu shadow">
                            <li><a class="dropdown-item" href="<?= base_url('about') ?>">HISTORY OF AUN-HPN</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('about/mission') ?>">Mission|Goals|Objectives</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('about/scope') ?>">SCOPE OF WORK</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('about/ourMembers') ?>">OUR MEMBERS</a></li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="<?= base_url('about/fq') ?>">F/Q</a></li>
                        </ul>
                    </li>
                    <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">Our Work</a>
                    <ul class="dropdown-menu shadow">
                        <li><a class="dropdown-item" href="#">Gallery</a></li>
                        <li><a class="dropdown-item" href="blog.html">Blog</a></li>

                        <li class="dropend">
                            <a href="#" class="dropdown-item dropdown-toggle text-wrap" data-bs-toggle="dropdown" data-bs-auto-close="outside"><small>THAI-UNIVERSITY NETWORK – HEALTH PROMOTION NETWORK (TUN-HPN)</small> </a>
                            <ul class="dropdown-menu shadow">
                                <li class="w-100"><a class="dropdown-item text-wrap w-100" href="<?= base_url('tun/') ?>"><small><i class="fa-solid fa-building-columns"></i> INTRODUCTION OF TUN-HPN</small></a></li>
                                <li class="w-100"><a class="dropdown-item text-wrap w-100" href="https://www.thaihealth.or.th/"><small><i class="fa-solid fa-building-columns"></i> THAI HEALTHY PROMOTION FOUNDATION (THAI-HEALTH)</small> </a></li>
                                <li class="w-100"><a class="dropdown-item text-wrap w-100" href="<?= base_url('tun/news/MAHIDOL') ?>"><small><i class="fa-solid fa-building-columns"></i> MAHIDOL UNIVERSITY WORKING GROUP</small></a></li>
                                <li class="w-100"><a class="dropdown-item text-wrap w-100" href="<?= base_url('tun/news/CHULALONGKORN') ?>"><small><i class="fa-solid fa-building-columns"></i> CHULALONGKORN UNIVERSITY</small></a></li>
                                <li class="w-100"><a class="dropdown-item text-wrap w-100" href="<?= base_url('tun/news/CHIANGMAI') ?>"><small><i class="fa-solid fa-building-columns"></i> CHIANGMAI UNIVERSITY</small></a></li>
                                <li class="w-100"><a class="dropdown-item text-wrap w-100" href="<?= base_url('tun/news/SONGKLA') ?>"><small><i class="fa-solid fa-building-columns"></i> PRINCE OF SONGKLA UNIVERSITY</small></a></li>
                                <li class="w-100"><a class="dropdown-item text-wrap w-100" href="<?= base_url('tun/news/BURAPHA') ?>"><small><i class="fa-solid fa-building-columns"></i> BURAPHA UNIVERSITY</small></a></li>
                                <li class="w-100"><a class="dropdown-item text-wrap w-100" href="<?= base_url('tun/news/KHONKAEN') ?>"><small><i class="fa-solid fa-building-columns"></i> KHON KAEN UNIVERSITY</small></a></li>
                            </ul>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a href="<?= base_url('about/iac') ?>" class="dropdown-item text-wrap"><small>INTERNATIONAL ADVISORY COMMITTEE (IAC)</small></a></li>
                        <li><a href="<?= base_url('about/hur') ?>" class="dropdown-item text-wrap"><small>HEALTHY UNIVERSITY RATING SYSTEM (HURS)</small></a></li>
                    </ul>
                </li> -->
                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">Resource</a>
                        <ul class="dropdown-menu shadow text-uppercase">
                            <li class="dropdown-item">
                                <a href="<?= site_url('events') ?>" class="dropdown-item m-0 p-0">Events</a>
                            </li>
                            <li class="dropend">
                                <a href="#" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">NEWS</a>
                                <ul class="dropdown-menu shadow">
                                    <li><a class="dropdown-item" href="<?= base_url('News') ?>">NEWS</a></li>
                                    <li><a class="dropdown-item" href="<?= base_url('Newsletter') ?>">E-NEWSLETTER</a></li>
                                </ul>
                            </li>
                            <!-- <li class="dropdown-item ">
                            <a href="<?= site_url('Accadamic') ?>" class="dropdown-item m-0 p-0">Our People</a>
                        </li>
                        <li class="dropdown-item">
                            <a href="<?= site_url('About') ?>" class="dropdown-item m-0 p-0">History</a>
                        </li> -->
                            <li class="dropdown-item">
                                <a href="<?= site_url('download') ?>" class="dropdown-item m-0 p-0">Downloads</a>
                            </li>
                            <!-- <li class="dropend">
                            <a href="#" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">Resources</a>
                            <ul class="dropdown-menu shadow">
                                <li><a class="dropdown-item" href="<?= base_url('education') ?>">Curriculums</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('download') ?>">Downloads</a></li>
                            </ul>
                        </li> -->
                            <li class="dropdown-item">
                                <a href="<?= site_url('gallery') ?>" class="dropdown-item m-0 p-0">Gallery</a>
                            </li>
                            <!-- <li class="dropdown-item">
                            <a href="<?= site_url('linkto') ?>" class="dropdown-item m-0 p-0">Link to</a>
                        </li> -->

                        </ul>
                    </li>

                    <!-- <li class="nav-item ">
                    <a class="nav-link " href="<?= base_url('education') ?>"> Curriculums </a>

                </li> -->

                    <li class="nav-item ">
                        <a class="nav-link" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#contact"> Contact </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link  " href="https://www.info.aun-hpn.or.th" target="blank"> Login </a>

                </ul>
                <!-- <form class="d-flex ms-auto">
                <div class="input-group">
                    <input class="form-control border-0 mr-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-primary border-0" type="submit">Search</button>
                </div>
            </form> -->
            </div>

        </div>
    </nav>
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal" id="contact" tabindex="-1" aria-labelledby="contactLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contactLabel">Contact Us</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mt-3 m-0 p-0 d-flex justify-items-between">
                        <div class="col-12 col-sm-12 m-0 p-sm-0 mx-auto pb-3 p-0   text-align-start text-dark">
                            <p><?= $row->name_address ?></p>
                            <small><?= $row->address ?></small>
                            <h6 class="my-3 p-0"><i class="fas fa-envelope me-3"></i><?= $row->email ?></h6>
                            <h6 class="my-3 p-0"><i class="fas fa-phone me-3"></i><?= $row->phone ?></h6>
                            <h6 class="my-3 p-0"><i class="fas fa-print me-3"></i><?= $row->fax ?></h6>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a type="button" target="blank" href="mailto:<?= $row->email ?>?subject = Feedback&body = Message" class="btn btn"><i class="fas fa-envelopes-bulk"></i> Send Email</a>
                    <a type="button" target="blank" href="<?= $row->facebook ?>" class="btn btn-primary"> <i class="fab fa-facebook-f"></i> Facebook</a>
                </div>
            </div>
        </div>
    </div>
<?php }; ?>
<!-- Bootstrap 5 JS -->
<!-- <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js'></script> -->
<script>
    document.addEventListener('click', function(e) {
        // Hamburger menu
        if (e.target.classList.contains('hamburger-toggle')) {
            e.target.children[0].classList.toggle('active');
        }
    })
</script>

<!-- Button trigger modal -->


<!-- Modal -->