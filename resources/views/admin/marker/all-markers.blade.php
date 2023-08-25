<x-app-layout>
    <div class="row pt-4 mt-2">
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-hidden">

                        @if($markers)
                            <div class="flex justify-between">
                                <div>Количество посаженных деревьев: {{$markers->total()}}</div>
{{--                                <div>--}}
{{--                                    <livewire:mayor.export-marker :forExp="$forExp"/>--}}
{{--                                </div>--}}
                            </div>

                            <table class="min-w-full text-left text-sm font-light">
                                <thead class="border-b font-medium dark:border-neutral-500">
                                <tr>
                                    <th scope="col" class="px-6 py-4">#</th>
                                    <th scope="col" class="px-6 py-4">Район</th>
                                    <th scope="col" class="px-6 py-4">Место</th>
                                    <th scope="col" class="px-6 py-4">Порода</th>
                                    <th scope="col" class="px-6 py-4">Время посадки</th>
{{--                                    <th scope="col" class="px-6 py-4">Действие</th>--}}
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($markers as $item)
                                    <tr class="border-b dark:border-neutral-500">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium">{{$markers->firstItem() + $loop->index}}</td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            @if($item->place)
                                                @if($item->place->area)
                                                    {{$item->place->area->title_ru}}
                                                @else
                                                    -
                                                @endif
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            @if($item->place)
                                                {{$item->place->title_ru}}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            @if($item->breed)
                                                {{$item->breed->title_ru}}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            {{$item->created_at->format('d/m/y H:i')}}
                                        </td>
{{--                                        <td class="whitespace-nowrap px-6 py-4">--}}
{{--                                            <a href="{{route('mayor-marker-show', ["id"=>$item->id])}}" class="mr-3">--}}
{{--                                                <i class="fas fa-eye"></i>--}}
{{--                                            </a>--}}
{{--                                        </td>--}}
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="py-4 text-center">
                                {{$markers->appends(request()->except('page'))->links()}}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
