<div class="col-12 text-center my-auto" id="text-slide">
    <div class="d-flex justify-content-between align-items-center breaking-news">
        <div class="d-flex flex-row flex-grow-1 flex-fill justify-content-center   py-2 text-primary px-1 news"><span class="d-flex align-items-center">
                <h4 class="p-0 m-0 border-left">&nbsp;Announcement</h4>
            </span></div>
        <marquee class="news-scroll " behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">
            <a href="https://hurs.mahidol.ac.th" class="nav-link" target="blank">
                <h3 class="m-0 p-0 text-dark">Welcome to AUN-HPN | ASEAN University Network - Health Promotion Network</h3>
            </a>
        </marquee>

    </div>
</div>



<div class="row m-0 p-0">
    <div class="col-12 py-5 bg-primary text-center">
        <h1 class="p-0 m-0 text-white text-center ">Courses
        </h1>
    </div>
    <div class="col-12 p-sm-5 p-2">
        <div class="row m-0 p-0">
            <div class="col-12 col-sm-12 my-1">
                <a href="<?= site_url('education/ourProgram') ?>" class="btn btn-secondary"><i class="fas fa-bookmark"></i> Global Health Program</a>
            </div>
            <div class="col-12 col-sm-3">
                <div class="position-sticky  mb-5">
                    <div class="text-black rounded">
                        <div class="bg-white  py-3 text-white ">
                            <div class="nav flex-column nav-pills me-3 text-dark" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link text-uppercase active" type="button" id="faculty1-tab" data-bs-toggle="pill" data-bs-target="#faculty1" type="button" role="tab" aria-controls="faculty1" aria-selected="true">
                                    Name of Faculty 1
                                </a>
                                <a class="nav-link text-uppercase" type="button" id="faculty2-tab" data-bs-toggle="pill" data-bs-target="#faculty2" role="tab" aria-controls="faculty2" aria-selected="false">
                                    Name of Faculty 2
                                </a>
                                <a class="nav-link text-uppercase" type="button" id="faculty3-tab" data-bs-toggle="pill" data-bs-target="#faculty3" role="tab" aria-controls="faculty3" aria-selected="false">
                                    Name of Faculty 3
                                </a>
                                <a class="nav-link text-uppercase" type="button" id="faculty4-tab" data-bs-toggle="pill" data-bs-target="#faculty4" role="tab" aria-controls="faculty4" aria-selected="false">
                                    Name of Faculty 4
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-9 tab-content" id="v-pills-tabContent">
                <div class=" tab-pane fade show active py-3" id="faculty1" role="tabpanel" aria-labelledby="faculty1-tab">
                    <ul class="nav nav-pills flex-column flex-sm-row justify-content-end" id="myTab" role="tablist">
                        <li class="nav-item  flex-fill " role="presentation">
                            <button class="nav-link active w-100" id="home-tab" data-bs-toggle="tab" data-bs-target="#Courses1" type="button" role="tab" aria-selected="true">Courses</button>
                        </li>
                        <li class="nav-item flex-fill " role="presentation">
                            <button class="nav-link w-100" id="profile-tab" data-bs-toggle="tab" data-bs-target="#Program1" type="button" role="tab" aria-selected="false">Program Lecturer</button>
                        </li>
                        <li class="nav-item flex-fill " role="presentation">
                            <button class="nav-link w-100" id="contact-tab" data-bs-toggle="tab" data-bs-target="#Detail1" type="button" role="tab" aria-selected="false">Detail</button>
                        </li>
                        <li class="nav-item flex-fill " role="presentation">
                            <button class="nav-link w-100" id="contact-tab" data-bs-toggle="tab" data-bs-target="#Contact1" type="button" role="tab" aria-selected="false">Contact us</button>
                        </li>
                    </ul>
                    <div class="tab-content py-5" id="myTabContent">
                        <div class="tab-pane fade show active" id="Courses1" role="tabpanel">
                            Name of Faculty 1
                        </div>
                        <div class="tab-pane fade" id="Program1" role="tabpanel">

                        </div>
                        <div class="tab-pane fade" id="Detail1" role="tabpanel">

                        </div>
                        <div class="tab-pane fade" id="Contact1" role="tabpanel">
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade  py-3" id="faculty2" role="tabpanel" aria-labelledby="faculty2-tab">
                    <ul class="nav nav-pills  flex-column flex-sm-row justify-content-end" id="myTab" role="tablist">
                        <li class="nav-item  flex-fill " role="presentation">
                            <button class="nav-link active w-100" id="home-tab" data-bs-toggle="tab" data-bs-target="#Courses2" type="button" role="tab" aria-selected="true">Courses</button>
                        </li>
                        <li class="nav-item flex-fill " role="presentation">
                            <button class="nav-link w-100" id="profile-tab" data-bs-toggle="tab" data-bs-target="#Program2" type="button" role="tab" aria-selected="false">Program Lecturer</button>
                        </li>
                        <li class="nav-item flex-fill " role="presentation">
                            <button class="nav-link w-100" id="contact-tab" data-bs-toggle="tab" data-bs-target="#Detail2" type="button" role="tab" aria-selected="false">Detail</button>
                        </li>
                        <li class="nav-item flex-fill " role="presentation">
                            <button class="nav-link w-100" id="contact-tab" data-bs-toggle="tab" data-bs-target="#Contact2" type="button" role="tab" aria-selected="false">Contact us</button>
                        </li>
                    </ul>
                    <div class="tab-content py-5" id="myTabContent">
                        <div class="tab-pane  fade show active" id="Courses2" role="tabpanel">
                            Name of Faculty 2
                        </div>
                        <div class="tab-pane  fade" id="Program2" role="tabpanel">

                        </div>
                        <div class="tab-pane  fade" id="Detail2" role="tabpanel">

                        </div>
                        <div class="tab-pane  fade" id="Contact2" role="tabpanel">
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade py-3" id="faculty3" role="tabpanel" aria-labelledby="faculty3-tab">

                </div>
                <div class="tab-pane fade py-3" id="faculty3" role="tabpanel" aria-labelledby="faculty3-tab">

                </div>
            </div>
        </div>
    </div>

</div>