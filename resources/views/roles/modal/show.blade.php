<div class="modal fade text-left" id="ModalShow{{ $role->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">{{ __('svu.show_role') }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>

            <div class="modal-body">
                <div class="bg-light p-4 rounded">
                    <h1>{{ ucfirst($role->name) }} Role</h1>
                    <div class="lead">

                    </div>

                    <div class="container mt-4">

                        <h3>Assigned permissions</h3>

                        <table class="table table-striped">
                            <thead>
                                <th scope="col" width="20%">{{__('svu.name')}}</th>
                                <th scope="col" width="1%">Guard</th>
                            </thead>

                            @foreach($role->permissions as $permission)
                                <tr>
                                    <td>{{ $permission->name }}</td>
                                    <td>{{ $permission->guard_name }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>

                </div>
                <div class="mt-4">
                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-info">Edit</a>
                    <a href="{{ route('roles.index') }}" class="btn btn-default">Back</a>
                </div>

            </div>
        </div>
    </div>
</div>
