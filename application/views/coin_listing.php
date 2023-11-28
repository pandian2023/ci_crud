<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coin Listing</title>
</head>
<body>

    <h2>Coin Listing</h2>

    <table border="1">
        <tr>
            <th>Coin Name</th>
            <th>Id</th>
            <th>Symbol</th>
            <th>Rank</th>
            <th>Inserted DateTime</th>
            <th>Last Update DateTime</th>
        </tr>

        <?php foreach ($coins as $coin): ?>
            <tr>
                <td><?php echo $coin['name']; ?></td>
                <td><?php echo $coin['id']; ?></td>
                <td><?php echo $coin['symbol']; ?></td>
                <td><?php echo $coin['rank']; ?></td>
                <td><?php echo $coin['created_at']; ?></td>
                <td><?php echo $coin['updated_at']; ?></td>
            </tr>
        <?php endforeach; ?>

    </table>

</body>
</html>
