<div class='btn-group'  data-test="{$htmlTag}-datatable-actions">
    <a href="{{ url('categories?col=1&q='.$categorygroup) }}" class='btn btn-warning btn-xs show-button' data-test="show-button">
        <i class="fa fa-tree"></i>
    </a>
    <a href="{{ route('categoryGroups.show', $id) }}" class='btn btn-info btn-xs show-button' data-test="show-button">
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>

    @if(Auth::user()->id == $user_id || Auth::user()->hasRole('admin'))

        <a href="{{ route('categoryGroups.edit', $id) }}"  class='btn btn-success btn-xs edit-button' data-test="edit-button">
            <i class="glyphicon glyphicon-edit"></i>
        </a>
        <a class='btn btn-danger btn-xs delete-button openDeleteDataTableModal' data-id="{!! $id !!}"  data-message="ID: {!! $id !!}" data-test="delete-button">
            <i class="glyphicon glyphicon-trash"></i>
        </a>

    @endif

    {!! Form::hidden('rowId', $id, ['class'=>'rowId'] ) !!}
    {!! Form::hidden('actionId', 'edit', ['class'=>'actionId'] ) !!}
</div>
