$(document).ready(function () {
    $('.active').click(function () {
        var centrId = $(this).data('id');
        var action = $(this).attr('id');
        if (action === 'edit')
        {
            $(".status").css("display","block");
            var actionUrl = 'centers/'+centrId+'/edit';
            $.ajax({
                url: actionUrl,
                cache: false,
                dataType: "JSON",
                type: "GET",
                data: {centerId: centrId},
                success: function (data) {
                    $("#business").val(data.business_unit_id);
                    $("#cm-name").val(data.name);
                    $("#cm-status").val(data.status);
                }
            });
        }
        $("#centerId").val(centrId);
        $("#myModal").modal('show');
    });
    
    $(".modalClose").click(function(){
        
        $("#myModal").modal('hide');
        location.reload();
    });
    
    $("#change-center-info").click(function () {
        var businessId= $("#business").val();
        
        var centerName = $("#cm-name").val();
        
        var centerStatus = $("#cm-status").val();
        var centerId = $("#centerId").val();
        
        var actionUrl = $("#center-div").attr('action');
        
       
        if (centerName == "" || centerName == null){
            $("#centerNameErr").html('Enter Center Name');
            return false;
        }
        
        if(businessId == "" || businessId == null){
            $("#businessUnitNameErr").html('Select Business Unit');
            return false;
        }
        
        $.ajax({
            url: actionUrl,
            cache: false,
            dataType: "json",
            type: "POST",
            data: {businessId: businessId, centerName: centerName, centerStatus: centerStatus, centerId: centerId, "_token":$('#token-value').val()},
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



