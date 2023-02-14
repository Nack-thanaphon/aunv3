<div class="header-cover">
    <div class="centered">
        <h1 class="m-0 p-0">Curriculums</h1>
    </div>
    <img class="header-img" src="https://www.mitihoon.com/wp-content/uploads/2017/11/bg-footer-mitihoon.jpg" alt="">
</div>

<div class="container">

    <div class="row my-3 m-0 p-0">
        <div class="col-12 p-sm-5 p-2">
            <div class="row m-0 p-0">
                <!-- <div class="col-12 col-sm-12 my-1 d-flex justify-content-between">
                    <a href="<?= site_url('/') ?>" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
                </div> -->
                <div class="col-12 col-sm-3">
                    <small class="text-muted"><i class="fa-solid fa-filter"></i> ค้นหา</small>
                    <hr class="m-0 mb-2 p-0">
                    <div class="py-1">
                        <h6><i class="fas fa-file"></i> Healthy(10)</h6>
                        <h6 class="text-muted"><i class="fas fa-file"></i> Documentation(3)</h6>
                        <h6 class="text-muted"><i class="fas fa-file"></i> SocualSociety(17)</h6>
                    </div>
                    <hr class="m-0 mb-2 p-0">
                    <!-- <div class="accordion d-sm-block d-none" id="accordionExample">
                    </div> -->
                </div>

                <div class="col-12 col-sm-9 mt-3 mt-sm-0">
                    <div class="row m-0 p-0" id="event_list">
                        <div class="col-12 text-sm-end text-start m-0 p-0 mb-3">
                            <a type="button" onclick="searchproduct('all')"><i class="fa-solid fa-magnifying-glass"></i> Search</a>
                            |
                            <small class="text-muted ">Document(<span class="text-primary">10</span>)</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script>
    var BASE_URL = "<?= base_url(); ?>"
    $(document).ready(function() {
        var event_list = ''
        $.ajax({
            type: "post",
            url: BASE_URL + "events/get_events",
            dataType: "json",
            success: function(resp) {
                for (let i = 0; i < resp.length; i++) {
                    event_list += `

                    <div class="col-12  m-0 p-0 mb-1 shadow-sm event_card ${resp[i].date}">
                        <div class="card h-100">
                            <div class="card-body ">
                                <small class="text-muted ">incoming</small>
                                <p class="m-0 p-0"><i class="fas fa-calendar text-muted"></i> ${resp[i].date}</p>
                                <h5 class="special mt-3">${resp[i].title}</h5>
                                <small class="special"><i class="fas fa-map-marker text-danger"></i> ${resp[i].address}</small> <br>
                                <hr class="mt-2 m-0  p-0">
                                <div class="btn-group mt-2 " role="group" aria-label="Basic example">
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"  class="btn btn-secondary"><i class="fas fa-circle-exclamation"></i></button>
                                    <a href="<?= site_url('events/singleEvent') ?>/${resp[i].id}" type="button" class="btn btn-danger ">ดูเพิ่มเติม</a>
                                </div>
                            </div>
                        </div>
                    </div>`
                }
                $('#event_list').append(event_list)
            }
        })
        $.ajax({
            type: "post",
            url: BASE_URL + "events/get_event_bymonth",
            dataType: "json",
            success: function(resp) {
                for (let i = 0; i < resp.length; i++) {
                    var nav_list = ''
                    var id = resp[i].id
                    nav_list = `
                    <div class="accordion-item" >
                        <h2 class="accordion-header" id="${resp[i].id}">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#i${resp[i].id}" aria-expanded="false"  >
                            ${resp[i].date}
                            </button>
                        </h2>
                        <div id="i${resp[i].id}" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <ul id="t${id}">

                                </ul>
                            </div>
                        </div>
                    </div> `

                    $('#accordionExample').append(nav_list)
                    var event_manu = ''

                    let datelist = resp[i].month
                    for (mi = 0; mi < datelist.length; mi++) {
                        event_manu += `<li class="list-item">        
                                <a onclick="searchproduct('${datelist[mi].datelist}')">
                                ${datelist[mi].datelist}
                            </a>
                                </li>`
                    }
                    $("#t" + id).html(event_manu)
                }
            }
        })
    })

    function searchproduct(param) {
        console.log(param)
        $(".event_card").attr("style", "display: none !important");
        if (param == 'all') {
            $(".event_card").attr("style", "display: block !important");
        } else {
            $("." + param).attr("style", "display: block !important");
        }
    }
</script>