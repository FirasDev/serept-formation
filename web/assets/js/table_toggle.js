(function () {
    $('#main').find('table .toggle input[type="checkbox"]').change(function () {
        var toggle = $(this);
        var newValue = toggle.prop('checked');
        var oldValue = !newValue;

        var columnIndex = $(this).closest('td').index() + 1;
        var propertyName = $('table th.toggle:nth-child(' + columnIndex + ')').data('property-name');

        var toggleUrl = "/admin/management/?action=edit&entity=User&view=list"
            + "&id=" + $(this).closest('tr').data('id')
            + "&property=" + propertyName
            + "&newValue=" + newValue.toString();

        var toggleRequest = $.ajax({type: "GET", url: toggleUrl, data: {}});

        toggleRequest.done(function (result) {
        });

        toggleRequest.fail(function () {
            // in case of error, restore the original value and disable the toggle
            toggle.bootstrapToggle(oldValue == true ? 'on' : 'off');
            toggle.bootstrapToggle('disable');
        });
    });

    $('.action-delete').on('click', function (e) {
        e.preventDefault();
        var id = $(this).parents('tr').first().data('id');

        $('#modal-delete').modal({backdrop: true, keyboard: true})
            .off('click', '#modal-delete-button')
            .on('click', '#modal-delete-button', function () {
                var deleteForm = $('#delete-form');
                deleteForm.attr('action', deleteForm.attr('action').replace('__id__', id));
                deleteForm.trigger('submit');
            });
    });
});