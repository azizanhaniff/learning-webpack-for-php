<!DOCTYPE html>
<html lang="en" class="h-100">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="description" content="Learning Webpack for PHP">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Learning Webpack for PHP</title>

        <?php require 'partials/common-link.php'; ?>
    </head>

    <body>
        <div class="pt-vh">
            <div class="container text-center mt-3 py-5">
                <form class="form-inline" method="post" action="/users">
                    <label class="sr-only" for="full_name">Full Name</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" id="full_name" name="full_name" placeholder="Enter name here..." autofocus>

                    <button type="submit" class="btn btn-primary mb-2">Submit</button>
                </form>

                <table class="table table-bordered table-hover table-striped">
                    <thead class="bg-primary">
                        <tr>
                            <th>ID</th>
                            <th>Full Name</th>
                            <th>Display Name</th>
                            <th>Created On</th>
                            <th>Updated On</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user) : ?>
                            <tr>
                                <td><?= $user->id; ?></td>
                                <td><?= $user->full_name; ?></td>
                                <td><?= $user->display_name; ?></td>
                                <td><?= $user->created_on; ?></td>
                                <td><?= $user->updated_on; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <?php require 'partials/common-script.php'; ?>
    </body>
</html>
