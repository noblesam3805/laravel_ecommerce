@include('layout/d_h_layout')
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img class="zmdi-hc-spin" src="assets/images/loader.svg" width="48" height="48" alt="Aero"></div>
        <p>Please wait...</p>
    </div>
</div>

<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<!-- Main Search -->
<div id="search">
    <button id="close" type="button" class="close btn btn-primary btn-icon btn-icon-mini btn-round">x</button>
    <form>
      <input type="search" value="" placeholder="Search..." />
      <button type="submit" class="btn btn-primary">Search</button>
    </form>
</div>
@include('layout/a_side')
<!-- Main Content -->

<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Product</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/upload_product"><i class="zmdi zmdi-home"></i> Upload</a></li>
                    <li class="breadcrumb-item active">Post Product</li>
                </ul>
                <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
            </div>
        </div>
    </div>
<div class="container col-sm-3 col-lg-6">
@if (session()->has('success'))
    <h1 class="alert alert-success">{{session()->get('success')}}</h1>
@endif
        <form method="post" action="/upload" enctype="multipart/form-data">
            @csrf

            <label for="">Product Name:</label><br>
            <input type="text" placeholder="product name" class="form-control" name="p_name"><br>
            <label for="">Price:</label><br>
            <input type="text" placeholder="product price" class="form-control" name="p_price"><br>
            <label for="">Category:</label><br>
            <select id="" name="cat" class="form-control">
            <option value="">select</option>
              <option value="Beverages">Beverages</option>
              <option value="Breakfast Cereals">Breakfast Cereals</option>
              <option value="Condiments">Condiments</option>
              <option value="Commodities">Commodities</option>
              <option value="Confectioneries">Confectioneries</option>
              <option value="Groceries">Groceries</option>
              <option value="Water">Water</option>
              <option value="Wines & Spirits">Wines & Spirits</option>
              <option value="Toiletries">Toiletries</option>
              <option value="Accessories">Accessories</option>
              <option value="BMS">BMS</option>
              <option value="SDA">SDA</option>
              <option value="Households">Households</option>
              <option value="Automobile">Automobile</option>
              <option value="Medicare">Medicare</option>
              <option value="Baby Products">Baby Products</option>
              <option value="Pet Products">Pet Products</option>
              <option value="Tobacco">Tobacco</option>
              <option value="Butchery">Butchery</option>
              <option value="Perishables">Perishables</option>
              <option value="Fresh Produce">Fresh Produce</option>
              <option value="Bakery">Bakery</option>
            </select>
            <br><br>
            <label for="size">Size:</label><br>
            <select name="size" class="form-control">
            <option value="">select</option>
              <option value="large">large</option>
              <option value="small">small</option>
            </select><br><br>
            <label for="">Description:</label><br>
            <textarea class="form-control" placeholder="description" id="fname" name="desc" ></textarea><br>
            <label for="">Product Images:</label><br>
            <input type="file" class="form-control" id="fname" name="file[]" accept="image/*" multiple><br><br>

            <input type="submit" value="Upload Product" class="btn btn-success">

        </form>
    </div>
</section>

@include('layout/d_b_layout')
<!-- <script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script> -->
<!-- <script>
$(document).ready(function(){
    $('form').ajaxForm({
        beforeSend:function(){
            $('#success').empty();
            $('.progress-bar').text('0%');
            $('.progress-bar').css('width', '0%');
        },
        uploadProgress:function(event, position, total, percentComplete){
            $('.progress-bar').text(percentComplete + '0%');
            $('.progress-bar').css('width', percentComplete + '0%');
        },
        success:function(data)
        {
            if(data.success)
            {
                $('#success').html('<div class="text-success text-center"><b>'+data.success+'</b></div><br /><br />');
                $('#success').append(data.image);
                $('.progress-bar').text('Uploaded');
                $('.progress-bar').css('width', '100%');
            }
        }
    });
});
</script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->

                        <!-- <div class="row">
                            <div class="col-md-3" align="right"><h6>Select Images</h6></div>
                            <div class="col-md-6">
                                <input required type="file" name="file[]" id="file" accept="image/*" multiple />
                            </div>
                            <div class="col-md-3">
                                <input type="submit" name="upload" value="Upload Product" class="btn btn-success" />
                            </div>
                        </div>

                    <br />
                    <div class="progress">
                        <div class="progress-bar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                            0%
                        </div>
                    </div>
                    <br />
                    <div id="success" class="row">

                    </div>
                    <br />
                </div>
            </div>
  </div> -->
    <!-- <form method="post" enctype="multipart/form-data">
  <div class="custom-file">
    <input type="file" name="p_images[]" accept="image/*" multiple class="custom-file-input" id="customFile">
    <label class="custom-file-label" for="customFile">Choose file</label>
  </div> -->

    <!-- </div>
    <div id="menu2" class="tab-pane fade">

        <div class="form-row" style="margin-top:30px">
        <div class="form-group col-md-6">
      <label for="product name">Product Name</label>
      <input type="text" required name="p_name" class="form-control" placeholder="product name">
        </div>
        <div class="form-group col-md-3">
      <label for="category">Category</label>
      <select name="cat">
        <option>Choose</option>
        <option value="cat">Test Cat</option>
        <option value="cat">Test Cat</option>
        <option value="cat">Test Cat</option>
      </select>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="product description">Product Description</label>
      <textarea type="text" required name="desc" placeholder="product description" class="form-control"></textarea>
    </div>
    <div class="form-group col-md-3">
      <label for="category">Size</label>
      <select class="form-control" name="size" required>
        <option selected>Choose...</option>
        <option value="Extra-large">Extra Large</option>
        <option value="Large">Large</option>
        <option value="Medium">Medium</option>
        <option value="Small">Small</option>
      </select>
    </div>

  </div> -->
