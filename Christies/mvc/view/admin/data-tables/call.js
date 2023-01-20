
    let table = sessionStorage.getItem('table');

    $.ajax({
        url: "../../../mvc/view/admin/data-tables/getColumns.php",
        type: "POST",
        dataType: 'json',
        data: {
            'table': table.toLowerCase().trim().slice(0, table.length - 1),
        },
        async: true
    }).done((response) => {
        let arrColumns = [];
        for (let i = 0; i < response.columns.length; i++) {
            let element = response.columns[i];
            arrColumns.push(element.data);
        }
        $(document).ready(async  function () {
            $('#' + table).DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '../../../mvc/view/admin/data-tables/call.php',
                    data: {
                        'table': table.toLowerCase().trim().slice(0, table.length - 1),
                        'primaryKey': response.columns[0].data,
                        'columnsjs': arrColumns
                    },
                    type: 'POST',

                },
                columns: response.columns,
            })
        }).ajaxComplete(() => {
            $('.theId').hide();
            $('td:contains("0.00000000000000000000")').html('Not set');
        });
    });


function llamar(a){
    let id = a.parentElement.parentElement.firstChild.innerText;
    a.href = window.location.href+'/'+id;
}

function deleteCol(input) {
    let id = input.parentElement.parentElement.firstChild.innerText;

    $.ajax({
        method: "POST",
        url: window.location.href+'/'+id+'/delete',
    }).done(() =>{
        window.location.reload();
    })
}

function addRow() {
    document.getElementById('addingRow').href = window.location.href + '/add';
}
