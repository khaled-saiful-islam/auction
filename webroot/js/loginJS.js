
jQuery(function ($) {
    $('.alert-custom-msg-block').animate({opacity: 1.0}, 5000).fadeOut();
    $(document).on('click', '.toolbar a[data-target]', function (e) {
        e.preventDefault();
        var target = $(this).data('target');
        $('.widget-box.visible').removeClass('visible');
        $(target).addClass('visible');
    });
});

jQuery(function ($) {
    $('#btn-login-dark').on('click', function (e) {
        $('body').attr('class', 'login-layout');
        $('#id-text2').attr('class', 'white');
        $('#id-company-text').attr('class', 'blue');

        e.preventDefault();
    });
    $('#btn-login-light').on('click', function (e) {
        $('body').attr('class', 'login-layout light-login');
        $('#id-text2').attr('class', 'grey');
        $('#id-company-text').attr('class', 'blue');

        e.preventDefault();
    });
    $('#btn-login-blur').on('click', function (e) {
        $('body').attr('class', 'login-layout blur-login');
        $('#id-text2').attr('class', 'white');
        $('#id-company-text').attr('class', 'light-blue');

        e.preventDefault();
    });

    $('#userType').on('change', function (e) {
        e.preventDefault();
        var type = $(this).val();

        if (type == 1) {
            bootbox.alert({
                message: '<h4 style="color: green;">You may not pay any fee for this account</h4>',
            });
        } else if (type == 2) {
            bootbox.alert({
                message: '<h4 style="color: red;">You have to pay 1000 BDT per year for this account</h4>',
            });
        } else if (type == 3) {
            bootbox.alert({
                message: '<h4 style="color: red;">You have to pay 2000 BDT per year for this account</h4>',
            });
        }
    });

    $("#addUser").submit(function (e)
    {
        var postData = $(this).serializeArray();
        $.ajax({
            beforeSend: function (xhr) {
                $('#loading_text').show();
            },
            complete: function (jqXHR, textStatus) {
                $('#loading_text').hide();
            },
            url: BASEURL + 'users/register',
            type: "POST",
            data: postData,
            success: function (data, textStatus, jqXHR)
            {
                bootbox.dialog({
                    message: data,
                    buttons: {
                        "OK": {
                            "label": "<i class='ace-icon fa fa-check'></i> OK",
                            "className": "btn-sm btn-success",
                            "callback": function () {
                                location.reload();
                            }
                        }
                    }
                }
                );
            },
            error: function (jqXHR, textStatus, errorThrown)
            {

            }
        });
        e.preventDefault();
    });

    $('.input-mask-phone').mask('(999) 99999999');
});