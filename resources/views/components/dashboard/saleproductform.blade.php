<div class="w-[700px] bg-white p-4 relative flex justify-center">
    <x-slot name="myjs">
        <script>
            const productInput = document.querySelector('#productInput');
            const ulProduct = document.querySelector('#ulProduct');
            const needproduct = document.querySelector('#needproduct');
            const infobox = document.querySelector('#infobox');
            const nameSaleP = document.querySelector('#infobox span[name="tagname"]');
            const PIDSale = document.querySelector('#infobox input[name="product_id"]');
            const cateSaleP = document.querySelector('#infobox i[name="cate"]');
            const thSaleP = document.querySelector('#infobox i[name="th"]');
            const desSaleP = document.querySelector('#infobox i[name="des"]');
            const imgSaleP = document.querySelector('#infobox img[name="productImg"]');
            productInput.addEventListener('keyup', (e)=>{
                debounce(getListProduct(e.target.value),1000);
            })
            const getListProduct = (text) => {
                let _token   = $('meta[name="csrf-token"]').attr('content');
                if(text == ''){
                    ulProduct.innerHTML = '';
                    return
                }
                $.ajax({
                        headers: {
                                'X-CSRF-TOKEN': _token
                            },
                            url: "/dashboard/callajax/productbytext/"+text,
                            type:"GET",
                            success:function(response){
                                ulProduct.innerHTML = '';
                                console.log(response);
                                response.forEach(e=>{
                                    let newli = document.createElement('li');
                                    newli.addEventListener('click',()=>showMore(e));
                                    newli.className = 'flex w-full cursor-pointer hover:bg-blue-300 p-2 items-center'
                                    let newImg = document.createElement('img');
                                    newImg.src=public_path+'/'+e.image;
                                    newImg.className="w-[40px] h-[40px] ml-2 object-cover";
                                    let newSpan = document.createElement('span');
                                    newSpan.className="block font-bold px-2";
                                    newSpan.innerHTML = e.name;
                                    newli.appendChild(newImg);
                                    newli.appendChild(newSpan);
                                    ulProduct.appendChild(newli);
                                })
                            },
                            error: function(error) {
                                console.log(error);
                                alert('xay ra loi');
                            }
                })
            }
            const showMore = (item) => {
                PIDSale.value = item.id;
                nameSaleP.innerHTML = item.name;
                cateSaleP.innerHTML = item.thiscate.name;
                thSaleP.innerHTML = item.thisth.name;
                desSaleP.innerHTML = item.des;
                imgSaleP.src=public_path+'/'+item.image;
                infobox.classList.remove('hidden');
                needproduct.classList.remove('hidden');
                ulProduct.innerHTML='';
                productInput.classList.add('hidden');
            }
            const debounce = (fn,delay) => {
                let timeOutId;
                return (...args)=>{
                    clearTimeout(timeOutId);
                    timeOutId = setTimeout(()=>{
                        func.apply(this, args);
                    },[delay])
                }
            }

        </script>
    </x-slot>
    <form action="{{ isset($thisp) ? route('saleproduct.update',[$thisp->id]) : route('saleproduct.store') }}" method="post" enctype="multipart/form-data"class="w-full p-4">
        @csrf 
        @if(isset($thisp))
            <input type="hidden" name="_method" value="PUT">
        @endif
        <label for="product" class="font-bold">ch???n s???n ph???m</label>
        <div class="{{isset($thisp) ? 'hidden' : 'relative w-full'}}">
            <input id="productInput" type="text" class=" block w-full p-1">
            <ul id="ulProduct" class="absolute top-[50px] left-0 w-full bg-white">

            </ul>
        </div>

        <div id="infobox" class="{{isset($thisp) ? '' : 'hidden'}}">
            <label for="product_id">PID:</label>
            <input name="product_id" value="{{$thisp->product_id ?? ''}}" readonly type="text" class="p-1 border-none">
            <span name="tagname" class="block font-bold px-2 py-1 text-2xl uppercase text-blue-500">{{$thisp->thisproduct->name ?? ''}}</span>
            <div class="flex">
                <img name="productImg" src="{{ isset($thisp) ? url('/public/images/'.$thisp->thisproduct->image) : url('/public/images/imgnot.jpg')}}" alt="" class="w-[200px] h-[200px] object-cover">
                <div class="flex flex-col p-4">
                    <span class=""><b>lo???i s???n ph???m: </b><i  name="cate">{{isset($thisp) ? $thisp->thisproduct->thiscate->name : ''}}</i></span>
                    <span class=""><b>th????ng hi???u: </b><i name="th">{{isset($thisp) ? $thisp->thisproduct->thisth->name : ''}}</i></span>
                    <span class=""><b>m?? t???: </b><i name="des">{{isset($thisp) ? $thisp->thisproduct->des : ''}}</i></span>
                </div>
            </div>
        </div>

        <div id="needproduct" class="{{isset($thisp) ? '' : 'hidden'}}">
            <label for="size" class="font-bold block mt-5">size</label>
            <input type="text" value="{{$thisp->size ?? ''}}" name="size" class="p-1 block w-full">
            
            <label for="color" class="font-bold block mt-5">m??u s???c</label>
            <input type="color" name='color' value={{$thisp->color ?? '#000'}} class="block">        
            <label for="price" class="mt-5 block font-bold">????n gi?? (vn??)</label>
            <input name="price" value="{{$thisp->price ?? ''}}"  type="text" class="w-full mt-2 text-md px-2 py-1 placeholder:italic placeholder:text-gray-300" placeholder="nh???p v??o ????n gi??"/>
            <label for="count" class="font-bold block mt-5">s??? l?????ng</label>
            <input type="text" value="{{$thisp->count ?? ''}}" name="count" class="p-1 block w-full">
        
            <button type="submit" class="px-2 py-1 bg-blue-400 text-white mt-4 rounded-sm">th??m</button>    
        </div>
    </form>
</div>