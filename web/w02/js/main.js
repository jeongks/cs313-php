$(document).ready(function(){
	//intro class effect
	var index;
	$('.family_list li').hover(function(){
		index = $(this).index();
		$('.intro img').eq(index).animate({
			opacity: 1
		},300)
	}, function(){
		$('.intro img').eq(index).animate({
			opacity: 0.2
		},300)
	});
	//history section effect
	var clickCount = 0;
	var oldpos = -1, curpos;
	$('.group').click(function(){
		curpos = $(this).index();
		if (clickCount == 0){
			oldpos = curpos;
			$(this).stop().animate({
				left: 50,
				top: 0,
				width: 1000,
				height: 300,
			},500,function(){
				$(this).children().animate({
					width:450,
					height:300
				},300);
			})
			var i  = $('.group').index();
			$('.group').filter(this).css({
				position: 'absolute',
				top: '+=50'
			});
			clickCount++;
		} else {
			$(this).stop().children().animate({
				width:0,
				height:0
			},300, function(){
				$(this).parent().animate({
					left: 0,
					top: 0,
					width: 50,
					height: 50
				},500)
			});
			var i  = $('.group').index();
			$('.group').filter(this).css({
				position: 'relative'
			});
			clickCount--;
		}
		
	});
});
