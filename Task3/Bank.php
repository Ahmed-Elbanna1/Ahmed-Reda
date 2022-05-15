<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $userName = $_POST["name"];
    $loan = $_POST["loan"];
    $years = $_POST["years"];
    $loanAfterInterest = "";
    $monthly = "";
    $errors = [];
    if (empty($userName)) {
        $errors['name-req'] = '<div class="text-danger font-weight-bold" > Your Nme Is Required </div>';
    }
    if (empty($loan)) {
        $errors['loan-req'] = '<div class="text-danger font-weight-bold" > Loan Is Required </div>';
    }
    if ($loan <= 0) {
        $errors['negative-loan'] = '<div class="text-danger font-weight-bold" > Loan amount must be positive Num </div>';
    }
    if (empty($years)) {
        $errors['years-req'] = '<div class="text-danger font-weight-bold" > Num of Years Is Required </div>';
    }
    if ($years <= "0") {
        $errors['negative-year'] = '<div class="text-danger font-weight-bold" > Num of Years Must be Positive Num </div>';
    }
    if (empty($errors)) {
        if ($years <= 3) {
            $interestRate = $loan * (.10 * $years);
        } else {
            $interestRate = $loan * (.15 * $years);
        }
        $loanAfterInterest = $loan + $interestRate;
        $monthly = $loanAfterInterest / ($years * 12);
        $table = '<table class="table table-success table-striped">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Loan amount</th>
            <th scope="col">Interest rate</th>
            <th scope="col">Loan after interest </th>
            <th scope="col">Monthly</th>
          </tr>
        </thead>
        <tbody>';
        $table .= '
          <tr>
            <th scope="row">' . $userName . '</th>
            <td> ' . $loan . '</td>
            <td> ' . $interestRate . '</td>
            <td> ' . $loanAfterInterest . '</td>
            <td> ' . $monthly . '</td>
          </tr>
        </tbody>
      </table>';
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="row container-fluid">
        <div class="text-center h3 text-danger my-5">Bank</div>
        <div class="col-6 offset-3 my-1">
            <form method="post">
                <div class="form-group my-2">
                    <label for="Name" class="form-label">Your Name</label>
                    <input type="text" class="form-control" name='name' id="Name" placeholder="Enter Your Name"
                        value="<?= $_POST['name'] ?? "" ?>">
                    <?= $errors['name-req'] ?? "" ?>
                </div>
                <div class="form-group my-2">
                    <label for="loan" class="form-label">Enter Number</label>
                    <input type="number" class="form-control" name='loan' id="loan" placeholder="Enter Loan amount "
                        value="<?= $_POST['loan'] ?? "" ?>">
                    <?= $errors['loan-req'] ?? "" ?>
                    <?= $errors['negative-loan'] ?? "" ?>
                </div>
                <div class="form-group my-2">
                    <label for="years" class="form-label">Number of years </label>
                    <input type="number" class="form-control" name='years' id="years"
                        placeholder=" Number of years to pay " value="<?= $_POST['years'] ?? "" ?>">
                    <?= $errors['years-req'] ?? "" ?>
                    <?= $errors['negative-year'] ?? "" ?>
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