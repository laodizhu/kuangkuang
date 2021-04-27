<?php
    //获取token的函数
    function send_post($url, $post_data) {
        $url = 'https://aip.baidubce.com/oauth/2.0/token';
        $post_data = array(
            'grant_type' => 'client_credentials',
            'client_id' => 'hoDxPk2OXQPHLUYCkTwYNvwM',
            'client_secret' => '0928fTmr3blrSf20gBNoQW6wF6xlymyL'
        );
        $postdata = http_build_query($post_data);
        $options = array(
            'http' => array(
                'method' => 'POST',
                'header' => 'Content-type:application/x-www-form-urlencoded',
                'content' => $postdata,
                'timeout' => 15 * 60 // 超时时间（单位:s）
            )
        );
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        return $result;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base target="_blank" />
    <title>设计稿列表</title>
    <style>
        body{background-color: #111;}
        .list{width: 100%;font-size: 0;}
        .item{display: inline-block;vertical-align: top;width: 210px;margin: 10px;text-decoration: none;background-color: #222;padding: 15px;box-sizing: border-box;transition: all .3s;}
        .item:hover{background-color: #333;}
        .box{width: 100%;height: 210px;overflow: hidden;margin-bottom: 15px;}
        .img{width: 100%;vertical-align: top;}
        .title{font-size: 16px;color: #ddd;line-height: 26px;text-align: center;text-decoration: none;}
    </style>
</head>
<body>
    <div class="list">
        <?php
            $arr = scandir("./images");
            $n = count($arr);
            for ($x=0; $x<$n; $x++) {
                // $r = iconv('gbk' , 'utf-8//ignore' , $arr[$x]);
                $r = $arr[$x];
                if($r!='.' && $r!='..'){
                    $i = strripos($r,'.');
                    $name = substr($r, 0,$i);
                    $type = substr($r,$i+1);
                    echo '<a class="item" href="index.html?name='.$name.'&type='.$type.'"><div class="box"><img class="img" src="images/'.$r.'" /></div><div class="title">'.$name.'</div></a>';
                }
            }
        ?>
    </div>
</body>
</html>