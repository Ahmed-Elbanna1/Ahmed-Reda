<?php
$msg = "";
if (isset($_GET["submit"])) {
    $f_num = $_GET["first-num"];
    // var_dump($_GET["first-num"]);
    if ($f_num === "") {
        $msg = "You did not enter a number";
    } elseif (($f_num % 2) == 0) {
        $msg = "{$f_num} is Even num";
    } else {
        $msg = "{$f_num} is Odd num";
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
        <div class="text-center h3 text-danger my-5">Even | Odd</div>
        <div class="col-6 offset-3 my-1">
            <form method="get">
                <div class="form-group my-2">
                    <label for="Fnum" class="form-label">Enter Number</label>
                    <input type="number" class="form-control" name='first-num' id="Fnum" placeholder="Enter First Num">
                </div>
                <div class="form-group text-center mt-1 ">
                    <input type="submit" name="submit" value="submit">
                </div>
            </form>
        </div>
        <div class="col-12 m-auto text-center  mt-5 ">
            <h3> <?php echo $msg; ?></h3>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>