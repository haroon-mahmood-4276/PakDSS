<div class="card">
    <div class="card-body">
        <div class="row mb-1">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-2">
                <label class="form-label" style="font-size: 15px" for="category">Parent Category</label>
                <select class="select2-size-lg form-select" id="category" name="parent_category">
                    <option data-icon="fa-solid fa-angle-right" value="">
                        Parent</option>
                    @foreach ($categories as $categoryRow)
                        {{-- @continue(isset($role) && $categoryRow->id == $role->id) --}}
                        <option data-icon="fa-solid fa-angle-right" value="{{ $categoryRow['id'] }}"
                            {{ (isset($category) ? $category->parent_id : old('parent_category')) == $categoryRow['id'] ? 'selected' : '' }}>
                            {{ $categoryRow['tree'] }}</option>
                    @endforeach
                </select>
                @error('parent_category')
                    <div class="invalid-feedback">{{ $message }}</div>
                @else
                    <p class="m-0">
                        <small class="text-muted">Select Parent Category.</small>
                    </p>
                @enderror
            </div>
        </div>

        <div class="row mb-1">
            <div class="col-lg-6 col-md-16 col-sm-12 position-relative">
                <label class="form-label" style="font-size: 15px" for="name">Name <span
                        class="text-danger">*</span></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                    name="name" placeholder="Name" value="{{ isset($category) ? $category->name : old('name') }}"
                    minlength="3" maxlength="50" />
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @else
                    <p class="m-0">
                        <small class="text-muted">Enter category name.</small>
                    </p>
                @enderror
            </div>

            <div class="col-lg-6 col-md-16 col-sm-12 position-relative">
                <label class="form-label" style="font-size: 15px" for="slug">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" placeholder="Slug" name="slug"
                    value="{{ isset($category) ? $category->slug : old('slug') }}" minlength="3" readonly
                    maxlength="50" />

                @error('slug')
                    <div class="invalid-feedback">{{ $message }}</div>
                @else
                    <p class="m-0">
                        <small class="text-muted">Category unique slug.</small>
                    </p>
                @enderror
            </div>
        </div>
    </div>
</div>
