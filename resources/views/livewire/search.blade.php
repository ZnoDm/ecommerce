<div class="flex-1 relative" x-data>
    <form action="{{route('search')}}" autocomplete="off">
        <x-jet-input name="name" wire:model="search" type="text" class="w-full text-sm" placeholder="¿Estás buscando algún producto?" />

        <button class="absolute top-0 right-0 w-12 h-full bg-orange-500 flex items-center justify-center rounded-r-md">
            <x-search size="35" color="white" />
        </button>
    </form>
    <div class="absolute w-full hidden" :class="{'hidden': !$wire.open}" @click.away="$wire.open=false">
        <div class="bg-white rounded-lg shadow mt-1">
            <div class="px-3 py-3">
                @forelse ($products as $product)
                    <a href="{{route('products.show',$product)}}" class="flex py-1 {{$loop->last ? '':'border-b border-gray-200'}}">
                        <img class="h-12 w-16 object-cover object-center" src="{{Storage::url($product->images->first()->url)}}" alt="">
                        <div class="ml-4 text-gray-700">
                            <p class="text-base font-semibold leading-5">{{$product->name}}</p>
                            <p class="text-sm">Categoría: {{$product->subcategory->category->name}}</p>
                        </div>
                    </a>
                @empty
                    <p class="text-sm leading-5">
                        No existe ningún producto similar.
                    </p>
                @endforelse
            </div>
        </div>
    </div>
</div>
