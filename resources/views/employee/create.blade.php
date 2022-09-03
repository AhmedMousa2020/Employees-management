<x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ request()->routeIs('employee.create') ? __('Create a New') : __('Edit') }} {{ __('employee') }}
        </h2>
    </x-slot>

    <div class="py-12 xs:px-4">
        <div class="max-w-3xl mx-auto px-4 lg:px-8">
            <form action="{{ request()->routeIs('employee.create') ? route('employee.store') : route('employee.update', $employee->id) }}" method="POST">
                @csrf
                @if (!request()->routeIs('employee.create'))
                    <input type="hidden" name="_method" value="PUT">
                @endif
                <div class="border-t border-b border-gray-300 py-8">
                    <div class="md:w-2/3 w-full mb-6">
                        <label for="name" class="block text-sm font-bold text-gray-700">
                            Employee Name
                        </label>
                        <div class="mt-1 flex rounded-md shadow-sm">
                            <input type="text" name="name" id="name" value="{{ $employee->name }}"
                                class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300"
                                placeholder="employee name">
                        </div>
                    </div>
                    <div class="md:w-2/3 w-full mb-6">
                        <label for="role" class="block text-sm font-bold text-gray-700">
                            Employee Role
                        </label>
                        <div class="mt-1 flex rounded-md shadow-sm">
                            <input type="text" name="role" id="role" value="{{ $employee->role }}"
                                class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300"
                                placeholder="employee role">
                        </div>
                    </div>

                    <div class="md:w-2/3 w-full mb-6">
                        <label for="email" class="block text-sm font-bold text-gray-700">
                            Employee Email
                        </label>
                        <div class="mt-1 flex rounded-md shadow-sm">
                            <input type="text" name="email" id="email" value="{{ $employee->email }}"
                                class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300"
                                placeholder="employee email">
                        </div>
                    </div>
                    <div>
                        <label for="group" class="mt-1 block text-sm font-bold text-gray-700">
                            Assigned for group
                        </label>
                        <div class="mt-1">
                            <select id="group" name="group">
                                @foreach (\App\Models\Group::get() as $name)
                                    @if($name->id == $employee->group_id)
                                    <option value="{{ $name->id }}" Selected>{{ $name->name }}</option>
                                @else
                                    <option value="{{ $name->id }}">{{ $name->name }}</option>
                                @endif    
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>
                <div class="mt-6 sm:mt-4">
                    <button type="submit"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{ request()->routeIs('employee.create') ? __('Create') : __('Save') }} {{ __('employee') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>
