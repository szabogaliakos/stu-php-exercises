<?php
    $output = "";
    $input = "Today is a nice day!";
    $find = "Today";
    $replace = "Tomorrow";

    if (isset($_GET["input"]) && isset($_GET["find"]) && isset($_GET["replace"])){
        $input = $_GET["input"];
        $find = $_GET["find"];
        $replace = $_GET["replace"];

        $output = str_replace($find, $replace, $input);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Replace</title>
    <link rel="stylesheet" href=css/style.css>
</head>
<body>
    <form action="index.php">
        <h3>REPLACE STRING</h3>
        <div class="light-background">
            <label for="input">Input</label><br>
            <textarea name="input" id="input" type="text"><?php echo $input ?></textarea><br>
            <div class="flex-container">
                <div class="flex-element">
                    <label for="find">Find:</label>
                    <input name="find" id="find" type="text" value="<?php echo $find ?>">
                </div>
                <div class="flex-element">
                    <label for="replace">Replace:</label>
                    <input name="replace" id="replace" type="text" value="<?php echo $replace ?>"><br>
                </div>
            </div>
            <textarea id="output" type="text"><?php echo $output ?></textarea>
            <hr>
            <button type="submit">Submit</button>
        </div>
    </form>
</body>
</html>