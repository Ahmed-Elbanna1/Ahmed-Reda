<?php
$max = "";
$min = "";
if (isset($_GET["submit"])) {
    $f_num = $_GET["first-num"];
    $s_num = $_GET["sec-num"];
    $t_num = $_GET["third-num"];
    if ($f_num > $s_num && $f_num > $t_num) {
        $max = $f_num;
    } else if ($s_num > $f_num && $s_num > $t_num) {
        $max = $s_num;
    } else {
        $max = $t_num;
    }


    if ($f_num < $s_num && $f_num < $t_num) {
        $min = $f_num;
    } elseif ($s_num < $f_num && $s_num < $t_num) {
        $min = $s_num;
    } else {
        $min = $t_num;
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
        <div class="text-center h3 text-danger my-5">MAX & MIN</div>
        <div class="col-4 offset-4 my-1">
            <form method="get py-5 m-auto">
                <div class="form-group my-2">
                    <label for="Fnum" class="form-label">First Number</label>
                    <input type="number" class="form-control" name='first-num' id="Fnum" placeholder="Enter First Num">
                </div>
                <div class="form-group my-2">
                    <label for="snum" class="form-label">Second Number</label>
                    <input type="number" class="form-control" name='sec-num' id="snum" placeholder="Enter Second Num">
                </div>
                <div class="form-group my-2">
                    <label for="tnum" class="form-label">Third Number</label>
                    <input type="number" class="form-control" name='third-num' id="tnum" placeholder="Enter Third Num">
                </div>
                <div class="form-group text-center mt-1 ">
                    <input type="submit" name="submit" value="submit">
                </div>
            </form>
        </div>
        <div class="col-6 m-auto text-center  mt-5 ">
            <h3>Max Num is <?php echo $max; ?></h3>
            <h3>Min Num is <?php echo $min; ?> </h3>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>