<x-mainpage>
  <div class="container">
    <div id="controls-carousel" class="relative" data-carousel="static">
      <!-- Carousel wrapper -->
      <div class="overflow-hidden relative h-[500px] rounded-lg  ">
           <!-- Item 1 -->
          <div class="hidden duration-700 ease-in-out" data-carousel-item>
              <img src="https://flowbite.com/docs/images/carousel/carousel-4.svg
              " class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
          </div>
          <!-- Item 2 -->
          <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
              <img src="https://flowbite.com/docs/images/carousel/carousel-3.svg" class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
          </div>
          <!-- Item 3 -->
          <div class="hidden duration-700 ease-in-out" data-carousel-item>
              <img src="https://flowbite.com/docs/images/carousel/carousel-4.svg" class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
          </div>
        
      </div>
      <!-- Slider controls -->
      <button type="button" class="flex absolute top-0 left-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none" data-carousel-prev>
          <span class="inline-flex justify-center items-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
              <svg class="w-6 h-6 text-white dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
              <span class="hidden">Previous</span>
          </span>
      </button>
      <button type="button" class="flex absolute top-0 right-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none" data-carousel-next>
          <span class="inline-flex justify-center items-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
              <svg class="w-6 h-6 text-white dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
              <span class="hidden">Next</span>
          </span>
      </button>
  </div>
  {{-- <div class="">
    <span class="text-xl uppercase block py-1 px-2 font-bold mt-5">bán chạy</span>
    <div class="flex flex-wrap justify-center gap-3 py-4">
      <div class="w-[220px] min-h-[280px]"><x-card/></div>
      <div class="w-[220px] min-h-[280px]"><x-card/></div>
      <div class="w-[220px] min-h-[280px]"><x-card/></div>
      <div class="w-[220px] min-h-[280px]"><x-card/></div>
      <div class="w-[220px] min-h-[280px]"><x-card/></div>
      <div class="w-[220px] min-h-[280px]"><x-card/></div>
      <div class="w-[220px] min-h-[280px]"><x-card/></div>
      <div class="w-[220px] min-h-[280px]"><x-card/></div>
      <div class="w-[220px] min-h-[280px]"><x-card/></div>
      <div class="w-[220px] min-h-[280px]"><x-card/></div>
    </div>
  </div> --}}


  <div class="p">
    <span class="text-xl uppercase block py-1 px-2 font-bold mt-5">sản phẩm mới</span>
    <div class="flex flex-wrap justify-center gap-3 py-4">
      @foreach ($newps as $item)
        <div class="w-[220px] min-h-[280px]"><x-card :item="$item"/></div>
      @endforeach
    </div>
  </div>

  {{-- <div class="p">
    <span class="text-xl uppercase block py-1 px-2 font-bold mt-5">đang sale</span>
    <div class="flex flex-wrap justify-center gap-3 py-4">
      <div class="w-[220px] min-h-[280px]"><x-card/></div>
      <div class="w-[220px] min-h-[280px]"><x-card/></div>
      <div class="w-[220px] min-h-[280px]"><x-card/></div>
      <div class="w-[220px] min-h-[280px]"><x-card/></div>
      <div class="w-[220px] min-h-[280px]"><x-card/></div>
      <div class="w-[220px] min-h-[280px]"><x-card/></div>
      <div class="w-[220px] min-h-[280px]"><x-card/></div>
      <div class="w-[220px] min-h-[280px]"><x-card/></div>
      <div class="w-[220px] min-h-[280px]"><x-card/></div>
      <div class="w-[220px] min-h-[280px]"><x-card/></div>
    </div>
  </div> --}}
  </div>
</x-mainpage>