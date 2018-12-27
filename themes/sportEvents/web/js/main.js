$(document).ready(function () {
    var pathname = window.location.pathname;
    $('.listItem').each(function () {
       if (pathname != $(this).find('.listItemLink').attr('href')) {
           $(this).removeClass('active');
       } else {
           $(this).addClass('active');
       }

    });

    $('.filter-clear').on('click', function (e) {
        $('.filter-item').each(function () {
            $(this).find('input').val('');
        });
        window.location = '/';
        e.preventDefault();
        e.stopPropagation();
    })
});