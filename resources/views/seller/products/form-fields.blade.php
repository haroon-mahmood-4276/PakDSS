<div class="row g-3">
    <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 position-relative">

        <div class="card mb-3">
            <div class="card-body">

                <div class="row mb-3">
                    <div class="col-lg-12 col-md-12 col-sm-12 position-relative">
                        <label class="form-label" style="font-size: 15px" for="name">Name <span
                                class="text-danger">**</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" placeholder="Name"
                            value="{{ isset($product) ? $product->name : old('name') }}" minlength="1"
                            {{ isset($isReadOnly) && $isReadOnly ? 'readonly' : '' }} maxlength="120" />
                        <input type="hidden" id="permalink" name="permalink"
                            value="{{ isset($product) ? $product->permalink : old('permalink') }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @else
                            <p class="m-0" id="permalink-text">
                                {{ env('APP_URL') }}/products/{{ isset($product) ? $product->permalink : old('permalink') }}
                            </p>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-6 col-md-6 col-sm-12 position-relative">
                        <label class="form-label" style="font-size: 15px" for="sku">SKU <span
                                class="text-danger">**</span></label>
                        <input type="text" class="form-control @error('sku') is-invalid @enderror" id="sku"
                            name="sku" placeholder="SKU" value="{{ isset($product) ? $product->sku : old('sku') }}"
                            {{ isset($isReadOnly) && $isReadOnly ? 'readonly' : '' }} />
                        @error('sku')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @else
                            <p class="m-0">
                                <small class="text-muted">Enter product SKU.</small>
                            </p>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-6 col-md-6 col-sm-12 position-relative">
                        <label class="form-label" style="font-size: 15px" for="price">Price <span
                                class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('price') is-invalid @enderror" id="price"
                            name="price" placeholder="Price" {{ isset($isReadOnly) && $isReadOnly ? 'readonly' : '' }}
                            value="{{ isset($product) ? $product->price : old('price') }}" />
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @else
                            <p class="m-0">
                                <small class="text-muted">Enter product price.</small>
                            </p>
                        @enderror
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 position-relative">
                        <label class="form-label" style="font-size: 15px" for="discounted_price">Discounted
                            Price</label>
                        <input type="number" class="form-control @error('discounted_price') is-invalid @enderror"
                            id="discounted_price" name="discounted_price" placeholder="Discounted Price"
                            value="{{ isset($product) ? $product->discounted_price : old('discounted_price') }}"
                            {{ isset($isReadOnly) && $isReadOnly ? 'readonly' : '' }} />
                        @error('discounted_price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @else
                            <p class="m-0">
                                <small class="text-muted">Enter product discounted price.</small>
                            </p>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-6 col-md-6 col-sm-12 position-relative">
                        <div class="d-flex flex-column justify-content-center h-100">
                            <div class="form-check">
                                <input type="hidden" value="0" name="call_for_final_rates">
                                <input class="form-check-input" type="checkbox" value="1" id="call_for_final_rates"
                                    {{ isset($isReadOnly) && $isReadOnly ? 'disabled' : '' }}
                                    {{ isset($product) && $product->call_for_final_rates ? 'checked' : '' }}
                                    name="call_for_final_rates">
                                <label class="form-check-label" for="call_for_final_rates">
                                    Call for final rates
                                </label>
                            </div>
                            @error('discounted_price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @else
                                <p class="m-0">
                                    <small class="text-muted">Check if rates are not finalized. Such orders will be
                                        confirmed over the call.</small>
                                </p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 position-relative">
                        <div class="d-flex flex-column justify-content-center h-100">
                            <div class="form-check">
                                <input type="hidden" value="0" name="are_rates_printed_on_package">
                                <input class="form-check-input" type="checkbox" value="1"
                                    {{ isset($isReadOnly) && $isReadOnly ? 'disabled' : '' }}
                                    {{ isset($product) && $product->are_rates_printed_on_package ? 'checked' : '' }}
                                    id="are_rates_printed_on_package" name="are_rates_printed_on_package">
                                <label class="form-check-label" for="are_rates_printed_on_package">
                                    Are rates printed on product/item/package
                                </label>
                            </div>
                            @error('discounted_price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @else
                                <p class="m-0">
                                    <small class="text-muted">Check if rates are printed on the
                                        product/item/package.</small>
                                </p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-12 col-md-12 col-sm-12 position-relative">
                        <div class="d-flex justify-content-between">
                            <label class="form-label" style="font-size: 15px" for="dimentions">Dimentions <small
                                    class="text-muted">If product has only 1 or 2
                                    dimentions, put "1" in other dimention.</small></label>
                            <p id="p-dimentions" class="m-0" style="min-width: fit-content;">Total: <span
                                    id="span-dimentions-value">0.00</span> cm</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-12 position-relative">
                        <label class="form-label" style="font-size: 15px" for="weight">Length</label>
                        <input type="number" class="form-control @error('length') is-invalid @enderror"
                            id="length" name="length" placeholder="Length(cm)"
                            value="{{ isset($product) ? $product->length : old('length') }}"
                            {{ isset($isReadOnly) && $isReadOnly ? 'readonly' : '' }} />
                        @error('length')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @else
                            <p class="m-0">
                                <small class="text-muted">Enter length of product in cm.</small>
                            </p>
                        @enderror
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-12 position-relative">
                        <label class="form-label" style="font-size: 15px" for="weight">Width</label>
                        <input type="number" class="form-control @error('width') is-invalid @enderror"
                            id="width" name="width" placeholder="width(cm)"
                            value="{{ isset($product) ? $product->width : old('width') }}"
                            {{ isset($isReadOnly) && $isReadOnly ? 'readonly' : '' }} />
                        @error('width')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @else
                            <p class="m-0">
                                <small class="text-muted">Enter width of product in cm.</small>
                            </p>
                        @enderror
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-12 position-relative">
                        <label class="form-label" style="font-size: 15px" for="weight">Height</label>
                        <input type="number" class="form-control @error('height') is-invalid @enderror"
                            id="height" name="height" placeholder="height(cm)"
                            value="{{ isset($product) ? $product->height : old('height') }}"
                            {{ isset($isReadOnly) && $isReadOnly ? 'readonly' : '' }} />
                        @error('height')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @else
                            <p class="m-0">
                                <small class="text-muted">Enter height of product in cm.</small>
                            </p>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-4 col-md-4 col-sm-12 position-relative">
                        <div class="d-flex align-items-center h-100">
                            <div>
                                <label class="form-check">
                                    <input class="form-check-input" id="calculate_weight_from_dimentions"
                                        name="calculate_weight_from_dimentions" type="checkbox" value="1">
                                    <span class="form-check-label"> Calculate approx weight (KG) from above
                                        dimentions?</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-12 position-relative">
                        <label class="form-label" style="font-size: 15px" for="weight">Weight</label>
                        <input type="number" class="form-control @error('weight') is-invalid @enderror"
                            id="weight" name="weight" placeholder="Weight"
                            {{ isset($isReadOnly) && $isReadOnly ? 'readonly' : '' }}
                            value="{{ isset($product) ? $product->weight : old('weight') }}" />
                        @error('weight')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @else
                            <p class="m-0">
                                <small class="text-muted">Enter product's weight.</small>
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
                            name="short_description" placeholder="Short Description" minlength="1" rows="5"
                            {{ isset($isReadOnly) && $isReadOnly ? 'readonly' : '' }}>
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
                            name="long_description" placeholder="Full Description" minlength="1" rows="5"
                            {{ isset($isReadOnly) && $isReadOnly ? 'readonly' : '' }}>
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
                        <input type="text"
                            class="form-control-tagify w-100 @error('meta_keywords') is-invalid @enderror"
                            id="meta_keywords" name="meta_keywords" placeholder="Meta Keywords"
                            {{ isset($isReadOnly) && $isReadOnly ? 'readonly' : '' }}
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
                        </label>

                        <textarea class="form-control @error('meta_description') is-invalid @enderror" id="meta_description"
                            name="meta_description" placeholder="Meta Description" {{ isset($isReadOnly) && $isReadOnly ? 'readonly' : '' }}
                            minlength="1" maxlength="254" rows="5">{{ isset($product) ? $product->meta_description : old('meta_description') }}</textarea>

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
        <div class="top-lg-20px top-md-20px top-sm-10px" style="z-index: auto;">
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
                                        <small class="text-muted">Upload product images. (3 images only, Max Size:
                                            536KB)</small>
                                    </p>
                                @enderror
                            </div>

                        </div>
                    </div>

                    @if (!isset($isReadOnly))
                        <hr>

                        <div class="row g-3">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <button type="submit" class="btn btn-success w-100 text-white buttonToBlockUI">
                                    <i class="fa-solid fa-floppy-disk icon mx-2"></i>
                                    {{ isset($product) ? 'Update' : 'Save' }} Product
                                </button>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <a href="{{ route('seller.products.index') }}" class="btn btn-danger w-100 ">
                                    <i class="fa-solid fa-xmark icon mx-2"></i>
                                    Cancel
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <label class="form-label" style="font-size: 15px" for="shop">Shops <span
                                    class="text-danger">*</span></label>
                            <select class="select2-size-lg form-select" id="shop" name="shop"
                                {{ isset($isReadOnly) && $isReadOnly ? 'disabled' : '' }}>
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
                            <label class="form-label" style="font-size: 15px" for="brand">Brand</label>
                            <select class="select2-size-lg form-select" id="brand"
                                {{ isset($isReadOnly) && $isReadOnly ? 'disabled' : '' }} name="brand">
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
                            <label class="form-label" style="font-size: 15px" for="categories">Categories
                                <span class="text-danger">*</span></label>
                            <select class="select2-size-lg-multiple form-select"
                                {{ isset($isReadOnly) && $isReadOnly ? 'disabled' : '' }} id="categories"
                                name="categories[]" multiple>
                                @foreach ($categories as $key => $category)
                                    <option value="{{ $category->id }}"
                                        {{ in_array($category->id, isset($product) ? $product->categories->pluck('id')->toArray() : old('categories') ?? []) ? 'selected' : '' }}>
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
                            <select class="select2-size-lg-multiple form-select"
                                {{ isset($isReadOnly) && $isReadOnly ? 'disabled' : '' }} id="tags"
                                name="tags[]" multiple>
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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-block mb-1">
                                <label class="form-label" style="font-size: 15px" for="product_pdf">PDF</label>
                                <input id="product_pdf" type="file"
                                    class="filepond m-0 @error('product_pdf') is-invalid @enderror"
                                    name="product_pdf" />
                                @error('product_pdf')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @else
                                    <p class="m-0">
                                        <small class="text-muted">Upload product PDF. (Max Size: 15MB)</small>
                                    </p>
                                @enderror
                            </div>

                        </div>

                        <div class="col-md-12">
                            <div class="d-block mb-1">
                                <label class="form-label" style="font-size: 15px" for="product_video">Product
                                    Video</label>
                                <input id="product_video" type="file"
                                    class="filepond m-0 @error('product_video') is-invalid @enderror"
                                    name="product_video" />
                                @error('product_video')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @else
                                    <p class="m-0">
                                        <small class="text-muted">Upload product video. (Max Size: 15MB)</small>
                                    </p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if (!isset($isReadOnly))
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-warning d-flex align-items-baseline" role="alert">
                            <span class="alert-icon alert-icon-lg text-primary me-2">
                                <i class="ti ti-exclamation-mark ti-sm"></i>
                            </span>
                            <div class="d-flex flex-column ps-1">
                                <h5 class="alert-heading mb-2">Note!</h5>
                                <p class="mb-0"><span class="text-danger">*</span> means required field. <br>
                                    <span class="text-danger">**</span> means required field and must be unique.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
