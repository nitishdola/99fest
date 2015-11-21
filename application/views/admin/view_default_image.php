<!--  FOr Slug Texbox  -->
<script>
function copy_data(val){
    var a = document.getElementById(val.id).value;
    document.getElementById("slug").value=a.split(' ').join('-');
}    
</script>

        
        <!-- START X-NAVIGATION VERTICAL -->
        <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
            <!-- TOGGLE NAVIGATION -->
            <li class="xn-icon-button">
                <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>                    </li>
            <!-- END TOGGLE NAVIGATION -->
            
            <!-- SIGN OUT -->
            <li class="xn-icon-button pull-right">
                <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>                    </li> 
            <!-- END SIGN OUT -->
           

        </ul>
        <!-- END X-NAVIGATION VERTICAL -->                   
        
        <!-- START BREADCRUMB -->
        <ul class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Vendors</a></li>
            <li class="active"><a href="#">View all featured images</a></li>
        </ul>
        <!-- END BREADCRUMB -->
        
        <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">
        
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>View all default featured image</strong> </h3>
                            
                        </div>

                        <div>
                            <?php if($this->session->flashdata('error_message') != '') { ?>
                        
                            <div class="alert alert-danger fade in">

                                <a href="#" class="close" data-dismiss="alert">&times;</a>

                                <strong>Error!</strong> <?= $this->session->flashdata('error_message'); ?>

                            </div>

                            <?php } ?>

                            <?php if($this->session->flashdata('success_message') != '') { ?>
                            
                            <div class="alert alert-success fade in">

                                <a href="#" class="close" data-dismiss="alert">&times;</a>

                                <strong>Success !</strong> <?= $this->session->flashdata('success_message'); ?>

                            </div>

                            <?php } ?>
                        </div>
                      
                        
                        <div class="panel-body">  
                            <?php if(!empty($images)){ ?>                                                                      
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Type</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            <?php foreach($images as $k => $image): ?>
                                <tbody>
                                    <tr>
                                        <td><?= $k+1; ?></td>
                                        <td><?= ucfirst($image->type); ?></td>
                                        <td>

                                        <?= anchor(uploads_url()."default/".$image->path, img(array("src" =>uploads_url()."default/".$image->path,"border" => "0", "height" => "80" , "width" => "180" ,  "alt" => $image->type." default image")) , array('data-toggle' => 'lightbox')); ?>
                                        <td>
                                            <?php if($image->status) { ?>
                                            <?= anchor('disable-default-image/'.$image->id, 'Disable'); ?>
                                            <?php } else { ?>
                                            <?= anchor('enable-default-image/'.$image->id, 'Enable'); ?>
                                            <?php } ?>

                                        </td>
                                    </tr>
                                </tbody>
                            <?php endforeach; ?>
                            </table>
                            <?php }else{ ?>
                                <div class="alert alert-warning">
                                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                                    <strong>Oops !</strong> No default image is found !
                                </div>
                            <?php } ?>
                        </div>
                        
                    </div>
                  
                </div>
            </div>                    
        </div>

        <script>
            $(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox();
            });
        </script>