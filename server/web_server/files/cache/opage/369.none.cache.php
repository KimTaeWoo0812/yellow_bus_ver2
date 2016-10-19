<?php if(!defined("__XE__"))exit;?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta charset='utf-8' />
<link href='/studlog/fullcalendar-2.4.0/demos/../fullcalendar.css' rel='stylesheet' />
<link href='/studlog/fullcalendar-2.4.0/demos/../fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='/studlog/fullcalendar-2.4.0/demos/../lib/moment.min.js'></script>
<script src='/studlog/fullcalendar-2.4.0/demos/../lib/jquery.min.js'></script>
<script src='/studlog/fullcalendar-2.4.0/demos/../fullcalendar.min.js'></script>
yellow_s7@mail.com
<script>
	
	$(document).ready(function() {
		
		$('#calendar').fullCalendar({
			defaultDate: new Date(),
			editable: false,
			eventLimit: true, // allow "more" link when too many events
			events: 
			[
				 				 			
					
			]
		});
		
	});
</script>
<style>
	body {
		margin: 0px 0px;
		padding: 0;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		font-size: 14px;
	}
	#calendar {
		max-width: 900px;
		margin: 0 auto;
	}
</style>
</head>
<body>
	<div id='calendar'></div>
	
	<table width=100% border=1>
		<tr align=center>
		<th>아이디</th><th>학원</th><th>내용</th><th>작성일자</th>	</table>
				
</body>
</html>
