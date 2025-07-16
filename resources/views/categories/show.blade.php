<x-layout>


    <div class="container">

        <div class="row mt-5">
            <div class="col-2 p-0 border-end border-1 border-secondary">
                <aside class="vh-100 overflow-auto">

                    @foreach ($children as $child)
                        <x-sidebar :category="$child" />
                    @endforeach
                </aside>
            </div>
            <div class="col-10">
                <div class="row">
                    <nav aria-label="breadcrumb ms-2">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            @foreach ($breadcrumbs as $crumb)
                                <x-breadcrumbs :crumb="$crumb" :isLast="$loop->last" />
                            @endforeach
                        </ol>
                    </nav>

                </div>
                <div class="row">
                    @unless (count($products) == 0)
                        @foreach ($products as $product)
                            <div class="col-md-3 mb-4">
                                <x-products-card :product="$product" />
                            </div>
                        @endforeach
                    @endunless
                </div>
            </div>
        </div>
    </div>

</x-layout>
