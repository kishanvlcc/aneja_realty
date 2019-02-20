 $(document).ready(function () {
    $('.active').click(function () {
        var depId = $(this).data('id');
        var action = $(this).attr('id');
        if (action === 'edit')
        {
            $(".status").css("display","block");
            var actionUrl = 'department/'+depId+'/edit';
            $.ajax({
                url: actionUrl,
                cache: false,
                dataType: "JSON",
                type: "GET",
                data: {depId: depId},
                success: function (data) {
                    $("#dep-name").val(data.name);
                    $("#dep-status").val(data.status);
                }
            });
        }
        $("#depId").val(depId);
        $("#myModal").modal('show');
    });
    
    $(".modalClose").click(function(){
        
        $("#myModal").modal('hide');
        location.reload();
    });
    
    $("#change-dep-info").click(function () {
        var deptName = $("#dep-name").val();
        var deptStatus = $("#dep-status").val();
        var depId = $("#depId").val();
        
        var actionUrl = $("#department-div").attr('action');
    
       
        if (deptName == "" || deptName == null){
            $("#deptNameErr").html('Enter Department Name');
            return false;
        }
        
        $.ajax({
            url: actionUrl,
            cache: false,
            dataType: "json",
            type: "POST",
            data: {deptName: deptName, deptStatus: deptStatus, deptId: depId, "_token":$('#token-value').val()},
            success: function (data) {     
                alert(data.msg);
                $("#myModal").modal('hide');
                location.reload();
            },
            error: function (jqXhr, json, errorThrown) {
                var errors = jqXhr.responseJSON;
                var errorsHtml = '';
                $.each(errors, function (key, value) {
                    errorsHtml += value[0] + '<br />';
                });
            }
        });
    });

});

