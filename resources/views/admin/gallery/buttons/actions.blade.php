<div class="btn-group">
    <button type="button" class="btn btn-success btn-flat dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-wrench"></i> Actions
    </button>
    <span class="caret"></span>
    <span class="sr-only"></span>
    </button>
    <div class="dropdown-menu" role="menu">
        <a href="{{ route('album.edit', $id) }}" class="dropdown-item"><i class="fas fa-edit"></i> Edit</a>
        <a href="{{ route('album.show', $id) }}" class="dropdown-item"><i class="fa fa-eye"></i> Show</a>
        <div class="dropdown-divider"></div>
        <a data-toggle="modal" data-target="#delete_record{{$id}}" href="#" class="dropdown-item">
            <i class="fas fa-trash"></i> Delete
        </a>
    </div>
</div>

<div class="modal fade" id="delete_record{{$id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete Album</h4>
                <button class="close" data-dismiss="modal">x</button>
            </div>
            <div class="modal-body">
                <i class="fa fa-exclamation-triangle"></i> Do you want to delete album?
            </div>
            <div class="modal-footer">
                {!! html()->form('DELETE', route('album.destroy', $id))->open() !!}
                @csrf
                @method('DELETE')
                {!! html()->submit('Remove Album')->class('btn btn-danger btn-flat') !!}
                <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Cancel</button>
                {!! html()->form()->close() !!}
            </div>
        </div>
    </div>
</div>
