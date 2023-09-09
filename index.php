<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
    <style>
        <?php include 'style.css';?>
    </style>
</head>
<body>
    <?php
        $num = 0;
        $json = file_get_contents('data.json');
        $json_data = json_decode($json,true);  
    ?>
    <h1 class="header1">PEOPLE DATA</h1>
    <button onclick="addCode()">NEXT PERSON</button>
    <div class="parent" id="add_to_me">
        <div class='child' style="margin-top: 1px;">
            <div class="innerchild"><h2 class="numb" id="numb">1</h2></div>
            <div class='innerchild1'><span class="text2">Name: </span><span class="text1"><?php echo $json_data[$num]["name"]?></span></div>
            <div class='innerchild2'><span class="text2">Location: </span><span class="text1"><?php echo $json_data[$num]["location"]?></div>
        </div>
    </div>
    <h4>CURRENTLY <span id="num">1</span> PEOPLE SHOWING</h4>
    <script>
        let dataArray = [];
        function fetchjson(){
            fetch('data.json')
        .then(response => response.json())
        .then(data => {
            dataArray = data;
        })
        }
        fetchjson();
        var num = 1;
        var ind = 0;
        function addCode() {
            if(ind>dataArray.length-1){
                alert("No more people!");
            }
            else{
                var number = document.getElementById("num");
                num++;
                ind++;
                number.innerHTML = num;
            }
            if(num>9)
            {
                document.getElementById("numb").style.marginLeft = "45%";
            }
            document.getElementById("add_to_me").innerHTML +="<div class='child'><div class='innerchild'><h2 class='numb'>"+num+"</h1></div><div class='innerchild1'><span class='text2'>Name: </span><span class='text1'>"+dataArray[ind]["name"]+"</span></div><div class='innerchild2'><span class='text2'>Location: </span><span class='text1'>"+dataArray[ind]["location"]+"</span></div></div>";
        }
    </script>
</body>
</html>