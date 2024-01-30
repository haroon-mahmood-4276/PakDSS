<div class="row g-3">
    <div class="col-lg-12 col-md-12 col-sm-12 position-relative">
        <div class="row mb-3">
            <div class="col-12">
                <div class="nav-align-top mb-4">
                    <ul class="nav nav-pills mb-3" role="tablist">
                        @foreach ($sections as $key => $rowSection)
                            <li class="nav-item" role="presentation">
                                <a href="{{ route('admin.settings.index', ['tab' => $tab, 'section' => $key]) }}"
                                    class="nav-link {{ $section === $key ? 'active' : '' }}" role="tab">
                                    <span>{{ is_array($rowSection) ? $rowSection['title'] : $rowSection }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    @includeIf('admin.settings.' . $tab . '.' . $section . '.index')
                </div>
            </div>
        </div>
    </div>
</div>
