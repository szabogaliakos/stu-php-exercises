<?php
    if (isset($_GET["input_area"]) && $_GET["input_area"]){
        $area = $_GET["input_area"];
        $radius = sqrt($area / pi());
    }
    else if (isset($_GET["input_radius"]) && $_GET["input_radius"]){
        $radius = $_GET["input_radius"];
        $area = $radius * $radius * pi();
    }
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script type="text/javascript" src="../js/validation.js"></script>
    <title>Circle!</title>
</head>
<body>
    <section>
        <div class="container">
            <h1>Circle</h1>
            <form name="circle_form" action="index.php" onsubmit="return validateForm()">
                <div id="group-parameters" class="form-group">
                    <div class="form-group">
                        <label for="input_area">Superficies</label>
                        <input type="number" min="0" class="form-control" name="input_area" id="input_area" value="<?php echo round($area,2) ?>" placeholder="Enter superficies">
                    </div>
                    <div class="form-group">
                        <label for="input_radius">Radius</label>
                        <input type="number" min="0" class="form-control" name="input_radius" id="input_radius" value="<?php echo round($radius,2) ?>" placeholder="Enter radius">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <div class="invalid-feedback">
                    ASD
                </div>
            </form>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>