// Tabla de marcas
if ( $('#brands-table').length ) {

    $('#brands-table').DataTable({
        'language': {
            'url': '//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json'
        },
        'autoWidth': false,
        'aaSorting': [[0,'asc']],
        'columnDefs': [
            {
                'orderable': false,
                'targets': [-1, -2, -3]
            },
            {
                'width': '30px',
                'targets': [-1, -2, -3]
            }
        ]
    });
}

// Tabla de modelos
if ( $('#models-table').length ) {

    $('#models-table').DataTable({
        'language': {
            'url': '//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json'
        },
        'autoWidth': false,
        'aaSorting': [],
        'columnDefs': [
            {
                'orderable': false,
                'targets': [-1, -2]
            },
            {
                'width': '30px',
                'targets': [-1, -2]
            }
        ]
    });
}

// Tabla de versiones
if ( $('#versions-table').length ) {

    $('#versions-table').DataTable({
        'language': {
            'url': '//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json'
        },
        'autoWidth': false,
        'aaSorting': [],
        'columnDefs': [
            {
                'orderable': false,
                'targets': [-1, -2]
            },
            {
                'width': '30px',
                'targets': [-1, -2]
            }
        ]
    });
}

$('#brand-ajax').change(function() {
    var brandId = $(this).val();
    $.post('getModels.php', { id_brand: brandId }, function(data) {
        $("#model").html(data);
        $('#cancelAddModel').trigger('click');
    });
});

$('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
});

$('#addModel').on('click', function() {
    $('#modelBlock').hide();
    $('#addModelBlock').show().find('input').prop('required',true);
    $('.addNewBrandInput').val('si');
});

$('#cancelAddModel').on('click', function() {
    $('#addModelBlock').hide().find('input').prop('required',false).val('');
    $('#modelBlock').show();
    $('.addNewBrandInput').val('no');
});

