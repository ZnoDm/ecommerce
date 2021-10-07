<x-app-layout>

    <div class="container py-8">
        @foreach($categories as $category)
            <section class="mb-6 px-6">
                <div class="flex items-center mb-2">
                    <h1 class="text-lg uppercase font-semibold text-gray-700">
                        {{$category->name}}
                    </h1>
                    <a href="{{route('categories.show',$category)}}" class="text-orange-500 hover:text-orange-400 hover:underline ml-2 font-semibold">Ver más</a>
                </div>                

                @livewire('category-product', ['category' => $category])

            </section>   
        @endforeach
        
    </div>
    
    @push('script')
        <script>
            Livewire.on('glider',function(id){

            new Glider(document.querySelector('.glider-'+id), {
            slidesToScroll: 1,
            slidesToShow: 1,
            draggable: true,
            dots: '.glider-'+id+'~ .dots',
            arrows: {
                prev: '.glider-'+id+'~ .glider-prev',
                next: '.glider-'+id+'~ .glider-next'
            },
            responsive:[
                {
                    breakpoint:640,
                    settings:{
                        slidesToScroll: 2,
                        slidesToShow: 2.5,
                    }
                },
                {
                    breakpoint:768,
                    settings:{
                        slidesToScroll: 3,
                        slidesToShow: 3.5,
                    }
                },
                {
                    breakpoint:1024,
                    settings:{
                        slidesToScroll: 4,
                        slidesToShow: 4.5,
                    }
                },
                {
                    breakpoint:1280,
                    settings:{
                        slidesToScroll: 5,
                        slidesToShow: 5.5,
                    }
                }
            ]
            });

            });
        </script>
    @endpush

</x-app-layout>