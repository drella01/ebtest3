<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
    Eliminar repuesto
</button>
<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Vas a eliminar el repuesto {{ $machineryPart->id }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Estás segura?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <form action="{{ route('machineryparts.destroy',$machineryPart) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input class="btn btn-danger btn-block" type="submit" value='Eliminar'>
                </form>
                <!--button type="button" class="btn btn-primary">Save changes</button-->
            </div>
        </div>
    </div>
</div>
