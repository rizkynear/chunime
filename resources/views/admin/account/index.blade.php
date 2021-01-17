@extends('admin.layout.master')

@section('style-lib')
<link rel="stylesheet" href="{{ asset('css/selectric.css') }}">
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Accounts</h1>
        <div class="section-header-button">
            <button class="btn btn-primary" data-toggle="modal" data-target="#modal-add">Add New</button>
        </div>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active">Accounts</div>
        </div>
    </div>
    <div class="section-body">
        <h2 class="section-title">Account</h2>
        <p class="section-lead">
            You can manage all accounts, such as editing, deleting and more.
        </p>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>All Accounts</h4>
                    </div>
                    <div class="card-body">
                        <div class="float-right">
                            <form action="{{ route('admin.account.index') }}">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request()->get('search') }}">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="clearfix mb-3"></div>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Description</th>
                                        <th>Created At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($accounts as $account)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $account->username }}
                                            <div class="table-links">
                                                <a type="button" data-toggle="modal" class="btn-edit" data-params="{{ $account }}" data-url="{{ route('admin.account.update', $account->id) }}">Edit</a>
                                                <div class="bullet"></div>
                                                <a type="button" data-toggle="modal" class="text-danger btn-delete" data-url="{{ route('admin.account.delete', $account->id) }}">Delete</a>
                                            </div>
                                            <td>{{ $account->password }}</td>
                                            <td>{{ $account->description }}</td>
                                            <td>{{  date('Y-m-d', strtotime($account->created_at)) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="float-right">
                            {{ $accounts->appends(Request::except('page'))->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="modalAddLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.account.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" value="{{ old('form_type') == 'store' ? old('username') : '' }}">
                        @if (old('form_type') == 'store')
                            @error('username')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control" name="password" value="{{ old('form_type') == 'store' ? old('password') : '' }}">
                        @if (old('form_type') == 'store')
                            @error('password')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description" style="min-height: 100px;">{{ old('form_type') == 'store' ? old('description') : '' }}</textarea>
                        @if (old('form_type') == 'store')
                            @error('description')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="form_type" value="store">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ old('url') }}" method="post" id="form-edit">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" value="{{ old('form_type') == 'edit' ? old('username') : '' }}">
                        @if (old('form_type') == 'edit')
                            @error('username')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control" name="password" value="{{ old('form_type') == 'edit' ? old('password') : '' }}">
                        @if (old('form_type') == 'edit')
                            @error('password')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description" style="min-height: 100px;">{{ old('form_type') == 'edit' ? old('description') : '' }}</textarea>
                        @if (old('form_type') == 'edit')
                            @error('description')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="url" value="{{ old('url') }}">
                    <input type="hidden" name="form_type" value="edit">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script-lib')
<script src="{{ asset('js/jquery.selectric.min.js') }}"></script>
@endsection

@section('script')
@if ($errors->any() && old('form_type') == 'store') 
<script>
    $('#modal-add').modal();
</script>
@elseif ($errors->any() && old('form_type') == 'edit')
<script>
    $('#modal-edit').modal();
</script>
@endif
<script src="{{ asset('js/features-posts.js') }}"></script>
<script>
    $('.btn-edit').on('click', function() {
        const data = $(this).data('params');
        const url  = $(this).data('url');

        $('#form-edit').attr('action', url);
        $('#form-edit input[name="username"]').val(data.username);
        $('#form-edit input[name="password"]').val(data.password);
        $('#form-edit textarea[name="description"]').val(data.description);
        $('#form-edit input[name="url"]').val(url);

        $('#modal-edit').modal();
    })
</script>
@endsection