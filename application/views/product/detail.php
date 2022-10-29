<?php $this->load->view('layouts/header'); ?>
<div id="container">
    <div class="container">
      <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-sm-9">
          <div itemscope itemtype="http://schema.org/Product">
            <h1 class="title" itemprop="name"><?php echo $product->title; ?></h1>
            <div class="row product-info">
              <div class="col-sm-6">
                <div class="image">
                  <img class="img-responsive" itemprop="image" id="zoom_01" src="/uploads/<?php echo $product->product_img; ?>" width="350" height="350"  alt="<?php echo $product->title; ?>" /> </div>
                <div class="image-additional" id="gallery_01">
                  <?php $galleries = $this->gallery->get_gallery_by($product->id); ?>
                  <?php if ($galleries): ?>
                    <?php foreach ($galleries as $gallery): ?>
                      <a class="thumbnail" href="#">
                        <img src="/uploads/<?php echo $gallery->gallery_img; ?>"
                        width="66" height="66" alt="<?php echo $product->title; ?>">
                      </a>
                    <?php endforeach ?>
                  <?php else: ?>
                    <div class="alert alert-danger">No record found!</div>
                  <?php endif ?>
                </div>
              </div>
              <div class="col-sm-6">
                <ul class="list-unstyled description">
                  <li><b>Brand:</b><?php echo $brand_array[$product->brand_id]; ?></li>
                  <li><b>Product Code:</b><?php echo $product->code; ?></li>
                  <li><b>Product Code:</b><?php echo $product->code; ?></li>
                  <li><b>Product Conditions:</b><?php echo $product->product_condition; ?></li>
                  <li><b>Total Views:</b><?php echo $product->views; ?></li>
                </ul>
                <ul class="price-box">
                  <li class="price" itemprop="offers" itemscope itemtype="http://schema.org/Offer"> 
                    <span itemprop="price">Rs.<?php echo number_format($product->price); ?>
                      <span itemprop="availability" content="In Stock"></span></span></li>
                </ul>
                <hr>
                <!-- AddThis Button BEGIN -->
                <div class="addthis_toolbox addthis_default_style"> <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a> <a class="addthis_button_tweet"></a> <a class="addthis_button_google_plusone" g:plusone:size="medium"></a> <a class="addthis_button_pinterest_pinit" pi:pinit:layout="horizontal" pi:pinit:url="http://www.addthis.com/features/pinterest" pi:pinit:media="http://www.addthis.com/cms-content/images/features/pinterest-lg.png"></a> <a class="addthis_counter addthis_pill_style"></a> </div>
                <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-514863386b357649"></script>
                <!-- AddThis Button END -->
              </div>
            </div>
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab-description" data-toggle="tab">Description</a></li>
              <li><a href="#tab-specification" data-toggle="tab">Specification</a></li>
              <li><a href="#tab-review" data-toggle="tab">Reviews (2)</a></li>
            </ul>
            <div class="tab-content">
              <div itemprop="description" id="tab-description" class="tab-pane active">
                <div>
                  <p><?php echo $product->description; ?></p>
                </div>
              </div>
              <div id="tab-specification" class="tab-pane">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <td width="150"><strong>Processor Type</strong></td>
                      <td><strong><?php echo $product->processor_type; ?></strong></td>
                    </tr>
<tr>
                      <td width="150"><strong>Processor Speed</strong></td>
                      <td><strong><?php echo $product->processor_speed; ?></strong></td>
                    </tr>
                    <tr>
                      <td width="150"><strong>Hard Drive Size</strong></td>
                      <td><strong><?php echo $product->hard_drive_size; ?></strong></td>
                    </tr>
                    <tr>
                      <td width="150"><strong>Installed Ram</strong></td>
                      <td><strong><?php echo $product->installed_ram; ?></strong></td>
                    </tr>
                    <tr>
                      <td width="150"><strong>Screen Size</strong></td>
                      <td><strong><?php echo $product->screen_size; ?></strong></td>
                    </tr>
                    <tr>
                      <td width="150"><strong>Camera</strong></td>
                      <td><strong><?php echo $product->camera; ?></strong></td>
                    </tr>
                    <tr>
                      <td width="150"><strong>Color</strong></td>
                      <td><strong><?php echo $product->color; ?></strong></td>
                    </tr>
                    <tr>
                      <td width="150"><strong>OS System</strong></td>
                      <td><strong><?php echo $product->operating_system; ?></strong></td>
                    </tr>
                    <tr>
                      <td width="150"><strong>Bluetooth</strong></td>
                      <td><strong><?php echo $product->bluetooth; ?></strong></td>
                    </tr>
                    <tr>
                      <td width="150"><strong>Wifi</strong></td>
                      <td><strong><?php echo $product->wifi; ?></strong></td>
                    </tr>

                    <tr>
                      <td width="150"><strong>Lan</strong></td>
                      <td><strong><?php echo $product->lan; ?></strong></td>
                    </tr>
                    <tr>
                      <td width="150"><strong>Modem</strong></td>
                      <td><strong><?php echo $product->modem; ?></strong></td>
                    </tr>
                  </thead>
                  
                  </table>
              </div>
              <div id="tab-review" class="tab-pane">
                <form method="post" class="form-horizontal">
                  <div id="review">
                    <div>
                      <table class="table table-striped table-bordered">
                        <tbody>
                          <tr>
                            <td style="width: 50%;"><strong><span>harvey</span></strong></td>
                            <td class="text-right"><span>20/01/2016</span></td>
                          </tr>
                          <tr>
                            <td colspan="2"><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                              <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> </div></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="text-right"></div>
                  </div>
                  <h2>Write a review</h2>
                  <div class="form-group required">
                    <div class="col-sm-12">
                      <label for="input-name" class="control-label">Your Name</label>
                      <input type="text" class="form-control" id="input-name" value="" name="name">
                    </div>
                  </div>
                  <div class="form-group required">
                    <div class="col-sm-12">
                      <label for="input-review" class="control-label">Your Review</label>
                      <textarea class="form-control" id="input-review" rows="5" name="text"></textarea>
                      <div class="help-block"><span class="text-danger">Note:</span> HTML is not translated!</div>
                    </div>
                  </div>
                  <div class="buttons">
                    <div class="pull-right">
                      <button class="btn btn-primary" id="button-review" type="button">Continue</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <h3 class="subtitle">Related Products</h3>
            <div class="owl-carousel related_pro">
              <?php if ($related_products): ?>
                <?php foreach ($related_products as $related_product): ?>

              <div class="product-thumb">
                <div class="image"><a href="<?php echo '/product/' . $related_product->slug; ?>"><img src="/uploads/<?php echo $related_product->product_img; ?>" width="200" height="200" alt="<?php echo $related_product->title; ?>" class="img-responsive" /></a></div>
                <div class="caption">
                  <h4><a href="<?php echo '/product/' . $related_product->slug; ?>"><?php echo  $related_product->title; ?></a></h4>
                  <p class="price"> <span class="price-new">Rs. <?php echo number_format($related_product->price); ?></span></p>
                </div>
              </div>
            <?php endforeach ?>
            <?php else: ?>
                  <div class="alert alert-danger">No record found!</div>
                <?php endif ?>
            </div>
          </div>
        </div>
        <!--Middle Part End -->
        <!--Right Part Start -->
        <?php $this->load->view('layouts/sidebar'); ?>
        <!--Right Part End -->
      </div>
    </div>
  </div>
  <!--Footer Start-->
  <?php $this->load->view('layouts/footer'); ?>