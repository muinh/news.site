$(document).ready(function() {
    //maintain slider
    $('.carousel').carousel();


    //maintain pagination
    var pagination = $('.pagination').find('li').css('display', 'none');
    var first = pagination.first().css('display', 'block');
    var last = pagination.last().css('display', 'block');
    first.append('<span class="show-more">...</span>');
    $('.show-more').click(function() {
        $(this).fadeOut('slow', function() {
            pagination.fadeIn('slow');
        });
    });

    //generate reading users and add to total readers
    var nowReading = $('.now-reading');
    var totalReaders = $('.total-readers');
    var totalReadersNum = parseInt(totalReaders.html());
    setInterval(function() {
        var randomReaders = Math.floor(Math.random() * (6 - 0) + 0);
        nowReading.html(randomReaders);
        totalReadersNum += parseInt(nowReading.html());
        totalReaders.html(totalReadersNum);
    }, 3000);

    //reduce item price by 10%, get new styling, show pop-up
    $(".ad-container").mouseenter(function () {
        var price = $(this).find('.ad-price').html();
        var discountPrice = (price / 1.10).toFixed(2);

        $(this).find('.ad-price')
            .html(discountPrice)
            .css({'font-size':'1.2em', 'color':'red'});

        $(this).find('.pop-up').fadeIn('slow');
    });

    //increase item price by 10%, get styling back, hide pop-up
    $(".ad-container").mouseleave(function() {
        var price = $(this).find('.ad-price').html();
        var discountPrice = Math.round(price * 1.10);

        $(this).find('.ad-price')
            .html(discountPrice)
            .css({'font-size':'1em', 'color':'#000'});

        $(this).find('.pop-up').fadeOut('slow');
    });

    // //ask if you are sure to exit the page
    // window.onbeforeunload = function(){
    //     return "Are you sure you want to close the window?";
    // };
    //
    // //display pop-up after 15 seconds on the website
    // $("#setCookie").click(function () {
    //     $.cookie("popup", "24house", {expires: 0} );
    //     $("#bg_popup").hide();
    // });
    //
    // if ( $.cookie("popup") == null )
    // {
    //     setTimeout(function(){
    //         $("#bg_popup").show();
    //     }, 15000)
    // }
    // else {
    //     $("#bg_popup").hide();
    // }

    //hide edit button for comment in a minute after posting
    setTimeout(function(){
        $('.comment-edit').remove();
    }, 60000);

    //replaces paragraph with input to edit the comment
    $('.comment-edit').click(function() {
        var wrapper = $(this).parent().siblings('.comment-wrapper');
        var text = wrapper.find('.comment-text').html();
        var editform = $(this).parent().siblings('.edit-form');
        var textarea = editform.find('.edit-window');
        editform.css('display', 'block');
        textarea.html(text);
    });

    //
    $('.comment-answer').click(function() {
        var form = $(this).siblings('.comment-answer-block')
            .find('.answer-comment-form').css('display', 'block');
    });

    //add rate to the comment post
    $('.comment-like').click(function() {
        var id = $(this).parent().parent().data();
        var rate = $(this).siblings('.comment-value');
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type: "POST",
            url: '/news.site/index.php/comments/like/',
            data: {id: id.comment},
            success: function(data) {
                rate.html(data);
            }
        });
    });

    //substract rate from the comment post
    $('.comment-dislike').click(function() {
        var id = $(this).parent().parent().data();
        var rate = $(this).siblings('.comment-value');
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type: "POST",
            url: '/news.site/index.php/comments/dislike/',
            data: {id: id.comment},
            success: function(data) {
                rate.html(data);
            }
        });
    });

});