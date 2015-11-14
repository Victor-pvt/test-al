<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <!-- jQuery & jQuery UI -->
    <script src="http://yastatic.net/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://yastatic.net/jquery-ui/1.11.1/jquery-ui.min.js" type="text/javascript"
            charset="utf-8"></script>

    <!-- Bootstrap -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <style>

    </style>
</head>
<body>
<div class="container">
    <form class="form-signin" action="task4php.php" method="post"
          enctype="multipart/form-data" style="width: 80%;  max-width:
        550px;" id="upload">
        <div class="form-group">
              <pre>
Задание 4
Существует MySQL БД, в которой создана таблица `users`. В таблице имеются поля `uid` - id
пользователя и `email` - адрес электронной почты пользователя.
Необходимо предложить способ и написать код, реализующий работу с указанной таблицей и
выполняющий следующие условия:
 все электронные адреса должны храниться в зашифрованном виде;
 должна существовать возможность поиска пользователей (построение списка uid) по
домену их email’ов;
 использовать дополнительные поля или другие таблицы БД нельзя.

              </pre>
        </div>
        <div class="form-group">
            <label for="inputEmail">Enter email domen:</label>
            <input type="text" name="email" class="form-control" id="inputEmail">
        </div>
        <button type="submit" class="btn btn-default">find</button>

        <div class="form-group">
            <label for="inputEmail"><?php if (isset($params['email'])) {
                    echo 'Entered email domen: ';
                    echo $params['email'];
                } ?></label>

        </div>

        <div class="row">

            <table class="table">
                <thead>
                <tr>
                    <th>№ п/п</th>
                    <th>ID user</th>
                    <th>Email</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i = 1;
                if(isset($params['users'])):
                foreach ($params['users'] as $key => $user):
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $user['id'];?></td>
                        <td><?php echo $user['email']; ?></td>
                    </tr>
                    <?php
                    $i = $i + 1;
                endforeach;
                endif?>

                </tbody>
            </table>
        </div>
    </form>

    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-4">
            <a href="index.html">home</a>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){


    });
</script>
</body>
</html>