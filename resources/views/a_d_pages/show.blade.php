@include('layout/d_h_layout')
<!-- Page Loader -->

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
                    <h2>Orderer Contact</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/a_p_orders"><i class="zmdi zmdi-home"></i> order</a></li>
                        <li class="breadcrumb-item">Orderer</li>
                        <li class="breadcrumb-item active">Orderer </li>
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
                                        <th> Username</th>
                                        <th>User Email</th>
                                        <th data-breakpoints="sm xs">User Phone</th>
                                        <th data-breakpoints="sm xs">User Address</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><h5>{{$user->name}}</h5></td>
                                        <td><span class="text-muted">{{$user->email}}</span></td>
                                        <td>{{$user->phone}}</td>
                                        <td>{{$user->address}}</td>

                                        <!-- <td>
                                            <a href="javascript:void(0);" class="btn btn-default waves-effect waves-float btn-sm waves-green"><i class="zmdi zmdi-eye"></i></a>
                                             <a href="javascript:void(0);" class="btn btn-default waves-effect waves-float btn-sm waves-red"><i class="zmdi zmdi-delete"></i></a>
                                        </td> -->
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

@include('layout/d_b_layout')

