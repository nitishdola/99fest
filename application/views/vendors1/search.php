 <style>
 #empty_vendor_result,#vendor_loader {
  display: none;
 }
 /* highlight results */
.ui-autocomplete span.hl_results {
    background-color: #ffff66;
}
 
/* loading - the AJAX indicator */
.ui-autocomplete-loading {
    background: white url('../img/ui-anim_basic_16x16.gif') right center no-repeat;
}
 
/* scroll results */
.ui-autocomplete {
    max-height: 250px;
    overflow-y: auto;
    /* prevent horizontal scrollbar */
    overflow-x: hidden;
    /* add padding for vertical scrollbar */
    padding-right: 5px;
}
 
.ui-autocomplete li {
    font-size: 16px;
}
 
/* IE 6 doesn't support max-height
* we use height instead, but this forces the menu to always be this tall
*/
* html .ui-autocomplete {
    height: 250px;
}
}
 </style>
 <div class="col-md-12">
    <?php $form_attributes = array('class' => 'form-horizontal', 'id' => 'vendoraddform');  
        echo form_open_multipart("users/do_vendor_register", $form_attributes);
    ?>
    <div class="form-group">
      <label class="col-md-3 col-xs-12 control-label">City</label>
      <div class="col-md-2 col-xs-12">  

          <?php $cities[0] = 'Select city' ?>                         
          <?php echo form_dropdown('city_id', $cities, 0,'class="form-control" id="city_id"'); ?>
          
          <span class="help-block"></span>                                        
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-3 col-xs-12 control-label">Search Vendors</label>
      <div class="col-md-2 col-xs-12">  

          <?php $vendor_attr = array(
            'name'  => 'vendor_id',
            'id'    => 'vendor_id',
            'class' => 'form-control typeahead-devs',
            //'data-provide'  => 'typeahead',
            'autocomplete'  => 'off',
          ); ?>                         
          <?php echo form_input($vendor_attr); ?>
          
          <span class="help-block"></span>                                        
      </div>
    </div>
  
    <?php echo form_close();?>
</div>

<img src="<?php echo uploads_url(); ?>loader.gif" id="vendor_loader"/>


<div class="alert alert-warning" id="empty_vendor_result">

    <a href="#" class="close" data-dismiss="alert">&times;</a>

    <strong>Oops !</strong> No Vendors Found !

</div>


<div id="vendor_results">
   
</div>

<div class="alert alert-info" id="LoadingImageScroll" style="display:none;">
        Loading search results
</div>
<div class="alert alert-info" id="LoadingImageEmpty" style="display:none;">
        
</div>

<script>

var base_url = '<?php echo base_url(); ?>';
var upload_url = '<?php echo uploads_url(); ?>';

var page_num = 1;
var page_size = 3;
var alreadyloading = false;
var last_reached = false;
var sort_by = 'az';

$(document).ready(function() {

  /*
  //initialize typehead
  $('input.typeahead-devs').typeahead({
    source: function (query, process) {
        return $.getJSON(
            '<?php echo base_url(); ?>vendors/api_get_all_vendors_name',
            { query: query },
            function (data) {
                return process(data);
            });
    }
  });
 */

 $("#vendor_id").autocomplete({
        source: "<?php echo base_url(); ?>vendors/api_get_all_vendors_name",
        minLength: 2,
        select: function(event, ui) {
            var url = ui.item.label;
            if(url != '#') {
                location.href = '<?php echo base_url(); ?>vendors/view/' + url;
            }
        },
 
        html: true, // optional (jquery.ui.autocomplete.html.js required)
 
      // optional (if other layers overlap autocomplete list)
        open: function(event, ui) {
            $(".ui-autocomplete").css("z-index", 1000);
        }
    });

  //load ajax data of vendors
  load_vendor_data({        
    scroll_search : false
  });
});

$('#city_id').change(function() { 
  page_num = 1;
  load_vendor_data({            
      cancel_prev_request: true
  });
});

$(window).scroll(function() {
    
    if (($(window).scrollTop() + $(window).height()) >= ($('body').height() * 0.4)) {
        load_vendor_data({        
            scroll_search : true
        });
        
    }
});


function load_vendor_data(params) { 

  if(last_reached == false) {

    var check_scroll_search = params.scroll_search || false; 
    var cancel_prev_request = params.cancel_prev_request || false; 

    if(cancel_prev_request){
        alreadyloading = false;
        if(last_reached != false){
            $("#load_more_vendors").show();    
        }
        
        //last_reached = true;
        // clear the previous search result.
        $("#vendor_results").empty();
    }

    $('#empty_vendor_result').hide();
    //$('#vendor_results').empty();
    $('#vendor_loader').show();

    //make ajax call only if page is not loading
    if(alreadyloading == false){


      //page is loading
      alreadyloading = true;

      last_reached = false;


      //prepare the data
      data = '';
      city_id = $('#city_id').val(); 

      category_id = '';
      category_id += '<?php echo $category_id; ?>';

      data = data+"&page_num="+page_num+"&page_size="+page_size;

      if(check_scroll_search) {
          data = data + "&scroll=yes";
          $("#load_more_photographers").hide();   
      }else{
          data = data + "&scroll=no";
      }

      data += '&category_id='+category_id+'&city_id='+city_id;


      
      url_to_call = '';
      url_to_call += '<?php echo base_url(); ?>vendors/api_get_vendors';


      if(check_scroll_search) {
          $("#LoadingImageScroll").show();    
      }else{
          $("#LoadingImage").show();    
      }



      $.ajax({
        data : data,
        url  : url_to_call,
        dataType : "json",
        type : "get",
        error : function(resp) {
          $("#LoadingImageScroll").hide();
          $('#vendor_loader').hide();
          alert('Oops ! Something went wrong.');
        },
        success : function(resp) {
          $('#vendor_loader').hide();
          $("#LoadingImageScroll").hide();
          if(jQuery.isEmptyObject(resp)) {
            $('#empty_vendor_result').show();
          }else{
            render_ui(resp);
          }
          
        }
      }); //ajax

    } //already_loading
  }//last_reached false
  
}


function render_ui(resp) {
  html = '';

  var html_error = html + "No more results";
  
  if(resp.last_reached == true) {

      last_reached = true;
    //alert('Oops ! No more results available :(');
      $('#vendor_loader').hide();
      $("#LoadingImageEmpty").show();
      $("#LoadingImageEmpty").html(html_error);
      $("#load_more_vendors").hide();
      $("#LoadingImageScroll").hide();      
  }
  
  $.each(resp, function(indx, obj) {
    if(!isNaN(indx)) {
      html += '<div class="row">';
      html += '<div class="col-md-12">';
      html += '<div class="col-md-4">';
      html += '<img src="'+upload_url+'vendors/logos/'+obj.logo+'"  width="300" height="160"  />';
      html += '</div>';
      html += '<div class="col-md-7">';
      html += '<h2><a href="'+base_url+obj.slug+'">'+obj.name+'</a></h2>';
      
      html += '<p>'+obj.about+'</p>';
      html += '<p>'+obj.address+'</p>';
      html += '<p>'+obj.cityname+','+obj.statename+'</p>';
      html += '</div>';
      html += '</div>';
      html += '</div>';
    }
    
  });

  $('#vendor_results').append(html);

  //to load next page, increment the page number
  page_num++;
  alreadyloading = false;
}

</script>
                          