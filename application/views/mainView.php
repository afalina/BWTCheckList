<!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3303.7567191770104!2d-118.34340506644727!3d34.10137225437417!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2bf20fc7f1f3d%3A0xaebc7fb4fe5179a4!2zNzA2MCBIb2xseXdvb2QgQmx2ZCwgTG9zIEFuZ2VsZXMsIENBIDkwMDI4LCDQodCo0JA!5e0!3m2!1sru!2sua!4v1470124428505" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>-->
<style>
    #map {
        height: 450px;
        width: 100%;
    }
</style>
<div id="map">hello</div>

<script>

    var lat, lng;
    function initMap() {
        GetLocation('7060 Hollywood Blvd, Los Angeles, CA');
        alert(lat);
        var myLatLng = {lat: lat, lng: lng};

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 16,
            center: myLatLng
        });

        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            title: 'Hello World!'
        });
    }

    function GetLocation(string_address) {
        var geocoder = new google.maps.Geocoder();
        var address = string_address;
        geocoder.geocode({ 'address': address }, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                lat = results[0].geometry.location.lat();
                lng = results[0].geometry.location.lng();

            } else {
                alert("Request failed.")
            }
        });
    }

</script>


<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBIDMK3x9MhVuCY3Ud47MlOE6NvE4VJ0hA&signed_in=true&callback=initMap">
</script>



<h1>To participate in the conference, please fill out the form</h1>
<h3><a href="/list">All members (<?=$data?>)</a></h3>

<div class="form-container" style="width: 45%">
<form id="info" action="" method="post" enctype="multipart/form-data" data-toggle="validator" role="form">
<div class="mainInfo" id="mainInfo" name="mainInfo">
    <div class="form-group">
        <div class="form-group">
            <label class="control-label">Firstname*</label>
            <input name="firstname" id="firstname" class="form-control" required>
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group">
            <label class="control-label">Lastname*</label>
            <input name="lastname" id="lastname" class="form-control" required>
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
            <input name="report_subject" id="report_subject" class="form-control" required>
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group">
            <label class="control-label">Phone Number*</label>
            <input type="text" class="form-control bfh-phone" pattern="\+1 \(\d{3}\) \d{3}-\d{4}" name="phone" id="phone" data-format="+1 (ddd) ddd-dddd" required>
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group">
            <label class="control-label">Email*</label>
            <input name="email" id="email" class="form-control" data-error="That email address is invalid" type="email" required>
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group">
            <button class="btn btn-primary" onclick="display_other_form()" type="button" name="next">Next</button>
        </div>
    </div>
</div>

<div class="moreInfo" name="moreInfo" id="moreInfo" style="display: none;">
<div class="form-group">
    <div class="form-group">
        <label>Company</label>
        <input name="company" id="company" class="form-control">
    </div>
    <div class="form-group">
        <label>Position</label>
        <input name="position" id="position" class="form-control">
    </div>
    <div class="form-group">
        <label>About Me</label>
        <textarea name="about_me" id="about_me" class="form-control" type="text-area">

        </textarea>
    </div>
    <div class="form-group">
        <label>Photo</label>
        <input name="photo" id="photo" class="form-control" type="file">
    </div>
    <button type="button" class="btn btn-primary" onclick="display_share()" id="submit" name="submit">Next</button>
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
    function display_other_form() {
        if (document.getElementsByName('firstname')[0].value != '' &
            document.getElementsByName('lastname')[0].value != '' &
            document.getElementsByName('report_subject')[0].value != '' &
            document.getElementsByName('email')[0].value != '') {
            document.getElementById('moreInfo').style.display = "";
            document.getElementById('mainInfo').style.display = "none";
        }
    }

    function display_share() {
        document.getElementById('share').style.display = "";
        document.getElementById('moreInfo').style.display = "none";
    }
</script>