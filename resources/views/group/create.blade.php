<x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ request()->routeIs('group.create') ? __('Create a New') : __('Edit') }} {{ __('group') }}
        </h2>
    </x-slot>

    <div class="py-12 xs:px-4">
        <div class="max-w-3xl mx-auto px-4 lg:px-8">
            <form action="{{ request()->routeIs('group.create') ? route('group.store') : route('group.update', $group->id) }}" method="POST">
                @csrf
                @if (!request()->routeIs('group.create'))
                    <input type="hidden" name="_method" value="PUT">
                @endif
                <div class="border-t border-b border-gray-300 py-8">
                    <div class="md:w-2/3 w-full mb-6">
                        <label for="name" class="block text-sm font-bold text-gray-700">
                            group Nmae
                        </label>
                        <div class="mt-1 flex rounded-md shadow-sm">
                            <input type="text" name="name" id="name" value="{{ $group->name }}"
                                class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300"
                                placeholder="group name">
                        </div>
                    </div>
                    <div>
                        <label for="description" class="block text-sm font-bold text-gray-700">
                            Description <span class="text-xs text-gray-500">(Optional)</span>
                        </label>
                        <div class="mt-1">
                            <textarea id="description" name="description" rows="7"
                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md">{{ $group->description }}</textarea>
                        </div>
                    </div>

                <div class="mt-6 sm:mt-4">
                    <button type="submit"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{ request()->routeIs('group.create') ? __('Create') : __('Save') }} {{ __('group') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
        var id;

        function getId(user_id, group_id) {
            var x = confirm("Are you sure you want to delete?");
            if (x) {
                var token = $("meta[name='csrf-token']").attr("content");
                var APP_URL = {!! json_encode(url('/')) !!};
                $.ajax({
                    url: APP_URL+"/groupuser/delete/" + group_id + '/' + user_id,
                    type: 'DELETE',
                    data: {
                        "group_id": group_id,
                        "user_id": user_id,
                        "_token": token,
                    },
                    success: function(data) {
                        alert(data['success']);
                        location.reload(true);
                    }
                });
            } else {
                return false;
            }
        }
        $("#deleteRecord_" + id).click(function() {

            var x = confirm("Are you sure you want to delete?");
            if (x) {
                var group_id = $(this).data("group_id");
                var user_id = $(this).data("user_id");
                var token = $("meta[name='csrf-token']").attr("content");

                $.ajax({
                    url: "http://127.0.0.1:8000/user-group/delete/" + group_id + '/' + user_id,
                    type: 'DELETE',
                    data: {
                        "group_id": group_id,
                        "user_id": user_id,
                        "_token": token,
                    },
                    success: function(data) {
                        alert(data['success']);
                        location.reload(true);
                    }
                });
            } else {
                return false;
            }

        });
    </script>
</x-app-layout>
