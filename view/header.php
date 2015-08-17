<!DOCTYPE html>

<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="CSS/reset.css"/>
		<link rel="stylesheet" href="CSS/stylesheet.css" type="text/css" media="screen"/>
		<link rel="stylesheet" href="_js/fancybox/source/jquery.fancybox.css" type="text/css" media="screen" />
		<title>Bamboo Selector</title>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="_js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="_js/fancybox/source/jquery.fancybox.pack.js"></script>

		<script>
			$(document).ready(function(e) { 
				$('.tooltip').hide();
			  $('.trigger').mouseover(function () {
			    var ttLeft,
			        ttRight,
			        $this=$(this),
			        $tip = $($this.attr('data-tooltip')),
			        triggerPos = $this.offset(),
			        triggerH = $this.outerHeight(),
			        triggerW = $this.outerWidth(),
			        tipW = $tip.outerWidth(),
			        tipH = $tip.outerHeight(),
			        screenW = $(window).width(),
			        scrollTop = $(document).scrollTop();
			      if (triggerPos.top - tipH - scrollTop > 0 ) {
			        ttTop = triggerPos.top - tipH - 10;
			      } else {
			          ttTop = triggerPos.top + triggerH + 10;
			      }
			      var overFlowRight = (triggerPos.left + tipW) - screenW;
			      if (overFlowRight > 0) {
			        ttLeft = triggerPos.left - overFlowRight - 10;
			      } else {
			          ttLeft = triggerPos.left;
			      }
			      $tip.css({
			        left : ttLeft,
			        top : ttTop,
			        position : 'absolute'
			      }).fadeIn(200);
			  });// end mouseover
			  $('.trigger').mouseout(function () {
			    $('.tooltip').fadeOut(200);
			  });// end mouseout
			}); // end ready
		</script>
		<script>
		$(document).ready(function() {
			$('a.iframe').fancybox({
				width : '90%',
				height : '90%',
				titlePosition: 'outside',
				'type': 'iframe'
			});
		}); // end ready
		</script>
		<script>//tabbed panels
		$(document).ready(function() {
		  $('.tabs a').click(function() {
		      // save $(this) in a variable for efficiency
		      var $this = $(this);
		      
		      // hide panels
		      $('.tabspanel').hide();
		      $('.tabs a.active').removeClass('active');
		          
		      // add active state to new tab
		      $this.addClass('active').blur();  
		      // retrieve href from link (is id of panel to display)
		      var panel = $this.attr('href');
		      // show panel
		      $(panel).fadeIn(250);
		      
		      // don't follow link down page
		      return(false);
		    }); // end click
		     
		    // open first tab
		    $('.tabs li:first a').click();
		}); // end ready
		</script>
	</head>

	<body>
		<div id="container">

			<div id="header">
				<h1><a href="index.php">Bamboo Selector</a></h1>
			</div>

			<div class="tabbedPanels">
	      <ul class="tabs">
	        <li><a href="#panel1" tabindex="1">Reminder</a></li>
	        <li><a href="#panel2" tabindex="2">Directions</a></li>
	      </ul>
	      <div class="panelContainer">
	        <div id="panel1" class="tabspanel">
	        <h1>Reminder</h1>
	        <p>USDA zone, light level, and heights are generalizations. Each climate will bring out
						different variables for each species. Please contact Bamboo Garden at 503-647-2700,
						or email us at <a href="mailto:bamboo@bamboogarden.com">bamboo@bamboogarden.com</a> 
						for any questions or concerns before placing an order.
					</p>
	        </div><!--end pannel1-->
	        <div id="panel2" class="tabspanel">
	        <h1>Directions</h1>
	        <ol id="directions">
					<li>Pick a minimum and maximum height for the bamboo you would like to plant. It is best
						to use an extra few feet for the maximum height and a few feet shorter for your minumum
						height for better search results.
					</li>
					<li>Select the light level for the area you will be planting the bamboo in. One equals full shade,
						five equals full sun.
					</li>
					<li>Choose the USDA zone for your location. If you do not know your USDA zone click
					 <a href="http://planthardiness.ars.usda.gov/PHZMWeb/Default.aspx" class="iframe" title="USDA Agricultural Research Service">here</a> 
					 to find out.
					</li>
					<li>The final step is to choose if you woud like a running type or a clumping type bamboo.
					</li>
					<br>
					</ol>
					<p>Go through this process for each area you would like to plant bamboo.
					</p>
	        </div><!--end pannel2-->
	      </div><!--end pannelContainer-->
    	</div><!--end tabbedPanel

			<div id="content">