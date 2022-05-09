<?php
$msg = "";
$res = "";
if (isset($_GET["submit"])) {
    if (
        $_GET["physics"]  === "" ||
        $_GET["biology"]  === "" ||
        $_GET["chemistry"]  === "" ||
        $_GET["mathematics"]  === "" ||
        $_GET["computer"]  === ""
    ) {
        $msg = "You did not enter a number";
        // echo $msg;
    } elseif (($_GET["physics"] > 100 || $_GET["physics"] < 0) ||
        ($_GET["chemistry"] > 100 || $_GET["chemistry"] < 0) ||
        ($_GET["biology"] > 100 || $_GET["biology"] < 0) ||
        ($_GET["mathematics"] > 100 || $_GET["mathematics"] < 0) ||
        ($_GET["computer"] > 100 || $_GET["computer"] < 0)
    ) {
        $msg =  "Degree is only between 0:100";
        // echo $msg;
    } else {
        $phys = $_GET["physics"];
        $chem = $_GET["chemistry"];
        $bio = $_GET["biology"];
        $math = $_GET["mathematics"];
        $comp = $_GET["computer"];
        $res = (($phys + $chem + $bio + $math + $comp) / 500) * 100;
        $msg = $res . " %";
        switch ($res) {
            case $res>=90:
                $msg="Grade A";
                break;
            case $res>=80:
                $msg="Grade B";
                break;
            case $res>=70:
                $msg="Grade C";
                break;
            case $res>=60:
                $msg="Grade D";
                break;
            case $res>=40:
                $msg="Grade E";
                break;
             
            default:
                $msg="Grade F";
                break;
        }   
    }
}

// print_r($_GET);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="row container-fluid">
        <div class="text-center h3 text-danger my-5">Grade</div>
        <div class="col-4 offset-4 my-1">
            <form method="get py-5 m-auto">
                <div class="form-group my-2">
                    <label for="sub1" class="form-label">Physics</label>
                    <input type="number" class="form-control" name='physics' id="sub1" >
                </div>
                <div class="form-group my-2">
                    <label for="sub2" class="form-label">Chemistry</label>
                    <input type="number" class="form-control" name='chemistry' id="sub2" >
                </div>
                <div class="form-group my-2">
                    <label for="sub3" class="form-label">Biology,</label>
                    <input type="number" class="form-control" name='biology' id="sub3" >
                </div>
                <div class="form-group my-2">
                    <label for="sub4" class="form-label">Mathematics </label>
                    <input type="number" class="form-control" name='mathematics' id="sub4" >
                </div>
                <div class="form-group my-2">
                    <label for="sub5" class="form-label">Computer</label>
                    <input type="number" class="form-control" name='computer' id="sub5" >
                </div>
                <div class="form-group text-center mt-1 ">
                    <input type="submit" name="submit" value="submit">
                </div>
            </form>
        </div>
        <div class="col-6 m-auto text-center  mt-5 ">

            <h3> <?php echo$res ." => ". $msg; ?></h3>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>