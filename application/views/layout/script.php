<!-- Messenger ปลั๊กอินแชท Code -->
<div id="fb-root"></div>

<!-- Your ปลั๊กอินแชท code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>
<script>
    $(document).ready(function() {
        let ipAd = $('#webStat').val();
        let BASE_URL = "<?= base_url() ?>"

        $.ajax({
            type: "POST",
            dataType: "JSON",
            url: BASE_URL + 'Helper/countervisiter',
            data: {
                ip: ipAd,
            },
        }).done(function(data) {
            console.log('good', data)
        }).fail(function(err) {
            console.log('bad', err)
        })
    })
</script>
<script>
    var chatbox = document.getElementById('fb-customer-chat');
    chatbox.setAttribute("page_id", "108275778503511");
    chatbox.setAttribute("attribution", "biz_inbox");
</script>

<!-- Your SDK code -->
<script>
    window.fbAsyncInit = function() {
        FB.init({
            xfbml: true,
            version: 'v15.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>


<script src="<?= base_url('vendor/twbs/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('vendor/slickjs/slick/slick.min.js') ?>"></script>
<script src="<?= base_url('vendor/summernote/summernote.min.js') ?>"></script>
<script src="<?= base_url('vendor/timeline/timeline.min.js') ?>"></script>
<script src="<?= base_url('issets/dist/main.js') ?>"></script>
<script src="<?= Base_url('vendor/viima/js/main.js') ?>"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
    
</script>