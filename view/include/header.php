<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<meta name="author" content="ThemeFuse">
<meta name="keywords" content="">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Employees Database</title>

<!-- main JS libs -->
<script src="/external/vanilla-cream/js/libs/modernizr.min.js"></script>
<script src="/external/vanilla-cream/js/libs/jquery-1.10.0.js"></script>
<script src="/external/vanilla-cream/js/libs/jquery-ui.min.js"></script>
<script src="/external/vanilla-cream/js/libs/bootstrap.min.js"></script>

<!-- Style CSS -->
<link href="/external/vanilla-cream/css/bootstrap.css" media="screen" rel="stylesheet">
<link href="/external/vanilla-cream/style.css" media="screen" rel="stylesheet">

<!-- scripts -->
<script src="/external/vanilla-cream/js/general.js"></script>
<!-- custom input -->
<script src="/external/vanilla-cream/js/jquery.customInput.js"></script>
<script type="text/javascript" src="/external/vanilla-cream/js/custom.js"></script>
<!-- Placeholders -->
<script type="text/javascript" src="/external/vanilla-cream/js/jquery.powerful-placeholder.min.js"></script>
<!-- Progress Bars -->
<script src="/external/vanilla-cream/js/progressbar.js"></script>
<!-- Calendar -->
<link href="/external/vanilla-cream/css/jquery-ui-1.8.20.custom.css" rel="stylesheet">
<script src="/external/vanilla-cream/js/jquery-ui.multidatespicker.js"></script>
<!-- Graph Builder -->
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
<script type="text/javascript" src="/external/vanilla-cream/js/jquery.flot.js"></script>
<script type="text/javascript" src="/external/vanilla-cream/js/jquery.flot.resize.js"></script>
<script type="text/javascript">
    $(function() {
        var graphwidth = $('.widget_graph .inner').width();
        $('.widget_graph .graph').css('height', parseInt(graphwidth/1.7));
        $(window).resize(function() {
            graphwidth = $('.widget_graph .inner').width();
            $('.widget_graph .graph').css('height', parseInt(graphwidth/1.7));
        });

        var d1 = [[0, 9], [1, 23], [1.8, 7], [2.2, 24], [2.8, 18], [4, 36]];
        var graphholder = $("#graph");
        var plot = $.plot(graphholder, [d1], {
            colors: ["#669146", "#afd8f8", "#cb4b4b", "#4da74d", "#9440ed"],
            xaxis: {
                min: null,
                max: null
            },
            yaxis: {
                autoscaleMargin: 0.02
            },
            series: {
                lines: {
                    show: true,
                    lineWidth: 2,
                    fill: true,
                    fillColor: "rgba(188,176,150,0.3)"
                },
                points: {
                    show: true,
                    radius: 4,
                    lineWidth: 2,
                    fillColor: "#f6f3ee"
                }
            },
            grid: {
                hoverable: true,
                clickable: true,
                margin: 12,
                color: "#a09d96",
                borderColor: "#b7ab92"
            }
        });

        function showTooltip(x, y, contents) {
            $("<div id='graph-tooltip'>" + contents + "</div>").css({top: y - 36, left: x - 19}).appendTo("body").fadeIn(200);
        };

        var previousPoint = null;
        $("#graph").on("plothover", function (event, pos, item) {

            if (item) {
                if (previousPoint != item.dataIndex) {

                    previousPoint = item.dataIndex;

                    $("#graph-tooltip").remove();
                    var x = item.datapoint[0].toFixed(2),
                        y = item.datapoint[1].toFixed(2);

                    showTooltip(item.pageX, item.pageY, '$' + y*100);
                }
            } else {
                $("#graph-tooltip").remove();
                previousPoint = null;
            }
        });
    });
</script>

<!-- range sliders -->
<script src="/external/vanilla-cream/js/jquery.slider.bundle.js"></script>
<script src="/external/vanilla-cream/js/jquery.slider.js"></script>
<link rel="stylesheet" href="/external/vanilla-cream/css/jslider.css">
<!-- Visual Text Editor -->
<script src="/external/vanilla-cream/js/nicEdit.js"></script>
<!-- Volume, Balance -->
<script type="text/javascript" src="/external/vanilla-cream/js/knobRot-0.2.2.js"></script>
<!-- Video Player -->
<link href="/external/vanilla-cream/css/video-js.css" rel="stylesheet">
<script src="/external/vanilla-cream/js/video.js"></script>
<!-- Audio Player -->
<link href="/external/vanilla-cream/css/jplayer.css" rel="stylesheet">
<script src="/external/vanilla-cream/js/jquery.jplayer.min.js"></script>
<script src="/external/vanilla-cream/js/jplayer.playlist.min.js"></script>
<script type="text/javascript">
    //<![CDATA[
    $(document).ready(function(){

        new jPlayerPlaylist({
            jPlayer: "#jquery_jplayer_1",
            cssSelectorAncestor: "#jp_container_1"
        }, [
            {
                title:"<ul><li class='item-artist'>3 Doors Down&#160;&#8211;&#160;</li><li class='item-song'>Superman</li></ul>",
                mp3:"http://www.jplayer.org/audio/mp3/TSP-05-Your_face.mp3",
                oga:"http://www.jplayer.org/audio/ogg/TSP-05-Your_face.ogg"
            },
            {
                title:"<ul><li class='item-artist'>Daft Punk&#160;&#8211;&#160;</li><li class='item-song'>Get Lucky</li></ul>",
                mp3:"http://www.jplayer.org/audio/mp3/TSP-07-Cybersonnet.mp3",
                oga:"http://www.jplayer.org/audio/ogg/TSP-07-Cybersonnet.ogg"
            },
            {
                title:"<ul><li class='item-artist'>Justin Timberlake&#160;&#8211;&#160;</li><li class='item-song'>Mirrors</li></ul>",
                mp3:"http://www.jplayer.org/audio/mp3/Miaow-07-Bubble.mp3",
                oga:"http://www.jplayer.org/audio/ogg/Miaow-07-Bubble.ogg"
            }
        ], {
            swfPath: "js",
            supplied: "oga, mp3",
            wmode: "window",
            smoothPlayBar: false,
            keyEnabled: false
        });
    });
    //]]>
</script>

<!-- Scroll Bars -->
<script src="/external/vanilla-cream/js/jquery.mousewheel.js"></script>
<script src="/external/vanilla-cream/js/jquery.jscrollpane.min.js"></script>
<script type="text/javascript">
	jQuery(function()
	{
		jQuery('.scrollbar').jScrollPane({
			verticalDragMaxHeight: 55,
			verticalDragMinHeight:55
		});

		jQuery('.scrollbar.style2').jScrollPane({
			verticalDragMaxHeight: 30,
			verticalDragMinHeight:30
		});

		jQuery('.scrollbar.style3').jScrollPane({
			verticalDragMaxHeight: 14,
			verticalDragMinHeight:14
		});

		jQuery('.scrollbar.style4').jScrollPane({
			verticalDragMaxHeight: 55,
			verticalDragMinHeight:55
		});
	});
</script>

<!-- Multiselect -->
<link rel="stylesheet" href="css/chosen.css">
<script src="/external/vanilla-cream/js/jquery.chosen.min.js" type="text/javascript"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('#contact_name').chosen({ width: "100%" });
    });
</script>

<!--[if lt IE 9]><script src="js/respond.min.js"></script><![endif]-->
<!--[if gte IE 9]>
<style type="text/css">
    .gradient {filter: none !important;}
</style>
<![endif]-->
</head>

<body>
<div>
    <ul class="dropdown clearfix gradient" style="width:100%;">
        <li class="menu-level-0 first"><a href="/" hidefocus="true" style="outline: none;" class="gradient"><span>Company Dashboard</span></a></li>
        <li class="menu-level-0 parent"><a href="#" hidefocus="true" style="outline: none;" class="gradient"><span>Tools</span></a>
            <ul class="submenu-1">
                <li class="menu-level-1 first"><a href="/controller/edit-employee.php" hidefocus="true" style="outline: none;" class="gradient">Edit Employee</a></li>
                <li class="menu-level-1"><a href="/controller/create-worksOn.php" hidefocus="true" style="outline: none;" class="gradient">Create WorksOn</a></li>
                <li class="menu-level-1"><a href="/controller/view-all.php" hidefocus="true" style="outline: none;" class="gradient">View All WorksOn Records</a></li>
                <li class="menu-level-1"><a href="/controller/create-dependant.php" hidefocus="true" style="outline: none;" class="gradient">Create Dependants</a></li>
                <li class="menu-level-1 last parent"><a href="/controller/view-new.php" hidefocus="true" style="outline: none;" class="gradient">View New Data</a></li>
            </ul>
        </li>     
    </ul>
</div>
<div class="container">
