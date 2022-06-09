<?php include "includes/header.php";
if(!isset($_SESSION['admin'])){
    header("location:login.php");
    die();
}
?>
<?php 
    if(isset($_POST['addhotel'])){
        $uid=uniqid();
        $name = $_POST['name'];
        $latitude = $_POST['latitude'];
        $longitude = $_POST['longitude'];
        $manager = $_POST['manager'];
        $description = $_POST['description'];
        $flat_screen = 0;
        $city_view = 0;
        $bathtub = 0;
        $free_wifi = 0;
        $gym = 0;
        $breakfast = 0;
        $kitchenette = 0;
        $beach_view = 0;
        if(isset($_POST['flat_screen'])){			
            $flat_screen = $_POST['flat_screen'];
        }
        if(isset($_POST['city_view'])){
            $city_view = $_POST['city_view'];
        }
        if(isset($_POST['bathtub'])){
            $bathtub = $_POST['bathtub'];
        }
        if(isset($_POST['free_wifi'])){
            $free_wifi = $_POST['free_wifi'];
        }
        if(isset($_POST['gym'])){
            $gym = $_POST['gym'];
        }
        if(isset($_POST['breakfast'])){
            $breakfast = $_POST['breakfast'];
        }
        if(isset($_POST['kitchenette'])){
            $kitchenette = $_POST['kitchenette'];
        }
        if(isset($_POST['beach_view'])){
            $beach_view = $_POST['beach_view'];
        }
        $images = json_encode($_FILES['upload']['name']);
        $flag=0;
        if (!empty(array_filter($_FILES['upload']['name']))) {
        $total = count($_FILES['upload']['name']);

        for( $i=0 ; $i < $total ; $i++ ) {
        $tmpFilePath = $_FILES['upload']['tmp_name'][$i];
        if ($tmpFilePath != ""){
            $newFilePath = "../apis.raklissd.com/data/images/hotel_images/" . $_FILES['upload']['name'][$i];

            //Upload the file into the temp dir
            if(move_uploaded_file($tmpFilePath, $newFilePath)) {
                $flag = 1;

            }
        }
        }
        }
        if($flag == 1){
            $sql = "insert into hotels(uid,manager_uid,name,lat,lng,description,flat_screen,city_view,bathtub,free_wifi,gym,breakfast,kitchenette,beach_view,images,created_at,updated_at)
                values ('$uid','$manager','$name','$latitude','$longitude','$description','$flat_screen','$city_view','$bathtub','$free_wifi','$gym','$breakfast','$kitchenette','$beach_view','$images',now(),now())";
                $r = $conn->query($sql);
                if($r){
                    $_SESSION['h_add_success'] = "Hotel Added Successfully";
                    header("location: hotel.php");
                    die();
                }else{
                    $_SESSION['h_add_error'] = "Unable to add Hotel";
                }
        }else{
            $_SESSION['h_add_error'] = "Unable to add Hotel";
        }
    }
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<style>
    /* input[type="file"] {
  display: block;
} */
    .imageThumb {
        max-height: 100px;
        max-width: 100px;
        padding: 1px;
    }

    .pip {
        display: inline-block;
        margin: 10px 10px 0 0;
    }
</style>
<div class="wrapper ">
    <?php include "includes/sidenav.php";?>
    <div class="main-panel">
        <?php include "includes/nav.php";?>
        <div class="content">
            <div class="container-fluid">
                <?php if(isset($_SESSION['h_add_error'])){?>
                <div class="alert alert-success" role="alert">
                    <?php echo $_SESSION['h_add_error'];?>
                </div>
                <?php }unset($_SESSION['h_add_error']);?>
                <div class="row" style="font-size:28px;">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Add Hotel</h4>
                                <p class="card-category">Here You can Add New Hotel</p>
                            </div>
                            <div class="card-body">
                                <form action="#" method="POST" enctype="multipart/form-data">
                                    <div class="row mt-2 mb-2">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Hotel Name</label>
                                                <input type="text" class="form-control" name="name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Hotel Latitude</label>
                                                <input type="text" class="form-control" name="latitude" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2 mb-2">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Hotel Longitude</label>
                                                <input type="text" class="form-control" name="longitude" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <select class="form-control form-control-sm" title="Manager"
                                                    name="manager" required>
                                                    <option value="" selected disabled>Choose Manager</option>
                                                    <?php
                                        $sql="select * from managers";
                                        $result=$conn->query($sql);
                                        while($row=mysqli_fetch_assoc($result)){
                                      ?>
                                                    <option value="<?php echo $row['uid'];?>">
                                                        <?php echo $row['full_name'];?> (<?php echo $row['Email'];?>)
                                                    </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2 mb-2">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Hotel Description</label>
                                                <textarea name="description" id="" required class="form-control"
                                                    rows="5"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2 mb-2">
                                        <div class="col-md-12">
                                            <label class="bmd-label-floating">Hotel Features</label><br>
                                            <input type="checkbox" id="flat_screen" name="flat_screen" value="1"
                                                unchecked>
                                            <label for="flat_screen" class="mr-3">Flat Screen</label>
                                            <input type="checkbox" id="city_view" name="city_view" value="1" unchecked>
                                            <label for="city_view" class="mr-3">City View</label>
                                            <input type="checkbox" id="bathtub" name="bathtub" value="1" unchecked>
                                            <label for="bathtub" class="mr-3">BathTub</label>
                                            <input type="checkbox" id="free_wifi" name="free_wifi" value="1" unchecked>
                                            <label for="free_wifi" class="mr-3">Free Wifi</label>
                                            <input type="checkbox" id="gym" name="gym" value="1" unchecked>
                                            <label for="gym" class="mr-3">Gym</label>
                                            <input type="checkbox" id="breakfast" name="breakfast" value="1" unchecked>
                                            <label for="breakfast" class="mr-3">Breakfast</label>
                                            <input type="checkbox" id="kitchenette" name="kitchenette" value="1"
                                                unchecked>
                                            <label for="kitchenette" class="mr-3">Kitchenette</label>
                                            <input type="checkbox" input="beach_view" name="beach_view" value="1"
                                                unchecked>
                                            <label for="beach_view" class="mr-3">Beach View</label>
                                        </div>
                                    </div>
                                    <div class="row mt-3 mb-2">
                                        <div class="col-md-12">
                                            <div class="picture-container">
                                                <div class="picture">
                                                    <label class="bmd-label-floating">Upload Hotel Images</label>
                                                    <input type="file"
                                                        accept="image/png, image/jpg, image/gif, image/jpeg"
                                                        class="form-control" id="files" name="upload[]" multiple />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary pull-left" name="addhotel">Add
                                        Hotel</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include "includes/footer.php";?>
        <script>
            $(document).ready(function () {
                if (window.File && window.FileList && window.FileReader) {
                    $("#files").on("change", function (e) {
                        var files = e.target.files,
                            filesLength = files.length;
                        for (var i = 0; i < filesLength; i++) {
                            var f = files[i]
                            var fileReader = new FileReader();
                            fileReader.onload = (function (e) {
                                var file = e.target;
                                $("<span class=\"pip\">" +
                                    "<img class=\"imageThumb\" src=\"" + e.target.result +
                                    "\" title=\"" + file.name + "\"/>").insertAfter(
                                    "#files");
                                $(".remove").click(function () {
                                    $(this).parent(".pip").remove();
                                });

                                // Old code here
                                /*$("<img></img>", {
                                  class: "imageThumb",
                                  src: e.target.result,
                                  title: file.name + " | Click to remove"
                                }).insertAfter("#files").click(function(){$(this).remove();});*/

                            });
                            fileReader.readAsDataURL(f);
                        }
                        console.log(files);
                    });
                } else {
                    alert("Your browser doesn't support to File API")
                }
            });
        </script>