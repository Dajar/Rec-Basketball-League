//Replace html content box score button text on hover of button element
$('.change').hover(
   function() {
	   $(this).text("Show Box");
   },
   function() {
	   $(this).text("Box Score");
   }
  
);

//jquery ui tabbed panels


//Hide and display main navigation on click of show icon in mobile devices
function myFunction() {
    $(".topnav")[0].classList.toggle("responsive");
}

//Hide Awards Player of the Week List details
$(".viewPow1").hide();
$(".viewPow2").hide();
$(".viewPow3").hide();
$(".viewPow4").hide();
$(".viewPow5").hide();
$(".viewPow6").hide();
$(".viewPow7").hide();

//Show Awards Player of the Week List details upon click
$(".checkPow1").click(function(){
	$(".viewPow1").toggle();
});

$(".checkPow2").click(function(){
	$(".viewPow2").toggle();
});

$(".checkPow3").click(function(){
	$(".viewPow3").toggle();
});

$(".checkPow4").click(function(){
	$(".viewPow4").toggle();
});

$(".checkPow5").click(function(){
	$(".viewPow5").toggle();
});

$(".checkPow6").click(function(){
	$(".viewPow6").toggle();
});

$(".checkPow7").click(function(){
	$(".viewPow7").toggle();
});

//Hide League Leaders list items on on home page
$(".viewRebounds").show();
$(".viewAssists").show();
$(".viewBlocks").show();
$(".viewSteals").show();
$(".viewThrees").show();
$(".viewBoxG1").show();
$(".viewBoxG2").show();
$(".viewBoxG3").show();

//Hide Game Box Scores on Scores Page
$("#viewGame1").hide();
$("#viewGame2").hide();
$("#viewGame3").hide();

//Hide Team Player averages
$(".viewTeam1").hide();
$(".viewTeam2").hide();
$(".viewTeam3").hide();
$(".viewTeam4").hide();
$(".viewTeam5").hide();
$(".viewTeam6").hide();

//View Team Player Averages
$(".checkTeam1").click(function(){
	$(".viewTeam1").toggle();
});

$(".checkTeam2").click(function(){
	$(".viewTeam2").toggle();
});

$(".checkTeam3").click(function(){
	$(".viewTeam3").toggle();
});

$(".checkTeam4").click(function(){
	$(".viewTeam4").toggle();
});

$(".checkTeam5").click(function(){
	$(".viewTeam5").toggle();
});

$(".checkTeam6").click(function(){
	$(".viewTeam6").toggle();
});

//Show Game Box Scores on Scores Page when clicked
$("#checkGame1").click(function(){
	$("#viewGame1").toggle();
});

$("#checkGame2").click(function(){
	$("#viewGame2").toggle();
});

$("#checkGame3").click(function(){
	$("#viewGame3").toggle();
});


//Show League Leaders list items on click of each list item top row on home page
$(".checkRebounds").click(function(){
	$(".viewRebounds").toggle();
});

$(".checkAssists").click(function(){
	$(".viewAssists").toggle();
});

$(".checkBlocks").click(function(){
	$(".viewBlocks").toggle();
});

$(".checkSteals").click(function(){
	$(".viewSteals").toggle();
});

$(".checkThrees").click(function(){
	$(".viewThrees").toggle();
});

$(".checkBoxG1").click(function(){
	$(".viewBoxG1").toggle();
});

$(".checkBoxG2").click(function(){
	$("#viewBoxG2").toggle();
});

$(".checkBoxG3").click(function(){
	$("#viewBoxG3").toggle();
});

//stats tabbed panel
$(document).ready(function(){
	$('.tabx .tab1').show().siblings().hide();	
	$('.tabx-menu a').on('click', function(){
		var tabValue = '.tabx .' + ($(this).data('tabx'));
		$(tabValue).fadeIn(1000).show().siblings().hide();
	});
});
