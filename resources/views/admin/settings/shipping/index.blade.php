<div class="row g-3">
    <div class="col-lg-12 col-md-12 col-sm-12 position-relative">

        <input type="hidden" name="tab" value="{{ $tab }}">
        <input type="hidden" name="section" value="{{ $section }}">
        @csrf
        <div class="row mb-3">
            <div class="col-12">
                {{-- <div class="card">
                    <div class="card-body">
                        
                    </div>
                </div> --}}

                <div class="nav-align-top mb-4">
                    <ul class="nav nav-pills mb-3" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a href="{{ route('admin.settings.index', ['tab' => 'shipping', 'section' => 'shipping_zone']) }}"
                                class="nav-link {{ $tab === 'shipping' && $section === 'shipping_zone' ? 'active' : '' }}"
                                role="tab">
                                <span>Shipping Zone</span>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="{{ route('admin.settings.index', ['tab' => 'shipping', 'section' => 'classes']) }}"
                                class="nav-link {{ $tab === 'shipping' && $section === 'classes' ? 'active' : '' }}"
                                role="tab">
                                <span>Classes</span>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="{{ route('admin.settings.index', ['tab' => 'shipping', 'section' => 'self_pickup']) }}"
                                class="nav-link {{ $tab === 'shipping' && $section === 'self_pickup' ? 'active' : '' }}"
                                role="tab">
                                <span>Self Pickup</span>
                            </a>
                        </li>
                    </ul>
                    @includeIf('admin.settings.shipping.' . $section . '.index')
                </div>
            </div>
        </div>
    </div>
</div>
