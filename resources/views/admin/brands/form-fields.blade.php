<div class="card">
    <div class="card-body">
        <div class="row mb-1">
            <div class="col-lg-6 col-md-16 col-sm-12 position-relative">
                <label class="form-label" style="font-size: 15px" for="name">Name <span
                        class="text-danger">*</span></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                    name="name" placeholder="Name" value="{{ isset($brand) ? $brand->name : old('name') }}"
                    minlength="1" maxlength="50" />
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @else
                    <p class="m-0">
                        <small class="text-muted">Enter brand name.</small>
                    </p>
                @enderror
            </div>

            <div class="col-lg-6 col-md-16 col-sm-12 position-relative">
                <label class="form-label" style="font-size: 15px" for="slug">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" placeholder="Slug" name="slug"
                    value="{{ isset($brand) ? $brand->slug : old('slug') }}" minlength="1" readonly
                    maxlength="50" />

                @error('slug')
                    <div class="invalid-feedback">{{ $message }}</div>
                @else
                    <p class="m-0">
                        <small class="text-muted">Brand unique slug.</small>
                    </p>
                @enderror
            </div>
        </div>
    </div>
</div>
