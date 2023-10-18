<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>
            {{ __('msg.projettitel') }}
        </title>
        <link rel="icon" type="image/x-icon" href="{{asset('./images/x.jpg')}}">

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
        <!--fontawesome cdn link-->
        <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        />

        <link rel="stylesheet" href="{{asset('build/assets/app-f49f4b9b.css')}}">
        <script type="module" scr="{{asset('build/assets/app-5c5b5477.js')}}"></script>

    </head>
    <body  class=" w-full  font-cairo overflow-x-hidden flex-col relative bg-white flex justify-start items-center">
        <!-- Get nav From navbar.blade.php -->
        @include('navbar')
        <!-- Side Bar Main -->
        // set direction
        @if (session('local')=='en')
        {{$dir='ltr'}}
        @else
        {{$dir='rtl'}}
        @endif

        <main dir="{{$dir}}" class="hero  w-full flex flex-col justify-start items-center gap-3">
            <div class="bg-color z-0 absolute left-0 top-0 w-full h-full bg-slate-500/40"></div>
            <div class=" sidebar fixed shadow-md gap-5  z-50 top-0 -right-[100vw] h-screen flex flex-col min-w-[300px] p-3 justify-start items-center bg-white ">
                <div class="cancel flex w-full justify-between  items-center ">
                    <h3
                    class="text-slate-500 text-xl font-semibold"
                    >
                    {{ __('msg.navtitle') }}
                    </h3>
                    <i
                    onclick="remove()"
                    class="fas fa-times text-slate-500 text-xl cursor-pointer"
                    >
                    </i>
                </div>
                <div class="btn-container mt-5 flex gap-2 w-full items-center justify-center">

                    <a >
                    <button onclick="hiderecord()" id="livebutton"
                    class="bg-blue-500 text-white  px-4 py-2 rounded-md hover:bg-blue-600 transition-colors duration-300 ease-out"
                    >
                    {{ __('msg.courslive') }}
                    </button>
                    </a>
                </div>

                <div id="divlive"  class="links overflow-auto flex w-full  flex-col justify-center items-center">
                    @foreach ($livecourses as $course)
                        <a href="/LiveCourses/Course/{{$course->id}}"
                        class="w-full hover:bg-slate-400/40 transition-colors ease-out duration-500 hover:border-l-2 hover:border-blue-800  flex items-center justify-start  px-4 py-2 text-slate-600">
                        @if (session('local')=='en')
                        {{$course->name_en}}
                        @else
                        {{$course->name}}
                        @endif
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="menu-bar  z-10 w-full mt-20 border-b-[1.4px] border-slate-200  flex justify-between  gap-4 items-center flex-row   px-4 py-4">
                <div
                onClick="add()"
                class="menu hover:text-blue-400  ease-in-out duration-300 transition-all  text-2xl cursor-pointer text-white flex justify-center items-center gap-2">
                    <i
                    class="fas fa-bars  "
                    >
                    </i>
                    {{ __('msg.buttonnav') }}
                </div>
                @include('login')

            </div>
            <section
            class="w-full  z-10 flex flex-col justify-center items-center md:items-start gap-5 mt-20  px-5"
            >
            <h1
            class="text-4xl text-white font-semibold"
            >
            {{ __('msg.bigtitel') }}
            </h1>
            <p
            class="text-xl text-white/80"
            >
            {{ __('msg.subtitel') }}
            </p>
            </section>
        </main>
        <section
        class="   w-full  rtl z-10 place-items-center justify-center items-center  grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5 py-4 bg-blue-800 text-white min-h-[6rem] px-5 ">
        <div class="groupe lg:mr-72  px-4 col-span-1 w-full flex items-center justify-start gap-1">
            <img
            class="w-10"
            src="{{asset('./images/speech-bubble.svg')}}" alt="" srcset="">
            <div class="text-content flex gap-2 flex-col items-start justify-start">
                <h2
                class="text-xl font-semibold"
                >
                {{ __('msg.card1') }}
                </h2>
                <p
                class=" text-white/80"
                >
                {{ __('msg.card1.1') }}
                </p>
            </div>
        </div>
        <div class="groupe lg:mr-72 px-4 col-span-1 w-full flex items-center justify-start gap-1">
            <img
            class="w-10"
            src="{{asset('./images/lightbulb.svg')}}" alt="" srcset="">
            <div class="text-content flex gap-2 flex-col items-start justify-start">
                <h2
                class="text-xl font-semibold"
                >
                {{ __('msg.card2') }}
                </h2>
                <p
                class=" text-white/80"
                >
                {{ __('msg.card2.1') }}
                </p>
            </div>
        </div>
        <div class="groupe lg:mr-72 px-4 col-span-1 w-full flex items-center justify-start gap-1">
            <img
            class="w-10"
            src="{{asset('./images/medal.svg')}}" alt="" srcset="">
            <div class="text-content flex gap-2 flex-col items-start justify-start">
                <h2
                class="text-xl font-semibold"
                >
                {{ __('msg.card3') }}
                </h2>
                <p
                class=" text-white/80"
                >
                {{ __('msg.card3.1') }}
                </p>
            </div>
        </div>
        </section>
    <main
        class=" w-full flex-wrap  rtl border-t-2 border-blue-800 flex bg-white z-10 lg:py-3  justify-center items-center"
        >
        <div class=" w-full   sm:w-3/4 max-w-[50rem] relative  h-fit flex justify-center min-h-[30rem] md:max-h-0  items-center">
            <img src="{{asset('./images/pexels-vlada-karpovich-4050415.jpg')}}" class="w-full lg:rounded-md overflow-hidden  h-full absolute top-0 inset-0 z-0 left-0" alt="" srcset="">
            <div class="text-content px-8 flex justify-center items-center gap-4 flex-col z-10">
                <h2
                class="md:text-4xl text-2xl  font-semibold text-white"
                >
                {{ __('msg.livtitel') }}
            </h2>
                <p
                class="md:text-xl text-sm text-blue-500/80"
                >
                {{ __('msg.livtitel1') }}
                </p>
                <p
                class='md:text-xl text-sm text-center text-white/80'
                >
                {{ __('msg.livtitel2') }}
                </p>
                <a href="/LiveCourses">
                    <button
                    class=" bg-blue-800 text-white  px-4 py-2 rounded-md hover:bg-blue-600 transition-colors duration-300 ease-out"
                    >
                    {{ __('msg.livbtn') }}
                    </button>
                </a>
            </div>
        </div>
    </main>
    <div class="w-full rtl z-10 py-2 bg-slate-100 min-h-[24rem] flex justify-center flex-col gap-3 items-center">
        <h1
        class="text-4xl text-center text-slate-800 font-semibold"
        >
        {{ __('msg.cmt1') }}
        <span
        class="text-blue-800"
        >
        {{ __('msg.cmt2') }}
    </span>
        </h1>
        <div dir="{{$dir}}"  class="grid grid-cols-1 place-items-center w-full  px-6 mt-3 sm:grid-cols-2 md:grid-cols-3 gap-4 ">
            <div class="card h-[17rem]  line-clamp-4  bg-white p-5 max-w-[90%] flex flex-col gap-2 justify-between items-start w-full col-span-1">
                <p
                class="text-slate-400 line-clamp-6 "
                >
                {{ __('msg.cnt1.1') }}
                </p>
                <div class="content-text flex flex-col justify-start items-start ">
                <p
                class="text-slate-700"
                >
                {{ __('msg.cnt1.2') }}
                </p>
                <p
                class=" text-pink-600"
                >
                {{ __('msg.cnt1.3') }}
                </p>

                </div>
            </div>
            <div class="card h-[17rem]   bg-white p-5 max-w-[90%] flex flex-col gap-2 justify-between items-start w-full col-span-1">
                <p
                class="text-slate-400 line-clamp-4"
                >
                {{ __('msg.cnt2.1') }}
                </p>
                <div class="content-text flex flex-col justify-start items-start ">

                <p
                class="text-slate-700"
                >
                {{ __('msg.cnt2.2') }}
                </p>
                <p
                class="text-pink-600"
                >
                {{ __('msg.cnt2.3') }}
                </p>
                </div>
            </div>
            <div class="card h-[17rem]   bg-white p-5 max-w-[90%] flex flex-col gap-2 justify-between items-start w-full col-span-1">
                <p
                class="text-slate-400 line-clamp-4"
                >
                {{ __('msg.cnt3.1') }}
                </p>
                <div class="content-text flex flex-col justify-start items-start ">
                <p
                class="text-slate-700"
                >
                {{ __('msg.cnt3.2') }}
                </p>
                <p
                class=" text-pink-600"
                >
                {{ __('msg.cnt3.3') }}
                </p>
                </div>
            </div>
        </div>
    </div>

    @include('footer')


<script>

let  menuAvatar=document.getElementById('menu-avatar');
let menuDrop=document.getElementById('menu');


menuAvatar.addEventListener('click',()=>{
    menuDrop.classList.toggle('hidden');
})
let menu=document.getElementById('menu');
let cancel=document.getElementById('cancel');
let sidebar=document.querySelector('.sidebar');


function add(){
    sidebar.classList.toggle('active');
}
function remove(){
    sidebar.classList.toggle('active');
}

function hidelive() {
            var myElement = document.getElementById('divrecord');
            myElement.style.display = 'block';
            document.getElementById('divlive').style.display='none';
            document.getElementById('recordbutton').classList.add("btn-active");
            document.getElementById('livebutton').classList.remove("btn-active");
        }
function hiderecord() {
            var myElement = document.getElementById('divrecord');
            myElement.style.display = 'none';
            document.getElementById('divlive').style.display='block';
            document.getElementById('livebutton').classList.add("btn-active");
            document.getElementById('recordbutton').classList.remove("btn-active");

        }
    </script>
    </body>
</html>
