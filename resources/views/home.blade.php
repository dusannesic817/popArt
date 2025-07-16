<x-layout>
    <div class="container">
        <div class="row mt-5">
            <div class="col-2 p-0 border-end border-1 border-secondary">
                <aside class="vh-100 overflow-auto">
                    
                   @foreach ($categories as $category)
                           <x-sidebar :category="$category"/>
                    @endforeach                  
                </aside>
            </div>
            <div class="col-10">
                <div class="row">
                    @unless(count($products)==0)
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

