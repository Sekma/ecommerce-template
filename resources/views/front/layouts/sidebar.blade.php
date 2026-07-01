<div class="position-sticky top-0 pt-3" style="height: calc(100vh - 80px); overflow-y: auto;">

    <div class="list-group list-group-flush">

        @foreach($categories as $category)

            <div class="mb-1">

                {{-- Catégorie principale --}}
                <div class="list-group-item border-0 d-flex justify-content-between align-items-center">

                    <a href="{{ route('products.category', $category->slug) }}"
                       class="text-decoration-none flex-grow-1 {{ $currentCategory && $currentCategory->id == $category->id ? 'fw-bold text-primary' : 'text-dark' }}">

                        {{ $category->name }}

                    </a>

                    @if($category->children->count())

                        <button
                            class="btn btn-sm p-0 border-0 bg-transparent ms-2"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#category-{{ $category->id }}"
                            aria-expanded="false"
                            aria-controls="category-{{ $category->id }}">

                            <i data-lucide="chevron-right"></i>

                        </button>

                    @endif

                </div>

                {{-- Sous-catégories --}}
                @if($category->children->count())

                    @php
                        $isOpen = $currentCategory &&
                            (
                                $currentCategory->id === $category->id ||
                                $category->children->contains('id', $currentCategory->id)
                            );
                    @endphp

                    <div class="collapse {{ $isOpen ? 'show' : '' }}" id="category-{{ $category->id }}">

                        <div class="ms-3 mb-2">

                            @foreach($category->children as $child)

                                <a href="{{ route('products.category', $child->slug) }}"
                                   class="d-block text-decoration-none small py-1 {{ $currentCategory && $currentCategory->id == $child->id ? 'fw-bold text-primary' : 'text-muted' }}">

                                    {{ $child->name }}

                                </a>

                            @endforeach

                        </div>

                    </div>

                @endif

            </div>

        @endforeach

    </div>

</div>