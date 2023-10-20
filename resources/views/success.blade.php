<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/x-icon" href="{{asset('./images/x.jpg')}}">
        <title>
             {{ __('msg.projettitel') }}
        </title>
        <!--fontawesome cdn link-->
        <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        />


        <link rel="stylesheet" href="{{asset('build/assets/app-f49f4b9b.css')}}">
        <script type="module" scr="{{asset('build/assets/app-5c5b5477.js')}}"></script>


    </head>
    <body class=" w-full  font-cairo overflow-x-hidden flex-col relative bg-white flex justify-start items-center">

        @include('navbar')

        // set direction
        @if (session('local')=='en')
        {{$dir='ltr'}}
        @else
        {{$dir='rtl'}}
        @endif
        //
        //
        <main dir="{{$dir}}" class=" hero-2   w-full flex flex-col justify-start items-center gap-3">
            <div class="bg-color z-0 absolute left-0 top-0 w-full h-full bg-slate-500/60"></div>
            <div class=" sidebar fixed shadow-md gap-5  z-50 top-0 -right-[100vw] h-screen flex flex-col min-w-[300px] p-3 justify-start items-center bg-white ">
                <div class="cancel flex w-full justify-between  items-center ">
                    <h3
                    class="text-slate-500 text-xl font-semibold"
                    >
                    {{ __('msg.navtitle') }}
                    </h3>
                    <i
                    onclick="remove()"
                    class="fas fa-times text-blue-500 text-xl cursor-pointer"
                    >
                    </i>
                </div>
                <div class="btn-container mt-5 flex gap-2 w-full items-center justify-center">
                    <a >
                    <button onclick="hiderecord()" id="livebutton"
                    class="bg-blue-800 text-white  px-4 py-2 rounded-md hover:bg-blue-600 transition-colors duration-300 ease-out"
                    >
                    {{ __('msg.courslive') }}
                    </button>
                    </a>
                </div>

                <div id="divlive" dir='{{$dir}}' class="links overflow-auto flex w-full  flex-col justify-center items-center">
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

            <div class="menu-bar  z-10 w-full mt-20 border-b-[1.4px] border-slate-200  flex justify-between  gap-4 items-center flex-row   px-4 py-4">
                <div
                onClick="add()"
                class="menu hover:text-blue-600  ease-in-out duration-300 transition-all  text-2xl cursor-pointer text-white flex justify-center items-center gap-2">
                    <i
                    class="fas fa-bars  "
                    >
                    </i>
                    {{ __('msg.buttonnav') }}
                </div>

                @include('login')

            </div>
            <section
            class="w-full  z-20 flex flex-col justify-center items-center  gap-5 mt-20 rtl px-5"
            >
            <h1
            style="line-height: 4;"
            class=" text-2xl text-center md:text-start md:text-5xl text-white font-semibold"
            >
             {{__('msg.crspay')}}
            </h1>
            </section>
        </main>
        <div class=" w-full text-center bg-white z-20 rtl px-4 py-4 flex flex-col gap-7 justify-center items-center  ">
            <h1
            class=' sm:text-xl text-blue-800'
            >
            {{__('msg.crspay1')}}
            </h1>
            @foreach ($items as $item)
            <div class="item bg-slate-100 p-3 sm:px-7 rounded-md mt-2 sm:min-w-[40rem] sm:justify-between    flex justify-start  items-center gap-2 text-slate-500">
                <div class="img-container">
                    <img
                    src="{{asset('./images/'.$item->image)}}"
                    alt=""
                    srcset=""
                    class='w-10 h-10 sm:w-24 sm:h-24 rounded-sm'
                    >
                </div>
                <div class="content flex justify-start items-start gap-2 flex-col ">
                    <p>
                        @if (session('local')=='en')
                        {{$item->name_en}}
                        @else
                        {{$item->name}}
                        @endif
                    </p>
                    <p
                    class=' text-white-400 text-sm'
                    >
                   <span class="text-blue-600"> {{$item->price}}</span> {{ __('msg.in2') }}
                </p>
            </div>
                    <button style="background-color: rgb(34, 56, 143)" class="icon w-8 h-8 rounded-md text-white">
                        <i class="fas fa-check-circle"></i>

                    </button>
            </div>
        @endforeach
            <hr
            class='w-72 mt-2'
            >
            <p
            class=' mt-2 text-slate-700'
            >
            {{ __('msg.ct10') }}<span class="text-blue-600"> {{$some}} </span>  {{ __('msg.in2') }}
            </p>

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
