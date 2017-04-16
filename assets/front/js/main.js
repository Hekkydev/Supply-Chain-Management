(function($) {
    "use strict";

    $(function(){
        // Ratings
        $(".choices.ratings input").change(function() {

            $(".choices.ratings .star").removeClass('active');

            for(var i = 0; i < this.value; i++)
            {
                $(".choices.ratings .star_"+i).addClass('active');
            }

        });

        if($(".choices.ratings input:checked").val())
        {
            for(var i = 0; i < $(".choices.ratings input:checked").val(); i++)
            {
                $(".choices.ratings .star_"+i).addClass('active');
            }
        }

        // Dropdown fix for when it goes out of screen area
        $(".nav li.drop").hover(function(){
            if($(this).children('.dropdown').offset().left + $(this).children('.dropdown').outerWidth() > $(window).width()){
                 $(this).children('.dropdown').css('margin-left', ($(window).width()-($(this).children('.dropdown').offset().left + $(this).children('.dropdown').outerWidth())));
            }
        });

        // Smooth scroll
        $(document).ready(function($) {
            $(".smooth-scroll a").click(function(event){     
                event.preventDefault();
                $('.nav li').removeClass('active');
                $(this).parent('li').addClass('active');
                $('html,body').animate({scrollTop:$(this.hash).offset().top-($('#navbar').height()+50)}, 500);
            });
        });

        var pages = []; // [Page obj, link object, Page obj, link object]

        // Loop all pages and add page and link to array
        $('#navbar .nav li a').each(function(){
            if($(this).attr('href') != '#' && $(this).attr('href').substring(0, 1) == '#'){
                var page = $($(this).attr('href'));
                if(page.length){
                    pages.push($($(this).attr('href')));
                    pages.push($(this));
                }
            }
        });

        // Set active menu item on scroll
        var windscroll = 0;
        function onScroll(windscroll){

            if(windscroll >= 100){
                for(var i=0; i<pages.length; i+=2){
                    if(pages[i].offset().top-200 <= windscroll) {
                        $('#navbar .nav li.active').removeClass('active');
                        $(pages[i+1].parent('li')).addClass('active');
                    } 

                    // If bottom then activate last page
                    if(window.innerHeight+windscroll >= $(document).height()){
                        $('#navbar .nav li.active').removeClass('active');
                        $(pages[pages.length-1].parent('li')).addClass('active');
                    }
                }

            } else {

                $('#navbar .nav li.active').removeClass('active');
                $('#navbar .nav li:first').addClass('active');

            }

        }

        var timeoutId = null;
        addEventListener("scroll", function() {
            if (timeoutId) clearTimeout(timeoutId);
            timeoutId = setTimeout(onScroll, 100, window.pageYOffset || document.documentElement.scrollTop);
        }, true);

        // Dropdown functionality in mobile menu
        $('.nav li > a').click(function(){ // Loop through all the navigation links

            if($(this).parent('li').hasClass('drop')) // If we find a dropdown menu item then we process it
            {

                // Focus in and out of dropdowns in menu as necessary
                if($(this).parent('li').hasClass('focus')){
                    $(this).parent('li').removeClass('focus');
                } else
                {
                    $('.nav li.drop').removeClass('focus');
                    $(this).parent('li').addClass('focus');
                }

            } else
            {
                if(!$(this).parent('li').parent('ul').hasClass('dropdown')) $('.nav li.drop').removeClass('focus');
            }

        });

        /* You may delete this / START */
        $("body").append(
            '<!-- Settings / START -->' +
            '<a href="javascript: void(0);" id="settings-button">' +
            '    <i class="fa fa-cogs"></i>' +
            '</a>' +

            '<div id="settings">' +

            '   <h3 class="strong upper">Color</h3>' +

            '   <div class="colors">' +
            '       <a href="javascript: void(0);" id="color-orange"></a>' +
            '       <a href="javascript: void(0);" id="color-red"></a>' +
            '       <a href="javascript: void(0);" id="color-blue"></a>' +
            '       <a href="javascript: void(0);" id="color-green"></a>' +
            '       <a href="javascript: void(0);" id="color-yellow"></a>' +
            '       <a href="javascript: void(0);" id="color-light-blue"></a>' +

            '       <div class="clear"></div>' +
            '   </div>'+

            '    <h3 class="strong upper">Header</h3>' +

            '    <div class="options-header">' +
            '        <a id="header-static" class="btn btn-light">Static</a>' +
            '        <a id="header-fixed" class="btn btn-light pull-right">Fixed</a>' +
            '    </div>' +

            '</div>' +
            '<!-- Settings / END -->'
        );

        var css_path = '';
        $("head").find("link").attr("href", function (i, value) {
            if(value.split('/').pop() == 'main.css') css_path = value.replace(value.split('/').pop(), '');
        });

        $("#settings").css('right', -$(this).width());

        $('#settings-button').click(function(){

            if(!$(this).hasClass('active')){
                $("#settings").show();
                $("#settings-button").addClass('active');
                $("#settings").animate({"right":"0px"}, 500);

                $("#settings-button").animate({"right": $("#settings").outerWidth()}, 500);
            } else {
                $("#settings-button").removeClass('active');
                $("#settings-button").animate({"right": 0}, 500);
                $("#settings").animate({"right": -$("#settings").outerWidth()}, 500);
            }

        });

        $("#color-orange").click(function(){
            $('head').append('<link rel="stylesheet" href="'+css_path+'orange.css" type="text/css" />');    
        });

        $("#color-red").click(function(){
            $('head').append('<link rel="stylesheet" href="'+css_path+'red.css" type="text/css" />');
        });

        $("#color-yellow").click(function(){
            $('head').append('<link rel="stylesheet" href="'+css_path+'yellow.css" type="text/css" />');
        });

        $("#color-blue").click(function(){  
            $('head').append('<link rel="stylesheet" href="'+css_path+'blue.css" type="text/css" />');
        });

        $("#color-green").click(function(){
            $('head').append('<link rel="stylesheet" href="'+css_path+'green.css" type="text/css" />');
        });

        $("#color-light-blue").click(function(){
            $('head').append('<link rel="stylesheet" href="'+css_path+'light-blue.css" type="text/css" />');
        });

        $("#header-static").click(function(){
            $("head").find("link").attr("href", function (i, value) {
                if(value.split('/').pop() == 'navbar-fixed-top.css') $(this).remove();
            });
            $("nav.navbar").removeClass('navbar-fixed-top');
        });

        $("#header-fixed").click(function(){
            $('head').append('<link rel="stylesheet" href="'+css_path+'navbar-fixed-top.css" type="text/css" />');
            $("nav.navbar").addClass('navbar-fixed-top');

        });
        /* You may delete this / END */

    });

}(jQuery));