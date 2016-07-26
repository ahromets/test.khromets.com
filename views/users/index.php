<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<ul class="nav nav-pills">
    <li role="presentation"><a href="/">Home</a></li>
    <li role="presentation"><a href="/users/create">Add user</a></li>
    <li role="presentation"><a href="/articles/create">Add article</a></li>
</ul>
<hr>

<div class="container">
    <div class="row">
        <h1>Articles by <?= $user[0]['first_name'] . ' ' . $user[0]['last_name'] ?></h1>
    </div>
        <?php foreach ($user as $articleItem): ?>
            <div class="row">
                <h2><?= $articleItem['title'] ?></h2>
                <p><?= $articleItem['public_date'] ?> by <?= $articleItem['first_name'] . ' ' . $articleItem['last_name'] ?>
                </p>

                <p><?= $articleItem['text'] ?></p>
            </div><!-- /.blog-post -->
            <hr>
        <?php endforeach; ?>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/assets/js/bootstrap.min.js"></script>
</body>
</html>