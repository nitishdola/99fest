<style>
.checkbox {
padding-left: 20px; }
.checkbox label {
display: inline-block;
vertical-align: middle;
position: relative;
padding-left: 5px; }
.checkbox label::before {
content: "";
display: inline-block;
position: absolute;
width: 17px;
height: 17px;
left: 0;
margin-left: -20px;
border: 1px solid #cccccc;
border-radius: 3px;
background-color: #fff;
-webkit-transition: border 0.15s ease-in-out, color 0.15s ease-in-out;
-o-transition: border 0.15s ease-in-out, color 0.15s ease-in-out;
transition: border 0.15s ease-in-out, color 0.15s ease-in-out; }
.checkbox label::after {
display: inline-block;
position: absolute;
width: 16px;
height: 16px;
left: 0;
top: 0;
margin-left: -20px;
padding-left: 3px;
padding-top: 1px;
font-size: 11px;
color: #555555; }
.checkbox input[type="checkbox"] {
opacity: 0;
z-index: 1; }
.checkbox input[type="checkbox"]:focus + label::before {
outline: thin dotted;
outline: 5px auto -webkit-focus-ring-color;
outline-offset: -2px; }
.checkbox input[type="checkbox"]:checked + label::after {
font-family: 'FontAwesome';
content: "\f00c"; }
.checkbox input[type="checkbox"]:disabled + label {
opacity: 0.65; }
.checkbox input[type="checkbox"]:disabled + label::before {
background-color: #eeeeee;
cursor: not-allowed; }
.checkbox.checkbox-circle label::before {
border-radius: 50%; }
.checkbox.checkbox-inline {
margin-top: 0; }

.checkbox-primary input[type="checkbox"]:checked + label::before {
background-color: #428bca;
border-color: #428bca; }
.checkbox-primary input[type="checkbox"]:checked + label::after {
color: #fff; }

.checkbox-danger input[type="checkbox"]:checked + label::before {
background-color: #d9534f;
border-color: #d9534f; }
.checkbox-danger input[type="checkbox"]:checked + label::after {
color: #fff; }

.checkbox-info input[type="checkbox"]:checked + label::before {
background-color: #5bc0de;
border-color: #5bc0de; }
.checkbox-info input[type="checkbox"]:checked + label::after {
color: #fff; }

.checkbox-warning input[type="checkbox"]:checked + label::before {
background-color: #f0ad4e;
border-color: #f0ad4e; }
.checkbox-warning input[type="checkbox"]:checked + label::after {
color: #fff; }

.checkbox-success input[type="checkbox"]:checked + label::before {
background-color: #5cb85c;
border-color: #5cb85c; }
.checkbox-success input[type="checkbox"]:checked + label::after {
color: #fff; }

.radio {
padding-left: 20px; }
.radio label {
display: inline-block;
vertical-align: middle;
position: relative;
padding-left: 5px; }
.radio label::before {
content: "";
display: inline-block;
position: absolute;
width: 17px;
height: 17px;
left: 0;
margin-left: -20px;
border: 1px solid #cccccc;
border-radius: 50%;
background-color: #fff;
-webkit-transition: border 0.15s ease-in-out;
-o-transition: border 0.15s ease-in-out;
transition: border 0.15s ease-in-out; }
.radio label::after {
display: inline-block;
position: absolute;
content: " ";
width: 11px;
height: 11px;
left: 3px;
top: 3px;
margin-left: -20px;
border-radius: 50%;
background-color: #555555;
-webkit-transform: scale(0, 0);
-ms-transform: scale(0, 0);
-o-transform: scale(0, 0);
transform: scale(0, 0);
-webkit-transition: -webkit-transform 0.1s cubic-bezier(0.8, -0.33, 0.2, 1.33);
-moz-transition: -moz-transform 0.1s cubic-bezier(0.8, -0.33, 0.2, 1.33);
-o-transition: -o-transform 0.1s cubic-bezier(0.8, -0.33, 0.2, 1.33);
transition: transform 0.1s cubic-bezier(0.8, -0.33, 0.2, 1.33); }
.radio input[type="radio"] {
opacity: 0;
z-index: 1; }
.radio input[type="radio"]:focus + label::before {
outline: thin dotted;
outline: 5px auto -webkit-focus-ring-color;
outline-offset: -2px; }
.radio input[type="radio"]:checked + label::after {
-webkit-transform: scale(1, 1);
-ms-transform: scale(1, 1);
-o-transform: scale(1, 1);
transform: scale(1, 1); }
.radio input[type="radio"]:disabled + label {
opacity: 0.65; }
.radio input[type="radio"]:disabled + label::before {
cursor: not-allowed; }
.radio.radio-inline {
margin-top: 0; }

.radio-primary input[type="radio"] + label::after {
background-color: #428bca; }
.radio-primary input[type="radio"]:checked + label::before {
border-color: #428bca; }
.radio-primary input[type="radio"]:checked + label::after {
background-color: #428bca; }

.radio-danger input[type="radio"] + label::after {
background-color: #d9534f; }
.radio-danger input[type="radio"]:checked + label::before {
border-color: #d9534f; }
.radio-danger input[type="radio"]:checked + label::after {
background-color: #d9534f; }

.radio-info input[type="radio"] + label::after {
background-color: #5bc0de; }
.radio-info input[type="radio"]:checked + label::before {
border-color: #5bc0de; }
.radio-info input[type="radio"]:checked + label::after {
background-color: #5bc0de; }

.radio-warning input[type="radio"] + label::after {
background-color: #f0ad4e; }
.radio-warning input[type="radio"]:checked + label::before {
border-color: #f0ad4e; }
.radio-warning input[type="radio"]:checked + label::after {
background-color: #f0ad4e; }

.radio-success input[type="radio"] + label::after {
background-color: #5cb85c; }
.radio-success input[type="radio"]:checked + label::before {
border-color: #5cb85c; }
.radio-success input[type="radio"]:checked + label::after {
background-color: #5cb85c; }

a.navbar-brand{
color:#666 !important;
}
</style>

<style>
.event-wrap{
background: #fdfdfd;
border: 1px solid #efefef;
padding:2%;
}
.payment-wrap li {
border:1px solid #cdcdcd;
margin-top:2%;
list-style: none;
padding:3%;
-moz-border-radius:4px;
border-radius: 4px;
-webkit-border-radius:4px;
text-align: center;
}
.payment-wrap-bg{
background: #E95F00;

}
.payment-wrap-bg a{
color:#FFF !important;
}
.payment-wrap li a{
padding:3%;
color:#444;
font-weight: bold;
}
.navbar{
border-bottom:2px solid #E95F00;
}
.nav li a{
color:#777 !important;

}
.btn-fest-def{
background: #E95F00;
color:#FFF;
}
.radio-inline {
padding:2%;
}
.bank-wrapper{
  padding:2%; 
  margin-top:4%; 
  border:1px solid #DCDCDC;
  margin-left:4%;
}

</style>
<!-- Wrapper start -->
<div class="main" style="margin-top:10%">
  
<!-- Event list start -->
  <section class="first-module">
    <div class="container">

      <div class="row">

      <!--Left event data-->
        <div class="col-md-6">
          <div class="event-wrap events-ind clearfix">
          
            <div class="col-md-9">
              <h2><?php echo anchor($event_details[0]->slug, $event_details[0]->name); ?></h2>
              <h4><?php echo $event_details[0]->venue.' '.$event_details[0]->venue_address, $event_details[0]->cityname; ?></h4>
              <h4><?php echo date('M d', strtotime($event_details[0]->event_start_date)); ?>, <?php echo date('h:i A', strtotime($event_details[0]->event_start_time)); ?> onwards</h4>
            </div>

          </div>
          <hr>
          <div class="col-md-8">
              <h4>Total payment to be made to 99fest</h4>
              <div class="alert alert-info" style="text-align:center"><strong>Rs. <?php echo $total_booked_rate; ?></strong></div>
            </div>
        </div>
        <!--/Left event data-->

        <!--Right payment data-->
        <div class="col-md-6">
            <div class="col-md-12" style="padding:2%;">
              <button class="btn btn-success btn-sm" id="dcc">Debit Card/Credit Card</button>
              <button class="btn btn-default btn-sm" id="nb">Net Banking</button>
            </div>

            <div class="bank-wrapper col-md-12">
                <!--debit card for-->
              <div class="" id="dcc_form">
                <form class="form-horizontal">
                  
                  <fieldset>
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="textinput">ENTER CARD NUMBER</label>  
                      <div class="col-md-8">
                        <input id="textinput" name="textinput" placeholder="xxxx xxxx xxxx xxx" class="form-control input-md" type="text">
                        
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-4 control-label" for="textinput">EXPIRY DATE</label> 
                      <div class="col-md-4">
                        <select id="selectbasic" name="selectbasic" class="form-control">
                          <option value="1">MM</option>
                        </select>
                      </div>

                      <div class="col-md-4">
                        <select id="selectbasic" name="selectbasic" class="form-control">
                          <option value="1">YY</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-4 control-label" for="textinput">CVV</label>  
                      <div class="col-md-3">
                        <input id="textinput" name="textinput" placeholder="XXX" class="form-control input-md" type="text">
                        
                      </div>
                    </div>

                    </fieldset>

                    <input type="submit" class="btn btn-block btn-fest-def" value="PAY">
                  </form>
                </div>
                <!--/debit card form-->

                <!--Internet Banking form-->
                <div class="" id="nb_form" style="display:none">
                  <form class="form-horizontal">
                    <fieldset>
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="textinput">SELECT FROM POPULAR BANKS</label>  
                      <div class="col-md-8">
                        <div class="radio radio-success radio-inline">
                            <input type="radio" id="inlineRadio1" value="option1" name="radioInline" checked>
                            <label for="inlineRadio1">
                              <img src="assets/img/bank_logos/sbi.jpg" alt="SBI" />
                            </label>
                        </div>
                        <div class="radio radio-success radio-inline">
                            <input type="radio" id="inlineRadio2" value="option2" name="radioInline">
                            <label for="inlineRadio2"> <img src="assets/img/bank_logos/axis.jpg" alt="Axis" /> </label>
                        </div>

                        <div class="radio radio-success radio-inline">
                            <input type="radio" id="inlineRadio1" value="option1" name="radioInline" checked>
                            <label for="inlineRadio1">
                              <img src="assets/img/bank_logos/city.jpg" alt="City" />
                            </label>
                        </div>
                        <div class="radio radio-success radio-inline">
                            <input type="radio" id="inlineRadio2" value="option2" name="radioInline">
                            <label for="inlineRadio2"> <img src="assets/img/bank_logos/hdfc.jpg" alt="HDFC" /> </label>
                        </div>

                        <div class="radio radio-success radio-inline">
                            <input type="radio" id="inlineRadio1" value="option1" name="radioInline" checked>
                            <label for="inlineRadio1">
                              <img src="assets/img/bank_logos/kotak.jpg" alt="Kotak" />
                            </label>
                        </div>
                        <div class="radio radio-success radio-inline">
                            <input type="radio" id="inlineRadio2" value="option2" name="radioInline">
                            <label for="inlineRadio2"> <img src="assets/img/bank_logos/pnb.jpg" alt="PNB" /> </label>
                        </div>

                         <div class="radio radio-success radio-inline">
                            <input type="radio" id="inlineRadio2" value="option2" name="radioInline">
                            <label for="inlineRadio2"> <img src="assets/img/bank_logos/yesbank.jpg" alt="Yes Bank" /> </label>
                        </div>
                        
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-4 control-label" for="textinput">OR SELECT OTHER BANK</label> 
                      <div class="col-md-6">
                        <select id="selectbasic" name="selectbasic" class="form-control">
                          <option value="1">Select Bank</option>
                        </select>
                      </div>
                    </div>

                    <input type="submit" class="btn btn-block btn-fest-def" value="PAY">

                    </fieldset>
                  </form>
                </div>
                <!--/Internet Banking form-->

              </div>

             
          </div>

            

        </div>
    </div>
    </section>
  </div>
 <script>
              $('#dcc').click(function(e) {
                $('#nb').removeClass('btn-success');
                $(this).addClass('btn-success');
                $(this).removeClass('btn-default');
                $('#nb_form').hide();
                $('#dcc_form').fadeIn();
              });

              $('#nb').click(function(e) {
                $('#dcc').removeClass('btn-success');
                $(this).addClass('btn-success');
                $(this).removeClass('btn-default');

                $('#dcc_form').hide();
                $('#nb_form').fadeIn();
              });
              </script>