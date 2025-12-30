<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School-@yield('title', 'App')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack("css")
</head>
<body>
    <x-navbar />
    @if (Auth::check())
        <x-menubar />
    @endif
    <div class="container">
        @yield("content")
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @session("success")
                window.toastr.success("{{$value}}");
            @endsession
            @session("info")
                window.toastr.error("{{$value}}");
            @endsession
            @session("warning")
                window.toastr.error("{{$value}}");
            @endsession
            @session("error")
                window.toastr.error("{{$value}}");
            @endsession
            const forms = [...document.querySelectorAll("form")];

            forms.forEach(function (form) {
                if(form) {
                    form.addEventListener("submit", function(){
                        const formSubmitBtn = form.querySelector("button[type='submit']");
                        const formSubmitInput = form.querySelector("input[type='submit']");

                        if(formSubmitBtn){
                            formSubmitBtn.disabled = true;
                            formSubmitBtn.innerHTML += `
                                <div class="loader">
                                    <i class="fa-solid fa-arrows-rotate"></i>
                                </div>
                            `;
                        }else if(formSubmitInput) {
                            formSubmitInput.disabled = true;
                            formSubmitInput.innerHTML += `
                                <div class="loader">
                                    <i class="fa-solid fa-arrows-rotate"></i>
                                </div>
                            `;
                        }
                    })
                }
            })
        })
    </script>
    @stack("javascript")
</body>
</html>
