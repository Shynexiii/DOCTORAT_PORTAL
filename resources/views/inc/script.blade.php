<script>
    $(document).ready(function(){
        $('#studentsTable').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax:{
                url: "{{ route('students.index') }}",
                
            },columnDefs: [
                @cannot('admin')
                { visible: false, targets : [5] },
                @endcannot
            ],
            columns: [
                {
                    data: 'register_number',
                    name: 'register_number',
                },
                {
                    data: 'last_name_fr',
                    name: 'last_name_fr',
                },
                {
                    data: 'first_name_fr',
                    name: 'first_name_fr',
                },
                {
                    data: 'speciality_requested_fr',
                    name: 'speciality_requested_fr',
                },
                {
                    data: 'secrete_code',
                    name: 'secrete_code',
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                },
            ],
        });
        
    });
    

    $(document).ready(function(){
        $('#rolesTable').DataTable({
            processing: true,
            serverSide: true,
            ajax:{
                url: "{{ route('roles.index') }}",
            },
            columns: [
                {
                    data: 'id',
                    name: 'id',
                },
                {
                    data: 'name',
                    name: 'name',
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                }
            ]
        });

        $('#createRoleBtn').click(function(){
            $('.modal-title').text('Add role');
            $('#action_button').val('Add');
            $('#action').val('Add');
            $('#form_result').html('');
            $('#formRoleModal').modal('show');
        });

        $('#createRoleForm').on('submit', function(event){
            event.preventDefault();
            var action_url = '';
            var method = "";
            id = $(this).attr('id');
            
            if ($('#action').val() == 'Add') {
                method = "POST";
                action_url = "{{ route('roles.store') }}";
            }

            if ($('#action').val() == 'Edit') {
                method = "PATCH";
                action_url = "roles/"+id;
            }

            $.ajax({
                url: action_url,
                method: method,
                data: $(this).serialize(),
                dataType: "json",
                success: function(data){
                    var html = '';
                    if(data.errors){
                        html = '<div class="alert alert-danger">';
                        for (var count = 0; count < data.errors.length; count++) {
                            html += '<span>' + data.errors[count] + '</span>';   
                        }
                        html += '</div>';
                    }
                    if(data.success){
                        html =' <div class="alert alert-success">' + data.success + '</div>';
                        $('#createRoleForm')[0].reset();
                        $('#rolesTable').DataTable().ajax.reload();
                    }
                    $('#form_result').html(html);
                }
            });
        });

        $(document).on('click', '.edit', function () {
            id = $(this).attr('id');
            note
            $.ajax({
                url: "roles/" + id + "/edit",
                dataType: "json",
                success:function(data){
                    $('#name').val(data.result.name);
                    $('#hidden_id').val(id);
                    $('.modal-title').text('Edit role');
                    $('#action_button').val('Edit')
                    $('#action').val('Edit');
                    $('#formRoleModal').modal('show');

                }
            });
        });

        $(document).on('click', '.delete', function(){
            id = $(this).attr('id');
            $('#confirmationModal').modal('show');
        });

        $('#deleteBtn').click(function(){
            $.ajax({
                url: "roles/"+id,
                method: "DELETE",
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                beforeSend:function(){
                    $('deleteBtn').text('Deleting...');
                },
                success:function(data){
                    setTimeout(() => {
                        $('#confirmationModal').modal('hide');
                        $('#rolesTable').DataTable().ajax.reload();
                        alert('Data deleted');
                    }, 2000);
                }
            });
        });
        
    });
/* -----------------------Note ----------------------*/
 

$(document).ready(function(){
    $('#notesTable').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax:{
            url: "{{ route('notes.index') }}",
            dataType: "json",
        },
        createdRow: function( row, data, dataIndex, cells ) {
            if (data.module_1_status == 1 ) {
                $(cells[3]).css("background-color", "#ff0000");
            }else{
                $(cells[3]).css("background-color", "");
            }
            
            /* if (data.note_final_module_1 > 0){
                $(cells[3]).css("background-color", "");
            } */

            if (data.module_2_status == 1 && data.module_2_note_3 == 0) {
                $(cells[7]).css("background-color", "#ff0000");
            }else{
                $(cells[7]).css("background-color", "");
            }
             
        },
        columnDefs : [
            { className: "note_1", targets:  [3] },
            { className: "note_2", targets:  [7] },
            
            
        ],
        columns: [
            {
                data: 'secrete_code',
                name: 'secrete_code',
            },
            {
                data: 'module_1_note_1',
                name: 'module_1_note_1',
            },
            {
                data: 'module_1_note_2',
                name: 'module_1_note_2',
            },
            {
                data: 'module_1_note_3',
                name: 'module_1_note_3',
            },
            {
                data: 'note_final_module_1',
                name: 'note_final_module_1',
            },
            {
                data: 'module_2_note_1',
                name: 'module_2_note_1',
            },
            {
                data: 'module_2_note_2',
                name: 'module_2_note_2',
            },
            {
                data: 'module_2_note_3',
                name: 'module_2_note_3',
            },
            {
                data: 'note_final_module_2',
                name: 'note_final_module_2',
            },
            {
                data: 'moyenne_doctorat',
                name: 'moyenne_doctorat',
            },
            
            {
                data: 'action',
                name: 'action',
                orderable: false,
            },
            
        ],
        
        
    });
    
       

    $(document).on('click', '.editNote', function () {
            var id = $(this).attr('id');

            $.ajax({
                url: "notes/" + id + "/edit",
                dataType: "json",
                success:function(data){
                    $('#module_1_note_1').val(data.result.module_1_note_1);
                    $('#module_1_note_2').val(data.result.module_1_note_2);
                    $('#module_1_note_3').val(data.result.module_1_note_3);
                    $('#module_2_note_1').val(data.result.module_2_note_1);
                    $('#module_2_note_2').val(data.result.module_2_note_2);
                    $('#module_2_note_3').val(data.result.module_2_note_3);
                    $('#hidden_id').val(id);
                    $('#form_result').html('');
                    $('#action').val('Edit');
                    
                    if(data.result.module_1_status == 0){
                        $("#module_1_note_3").attr('readonly', 'readonly');
                        //$("#module_1_note_3").val(0);
                    }else{
                        $("#module_1_note_3").removeAttr('readonly');
                        //$("#module_1_note_3").val(0);
                    }
                    if(data.result.module_2_status == 0){
                        $("#module_2_note_3").attr('readonly', 'readonly');
                        //$("#module_1_note_3").val(0);
                    }else{
                        $("#module_2_note_3").removeAttr('readonly');
                        //$("#module_2_note_3").val(0);
                    }
                    $('#formNoteModal').modal('show');

                }
        });
    });

    $('#noteForm').on('submit', function(event){
            event.preventDefault();
            var action_url = '';
            var method = "";
            var id = $(this).attr('id');
            
            if ($('#action').val() == 'Edit') {
                method = "PATCH";
                action_url = "notes/"+id;
            }

            $.ajax({
                url: action_url,
                method: method,
                data: $(this).serialize(),
                dataType: "json",
                success: function(data){
                    var html = '';
                    if(data.errors){
                        html = '<div class="alert alert-danger">';
                        for (var count = 0; count < data.errors.length; count++) {
                            html += '<span>' + data.errors[count] + '</span>';   
                        }
                        html += '</div>';
                    }
                    if(data.success){
                        html =' <div class="alert alert-success">' + data.success + '</div>';
                        $('#noteForm')[0].reset();
                        $('#notesTable').DataTable().ajax.reload();
                        $('#formNoteModal').modal('hide');
                    }
                    $('#form_result').html(html);
                    
                }
            });
        });

});
/* Teacher section */
$(document).ready(function(){
    $('#teachersTable').DataTable({
        responsive: true,
        "columnDefs": [
            { "searchable": false, "targets": 4 },
            { "searchable": false, "targets": 5 },
            { "orderable": false, "targets": 5 },
        ],
    });
    
});

$(document).ready(function(){
    $('#usersTable').DataTable({
        responsive: true,
        "columnDefs": [
            { "searchable": false, "targets": 5 },
            { "orderable": false, "targets": 5 },
        ],
    });
    
});

$(document).ready(function(){
    $('#studentsListTable').DataTable({
        responsive: true,
        "order": [[ 7, 'asc' ]],
    });
    
});

$(document).ready(function(){
    $('#specialitiesTable').DataTable({
        responsive: true,
        "columnDefs": [
            { "searchable": false, "targets": 2 },
            { "orderable": false, "targets": 2 },
        ],
    });
    
});



</script>