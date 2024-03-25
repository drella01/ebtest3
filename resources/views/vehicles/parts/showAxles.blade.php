<div class="col-12">
    <div class="row my-4 text-center">
        <div class="col-lg-12 bg-custom text-white">
            <h5>{{ __('custom.axles_detail') }}</h5>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        @include('vehicles.parts.showAxlesTable')
    </div>
    <div class="col-sm-4">
        @include('vehicles.parts.showAxlesScheme')
    </div>
</div>
