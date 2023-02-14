<style>
    @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Thai&display=swap');

    .special {
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }

    p,
    h5,
    h6,
    a {
        font-family: 'Noto Sans Thai', sans-serif !important;
    }

    .list-item {
        cursor: pointer;
        transition: 0.3s;
    }
</style>


<div class="header-cover">
    <div class="centered">
        <h1 class="m-0 p-0">Newsletter</h1>
    </div>
    <img class="header-img" src="https://www.mitihoon.com/wp-content/uploads/2017/11/bg-footer-mitihoon.jpg" alt="">
</div>



<div class="container p-0 ">


    <div class="row m-0 p-0">
        <div class="col-12 p-sm-5 p-2">
            <div class="row m-0 p-0">
                <div class="row m-0 p-0 my-2">
                    <div class="col-12 col-sm-3">
                        <small class="text-muted"><i class="fa-solid fa-filter"></i> ค้นหา</small>
                        <hr class="m-0 mb-2 p-0">
                        <!-- <div class="py-1">
                            <h6><i class="fas fa-square-rss"></i> ข่าวประกาศ (10)</h6>
                            <h6 class="text-muted"><i class="fas fa-square-rss"></i> ข่าวกิจกรรม (3)</h6>
                            <h6 class="text-muted"><i class="fas fa-square-rss"></i> ข่าวทั่วไป (17)</h6>
                        </div>
                        <hr> -->
                        <div class="accordion d-sm-block d-none m-0" id="accordionExample">
                        </div>
                    </div>

                    <div class="col-12 col-sm-9 mt-3 mt-sm-0">
                        <div class="row m-0 p-0" id="event_list">
                            <div class="col-12 text-sm-end text-start m-0 p-0 mb-3">
                                <a type="button"><i class="fa-solid fa-magnifying-glass"></i> Search</a>
                                |
                                <a type="button" onclick="searchproduct('all')"> Reset</a>
                                |
                                <small class="text-muted ">News(<span class="text-primary">10</span>)</small>
                            </div>
                        </div>

                        <div class="row m-0 p-0" id="news_list">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    var BASE_URL = "<?= base_url(); ?>"
    $(document).ready(function() {
        var news_list = ''
        $.ajax({
            type: "post",
            url: BASE_URL + "Newsletter/get_news",
            dataType: "json",
            success: function(resp) {
                for (let i = 0; i < resp.length; i++) {
                    news_list += `

                    <div class="col-12 col-sm-4 m-0 p-0 mb-1 newsletter_card ${resp[i].date}">
                        <div class="card m-1 h-100 my-auto border">
                            <div class=" m-1 p-1">
                                <h6 class="text-warp fw-bold">${resp[i].title}</h6>
                                <p class="text-muted m-0 p-0 mb-2">${resp[i].date}</p>
                                <a  href="https://info-aun-hpn.com/bos/uploads/newsletter/${resp[i].file}"><i class="fas fa-circle-down"></i> Download</a>
                            </div>
                        </div>
                    </div>`
                }
                $('#news_list').append(news_list)
            }
        })

        $.ajax({
            type: "post",
            url: BASE_URL + "Newsletter/get_news_bymonth",
            dataType: "json",
            success: function(resp) {
                for (let i = 0; i < resp.length; i++) {
                    var nav_list = ''
                    var id = resp[i].id
                    nav_list = `
                    <div class="accordion-item" >
                        <h2 class="accordion-header" id="${resp[i].id}">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#i${resp[i].id}" aria-expanded="false"  >
                            ${resp[i].n_create}
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
                    var news_manu = ''

                    let datelist = resp[i].month
                    for (mi = 0; mi < datelist.length; mi++) {
                        news_manu += `<li class="list-item">        
                                <a onclick="searchproduct('${datelist[mi].datelist}')">
                                ${datelist[mi].datelist}
                            </a>
                                </li>`
                    }
                    $("#t" + id).html(news_manu)
                }
            }
        })
    })

    function searchproduct(param) {

        $(".newsletter_card").attr("style", "display: none !important");
        if (param == 'all') {
            $(".newsletter_card").attr("style", "display: block !important");

        } else {
            $("." + param).attr("style", "display: block !important");

        }
    }
</script>