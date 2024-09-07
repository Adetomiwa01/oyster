<?php 
include("./lib/oyster_header.php");
?>
	
	
	
	<!--Start Sub Banner-->
   <div class="sub-banner">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="detail">
						<h1>contact us</h1>
						<span>We like to hear from you</span>
						<ul>
							<li><a href="./">Home</a></li>
							<li><a class="select">Contact Us</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="banner-img"></div>
   </div>
   
   <!--End Sub Banner-->
   
   
   
   <!--Start Content-->
	<div class="content">
	
		<div class="contact-page">
		
		<!--Start Get in Touch-->
				<div class="get-in-touch">
					<div class="container">
					<div class="row">
						
						<div class="col-md-6">
							
							<div class="get-touch-detail">
								<h3>Get in Touch</h3>
								<p>Have Questions? 
								<br/><br/>
								We’re Here to Make Your Stay Perfect!</p>
							</div>
							
							<div class="social-icons">
								<h5>Stay Social with Us</h5>
								<ul>
									<li><a href="https://facebook.com/oystershellhotel"><i class="icon-facebook-1"></i></a></li>
									<li><a href="https://x.com/oystershellh"><i class="icon-twitter-1"></i></a></li>
									<li><a href="#."><i class="icon-linkedin"></i></a></li>
									<li><a href="#"><i class="icon-youtube"></i></a></li>
									<li><a href="https://instagram.com/oystershellhotel"><i class="icon-instagram"></i></a></li>
								</ul>
							</div>
							
						</div>
						
						<div class="col-md-6">
							<div class="get-touch-form">
                            <p class="success_msg" id="success_msg" style="display:none">Thank You! We will contact you shortly.</p>
								<form name="contact_form" id="contact_form" method="post" onSubmit="return false">
                                <input name="name" id="name" type="text" onKeyPress="remove_contact_errors();" onblur="if(this.value == '') { this.value='Your Name'}" onfocus="if (this.value == 'Your Name') {this.value=''}" value="Your Name">
								<input class="last" name="email_address" id="email_address" onKeyPress="remove_contact_errors();" type="text" onblur="if(this.value == '') { this.value='E-mail Address'}" onfocus="if (this.value == 'E-mail Address') {this.value=''}" value="E-mail Address">
								<textarea name="msg" id="msg" cols="1" onKeyPress="remove_contact_errors();" rows="1" onblur="if(this.value == '') { this.value='Message'}" onfocus="if (this.value == 'Message') {this.value=''}" value="Message">Message</textarea>
								<input type="submit" name=" " value="send message" onClick="validateContact();">
                                </form>
							</div>
						</div>
						
					</div>
					</div>
					
					
				</div>
		<!--End Get in Touch-->
		
		
		<!--Start Map-->
			<div id='map'>
				<div id='find-us'><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7928.262738319027!2d3.592379662574879!3d6.505049855204164!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103bfb6359af0645%3A0xd71fe5035f8de29a!2sOyster%20Shell%20Hotel!5e0!3m2!1sen!2sae!4v1724207523612!5m2!1sen!2sae" width="100%" height="550" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
			</div>
		<!--End Map-->
					
		
		</div>
		
	</div>	
   <!--End Content-->
	
	
	
	
	
	
	
	
<?php 
include("./lib/oyster_footer.php");
?>


<script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyAOVYRIgupAurZup5y1PRh8Ismb1A3lLao&libraries=places&callback=initMap'></script> 
 
<script> 
    google.maps.event.addDomListener(window, 'load', init);
    var map;
    function init() {
        var mapOptions = {
            center: new google.maps.LatLng(6.505483, 3.595012),
            zoom: 19,
            zoomControl: true,
            zoomControlOptions: {
                style: google.maps.ZoomControlStyle.DEFAULT,
            },
            disableDoubleClickZoom: true,
            mapTypeControl: true,
            mapTypeControlOptions: {
                style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
            },
            scaleControl: true,
            scrollwheel: false,
            panControl: true,
            streetViewControl: true,
            draggable : true,
            overviewMapControl: true,
            overviewMapControlOptions: {
                opened: false,
            },
            mapTypeId: google.maps.MapTypeId.ROADMAP,
        }
        var mapElement = document.getElementById('find-us-off');
        var map = new google.maps.Map(mapElement, mapOptions);
        var locations = [
['Oyster Shell Hotel', 'Palm Crescent Estate, 35 Anu Crescent, Badore Rd, Aja, Lagos 101245, Lagos, Nigeria', '+2347077707117', 'info@oystershellhotels.com', 'www.oystershellhotels.com', 6.505483, 3.595012, 'https://oystershellhotels.com/wp-content/uploads/2021/02/NewLogo.png']
        ];
        for (i = 0; i < locations.length; i++) {
			if (locations[i][1] =='undefined'){ description ='';} else { description = locations[i][1];}
			if (locations[i][2] =='undefined'){ telephone ='';} else { telephone = locations[i][2];}
			if (locations[i][3] =='undefined'){ email ='';} else { email = locations[i][3];}
           if (locations[i][4] =='undefined'){ web ='';} else { web = locations[i][4];}
           if (locations[i][7] =='undefined'){ markericon ='';} else { markericon = locations[i][7];}
            marker = new google.maps.Marker({
                icon: markericon,
                position: new google.maps.LatLng(locations[i][5], locations[i][6]),
                map: map,
                title: locations[i][0],
                desc: description,
                tel: telephone,
                email: email,
                web: web
            });
link = '';            bindInfoWindow(marker, map, locations[i][0], description, telephone, email, web, link);
     }
 function bindInfoWindow(marker, map, title, desc, telephone, email, web, link) {
      var infoWindowVisible = (function () {
              var currentlyVisible = false;
              return function (visible) {
                  if (visible !== undefined) {
                      currentlyVisible = visible;
                  }
                  return currentlyVisible;
               };
           }());
           iw = new google.maps.InfoWindow();
           google.maps.event.addListener(marker, 'click', function() {
               if (infoWindowVisible()) {
                   iw.close();
                   infoWindowVisible(false);
               } else {
                   var html= "<div style='color:#000;background-color:#fff;padding:5px;width:150px;'><h4>"+title+"</h4><p>"+desc+"<p><p>"+telephone+"<p><a href='mailto:"+email+"' >"+email+"<a></div>";
                   iw = new google.maps.InfoWindow({content:html});
                   iw.open(map,marker);
                   infoWindowVisible(true);
               }
        });
        google.maps.event.addListener(iw, 'closeclick', function () {
            infoWindowVisible(false);
        });
 }
}
</script>



</body>
</html>