<div class="w-[700px] bg-white p-4 relative flex justify-center">
    <x-slot name="myjs">
        <script>
            const cateSelect = document.querySelector('#cateSelect');
            const thSelect = document.querySelector('#thSelect');
            const imgInput = document.querySelector('#imgInput');
            const imgContainer = document.querySelector('#imgContainer');
          
            imgInput.addEventListener('change',(e)=>{
                let previewimg = imgContainer.querySelector('#previewimg');
                if (previewimg) {
                    imgContainer.removeChild(previewimg);
                }
                if(e.target.files.length > 0){
                    const preimg = document.createElement('img');
                    preimg.src = window.URL.createObjectURL(e.target.files[0]);
                    preimg.className = "absolute top-0 left-0 object-cover w-[200px] h-[200px] z-10"
                    preimg.setAttribute('alt','img');
                    preimg.setAttribute('id','previewimg');
                    imgContainer.appendChild(preimg);
                }
            })
            cateSelect.addEventListener('change',()=>{
                thSelect.innerHTML="";
                let _token   = $('meta[name="csrf-token"]').attr('content');
                let idCate = cateSelect.value;
                if ( idCate && idCate !== '') {
                    $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': _token
                            },
                            url: "/dashboard/callajax/getthbycate/"+idCate,
                            type:"GET",
                            success:function(response){
                                response.forEach(e=>{
                                    let newOption = document.createElement("option");
                                    newOption.value = e.id;
                                    newOption.innerHTML = e.name;
                                    thSelect.appendChild(newOption);
                                });
                                thSelect.removeAttribute("disabled");
                            },
                            error: function(error) {
                            console.log(error);
                            alert('xay ra loi');
                            }
                        });
                }
                        
            })
        </script>
    </x-slot>
    <form action="{{ isset($thisp) ? route('product.edit',[$thisp->id]) : route('product.interface') }}" method="post" enctype="multipart/form-data"class="w-full p-4">
        @csrf
        @if(isset($thisp))
        <input type="hidden" name="_method" value="PUT">
        @endif
        
        <label for="cate" class="font-bold">loại sản phẩm</label>
        <select name="cate" id="cateSelect" class="block w-[200px] px-2 py-1">
            <option value=""></option>
            @foreach($allcate as $item)
                <option value="{{$item->id}}" {{(isset($thisp) && $thisp->cate == $item->id) ? 'selected' : ''}}>{{$item->name}}</option>
            @endforeach
        </select>
        

        {{-- <label for="productname" class="font-bold block mt-5">thêm size cho mặt hàng</label>
        <input type="text" placeholder="nhập size mới" class="px-2 py-1 outline-none border placeholder:italic placeholder:text-gray-300">
        <button class=" p-1 bg-green-500 text-white">thêm</button>
        <br/>
        <span class="italic">các loại size của mặt hàng này:</span>
        <span class="font-bold">hiện chưa có size nào cả</span> --}}
        
        
        
        {{-- <label for="productname" class="font-bold block w-full mt-5">thêm màu sắc cho mặt hàng</label>
        <input type="color" class="coloris px-2 py-1" data-coloris/> 
          <button class="p-1 bg-green-500 text-white ml-2 my-1">thêm</button>
        <br/>
        <span class="italic">các màu sắc của mặt hàng này:</span>
        <span class="font-bold">hiện chưa có màu sắc nào cả</span> --}}
        <label for="th" class="font-bold block mt-5">thương hiệu</label>
        <select name="th" id="thSelect" {{isset($thisp) ? '' : 'disabled'}} class="block w-[200px] px-2 py-1">
            <option value='' class="text-red-500">{{isset($allth) ? "" : 'hãy chon loại sp'}}</option>
            @if(isset($allth))
                @foreach($allth as $th)
                    <option value="{{$th->id}}" {{$thisp->th == $th->id ? 'selected' : ''}} class="">{{$th->name}}</option>
                @endforeach
            @endif
        </select>


        <label for="name" class="font-bold block mt-5">sản phẩm</label>
        <input type="text" name="name" value="{{$thisp->name ?? ''}}" placeholder="nhập tên sản phẩm" class="w-full mt-2 text-md px-2 py-1 placeholder:italic placeholder:text-gray-300"/>
        
        
        <label for="des" class="font-bold block mt-5">mô tả</label>
        <textarea name="des" class="p-1 w-full h-[200px] resize-none overflow-y-auto">{{isset($thisp) ? $thisp->des : ''}}</textarea>
           
        <label for="productIMG" class="block font-bold mt-5">hình ảnh</label>
        <div id="imgContainer" class="relative w-[200px] h-[200px] border border-black">
            <input type="file" id="imgInput" name="productIMG" class="z-20 opacity-20 w-[200px] h-[200px] relative after:w-full after:h-full after:absolute after:content-['chọn_từ_thiết_bị'] after:bg-white after:left-0 after:top-0 after:flex after:justify-center after:items-center after:text-xl after:border-2 after:cursor-pointer after:text-wrap"/>
            @if(isset($thisp->image))
                <img src="{{url('/public/images/'.$thisp->image)}}" alt="{{$thisp->name}}" class="w-[200px] h-[200px] object-cover absolute top-0 left-0">
            @endif
        </div>
        
        <br/>
        {{-- <label for="image" class="block font-bold mt-5">thêm ảnh khác</label>
        <div class="flex gap-3">
            <input type="file" class="opacity-40 w-[100px] h-[100px] relative after:w-full after:h-full after:absolute after:content-['+'] after:bg-white after:left-0 after:top-0 after:flex after:justify-center after:items-center after:text-xl after:border-2 after:border-blue-500 after:cursor-pointer after:text-wrap"/>
            <input type="file" class="opacity-40 w-[100px] h-[100px] relative after:w-full after:h-full after:absolute after:content-['+'] after:bg-white after:left-0 after:top-0 after:flex after:justify-center after:items-center after:text-xl after:border-2 after:border-blue-500 after:cursor-pointer after:text-wrap"/>
            <input type="file" class="opacity-40 w-[100px] h-[100px] relative after:w-full after:h-full after:absolute after:content-['+'] after:bg-white after:left-0 after:top-0 after:flex after:justify-center after:items-center after:text-xl after:border-2 after:border-blue-500 after:cursor-pointer after:text-wrap"/>
            <input type="file" class="opacity-40 w-[100px] h-[100px] relative after:w-full after:h-full after:absolute after:content-['+'] after:bg-white after:left-0 after:top-0 after:flex after:justify-center after:items-center after:text-xl after:border-2 after:border-blue-500 after:cursor-pointer after:text-wrap"/>
            <input type="file" class="opacity-40 w-[100px] h-[100px] relative after:w-full after:h-full after:absolute after:content-['+'] after:bg-white after:left-0 after:top-0 after:flex after:justify-center after:items-center after:text-xl after:border-2 after:border-blue-500 after:cursor-pointer after:text-wrap"/>
        </div>
        <br/> --}}
        {{-- @if(isset($imgerr)) --}}
            <span class="text-red-500 px-2 py-1 block">{{ session()->get('imgerr') }}</span>
        {{-- @endif --}}
        <button type="submit" class="px-2 py-1 bg-blue-400 text-white mt-4 rounded-sm">thêm</button>
    </form>
</div>