<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Test site</title>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs-3.3.6/jq-2.2.3/dt-1.10.12/af-2.1.2/cr-1.3.2/fh-3.1.2/r-2.1.0/rr-1.1.2/sc-1.4.2/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs-3.3.6/jq-2.2.3/dt-1.10.12/af-2.1.2/cr-1.3.2/fh-3.1.2/r-2.1.0/rr-1.1.2/sc-1.4.2/datatables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#usersTable').DataTable();
        } );
    </script>

</head>

<body>

<a href="/">Home</a>
<a href="/users/create">Add user</a>
<a href="/articles/create">Add article</a>
<hr>

<?php
    var_dump($usersList);
?>

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
    <tr>
        <td>Tiger Nixon</td>
        <td>System Architect</td>
        <td>Edinburgh</td>
        <td>61</td>
    </tr>
    <tr>
        <td>Garrett Winters</td>
        <td>Accountant</td>
        <td>Tokyo</td>
        <td>63</td>
    </tr>
    <tr>
        <td>Ashton Cox</td>
        <td>Junior Technical Author</td>
        <td>San Francisco</td>
        <td>66</td>
    </tr>
    </tbody>
</table>

<?php //foreach ($articlesList as $articleItem): ?>
<!--    <h2 class="post-title">-->
<!--        --><?//= $articleItem['title'] ?>
<!--    </h2>-->
<!--    <h3 class="post-subtitle">-->
<!--        --><?//= $articleItem['text'] ?>
<!--    </h3>-->
<!--    <p class="post-meta">Posted by <a-->
<!--            href="/--><?//= 'users/' . $articleItem['author_id'] ?><!--">--><?//= $articleItem['author_id'] ?><!--</a>-->
<!--        on --><?//= $articleItem['public_date'] ?><!--</p>-->
<!--    <hr>-->
<?php //endforeach; ?>

</body>

</html>
