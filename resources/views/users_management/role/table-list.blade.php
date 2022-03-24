@foreach ($roles as $role)
<tr>
    <td>
        {{ $role->nama }}
    </td>
    <td>
        <div id="detail_icon text-success">
            <button class="table_action btn" onclick="detail({{ $role->id }})">
                <i class="fa fa-eye text-success fa-1x"></i> 
            </button>
            <button  class="table_action btn" onclick="edit({{ $role->id }})">
                <i class="fa fa-pencil-square-o text-primary"></i> 
            </button>
            <button  class="table_action btn" onclick="deleteData({{ $role->id }})">
                <i class="fa fa-trash text-danger"></i> 
            </button>
        </div>
    </td>
</tr>
@endforeach