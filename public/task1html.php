<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>http://test18/upload/<?php echo $fileName ?></title>
    <!-- jQuery & jQuery UI -->
    <script src="http://yastatic.net/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://yastatic.net/jquery-ui/1.11.1/jquery-ui.min.js" type="text/javascript"
            charset="utf-8"></script>

</head>
<body style="margin: 0px;">
<?php
$path = isset($_GET['req'])?$_GET['req']:'';
$userToken = '';
if (isset($_COOKIE['user_id'])){
    $userToken = $_COOKIE['user_id'];
}
$checktoken = substr($path,0,32);
$isVisible = $userToken==$checktoken ;
$displayBlock = 'style="display: block; position: absolute;top: 200px;height: 50px;background-color: #F1E1E1;padding-top: 14px;left: 50px;"';
$displayNone = 'style="display: none;"';

?>
<div style="display: table; width: 100%; height: 100%;">
    <div  style="display: table-cell; vertical-align: middle;position: relative">
        <img class="image" style="-webkit-user-select: none; display: block; margin: auto;" src="http://test18/upload/<?php echo $path ?>">
        <div class="text" <?php
        if ($isVisible){
            echo $displayBlock ;
        }else{
            echo $displayNone;
        }
        ?>>Hello world!
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){

        var posDivFirst = $("img.image").offset(),
            leftDivFirst = posDivFirst.left,
            topDivFirst = posDivFirst.top ,
            deltaHeight = 50
            ;

        $("div.text").offset({top:topDivFirst+deltaHeight, left:leftDivFirst +deltaHeight});

    });
</script>
</body>
</html>
