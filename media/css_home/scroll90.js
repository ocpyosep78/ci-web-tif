// JavaScript Document
// click tracking
// record the click
function clickTrack(c) {
	var fullPath = "/click/" + c;
	//alert (fullPath);
	_gaq.push(
	['defaultTracker._setAccount', 'UA-341735-1'],
	['defaultTracker._trackPageview',fullPath]);
}
//blade
$('.blade a').click(function() {
	var c = "blade/" + $(this).text();
	clickTrack(c);
});

$('.masthead ul li a').click(function() {
	var c = "Audience/" + $(this).text();
	clickTrack(c);
});

$('.main-nav a').click(function() {
	var c = "MainNav/" + $(this).text();
	clickTrack(c);
});

$('.feature a').click(function() {
	var c = "Feature/" + $(this).attr("href");
	clickTrack(c);
});

$('a .next').click(function() {
	alert('Feature Next');
});

$('a .prev').click(function() {
	alert('Feature Previous');
});

$('#why-ualberta a').click(function() {
	var whyText = $(this).text();
	if (whyText.length > 1) {
		var whyClick = $(this).text();
	} else {
		var whyClick = $(this).attr("href");
	}
	var c = "WhyUAlberta/" + whyClick;
	clickTrack(c);
});

$('#news a').click(function() {
	var c = "News/" + $(this).text();
	clickTrack(c);
});

$('#campus-notices a').click(function() {
	var c = "Notices/" + $(this).text();
	clickTrack(c);
});

$('#colloquy-blog a').click(function() {
	var c = "Blog/" + $(this).text();
	clickTrack(c);
});

$('#keep-in-touch a').click(function() {
	var c = "KeepInTouch/" + $(this).attr("href");
	clickTrack(c);
});

$('#explore a').click(function() {
	var c = "Explore/" + $(this).text();
	clickTrack(c);
});

$('footer a').click(function() {
	var c = "Footer/" + $(this).text();
	clickTrack(c);
});

//scroll tracking
var IsDuplicateScrollEvent = 0;
 
        $(document).ready(function () {
            SetupGoogleAnalyticsTrackEvents();
        });
 
        function SetupGoogleAnalyticsTrackEvents()
        {
            TrackEventsForMinimumPageScroll();
        }
 
        function TrackEventsForMinimumPageScroll()
        {
           $(window).scroll(function(){
             var scrollPercent = GetScrollPercent();
            
             if(scrollPercent > 90)
             {
               if(IsDuplicateScrollEvent == 0)
               { 
                 IsDuplicateScrollEvent = 1;
                //alert("Page Scrolled to 90% in " + document.location.href);
                 TrackEvent("Content Engagement", "Scrolled To 90%", document.location.href);
               }
             }
           }); 
        }
 
        function GetScrollPercent()
        {
             var bottom = $(window).height() + $(window).scrollTop();
             var height = $(document).height();
 
             return Math.round(100*bottom/height);
        }
                                 
        function TrackEvent(Category, Action, Label)
        {
           _gaq.push(
			['defaultTracker._setAccount', 'UA-341735-1'],
			['defaultTracker._trackEvent','Content','Scroll','UAlberta.ca 90%']
			);
        }     