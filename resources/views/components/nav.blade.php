<div class="w-full">
    <div class="container mx-auto h-[50px] flex items-center justify-between">
        <a href="/"><span class="text-4xl font-bold px-3 py-1 italic">Nhatstyle</span></a>
        <ul class="flex h-full font-thin uppercase text-xl">
            <li class="px-2 leading-[50px] h-full">sản phẩm mới</li>
            <li class="px-2 leading-[50px] h-full">áo</li>
            <li class="px-2 leading-[50px] h-full">quần</li>
            <li class="px-2 leading-[50px] h-full">váy</li>
            <li class="px-2 leading-[50px] h-full">phụ kiện</li>
        </ul>

        <div class="flex items-center">
            <span class="w-7 h-7 text-center bg-white text-black rounded-l-md"><i class="fa-solid fa-magnifying-glass "></i></span>
            <form action="">
                <input type="text" class="w-[200px] rounded-r outline-none shadow-md px-2 h-7 leading-7" placeholder="tìm kiếm sản phẩm">
            </form>
            <div class="relative">
                <span id='person' class="mx-2 cursor-pointer"><i class="fa-solid fa-user"></i></span>
                {{-- <span id="loginbox" class="hidden w-24 text-sm absolute top-[100%] left-[-30px] z-50 bg-white shadow-md">
                    <b class="block w-full p-2 cursor-pointer hover:bg-yellow-400">đăng nhập</b>
                    <b class="block w-full p-2 cursor-pointer hover:bg-yellow-400">đăng ký</b>
                </span> --}}
                <div id="loginpopup" class="hidden fixed top-0 left-0 w-screen h-screen justify-center items-center bg-black/40 z-50">
                    <div class="w-[300px] min-h-[300px] bg-white relative px-5 py-2">
                        <span id="titlePopup" class="font-bold text-2xl">đăng nhập</span>
                        <form action="" class="mt-5">
                            @csrf
                            <div class="">
                                <label for="" class="block">tên đăng nhập</label>
                                <input type="text" class="w-full h-8 my-2 px-2">
                            </div>
                            <div class="">
                                <label for="" class="block">mật khẩu</label>
                                <input type="password" class="w-full h-8 my-2 px-2">
                            </div>
                            <div id="resForm" class="hidden">
                                <label for="" class="block">nhập lại mật khẩu</label>
                                <input type="password" class="w-full h-8 my-2 px-2">
                            </div>
                            
                        </form>
                        <div class="flex my-4 justify-center">
                            <button id="loginBtn" class="bg-blue-500 text-white px-2 py-1 mr-4 min-w-[100px]">đăng nhập</button>
                            <button id="resBtn" class="hidden bg-blue-500 text-white px-2 py-1 mr-4 min-w-[100px]">đăng ký</button>
                            <button id="closeBtn" class="bg-gray-200 text-gray-500 px-2 py-1 min-w-[100px]">hủy</button>
                        </div>
                        <br>
                        <span id="changeToRes" class=" text-blue-500 px-2 py-1 mb-4 block cursor-pointer">chưa có tài khoản?</span>
                        <span id="changeToLogin" class="hidden text-blue-500 px-2 py-1 mb-4 cursor-pointer">chuyển về đăng nhập</span>
                    </div>
                </div>
            </div>
            <span id='cart' class="mx-2 cursor-pointer"><i class="fa-solid fa-cart-shopping"></i></span>
        </div>
        <div id="cartPopup" class="fixed top-0 left-0 w-screen h-screen bg-black/40 hidden justify-end z-50 ">
            <div class="h-full w-full max-w-[500px] bg-white shadow-md overflow-y-auto p-7 relative" >
                <span class="font-bold text-4xl block mb-4">giỏ hàng</span>
                <span id="closeCart" class="absolute top-7 right-10 cursor-pointer"><i class="fa-solid fa-xmark text-4xl"></i></span>
                <hr>
            </div>
        </div>
    </div>
</div>