<div class="py-2">
    <h3>Filtros</h3>
    <h5 class="text-left">{{__('custom.sortBy')}}</h5>
    <button class="btn btn-primary my-2 btn-block" style="font-size:12px" id="sortDate">{{__('custom.details.registration')}}</button>
    <button class="btn btn-primary my-2 btn-block" style="font-size:12px" id="sortNews">{{__('custom.stockNew')}}</button>
    <hr class="dropdown-divider">
    <form action="">
    </form>
    <hr class="dropdown-divider">
    <form action="">
        <h5 class="text-left">{{__('custom.details.brand')}}</h5>
        <hr class="dropdown-divider">
        @foreach ($vehicles->pluck('brand')->unique() as $item)
        <div class="form-check">
            <input type="checkbox" class="form-check-input v-filter" id="{{$item}}" name="brands[]" value={{ $item }}>
            <label class="form-check-label" for="{{$item}}">{{ ucfirst($item) }}</label>
        </div>
        @endforeach
        <hr class="dropdown-divider">
        @if ( $vehicles->first() && ($vehicles->first()->type_id == 1||$vehicles->first()->type_id==2))
        <h6 class="text-left">{{__('custom.general.config_axles')}}</h6>
        <hr class="dropdown-divider">
            @foreach ($vehicles->pluck('config_axles')->unique() as $item)
            @if ($item)
            <div class="form-check">
                <input type="checkbox" class="form-check-input axles-filter" id="{{$item}}" name="config_axles[]" value={{ $item }}>
                <label class="form-check-label" for="{{$item}}">{{ ucfirst($item) }}</label>
            </div>
            @endif
            @endforeach
        @endif
        @if ($vehicles->first() && ($vehicles->first()->type_id == 1 || $vehicles->first()->type_id == 3))
        <hr class="dropdown-divider">
        <h6 class="text-left">{{__('custom.general.cargo_type')}}</h6>
        @foreach (\App\Models\ContainerType::all() as $item)
        <div class="form-check">
            <input type="checkbox" class="form-check-input tank-filter" id="{{$item->name}}" name="tank_type[]" value={{ $item->name }}>
            <label class="form-check-label" for="{{$item->name}}">{{ ucfirst(__('custom.products.'.$item->name)) }}({{ App\Models\TankTrailer::where('containerType_id',$item->id)->count()}})</label>
        </div>
        @endforeach
        @endif
    </form>
</div>
<script>
    $(document).ready(function(){
        var vehicles = {!! $vehicles !!};
        var brands = [];
        var config_axles = [];
        var filters=[];
        var cargo_type =[];

        $('.v-filter').on('change', function() {
            if( $(this).is(':checked') ){
                filters.push($(this).val().toLowerCase());
                console.log(filters);
                vehicles.forEach( element => {
                    if( element.type_id != 2 ) {
                        console.log('putamierda');
                        if(filters.includes(element.brand.toLowerCase()) && (config_axles.includes(element.config_axles.toLowerCase()) || config_axles.length==0) && (cargo_type.includes(element.tank_trailer.type.name.toLowerCase()) || cargo_type.length==0) ){
                            $("#"+element.id).show();console.log(element);
                            console.log('ok');
                        } else {
                            console.log('ko');
                            $("#"+element.id).fadeOut("slow");
                        }
                    } else if(element.type_id == 2) {
                        if(filters.includes(element.brand.toLowerCase()) && (config_axles.includes(element.config_axles.toLowerCase()) || config_axles.length==0)){
                            $("#"+element.id).show();console.log(element);
                            console.log('ok');
                        } else {
                            console.log('ko');
                            $("#"+element.id).fadeOut("slow");
                        }
                    }

                });
            } else {
                var index = filters.indexOf($(this).val().toLowerCase())
                if (index > -1) {
                    filters.splice(index, 1);
                }
                vehicles.forEach( element => {
                    console.log(element.reference);
                    if( element.type_id != 2 ) {
                        if ((filters.includes(element.brand.toLowerCase()) || filters.length==0) && (config_axles.includes(element.config_axles.toLowerCase()) || config_axles.length==0) && (cargo_type.includes(element.tank_trailer.type.name.toLowerCase()) || cargo_type.length==0) ) {
                            $("#"+element.id).show();
                        } else {
                            $("#"+element.id).hide();
                        }
                    } else if(element.type_id == 2) {
                        if(filters.includes(element.brand.toLowerCase()) && (config_axles.includes(element.config_axles.toLowerCase()) || config_axles.length==0)){
                            $("#"+element.id).show();console.log(element);
                            console.log('ok');
                        } else {
                            console.log('ko');
                            $("#"+element.id).fadeOut("slow");
                        }
                    }
                });

                if(filters.length == 0){
                    vehicles.forEach ( element => {
                        if( element.type_id != 2 ) {
                            if(config_axles.includes(element.brand.toLowerCase())||config_axles.length == 0  && (cargo_type.includes(element.tank_trailer.type.name.toLowerCase()) || cargo_type.length==0) ){$("#"+element.id).fadeIn("slow")};
                        } else if( element.type_id == 2 ) {
                            if(config_axles.includes(element.brand.toLowerCase())||config_axles.length == 0){$("#"+element.id).fadeIn("slow")};
                        }
                    });
                }

            }
        });

        $('.axles-filter').on('change', function() {
            if( $(this).is(':checked') ){
                config_axles.push($(this).val().toLowerCase());
                console.log(config_axles);
                vehicles.forEach( element => {
                    if(element.type_id !=2){
                        if (config_axles.includes(element.config_axles.toLowerCase()) && (filters.includes(element.brand.toLowerCase()) || filters.length == 0) && (cargo_type.includes(element.tank_trailer.type.name.toLowerCase()) || cargo_type.length==0) ) {
                            $("#"+element.id).show();
                        } else {
                            $("#"+element.id).fadeOut("slow");
                        }
                    } else if(element.type_id == 2){
                        if (config_axles.includes(element.config_axles.toLowerCase()) && (filters.includes(element.brand.toLowerCase()) || filters.length == 0) ) {
                            $("#"+element.id).show();
                        } else {
                            $("#"+element.id).fadeOut("slow");
                        }
                    }
                });
            } else {
                var index = config_axles.indexOf($(this).val().toLowerCase());
                if (index > -1) {
                    config_axles.splice(index, 1);
                }
                vehicles.forEach( element => {
                    if(element.type_id !=2){
                        if (config_axles.includes(element.config_axles.toLowerCase()) && (filters.includes(element.brand.toLowerCase()) || filters.length == 0) && (cargo_type.includes(element.tank_trailer.type.name.toLowerCase()) || cargo_type.length==0) ) {
                            $("#"+element.id).show();
                        } else {
                            $("#"+element.id).hide();
                        }
                    } else if(element.type_id ==2){
                        if (config_axles.includes(element.config_axles.toLowerCase()) && (filters.includes(element.brand.toLowerCase()) || filters.length == 0)) {
                            $("#"+element.id).show();
                        } else {
                            $("#"+element.id).hide();
                        }
                    }
                });

                if(config_axles.length == 0){
                    vehicles.forEach ( element => {
                        if(element.type_id !=2){
                            if(filters.includes(element.brand.toLowerCase())||filters.length == 0 && (cargo_type.includes(element.tank_trailer.type.name.toLowerCase()) || cargo_type.length==0) ){$("#"+element.id).fadeIn("slow");}
                        }else if (element.type_id == 2){
                            if(filters.includes(element.brand.toLowerCase())||filters.length == 0 ){$("#"+element.id).fadeIn("slow");}
                        }
                    });
                }
            }
        });


        $('.tank-filter').on('change', function() {
            if( $(this).is(':checked') ){
                cargo_type.push($(this).val().toLowerCase());
                vehicles.forEach( element => {
                    console.log(element.tank_trailer.type.name);
                    if(cargo_type.includes(element.tank_trailer.type.name.toLowerCase()) && (filters.includes(element.brand.toLowerCase()) || filters.length == 0) && (config_axles.includes(element.config_axles.toLowerCase()) || config_axles.length==0) ){
                        $("#"+element.id).show();console.log(element);
                        console.log('ok');
                    } else {
                        console.log('ko');
                        $("#"+element.id).fadeOut("slow");
                    }

                });
                types=[];
                console.log(types);
            } else {
                var index = cargo_type.indexOf($(this).val().toLowerCase())
                if (index > -1) {
                    cargo_type.splice(index, 1);
                }
                vehicles.forEach( element => {
                    if (cargo_type.includes(element.tank_trailer.type.name.toLowerCase()) && (filters.includes(element.brand.toLowerCase()) || filters.length == 0) && (config_axles.includes(element.config_axles.toLowerCase()) || config_axles.length == 0)) {
                        $("#"+element.id).show();
                    } else {
                        $("#"+element.id).hide();
                    }
                });

                if(cargo_type.length == 0){
                    vehicles.forEach ( element => {
                        if((filters.includes(element.brand.toLowerCase())||filters.length == 0)&&(config_axles.includes(element.config_axles.toLowerCase())||config_axles.length == 0)){$("#"+element.id).fadeIn("slow")};
                    });
                }
            }

        });

        /* FILTROS DE ORDEN POR ULTIMAS ADQUISICIONES O ANTIGÚEDAD */

        $("#sortDate").on('click',function (){
            var vehicles = {!! $vehicles !!};
            function compare (a, b){
                return b.reg_date.localeCompare(a.reg_date);
            }
            var sortDate = vehicles.sort(compare);
            sortDate.forEach( element => {
                $("#"+element.id).hide().appendTo($('#vhs')).fadeIn('slow');
                //$('#vhs').append($("#"+element.id)).show('slow');
            });
        });

        $("#sortNews").on('click',function (){
            var vehicles = {!! $vehicles !!};
            function compare (a, b){
                return b.created_at.localeCompare(a.created_at);
            }
            var sortNews = vehicles.sort(compare);
            sortNews.forEach( element => {
                $("#"+element.id).hide().appendTo($('#vhs')).fadeIn('slow');
                //$('#vhs').append($("#"+element.id)).show('slow');
            });
        });
    });
</script>
