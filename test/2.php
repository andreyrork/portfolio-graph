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
    <p class="text-success">
        <?php
        switch ($_GET['question']) {
            case '1' :
                $advice = "Чем раньше вы начинаете заботиться о своем финансовом успехе, тем больше у вас шансов на успех. Вы на верном пути.";
                break;
            case '2' :
                $advice = "Вы находитесь в прекрасном возрасте, чтобы сделать первые шаги на пути к успешной жизни.";
                break;
            case '3' :
                $advice = "Вы уже обладаете жизненным опытом и наверняка испытали радость взлетов и тяжесть падений. Прекрасное время, чтобы превратить ваш опыт в рецепт успеха";
                break;
            case '4' :
                $advice = "Вы находитесь в рассвете сил, и у вас в запасе есть много времени для реализации ваших целей. Одновременно с этим вы знаете цену времени, поэтому вам лучше начать идти к успеху прямо сейчас.";
                break;
            case '5' :
                $advice = "Вы повидали многое и уже успели сформировать собственное мнение по большинству типичных вопросов. Самое время, чтобы по новому взглянуть на старые вещи. Поверьте, вы откроете для себя много интересного";
                break;
        }

        echo $advice;
        ?>
    </p>
    <form role="form">
        <p class="lead">
            Каков вам средний месячный заработок на данный момент?
        </p>
        <div class="radio">
            <label>
                <input type="radio" name="question" value="1" checked>
                Менее 20
            </label>
        </div>

        <button type="submit" class="btn btn-default">Далее -></button>
    </form>

</div>

</body>
</html>