<x-dashboard.adminlayout>
    <x-slot name="myjs">
        <script>
            const editPBtn = document.querySelectorAll('.editPBtn');
        </script>
    </x-slot>
    <div class="w-full p-4">
        <span class="px-2 py-1 font-bold text-2xl block">quản lý sản phẩm</span>
        <a href="/dashboard/product/addnew" class="w-7 h-7 text-center leading-7 rounded-full bg-green-500 text-white block"><i class="fa-solid fa-plus"></i></a>
        <x-dashboard.productpopup/>
        <div class="mt-5 p-4">
            <span class="font-bold text-xl py-1 text-blue-500">sản phẩm hiện có</span>
            <form action="" class="my-4">
                <label for="cate" class="font-bold">danh mục: </label>
                <select name="cate" id="cateFilter" class="px-2 py-1 w-[150px]">
                    <option value="" class="">tất cả</option>
                </select>
                <label for="cate" class="font-bold ml-4">thương hiệu: </label>
                <select name="cate" id="cateFilter" class="px-2 py-1 w-[150px]">
                    <option value="" class="">tất cả</option>
                </select>
                
            </form>
            <table class="w-full">
                <tbody class="">
                    @foreach($allp as $item)
                        <tr class="">
                            <td><img src="{{url('/public/images/'.$item->image)}}" alt="{{$item->name}}" class="w-20 h-20 object-cover"></td>
                            <td class="font-bold">{{$item->name}}</td>
                            <td>{{$item->thisth->name}}</td>
                            <td>{{$item->thiscate->name}}</td>
                            <td class="">
                                <a href={{"/dashboard/san-pham/edit/$item->id"}}><i class="editPBtn fa-solid fa-pen-to-square text-xl text-green-500 mr-2"></i></a>
                                <i class="fa-solid fa-square-minus text-xl text-red-500 cursor-pointer"></i>
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
</x-dashboard.adminlayout>