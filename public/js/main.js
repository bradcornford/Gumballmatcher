$('button[data-toggle]').click(function() {
    var item = $(this).attr('data-toggle');
    var state = ($(this).attr('data-toggle-state') == 'true');

    $(document).find('*[data-toggle-item="' + item + '"]').each(function () {
        $(this).prop('checked', state);
    });

    $(this).attr('data-toggle-state', !state)
});

$('button[data-display]').click(function() {
    var item = $(this).attr('data-display');
    var state = ($(this).attr('data-display-state') == 'true');

    $(document).find('*[data-display-item="' + item + '"]').each(function () {
        if (($(this).attr('data-display-item-state') == 'true')) {
            $(this).toggleClass('hidden');
        }
    });

    $(document).find('*[data-display-item="' + item + '"]').parent().parent().each(function () {
        var itemCount = 0;

        $(this).find('*[data-display-item="' + item + '"]').each(function () {
            if (!$(this).hasClass('hidden')) {
                itemCount++;
            }
        });

        if (itemCount === 0) {
            $(this).find('*[data-display-item-none]').removeClass('hidden');
        } else {
            $(this).find('*[data-display-item-none]').addClass('hidden');
        }
    });

    $(this).attr('data-display-state', !state)
});

$('select[data-query]').change(function() {
    var item = $(this).attr('data-query');
    var query = this.value;

    $(document).find('*[data-query-item="' + item + '"]').each(function () {
        $(this).find(item).parent().each(function () {
            var state = false

            $(this).find(item).each(function () {
                if (query === '') {
                    if ($(this).attr('data-query-item-value') == '') {
                        $(this).parent().parent().parent().addClass('hidden');
                        $(this).addClass('hidden');
                    } else {
                        $(this).parent().parent().parent().removeClass('hidden');
                        $(this).removeClass('hidden');
                    }
                } else {
                    if ($(this).attr('data-query-item-value').indexOf(':' + query + ':') == 0) {
                        $(this).parent().parent().parent().removeClass('hidden');
                        $(this).removeClass('hidden');
                        state = true;
                    } else {
                        if (!state) {
                            $(this).parent().parent().parent().addClass('hidden');
                        }

                        $(this).addClass('hidden');
                    }
                }
            });
        });
    });

    $(document).find('*[data-query-item="' + item + '"]').parent().parent().each(function () {
        var itemCount = 0;

        $(this).find('*[data-query-item="' + item + '"]').each(function () {
            if (!$(this).parent().hasClass('hidden')) {
                itemCount++;
            }
        });

        if (itemCount === 0) {
            $(this).find('*[data-display-item-none]').removeClass('hidden');
        } else {
            $(this).find('*[data-display-item-none]').addClass('hidden');
        }
    });
});

$('.table-row-toggle tr').click(function(event) {
    if (event.target.type !== 'checkbox') {
        $(':checkbox', this).trigger('click');
    }
});

$(function () {
    $('[data-toggle="tooltip"]').tooltip();
});