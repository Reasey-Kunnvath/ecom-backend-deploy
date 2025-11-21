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
                                Dashboard
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
                                    class="ml-1 text-gray-700 hover:text-primary-600 md:ml-2 dark:text-gray-300 dark:hover:text-white">Job
                                    Application</a>
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
                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">Job Application</h1>
            </div>
            <div class="sm:flex">
                <div
                    class="  items-center hidden mb-3 sm:flex sm:divide-x sm:divide-gray-100 sm:mb-0 dark:divide-gray-700">
                    <form class="lg:pr-3" action="#" method="GET">
                        <label for="roles-search" class="sr-only">Search</label>
                        <div class="relative">
                            <input type="text" wire:model.live.debounce.600ms="search"
                                class="block w-64 p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Search" required>
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </form>
                </div>
                {{-- <div class="flex items-center ml-auto space-x-2 sm:space-x-3">
                    <button type="button" wire:click="add_modal"
                        class="cursor-pointer inline-flex items-center justify-center w-1/2 px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 sm:w-auto dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Create
                    </button>
                </div> --}}
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
                                    Job Application ID
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Job Posting ID
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Own Application
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Application Type
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Application Date
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Application Status
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                            @foreach ($applications as $index => $app)
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
                                        JAP-{{ sprintf('%06d', $app->id + 0) ?? '' }}
                                    </td>
                                    <td
                                        class="max-w-sm p-4 overflow-hidden text-base font-normal text-gray-500 truncate xl:max-w-xs dark:text-gray-400">
                                        {{ $app->jobPosting->job_title ?? '' }}
                                    </td>
                                    <td
                                        class="max-w-sm p-4 overflow-hidden text-base font-normal text-gray-500 truncate xl:max-w-xs dark:text-gray-400">
                                        {{ $app->applicant->name ?? '' }}
                                    </td>
                                    <td
                                        class="max-w-sm p-4 overflow-hidden text-base font-normal text-gray-500 truncate xl:max-w-xs dark:text-gray-400">
                                        {{ $app->application_type ?? '' }}
                                    </td>
                                    <td
                                        class="max-w-sm p-4 overflow-hidden text-base font-normal text-gray-500 truncate xl:max-w-xs dark:text-gray-400">
                                        {{ $app->application_date ?? '' }}
                                    </td>
                                    <td
                                        class="p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                        <div class="flex items-center">
                                            @if ($app->application_status == 'P')
                                                <div class="h-2.5 w-2.5 rounded-full bg-amber-400 mr-2"></div>
                                                <span
                                                    class="px-2 py-1 text-xs rounded-full bg-amber-100 text-gray-700">
                                                    Pending
                                                </span>
                                            @endif
                                            @if ($app->application_status == 'C')
                                                <div class="h-2.5 w-2.5 rounded-full bg-gray-900 mr-2 dark:bg-white">
                                                </div>
                                                <span
                                                    class="px-2 py-1 text-xs rounded-full bg-gray-800 text-white dark:bg-gray-100 dark:text-gray-800  ">
                                                    Close
                                                </span>
                                            @endif
                                            @if ($app->application_status == 'R')
                                                <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2"></div>
                                                <span class="px-2 py-1 text-xs rounded-full bg-red-100 text-red-700">
                                                    Rejected
                                                </span>
                                            @endif
                                            @if ($app->application_status == 'S')
                                                <div class="h-2.5 w-2.5 rounded-full bg-green-400 mr-2"></div>
                                                <span
                                                    class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-700">
                                                    Shortlisted
                                                </span>
                                            @endif
                                        </div>
                                    </td>

                                    </td>
                                    <td class="p-4 space-x-2 whitespace-nowrap">
                                        <!-- View -->
                                        <button type="button" wire:click="view_modal({{ $app->id }})"
                                            class=" cursor-pointer inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:ring-4 focus:ring-amber-300 dark:focus:ring-amber-900">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="w-4 h-4">
                                                <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                                <path fill-rule="evenodd"
                                                    d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                        <!-- Edit -->
                                        {{-- <button type="button" wire:click="edit_modal({{ $app->id }})"
                                            class="cursor-pointer inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-amber-500 rounded-lg hover:bg-amber-600 focus:ring-4 focus:ring-amber-300 dark:focus:ring-amber-900">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="w-4 h-4">
                                                <path
                                                    d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                                                <path
                                                    d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                                            </svg>
                                        </button> --}}
                                        <!-- Delete -->
                                        {{-- <button type="button" data-modal-target="delete-industry-modal"
                                            data-modal-toggle="delete-industry-modal"
                                            wire:click="deleteConfirmed({{ $app->id }})"
                                            class="cursor-pointer inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
                                            <svg class="w-4 h-4 " fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </button> --}}
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
        {{ $applications->links(data: ['scrollTo' => false]) }}
    </div>
    <div x-data="{ show: false }" x-show="show" x-on:show-modal.window="show = true"
        x-on:close-modal.window="show = false" x-on:keydown.escape.window="show = false" x-transition.duration.200ms
        x-on:click.outside="show = true"
        class="fixed inset-0 flex items-center justify-center z-50 backdrop-blur-[1px] overflow-x-hidden overflow-y-auto top-4 md:inset-0 h-modal sm:h-full">
        <div class="relative p-4 w-full max-w-4xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-xl dark:bg-gray-700">
                <!-- Modal header -->
                <div
                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Job Application
                    </h3>
                    <button type="button" x-on:click="show = false"
                        class="cursor-pointer text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="crud-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-2 md:p-5" action="#" method="POST"
                    wire:submit.prevent="{{ $isEditMode ? 'update' : 'store' }}">
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <!-- Application date -->
                        <div class="mb-4">
                            <label for="application_date"
                                class="block mb-4 text-sm font-medium text-gray-900 dark:text-white">Application
                                Date</label>
                            <div class="col-span-6 sm:col-span-2">
                                <input type="date" name="application_date" wire:model="application_date"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" />
                            </div>
                            @error('application_date')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- Application Status -->
                        <div class="mb-4">
                            <label for="application_status"
                                class="block mb-4 text-sm font-medium text-gray-900 dark:text-white">
                                Application Status</label>
                            <select name="application_status" wire:model="application_status"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value="P">Pending</option>
                                <option value="C">Closed</option>
                                <option value="R">Rejected</option>
                                <option value="S">Shortlisted</option>
                            </select>
                            @error('application_status')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- Posting ID -->
                        <div class="mb-4 ">
                            <label for="job_posting_id"
                                class="block mb-4 text-sm font-medium text-gray-900 dark:text-white">Posting ID</label>
                            <div class="col-span-6 sm:col-span-1">
                                <input type="text" name="job_posting_id" wire:model="job_posting_id"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Job Posting ID" />
                            </div>
                            @error('job_posting_id')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- Job Posting Title -->
                        <div class="mb-4">
                            <label for="job_posting_title"
                                class="block mb-4 text-sm font-medium text-gray-900 dark:text-white">Job Posting Title
                            </label>
                            <div class="col-span-6 sm:col-span-2">
                                <input type="text" name="job_posting_title" wire:model="job_posting_title"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Job Posting Title" />
                            </div>
                            @error('job_posting_title')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- Own Application Name -->
                        <div class="mb-4">
                            <label for="applicant_id"
                                class="block mb-4 text-sm font-medium text-gray-900 dark:text-white">Own Applicant
                                ID</label>
                            <div class="col-span-6 sm:col-span-2">
                                <input type="text" name="applicant_id" wire:model="applicant_id"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Own Applicant Name" />
                            </div>
                            @error('applicant_id')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- Application Type -->
                        <div class="mb-4">
                            <label for="application_type"
                                class="block mb-4 text-sm font-medium text-gray-900 dark:text-white">
                                Application Type</label>
                            <select name="application_type" wire:model="application_type"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value="CV_UPL">CV Upload</option>
                                <option value="EZ_APY">Easy Apply</option>
                            </select>
                            @error('application_type')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- Created Date -->
                        <div class="mb-4">
                            <label for="created_at"
                                class="block mb-4 text-sm font-medium text-gray-900 dark:text-white">Created
                                Date</label>
                            <div class="col-span-6 sm:col-span-2">
                                <input type="date" name="created_at" wire:model="created_at"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Created Date" />
                            </div>
                            @error('created_at')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- Updated Date -->
                        <div class="mb-4">
                            <label for="updated_at"
                                class="block mb-4 text-sm font-medium text-gray-900 dark:text-white">Updated
                                Date</label>
                            <div class="col-span-6 sm:col-span-2">
                                <input type="date" name="updated_at" wire:model="updated_at"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Updated Date" />
                            </div>
                            @error('created_at')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- Application Reason -->
                        <div class="col-span-6 sm:col-span-2">
                            <label for="reason"
                                class="block mb-4 text-sm font-medium text-gray-900 dark:text-white">Reason</label>
                            <textarea name="reason" wire:model="reason"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Reasonn" rows="4"></textarea>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    @if ($isViewMode == true)
                        <div class="items-center md:p-2 border-t border-gray-200 rounded-b">
                            <button type="button" x-on:click="show = false"
                                class="cursor-pointer py-2.5 px-5 text-sm font-medium text-gray-100 focus:ring-1 focus:ring-red-500 bg-red-500 rounded-lg border border-gray-200 hover:bg-red-100 hover:text-red-700">
                                Close
                            </button>
                            @if ($cv_path)
                                <a href="{{ asset('storage/' . $cv_path) }}" target="_blank"
                                    class="float-right cursor-pointer ml-2 py-2.5 px-5 text-sm font-medium text-gray-100 focus:ring-1 focus:ring-green-500 bg-green-500 rounded-lg border border-gray-200 hover:bg-green-400 hover:text-white">
                                    View CV
                                </a>
                            @endif
                            @if ($cover_letter)
                                <a href="{{ asset('storage/' . $cover_letter) }}" target="_blank"
                                    class="float-right cursor-pointer py-2.5 px-5 text-sm font-medium text-gray-100 focus:ring-1 focus:ring-green-500 bg-green-500 rounded-lg border border-gray-200 hover:bg-green-400 hover:text-white">
                                    View CL
                                </a>
                            @endif
                        </div>
                    @else
                        <div class="flex items-center md:p-2 border-t border-gray-200 rounded-b">
                            <button type="submit"
                                class="cursor-pointer py-2.5 px-5  text-sm font-medium {{ $isEditMode ? 'bg-yellow-500 hover:text-yellow-500 focus:ring-2 focus:ring-yellow-500 hover:ring-yellow-500' : 'bg-primary-500' }}   text-white focus:ring-2 focus:ring-primary-500  rounded-lg border border-gray-200 hover:text-gray-900 hover:bg-gray-100 ">
                                {{ $isEditMode ? 'Update' : 'Create' }}
                            </button>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>
