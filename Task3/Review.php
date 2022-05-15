<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // $res = "";
    $x1 = "";
    $res = 0;
    $errors = [];
    $_SESSION['q1'] = $_POST['Q1'];
    $_SESSION['q2'] = $_POST['Q2'];
    $_SESSION['q3'] = $_POST['Q3'];
    $_SESSION['q4'] = $_POST['Q4'];
    $_SESSION['q5'] = $_POST['Q5'];
    if (empty($_POST['Q1']) || empty($_POST['Q2']) || empty($_POST['Q3']) || empty($_POST['Q4']) || empty($_POST['Q5'])) {
        $errors['questions-required'] = "<div class='text-danger font-weight-bold'> All Question Is Required </div>";
    }
    foreach ($_POST as $key => $value) {
        if ($value == "bad") {
            $x1 = 0;
        } elseif ($value == "good") {
            $x1 = 3;
        } elseif ($value == "very-good") {
            $x1 = 5;
        } else {
            $x1 = 10;
        }
        $res += $x1;
    }
    $_SESSION["result"] = $res;

    header('location:Result.php');
    die;
    // echo $res;
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
        <div class="text-center h3 text-danger my-2"></div>
        <div class="col-8 offset-2 my-1">
            <table class="table table-secondary table-striped table-hover table-bordered">
                <form method="POST">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col">the question
                            </th>
                            <th scope="col">Bad</th>
                            <th scope="col">Good</th>
                            <th scope="col">Very good</th>
                            <th scope="col">Excellent</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <td class="text-start">Are you satisfied with the level of cleanliness?</td>
                            <td>
                                <input class="form-check-input" type="radio" name="Q1" value="bad"
                                    id="flexRadioDefault1">
                            </td>
                            <td>
                                <input class="form-check-input" type="radio" name="Q1" value="good"
                                    id="flexRadioDefault1">
                            </td>
                            <td>
                                <input class="form-check-input" type="radio" name="Q1" value="very-good"
                                    id="flexRadioDefault1">
                            </td>
                            <td>
                                <input class="form-check-input" type="radio" name="Q1" value="excellent"
                                    id="flexRadioDefault1">
                            </td>
                        </tr>
                        <tr class="text-center">

                            <td class="text-start">Are you satisfied with the service prices?
                            </td>
                            <td>
                                <input class="form-check-input" type="radio" name="Q2" value="bad"
                                    id="flexRadioDefault1">
                            </td>
                            <td>
                                <input class="form-check-input" type="radio" name="Q2" value="good"
                                    id="flexRadioDefault1">
                            </td>
                            <td>
                                <input class="form-check-input" type="radio" name="Q2" value="very-good"
                                    id="flexRadioDefault1">
                            </td>
                            <td>
                                <input class="form-check-input" type="radio" name="Q2" value="excellent"
                                    id="flexRadioDefault1">
                            </td>

                        </tr>
                        <tr class="text-center">

                            <td class="text-start">Are you satisfied with the nursing service
                            </td>
                            <td>
                                <input class="form-check-input" type="radio" name="Q3" value="bad"
                                    id="flexRadioDefault1">
                            </td>
                            <td>
                                <input class="form-check-input" type="radio" name="Q3" value="good"
                                    id="flexRadioDefault1">
                            </td>
                            <td>
                                <input class="form-check-input" type="radio" name="Q3" value="very-good"
                                    id="flexRadioDefault1">
                            </td>
                            <td>
                                <input class="form-check-input" type="radio" name="Q3" value="excellent"
                                    id="flexRadioDefault1">
                            </td>

                        </tr>
                        <tr class="text-center">
                            <td class="text-start">Are you satisfied with the level of the doctor?
                            </td>
                            <td>
                                <input class="form-check-input" type="radio" name="Q4" value="bad"
                                    id="flexRadioDefault1">
                            </td>
                            <td>
                                <input class="form-check-input" type="radio" name="Q4" value="good"
                                    id="flexRadioDefault1">
                            </td>
                            <td>
                                <input class="form-check-input" type="radio" name="Q4" value="very-good"
                                    id="flexRadioDefault1">
                            </td>
                            <td>
                                <input class="form-check-input" type="radio" name="Q4" value="excellent"
                                    id="flexRadioDefault1">
                            </td>

                        </tr>
                        <tr class="text-center">
                            <td class="text-start">Are you satisfied with the calmness in the hospital?
                            </td>
                            <td>
                                <input class="form-check-input" type="radio" name="Q5" value="bad"
                                    id="flexRadioDefault1">
                            </td>
                            <td>
                                <input class="form-check-input" type="radio" name="Q5" value="good"
                                    id="flexRadioDefault1">
                            </td>
                            <td>
                                <input class="form-check-input" type="radio" name="Q5" value="very-good"
                                    id="flexRadioDefault1">
                            </td>
                            <td>
                                <input class="form-check-input" type="radio" name="Q5" value="exellent"
                                    id="flexRadioDefault1">
                            </td>
                        </tr>
                    </tbody>

            </table>
            <div class="col-12 m-auto text-center  mt-5 ">
                <?= $errors['questions-required'] ?? "" ?>
                <button class="btn btn-outline-danger rounded">Result </button>
            </div>
            </form>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>
</body>

</html>