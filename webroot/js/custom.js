jQuery(function ($) {
    $('.alert-custom-msg-block').animate({opacity: 1.0}, 5000).fadeOut();

    try {
        ace.settings.loadState('main-container')
    } catch (e) {
    }

    try {
        ace.settings.loadState('sidebar')
    } catch (e) {
    }

    $('#makeAdmin').on('click', function (e)
    {
        e.preventDefault();
        var id = $(this).attr('value');

        bootbox.confirm("Are you sure?", function (result) {
            if (result) {
                $.ajax({
                    beforeSend: function (xhr) {
                        $('#loading_text').show();
                    },
                    complete: function (jqXHR, textStatus) {
                        $('#loading_text').hide();
                    },
                    url: BASEURL + 'users/makeAdmin/' + id,
                    success: function (data, textStatus, jqXHR)
                    {
                        location.reload();
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {

                    }
                });
            }
        });
    });

    $('.upload_file').ace_file_input({
        no_file: 'No File ...',
        btn_choose: 'Choose',
        btn_change: 'Change',
        droppable: false,
        onchange: null,
        thumbnail: false //| true | large
                //whitelist:'gif|png|jpg|jpeg'
                //blacklist:'exe|php'
                //onchange:''
                //
    });

    $('.spin-box-bid').ace_spinner({value: 0, min: 0, max: 90000, btn_up_class: 'btn-info', btn_down_class: 'btn-info'});

});


