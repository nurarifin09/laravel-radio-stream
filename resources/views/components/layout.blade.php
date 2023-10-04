<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Radio Islam Player</title>
        <meta name="theme-color" content="#6777ef"/>
        <link rel="apple-touch-icon" href="{{ asset('logo.PNG') }}">
        <link rel="manifest" href="{{ asset('/manifest.json') }}">
        <script src="https://cdn.tailwindcss.com?plugins=typography"></script>
    </head>
    <body class="min-h-screen bg-gray-50 font-sans text-black antialiased">
        <div class="mx-auto max-w-2xl px-6 py-24">
            @persist('logo')
                <a
                    href="/episodes"
                    wire:navigate
                    class="mx-auto flex max-w-max items-center gap-3 font-bold text-[#FF2D20] transition hover:opacity-80"
                >
                    <img
                        src="/images/logo.svg"
                        alt="Radio Islam"
                        class="mx-auto w-12"
                    />
                    <span>Radio Islam</span>
                </a>
            @endpersist

            <div class="py-10">
                {{ $slot }}
            </div>
        </div>

        @persist('player')
            <x-episode-player />
        @endpersist
        <script src="{{ asset('/sw.js') }}"></script>
        <script>
           if ("serviceWorker" in navigator) {
              // Register a service worker hosted at the root of the
              // site using the default scope.
              navigator.serviceWorker.register("/sw.js").then(
              (registration) => {
                 console.log("Service worker registration succeeded:", registration);
              },
              (error) => {
                 console.error(`Service worker registration failed: ${error}`);
              },
            );
          } else {
             console.error("Service workers are not supported.");
          }
        </script>
    </body>
</html>
