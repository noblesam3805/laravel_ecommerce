<?php
error_reporting(1);
$con = mysqli_connect("localhost", "root", "", "l_e_app");
$output = "";
$sql = "select * from products where p_name LIKE '%".$_POST['search']."%'";
$res = mysqli_query($con,$sql);
if(!$res){
	print_r(mysqli_error($con));
}

if (mysqli_num_rows($res) > 0){
	$output .= '<br><h4 align="center" style="margin:0 0 10px 0;"> Search Result </h4>';
	$output .= '<div class="row" style="margin:0 0 100px 0;">

	';

	while($row = mysqli_fetch_array($res)){
        $img = json_decode($row["images"]);
            $output .= '<a href="/view/ '.$row["id"]. ' ">
            <div class="col-sm-6 col-md-3" style="margin-bottom:100px; padding:20px">
            <div class="thumbnail">

                        <img src="/images/'.$img[0] . '"  alt="..." style="height:250px; padding:20px">
                        <p style="padding-left:20px;">'.$row["p_name"].'</p>
                        </div>
                      </div>
                      </a>
					';
	}
	echo $output;
}
else{
	echo '<p align="center" class="mt-10 mb-10"><b>Sorry, No data was found for your search</b></p>';
}
?>
