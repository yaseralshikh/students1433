<div>
    <div class="bg-rose-300 ...">
        <img class="object-contain w-full h-20" src="{{ asset('images/logo.png') }}">
    </div>

    <div class="flex flex-col mt-8">
        <h1 class="text-2xl font-black text-center">تحديث ارقام جوالات الطلاب الموهوبين</h1>
        <h1 class="text-base font-black text-center">لضمان استمرارية تقديم الرعاية للطلاب الموهوبين نعمل على تحديث بيانات التواصل</h1>

        <div class="flex flex-col justify-center mt-8 sm:flex-row">
            <div class="relative">
                <select name="school" wire:change="changeSchool($event.target.value)" class="block w-full h-full px-4 py-2 pr-8 leading-tight text-gray-700 bg-white border-t border-b border-r border-gray-400 rounded-r appearance-none sm:rounded-r-none sm:border-r-0 focus:outline-none focus:border-l focus:border-r focus:bg-white focus:border-gray-500">
                    <option value=''>اختر المدرسة</option>
                    @foreach($schools as $school)
                        <option value={{ $school->id }}>{{ $school->name }} ( {{ $school->students->count() }} )</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <hr class="flex flex-col mt-8">

    @if(count($students) > 0)
        <div class="flex flex-col mt-8">
            <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                    <table class="max-w-4xl min-w-full mx-auto w-ful">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-100 uppercase bg-gray-700 border-b border-gray-400">#</th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-100 uppercase bg-gray-700 border-b border-gray-400">الاسم</th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-100 uppercase bg-gray-700 border-b border-gray-400">المدرسة</th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-100 uppercase bg-gray-700 border-b border-gray-400">الصف</th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-100 uppercase bg-gray-700 border-b border-gray-400">المرحلة</th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-100 uppercase bg-gray-700 border-b border-gray-400">الحالة</th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-100 uppercase bg-gray-700 border-b border-gray-400">تحديث </th>
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
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="text-sm leading-5 text-gray-500">
                                            <x-jet-button class="mr-1" wire:click="showUpdateModal({{ $student->id }})">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                                </svg>
                                            </x-jet-button>
                                        </div>
                                    </td>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif

    <x-jet-dialog-modal wire:model="modalFormVisible">
        <x-slot name="title">
            {{ __('تحديث رقم الجوال') }}
        </x-slot>

        <x-slot name="content">

            <div class="mt-4">
                <x-jet-label for="mobile" value="{{ __('الجوال') }}"></x-jet-label>
                <x-jet-input typw="text" id="sudent_mobile" wire:model.debounce.500ms="sudent_mobile" class="block w-full mt-1 bg-gray-200 focus:bg-white"></x-jet-input>
                @error('sudent_mobile')<span class="text-sm font-extrabold text-red-500">{{ $message }}</span>@enderror
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalFormVisible')">{{ __('الغاء') }}</x-jet-secondary-button>
            <x-jet-button class="ml-2" wire:click="update">{{ __('حفظ') }}</x-jet-button>
        </x-slot>
    </x-jet-dialog-model>

</div>
