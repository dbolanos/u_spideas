$(document).ready(function () {
    $('#search_student').on('click', function () {
        data = {};
        console.log('Searching Customer...');
        data.student_id             = $('#student_id').val();
        data.identification_card    = $('#identification_card').val();
        data.first_surname          = $('#first_surname').val();

        console.log(data);

        searchStudent(data);
    });

    function searchStudent(data) {
        $.ajax({
            //Como se ejecuta un POST necesitamos el token de CSRF, (lo tomamos de un meta que esta en el blade)
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            // En data puedes utilizar un objeto JSON, un array o un query string
            data: data,
            //Cambiar a type: POST si necesario
            type: "POST",
            // Formato de datos que se espera en la respuesta
            dataType: "json",
            // URL a la que se enviará la solicitud Ajax
            url: "/admin/search-students",
            success: function (result) {
                console.log('Show Students');
                console.log(result);
                result_rows ='';
                if (result['students'].length !== 0 ) {
                    //console.log(result['customers']);
                    $('#student_table').css("display", "block");
                    $('#message_error').css("display", "none");
                    var student_table = $("#student_table tbody");
                    $.each(result['students'], function (key, student) {
                        row = '<tr>' +
                            '<td>'+ student['id'] +'</td>' +
                            '<td>'+ student['first_name'] +'</td>' +
                            '<td>'+ student['first_surname'] +'</td>' +
                            '<td>'+ student['second_surname'] +'</td>' +
                            '<td>'+ student['identification_card'] +'</td>' +
                            '<td> <button type="button" class="btn btn-success add_student" data-student_id="'+ student['id'] +'" data-full_name="'+ student['first_name'] +' '+ student['first_surname']+'" >Agregar</button></td>' +
                            '</tr>';
                        result_rows += row;
                    });
                    student_table.html(result_rows);
                }
                else{
                    $('#student_table').css("display", "none");
                    $('#message_error').css("display", "block");
                    $('#message').html('No se ha encontrado ningún estudiante con los filtros actuales');

                }
            },
            error: function( req, status, err ) {
                console.log('Request Fail...', status);
                $('#student_table').css("display", "none");
                $('#message_error').css("display", "block");
                $('#message').html('La petición ha fallado');

            }
        });

    }

    $(document).on('click', '.add_student', '', function () {
        console.log('agregando...');
        var id = $(this).data("student_id");
        var full_name = $(this).data("full_name");

        $('#full_name_student').val(full_name);
        $('#student_id_request').val(id);

    });


});
