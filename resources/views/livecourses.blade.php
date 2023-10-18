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
    <body class=" w-full font-cairo  overflow-x-hidden flex-col relative bg-white flex justify-start items-center">

         <!-- Show Done Alert -->
         @if (session()->has('message'))
         <script>
                     Swal.fire(
                         '{{ __('msg.alert1') }}',
                         '{{ __('msg.alert2') }}',
                         'success'
                     )
         </script>
        @endif

        @include('navbar')

        // set direction
        @if (session('local')=='en')
        {{$dir='ltr'}}
        @else
        {{$dir='rtl'}}
        @endif
        //

        <main dir="{{$dir}}"  class=" hero-2   relative w-full flex flex-col justify-start items-center gap-3">
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
                    class="bg-blue-500 text-white  px-4 py-2 rounded-md hover:bg-blue-600 transition-colors duration-300 ease-out "
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
            class="w-full  z-10 flex flex-col justify-center items-center  gap-5 mt-20 rtl px-5"
            >
            <h1
            class=" text-2xl text-center md:text-start md:text-5xl text-white font-semibold"
            >
            @if (session('local')=='en')
            {{$namecourses ->name_en}}
            @else
            {{$namecourses->name}}
            @endif
            </h1>
            <p
            class=" text-2xl text-center md:text-start  text-blue-500 md:text-5xl"
            >
            {{ __('msg.1t') }}
            </p>
            </section>

        </main>
        <div class="w-full flex rtl bg-white z-10 justify-center items-center ">
            <div class="text flex justify-center flex-col items-center gap-2 ">
                <h2
                class="text-3xl text-slate-400 font-semibold"
                >
                {{ __('msg.2t') }}
                </h2>
                <p
                class="text-xl text-blue-500/80 font-semibold"
                >
                {{ __('msg.3t') }}
                </p>
            </div>
        </div>
        <main
        class="w-full py-4  z-10 flex flex-col bg-white justify-center items-center  gap-5 rtl px-5"
        >
        <h1
        class="text-5xl mt-16 text-slate-400 font-semibold"
        >
        {{ __('msg.4t') }}
        </h1>
        <div class="grid w-full grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3
        ">
        @foreach ($allrecord as $items)
        <div dir="{{$dir}}"  class="card flex py-3 mt-5 w-full bg-slate-100 shadow-md rounded-md col-span-1 flex-col  justify-center items-center">
            <img
            class="w-1/2 rounded-md max-h-30 object-cover" style="height:40%; backround-size:cover"
            src="{{asset('./images/'.$items->image)}}"
            alt="" srcset="">
            <div class="text-content flex justify-center items-center gap-2 flex-col ">
                <p class="mt-4">
                {{$items->langue}}
                <i
                class="fas fa-circle text-blue-500 text-xs"
                >

                </i>
                </p>
                <p
                class="text-xl text-slate-500 font-medium"
                >
                @if (session('local')=='en')
                {{$items->name_en}}
                @else
                {{$items->name}}
                @endif
                </p>
                <p
                class="text-xl font-medium text-slate-500"
                >
                 <span class="text-blue-500">{{$items->time}}  </span> {{ __('msg.in1') }}
                </p>
                <p
                class="text-xl font-medium text-slate-500"
                >
                 <span class="text-blue-500">{{$items->price}}  </span>{{ __('msg.in2') }}
                </p>
                <div class="mt-2 flex gap-3">
                    <a href="/CourseWatache/{{$items->id}}">
                        <button
                        class="bg-blue-500 text-white  px-4 py-2 mb-4 rounded-md hover:bg-blue-600 transition-colors duration-300 ease-out"
                        >
                        {{ __('msg.btn1') }}
                        </button>
                    </a>
                    <form method="POST" action="/AddToCart/{{$items->id}}">
                        @csrf
                        <button type="submit"
                        class="bg-blue-500 text-white  px-4 py-2 mb-4 rounded-md hover:bg-blue-600 transition-colors duration-300 ease-out"
                        >
                        {{ __('msg.btn2') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
        </div>
        </main>

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
