$(function(){
    $('.select2').select2();
    if($('#type_id').val() == '3'){$("#cargo_type").val('tank-trailer');}
    if($('#type_id').val()=='3'){$('#gearbox,#power,#break_retarder_type,#differential_lock,#euro_standard,#break_retarder,#engine_displacement,#n_gears,#fifth_wheel_height,#hydraulic_equipment,#kms').parent().hide();}
    if($('#type_id').val()=='1'){$('#hydraulic_equipment,#break_retarder_type,#bolt_diameter,#fifth_wheel_height,#kingpin_height,#aluminum_rims').parent().hide();}//#break_retarder,#differential_lock,
    if($('#type_id').val()=='4'){$('#gearbox,#power,#break_retarder_type,#differential_lock,#euro_standard,#break_retarder,#engine_displacement,#n_gears,#fifth_wheel_height,#hydraulic_equipment,#kms,#adr,#tank_capacity,#trailer_hitch,#differential_lock').parent().hide();}
    if($('#type_id').val()=='2'){$('#cargo_type').parent().hide();}
    $('#type_id').on('change',function(){
        if($('#type_id').val()=='3' ){
            console.log($('#container_type').val());
            $('#gearbox,#power,#break_retarder_type,#differential_lock,#euro_standard,#break_retarder,#engine_displacement,#n_gears,#fifth_wheel_height,#hydraulic_equipment,#kms').parent().hide();
        } else if ($('#type_id').val()=='1'){
            $('#hydraulic_equipment,#break_retarder_type,#bolt_diameter,#fifth_wheel_height,#kingpin_height,#aluminum_rims').parent().hide();//#break_retarder,#differential_lock,
        } else if ($('#type_id').val()=='4'){
            $('#gearbox,#power,#break_retarder_type,#differential_lock,#euro_standard,#break_retarder,#engine_displacement,#n_gears,#fifth_wheel_height,#hydraulic_equipment,#kms,#adr,#tank_capacity,#trailer_hitch,#differential_lock').parent().hide();
        } else {
            $('#gearbox,#power,#break_retarder_type,#differential_lock,#euro_standard,#break_retarder,#engine_displacement,#n_gears,#fifth_wheel_height,#hydraulic_equipment,#kms').parent().show();
        }

        if($('#type_id').val()=='1'){
            $("#cargo_type").prop('readonly',false);
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
            $("#cargo_type").parent().hide();
            $('#bolt_diameter,#kingpin_height').parent().hide();
            $('#axles_brand').parent().hide();
            //$("#cargo_type").val('');
            $("#containerDetails").attr('hidden',true);
            $("#tankTrailer").attr('hidden',true);
            $("#cabDetails").attr('hidden',false);
        };

        if($('#type_id').val()=='4' || $('#type_id').val()=='5' || $('#type_id').val()=='6' || $('#type_id').val()=='8'){
            $("#cargo_type").val('trailer');
            //$("#cargo_type").prop('readonly',true);
            $("#containerDetails").attr('hidden',false);
            $("#tankTrailer").attr('hidden',true);
            $("#cabDetails").attr('hidden',true);
        };

        if($('#type_id').val()=='3'){
            $("#cargo_type").prop('readonly',false);
            //$("#cargo_type").attr('hidden',true);
            //$("#cargo_type").prop('readonly',true);
            $("#containerDetails").attr('hidden',true);
            $("#tankTrailer").attr('hidden',false);
            $("#cabDetails").attr('hidden',true);
        }
    })
})
