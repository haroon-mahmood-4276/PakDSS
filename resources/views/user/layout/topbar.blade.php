@php
    $categories = getParentWithChildHierarchy(new App\Models\Category());
@endphp

<aside id="layout-menu" class="layout-menu-horizontal menu-horizontal menu bg-menu-theme flex-grow-0">
    <div class="container-xxl d-flex h-100">
        <ul class="menu-inner">
            {{-- Level 1 --}}
            @forelse ($categories as $category)
                <li class="menu-item">
                    <a href="javascript:void(0)" class="menu-link @if ($category->children->isNotEmpty()) menu-toggle @endif">
                        <i class="menu-icon tf-icons ti ti-smart-home"></i>
                        <div>{{ $category->name }}</div>
                    </a>

                    {{-- Level 2 --}}
                    @if ($category->children->isNotEmpty())
                        <ul class="menu-sub">
                            @forelse ($category->children as $subCategory)
                                <li class="menu-item">
                                    <a href="index.html"
                                        class="menu-link @if ($subCategory->children->isNotEmpty()) menu-toggle @endif">
                                        <i class="menu-icon tf-icons ti ti-chart-pie-2"></i>
                                        <div>{{ $subCategory->name }}</div>
                                    </a>

                                    {{-- Level 3 --}}
                                    @if ($subCategory->children->isNotEmpty())
                                        <ul class="menu-sub">
                                            @forelse ($subCategory->children as $subSubCategory)
                                                <li class="menu-item">
                                                    <a href="index.html"
                                                        class="menu-link @if ($subSubCategory->children->isNotEmpty()) menu-toggle @endif">
                                                        <div>{{ $subSubCategory->name }}</div>
                                                    </a>

                                                    {{-- Level 4 --}}
                                                    @if ($subSubCategory->children->isNotEmpty())
                                                        <ul class="menu-sub">
                                                            @forelse ($subSubCategory->children as $subSubSubCategory)
                                                                <li class="menu-item">
                                                                    <a href="index.html"
                                                                        class="menu-link @if ($subSubSubCategory->children->isNotEmpty()) menu-toggle @endif">
                                                                        <div>{{ $subSubSubCategory->name }}</div>
                                                                    </a>

                                                                    {{-- Level 5 --}}
                                                                    @if ($subSubCategory->children->isNotEmpty())
                                                                        <ul class="menu-sub">
                                                                            @forelse ($subSubCategory->children as $subSubSubSubCategory)
                                                                                <li class="menu-item">
                                                                                    <a href="index.html"
                                                                                        class="menu-link @if ($subSubSubSubCategory->children->isNotEmpty()) menu-toggle @endif">
                                                                                        <div>
                                                                                            {{ $subSubSubSubCategory->name }}
                                                                                        </div>
                                                                                    </a>

                                                                                </li>
                                                                            @empty
                                                                            @endforelse
                                                                        </ul>
                                                                    @endif
                                                                </li>
                                                            @empty
                                                            @endforelse
                                                        </ul>
                                                    @endif
                                                </li>
                                            @empty
                                            @endforelse
                                        </ul>
                                    @endif
                                </li>
                            @empty
                            @endforelse
                        </ul>
                    @endif
                </li>
            @empty
            @endforelse
        </ul>
    </div>
</aside>
