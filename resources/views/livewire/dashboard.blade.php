<div>

    <div class="flow-root ">
        <p class="float-left pl-10 text-green-600">
            <a wire:click.prevent="export" role="button" href="#" class="mr-5 text-3xl text-green-700"><i class="fas fa-file-excel"></i></a>
        </p>

        <p class="float-right text-green-800">
            <div class="flex flex-col mx-4 my-4 sm:flex-row">
                <div class="flex flex-row mb-1 sm:mb-0">
                    <div class="relative">
                        <select wire:change="changeStatus($event.target.value)"
                            class="block w-full h-full px-4 py-2 pr-8 leading-tight text-gray-700 bg-white border-t border-b border-r border-gray-400 rounded-r appearance-none sm:rounded-r-none sm:border-r-0 focus:outline-none focus:border-l focus:border-r focus:bg-white focus:border-gray-500">
                            <option value='' >الحالة</option>
                            <option value='1'>محدث</option>
                            <option value='0'>غير محدث</option>
                        </select>
                    </div>
                </div>

                <div class="relative block">
                    <span class="absolute inset-y-0 left-0 flex items-center h-full pl-2">
                        <svg viewBox="0 0 24 24" class="w-4 h-4 text-gray-500 fill-current">
                            <path
                                d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z">
                            </path>
                        </svg>
                    </span>
                    <input wire:model="search" type="text" placeholder="البحث باسم الطالب..." class="block w-full py-2 pl-8 pr-6 text-sm text-gray-700 placeholder-gray-400 bg-white border border-b border-gray-400 rounded-l rounded-r appearance-none sm:rounded-l-none focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />
                </div>
            </div>
        </p>
    </div>


    @if(count($students) > 0)

    {{-- <div class="py-4">
        <x-table>
            <x-slot name="head">
                <x-table.heading>Hey</x-table.heading>
                <x-table.heading>there</x-table.heading>
            </x-slot>

            <x-slot name="body">
                <x-table.row>
                    <x-table.cell>One</x-table.cell>
                    <x-table.cell>Tow</x-table.cell>
                </x-table.row>
            </x-slot>
        </x-table>
    </div> --}}


        <div class="flex flex-col m-5 mt-8">
            <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                    <table class="max-w-4xl min-w-full mx-auto w-ful">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-100 uppercase bg-gray-700 border-b border-gray-400">#</th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-100 uppercase bg-gray-700 border-b border-gray-400"><a wire:click.prevent="sortBy('name')" role="button" href="#"> الاسم @include('includes._sort-icon', ['field' => 'name'])</a></th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-100 uppercase bg-gray-700 border-b border-gray-400"><a wire:click.prevent="sortBy('school_id')" role="button" href="#"> المدرسة @include('includes._sort-icon', ['field' => 'school_id'])</a></th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-100 uppercase bg-gray-700 border-b border-gray-400"><a wire:click.prevent="sortBy('class')" role="button" href="#"> الصف @include('includes._sort-icon', ['field' => 'class'])</a></th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-100 uppercase bg-gray-700 border-b border-gray-400"><a wire:click.prevent="sortBy('stage')" role="button" href="#"> المرحلة @include('includes._sort-icon', ['field' => 'stage'])</a></th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-100 uppercase bg-gray-700 border-b border-gray-400">الجوال</th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-100 uppercase bg-gray-700 border-b border-gray-400"><a wire:click.prevent="sortBy('status')" role="button" href="#"> الحالة @include('includes._sort-icon', ['field' => 'status'])</a></th>
                            </tr>
                        </thead>

                        <tbody class="text-center bg-white">
                            @foreach($students as $index=> $student)
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200" scope="row">
                                        <div class="text-sm leading-5 text-gray-500">{{ $index + 1 }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="text-sm leading-5 text-gray-500">{{ $student->name }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="text-sm leading-5 text-gray-500">{{ $student->school->name }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="text-sm leading-5 text-gray-500">{{ $student->class }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="text-sm leading-5 text-gray-500">{{ $student->stage }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="text-sm leading-5 text-gray-500">{{ $student->mobile }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="text-sm leading-5 text-gray-500">
                                            @if ($student->status == 1)
                                                <span class="text-green-600">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                    </svg>
                                                </span>
                                            @else
                                                <span class="text-red-600">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                                    </svg>
                                                </span>
                                            @endif
                                        </div>
                                    </td>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="pt-4 pb-10 m-5">
            {{ $students->links() }}
        </div>
    @endif
</div>
