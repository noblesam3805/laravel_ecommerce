@include('layout/header')



    <!-- Modal1 -->
	<div class="p-t-110 p-b-20">
		<div class="overlay-modal1 js-hide-modal1"></div>

		<div class="container">
			<div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
				<button class="how-pos3 hov3 trans-04 js-hide-modal1">
					<img src="{{ asset('images/icons/icon-close.png')}}" alt="CLOSE">
				</button>
    @if (session()->has('success'))
    <h1 class="alert alert-success">{{session()->get('success')}}</h1>
    @endif
				<div class="row">
					<div class="col-md-6 col-lg-7 p-b-30">
						<div class="p-l-25 p-r-30 p-lr-0-lg">
							<div class="wrap-slick3 flex-sb flex-w">
								<div class="wrap-slick3-dots"></div>
								<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

								<div class="slick3 gallery-lb">
                                    <?php $img = json_decode($product->images) ?>
                                    @foreach($img as $im)
									<div class="item-slick3" data-thumb="{{ asset('images/'.$im)}}">
										<div class="wrap-pic-w pos-relative">
											<img src="{{ asset('images/'.$im)}}" alt="IMG-PRODUCT">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{ asset('images/'.$im)}}">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>
                                    @endforeach
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-6 col-lg-5 p-b-30">
						<div class="p-r-50 p-t-5 p-lr-0-lg">

        <form method="post" action="/update/{{$product->id}}" enctype="multipart/form-data">
            @csrf

            <label for="">Change Product Name:</label><br>
            <input type="text" placeholder="product name" value="{{$product->p_name}}" class="form-control" name="p_name"><br>
            <label for="">Change Price:</label><br>
            <input type="text" placeholder="product price" value="{{$product->p_price}}" class="form-control" name="p_price"><br>
            <label for="">Change Category:</label><br>
            <select id="" name="cat" class="form-control">
                <option value="{{$product->cat}}">{{$product->cat}}</option>
                <option value="male wear">Male wear</option>
            </select>
            <br><br>
            <label for="size">Change Size:</label><br>
            <select name="size" class="form-control">
            <option value="{{$product->size}}">{{$product->size}}</option>
              <option value="large">large</option>
              <option value="small">small</option>
            </select><br><br>
            <label for="">Change Description:</label><br>
            <input type="text" style="height:150px" class="form-control" value="{{$product->desc}}" name="desc">
            <br>
            <label for="">Change Product Images:</label><br>
            <input type="file" class="form-control" id="fname" name="file[]" accept="image/*" multiple><br><br>

            <input type="submit" value="Update Product" class="btn btn-success">

        </form>

						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
    <!-- end modal -->
    @include('layout/footer')
