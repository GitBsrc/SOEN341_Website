<!DOCTYPE html>
<html>
<head>
    <title>Main Page</title>

    <link rel="stylesheet" type="text/css" href="login.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../Jqwidgets/jqwidgets/styles/jqx.base.css" type="text/css" />
     <link rel="stylesheet" href="../Jqwidgets/jqwidgets/styles/custom.css" type="text/css">
    <script type="text/javascript" src="../Jqwidgets/jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="../Jqwidgets/jqwidgets/jqxchart.core.js"></script>
    <script type="text/javascript" src="../Jqwidgets/jqwidgets/jqxdraw.js"></script>
    <script type="text/javascript" src="../Jqwidgets/jqwidgets/jqxdata.js"></script>

    <style>

    .chart{width:1000px; margin-left: 10%; height: 500px;}
    .align{text-align: center;}

    #firstImg{
            cursor: pointer;
        }
    #secondImg{
            cursor: pointer;
        }
    #thirdImg{
            cursor: pointer;
        }
    </style>
    <style>

    #graphinfo, #passwordchange, #achievements, #backgroundimgchange {
    background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #787878), color-stop(1, #474747));
    background:-moz-linear-gradient(top, #787878 5%, #474747 100%);
    background:-webkit-linear-gradient(top, #787878 5%, #474747 100%);
    background:-o-linear-gradient(top, #787878 5%, #474747 100%);
    background:-ms-linear-gradient(top, #787878 5%, #474747 100%);
    background:linear-gradient(to bottom, #787878 5%, #474747 100%);
    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#787878', endColorstr='#474747',GradientType=0);
    background-color:#787878;
    -moz-border-radius:8px;
    -webkit-border-radius:8px;
  border:1px solid white; 
    display:inline-block;
    cursor:pointer;
    color:#ffffff;
    font-family:Trebuchet MS;
    font-size:13px;
    padding:7px 22px;
    text-decoration:none;
    text-shadow:0px 1px 6px #000000;
    opacity: 0.9;
     margin-bottom:7px; 
}
#graphinfo:hover, #passwordchange:hover, #achievements:hover, #backgroundimgchange:hover {
    background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #242424), color-stop(1, #424242));
    background:-moz-linear-gradient(top, #242424 5%, #424242 100%);
    background:-webkit-linear-gradient(top, #242424 5%, #424242 100%);
    background:-o-linear-gradient(top, #242424 5%, #424242 100%);
    background:-ms-linear-gradient(top, #242424 5%, #424242 100%);
    background:linear-gradient(to bottom, #242424 5%, #424242 100%);
    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#242424', endColorstr='#424242',GradientType=0);
    background-color:#242424;
}
#graphinfo:active, #passwordchange:active, #achievements:active, #backgroundimgchange:active {
    position:relative;
    top:1px;
}

.tooltip {
    position: relative;
    display: inline-block;
}

.tooltip .tooltiptext {
    visibility: hidden;
    width: 120px;
    background-color: #555;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;
    position: absolute;
    z-index: 1;
    bottom: 125%;
    left: 50%;
    margin-left: -60px;
    opacity: 0;
    transition: opacity 0.3s;
}

.tooltip .tooltiptext::after {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: #555 transparent transparent transparent;
}

.tooltip:hover .tooltiptext {
    visibility: visible;
    opacity: 1;
}

#title1, #title2{
     font-family: Trebuchet MS;
     color: white;
     font-size: 20px;
     padding-top: 20px;
}
#achievementsTable{
    list-style: none;

}
#totalAchievements{
    margin: 20px;
    padding-top: 20px;
    font-size: 30px;
    text-align: center;
    color: white;
    font-family: Chalkduster, Trebuchet MS;
}

#achievementsTab{
    background-color: #707070;
    opacity: 0.9;
    border-left: 8px solid white;
    border-right: 8px solid white;
    /*#F83F0E;*/

    padding-top: 10px;
    padding-left: 10px;
    padding-right: 10px;
    padding-bottom: 50px;
    margin: 90px;
    border-radius: 8px;

}

</style>
</head>



<body>
<?php include('header.php'); ?>
<br>
<br>
<br>
<div class="align">

<button id="graphinfo">User Statistics</button>
<button id="passwordchange">Change Password</button>


<button id="backgroundimgchange">Change Background</button>


<button id="achievements">Achievements</button>

</div>

<div id="graph" >
    <div id='chartContainer' class="chart"></div>
    <div style="margin-left:10%">
    <h2 id="title1">Questions By Me <3</h2>
    <div id="questions" class="align"></div>
    <h2 id="title2">Replies By Me <3</h2>
    <div id="reply" class="align"></div>
    </div>
</div>
<div id="password" hidden >

    <div class="align">
    <h2>Enter new password</h2>
        <input id="newpassword"/>
        <button id="confirmenewpassword">ok</button>
    </div>

</div>
<div id="backgroundimg" style="text-align: center" hidden>
    <h3>Choose a Background image</h3>
    <img id="firstImg" src="../Img/one-pieceR.png" alt="image1" width="300" height="300" style="margin-right: 3%">
    <img id="secondImg" alt="image2" src="../Img/one-pieceR.png" width="300" height="300" style="margin-right: 3%">
    <img id="thirdImg" alt="image3" src="../Img/one-pieceR.png" width="300" height="300">
    <br>
    <input id="ImgChoose" type="text" placeholder="Choose a background" disabled>
    <button id="saveimg">Save Image</button>
</div>

<div id ="achievementsTab" hidden>
<h2 id = "totalAchievements">
</h2>
    <ul id = "achievementsTable">

    </ul>
</div>

<script type="text/javascript">


    $(document).ready(function () {
        var Pathimg1;
        var Pathimg2;
        var Pathimg3;
        $.post("../Controller/loadImg.php",
            function(data){
            var imageBack = JSON.parse(data);
                Pathimg1 = imageBack[3];
                Pathimg2 = imageBack[4];
                Pathimg3 = imageBack[5];
                $("#firstImg").attr("src",imageBack[2]);
                $("#secondImg").attr("src",imageBack[2]);
                $("#thirdImg").attr("src",imageBack[2]);


            });

        $("#saveimg").click(function(){
            if(confirm("Do you really want the "+$("#ImgChoose").val())){
                $.post("../Controller/changeImg.php",{data:$("#ImgChoose").val()},
                    function(data){
                        window.location.href="index.php";


                    });
            }
        });
        $("#firstImg").mouseover(function(){
            var urlimg = "url("+Pathimg1+")";
            $('#bodypart').css('backgroundImage', urlimg);
        });
        $("#secondImg").mouseover(function(){
            var urlimg = "url("+Pathimg2+")";
            $('#bodypart').css('backgroundImage', urlimg);
        });
        $("#thirdImg").mouseover(function(){
            var urlimg = "url("+Pathimg3+")";
            $('#bodypart').css('backgroundImage', urlimg);
        });
        $("#firstImg").click(function(){
            $("#ImgChoose").val("Left Image");
        });
        $("#secondImg").click(function(){
            $("#ImgChoose").val("Middle Image");
        });
        $("#thirdImg").click(function(){
            $("#ImgChoose").val("Right Image");
        });
        $("#confirmenewpassword").click(function(){

            $.post("../Controller/newpass.php",{password:$("#newpassword").val()},
                function(data){
                alert("Sucessfully change password");

        }); });


         $.post("../Controller/upvotesAchievement.php"
            ,
            function(data){
        });

        


        $("#achievements").click(function(){

            $("#achievementsTab").show();
            $("#password").hide();
            $("#graph").hide();
            $("#achievementsTable").empty();
            var str ="";
            $.post("../Controller/achievements.php", function(data){
                var info = JSON.parse(data); 
                $('#totalAchievements').text(info.length-1 + " Achievements in my Collection 🔥🔥🔥");
                for(var i = 1; i<info.length;i++){
                
                if(info[i].includes("naruto")){
                    str+="<div class='tooltip'><li><img height='100' width='100' src = '../Img/icons/"+info[i]+".png'><li><span class='tooltiptext'>"+info[i]+"</span></div>";
                }
               else if(info[i].includes("onepiece")){
                str+="<div class='tooltip'><li><img height='100' width='100' src = '../Img/icons/"+info[i]+".png'><li><span class='tooltiptext'>"+info[i]+"</span></div>";

                }

               else if(info[i].includes("bleach")){
                str+="<div class='tooltip'><li><img height='100' width='100' src = '../Img/icons/"+info[i]+".png'><li><span class='tooltiptext'>"+info[i]+"</span></div>";

                }
                else if(info[i].includes("dragonball")){
                    str+="<div class='tooltip'><li><img height='100' width='100' src = '../Img/icons/"+info[i]+".png'><li><span class='tooltiptext'>"+info[i]+"</span></div>";

                }
                else if(info[i].includes("Connaisseur")){
                    str+="<div class='tooltip'><li><img height='100' width='100' src = '../Img/icons/connaisseur.png'><li><span class='tooltiptext'>"+info[i]+"</span></div>";

                }
                else if(info[i].includes("Master")){
                    str+="<div class='tooltip'><li><img height='100' width='100' src = '../Img/icons/master.png'><li><span class='tooltiptext'>"+info[i]+"</span></div>";

                }
                else if(info[i].includes("GrandMaster")){
                    str+="<div class='tooltip'><li><img height='100' width='100' src = '../Img/icons/grandmaster.png'><li><span class='tooltiptext'>"+info[i]+"</span></div>";

                }
                else if(info[i].includes("God")){
                    str+="<div class='tooltip'><li><img height='100' width='100' src = '../Img/icons/god.png'><li><span class='tooltiptext'>"+info[i]+"</span></div>";

                }
                else{
                str+="<div class='tooltip'><li><img height='100' width='100' src = '../Img/icons/"+info[i]+".png'><li><span class='tooltiptext'>"+info[i]+"</span></div>";
                }
                }
                 $("#achievementsTable").append(str);
        });
        });


        
        $("#graphinfo").click(function(){
            $("#graph").show();
            $("#achievementsTab").hide();
            $("#password").hide();
            $("#backgroundimg").hide();
        });
        $("#passwordchange").click(function(){
            $("#graph").hide();
            $("#achievementsTab").hide();
            $("#password").show();
            $("#backgroundimg").hide();
        });
        $("#backgroundimgchange").click(function(){
            $("#graph").hide();
            $("#password").hide();
            $("#achievementsTab").hide();
            $("#backgroundimg").show();
        });


        $.post("../Controller/profilGraph.php"
            ,
            function(data){
            var info = JSON.parse(data);

                var source =
                    {
                        localdata: info[0],
                        datatype: "array"
                    };

                var dataAdapter = new $.jqx.dataAdapter(source);


                $("#questions").jqxDataTable(
                    {

                        altRows: true,
                        pageable: true,
                        sortable: true,
                        source: dataAdapter,
                        theme: 'custom',

                        columns: [ 
                        //{text:'id',datafield:'ID',width:100,align:'center'},
                        { text: 'title', datafield: 'title', width: 250,align:'center'},{ text: 'user', datafield: 'user', width: 100,align:'center' },{text: 'date', datafield: 'date', width: 250,align:'center'},{text: 'Replies', datafield: 'number_replies', width:100 ,align:'center'}]
                    });
                dataAdapter.dataBind();
                $("#questions").jqxDataTable("updateBoundData");

                var source =
                    {

                        localdata: info[1],
                        datatype: "array"
                    };

                var dataAdapter = new $.jqx.dataAdapter(source);


                $("#reply").jqxDataTable(
                    {
                        altRows: true,
                        pageable: true,
                        sortable: true,
                        source: dataAdapter,
                        theme: 'custom',

                        columns: [ 
                        //{text:'id',datafield:'ID',width:100,align:'center'},
                        { text: 'title', datafield: 'title', width: 250,align:'center'},{ text: 'user', datafield: 'user', width: 100,align:'center' },{text: 'date', datafield: 'date', width: 250,align:'center'},{text: 'Replies', datafield: 'number_replies', width:100 ,align:'center'}]
                    });
                dataAdapter.dataBind();
                $("#reply").jqxDataTable("updateBoundData");
            });
        $.post("../Controller/profilGraphinfo.php",
            function(data){
            var sampleData = JSON.parse(data);




        // prepare jqxChart settings
        var settings = {
            title:"",

            title:sampleData[12],

            description:"",
            padding: { left: 5, top: 5, right: 5, bottom: 5 },
            titlePadding: { left: 90, top: 0, right: 0, bottom: 10 },
            source: sampleData,
            categoryAxis:
                {
                    dataField: 'Day',
                    showGridLines: false
                },
            colorScheme: 'scheme01',
            seriesGroups:
                [
                    {
                        type: 'column',
                        columnsGapPercent: 30,
                        seriesGapPercent: 0,
                        valueAxis:
                            {
                                minValue: 0,

                                maxValue: 10,
                                unitInterval: 1,
                                description: 'Time in minutes'
                            },
                        series: [
                            { dataField: 'month', displayText: '#Question'},
                            { dataField: 'reply', displayText: '#Reply'}

                        ]
                    }
                ]
        };

        // select the chartContainer DIV element and render the chart.
        $('#chartContainer').jqxChart(settings);

            });

    });
</script>

</body>


</html>