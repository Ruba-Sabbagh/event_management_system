<form action="{{ route('users.updatepermissions', $user->id) }}" method="POST" enctype="multipart/form-data">
    @method('patch')
    @csrf
    <div class="modal fade text-left" id="ModalManegpermissions{{ $user->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">{{ __('svu.manegpermissions') }}</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                </div>
                <div class="modal-body">


                        <label for="permissions" class="form-label">Assign Permissions</label>

                    <table class="table table-striped">
                        <thead>
                            <th scope="col" width="1%"><input type="checkbox" name="all_permission"></th>
                            <th scope="col" width="20%">{{__('svu.name')}}</th>
                            <th scope="col" width="1%">Guard</th>
                            <th scope="col" width="1%">{{__('svu.role')}}</th>
                        </thead>

                        @foreach($permissions as $permission)

                            <tr >

                                <td>
                                    <input type="checkbox"
                                    name="permission[{{ $permission->name }}]"
                                    value="{{ $permission->name }}"
                                    class='permission'
                                    {{$user->permissions->contains('name',$permission->name)
                                        ? 'checked'
                                        : '' }}>
                                </td>

                                <td>{{ $permission->name }}</td>
                                <td>{{ $permission->guard_name }}</td>
                                <td>
                                @foreach ($permission->roles as $role )
                                {{ $role->name." - " }}
                                @endforeach
                               </td>
                            </tr>
                        @endforeach
                    </table>

                    <button type="submit" class="btn btn-primary">Update user</button>
                </div>
            </div>
            </div>
        </div>

</form>

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('[name="all_permission"]').on('click', function() {

                if($(this).is(':checked')) {
                    $.each($('.permission'), function() {
                        $(this).prop('checked',true);
                    });
                } else {
                    $.each($('.permission'), function() {
                        $(this).prop('checked',false);
                    });
                }

            });
        });
    </script>
@endsection
