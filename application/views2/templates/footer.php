<div class="container to_hide">
    <div class="gray-line">
    </div>
</div>
<div class="container my-container to_hide">
    <div class="footer row" id="footer">
        <div class="col-sm-12">
            <div>
                <h5><?php echo $contact_us; ?></h5>
            </div>
            <div class="row footer-bottom" >
                <div class="col-sm-6 col-md-6">
                    <div class="col-sm-6 col-md-4">
                        <img src = "<?php echo base_url('assets/images/rpc-logo.png') ?>" width="125" alt = "RPC-Real Estate"/>
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <p>
                            <b>RPC Estate Agency</b> <br>
                            Carreau-Laliane Road-Vacoas, Ile Maurice.<br>
                            Standard: (00230) 5294-9691 <br>
                            Service Commercial: (00230) 427-2696<br>
                            GSM: (00230) 5780-4852/ 5712-2316/ 5910-4479 <br>
                            Email: contact@rpc-ea.com
                            <br>
                            <br>
                            Retrouvez nous sur <a href="https://www.facebook.com/rpcestateagencyvacoas/"><img src="<?php echo base_url('assets/images/fb.png') ?>"/></a>
                        </p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="col-sm-6 col-md-4">
                        <img src = "<?php echo base_url('assets/images/le-marchand-logo.png') ?>" width="150" alt = "CABINET LEMARCHAND A&A"/>
                    </div>
                    <div class="col-sm-10 col-md-8">
                        <p>
                            <b>Cabinet Lemarchand A & A </b> <br>
                            Syndic de copropriété, Gestion locative et Transaction<br>
                            3, rue Larochelle 75014 Paris<br>
                            Standard : (0033) 01 75 77 47 50<br>
                            http://www.cabinet-lemarchand.fr<br>
                            contact@cabinet-lemarchand.fr
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container copyright to_hide">
    <span>  © 2018 – RPC Estate Agency Ltd</span>
    <span style="float:right;margin-right: 25px;"><?php echo $design; ?> <a href='http://www.wnv-solutions.com'>WNV Web Solutions</a></span>
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