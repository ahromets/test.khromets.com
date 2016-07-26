<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Test site</title>

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
    <li role="presentation" class="active"><a href="/articles/create">Add article</a></li>
</ul>
<hr>

<div class="container">
    <?php if ($articleError): ?>
        <div class="row">
            <h1>Error</h1>
        </div>
        <div class="row">
            <div class="alert alert-danger">
                <strong>Error!</strong> Not found any users. Please add user first.
            </div>
        </div>
    <?php else: ?>
    <div class="row">
        <?php if($articleCreated): ?>
            <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> Article created successfully!
            </div>
        <?php endif; ?>
        <h1>Add article</h1>
    </div>
    <div class="row">
        <form role="form" action="create" method="post">
            <div class="form-group">
                <label for="author_id">First Name:</label>
                <select name="author_id" class="form-control" id="author_id" required>
                    <?php foreach ($users as $user): ?>
                        <option
                            value="<?= $user['id'] ?>"><?= $user['first_name'] . ' ' . $user['last_name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="last_name">Title:</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter title of article"
                       required>
            </div>
            <div class="form-group">
                <label for="text">Description:</label>
                <textarea name="description" class="form-control" id="description" cols="30" rows="3" maxlength="255"
                          placeholder="Enter description of article" required></textarea>
            </div>
            <div class="form-group">
                <label for="text">Text:</label>
                <textarea name="text" class="form-control" id="text" cols="30" rows="8"
                          placeholder="Enter text of article" required></textarea>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
    <br>
</div>
<?php endif; ?>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/assets/js/bootstrap.min.js"></script>
</body>
</html>