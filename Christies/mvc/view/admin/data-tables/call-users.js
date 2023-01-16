let table = $('.card-title').text();

$.ajax({
    url: "../../../mvc/view/admin/data-tables/getColumns.php",
    type: "POST",
    dataType: 'json',
    data: {
        'table': table.toLowerCase().trim().slice(0, table.length - 1),
    },
    async: true
}).done((response) => {
    let stringdefault = JSON.stringify( {data: null,
        className: "dt-center fas fa-eraser",
        defaultContent: '<i></i>',
        orderable: false
    })
    let receivedString = JSON.stringify(response);
    let remocveKey = receivedString.substring(0,receivedString.indexOf(']'));
    let lastJson =  remocveKey+','+stringdefault+']}';

    $(document).ready(function () {
        $('#user').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '../../../mvc/view/admin/data-tables/call-users.php',
                type: 'POST',
            },
            columns: JSON.parse(lastJson).columns
        });

        function updateDB() {
            let input = event.target;

        }

        $('input').blur(function () {
            updateDB();
        })
    });
});

// columns: [
//     {
//         data: 'id_user'
//     },
//     {
//         data: 'email'
//     },
//     {
//         data: 'password'
//     },
//     {
//         data: 'rol'
//     },
//     {
//         data: 'tokens'
//     },
//     {
//         data: 'telf',
//         render: function (data, type, row) {
//             return '<input type="text" name="telf" value=' + data.replace(/\s/g, '&nbsp;') + '>';
//         }
//     },
//     {
//         data: null,
//         className: "dt-center fas fa-eraser",
//         defaultContent: '<i></i>',
//         orderable: false
//     }
// ],