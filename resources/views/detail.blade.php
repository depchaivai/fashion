<x-mainpage>
  <x-slot name="myjs">
    <script type="text/javascript">
      const myCount = document.querySelector('#myCount');
      const insBtn = document.querySelector('#insBtn').addEventListener('click', ()=>editCount(1));
      const desBtn = document.querySelector('#desBtn');
      const detailBtn = document.querySelector('#detail');
      const icon = detailBtn.querySelectorAll('i')[0];
      const dcontent = document.querySelector('#detail-content');
      const mp = document.querySelector('#mp');
      const vp = document.querySelector('#vp');
      const vote = document.querySelector('#vote');
      const pimage = document.querySelector('#pimage');
      const productInfoBox = document.querySelector('#productInfoBox');
      const radioSize = productInfoBox.querySelectorAll('input[name="size"]');
      const radioColor = productInfoBox.querySelectorAll('input[name="color"]');
      const priceSpan = productInfoBox.querySelector('#priceSpan');
      radioSize.forEach(e=>{
        e.addEventListener('change', ()=>{
          radioColor.forEach(cl=>{
            cl.addEventListener('change', ()=>{
              priceSpan.innerHTML = cl.getAttribute('price');
            })
            if (e.value == cl.getAttribute('size')) {
              cl.classList.remove('hidden');
            }else{
              cl.classList.add('hidden');
            }
            
          })
        })
      })
      mp.addEventListener('click',()=>mpvpClick(pimage,vote,mp,vp));
      vp.addEventListener('click',()=>mpvpClick(vote,pimage,vp,mp));
  
      const mpvpClick = (div1,div2,btn1,btn2) => {
        if (div1.getAttribute('actived')) {
          return
        }
        if (div1.getAttribute('actived') == null){
          div1.setAttribute('actived',"");
          div1.classList.remove('hidden');
          div2.removeAttribute('actived');
          div2.classList.add('hidden');
          btn1.classList.add('border-b-2');
          btn2.classList.remove('border-b-2');
        }
      }
      detailBtn.addEventListener('click', ()=>{
        
        if(dcontent.classList.contains('hidden')){
          icon.className="fa-solid fa-caret-up";
          dcontent.classList.remove('hidden');

          return
        }
        if(!dcontent.classList.contains('hidden')){
          
          icon.className="fa-solid fa-sort-down";
          dcontent.classList.add('hidden');
          return
        }
      })
      desBtn.addEventListener('click', ()=>editCount(-1));
     function editCount(vl){
        let newCount = parseInt(myCount.innerHTML) + vl;
        myCount.innerHTML = newCount;
        if(newCount <= 1){
          desBtn.disabled = true;
        }else desBtn.disabled = false;
     }
    </script>
  </x-slot>
  <div class="container p-10">
    {{-- <span class="w-full block">
      <a href="#">áo</a>/
      <a href="#">áu thun</a>/
      <a href="#">len</a>
    </span> --}}
    <div class="flex">
      <div class="w-1/2 flex max-h-[600px] gap-3">
        {{-- <div class="w-[50px] flex flex-col gap-3">
          <img class="w-full h-[70px] object-cover mb-2" src="/images/tt2.jpg" alt="detail">
          <img class="w-full h-[70px] object-cover mb-2" src="/images/tt2.jpg" alt="detail">
          <img class="w-full h-[70px] object-cover mb-2" src="/images/tt2.jpg" alt="detail">
          <img class="w-full h-[70px] object-cover mb-2" src="/images/tt2.jpg" alt="detail">
          <img class="w-full h-[70px] object-cover mb-2" src="/images/tt2.jpg" alt="detail">
        </div> --}}
        <div class="w-[calc(100%_-_50px)]">
          <img src="{{url('public/images/'.$thisp->image)}}" alt="{{$thisp->name}}" class="object-cover w-full h-full">
        </div>
      </div>
      <div id="productInfoBox" class="w-1/2 px-12">
        <span class="text-gray-700 text-xl font-bold block" >{{$thisp->name}}</span>
        <span class="text-gray-500 block mb-2">PID: {{$thisp->id}}</span>
        <span class="text-black font-bold block">kích thước:</span>
        <div class="flex gap-3 p-2"> 
          @foreach($listSize as $size)
            @if($thisp->allsalling[0]->size == $size)
              <span class="flex items-center"><input name="size" value="{{$size}}" type="radio" checked class="p-2 border min-w-[40px] text-center rounded-lg border-gray-500 mr-1"><b>{{$size}}</b></span>
            @else
              <span class="flex items-center"><input name="size" value="{{$size}}" type="radio" class="p-2 border min-w-[40px] text-center rounded-lg border-gray-500 mr-1"><b>{{$size}}</b></span>
            @endif
          @endforeach
        </div>
        <span class="text-black font-bold block">màu sắc:</span>
        <div class="flex gap-3 p-2">
          
          @foreach($thisp->allsalling as $item)
            @if($item->size == $thisp->allsalling[0]->size)
              <input type="radio" value="{{$item->color}}" checked name="color" size="{{$item->size}}" pricc="{{$item->price}}" class="block p-2 border w-10 h-10 text-center rounded-full border-gray-500 checked:ring-2 checked:ring-orange-500" style="background:{{$item->color}}">
            @else
              <input type="radio" value="{{$item->color}}" name="color" size="{{$item->size}}" price="{{$item->price}}" class="hidden p-2 border w-10 h-10 text-center rounded-full border-gray-500 checked:ring-2 checked:ring-orange-500 disabled:opacity-20" style="background:{{$item->color}}">
            @endif
          @endforeach
        </div>
        <span id="priceSpan" class="text-red-500 block mb-2">{{number_format($thisp->allsalling[0]->price)}}</span>
        <x-editcount count="1"/>
        {{-- <div class="flex w-full justify-center p-2">
          <button id="desBtn" class="w-10 h-10 text-center leading-10 bg-black font-bold text-white">-</button>
          <span id='myCount' class="w-10 h-10 leading-10 text-center border-none">1</span>
          <button id="insBtn" class="w-10 h-10 text-center leading-10 font-bold text-white bg-black">+</button>
        </div> --}}
        <button class="w-full mt-5 p-2 text-center text-xl font-bold text-white bg-black">mua ngay</button>
        <button class="w-full mt-5 p-2 text-center text-xl font-bold text-black bg-white border border-black">mua ngay</button>
        <span class="text-black font-bold mt-5 block">mô tả sản phẩm <span id="detail" class=""><i class="fa-solid fa-sort-down"></i></span> </span>
        <p id="detail-content" open class="hidden">{{$thisp->des}}</p>
      </div>
    </div>
    <ul class="flex gap-3 font-bold text-xl px-10">
      <li id="mp" class="cursor-pointer py-2 border-b-2 mr-5">hình ảnh sản phẩm</li>
      <li id="vp" class="cursor-pointer py-2">đánh giá sản phẩm</li>
    </ul>
    <div class="p-10">
      <div id="pimage" actived class="flex flex-col items-center">
        <img class="max-h-screen object-contain" src="images/tt.jpg" alt="det">
        <img class="max-h-screen object-contain" src="images/tt2.jpg" alt="det">
        <img class="max-h-screen object-contain" src="images/tt3.jpg" alt="det">
      </div>
      <div id="vote" class="hidden">
        <div class="w-1/2">
          <div class="">
            <span class="block px-2 py-1 font-bold text-blue-500">trí</span>
            <p class="px-2">
              <i>sản phẩm chất lượng cao như ảnh</i>
            </p>
          </div>
          
          <div class="w-1/2">
            <span class="text-xl font-bold px-2 py-1"></span>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-mainpage>