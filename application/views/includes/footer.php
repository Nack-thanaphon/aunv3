<?php

$data = $this->Helper_model->getContact();
?>

<?php foreach ($data as $row) {; ?>
    <!-- Footer -->
    <div id="cookieWow"></div>
    <footer class="text-start text-lg-start pt-2">
        <div class="container">
            <div class="row mt-3 m-0 p-0 d-flex justify-items-between">
                <!-- Grid column -->
                <div class="col-12 col-sm-6 mx-auto pb-3  p-0">

                    <img src="<?= base_url('issets/img/footer/support.png') ?>" width="100%" height="auto" alt="">
                    <h6 class="py-5  text-dark " style="text-align: justify !important;">
                        &nbsp;&nbsp;<?= $row->about ?>
                    </h6>
                </div>


                <!-- Grid column -->
                <div class="col-12 col-sm-4 m-0 p-sm-0 mx-auto pb-3 p-0   text-align-start text-dark">
                    <!-- Links -->
                    <h3 class="text-uppercase fw-bold mb-4">
                        Contact Us
                    </h3>
                    <p><?= $row->name_address ?></p>
                    <small><?= $row->address ?></small>
                    <h6 class="my-3 p-0"><i class="fas fa-envelope me-3"></i><?= $row->email ?></h6>
                    <h6 class="my-3 p-0"><i class="fas fa-phone me-3"></i><?= $row->phone ?></h6>
                    <h6 class="my-3 p-0"><i class="fas fa-print me-3"></i><?= $row->fax ?></h6>
                </div>
                <!-- Grid column -->
            </div>



        </div>
        <section id="footer-social" class="d-flex justify-content-center justify-content-lg-between p-4 ">
            <div class="container">
                <!-- Left -->
                <div class="me-5 d-none d-lg-block">
                    © 2021 Copyright:
                    <a class="text-reset fw-bold" href="https://www.aun-hpn.or.th"><strong>aun-hpn.or.th</strong></a>
                </div>

            </div>
        </section>
    </footer>
    </body>

    </html>

<?php }; ?>