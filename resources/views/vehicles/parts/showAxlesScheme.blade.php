@foreach ($vehicle->axlesDetail as $key=>$item)
<div class="d-flex my-5">
    @if ($item->isDir)
    <div class="d-inline-block square isdir">
        <p class="my-4" style="font-size: 8px">{{$item->left_tyre.'%'}}</p>
    </div>
    <hr>
    <div class="d-inline-block square isdir">
        <p class="my-4" style="font-size: 8px">{{$item->right_tyre.'%'}}</p>
    </div>
    @else
    @if ($item->isDouble)
    <div class="d-inline-block square">
        <p class="my-4" style="font-size: 8px">{{$item->left_tyre.'%'}}</p>
    </div>
    @endif
    <div class="d-inline-block square">
        <p class="my-4" style="font-size: 8px">{{$item->left_tyre.'%'}}</p>
    </div>
    <hr>
    @if ($item->isDouble)
    <div class="d-inline-block square">
        <p class="my-4" style="font-size: 8px">{{$item->right_tyre.'%'}}</p>
    </div>
    @endif
    <div class="d-inline-block square">
        <p class="my-4" style="font-size: 8px">{{$item->right_tyre.'%'}}</p>
    </div>
    @endif
</div>
@endforeach
