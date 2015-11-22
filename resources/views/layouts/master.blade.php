
<html>
    <head>
	<link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">
    <script src="{{ asset('/js/jquery.js') }}" type="text/javascript" charset="utf-8"></script>
    <script src="{{asset('/js/bootstrap.js') }}" type="text/javascript" charset="utf-8"></script>
	 <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
	 <script>
	 var maxHeight = 400;

$(function(){

    $(".dropdown > li").hover(function() {
    
         var $container = $(this),
             $list = $container.find("ul"),
             $anchor = $container.find("a"),
             height = $list.height() * 1.1,       // make sure there is enough room at the bottom
             multiplier = height / maxHeight;     // needs to move faster if list is taller
        
        // need to save height here so it can revert on mouseout            
        $container.data("origHeight", $container.height());
        
        // so it can retain it's rollover color all the while the dropdown is open
        $anchor.addClass("hover");
        
        // make sure dropdown appears directly below parent list item    
        $list
            .show()
            .css({
                paddingTop: $container.data("origHeight")
            });
        
        // don't do any animation if list shorter than max
        if (multiplier > 1) {
            $container
                .css({
                    height: maxHeight,
                    overflow: "hidden"
                })
                .mousemove(function(e) {
                    var offset = $container.offset();
                    var relativeY = ((e.pageY - offset.top) * multiplier) - ($container.data("origHeight") * multiplier);
                    if (relativeY > $container.data("origHeight")) {
                        $list.css("top", -relativeY + $container.data("origHeight"));
                    };
                });
        }
        
    }, function() {
    
        var $el = $(this);
        
        // put things back to normal
        $el
            .height($(this).data("origHeight"))
            .find("ul")
            .css({ top: 0 })
            .hide()
            .end()
            .find("a")
            .removeClass("hover");
    
    });  
    
});


</script>
        <title>@yield('title')</title>
		
    </head>
    <body>
        <div class="header1">
			@if (Auth::check())
			
				<span >Здравствуйте, {!!Auth::user()->email!!}</span>
			<span> <a href="/auth/logout">Выход</a></span>
			@endif
			@unless (Auth::check())
				<span ><a href="/auth/login">Вход</a></span>
			<span> <a href="/auth/register">Регистрация</a></span>
			
			@endunless
		</div>
		
			
		<div class ="header2">
		<div class="head1">
			<img src="/img/sait1.jpg" alt="Sait1"></img>
		</div>
		<div class="head2">
			<img src="/img/Phone.jpg" alt="Sait2"></img>
		</div>
		<div class="head3">
			<img src="/img/Korz.png" alt="Sait3"></img>
		</div>
		</div>
		<div class="nav">




<ul class="dropdown">
        	<li ><a href="/">Главная</a>
        	
        	</li>
        	<li class="drop"><a href="#">Техника для дома</a>
        		<ul class="sub_menu">
        			<li><a href="#">Телефоны</a></li>
					<li><a href="#">Планшеты</a></li>
					<li><a href="#">Компьютеры</a></li>
					<li><a href="#">Видео</a></li>
					<li><a href="#">Аудио</a></li>
						
							
        		</ul>
        	</li>
        	<li class="drop"><a href="#">Техника для офиса</a>
        		<ul class="sub_menu">
        			<li><a href="#">Принтеры</a></li>
					<li><a href="#">Сканеры</a></li>
					<li><a href="#">Сетевое оборудование</a></li>
						
        		</ul>
        	</li>
        	<li><a href="#">Прочие</a>
        	</li>
        </ul>

		</div>
        <div class="contain">

			<h4>@yield('title')</h4>
			<hr>
            @yield('content')
			@yield('content2')
			@yield('regok')
			@yield('welcome')
        </div>
		<div class="footer1">
	
		</div>
    </body>
</html>