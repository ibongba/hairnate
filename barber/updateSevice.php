<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    <link rel="stylesheet" href="../css/style.css" />


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link href="../css/main.css" rel="stylesheet" />
    <title>Appoinment</title>
</head>
<style>
    input:checked+.slider {
        background-color: #a33e3e;
    }

    #upload {
        opacity: 0;
    }

    #upload-label {
        position: absolute;
        top: 50%;
        left: 1rem;
        transform: translateY(-50%);
    }


    .wid-img{
        width:300px;
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
                aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a href="/hairnate/index.html">
                    <img class="logo-img center-block" src="/hairnate/images/logo-app-white.png" />
                </a>
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a href="/hairnate/index.html">HOME <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item is-partner">
                        <a href="/hairnate/barber/index.html">APPOINMENTS</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="#"><i class="fas fa-search"></i></a>
                    </li>
                    <li class="nav-item not-login">
                        <a href="/hairnate/login.html"><i class="fas fa-user"></i></a>
                    </li>
                    <li class="nav-item is-login">
                        <a onclick="logout()"><i class="fas fa-sign-out-alt "></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <?php 
    $sericeid = $_GET['serNo'];
  ?>
    <div class="container">
        <div class="row justify-content-center">
            <form  action="../service/updateHairCutService.php" method="post" enctype="multipart/form-data">  
        
                <div class="col-lg-12">
                     <div class="text-center">
                        <h5>UPDATE SERVICE</h5>
                     </div>
                    <div class="mt-4">
                        <label for="exampleInputEmail1">SERVICE NO </label>
                        <input type="text"  class="form-control" value="<?php echo $sericeid ?>" disabled >
                        <input type="hidden" name="serviceNo" class="form-control" value="<?php echo $sericeid ?>" >
                        <input type="hidden" name="type" class="form-control" value="2" >
                    </div>
                    <!-- Uploaded image area-->
                    <div class="mt-4">
                    <label for="">CUSTOMER IMAGE HAIR CUT</label>
                    <img id="imageResult" src="#"  alt=""
                            class="d-block wid-img">
                    <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                            <input id="upload" name="file" type="file" onchange="readURL(this);" accept="image/*" class="form-control" required>
                            <label id="upload-label" for="upload" class="font-weight-light text-muted">Choose
                                file</label>

                            <div class="input-group-append">
                                <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i
                                        class="fa fa-cloud-upload mr-2 text-muted"></i><small
                                        class="text-uppercase font-weight-bold text-muted">Choose file</small></label>
                            </div>
                        </div>
                    </div>
                      <!-- end Uploaded image -->
                      <div class="mt-4">
                           <div class="form-check">
                                    <input class="form-check-input" name="userAccept" type="checkbox" id="gridCheck1" required >
                                    <label class="form-check-label" for="gridCheck1"  required>
                                   User Accepted
                                    </label>
                                </div>
                      </div>
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <footer>
        <div class="container">
            <div class="foot_logo pt-5">
                <img class="logo-img center-block" src="../images/logo-app-white.png " />
            </div>

            <div class="footer_text">เว็บแอพพลิเคชั่นรวบรวมร้านตัดผมแฟชั่นชาย และตัดผลบริจาคแบบ Delivery
                ในเขตกรุงเทพมหานครและปริมณฑล</div>

            <div class="foot_icon">
                <a href="# "><i class="fab fa-facebook"></i></a>
                <a href="# "><i class="fab fa-twitter"></i></a>
                <a href="# "><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js "></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <script src="../js/main.js"></script>
    <script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });
    </script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#imageResult')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(function () {
            $('#upload').on('change', function () {
                readURL(input);
            });
        });


        var input = document.getElementById('upload');
        var infoArea = document.getElementById('upload-label');

        input.addEventListener('change', showFileName);

        function showFileName(event) {
            var input = event.srcElement;
            var fileName = input.files[0].name;
            infoArea.textContent = 'File name: ' + fileName;
        }
    </script>


</html>