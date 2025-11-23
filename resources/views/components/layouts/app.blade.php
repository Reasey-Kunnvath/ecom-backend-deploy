<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Page Title' }}</title>
    <!--Favicon-->
    <link rel="Sortcut Icon" href=" {{ asset('Images/Favicon.png') }}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])



    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
    @livewireStyles
</head>

<body class="bg-gray-50 dark:bg-gray-900">
    <div class="antialiased bg-gray-50 dark:bg-gray-900">


        <!-- Navber -->
        @include('components.partials.navbar')

        <!-- Sidebar -->
        @include('components.partials.sidebar')


        <main class="p-4 md:ml-80 h-auto pt-20 ">
            {{ $slot }}

        </main>
    </div>
    @stack('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.46.0/dist/apexcharts.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    @livewireScripts

    <script type="text/javascript">
        // Dark Mode
        var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

        // Change the icons inside the button based on previous settings
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            themeToggleLightIcon.classList.remove('hidden');
        } else {
            themeToggleDarkIcon.classList.remove('hidden');
        }

        var themeToggleBtn = document.getElementById('theme-toggle');

        themeToggleBtn.addEventListener('click', function() {

            // toggle icons inside button
            themeToggleDarkIcon.classList.toggle('hidden');
            themeToggleLightIcon.classList.toggle('hidden');

            // if set via local storage previously
            if (localStorage.getItem('color-theme')) {
                if (localStorage.getItem('color-theme') === 'light') {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                }

                // if NOT set via local storage previously
            } else {
                if (document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                } else {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                }
            }

        });
        //End Dark Mode
    </script>
    <script type="text/javascript">
        // document.getElementById('printOrder').addEventListener('click', event => {
        //     window.print();
        // });
        // Sweet Alert
        document.addEventListener('sweet.confirm-delete', event => {
            Swal.fire({
                text: event.detail.message,
                icon: "warning",
                backdrop: `rgba(0,0,123,0.4)`,
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, I'm sure!"
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch('deleteConfirmed');
                }
            });
        });
        document.addEventListener('sweet.delete-success', event => {
            Swal.fire({
                title: "លុបបានសម្រាច់​ Bye!",
                text: event.detail.message,
                icon: "success",
                backdrop: `rgba(0,0,123,0.4)`
            });
        });
        document.addEventListener('sweet.warning', function() {
            Swal.fire({
                title: "កែរួចហើយបង!",
                text: event.detail.message,
                icon: "success",
            });
        });
        document.addEventListener('sweet.success', function() {
            Swal.fire({

                icon: "success",
                title: event.detail.message,
                showConfirmButton: false,
                draggable: true,
                timer: 1500
            });
        });
        document.addEventListener('sweet.error', function() {
            Swal.fire({
                icon: "error",
                title: event.detail.message,
                text: "សូមពិនិត្យមើល​ម្ដងទៀត!",
                timer: 5000
            });
        });
        document.addEventListener('sweet.error-system', function() {
            Swal.fire({
                icon: "error",
                title: event.detail.message,
                text: "សូមទាក់ទងទៅអ្នកគ្រប់គ្រងប្រព័ន្ធ!",
                timer: 5000
            });
        })
        document.addEventListener('livewire:load', function() {
            Livewire.hook('message.processed', (message, component) => {
                $.LoadingOverlay("show");
            });
        });

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        // Success = green
        window.addEventListener('sweet.toast-success', event => {
            Toast.fire({
                icon: 'success',
                title: event.detail.message,
                background: '#d1fae5', // Tailwind green-100
                iconColor: '#065f46' // Tailwind green-800
            });
        });

        // Error = red
        window.addEventListener('sweet.toast-error', event => {
            Toast.fire({
                icon: 'error',
                title: event.detail.message,
                background: '#fee2e2', // Tailwind red-100
                iconcolor: '#991b1b' // Tailwind red-800
            });
        });

        // Warning = light orange
        window.addEventListener('sweet.toast-warning', event => {
            Toast.fire({
                icon: 'warning',
                title: event.detail.message,
                background: '#ffedd5', // Tailwind orange-100
                iconcolor: '#c2410c' // Tailwind orange-800
            });
        });

        window.addEventListener('sweet.toast-info', event => {
            Toast.fire({
                icon: 'info',
                title: event.detail.message,
                background: '#fff', // Tailwind orange-100
                iconcolor: '#c2410c'
            });
        });
        // window.addEventListener('livewire:navigated', function() {
        //     $.LoadingOverlaySetup({
        //         background: "rgba(255, 255, 255, 0.4)",
        //         image: "{{ asset('Images/SVG/adminloading.gif') }}",
        //         imageAnimation: " linear",
        //     });
        //     $.LoadingOverlay("show");

        //     setTimeout(function() {
        //         $.LoadingOverlay("hide");
        //     }, 1000);
        // });
        // window.addEventListener('load', function() {
        //     $.LoadingOverlay("show");

        //     setTimeout(function() {
        //         $.LoadingOverlay("hide");
        //     }, 2000);
        // });
    </script>
</body>

</html>
