<div class="modal fade text-left" id="ModalShow{{ $user->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">{{ __('svu.show_user') }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>

            <div class="modal-body">
                <div class="bg-light p-4 rounded">
                    <h1>{{ ucfirst($user->name) }} user</h1>
                    <div class="lead">

                    </div>
                    <div class="container mt-4">
                        <div>
                            Name: {{ $user->name }}
                        </div>
                        <div>
                            Email: {{ $user->email }}
                        </div>
                        <div>
                            Roles:  @foreach($user->roles as $role)
                            <span class="badge bg-primary">{{ $role->name }}</span>
                            <div>
                                Permissions:
                                <table>
                                    @foreach ( $role->permissions as  $permission)
                                    <tr>
                                        <td>
                                            {{  $permission->name }}
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>

                            </div>
                        @endforeach
                        </div>



                    </div>

                </div>
                <div class="mt-4">
                    <a href="{{ route('users.index') }}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
