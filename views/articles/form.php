<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<form action="create" method="post">
    Author name:
    <select name="author_id">
        <?php foreach ($users as $user): ?>
            <option value="<?= $user['id'] ?>"><?= $user['first_name'] . ' ' . $user['last_name'] ?></option>
        <?php endforeach; ?>
    </select>
    Title: <input type="text" name="title"><br>
    Text: <textarea name="text" cols="30" rows="10"></textarea>
    <input type="submit" value="Submit">
</form>
</body>
</html>