<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $userName = $_POST["name"];
    $city = $_POST["city"];
    $products = $_POST["products"];
    $req = [];
    $errors = [];
    if (empty($userName)) {
        $errors['name-req'] = '<div class="text-danger font-weight-bold" > Your Nme Is Required </div>';
    }
    if (empty($city)) {
        $errors['city-req'] = '<div class="text-danger font-weight-bold" > City Is Required </div>';
    }
    if (empty($products)) {
        $errors['products-req'] = '<div class="text-danger font-weight-bold" > Num of products Is Required </div>';
    }
    if ($products <= "0") {
        $errors['negative-year'] = '<div class="text-danger font-weight-bold" > Num of products Must be Positive Num </div>';
    }
    if (empty($errors)) {
        $table = '<table class="table table-success table-striped">';

        $table .=
            '<form method="get">';

        for ($i = 0; $i < $products; $i++) {
            $table .= '<tr>';
            $table .= '<td>';
            $table .= '<input type="text" class="" name="prod" id="pName">';
            $table .= '</td>';
            $table .= '<td>';
            $table .= '<input type="number" class="" name="price" id="price">';
            $table .= '</td>';
            $table .= '<td>';
            $table .= '<input type="number" class="" name="amount" id="pAmount">';
            $table .= '</td>';
            $table .= '</tr>';
            if ($_GET) {
                // $req = array_merge($req, $req[$i]);
                $req[$i] = [
                    'productName' => $_GET['prod'],
                    'productPrice' => $_GET['price'],
                    'productAmount' => $_GET['amount']
                ];
                print_r($req);
            }
        }
        $table .= '<tr>';
        $table .= '<td> </td>';
        $table .= '<td>';
        $table .= '<div class="text-center mt-1 ">
        <input type="submit" name="submit" value="submit">
        </div>';
        $table .= '</td>';
        $table .= '<td> </td>';


        // ;

        '</form>
      </table>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="row container-fluid">
        <div class="text-center h3 text-danger my-5">Super Market</div>
        <div class="col-6 offset-3 my-1">
            <form method="post">
                <div class="form-group my-2">
                    <label for="Name" class="form-label">Your Name</label>
                    <input type="text" class="form-control" name='name' id="Name" placeholder="Enter Your Name">
                </div>
                <div class="form-group my-2">
                    <label for="sel" class="form-label"> Choose your city :</label>
                    <select class="form-select " id="sel" name="city" aria-label=".form-select-lg example">
                        <option value="cairo">Cairo</option>
                        <option value="giza">GIza</option>
                        <option value="alex">Alex</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="form-group my-2">
                    <label for="products" class="form-label">Number of products</label>
                    <input type="number" class="form-control" name='products' id="products"
                        placeholder=" Number of products you want to buy ">
                </div>

                <div class="form-group text-center mt-1 ">
                    <input type="submit" name="submit" value="submit">
                </div>

            </form>
        </div>
        <div class="col-9 m-auto text-center  mt-5 ">
            <?= $table ?? "" ?>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>