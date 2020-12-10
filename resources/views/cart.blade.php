@include('layout/header')

    	<!-- breadcrumb -->
	<div class="container" style="margin-top:90px; margin-bottom:30px">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Shoping Cart
			</span>
		</div>
	</div>


	<!-- Shoping Cart -->
    @if($cart !=null)

		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-xl-12 m-lr-auto m-b-50">
                 @if (session()->has('success'))
    <h1 class="alert alert-success">{{session()->get('success')}}</h1>
    @endif
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart" style="padding-right:50px">

							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Product</th>
									<th class="column-2"></th>
									<th class="column-3">Price</th>
									<th class="column-4">Quantity</th>
									<th class="column-5">Total</th>
									<th class="column-5">Option</th>
								</tr>
                                <?php $sum = 0; ?>
                                @foreach($cart as $carts)
								<tr class="table_row">
									<td class="column-1">
										<div class="how-itemcart1">
                                        <?php $img = json_decode($carts->images) ?>
											<img src="{{ asset('images/'.$img[0]) }}" alt="IMG">
                                            <input type="hidden" name="images" value="{{$carts->images}}">
										</div>
									</td>
									<td class="column-2">{{$carts->p_name}}
                                    <input type="hidden" name="p_name" value="{{$carts->p_name}}">
                                    </td>
									<td class="column-3">{{$carts->p_price}}
                                    <input type="hidden" name="p_price" value="{{$carts->p_price}}">
                                    </td>
									<td class="column-4">
										<div class="wrap-num-product flex-w m-l-auto m-r-0">


											<input disabled class="mtext-104 cl3 txt-center num-product" id="qty" type="number" name="qty" placeholder="{{$carts->qty}}">


										</div>
									</td>
									<td class="column-5"><?php echo (int)$carts->p_price * $carts->qty ?>
                                        <?php $sum += (int)$carts->p_price * $carts->qty ?>
                                    </td>
									<td><button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer"
                                    data-toggle="modal" data-target="#{{$carts->id}}">
                                            Edit
						            </button></td>
								</tr>
                                <!-- Modal -->
                            <div id="{{$carts->id}}" class="modal fade" role="dialog">
                              <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content" style="margin-top:200px">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Edit Quantity</h4>
                                  </div>
                                  <div class="modal-body">
                                  <form method="post" action="{{'/updateqty/'.$carts->id}}">
                                    @csrf
                                    <input type="number" name="qty" value="{{$carts->qty}}">
                                    <button type="submit" style="margin-top:30px;"
                                    class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">Update</button>
                                    </form>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  </div>
                                </div>

                              </div>
                            </div>
                            @endforeach
                            <?php echo $sum; ?>

							</table>
						</div>

						<!-- <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							<div class="flex-w flex-m m-r-20 m-tb-5">
								<input class="stext-104  plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="coupon" placeholder="Coupon Code">

								<div class="flex-c-m stext-101  size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
									Apply coupon
								</div>
							</div>

							<div class="flex-c-m stext-101  size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
								Update Cart
							</div>

						</div> -->
					</div>
				</div>

                <form class="bg0 p-t-20 p-b-85" method="post" action="{{route('order')}}" enctype="multipart/form-data">
                    @csrf
						<button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer"
                        style="margin-left:50px"
                        >
							Proceed to Checkout
						</button>

			</div>
		</div>
	</form>
    @else
    @if (session()->has('success'))
    <h1 class="alert alert-success">{{session()->get('success')}}</h1>
    @endif
    <h1 style="margin:100px 40px">Are you sure you are logged in? You do not have any item left in your cart</h1>
@endif
@include('layout/footer')
