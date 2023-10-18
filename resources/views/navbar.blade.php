<nav class="w-full bg-white flex border-b-[1.4px] z-50 fixed top-0 items-center pl-3 py-4">
    <!-- Left Section (Logo) -->
    <div class="logo flex items-center">
        <a href="/">
            <img src="{{ asset('./images/19d7f5fbae4ea.jpg') }}" alt="logo" style="height: 55px;">
        </a>

        @if(!auth()->check())
            <a href="/login">
                <button class="bg-transparent hover:bg-blue-500 text-blue-500 font-semibold p-1 hover:text-white border border-blue-500 hover:border-transparent rounded">
                    {{ __('msg.loginnav') }}
                </button>
            </a>
        @endif
    </div>

    <!-- Right Section (Language and Products) -->
    <div class="cart mr-1 md:mr-5 cursor-pointer ml-auto flex items-center">

         <!-- Shopping Cart Icon -->
        <a href="/Cart" class="fas mr-2 fa-shopping-cart text-xl text-slate-400"></a>

        <!-- Products Count Badge -->
        <div class="products-count ml-2">
            <span class="absolute top-3.5 right-10 md:right-14 bg-blue-400 text-slate-950 rounded-md hover:bg-blue-600 transition-colors duration-300 ease-out px-1 text-xs">
                {{$count}}
            </span>
        </div>

        <div class="bg-transparent hover:bg-blue-500 text-blue-500 font-semibold p-1 hover:text-white border border-blue-500 hover:border-transparent rounded">
            @if (session('local')=='en')
                <a href="/lang/ar">AR</a>
            @else
                <a href="/lang/en">EN</a>
            @endif
        </div>




    </div>
</nav>
