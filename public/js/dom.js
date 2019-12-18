//Website();

$('nav').fadeOut(0, function() {});
$('#pageElleMeme').fadeOut(0, function() {});
$('footer').fadeOut(0, function() {});
setTimeout(function() {
    $('#preloader').fadeOut(0, function() {
        $('nav').fadeIn(1000, function() {});
        setTimeout(function() {
            $('#pageElleMeme').fadeIn(1000, function() {});
            $('footer').fadeIn(1000, function() {});
        }, 1000);
    });
}, 1000);
Typewriting();

function Typewriting() {
    $(document).ready(function() {
        setTimeout(function() {
            $(".typewrite span").typed({
                strings: ["SURETE ", "SATISFACTION ", "CONFIANCE ", "GARANTIE ", "SURETE ", "SATISFACTION ", "CONFIANCE ", "GARANTIE ", "SURETE ", "SATISFACTION ", "CONFIANCE ", "GARANTIE ", "SURETE ", "SATISFACTION ", "CONFIANCE ", "GARANTIE ", "SURETE ", "SATISFACTION ", "CONFIANCE ", "GARANTIE ", "SURETE ", "SATISFACTION ", "CONFIANCE ", "GARANTIE ", "SURETE ", "SATISFACTION ", "CONFIANCE ", "GARANTIE ", "SURETE ", "SATISFACTION ", "CONFIANCE ", "GARANTIE ", "SURETE ", "SATISFACTION ", "CONFIANCE ", "GARANTIE ", ],
                typeSpeed: 100,
                backDelay: 500,
                loop: false,
                contentType: 'html', // or text
                // defaults to false for infinite loop
                loopCount: false,
            });
        }, 3700);
    });
}