$(function(){
    console.log('HOSTIA PUTA');
    $('.select2').select2();
    //if($('#cargo_type').val() == ''){$("#cargo_type").attr('disabled',true);}
    //if($('#type_id').val() == '1'){$('#hydraulic_equipment,#break_retarder,#break_retarder_type,#bolt_diameter,#fifth_wheel_height,#kingpin_height').parent().hide();}
    if($('#type_id').val() == '3'){$("#cargo_type").val('tank-trailer');$("#cargo_type").attr('readonly',true);}
    if($('#type_id').val()=='3'){$('#gearbox,#power,#break_retarder_type,#differential_lock,#euro_standard,#break_retarder,#engine_displacement,#n_gears,#fifth_wheel_height,#hydraulic_equipment,#kms').parent().hide();}
    $('#type_id').on('change',function(){
        if($('#type_id').val()=='3' ){
            console.log($('#type_id').val());
            $('#gearbox,#power,#break_retarder_type,#differential_lock,#euro_standard,#break_retarder,#engine_displacement,#n_gears,#fifth_wheel_height,#hydraulic_equipment,#kms').parent().hide();
        } else if ($('#type_id').val()=='1'){
            $('#hydraulic_equipment,#break_retarder,#break_retarder_type,#bolt_diameter,#fifth_wheel_height,#kingpin_height').parent().hide();
        } else {
            $('#gearbox,#power,#break_retarder_type,#differential_lock,#euro_standard,#break_retarder,#engine_displacement,#n_gears,#fifth_wheel_height,#hydraulic_equipment,#kms').parent().show();
        }

        if($('#type_id').val()=='1'){
            $("#cargo_type").attr('readonly',false);
            $("#cabDetails").attr('hidden',false);
            $('#cargo_type').on('click',function(){
                switch($('#cargo_type').val()){
                    case "tank-trailer":
                        console.log('hostia');
                        $("#tankTrailer").attr('hidden',false);
                        $("#containerDetails").attr('hidden',true);
                        break;
                    case "trailer":
                        $("#containerDetails").attr('hidden',false);
                        $("#tankTrailer").attr('hidden',true);
                        break;
                    default:
                };
            });
        };

        if($('#type_id').val()=='2'||$('#type_id').val()=='7'||$('#type_id').val()=='9'){
            $("#cargo_type").attr('readonly',true);
            $("#cargo_type").val('');
            $("#containerDetails").attr('hidden',true);
            $("#tankTrailer").attr('hidden',true);
            $("#cabDetails").attr('hidden',false);
        };

        if($('#type_id').val()=='4' || $('#type_id').val()=='5' || $('#type_id').val()=='6' || $('#type_id').val()=='8'){
            $("#cargo_type").val('trailer');
            $("#cargo_type").attr('readonly',true);
            $("#containerDetails").attr('hidden',false);
            $("#tankTrailer").attr('hidden',true);
            $("#cabDetails").attr('hidden',true);
        };

        if($('#type_id').val()=='3'){
            $("#cargo_type").val('tank-trailer');
            //$("#cargo_type").attr('hidden',true);
            $("#cargo_type").attr('readonly',true);
            $("#containerDetails").attr('hidden',true);
            $("#tankTrailer").attr('hidden',false);
            $("#cabDetails").attr('hidden',true);
        }
    })
})
