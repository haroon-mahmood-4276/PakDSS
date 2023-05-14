<div class="row g-3">
    <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 position-relative">

        <div class="card mb-3">
            <div class="card-body">

                <div class="row mb-3">
                    <div class="col-lg-12 col-md-12 col-sm-12 position-relative">
                        <label class="form-label" style="font-size: 15px" for="name">Name <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" placeholder="Name"
                            value="{{ isset($product) ? $product->name : old('name') }}" minlength="1"
                            maxlength="50" />
                        <input type="hidden" id="permalink" name="permalink"
                            value="{{ isset($product) ? $product->permalink : old('permalink') }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @else
                            <p class="m-0" id="permalink-text">
                                {{ env('APP_URL') }}:8000/products/{{ isset($product) ? $product->permalink : old('permalink') }}
                            </p>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-6 col-md-6 col-sm-12 position-relative">
                        <label class="form-label" style="font-size: 15px" for="sku">SKU <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('sku') is-invalid @enderror" id="sku"
                            name="sku" placeholder="SKU"
                            value="{{ isset($product) ? $product->sku : old('sku') }}" />
                        @error('sku')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @else
                            <p class="m-0">
                                <small class="text-muted">Enter product SKU.</small>
                            </p>
                        @enderror
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 position-relative">
                        <label class="form-label" style="font-size: 15px" for="price">Price <span
                                class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('price') is-invalid @enderror" id="price"
                            name="price" placeholder="Price"
                            value="{{ isset($product) ? $product->price : old('price') }}" />
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @else
                            <p class="m-0">
                                <small class="text-muted">Enter product price.</small>
                            </p>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-12 col-md-12 col-sm-12 position-relative">
                        <label class="form-label" style="font-size: 15px" for="short_description">
                            Short Description
                            <span class="text-danger">*</span>
                        </label>

                        <textarea class="form-control descriptions @error('short_description') is-invalid @enderror" id="short_description"
                            name="short_description" placeholder="Short Description" minlength="1" maxlength="254" rows="5">
                            {!! isset($product) ? $product->short_description : old('short_description') !!}</textarea>

                        @error('short_description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @else
                            <p class="m-0">
                                <small class="text-muted">Enter product short description.</small>
                            </p>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-12 col-md-12 col-sm-12 position-relative">
                        <label class="form-label" style="font-size: 15px" for="long_description">
                            Full Description
                            <span class="text-danger">*</span>
                        </label>

                        <textarea class="form-control descriptions @error('long_description') is-invalid @enderror" id="long_description"
                            name="long_description" placeholder="Full Description" minlength="1" maxlength="254" rows="5">
                            {!! isset($product) ? $product->long_description : old('long_description') !!}</textarea>

                        @error('long_description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @else
                            <p class="m-0">
                                <small class="text-muted">Enter product full description.</small>
                            </p>
                        @enderror
                    </div>
                </div>

            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3>Meta Information</h3>
            </div>
            <div class="card-body">

                <div class="row mb-3">
                    <div class="col-lg-12 col-md-12 col-sm-12 position-relative">
                        <label class="form-label" style="font-size: 15px" for="meta_keywords">Meta Keywords </label>
                        <input type="text" class="form-control-tagify @error('meta_keywords') is-invalid @enderror"
                            id="meta_keywords" name="meta_keywords" placeholder="Meta Keywords"
                            value="{{ isset($product) ? $product->meta_keywords : old('meta_keywords') }}" />
                        @error('meta_keywords')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @else
                            <small class="text-muted">Enter keywords for meta.</small>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 position-relative">
                        <label class="form-label" style="font-size: 15px" for="meta_description">
                            Meta Description
                            <span class="text-danger">*</span>
                        </label>

                        <textarea class="form-control @error('meta_description') is-invalid @enderror" id="meta_description"
                            name="meta_description" placeholder="Meta Description" minlength="1" maxlength="254" rows="5">{{ isset($product) ? $product->meta_description : old('meta_description') }}</textarea>

                        @error('meta_description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @else
                            <p class="m-0">
                                <small class="text-muted">Enter product full description.</small>
                            </p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 position-relative">
        <div class="sticky-md-top top-lg-20px top-md-20px top-sm-10px" style="z-index: auto;">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <label class="form-label" style="font-size: 15px" for="shop">Shops <span
                                    class="text-danger">*</span></label>
                            <select class="select2-size-lg form-select" id="shop" name="shop">
                                @foreach ($shops as $key => $shop)
                                    <option data-icon="material-icons md-keyboard_arrow_right"
                                        value="{{ $shop->id }}"
                                        {{ (isset($product) ? $product->shop_id : old('shop')) == $shop->id ? 'selected' : '' }}>
                                        {{ Str::of($shop->name)->replace('_', ' ') }}</option>
                                @endforeach
                            </select>
                            @error('shop')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @else
                                <p class="m-0">
                                    <small class="text-muted">Select shop for product.</small>
                                </p>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <label class="form-label" style="font-size: 15px" for="brand">Brand <span
                                    class="text-danger">*</span></label>
                            <select class="select2-size-lg form-select" id="brand" name="brand">
                                @foreach ($brands as $key => $brand)
                                    <option data-icon="material-icons md-keyboard_arrow_right"
                                        value="{{ $brand->id }}"
                                        {{ (isset($product) ? $product->brand_id : old('brand')) == $brand->id ? 'selected' : '' }}>
                                        {{ Str::of($brand->name)->replace('_', ' ') }}</option>
                                @endforeach
                            </select>
                            @error('brand')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @else
                                <p class="m-0">
                                    <small class="text-muted">Select brand for product.</small>
                                </p>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <label class="form-label" style="font-size: 15px" for="categories">Categories <span
                                    class="text-danger">*</span></label>
                            <select class="select2-size-lg-multiple form-select" id="categories" name="categories[]"
                                multiple>
                                @foreach ($categories as $key => $category)
                                    <option value="{{ $category->id }}"
                                        {{ in_array($category->id, (isset($product) ? $product->categories->pluck('id')->toArray() : old('categories') ?? [])) ? 'selected' : '' }}>
                                        {{ Str::of($category->tree)->replace('_', ' ') }}</option>
                                @endforeach
                            </select>
                            @error('categories')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @else
                                <p class="m-0">
                                    <small class="text-muted">Select categories for product.</small>
                                </p>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <label class="form-label" style="font-size: 15px" for="tags">Tags</label>
                            <select class="select2-size-lg-multiple form-select" id="tags" name="tags[]"
                                multiple>
                                @foreach ($tags as $key => $tag)
                                    <option value="{{ $tag->id }}"
                                        {{ in_array($tag->id, isset($product) ? $product->tags->pluck('id')->toArray() : old('tags') ?? []) ? 'selected' : '' }}>
                                        {{ Str::of($tag->name)->replace('_', ' ') }}
                                    </option>
                                @endforeach
                            </select>
                            @error('tags')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @else
                                <p class="m-0">
                                    <small class="text-muted">Select tags for product.</small>
                                </p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <div class="d-block mb-1">
                                <label class="form-label" style="font-size: 15px" for="product_images">Images</label>
                                <input id="product_images" type="file"
                                    class="filepond m-0 @error('product_images') is-invalid @enderror"
                                    name="product_images[]" accept="image/png, image/jpeg, image/gif" multiple />
                                @error('product_images')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @else
                                    <p class="m-0">
                                        <small class="text-muted">Upload product images.</small>
                                    </p>
                                @enderror
                            </div>

                        </div>
                    </div>

                    <hr>

                    <div class="row g-3">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <button type="submit" class="btn btn-success w-100 text-white buttonToBlockUI">
                                <i class="material-icons md-save"></i>
                                {{ isset($product) ? 'Update' : 'Save' }} Product
                            </button>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <a href="{{ route('seller.products.index') }}" class="btn btn-danger w-100 ">
                                <i class="material-icons md-cancel"></i>
                                Cancel
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="alert alert-primary alert-dismissible d-flex align-items-baseline show fade"
                        role="alert">
                        <span class="alert-icon alert-icon-lg text-info me-2">
                            <i class="material-icons md-48 md-info"></i>
                        </span>
                        <div class="d-flex flex-column ps-1">
                            <h4 class="alert-heading mb-2">Information!</h4>
                            <div class="alert-body">
                                <span class="text-danger">*</span> means required field. <br>
                                <span class="text-danger">**</span> means required field and must be unique.
                            </div>
                            {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button> --}}
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="alert alert-warning alert-dismissible d-flex align-items-baseline show fade"
                        role="alert">
                        <span class="alert-icon alert-icon-lg text-warning me-2">
                            <i class="material-icons md-48 md-warning"></i>
                        </span>
                        <div class="d-flex flex-column ps-1">
                            <h4 class="alert-heading mb-2">Note!</h4>
                            <div class="alert-body">
                                Our inspector will visit your products for verification. Please try to enter right
                                product information.
                            </div>
                            {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
