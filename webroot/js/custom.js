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

    $('#stopAuction').on('click', function (e)
    {
        e.preventDefault();
        var id = $(this).attr('value');

        bootbox.confirm("Are you sure?", function (result) {
            if (result) {
                $.ajax({
                    type: 'POST',
                    beforeSend: function (xhr) {
                        $('#loading_text').show();
                    },
                    complete: function (jqXHR, textStatus) {
                        $('#loading_text').hide();
                    },
                    url: BASEURL + 'products/stopAuction/' + id,
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

    $('#startAuction').on('click', function (e)
    {
        e.preventDefault();
        var id = $(this).attr('value');

        bootbox.confirm("Are you sure?", function (result) {
            if (result) {
                $.ajax({
                    type: 'POST',
                    beforeSend: function (xhr) {
                        $('#loading_text').show();
                    },
                    complete: function (jqXHR, textStatus) {
                        $('#loading_text').hide();
                    },
                    url: BASEURL + 'products/startAuction/' + id,
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

    $('#addBookmark').on('click', function (e)
    {
        e.preventDefault();
        var id = $(this).attr('value');

        $.ajax({
            beforeSend: function (xhr) {
                $('#loading_text').show();
            },
            complete: function (jqXHR, textStatus) {
                $('#loading_text').hide();
            },
            url: BASEURL + 'bookmarks/add/' + id,
            success: function (data, textStatus, jqXHR)
            {
                location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {

            }
        });
    });

});


