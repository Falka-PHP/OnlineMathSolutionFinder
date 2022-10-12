<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
</head>
<body>

<div class="container overflow-hidden">
    <div class="row gx-5">

        <div class="col form-div p-3" >
            <form class="bg-light" method="get" action="index.php">
                <h2>Find triangle square</h2>
                <h4>S = √(p(p-a)(p-b)(p-c))</h4>
                <div class="form-group">
                    <label for="first-side">A: </label>
                    <input type="number" class="form-control" id="first-side" name="first-side" required>
                </div>
                <div class="form-group">
                    <label for="second-side">B: </label>
                    <input type="number" class="form-control" id="second-side" name="second-side" required>
                </div>

                <div class="form-group">
                    <label for="third-side">C: </label>
                    <input type="number" class="form-control" id="third-side" name="third-side" required>
                </div>
                <button type="submit" class="btn btn-primary">Calculate</button>
                <h3>S = <?php
                    //formula -> sqrt(p(p-a)(p-b)(p-c))
                    // p = (a+b+c)/2
                    if (array_key_exists("first-side", $_GET) &&
                        array_key_exists("second-side", $_GET) &&
                        array_key_exists("third-side", $_GET)
                    ) {
                        $a = $_GET["first-side"];
                        $b = $_GET["second-side"];
                        $c = $_GET["third-side"];
                        $p = ($a + $b + $c) / 2;
                        $result = number_format(sqrt($p * ($p - $a) * ($p - $b) * ($p - $c)), 2);
                        echo $result . "cm";
                    }
                    ?></h3>
            </form>
        </div>


        <div class="col form-div p-3" >
            <form class="bg-light" method="get" action="index.php">
                <h2>Solve quadratic equation</h2>
                <h4>ax²+bx+c=0</h4>
                <div class="form-group">
                    <label for="a_val">A: </label>
                    <input type="number" class="form-control" id="a_val" name="a_val" required>
                </div>
                <div class="form-group">
                    <label for="b_val">B: </label>
                    <input type="number" class="form-control" id="b_val" name="b_val" required>
                </div>

                <div class="form-group">
                    <label for="c_val">C: </label>
                    <input type="number" class="form-control" id="c_val" name="c_val" required>
                </div>
                <button type="submit" class="btn btn-primary">Calculate</button>
                <h3><?php
                    //D = b^2 - 4ac
                    // (-b +- sqrt(D)) / 2 * a
                    $res1 = "0";
                    $res2 = "0";
                    if (array_key_exists("a_val", $_GET) &&
                        array_key_exists("b_val", $_GET) &&
                        array_key_exists("c_val", $_GET)
                    ) {
                        $a = $_GET["a_val"];
                        $b = $_GET["b_val"];
                        $c = $_GET["c_val"];


                        $d = ($b**2) - (4 * $a * $c);
                        if($d<0){
                            $res1 = "NF";
                            $res2 = "NF";
                        }else{
                            // (-b +- sqrt(D)) / 2 * a
                            $res1 = (-$b + sqrt($d)) / (2* $a);
                            $res2 = (-$b - sqrt($d)) / (2* $a);
                            if($res1 == $res2)
                                $res2 = "NF";
                        }
                    }

                    echo "X1 = ".$res1."<br>"."X2 = ".$res2;
                    ?>
                </h3>
            </form>

        </div>

    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
</body>
</html>