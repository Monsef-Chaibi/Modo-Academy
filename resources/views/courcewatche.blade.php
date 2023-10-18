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
        <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        />
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.12.2/lottie.min.js"></script>


        <link rel="stylesheet" href="{{asset('build/assets/app-f49f4b9b.css')}}">
        <script type="module" scr="{{asset('build/assets/app-5c5b5477.js')}}"></script>


    </head>
    <body class=" font-cairo w-full  overflow-x-hidden flex-col relative bg-white flex justify-start items-center">

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

        <main dir="{{$dir}}"  class=" hero-2  w-full flex flex-col justify-start items-center gap-3">
            <div class="bg-color z-0 absolute left-0 top-0 w-full h-full bg-slate-500/40"></div>
            <div class=" sidebar fixed shadow-md gap-5  z-50 top-0 -right-[100vw] h-screen flex flex-col min-w-[300px] p-3 justify-start items-center bg-white ">
                <div class="cancel flex w-full justify-between  items-center ">
                    <h3
                    class="text-blue-500 text-xl font-semibold"
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
                    class="bg-blue-800 text-white  px-4 py-2 rounded-md hover:bg-blue-600 transition-colors duration-300 ease-out "
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
            @foreach ($allrecord as $items)
            <section dir="{{$dir}}"
            class="w-full  z-10 flex flex-col justify-center items-center md:items-start gap-5 mt-20  px-5"
            >
            <h1
            class="text-4xl text-white font-semibold"
            >
                @if (session('local')=='en')
                {{$items->name_en}}
                @else
                {{$items->name}}
                @endif
            </h1>
            <div class="informations  flex-col flex justify-start items-start gap-4 text-white/90">
                <p>
                    {{ __('msg.tt1') }}
                <span
                class="text-blue-500"
                >
                   {{$items->time}}
                </span>
                {{ __('msg.in1') }}
                </p>
                <div
                class="flex justify-center items-center gap-2 "
                >

                <p >
                    {{ __('msg.tt2') }}
                <div class="flex mr-2 justify-center items-center gap-2 ">
                    <span
                    class=" border-[1.4px] border-blue-500  px-1 md:px-4 py-1 rounded-full   transition-colors duration-300 ease-out"
                    >
                    {{ __('msg.tt3') }}
                    </span>
                </div>

                </p>
                </div>
                <div class="flex  justify-center items-center gap-2 ">
                    <p
                    class=""
                    >
                    {{ __('msg.tt4') }}
                    </p>
                    <div class="flex mr-4 justify-start items-center gap-2 ">
                        <span
                        class=" text-blue-500"
                        >
                        {{$items->price}}

                        </span>
                        <span
                        class=" text-white"
                        >

                        {{ __('msg.in2') }}

                        </span>
                    </div>
                </div>
            </div>
            </section>
        </main>
        <section dir="{{$dir}}"
        class="w-full bg-white py-2 md:flex-row flex-col z-10 flex  justify-center items-start md:items-start gap-5 px-5"
        >
        <div class=" w-full z-10  text-slate-600  mt-3 flex flex-col gap-4 justify-start items-start  ">
        <h1
        class="text-2xl  text-blue-800 font-semibold"
        >
        @if (session('local')=='en')
        {{$items->name_en}}
        @else
        {{$items->name}}
        @endif

        </h1>
        <p
        class=' text-blue-500'
        >
        {{ __('msg.subt1') }}
        </p>
        <p class="text-2xl">
            @if (session('local')=='en')
        {{$items->desc1_en}}
        @else
        {{$items->desc1}}
        @endif
        </p>
        </div>
        <input type="hidden" {{$idget=$items->id}} name="">
        @endforeach

        </section>
        <hr>
        <section dir="{{$dir}}"
        class="w-full py-5 flex  sm:flex-row flex-col  bg-white px-5  z-10  text-slate-600   items-start gap-14 justify-between  "
        >
        <div class="group-1 w-full  sm:w-1/2 mt-2  flex flex-col gap-2 ">
            <h1
            class='text-xl text-blue-800 '
            >
            {{ __('msg.subt2') }}
            </h1>
            @foreach ($desc1 as $item)
            <div
            class=' flex  justify-start gap-2 items-start '
            >
            <i
            class="fas text-sm fa-check-circle text-slate-300"
            >

            </i>
                <p
                class='text-2xl font-cairo text-slate-600'
                >
                @if (session('local')=='en')
                {{$item->desc1_en}}
                @else
                {{$item->desc1}}
                @endif
                </p>
            </div>
            @endforeach
        </div>


        <div class="group-2  w-full justify-center  sm:w-1/2 mt-2  flex flex-col gap-2 ">
            <h1
            class='text-xl text-blue-800 '
            >
            {{ __('msg.subt3') }}
            </h1>
            @foreach ($desc2 as $items)
            <div
            class=' max-w-[20rem] flex justify-between gap-2 items-start'
            >

                <p
                class=' font-cairo text-2xl text-slate-600'
                >
                @if (session('local')=='en')
                {{$items->desc2_en}}
                @else
                {{$items->desc2}}
                @endif
                </p>
                <i
                class="fas fa-bookmark text-sm text-slate-300" >
                </i>
            </div>
            @endforeach
        </div>
        </section>
        <hr>
        <section
        class="w-full bg-white py-2   z-10 flex flex-col justify-center items-center md:items-start gap-5  px-5"
        >

        <div class=" mt-3 flex flex-col w-full  gap-4 md:justify-start items-center md:flex-col justify-center md:items-center  ">
            <form action="/AddToCart/{{$idget}}" method="POST">
                @csrf
            <div class="group flex md:mr-20 flex-col gap-2 ">
                <div
                class="flex flex-col gap-2 w-72 justify-start items-start  "
                id='lottie'
                >
                </div>
                <button type="submit"
            class="bg-blue-800 text-white  px-4 py-2 rounded-md hover:bg-blue-600 transition-colors duration-300 ease-out"
            >
            {{ __('msg.subt4') }}
                </button>
            </div>
            <div class="grid w-1/2   bg-white z-10 h-28 grid-cols-1 sm:grid-cols-2 md:grid-cols-3">

           </div>
        </form>
        </div>
        </section>

        <section dir="{{$dir}}"  class="w-full bg-slate-50 py-2 z-10 flex flex-col justify-center items-center gap-5  px-5">
            <h1 style="color:blue;" class="text-xl mt-2 text-center">
                {{ __('msg.subt5') }}
            </h1>
            <div class="grid w-full place-items-center  md:w-2/3 grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 ">
        <!-- Card max-w-[90%] 1 -->
                @foreach ($randomColumns as $item)

                <div class="card max-w-[90%] rounded-md bg-white flex-col justify-between items-center gap-2 flex shadow-md w-full col-span-1 p-4">
                    <img src="{{asset('./images/'.$item->image)}}" class="w-full h-40 md:h-28 rounded-md" alt="">
                    <div class="text-content flex flex-col w-full justify-start items-start gap-2">
                        <h1 class="text-slate-800 font-semibold">
                            @if (session('local')=='en')
                            {{$item->name_en}}
                            @else
                            {{$item->name}}
                            @endif
                        </h1>
                        <p class="text-blue-500">{{$item->price}} <span class="text-slate-500">{{ __('msg.in2') }}</span></p>
                        <p class="text-blue-500">{{$item->time}} <span class="text-slate-500">{{ __('msg.in1') }}</span> </p>
                    </div>
                    <div class="mt-2 flex gap-2">
                        <a href="/CourseWatache/{{$item->id}}" class="">
                            <button
                            class="bg-blue-800 text-white  px-4 py-2 mb-4 rounded-md hover:bg-blue-600 transition-colors duration-300 ease-out"
                            >
                            {{ __('msg.btn1') }}
                            </button>
                        </a>
                        <form method="POST" action="/AddToCart/{{$item->id}}">
                            @csrf
                            <button type="submit"
                            class="bg-blue-800 text-white px-2 py-2  mb-4 rounded-md hover:bg-blue-600 transition-colors duration-300 ease-out"
                            >
                            {{ __('msg.btn2') }}
                            </button>
                        </form>
                    </div>

                </div>

                @endforeach


    </div>
    </section>
        @include('footer')


<!-- Add the Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
let  menuAvatar=document.getElementById('menu-avatar');
let menuDrop=document.getElementById('menu');


menuAvatar.addEventListener('click',()=>{
    menuDrop.classList.toggle('hidden');
})
const animation = lottie.loadAnimation({
    container: document.getElementById('lottie'),
    renderer: 'svg',
    loop: true,
    autoplay: true,
    path: '{{ asset('animation_lneujon2.json') }}'
});

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
