<div class="row g-3">
    <div class="col-lg-9 col-md-9 col-sm-12 position-relative">
        <div class="card mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 position-relative">
                        <label class="form-label" style="font-size: 15px" for="email">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" placeholder="Email" {{ isset($user) ? 'readonly' : null }} value="{{ isset($user) ? $user->email : null }}" />
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @else
                            <p class="m-0">
                                <small class="text-muted">Enter user email.</small>
                            </p>
                        @enderror
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 position-relative">
                        <label class="form-label" style="font-size: 15px" for="password">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            id="password" name="password" placeholder="Password"
                            value="" />
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @else
                            <p class="m-0">
                                <small class="text-muted">Enter user password.</small>
                            </p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 position-relative">
                        <label class="form-label" style="font-size: 15px" for="name">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" placeholder="Name" value="{{ isset($user) ? $user->name : null }}" />
                        @error('name')
                            <div class="invalid-tooltip">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 position-relative">
                        <label class="form-label" style="font-size: 15px" for="roles">Roles</label>
                        <select class="select2-size-lg form-select" multiple id="roles" name="roles[]">
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}" {{ (isset($user) ? in_array($role->id, $user->roles->pluck('id')->toArray()) ? 'selected' : ''  : null) }}>{{ $role->name }}</option>
                            @endforeach
                        </select>
                        @error('roles')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @else
                            <p class="m-0">
                                <small class="text-muted">Enter role.</small>
                            </p>
                        @enderror
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-12 position-relative">
        <div class="sticky-md-top top-lg-100px top-md-100px top-sm-0px" style="z-index: auto;">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success w-100  buttonToBlockUI me-1">
                                <i class="fa-solid fa-floppy-disk icon mx-2"></i>
                                {{ isset($user) ? 'Update' : 'Save' }} User
                            </button>
                        </div>
                        <div class="col-md-12">
                            <a href="{{ route('admin.users.index') }}" class="btn btn-danger w-100 ">
                                <i class="fa-solid fa-xmark icon mx-2"></i>
                                Cancel
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <h4 class="alert-heading"><i data-feather="info" class="me-50"></i>Information!</h4>
                        <div class="alert-body">

                            <span class="text-danger">*</span> means required field. <br>
                            <span class="text-danger">**</span> means required field and must be unique.
                        </div>
                        {{-- <button type="button" class="btn-close" data-bs-dismiss="alert"
                    aria-label="Close"></button> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
