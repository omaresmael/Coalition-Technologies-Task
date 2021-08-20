

    $(document).ready(function() {
        //Helper function to keep table row from collapsing when being sorted
        var fixHelperModified = function(e, tr) {
            var $originals = tr.children();
            var $helper = tr.clone();
            $helper.children().each(function(index)
            {
                $(this).width($originals.eq(index).width())
            });
            return $helper;
        };

        //Make diagnosis table sortable
        $("#diagnosis_list tbody").sortable({
            helper: fixHelperModified,
            stop: function(event,ui) {renumber_table('#diagnosis_list');
                var ids = [];
                var priorities = [];
                $('#diagnosis_list tbody tr td:nth-child(1)').each( function(){
                    //add item to array
                    ids.push( $(this).text() );
                });
                $('#diagnosis_list tbody tr td:nth-child(4)').each( function(){
                    //add item to array
                    priorities.push( $(this).text() );
                });


                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '/tasks/update_priorities',
                    type: 'post',
                    data: {ids:ids,priorities:priorities},
                    success: function(result) {
                        console.log('success');
                    }
                });
            },
        }).disableSelection();


        //Delete button in table rows
        $('table').on('click','.btn-delete',function() {
            tableID = '#' + $(this).closest('table').attr('id');
            r = confirm('Delete this item?');
            if(r) {
                $(this).closest('tr').remove();
                var taskId = $(this).closest('tr').find('td:first').text();

                renumber_table(tableID);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '/tasks/' + taskId,
                    type: 'delete',

                    success: function(result) {
                        location.reload();
                    }
                });
            }
        });

    });

//Renumber table rows
function renumber_table(tableID) {

    $(tableID + " tr").each(function() {
        count = $(this).parent().children().index($(this)) + 1;
        $(this).find('.priority').html(count);

    });
}
    $(document).on("click", ".btn-edit", function () {
        var taskId= $(this).data('id');
        $('#exampleModal').data('id',taskId);

    });

    $('#form-update-task').on('submit', function(e){
            e.preventDefault();
            let taskId = $('#exampleModal').data('id');
            let name = $("input[name=name]").val();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/tasks/'+ taskId,
            type: 'put',
            data: {name:name},
            success: function(result) {
                location.reload();
            }
        });

    });

    $(document).on("click", ".btn-add", function () {
        var projectId= $(this).data('id');
        $('#exampleModal2').data('id',projectId);

    });
    $('#form-add-task').on('submit', function(e){
        e.preventDefault();
        var name = $("#add-task-name").val();

        let priority = $("input[name=priority]").val();
        let projectID = $('#exampleModal2').data('id');
        console.log(projectID);

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/tasks/',
            type: 'post',
            data: {name:name,priority:priority,project_id:projectID},
            success: function(result) {
                location.reload();
            }
        });

    });

    $('#form-add-project').on('submit', function(e){
        e.preventDefault();
        var name = $("#add-project-name").val();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/projects/',
            type: 'post',
            data: {name:name},
            success: function(result) {
                location.reload();
            }
        });

    });
