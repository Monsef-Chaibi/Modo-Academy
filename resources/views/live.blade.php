<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>
            {{ __('msg.projettitel') }}
        </title>
        <link rel="icon" type="image/x-icon" href="{{asset('./images/x.jpg')}}">

        <!--fontawesome cdn link-->
        <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        />


        <link rel="stylesheet" href="{{asset('build/assets/app-f49f4b9b.css')}}">
        <script type="module" scr="{{asset('build/assets/app-5c5b5477.js')}}"></script>


    </head>
    <body class=" w-full font-cairo  overflow-x-hidden flex-col relative bg-white flex justify-start items-center">

        @include('navbar')
        // set direction
        @if (session('local')=='en')
        {{$dir='ltr'}}
        @else
        {{$dir='rtl'}}
        @endif
        //

        <main dir="{{$dir}}"  class=" hero-3  w-full flex flex-col justify-start items-center gap-3">
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
                        class="w-full hover:bg-slate-400/40 transition-colors ease-out duration-500 hover:border-l-2 hover:border-blue-500   flex items-center justify-start  px-4 py-2 text-slate-600">
                        @if (session('local')=='en')
                        {{$course->name_en}}
                        @else
                        {{$course->name}}
                        @endif
                        </a>
                    @endforeach
                </div>


            </div>
            <div  class="menu-bar  z-10 w-full mt-20 border-b-[1.4px] border-slate-200  flex justify-between  gap-4 items-center flex-row   px-4 py-4">
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
            <section dir="{{$dir}}"
            class="w-full  z-10 flex flex-col justify-center items-center md:items-start gap-5 mt-20  px-5"
            >
            <h1
            class=" text-3xl md:text-5xl text-white font-semibold"
            >
            {{ __('msg.lt1') }}
            </h1>
            <p
            class=" text-3xl md:text-5xl flex justify-center items-centerx text-white/80"
            >
            {{ __('msg.lt2') }}
            <span
            class='text-blue-500 '
            >
            {{ __('msg.lt2.1') }}
            </span>
            </p>
            <p
            class="  md:text-xl text-white"
            >
            {{ __('msg.lt3') }}
                <b
                class=""
                >
                {{ __('msg.lt4') }}
                </b>
            </p>
            <p
            class=' md:text-xl text-white'
            >
            {{ __('msg.lt5') }}
            <span
            class='text-blue-500'
            >
            50
            </span>
            {{ __('msg.lt6') }}
            </p>
            <p
            class="text-xl text-white mb-5"
            >
            {{ __('msg.lt7') }}


            </p>
            </section>

        </main>

        <section
        class="   w-full  rtl z-10 place-items-center justify-center items-center  grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-4 gap-5 py-4 bg-blue-500 text-white min-h-[6rem] px-5 ">
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
                {{ __('msg.card3.2') }}
                </p>
            </div>
        </div>
        </section>
        <main
        class=" w-full rtl grid py-3 z-10 bg-slate-700 min-h-[15rem] md:px-20 px-6  grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 "
        >
        <div class="card rounded-md flex justify-center items-center flex-col gap-2 text-center  mt-2 w-full min-w-[15rem]  col-span-1 max-h-52 ">
            <img
            src="{{asset('./images/live-feature-one.svg')}}"
            class=" w-20 rounded-md object-cover"
            alt="" srcset="">

            <h2
            class="text-xl text-white font-semibold mt-2"
            >
            {{ __('msg.sub1') }}
            </h2>
        </div>
        <div class="card rounded-md flex justify-center items-center flex-col gap-2 text-center  mt-2 w-full min-w-[15rem]  col-span-1 max-h-52 ">
            <img
            src="{{asset('./images/live-feature-two.svg')}}"
            class=" w-20 rounded-md object-cover"
            alt="" srcset="">

            <h2
            class="text-xl text-white font-semibold mt-2"
            >
            {{ __('msg.sub2') }}

            </h2>
        </div>
        <div class="card rounded-md flex justify-center items-center flex-col gap-2 text-center  mt-2 w-full min-w-[15rem]  col-span-1 max-h-52 ">
            <img
            src="{{asset('./images/live-feature-three.svg')}}"
            class=" w-20 rounded-md object-cover"
            alt="" srcset="">

            <h2
            class="text-xl text-white font-semibold mt-2"
            >
            {{ __('msg.sub3') }}
            </h2>
        </div>
        <div class="card rounded-md flex justify-center items-center flex-col gap-2 text-center  mt-2 w-full min-w-[15rem]  col-span-1 max-h-52 ">
            <img
            src="{{asset('./images/live-feature-four.svg')}}"
            class=" w-20 rounded-md object-cover"
            alt="" srcset="">

            <h2
            class="text-xl text-white font-semibold mt-2"
            >
            {{ __('msg.sub4') }}
            </h2>
        </div>
        </main>
        <div class="w-full rtl flex flex-col z-10 gap-2 justify-center items-center min-h-[30rem] px-6 md:px-40 py-4 bg-slate-50">
            <div class=" mt-8  w-full text-center md:w-2/3">
                <h1
                class="text-4xl text-blue-500 font-semibold"
                >
                {{ __('msg.bg1') }}
                </h1>
                <h2
                class="text-xl mt-3 text-slate-600 font-semibold"
                >
                {{ __('msg.bg2') }}
                </h2>
            </div>
            <div dir="{{$dir}}"  class="grid mt-8  gap-x-5 gap-y-4 w-full grid-cols-1 sm:grid-cols-2 md:grid-cols-3">
                @foreach ($livecourses as $course)
                <a href="/LiveCourses/Course/{{$course->id}}">
                <div class="card w-full bg-white shadow-sm rounded-sm min-h-[6rem] p-2 flex max-w-[24rem] justify-start items-center gap-2">
                    <img src="{{ asset('./images/' . $course->image) }}" alt="logo" srcset="" class="w-16" >
                    <p
                    class="text-slate-600 text-xl font-semibold"
                    >
                   @if (session('local')=='en')
                   {{$course->name_en}}
                   @else
                   {{$course->name}}
                   @endif

                    </p>
                </div>
                </a>
                @endforeach
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
