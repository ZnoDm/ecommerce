<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <!-- Style Importada Fisicamente Font Awesome -->
        <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
        <!-- Style CDN Glider-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/glider-js/1.7.7/glider.min.css" integrity="sha512-YM6sLXVMZqkCspZoZeIPGXrhD9wxlxEF7MzniuvegURqrTGV2xTfqq1v9FJnczH+5OGFl5V78RgHZGaK34ylVg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Style Importada Fisicamente Flex Slider-->
        <link rel="stylesheet" href="{{asset('vendor/flexslider/flexslider.css')}}">


        @livewireStyles
        <!-- JS CDN Glider-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/glider-js/1.7.7/glider.min.js" integrity="sha512-tHimK/KZS+o34ZpPNOvb/bTHZb6ocWFXCtdGqAlWYUcz+BGHbNbHMKvEHUyFxgJhQcEO87yg5YqaJvyQgAEEtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <!-- JQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- JS Importada Fisicamente Flex Slider -->
        <script src="{{asset('vendor/flexslider/jquery.flexslider-min.js')}}"></script>
        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>

        
        
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
        <script>
            
            function dropdown(){
                return {
                    open:false,
                    show(){
                        if(this.open){
                            this.open =false;
                        }else{
                            this.open = true;
                        }
                    }
                }
            }
        </script>

        @stack('script')
    </body>
</html>
