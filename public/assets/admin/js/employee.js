/*$(".add-employee").on('click',function () {
   
})*/
$.validator.addMethod("MobileNumber", function (value, element) {
    return this.optional(element) || value.match(/^[6-9]\d+$/) && value.length >= 10;
}, "* The number should start only with 9 or 8 or 7 or 6");
$.validator.addMethod("PanNo", function (value, element) {
    return this.optional(element) || /^[a-zA-Z]{5}\d{4}[a-zA-Z]{1}$/.test(value) && value.length == 10;
}, "* Invalid PAN No");

$(document).ready(function () {
    
    $("#create-employee").validate({
    	errorClass: "invalid",
        /*errorPlacement: function (error, element) {
            var c = error.text();
            element.closest(".form-group").find(".help-block").length < 1 && element.closest(".form-group").append('<span class="help-block">'), element.closest(".form-group").addClass("has-error"), element.closest(".form-group").find(".help-block").html(c)
        },
        highlight: function (element, errorClass) {
            $(element).addClass(errorClass).parent().prev().children("select").addClass(errorClass);
            if ($(element).attr('type') == 'radio' || $(element).attr('type') == 'checkbox') {
                $(element).parent().parent().addClass(errorClass);
            }
            if ($(element).attr('name') == 'accept') {
                $(element).next().next().addClass(errorClass);
            }
        },*/
        rules: {
            emp_code: {
                required: true,
                remote: {
                    url: "check-emp-code",  //working
                    type: "post",
                    async:false,
                    data:
                        {
                            "_token":$('#token-value').val(),
                            emp_code: function()
                            {
                                return $('#emp_code').val();
                            },
                        }
                }
            },
            first_name: {
                required: true
            },
            mobile_no: {
                required: true,
                digits :true,
                MobileNumber: true,
                remote: {
                    url: "check-emp-mobile",  //working
                    type: "post",
                    async:false,
                    data:
                    {
                        "_token":$('#token-value').val(),
                        mobile: function()
                        {
                            return $('#mobile_no').val();
                        },
                    }
                }
            },
            doj: {
                required: true
            },
            dob: {
                required: true
            },
            email_id: {
            //    required: true,
                email:true
            },
            salary_ctc: {
                required: true,
                digits :true
            },
            salary_fixed: {
                required: true,
                digits :true,
            },
            salary_variable: {
                required: true,
                digits :true
            },
            business_unit: {
                required: true
            },
            emp_center: {
                required: {
                    depends: function (element) {
                        return $('#business_unit').val() == 1  ||  $('#business_unit').val() == 2
                    }
                }
            },
            department: {
                required: true
            },  
           // designation: {
             //   required: false
           // },            
            state: {
                required: true
            },
            band: {
                required: true,
                digits :true,
            },
            level: {
                required: true
            },
            father_name: {
                required: true
            },
            marital_status: {
                required: true
            },
            emp_type: {
                required: true
            },
            present_address: {
                required: true
            },
            aadhar_no: {
                digits: true
            },
            official_email_id: {
                email: true
            },
            emergency_contact_no: {
                digits: true,
                MobileNumber: true
            },
            pan_no: {
                PanNo: true
            },
            account_number: {
                digits: true
            }

        },

        messages: {
            emp_code: {
                required: "Please enter employee code.",
                 remote :"Employee Code Already Exist"
            },
            first_name: {
                required: "Please enter employee name."
            },
            mobile_no: {
                required: "Please enter mobile number.",
                remote :"Mobile Number Already Exist"
            },
            doj: {
                required: "Please enter date of joining."
            },
            dob: {
                required: "Please enter date of birth."
            },
            //email_id: {
             //   required: "Please enter email id."
//            },
            salary_ctc: {
                required: "Please enter slary in ctc."
            },
            salary_fixed: {
                required: "Please enter salary in fixed."
            },
            salary_variable: {
                required: "Please enter salary in variable."
            },
            business_unit: {
                required: "Please select bussiness unit."
            },
            emp_center: {
                required: "Please select cost center."
            },
            department: {
                required: "Please select department."
            },
           // designation: {
            //    required: "Please select designation."
          //  },
            state: {
                required: "Please select state."
            },
            band: {
                required: "Please enter band."
            },
            level: {
                required: "Please enter level."
            },
            father_name: {
                required: "Please enter father name."
            },
            marital_status: {
                required: "Please select marital status."
            },
            emp_type: {
                required: "Please select employee type"
            },
            present_address: {
                required: "Please enter present address."
            },
        },
        submitHandler: function (form) {
            //$('#add-employee').prop('disabled', true);
            form.submit();
        }
    });


    $("#department").on('change',function (e) {
        
        $("#designation").select2('val', '');
        $("#reporting_manager").select2('val', '');

        var department = $(this).val();
        var actionUrl = baseUrl+'/employee/get-reporting-manager';
        $.ajax({
            url: actionUrl,
            cache: false,
            dataType: "json",
            type: "POST",
            data:
            {"_token":$('#token-value').val(),"department":department},
            success: function (data)
            {
                $("#designation").html(data.designation_list);

                $("#reporting_manager").html(data.manager_list);

            },
            error: function (jqXhr, json, errorThrown) {
                var errors = jqXhr.responseJSON;
                var errorsHtml = '';
                $.each(errors, function (key, value) {
                    errorsHtml += value[0] + '<br />';
                });

            }
        });
    })

    $("#business_unit").on('change',function (e) {

        $("#emp_center").select2('val', '');

        var businessUnit = $(this).val();
        var actionUrl = baseUrl+'/employee/get-cost-center';
        $.ajax({
            url: actionUrl,
            cache: false,
            dataType: "json",
            type: "POST",
            data:
            {"_token":$('#token-value').val(),"businessUnit":businessUnit},
            success: function (data)
            {
                $("#emp_center").html(data.center_list);

            },
            error: function (jqXhr, json, errorThrown) {
                var errors = jqXhr.responseJSON;
                var errorsHtml = '';
                $.each(errors, function (key, value) {
                    errorsHtml += value[0] + '<br />';
                });

            }
        });
    })

    $("#marital_status").on('change',function () {
        if($(this).val() == 2){
            $(".spouse").attr('style','display:block');
            $(".no_of_child").attr('style','display:block');
        } else{
            $(".spouse").attr('style','display:none');
            $(".no_of_child").attr('style','display:none');
        }
    })

    $('body').on("click", ".inactive", function () {

        var empId = $(this).data('id');
        var action = $(this).data('action');
        if (action == 'edit'){
            var actionUrl = baseUrl+'/employee/get-employee-exit-data';
            $.ajax({
                url: actionUrl,
                cache: false,
                dataType: "json",
                type: "POST",
                data:
                {"_token":$('#token-value').val(),"emp":empId},
                success: function (data)
                {
                    $("#resignation-letter").val(data.resignation_date);
                    $("#last-working").val(data.last_working_date);
                    $("#exit_type").val(data.exit_type);
                    $("#description").val(data.reason_description);

                },
                error: function (jqXhr, json, errorThrown) {
                    var errors = jqXhr.responseJSON;
                    var errorsHtml = '';
                    $.each(errors, function (key, value) {
                        errorsHtml += value[0] + '<br />';
                    });

                }
            });

        }
        $("#empId").val(empId);
        $("#myModal").modal('show');
    })

    $('#resignation-letter').datepicker({
        format: 'dd-mm-yyyy',
        autoclose: 1,
    })

    $("#last-working").datepicker({
        format: 'dd-mm-yyyy',
        autoclose: 1,
    });

    $("#add-exit-info").on('click',function () {

        var resignDate = $("#resignation-letter").val();
        var lastWorkDate = $("#last-working").val();
        var exitType = $("#exit_type").val();
        var formData = $("#exit-employee").serialize();
        var actionUrl = baseUrl+'/employee/exit-data';

        if (resignDate == "" || resignDate == null){
            $("#resignErr").html('Enter resign date');
            $("#lastWorkErr").html('');
            $("#exitTypeErr").html('');
            return false;

        } else if (lastWorkDate == "" || lastWorkDate == null){
            $("#resignErr").html('');
            $("#lastWorkErr").html('Enter last working date');
            $("#exitTypeErr").html('');
            return false;

        } else if (exitType == "" || exitType == null){
            $("#resignErr").html('');
            $("#lastWorkErr").html('');
            $("#exitTypeErr").html('Select exit type');
            return false;

        } else {
            $("#resignErr").html('');
            $("#lastWorkErr").html('');
            $("#exitTypeErr").html('');

            $.ajax({
                url: actionUrl,
                cache: false,
                dataType: "json",
                type: "POST",
                data:formData,
                success: function (data)
                {
                    if (data.code == 200){
                        document.getElementById("exit-employee").reset();
                        $("#myModal").modal('hide');
                        $(".modalalertmsg").html(data.msg)
                        $("#modalAlert").modal('show');

                    }

                },
                error: function (jqXhr, json, errorThrown) {
                    var errors = jqXhr.responseJSON;
                    var errorsHtml = '';
                    $.each(errors, function (key, value) {
                        errorsHtml += value[0] + '<br />';
                    });

                }
            });

        }

    })

    $(".activate").on('click',function (e) {
        var empId = $(this).data('id');
        if (confirm("Are you sure you want to activate this employee")){

            var actionUrl = baseUrl+'/employee/activate';
            $.ajax({
                url: actionUrl,
                cache: false,
                dataType: "json",
                type: "POST",
                data:
                {"_token":$('#token-value').val(),"emp":empId},
                success: function (data)
                {
                    if (data.code == 200){
                        $(".modalalertmsg").html(data.msg)
                        $("#modalAlert").modal('show');
                    }

                },
                error: function (jqXhr, json, errorThrown) {
                    var errors = jqXhr.responseJSON;
                    var errorsHtml = '';
                    $.each(errors, function (key, value) {
                        errorsHtml += value[0] + '<br />';
                    });

                }
            });
        }
    })


    $("#basic-detail-form").validate({
        errorClass: "invalid",

        rules: {

            first_name: {
                required: true
            },
            mobile_no: {
                required: true,
                digits :true,
                MobileNumber: true
            },
            doj: {
                required: true
            },
            dob: {
                required: true
            },
            email_id: {
               // required: true,
                email:true
            },
            present_address: {
                required: true
            },
        },

        messages: {
            emp_code: {
                required: "Please enter employee code.",
                remote :"Employee Code Already Exist"
            },
            first_name: {
                required: "Please enter first name."
            },
            mobile_no: {
                required: "Please enter mobile number."
            },
            doj: {
                required: "Please enter date of joining."
            },
            dob: {
                required: "Please enter date of birth."
            },
//            email_id: {
//                required: "Please enter email id."
//            },
            salary_ctc: {
                required: "Please enter slary in ctc."
            },
            salary_fixed: {
                required: "Please enter salary in fixed."
            },
            salary_variable: {
                required: "Please enter salary in variable."
            },
            business_unit: {
                required: "Please select bussiness unit."
            },
            emp_center: {
                required: "Please select cost center."
            },
            department: {
                required: "Please select department."
            },
           // designation: {
         //       required: "Please select designation."
          //  },
            band: {
                required: "Please enter band."
            },
            level: {
                required: "Please enter level."
            },

            present_address: {
                required: "Please enter present address."
            },
        },
        submitHandler: function (form) {
            //$('#add-employee').prop('disabled', true);
            form.submit();
        }
    });

    $("#bank-detail-form").validate({
        errorClass: "invalid",
        rules: {
            aadhar_no: {
                digits: true
            },
            pan_no: {
                PanNo: true
            },
            account_number: {
                digits: true
            }
        },
        messages: {

        },
        submitHandler: function (form) {
            //$('#add-employee').prop('disabled', true);
            form.submit();
        }
    });

    $("#additional-detail-form").validate({
        errorClass: "invalid",
        rules: {
            father_name: {
                required: true
            },
            marital_status: {
                required: true
            },
            emp_type: {
                required: true
            },
            state: {
                required: true
            },
            official_email_id: {
                email: true
            },
            emergency_contact_no: {
                digits: true,
                MobileNumber: true
            },
        },
        messages: {
            state: {
                required: "Please select state."
            },
            father_name: {
                required: "Please enter father name."
            },
            marital_status: {
                required: "Please select marital status."
            },
            emp_type: {
                required: "Please select employee type"
            },

        },
        submitHandler: function (form) {
            //$('#add-employee').prop('disabled', true);
            form.submit();
        }
    });

    $("#office-detail-form").validate({
        errorClass: "invalid",
        rules: {
            salary_ctc: {
                required: true,
                digits :true
            },
            salary_fixed: {
                required: true,
                digits :true,
            },
            salary_variable: {
                required: true,
                digits :true
            },
            business_unit: {
                required: true
            },
            emp_center: {
                required: {
                    depends: function (element) {
                        return $('#business_unit').val() == 1  ||  $('#business_unit').val() == 2
                    }
                }
            },
            department: {
                required: true
            },
           // designation: {
            //    required: true
         //   },
            band: {
                required: true,
                digits :true,
            },
            level: {
                required: true
            },

        },
        messages: {

        },
        submitHandler: function (form) {
            //$('#add-employee').prop('disabled', true);
            form.submit();
        }
    });

    });