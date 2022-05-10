<?php
$msg="";
$temp="";
$res = "";
$total="";
if (isset($_POST["num"])) {
    $unit = $_POST["num"];
    $first = .50;
    $second = .75;
    $third = 1.20;
    $above = 1.50;
    if ($unit <= 50) {
        $mul=$unit*$first;
        $vat = $mul *.20;
        $total = $mul +$vat;
        $msg= "Price is {$first} Per Unit <br> Price with out Vat is {$mul} <br> Vat : 20 % <br> Final Price {$total}";

    }elseif ($unit>50 && $unit<=150) {
        $temp =50*$first;
        $mul=$unit-50;
        $res=$temp+($mul *$second);
        $vat=$res *.20;
        $total=$res +$vat;
        $msg= "Price is {$second} Per Unit <br>  Price with out Vat is {$res} <br> Vat : 20 % <br> Final Price {$total}";
    }elseif ($unit>150 && $unit<=250) {
        $temp =50*$first + 100*$second;
        $mul=$unit-150;
        $res=$temp+($mul *$third);
        $vat=$res *.20;
        $total=$res +$vat;
        $msg= "Price is {$third} Per Unit <br>  Price with out Vat is {$res} <br> Vat : 20 % <br> Final Price {$total}";
    }else{
        $temp =50*$first + 100*$second + 100*$third;
        $mul=$unit-250;
        $res=$temp+($mul *$above);
        $vat=$res *.20;
        $total=$res +$vat;
        $msg= "Price is {$last} Per Unit <br>  Price with out Vat is {$res} <br> Vat : 20 % <br> Final Price {$total}" ;
    }
    
    // echo $total;

}
 

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
        <div class="text-center h3 text-danger my-5">Pos | Neg</div>
        <div class="col-6 offset-3 my-1">
            <form method="post">
                <div class="form-group my-2">
                    <label for="Fnum" class="form-label">Enter Number</label>
                    <input type="number" class="form-control" name='num' id="Fnum" placeholder="Enter First Num">
                </div>
                <div class="form-group text-center mt-1 ">
                    <input type="submit" name="submit" value="submit">
                </div>
            </form>
        </div>
        <div class="col-12 m-auto text-center  mt-5 ">
            <h2 class=" bg-success w-50 m-auto text-white py-5">
                <?php echo$msg?>
            </h2>
            

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>