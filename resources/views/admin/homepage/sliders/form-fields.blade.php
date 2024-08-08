<div class="card">
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-lg-12 position-relative">
                <label class="form-label" style="font-size: 15px" for="name">Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                    name="name" placeholder="Name" value="{{ isset($slider) ? $slider->name : old('name') }}"
                    minlength="1" maxlength="50" />
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @else
                    <p class="m-0">
                        <small class="text-muted">Enter brand name.</small>
                    </p>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-lg-12 position-relative">
                <label class="form-label" style="font-size: 15px" for="link">Link</label>
                <input type="text" class="form-control @error('link') is-invalid @enderror" id="link"
                    placeholder="Link" name="link" value="{{ isset($slider) ? $slider->link : old('link') }}"
                    minlength="1" />

                @error('link')
                    <div class="invalid-feedback">{{ $message }}</div>
                @else
                    <p class="m-0">
                        <small class="text-muted">Enter link for click.</small>
                    </p>
                @enderror
            </div>
        </div>

    </div>
</div>
