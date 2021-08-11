<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Clubs Registration</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
        <link rel="stylesheet" href="{{ asset('public/css/login.css') }}">
    </head>

    <body class="bg-blue-500 h-screen flex justify-centers">

        <div class="sm:container mx-auto px-2">
            <div class="max-w-lg mx-auto bg-white rounded overflow-hidden shadow-xl mt-20">
                <div class="bg-blue-600 p-2">
                    <img src="{{ asset('public/assets/img/logo/logonewcambridge.png') }}" alt="" class="block mx-auto">
                </div>
                <div class="p-8">
                    <p class="text-center text-gray-500 mt-0">Enter your username ans password to access Club Registration.</p>

                    
                    @if(session()->has('msg'))
                        <div class="alert mt-3 bg-red-500 text-white p-2 rounded">
                            <strong>{{ session()->get('msg') }}</strong>
                        </div>
                    @endif

                    <form action="{{ route('student.login.submit') }}" method="post" class="mt-4">
                        {{ csrf_field() }}

                        <div class="mb-2 flex flex-col text-gray-700">
                            <label for="username" class="mb-1"><i class="fas fa-user"></i> Username</label>
                            <input type="text" class="border-2 {{ $errors->has('username') ? 'border-red-500' : 'border-gray-300 focus:border-blue-500'}} p-2 rounded focus:outline-none" placeholder="Enter username" name="username" id="username" value="{{ old('username') }}">
                            @if($errors->has('username'))
                            <small class="text-red-600">
                                {{ $errors->first('username') }}
                            </small>
                            @endif
                        </div>

                        <div class="mb-2 flex flex-col text-gray-700">
                            <label for="password" class="mb-1"><i class="fas fa-lock"></i> Password</label>
                            <input type="password" class="border-2 {{ $errors->has('password') ? 'border-red-500' : 'border-gray-300 focus:border-blue-500'}} p-2 rounded focus:outline-none" placeholder="Enter password" name="password">
                            @if($errors->has('password'))
                            <small class="text-red-600">
                                {{ $errors->first('password') }}
                            </small>
                            @endif
                        </div>

                        <button type="submit" class="bg-blue-500 text-white p-2 rounded w-full block mt-7 transition-colors hover:bg-blue-600 focus:outline-none">Log In</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="fixed top-0 left-0 bg-gray-800 bg-opacity-60 w-full h-full px-4 hidden" id="modal">
            <div class="max-w-xl bg-white mx-auto rounded overflow-hidden" id="modal-con">
                <div class="bg-blue-400 text-white p-2 text-2xl font-bold relative">
                    <i class="fas fa-bullhorn"></i> Announcement

                    <button class="absolute right-0 text-white mr-2 pointer hover:opacity-90 focus:outline-none" data-dismiss="modal"><i class="fas fa-times"></i></button>
                </div>
                <div class="p-4 flex items-baseline">
                   <i class="fas fa-bookmark text-blue-400 mr-3"></i> ตั้งแต่วันที่ 1 กุมภาพันธ์ 2564 เป็นต้นไป การเรียน Club และ Bonus Tutorial จะปรับรูปแบบเป็นการเรียนสดที่สถาบันฯตามปกติ
                </div>
                <div class="text-center mb-3">
                    <button type="button" class="bg-blue-500 text-white px-5 py-2 rounded mt-7 transition-colors hover:bg-blue-600 focus:outline-none" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>

        <script>
            @if(session()->has('msg'))
            const alert = document.querySelector('.alert');
            setTimeout(() => {
                alert.remove()
            }, 2000)
            @endif


            const modal = document.getElementById('modal');
            const buttons = document.querySelectorAll('[data-dismiss="modal"]');

            window.onload = function() {
                modal.classList.add('show')
            }
 
            buttons.forEach(btn => {
                btn.addEventListener('click', removeModal)
            })

            window.addEventListener('click', outSideClick);

            function removeModal(e) {
                modal.classList.remove('show')
                setTimeout(function() {
                    modal.remove();
                }, 150);
            }

            function outSideClick(e) {
                if(e.target == modal) {
                    removeModal();
                }
            }
        </script>
    </body>
</html>