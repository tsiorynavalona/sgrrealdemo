

<div class="container copyright to_hide">
    <span class="col-xs-4">  © 2019 – SGR Real Estate Agency Ltd</span>
    <span class="col-xs-4" style="margin-top:-20px;">Follow us on: 
    	<a href="https://www.facebook.com/sgr.sgrreal.7">
        	<img style="width:35px;" src="<?php echo base_url('assets/images/facebook.png') ?>" />
         </a>&nbsp;
        <img style="width:100px;" src="<?php echo base_url('assets/images/youtube.png') ?>" />
    
    </span>
    <span class="col-xs-3" style="float:right;margin-right: 15px;"><?php echo $design; ?> <a href='http://www.wnv-solutions.com'>WNV Web Solutions</a></span>
</div>

<script>
    function myMap() {
        var myCenter = new google.maps.LatLng(41.878114, -87.629798);
        var mapProp = {center: myCenter, zoom: 12, scrollwheel: false, draggable: false, mapTypeId: google.maps.MapTypeId.ROADMAP};
        var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
        var marker = new google.maps.Marker({position: myCenter});
        marker.setMap(map);
    }
</script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery-1.11.1.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/caroussel.js'); ?>"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAyj_uxDMf9cUHVAkNMBX7BHrTmt279iEw&callback=myMap"></script>
<!-- <script async defer -->
<!-- src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=initMap"> -->
<!-- </script> -->

</body>
</html>