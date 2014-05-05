<html>
<head>
    <meta charset="utf-8">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <form role="form" action="2.php">
        <p class="lead">
            Сколько вам лет?
        </p>
        <div class="radio">
            <label>
                <input type="radio" name="question" value="1" checked>
                Менее 20
            </label>
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="question" value="2">
                От 20 до 25
            </label>
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="question" value="3">
                От 25 до 30
            </label>
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="question" value="4">
                От 30 до 40
            </label>
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="question" value="5">
                Более 40
            </label>
        </div>
        <button type="submit" class="btn btn-default">Далее -></button>
    </form>

</div>

</body>
</html>