<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GoodBasket</title>
    <link rel="manifest" href="manifest.json" />
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
    <div id="app">
        <v-app>
            <v-layout>
                <app-header></app-header>
        
                <v-main class="d-flex align-center justify-center">
                    <v-container>
                        <router-view></router-view>
                    </v-container>
                </v-main>
            </v-layout>
        </v-app>
    </div>

    <!-- scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/sw.js');
            });
        }
    </script>

</body>
</html>