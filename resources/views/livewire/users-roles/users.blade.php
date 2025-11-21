<div>
    <div
        class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">
        <div class="w-full mb-1">
            <div class="mb-4">
                <nav class="flex mb-5" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 text-sm font-medium md:space-x-2">
                        <li class="inline-flex items-center">
                            <a href="#"
                                class="inline-flex items-center text-gray-700 hover:text-primary-600 dark:text-gray-300 dark:hover:text-white">
                                <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                    </path>
                                </svg>
                                Home
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <a href="#"
                                    class="ml-1 text-gray-700 hover:text-primary-600 md:ml-2 dark:text-gray-300 dark:hover:text-white">Users</a>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="ml-1 text-gray-400 md:ml-2 dark:text-gray-500"
                                    aria-current="page">List</span>
                            </div>
                        </li>
                    </ol>
                </nav>
                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">All Users</h1>
            </div>
            <div class="sm:flex">
                <div
                    class="  items-center hidden mb-3 sm:flex sm:divide-x sm:divide-gray-100 sm:mb-0 dark:divide-gray-700">
                    <form class="lg:pr-3" action="#" method="GET">
                        <label for="users-search" class="sr-only">Search</label>
                        <div class="relative">
                            <input type="text" wire:model.live.debounce.600ms="search"
                                class="block w-64 p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Search for users" required>
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </form>
                    <!-- Checkbox Search -->
                    {{-- <label for="users-search" class="sr-only">Search</label>
                    <div class="relative">
                        <input type="text"
                            class="block w-64 p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search for users" required>
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                    </div> --}}

                    {{-- <div class="flex pl-0 mt-3 space-x-1 sm:pl-2 sm:mt-0">
                        <a href="#"
                            class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a href="#"
                            class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a href="#"
                            class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a href="#"
                            class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z">
                                </path>
                            </svg>
                        </a>
                    </div> --}}
                </div>
                <div class="flex items-center ml-auto space-x-2 sm:space-x-3">
                    <button type="button" wire:click="add_user_modal" title="Add User"
                        class="cursor-pointer inline-flex items-center justify-center w-1/2 px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 sm:w-auto dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Add User
                    </button>
                    <!--button to export users to CSV-->
                    {{-- <a href="#"
                        class="inline-flex items-center justify-center w-1/2 px-3 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-primary-300 sm:w-auto dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700">
                        <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Export
                    </a> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-col">
        <div class="overflow-x-auto">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden shadow">
                    <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th scope="col" class="p-4">
                                    <div class="flex items-center">
                                        <input id="checkbox-all" aria-describedby="checkbox-1" type="checkbox"
                                            class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:focus:ring-primary-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="checkbox-all" class="sr-only">checkbox</label>
                                    </div>
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    User ID
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Name
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Email
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Role
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Email Verified At
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Status
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Created At
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                            @foreach ($users as $user)
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <td class="w-4 p-4">
                                        <div class="flex items-center">
                                            <input id="" aria-describedby="checkbox-1" type="checkbox"
                                                class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:focus:ring-primary-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="" class="sr-only">checkbox</label>
                                        </div>
                                    </td>
                                    <td
                                        class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ sprintf('%03d', $user->id + 0) ?? '' }}
                                    </td>
                                    <td
                                        class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $user->name ?? '' }}
                                    </td>
                                    <td
                                        class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $user->email ?? '' }}
                                    </td>
                                    <td
                                        class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $user->role ?? '' }}
                                    </td>
                                    <td
                                        class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $user->email_verified_at ? $user->email_verified_at->format('d M Y g:i A') : '' }}
                                    </td>
                                    <td
                                        class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <div class="flex items-center">
                                            @if ($user->status == true)
                                                <div class="h-2.5 w-2.5 rounded-full bg-green-400 mr-2"></div>
                                                Active
                                            @endif
                                            @if ($user->status == false)
                                                <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2"></div>
                                                Inactive
                                            @endif
                                        </div>
                                    </td>
                                    <td
                                        class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $user->created_at ? $user->created_at->format('d M Y g:i A') : ' ' }}

                                    </td>
                                    <td class="p-4 space-x-2 whitespace-nowrap">
                                        {{-- View --}}
                                        <button type="button" wire:click="show_view_modal({{ $user->id }})"
                                            title="View User"
                                            class="cursor-pointer inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="w-4 h-4 ">
                                                <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                                <path fill-rule="evenodd"
                                                    d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                        {{-- Edit --}}
                                        <button type="button" wire:click="show_edit_modal({{ $user->id }})"
                                            class="cursor-pointer inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-amber-500  hover:bg-amber-600 focus:ring-4 focus:ring-amber-300 dark:focus:ring-amber-900">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="w-4 h-4">
                                                <path
                                                    d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                                                <path
                                                    d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                                            </svg>

                                        </button>
                                        {{-- Delete --}}
                                        <button type="button" data-modal-target="delete-user-modal"
                                            title="Delete User" data-modal-show="delete-user-modal"
                                            wire:click="deleteConfirm({{ $user->id }})"
                                            class="cursor-pointer inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div
        class="sticky bottom-0 right-0 items-center w-full p-4 bg-gray-100 border-t border-gray-200  dark:bg-gray-800 dark:border-gray-700">
        {{ $users->links(data: ['scrollTo' => false]) }}
    </div>


    <!-- Add User Modal -->
    <div x-data="{ show: false }" x-show="show" x-on:show-modal.window="show = true"
        x-on:close-modal.window="show = false" x-on:keydown.escape.window="show = false" x-transition.duration.200ms
        x-on:click.outside="show = true"
        class="fixed inset-0 flex items-center justify-center z-50 backdrop-blur-[1px] overflow-x-hidden overflow-y-auto top-4 md:inset-0 h-modal sm:h-full">
        <div
            class="@if ($addMode == true) relative w-150 h-auto px-4 md:h-auto @else relative w-screen h-full max-w-[1400px] px-4 md:h-auto @endif">
            <!-- Modal content -->
            <div class="relative bg-white p-3 rounded-lg shadow shadow-xl/40 overflow-y-auto dark:bg-gray-800">
                <!-- Modal header -->
                <div
                    class="@if ($addMode == true) @else bg-white grid grid-cols-1 px-4 pt-2 xl:grid-cols-3 xl:gap-2 dark:bg-gray-900 @endif ">
                    <div class="flex col-span-full xl:mb-2">
                        <h1
                            class="text-lg font-semibold text-gray-900 border-gray-200 dark:border-gray-700 dark:text-white">
                            User Profile
                        </h1>
                        <button type="button" x-on:click="show = false"
                            class="cursor-pointer text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-700 dark:hover:text-white"
                            data-modal-toggle="edit-role-modal">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>

                    <!-- Right Content -->
                    <div class="col-span-full xl:col-auto">
                        <div
                            class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                            <div
                                class="items-center sm:flex xl:block 2xl:flex sm:space-x-4 xl:space-x-0 2xl:space-x-4">
                                <img class="mb-4 rounded-lg w-28 h-28 sm:mb-0 xl:mb-4 2xl:mb-0"
                                    src="{{ asset('images/userProfile/team-5.jpg') }}" alt="Jese picture" />
                                <div>
                                    <h3 class="mb-1 text-xl font-bold text-gray-900 dark:text-white">
                                        {{ $first_name }}
                                    </h3>
                                    <div class="mb-4 text-sm text-gray-500 dark:text-gray-400">
                                        JPG, GIF or PNG. Max size of 800K
                                    </div>
                                    <div class="flex items-center space-x-4">
                                        <button type="button"
                                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                            <svg class="w-4 h-4 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z">
                                                </path>
                                                <path d="M9 13h2v5a1 1 0 11-2 0v-5z"></path>
                                            </svg>
                                            Upload picture
                                        </button>

                                        <button type="button"
                                            class="py-2 px-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                            Delete
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="p-2 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                            <h3 class="mb-4 text-gray-800 text-xl font-semibold dark:text-white">
                                User information
                            </h3>
                            <div class="mb-4">
                                <label for="username"
                                    class="block mb-4 text-sm font-medium text-gray-900 dark:text-white"></label>
                                <div class="col-span-6 sm:col-span-3">
                                    <input id="username" type="text" name="username" wire:model="userName"
                                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Username" />
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="Email"
                                    class="block mb-4 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                <div class="col-span-6 sm:col-span-3">
                                    <input id="Email" type="email" name="Email" wire:model="userEmail"
                                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="your@example.com" required />
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="userRole"
                                    class="block mb-4 text-sm font-medium text-gray-900 dark:text-white">User
                                    Role</label>
                                <select name="userRole" wire:model="userRole"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role['role_name'] ?? '' }}">
                                            {{ $role['role_name'] ?? '' }}</option>
                                    @endforeach


                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="status"
                                    class="block mb-4 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                                <select id="status" name="status" wire:model="status"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option value="true"{{ $status == true ? 'selected' : '' }}>Active
                                    </option>
                                    <option value="false"{{ $status == false ? 'selected' : '' }}>
                                        Inactive
                                    </option>
                                </select>
                            </div>
                            <div class="mb-1 mt-4">
                                <div class="grid grid-cols-3 gap-3 text-center">
                                    <label for="bio"
                                        class="block  text-sm font-medium text-gray-900 dark:text-white">Email
                                        Verify </label>
                                    <label for="bio"
                                        class="block  text-sm font-medium text-gray-900 dark:text-white">Create
                                        At</label>
                                    <label for="bio"
                                        class="block  text-sm font-medium text-gray-900 dark:text-white">Update
                                        At</label>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="grid grid-cols-3 gap-3 text-center">
                                    <label for="bio" wire:model="emailVerifiedAt"
                                        class="block  text-sm font-medium text-gray-900 dark:text-white">{{ $emailVerifiedAt }}</label>
                                    <label for="bio" wire:model="userCreatedAt"
                                        class="block  text-sm font-medium text-gray-900 dark:text-white">{{ $userCreatedAt }}</label>
                                    <label for="bio" wire:model="userUpdatedAt"
                                        class="block  text-sm font-medium text-gray-900 dark:text-white">{{ $userUpdatedAt }}</label>
                                    </label>
                                </div>
                            </div>
                            <div class="mt-6">
                                @if ($viewMode == true)
                                    <button class="text-white bg-white hover:bg-primary-800 ">
                                    </button>
                                @endif
                                @if ($editMode == true)
                                    <button wire:click="updateUser"
                                        class="cursor-pointer inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-amber-500  hover:bg-amber-600 focus:ring-4 focus:ring-amber-300 dark:focus:ring-amber-900">
                                        Update
                                    </button>
                                @endif
                            </div>
                        </div>

                    </div>
                    <!-- Left Content -->
                    @if ($editMode == true || $viewMode == true)
                        <div class="col-span-2">
                            <div
                                class="mb-4 border-b text-gray-800 border-gray-200 dark:border-gray-700 dark:text-white">
                                <ul id="default-styled-tab"
                                    class="flex flex-wrap -mb-px text-sm font-medium text-center"
                                    data-tabs-toggle="#default-styled-tab-content"
                                    data-tabs-active-classes="text-purple-600 hover:text-purple-600 dark:text-purple-500 dark:hover:text-purple-500 border-purple-600 dark:border-purple-500"
                                    data-tabs-inactive-classes="dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300"
                                    role="tablist">
                                    <li class="me-2" role="presentation">
                                        <button id="profile-styled-tab"
                                            class="inline-block w-20 p-2 border-b-2 rounded-t-lg"
                                            data-tabs-target="#styled-profile" type="button" role="tab"
                                            aria-controls="profile" aria-selected="false">Profile</button>
                                    </li>
                                    <li class="me-2" role="presentation">
                                        <button id="dashboard-styled-tab"
                                            class="inline-block p-2 border-b-2 w-20 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                            data-tabs-target="#styled-dashboard" type="button" role="tab"
                                            aria-controls="dashboard" aria-selected="false">Skill</button>
                                    </li>
                                    <li class="me-2" role="presentation">
                                        <button id="settings-styled-tab"
                                            class="inline-block p-2 border-b-2 w-25 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                            data-tabs-target="#styled-settings" type="button" role="tab"
                                            aria-controls="settings" aria-selected="false">Experience</button>
                                    </li>
                                    <li class="me-2" role="presentation">
                                        <button id="education-styled-tab"
                                            class="inline-block p-2 border-b-2 w-22 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                            data-tabs-target="#styled-education" type="button" role="tab"
                                            aria-controls="education" aria-selected="false">Education</button>
                                    </li>
                                    <li role="presentation">
                                        <button id="certificate-styled-tab"
                                            class="inline-block p-2 border-b-2 w-24 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                            data-tabs-target="#styled-certificate" type="button" role="tab"
                                            aria-controls="certificate" aria-selected="false">Certificate</button>
                                    </li>
                                </ul>
                            </div>
                            <div id="default-styled-tab-content">
                                <div id="styled-profile"
                                    class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800"
                                    role="tabpanel" aria-labelledby="profile-tab">
                                    <h3 class=" text-gray-800 mb-4 text-xl font-semibold dark:text-white">
                                        Profile
                                    </h3>
                                    <form action="#" wire:submit.prevent="updateUserProfile">
                                        <div class="grid grid-cols-6 gap-6">
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="first-name"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First
                                                    Name</label>
                                                <input id="first-name" type="text" name="first-name"
                                                    wire:model="first_name"
                                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    placeholder="Bonnie" />
                                            </div>
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="last-name"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last
                                                    Name</label>
                                                <input id="last-name" type="text" name="last-name"
                                                    wire:model="last_name"
                                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    placeholder="Green" />
                                            </div>
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="country"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Country</label>
                                                <input id="country" type="text" name="country"
                                                    wire:model="country"
                                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    placeholder="United States" />
                                            </div>
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="city"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">City</label>
                                                <input id="city" type="text" name="city"
                                                    wire:model="city"
                                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    placeholder="e.g. San Francisco" />
                                            </div>
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="address"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                                                <input id="address" type="text" name="address"
                                                    wire:model="address"
                                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    placeholder="e.g. California" />
                                            </div>
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="email"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Work
                                                    Email</label>
                                                <input id="email" type="email" name="email"
                                                    wire:model="workEmail"
                                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    placeholder="example@company.com" />
                                            </div>
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="phone-number"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone
                                                    Number</label>
                                                <input id="phone-number" type="number" name="phone-number"
                                                    wire:model="phoneNumber"
                                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    placeholder="e.g. +(12)3456 789" />
                                            </div>
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="birthday"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Birthday</label>
                                                <input id="birthday" type="date" name="birthday"
                                                    wire:model="birthday"
                                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    placeholder="15/08/1990" />
                                            </div>
                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="profile-description"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Profile
                                                    Description</label>
                                                <textarea id="profile-description" rows="4" wire:model="profileDesc"
                                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    placeholder="Write a short description about yourself"></textarea>
                                            </div>
                                            <div class="col-span-6 sm:col-full">
                                                @if ($viewMode == true)
                                                    <button class="text-white bg-white hover:bg-primary-800 ">

                                                    </button>
                                                @endif
                                                @if ($editMode == true)
                                                    <button
                                                        class="cursor-pointer inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-amber-500  hover:bg-amber-600 focus:ring-4 focus:ring-amber-300 dark:focus:ring-amber-900"
                                                        type="submit">
                                                        Update
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div id="styled-dashboard"
                                    class="hidden p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800"
                                    role="tabpanel" aria-labelledby="dashboard-tab">
                                    <h3
                                        class="mb-4 text-gray-800 text-xl border-b border-gray-200 font-semibold dark:text-white">
                                        Skill
                                    </h3>
                                    <form action="#">
                                        <div class="grid grid-cols-6 gap-6">
                                            <ul
                                                class="w-48 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                                @foreach ($skill as $skillItem)
                                                    <li
                                                        class="w-full px-4 py-2 border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                                        {{ $skillItem->skill_name }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </form>
                                </div>
                                <div id="styled-settings"
                                    class="hidden p-4 mb-4  bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800"
                                    role="tabpanel" aria-labelledby="settings-tab">
                                    <h3 class="mb-4 text-gray-800 text-xl font-semibold dark:text-white">
                                        Experience
                                    </h3>
                                    <form action="#">
                                        <div class="">
                                            <table
                                                class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                <thead
                                                    class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                                                    <tr>
                                                        <th scope="col" class="px-6 py-3 rounded-s-lg">
                                                            Job Title
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            Company Name
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            Start - Date
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            End - Date
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 rounded-e-lg">
                                                            Detail
                                                        </th>
                                                    </tr>
                                                </thead>
                                                @foreach ($experience as $exp)
                                                    <tbody>
                                                        <tr class="bg-white dark:bg-gray-800">
                                                            <td scope="row"
                                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                                {{ $exp->job_title }}
                                                            </td>
                                                            <td scope="row"
                                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                                {{ $exp->company_name }}
                                                            </td>
                                                            <td class="px-6 py-4">
                                                                {{ $exp->start_date }}
                                                            </td>
                                                            <td class="px-6 py-4">
                                                                {{ $exp->end_date }}
                                                            </td>
                                                            <td class="px-6 py-4">
                                                                {{-- View --}}
                                                                <button type="button"
                                                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        viewBox="0 0 24 24" fill="currentColor"
                                                                        class="w-4 h-4 ">
                                                                        <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                                                        <path fill-rule="evenodd"
                                                                            d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z"
                                                                            clip-rule="evenodd" />
                                                                    </svg>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                @endforeach
                                            </table>
                                        </div>
                                    </form>
                                </div>
                                <div id="styled-education"
                                    class="hidden p-4 mb-4  bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800"
                                    role="tabpanel" aria-labelledby="education-tab">
                                    <h3 class="mb-4 text-gray-800 text-xl font-semibold dark:text-white">
                                        Education
                                    </h3>
                                    <form action="#">
                                        <div class="">
                                            <table
                                                class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                <thead
                                                    class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                                                    <tr>
                                                        <th scope="col" class="px-4 py-3 rounded-s-lg">
                                                            institution Name
                                                        </th>
                                                        <th scope="col" class="px-4 py-3">
                                                            Degree
                                                        </th>
                                                        <th scope="col" class="px-4 py-3">
                                                            Field of Study
                                                        </th>
                                                        <th scope="col" class="px-4 py-3">
                                                            Start - Date
                                                        </th>
                                                        <th scope="col" class="px-4 py-3">
                                                            End - Date
                                                        </th>
                                                        <th scope="col" class="px-4 py-3 rounded-e-lg">
                                                            Detail
                                                        </th>
                                                    </tr>
                                                </thead>
                                                @foreach ($education as $edu)
                                                    <tbody>
                                                        <tr class="bg-white dark:bg-gray-800">
                                                            <td scope="row"
                                                                class="px-4 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                                {{ $edu->institution_name }}
                                                            </td>
                                                            <td class="px-4 py-4">
                                                                {{ $edu->degree }}
                                                            </td>
                                                            <td class="px-4 py-4">
                                                                {{ $edu->field_of_study }}
                                                            </td>
                                                            <td class="px-4 py-4">
                                                                {{ $edu->start_date }}
                                                            </td>
                                                            <td class="px-4 py-4">
                                                                {{ $edu->end_date }}
                                                            </td>
                                                            <td class="px-4 py-4">
                                                                {{-- View --}}
                                                                <button type="button"
                                                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        viewBox="0 0 24 24" fill="currentColor"
                                                                        class="w-4 h-4 ">
                                                                        <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                                                        <path fill-rule="evenodd"
                                                                            d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z"
                                                                            clip-rule="evenodd" />
                                                                    </svg>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                @endforeach
                                            </table>
                                        </div>
                                    </form>
                                </div>
                                <div id="styled-certificate"
                                    class="hidden p-4 mb-4  bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800"
                                    role="tabpanel" aria-labelledby="certificate-tab">
                                    <h3 class="mb-4 text-gray-800 text-xl font-semibold dark:text-white">
                                        Certificate
                                    </h3>
                                    <form action="#">
                                        <div class="">
                                            <table
                                                class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                <thead
                                                    class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                                                    <tr>
                                                        <th scope="col" class="px-4 py-3 rounded-s-lg">
                                                            Certificate Title
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            issued_org
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            issued_date
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 rounded-e-lg">
                                                            Detail
                                                        </th>
                                                    </tr>
                                                </thead>
                                                @foreach ($certificate as $certi)
                                                    <tbody>
                                                        <tr class="bg-white dark:bg-gray-800">
                                                            <th scope="row"
                                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                                {{ $certi->certificate_title }}
                                                            </th>
                                                            <td class="px-6 py-4">
                                                                {{ $certi->issued_org }}
                                                            </td>
                                                            <td class="px-6 py-4">
                                                                {{ $certi->issued_date }}
                                                            </td>
                                                            <td class="px-6 py-4">
                                                                {{-- View --}}
                                                                <button type="button"
                                                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        viewBox="0 0 24 24" fill="currentColor"
                                                                        class="w-4 h-4 ">
                                                                        <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                                                        <path fill-rule="evenodd"
                                                                            d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z"
                                                                            clip-rule="evenodd" />
                                                                    </svg>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                @endforeach
                                            </table>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                    <!-- End Left Content -->
                </div>
            </div>
        </div>
    </div>

    <!-- Delete User Modal -->
    <div id="delete-user-modal" wire:ignore.self
        class="fixed left-0 right-0 z-50 items-center justify-center hidden overflow-x-hidden overflow-y-auto top-4 md:inset-0 h-modal sm:h-full">
        <div class="relative w-full h-full max-w-md px-4 md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
                <!-- Modal header -->
                <div class="flex justify-end p-2">
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-700 dark:hover:text-white"
                        data-modal-hide="delete-user-modal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 pt-0 text-center">
                    <svg class="w-16 h-16 mx-auto text-red-600" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="mt-5 mb-6 text-lg text-gray-500 dark:text-gray-400">Are you sure you want to delete this
                        user?</h3>
                    <a href="#" wire:click="delete()" data-modal-hide="delete-user-modal"
                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-base inline-flex items-center px-3 py-2.5 text-center mr-2 dark:focus:ring-red-800">
                        Yes, I'm sure
                    </a>
                    <a href="#"
                        class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-primary-300 border border-gray-200 font-medium inline-flex items-center rounded-lg text-base px-3 py-2.5 text-center dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700"
                        data-modal-hide="delete-user-modal">
                        No, cancel
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
