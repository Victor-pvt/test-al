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
        .as-test{
            width: 48%;
            position: relative;
            float: left;
            height: 550px;
            background-color: azure;

        }
        .bc-test{
            width: 49%;
            position: relative;
            float: left;
            height: 400px;
            background-color: beige;
        }
    </style>
</head>
<body>
<div class="container">
    <form class="form-signin" action="task2php.php" method="post"
          enctype="multipart/form-data" style="width: 80%;  max-width:
        550px;" id="upload">
        <div class="form-group">
              <pre>
                array (
                'a' => 1/3,
                'b' => 1/6,
                'c' => 1/2
                );
              </pre>
        </div>
        <div class="row">

            <table class="table">
                <thead>
                <tr>
                    <th>
                        <?php if (isset($params['count'])) {
                                echo 'цикл из ';
                                echo $params['count'];
                                echo ' расчетов';
                            } ?>
                    </th>
                </tr>

                <tr>
                    <th>№ п/п</th>
                    <th>Ключ</th>
                    <th>Вес</th>
                    <th>Появления, абс</th>
                    <th>появления, %</th>
                </tr>
                </thead>
                <tbody>

                <?php
                    $i = 1;
                    $sumvesIn = 0;
                    $sumOut = 0;
                    $sumVesOut = 0;
                    if (isset($params['ves'])):
                        foreach ($params['ves'] as $key => $vesIn):?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $key ?></td>
                    <td><?php if (isset($params['ves'][$key])) {
                                        echo $params['ves'][$key];
                                    }?></td>
                    <td><?php if (isset($params['calc'][$key])) {
                                        echo $params['calc'][$key];
                                    }?></td>
                    <td><?php if (isset($params['vesOut'][$key])) {
                                        echo $params['vesOut'][$key];
                                    }?></td>
                </tr>

                <?php
                            $sumvesIn = $sumvesIn + $params['ves'][$key];
                            $sumOut = $sumOut + $params['calc'][$key];
                            $sumVesOut = $sumVesOut + $params['vesOut'][$key];

                            $i = $i + 1;
                        endforeach;?>
                <?php endif; ?>
                <tr>
                    <th></th>
                    <th>Итого</th>
                    <th><?php echo $sumvesIn; ?></th>
                    <th><?php echo $sumOut; ?></th>
                    <th><?php echo $sumVesOut; ?></th>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="form-group">
            <label for="inputCount">Count:</label>
            <input type="text" name="count" class="form-control" id="inputCount">
        </div>
        <button type="submit" class="btn btn-default">считать</button>

    </form>
</div>

<div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-4">
        <a href="index.html">home</a>
    </div>
</div>

<script>
    $(document).ready(function(){


    });
</script>
</body>
</html>