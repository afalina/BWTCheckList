<style>
    #map {
        height: 450px;
        width: 100%;
    }
</style>
<div id="map"></div>

<script>

    function initMap() {
        var myLatLng = {lat: 34.1011679, lng: -118.3460136};

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 16,
            center: myLatLng
        });

        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            title: '7060 Hollywood Blvd, Los Angeles, CA'
        });
    }

</script>


<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBIDMK3x9MhVuCY3Ud47MlOE6NvE4VJ0hA&signed_in=true&callback=initMap">
</script>



<h1>To participate in the conference, please fill out the form</h1>
<h3 id="mentions"><a href="/list">All members (<?=$data?>)</a></h3>

<div class="form-container">
    <form id="info" action="" method="post" enctype="multipart/form-data" data-toggle="validator" role="form">
        <div class="mainInfo" id="mainInfo" name="mainInfo" style="display: inline-block">
            <div class="form-group">
                <div class="form-group">
                <label class="control-label">Firstname*</label>
                <input name="firstname" id="firstname" maxlength="255" class="form-control" required>
                <div class="help-block with-errors"></div>
            </div>
                <div class="form-group">
                <label class="control-label">Lastname*</label>
                <input name="lastname" id="lastname" maxlength="255" class="form-control" required>
                <div class="help-block with-errors"></div>
            </div>
                <div class="form-group">
                <label class="control-label">Birthday*</label>
                <div class="bfh-datepicker" data-format="y-m-d" data-min="1900-01-01" data-name="birthday" id="birthday"></div>
            </div>
                <div class="form-group">
                <label>Country*</label>
                <div class="country-select bfh-selectbox bfh-countries" data-required="true" data-name="country" id="country" data-country="US" data-flags="true"></div>
            </div>
                <div class="form-group">
                <label class="control-label">Report Subject*</label>
                <input name="report_subject" maxlength="255" id="report_subject" class="form-control" required>
                <div class="help-block with-errors"></div>
            </div>
                <div class="form-group">
                <label class="control-label">Phone Number*</label>
                <input type="text" class="form-control bfh-phone" pattern="\+1 \(\d{3}\) \d{3}-\d{4}" name="phone" id="phone" data-format="+1 (ddd) ddd-dddd" required>
                <div class="help-block with-errors"></div>
            </div>
                <div class="form-group">
                <label class="control-label">Email*</label>
                <input name="email" id="email" class="form-control" maxlength="255" data-error="That email address is invalid" type="email" required>
                <div class="help-block with-errors"></div>
            </div>
                <div class="form-group">
                    <button class="btn btn-primary" onclick="display_other_form()" type="button" name="next" style="width: 30%; margin-left: 70%">Next</button>
                </div>
            </div>
        </div>

        <div class="moreInfo" name="moreInfo" id="moreInfo" style="display: none;">
            <div class="form-group">
        <div class="form-group">
            <label>Company</label>
            <input name="company" maxlength="255" id="company" class="form-control">
        </div>
        <div class="form-group">
            <label>Position</label>
            <input name="position" maxlength="255" id="position" class="form-control">
        </div>
        <div class="form-group">
            <label>About Me</label>
            <textarea name="about_me" id="about_me" class="form-control" type="text-area">

            </textarea>
        </div>
        <div class="form-group">
            <label>Photo</label>
            <input name="photo" id="photo" accept="image/*" class="form-control" type="file">
        </div>
        <button type="button" class="btn btn-primary" onclick="display_share()" id="submit" name="submit" style="width: 50%; margin-left: 50%">Next</button>
    </div>
        </div>
    </form>
</div>
<div class="share" id="share" style="display:none;">
    <a href="https://www.facebook.com/sharer.php?u=main&t=Check out this Meetup with SoCal AngularJS!&src=sp" target="_blank"><img width="64" src="application/images/f.png"></a>
    <a href="https://twitter.com/share?text=Check out this Meetup with SoCal AngularJS!&url=/main" target="_parent"><img width="64" src="application/images/tt.png"></a>
    <a href="https://plus.google.com/share?url=/main" target="_blank"><img width="64" src="application/images/gp.png"></a>
</div>

<script>
    $('#submit').on('click', function(){
        var request = $.ajax({
            url: '',
            type: 'POST',
            processData: false,
            contentType: false,
            data:  new FormData(document.getElementById('info')),
            enctype: 'multipart/form-data'
        });

        request.done(function() {
            alert('Success!');
        }).fail(function() {
            alert('Try again');
        })
    });
</script>

<script>
    if (localStorage.length != 0) {
        $('form').deserialize(localStorage.getItem('info'));
        display_other_form();
    }
    function display_other_form() {
        if (document.getElementsByName('firstname')[0].value != '' &&
            document.getElementsByName('lastname')[0].value != '' &&
            document.getElementsByName('report_subject')[0].value != '' &&
            document.getElementsByName('email')[0].value != '') {
                $('#moreInfo').show();
                $('#mainInfo').hide();
                localStorage.setItem('info', $('form').serialize());
                $('#company, #position, #about_me').on('input', function(){
                    localStorage.setItem('info', $('form').serialize());
                });
        }
    }

    function display_share() {
        localStorage.clear();
        $('#share').show();
        $('#moreInfo').hide();
    }
</script>
