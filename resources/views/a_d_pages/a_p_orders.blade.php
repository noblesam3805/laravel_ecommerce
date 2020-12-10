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
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>All Pending Orders</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/a_p_orders"><i class="zmdi zmdi-home"></i> order</a></li>
                        <li class="breadcrumb-item">pending</li>
                        <li class="breadcrumb-item active">Pending List</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-hover product_item_list c_table theme-color mb-0">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Product Name</th>
                                        <th data-breakpoints="sm xs">Description</th>
                                        <th data-breakpoints="xs">Amount</th>
                                        <th data-breakpoints="xs md">QTY</th>
                                        <th data-breakpoints="xs md">Order Time</th>
                                        <th data-breakpoints="sm xs md">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($cart as $carts)
                                    <tr>
                                    <?php $img = json_decode($carts->images) ?>
                                        <td><img src="{{ asset('images/'.$img[0]) }}" width="48" alt="Product img"></td>
                                        <td><h5>{{$carts->p_name}}</h5></td>
                                        <td><span class="text-muted">{{$carts->desc}}</span></td>
                                        <td>{{$carts->p_price}}</td>
                                        <td><span class="col-green">{{$carts->qty}}</span></td>
                                        <td><span class="col-green">{{$carts->updated_at}}</span></td>
                                        <td><a href="{{'/show/'.$carts->user_id}}"
                                        class="btn btn-success">View User</a></td>
                                        <!-- <td>
                                            <a href="javascript:void(0);" class="btn btn-default waves-effect waves-float btn-sm waves-green"><i class="zmdi zmdi-eye"></i></a>
                                             <a href="javascript:void(0);" class="btn btn-default waves-effect waves-float btn-sm waves-red"><i class="zmdi zmdi-delete"></i></a>
                                        </td> -->
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- <div class="card">
                        <div class="body">
                            <ul class="pagination pagination-primary m-b-0">
                                <li class="page-item"><a class="page-link" href="javascript:void(0);"><i class="zmdi zmdi-arrow-left"></i></a></li>
                                <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0);">4</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0);"><i class="zmdi zmdi-arrow-right"></i></a></li>
                            </ul>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
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
