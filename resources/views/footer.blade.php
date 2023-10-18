@if (session('local')=='en')
<input type="hidden" name="" {{$dirf='ltr'}}>
@else
<input type="hidden" name="" {{$dirf='rtl'}}>
@endif
<footer
class="w-full z-10 flex px-3 md:px-16 min-h-[20rem] border-t-2 border-emerald-400 items-center justify-start gap-5 flex-col bg-slate-800 text-white py-5"
>
<div class="w-full rtl flex border-b py-2 border-slate-400 justify-between items-center ">
    <img src="{{asset('./images/19d7f5fbae4ea.jpg')}}" alt="logo" style="width: 20%;border-radius:5px" srcset="">
    <div class="groupe flex justify-center items-center gap-2">
        <div class="item w-14 p-2 flex bg-white rounded-md justify-center items-center" >
        <img class="w-14" src="{{asset('./images/visa.svg')}}" alt="" srcset="">
        </div>

        <div class="item w-14 p-2 flex bg-white rounded-md justify-center items-center" >
        <img class="w-14" src="{{asset('./images/mastercard-2.svg')}}" alt="" srcset="">
        </div>

        <div class="item w-14 p-2 flex bg-white rounded-md justify-center items-center" >
        <img class="w-14" src="{{asset('./images/paypal.svg')}}" alt="" srcset="">
        </div>
    </div>
</div>
<div dir="{{$dirf}}" class="informations flex-wrap mt-2  w-full  flex justify-start items-center ">
    <div class="group-1 w-full md:w-2/3 gap-2 flex flex-col justify-start items-start">
        <h2
        class="text-xl text-white font-semibold"
        >
        {{ __('msg.ft1') }}
        </h2>
        <p
        class="text-white/80 text-sm"
        >
        {{ __('msg.ft2') }}
        </p>
    </div>
</div>
</footer>
