<style>
img.event-gallery {
  padding:2px;
  border:2px solid #E5E4E4;
}
.logo{
  text-align: center;
  top:0;
  text-align: center;
  background: #FFF;
  width:49%;
  margin: 0 auto;
  margin-bottom: 10%;
}
.logo:after {
content: " ";
    display:block;
    position: relative;
    top:0px;left:0px;
    width:100%;
    height:26px;
    background: linear-gradient(#FFF 0%, transparent 0%), linear-gradient(135deg, #FFF 33.33%, transparent 33.33%) 0 0%, 0 0%;
    background: -webkit-linear-gradient(#FFF 0%, transparent 0%), -webkit-linear-gradient(135deg, #272220 33.33%, transparent 33.33%) 0 0%,  0 0%;
    background: -o-linear-gradient(#FFF 0%, transparent 0%), -o-linear-gradient(135deg, #272220 33.33%, transparent 33.33%) 0 0%, 0 0%;
    background: -moz-linear-gradient(#FFF 0%, transparent 0%), -moz-linear-gradient(135deg, #272220 33.33%, transparent 33.33%) 0 0%, 0 0%;
    background-repeat: repeat-x;
    background-size: 0px 100%, 9px 27px, 9px 27px;
    }

.logo a {
  color:#333;
  font-weight: bold;
}
.logo a div{
  color:#258FFF
}
</style>

<?php ///dump($event_sposnsors); ?>
<!-- begin:navbar -->
  
  <!-- end:navbar -->

  <!-- begin:sidenav -->
  <nav class="navbar navbar-inverse navbar-default navbar-fixed-top sidenav">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="logo">
    <?php echo anchor('home', '<div>99</div>fest',array('class' => 'logxxo')); ?>
    </div>
    <!-- Sidenav Menu -->
    <ul class="nav navbar-nav">
      <li class="active"><a href="#header">INTRO</a></li>
      <li><a href="#registration">REGISTRATION</a></li>
      <li><a href="#about-event"></i>ABOUT EVENT</a></li>
      <li><a href="#faq">FAQ's</a></li>
      <li><a href="#tnc">T&C</a></li>
      <li><a href="#venue">VENUE</a></li>
      <li><a href="#partners">PARTNERS</a></li>
    </ul>
  </nav>
  <!-- end:sidenav -->

  <!-- begin:content-wrapper -->
  <section class="wrapper">

    <!-- begin:header -->
    <div id="header">
      <div class="container">
        <div class="row" style="float:right">
          <div class="col-md-7">
            <div class="header-content">
              <h1><?php echo $event_details->name; ?></h1>
              <h3 style="text-align:center"><?php echo date('M d', strtotime($event_details->event_start_date)); ?>, <?php echo date('h:i A', strtotime($event_details->event_start_time)); ?> onwards</h3>
              <h3 style="text-align:center"><?php echo $event_details->venue; ?>, <?php echo $event_details->cityname; ?></h3>
            </div>
          </div>

          <div class="col-md-3">
            <img src="<?php echo uploads_url().'events/thumbs/'.$event_details->thumb; ?>" data-src="" alt="<?php echo $event_details->name; ?>" width="220" height="130">
          </div>


        </div>
      </div>

      <div class="container full-cont">
        <div class="row event-opts">
          
            <div class="col-md-4" style="text-align:right">
              <a href="#" class="btn btn-fest-native">BUY TICKETS</a>
            </div>

            <div class="col-md-3">
              Tickets at INR 
              <?php foreach ($event_tickets as $key => $value) {
                if($key) {
                  echo '/'.str_replace('.00','',$value->rate);
                }else{
                  echo str_replace('.00','',$value->rate);
                }
                 
              }
              ?>
            </div>

            <div class="col-md-4">
            <?php if($event_details->facebook != '') { ?>
              <a href="https://facebook.com/<?= $event_details->facebook; ?>"><i class="fa fa-facebook-square fa-2x"></i></a>
            <?php } ?>
            <?php if($event_details->twitter != '') { ?>
              <a href="https://twitter.com/<?= $event_details->twitter; ?>"><i class="fa fa-twitter-square fa-2x"></i></a>
            <?php } ?>
            <?php if($event_details->instagram != '') { ?>  
              <a href="https://instagram.com/<?= $event_details->instagram; ?>"><i class="fa fa-instagram fa-2x"></i></a>
            <?php } ?>
            </div>

         
        </div>
      </div>



    </div>

    <div class="container full-gall-container">
        <div class="row event-opts">
            <?php foreach($event_images as $img): ?>
            <div class="col-md-3" style="text-align:right">
              <?php $gal_img_path = $img->image_path; ?>
              <img src="<?php echo uploads_url().'events/gallery/'.$gal_img_path; ?>" class="event-gallery">
            </div>
            <?php endforeach; ?>
        </div>
      </div>
    <!-- end:header -->

    <div class="event-main-wrapper">
      <!-- begin:about -->
      <div id="registration" class="event-section">
        <div class="container">
          <div class="event-section-wrapper">
            
            <div class="row">
              <div class="col-md-12">
                <div class="page-title">
                  <h2>Registration <small>EVENT REGISTRATION.</small></h2>
                </div>
              </div>
            </div>

            <div class="row" style="float:none; margin:auto">
              <style>
                    .ticket-wrapper {
                      background: #E68946;
                      text-align: center;
                      color: #FFF;
                      font-weight: bold;
                    }
                    .ticket{
                      padding:2%;
                    }
                    .ticket-qty {
                      background: #1B212F;
                      width: 100%;
                      padding:3%;
                    }
                    .ticketpay{
                      padding-left: 5%;
                      font-size: 0.65em;
                    }
                    .btn-buy-round{
                      -moz-border-radius:10px;
                      -webkit-border-radius:10px;
                      border-radius:10px;
                      width:48%;
                      background: #fff;
                      color:#1B212F;
                    }
                    .btn-fest-native{
                      background: #E95F00;
                      color:#FFF;
                    }
                </style>
                <?php $attributes = array('id' => 'buy-ticket-form'); ?>
                <?php echo form_open('/book-tickets', $attributes); ?>
                <?php foreach($event_tickets as $k => $ticket): ?>
                  <div class="col-md-4">

                      <div class="ticket-wrapper">
                        <div class="ticket">
                          <h4><?php echo $ticket->name; ?></h4>
                          <p>Early Bird</p>
                          <div class="ticket-options"><?php echo $ticket->rate; ?></div>
      
                        </div>

                        <div class="ticket-qty">
                          
                          <select class="btn btn-buy-round book_ticket" name="qty[]">
                              <option value="0">SELECT</option>
                              <?php for($i = 1; $i <= TICKETS_PER_USER; $i++){ ?>
                                <option value="<?php echo $i; ?>_<?php echo $ticket->rate; ?>_<?php echo $ticket->id; ?>"><?php echo $i; ?></option>
                              <?php } ?>
                          </select>
                        </div>

                        <script>
                        
                        </script>
                      </div>
                  </div>
                <?php endforeach; ?>
               
                  <div class="col-md-12 ticketpay" style="margin-top:1%;">
                    *Pay 20 Percent amount and book your tickets and pay balance 80percent on or before June 10, 2016
                  </div>
                
                </div>
                <div class="row" style="margin-top:2%;">
                   <div class="col-lg-6 col-lg-offset-3 text-center ticket-wrapper">
                     <h5>Total Payble Amount</h5>
                        <div class="total-amount-box"></div> 
                   </div>
                </div>

                <?php if($login) { ?>
                <div class="row" style="margin-top:2%;">
                  <div class="col-lg-8">
                    <input type="checkbox" id="agreetnc" name="tnc_agree" value="1">I have read and agreed to the terms and conditions for this event.
                  </div>
                  <div class="col-lg-4">
                    <?php echo form_submit('submit_quick_search', 'BUY TICKETS', 'id="buy-ticket" disabled=true class="btn btn-fest-native"'); ?>
                  </div>
                </div>
                <?php }else{ ?>
                 <div class="row" style="margin-top:2%;">
                    You Must <?php echo anchor('login', 'Login'); ?> to book tickets.
                 </div>
                 <?php } ?>


                <?php echo form_close(); ?>

              </div>
          

          </div>
        </div>
      <!-- end:about -->

      <!-- begin:skill -->
      <div id="about-event" class="event-section">
        <div class="container">

          <div class="event-section-wrapper">
            <div class="row">
              <div class="col-md-10">
                <div class="page-title">
                  <h2>About the event</h2>
                </div>
                <p>
                  <?php echo $event_details->about; ?>
                </p>
              </div>
            </div>
          <!-- break -->
          </div><!--/wrapper-->

        </div>
      </div>
      <!-- break -->

      <!-- begin:work -->
      <div id="faq" class="event-section">
        <div class="container">
          <div class="event-section-wrapper">
            <div class="row">
              <div class="col-md-12">
                <div class="page-title">
                  <h2>FAQ's</h2>
                </div>
              </div>
            </div>
            <!-- break -->

            <div class="row">
              <div class="col-md-12">
                <?php echo $event_details->faq; ?>
              </div>  
            </div>
          </div>
        </div>
      </div>
      <!-- end:work -->

      <!-- begin:contact -->
      <div id="tnc" class="event-section">
        <div class="container">
          <div class="event-section-wrapper">
            <div class="row">
              <div class="col-md-10">
                <div class="page-title">
                  <h2>TERMS AND CONDITIONS</h2>
                </div>
                 <?php echo $event_details->tnc; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end:contact -->

      <!-- begin:diary -->
      <div id="venue" class="event-section">
        <div class="container">
          <div class="event-section-wrapper">
            <div class="row">
              <div class="col-md-10">
                <div class="page-title">
                 <h2>VENUE</h2>
                </div>
              </div>
              <div class="col-md-12 col-sm-12">
                <div class="container-map">
                  <?php echo $map['js']; ?>
                  <?php echo $map['html']; ?>
                </div>
              </div>
            </div>
            <!-- break -->
          </div>
        </div>
      </div>
      <!-- end:diary -->


      <!-- begin:Partners -->
      <div id="partners" class="event-section">
        <div class="container">
            <div class="event-section-wrapper">
              <div class="row">
                <div class="col-md-10">

                  <div class="page-title">
                    <h2>SPONSORS</h2>
                  </div>

                  <?php foreach($event_sposnsors as $k => $sponsor): ?>
                    <div class="col-md-4" style="margin-top:1%;">
                      <img src="<?php echo uploads_url().'events/sponsors/'.$sponsor->image; ?>" alt="<?php echo $sponsor->name; ?>" title="<?php echo $sponsor->name; ?>" >
                    </div>
                  <?php endforeach; ?>

                </div>
              </div>
              <!-- break -->
            </div>
        </div>
      </div>
    </div>
    <!-- end:diary -->

    <!-- begin:footer -->
    <!--
    <div id="footer">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="footer-content">
              <div class="row">
                <div class="col-md-5 col-sm-4 col-xs-12">
                  <div class="footer-widget">
                    <h2 class="footer-logo"><i class="fa fa-diamond"></i> diana.</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat.</p>
                  </div>
                </div>
                

                <div class="col-md-3 col-sm-4 col-xs-12">
                  <div class="footer-widget">
                    <h3>Usefull Links</h3>
                    <ul>
                      <li><a href="">About Us</a></li>
                      <li><a href="">Contact Us</a></li>
                      <li><a href="">Privacy Policy</a></li>
                      <li><a href="">Lorem dolor sit</a></li>
                      <li><a href="">Dolore magna aliqua</a></li>
                    </ul>
                  </div>
                </div>
               

                <div class="col-md-4 col-sm-4 col-xs-12">
                  <div class="footer-widget">
                    <h3>Subscribe our newsletter</h3>
                    <p>Subscribe our newsletter, and get news update directly to your inbox.</p>
                    <form role="form" class="form-inline">
                      <div class="input-group">
                        <input type="text" class="form-control" placeholder="Enter your mail">
                        <span class="input-group-btn">
                          <button class="btn btn-diana" type="submit"><i class="fa fa-paper-plane"></i></button>
                        </span>
                      </div>
                    </form>
                  </div>
                </div>
                
              </div>
             
            </div>
          </div>
        </div>
     

        <div class="row">
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="copy-left">
              <p>Copyright &copy; 2015.</p>
              <a href="#page-home" class="btn btn-totop btn-totop-hide"><i class="fa fa-angle-up"></i></a>
            </div>
          </div>
         

          <div class="col-md-6 col-sm-6 col-xs-12">
            <ul class="social-links">
              <li><a href=""><i class="fa fa-twitter"></i></a></li>
              <li><a href=""><i class="fa fa-facebook"></i></a></li>
              <li><a href=""><i class="fa fa-instagram"></i></a></li>
              <li><a href=""><i class="fa fa-google-plus"></i></a></li>
              <li><a href=""><i class="fa fa-dribbble"></i></a></li>
              <li><a href=""><i class="fa fa-linkedin"></i></a></li>
              <li><a href=""><i class="fa fa-github"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
   end:footer 
   -->

  </section>
  <!-- end:content-wrapper -->

  <input type="text" id="poster_path" type="hidden" value="<?php echo uploads_url().'events/posters/'.$event_details->poster; ?>" />