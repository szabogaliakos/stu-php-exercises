<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Calculator</title>
</head>
<body>
    <form action="index.php" method="GET">
        <h1>Calculation</h1>
        <label>First number:</label>
        <input type="number" name="a" required><br>
        <label>Second number:</label>
        <input type="number" name="b" required><br>
        <label>Operation:</label>
        <select name="operator" required>
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select><br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
<?php
    if(isset($_GET["a"]) && isset($_GET["b"]) && isset($_GET["operator"])){
        require_once "Calculator.php";

        $a = $_GET["a"];
        $b = $_GET["b"];
        $operator = $_GET["operator"];

        try {
            $calculator = new Calculator($a, $b, $operator);
            $result = $calculator->calculate();
            echo "<p>".$calculator.$result."<p>";
        } catch (InvalidParametersException $e){
            echo $e->getMessage();
        }
    }
?>