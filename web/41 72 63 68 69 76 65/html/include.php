<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.muicss.com/mui-latest/css/mui.min.css" rel="stylesheet" type="text/css"/>
    <script src="https://cdn.muicss.com/mui-latest/js/mui.min.js"></script>
    <title>Injection</title>
</head>
<body>
<div id="content" class="mui-container-fluid">
    <div class="mui-row">
        <div class="mui-col-sm-10 mui-col-sm-offset-1">
            <br>
            <br>
            <div class="mui--text-black-54 mui--text-body2"><h1>Tips: the parameter is file! :)</h1></div>
        </div>
    </div>
</div>
<!-- upload.php -->
</body>
</html>
<?php
    @$file = $_GET["file"];
    if(isset($file))
    {
        if (preg_match('/http|data|ftp|input|%00/i', $file) || strstr($file,"..") !== FALSE || strlen($file)>=70)
        {
            echo "<p> error! </p>";
        }
        else
        {
            include($file.'.php');
        }
    }
/* RDGCTF{I_am_so_filled_with_my_knowledge_that_I_seem_to_have_already_One_hundred_trillion_billion_years_I_'ve_been_living_on_trillions_and_trillions_of_planets_like_this_Earth,_to_me_this_world_is_absolutely_it_is_clear,_and_I_am_looking_for_only_one_thing_here_-_peace,_tranquility_and_here_is_this_harmony,_from_merging_with_the_infinitely_eternal,_from_contemplation_the_great_fractal_similarity_and_from_this_wonderful_unity_a_being_infinitely_eternal,_wherever_you_look,_even_deep_down_-_infinitely_small,_though_up_-_infinite_big,_do_you_understand?} */
?>
