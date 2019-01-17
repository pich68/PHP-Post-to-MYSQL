<?php require_once('load.php'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="style.css">
        <title>Display db rows</title>
    </head>
	<form method="post" action="">
		<div class="col-sm-6 form-group">
			<button type="submit" name="generatepdf" class="btn btn-lg btn-success btn-block">Generate PDF</button>
		</div>
	<form method="post" action="">
		<div class="col-sm-6 form-group">
			<button type="submit" name="sendmail" class="btn btn-lg btn-success btn-block">Mail Me</button>
		</div>	
	</form>
		
    <body style="max-width: 900px;">
        <?php
        // Connect to database
        $mysql = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        
        // Select data
        $resource = $mysql->query("SELECT * FROM users");
        
        // Loop and fetch
        while($row = $resource->fetch_object()) {
        	$results[] = $row;
        }
        ?>
        <table class="table users">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Catalog</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ( $results as $result ) : ?>
                    <tr>
                        <td><?php _e($result->name); ?></td>
                        <td><?php _e($result->email); ?></td>
                        <td><?php _e($result->catalog); ?></td>
                        <td><?php _e($result->description); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Catalog</th>
                    <th>Message</th>
                </tr>
            </tfoot>
        </table>
    </body>
</html>