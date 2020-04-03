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
            <textarea id="input" type="text">Today is a nice day!</textarea><br>
            <div class="flex-container">
                <div class="flex-element">
                    <label for="find">Find:</label>
                    <input id="find" type="text" value="Today">
                </div>
                <div class="flex-element">
                    <label for="replace">Replace:</label>
                    <input id="replace" type="text" value="Today"><br>
                </div>
            </div>
            <textarea id="output" type="text"></textarea>
            <hr>
            <button type="submit">Submit</button>
        </div>
    </form>
</body>
</html>