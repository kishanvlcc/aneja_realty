$(document).ready(function () {
    $('.active').click(function () {
        var desgnId = $(this).data('id');
        var action = $(this).attr('id');
        if (action === 'edit')
        {
            $(".status").css("display","block");
            var actionUrl = 'designations/'+desgnId+'/edit';
            $.ajax({
                url: actionUrl,
                cache: false,
                dataType: "JSON",
                type: "GET",
                data: {desgId: desgnId},
                success: function (data) {
                    $("#department").val(data.department_id);
                    $("#desg-name").val(data.name);
                    $("#desg-status").val(data.status);
                }
            });
        }
        $("#desgId").val(desgnId);
        $("#myModal").modal('show');
    });
    
    $(".modalClose").click(function(){
        
        $("#myModal").modal('hide');
        location.reload();
    });
    
    $("#change-desg-info").click(function () {
        var deptId= $("#department").val();
        
        var desgName = $("#desg-name").val();
        
        var desgStatus = $("#desg-status").val();
        var desgId = $("#desgId").val();
       
        var actionUrl = $("#designation-div").attr('action');
        
       
        if (desgName == "" || desgName == null){
            $("#desgNameErr").html('Enter Desgnation Name');
            return false;
        }
        
        if(deptId == "" || deptId == null){
            $("#deptNameErr").html('Select Department');
            return false;
        }
        
        $.ajax({
            url: actionUrl,
            cache: false,
            dataType: "json",
            type: "POST",
            data: {deptId: deptId, desgName: desgName, desgStatus: desgStatus, desgId: desgId, "_token":$('#token-value').val()},
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


