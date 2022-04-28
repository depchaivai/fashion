<x-dashboard.adminlayout>
    
    <div class="w-full p-4">
        <span class="px-2 py-1 font-bold text-2xl block">hàng đang bán</span>
        <a href="/dashboard/dang-ban/them" class="w-7 h-7 text-center leading-7 rounded-full bg-green-500 text-white block"><i class="fa-solid fa-plus"></i></a>
        {{-- <x-dashboard.productpopup/> --}}
        <div class="mt-5 p-4">
            <span class="font-bold text-xl py-1 text-blue-500">sản phẩm đang bán</span>
            <form action="" class="my-4">
                <label for="cate" class="font-bold">danh mục: </label>
                <select name="cate" id="cateFilter" class="px-2 py-1 w-[150px]">
                    <option value="" class="">tất cả</option>
                </select>
                <label for="cate" class="font-bold ml-4">thương hiệu: </label>
                <select name="cate" id="cateFilter" class="px-2 py-1 w-[150px]">
                    <option value="" class="">tất cả</option>
                </select>
                <label for="cate" class="font-bold ml-4">khoảng giá: </label>
                <select name="cate" id="cateFilter" class="px-2 py-1 w-[150px]">
                    <option value="" class="">tất cả</option>
                </select>
            </form>
            <table class="w-full">
                <thead>
                    <tr class="text-green-500">
                        <th class="text-left border p-2">hình ảnh</th>
                        <th class="text-left border p-2">tên sp</th>
                        <th class="text-left border p-2">thương hiệu</th>
                        <th class="text-left border p-2">đơn giá</th>
                        <th class="text-left border p-2">size</th>
                        <th class="text-left border p-2">màu</th>
                        <th class="text-left border p-2">loại sp</th>
                        <th class="text-left border p-2">sl</th>
                        <th class="text-left border p-2"></th>
                    </tr>
                </thead>
                <tbody class="">
                    @foreach($allsalep as $item)
                        <tr class="">
                            <td class="border p-2"><img src="{{url('/public/images/'.$item->thisproduct->image)}}" alt="{{$item->thisproduct->name}}" class="w-20 h-20 object-cover"></td>
                            <td class="font-bold border p-2">{{$item->thisproduct->name}}</td>
                            <td class="border p-2">{{$item->thisproduct->thisth->name}}</td>
                            <td class="border p-2" class="text-red-600">{{$item->price}}</td>
                            <td class="border p-2" >{{$item->size}}</td>
                            <td class="border p-2" ><input type="color" disabled value="{{$item->color}}" class=""></td>
                            <td class="border p-2">{{$item->thisproduct->thiscate->name}}</td>
                            <td class="border p-2">{{$item->count}}</td>
                            <td class="border p-2 text-center">
                                <a href={{"/dashboard/dang-ban/edit/$item->id"}}><i class="editPBtn fa-solid fa-pen-to-square text-xl text-green-500 mr-2"></i></a>
                                <i class="fa-solid fa-square-minus text-xl text-red-500 cursor-pointer"></i>
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
</x-dashboard.adminlayout>