<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Test site</title>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/bs-3.3.6/jq-2.2.3/dt-1.10.12/af-2.1.2/cr-1.3.2/fh-3.1.2/r-2.1.0/rr-1.1.2/sc-1.4.2/datatables.min.css"/>
    <script type="text/javascript"
            src="https://cdn.datatables.net/v/bs-3.3.6/jq-2.2.3/dt-1.10.12/af-2.1.2/cr-1.3.2/fh-3.1.2/r-2.1.0/rr-1.1.2/sc-1.4.2/datatables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#usersTable').DataTable();
        });
    </script>

</head>

<body>
<ul class="nav nav-pills">
    <li role="presentation" class="active"><a href="/">Home</a></li>
    <li role="presentation"><a href="/users/create">Create user</a></li>
    <li role="presentation"><a href="/articles/create">Create article</a></li>
</ul>
<hr>

<div class="container">
    <div class="row">
        <h1>Users and their articles</h1>
        <h3>Displaying users who has at least 1 article</h3>
    </div>
    <div class="row">
        <table id="usersTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Articles</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Articles</th>
            </tr>
            </tfoot>
            <tbody>
            <?php foreach ($usersList as $user): ?>
                <tr>
                    <td><?= $user['first_name'] ?></td>
                    <td><?= $user['last_name'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td><a href="/users/<?= $user['id'] ?>"><?= $user['articles'] ?></a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
