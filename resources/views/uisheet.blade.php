<x-app-layout layout="simple" :assets="$assets ?? []">
    <span class="uisheet screen-darken"></span>
    <div class="header"
        style="background: url({{ asset('images/dashboard/top-image.jpg') }}); background-size: cover; background-repeat: no-repeat; height: 100vh;position: relative;">
        <div class="main-img">
            <div class="container">
                <svg width="150" viewBox="0 0 55 55" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="-0.423828" y="34.5762" width="50" height="7.14286" rx="3.57143"
                        transform="rotate(-45 -0.423828 34.5762)" fill="white" />
                    <rect x="14.7295" y="49.7266" width="50" height="7.14286" rx="3.57143"
                        transform="rotate(-45 14.7295 49.7266)" fill="white" />
                    <rect x="19.7432" y="29.4902" width="28.5714" height="7.14286" rx="3.57143"
                        transform="rotate(45 19.7432 29.4902)" fill="white" />
                    <rect x="19.7783" y="-0.779297" width="50" height="7.14286" rx="3.57143"
                        transform="rotate(45 19.7783 -0.779297)" fill="white" />
                </svg>
                <h1 class="my-4">
                    <span>{{ env('APP_NAME') }} - Design System</span>
                </h1>
                <div class="d-flex justify-content-center align-items-center">
                    <div>
                        <a class="btn btn-lg btn-info d-flex" target="_self" href="{{ route('dashboard') }}">
                            Go To Setup
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </div>


</x-app-layout>
