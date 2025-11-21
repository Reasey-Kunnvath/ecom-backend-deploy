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
                                    Posting</a>
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
                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">Job Posting</h1>
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

                <div class="flex items-center ml-auto space-x-2 sm:space-x-3">
                    <button type="button" wire:click="add_modal"
                        class="cursor-pointer inline-flex items-center justify-center w-1/2 px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 sm:w-auto dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Create Post
                    </button>
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
                                    Job Title
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Job Type
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Work Mode
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Min Salary
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Max Salary
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Posted Date
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Exspire Date
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Posted By
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Status
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                            @foreach ($postings as $index => $post)
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
                                        {{ $post->job_title ?? '' }}
                                    </td>
                                    <td
                                        class="max-w-sm p-4 overflow-hidden text-base font-normal text-gray-500 truncate xl:max-w-xs dark:text-gray-400">
                                        {{ $post->job_type ?? '' }}
                                    </td>
                                    <td
                                        class="max-w-sm p-4 overflow-hidden text-base font-normal text-gray-500 truncate xl:max-w-xs dark:text-gray-400">
                                        {{ $post->work_mode ?? '' }}
                                    </td>
                                    <td
                                        class="max-w-sm p-4 overflow-hidden text-base font-normal text-gray-500 truncate xl:max-w-xs dark:text-gray-400">
                                        {{ $post->min_salary ?? '' }} {{ $post->ccy ?? '' }}
                                    </td>
                                    <td
                                        class="max-w-sm p-4 overflow-hidden text-base font-normal text-gray-500 truncate xl:max-w-xs dark:text-gray-400">
                                        {{ $post->max_salary ?? '' }} {{ $post->ccy ?? '' }}
                                    </td>
                                    <td
                                        class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $post->posted_date ?? '' }}
                                    </td>
                                    <td
                                        class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $post->expire_date ?? '' }}
                                    </td>
                                    <td
                                        class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $post->user->name ?? '' }}
                                    </td>
                                    <td
                                        class="p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                        <div class="flex items-center">
                                            @if ($post->is_active == true)
                                                <div class="h-2.5 w-2.5 rounded-full bg-green-400 mr-2"></div>
                                                <span
                                                    class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-700">
                                                    Active
                                                </span>
                                            @endif
                                            @if ($post->is_active == false)
                                                <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2"></div>
                                                <span class="px-2 py-1 text-xs rounded-full bg-red-100 text-red-700">
                                                    Inactive
                                                </span>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="p-4 space-x-2 whitespace-nowrap">
                                        <!-- View -->
                                        <button type="button" wire:click="view_modal({{ $post->id }})"
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
                                        <button type="button" wire:click="edit_modal({{ $post->id }})"
                                            class="cursor-pointer inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-amber-500 rounded-lg hover:bg-amber-600 focus:ring-4 focus:ring-amber-300 dark:focus:ring-amber-900">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="w-4 h-4">
                                                <path
                                                    d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                                                <path
                                                    d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                                            </svg>
                                        </button>
                                        <!-- Delete -->
                                        <button type="button" data-modal-target="delete-industry-modal"
                                            data-modal-toggle="delete-industry-modal"
                                            wire:click="deleteConfirmed({{ $post->id }})"
                                            class="cursor-pointer inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
                                            <svg class="w-4 h-4 " fill="currentColor" viewBox="0 0 20 20"
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
        {{ $postings->links(data: ['scrollTo' => false]) }}
    </div>

    <div x-data="{ show: false }" x-show="show" x-on:show-modal.window="show = true"
        x-on:close-modal.window="show = false" x-on:keydown.escape.window="show = false" x-transition.duration.200ms
        x-on:click.outside="show = true"
        class="fixed inset-0 flex items-center justify-center z-50 backdrop-blur-[1px] overflow-x-hidden overflow-y-auto top-4 md:inset-0 h-modal sm:h-full">
        <div class="relative p-4 w-full max-w-4xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-xl dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex mr-4 items-center justify-between rounded-t dark:border-gray-600 border-gray-200">
                    <div class="">
                        <!--Taps-->
                        <ul id="default-styled-tab"
                            class="flex flex-wrap text-gray-900 -mb-px text-sm font-medium text-center dark:text-gray-100 "
                            data-tabs-toggle="#default-styled-tab-content"
                            data-tabs-active-classes="text-purple-600 hover:text-purple-600 dark:text-purple-500 dark:hover:text-purple-500 border-purple-600 dark:border-purple-500"
                            data-tabs-inactive-classes="dark:border-transparent text-gray-200 hover:text-purple-500 dark:text-gray-100 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300"
                            role="tablist">
                            <li class="me-2" role="presentation">
                                <button id="postDetails-styled-tab"
                                    class=" cursor-pointer text-gray-900 inline-block p-4 border-b-2 rounded-t-lg"
                                    data-tabs-target="#styled-postDetails" type="button" role="tab"
                                    aria-controls="postDetails" aria-selected="true">Post Details</button>
                            </li>
                            <li class="me-2" role="presentation">
                                <button id="Responsibilities-styled-tab"
                                    class="cursor-pointer text-gray-900 inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-200"
                                    data-tabs-target="#styled-Responsibilities" type="button" role="tab"
                                    aria-controls="Responsibilities" aria-selected="false">Responsibilities</button>
                            </li>
                            <li class="me-2" role="presentation">
                                <button id="Experience-styled-tab"
                                    class="cursor-pointer text-gray-900 inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                    data-tabs-target="#styled-Experience" type="button" role="tab"
                                    aria-controls="Experience" aria-selected="false">Experience</button>
                            </li>
                            <li class="me-2" role="presentation">
                                <button id="Education-styled-tab"
                                    class="cursor-pointer text-gray-900 inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                    data-tabs-target="#styled-Education" type="button" role="tab"
                                    aria-controls="Education" aria-selected="false">Education</button>
                            </li>
                            <li class="me-2" role="presentation">
                                <button id="Certificate-styled-tab"
                                    class="cursor-pointer text-gray-900 inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                    data-tabs-target="#styled-Certificate" type="button" role="tab"
                                    aria-controls="Certificate" aria-selected="false">Certificate</button>
                            </li>

                        </ul>
                    </div>
                    <button type="button" x-on:click="show = false"
                        class="cursor-pointer  text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form action="" wire:submit.prevent="{{ $isEditMode ? 'update' : 'store' }}">
                    <div class="space-y-6 h-[620px] max-h-auto overflow-y-auto">
                        <div id="default-styled-tab-content">
                            <div id="styled-postDetails"
                                class="{{ $addResponsibility || $addExperience || $addEducation || $addCertificate ? 'hidden' : '' }} bg-white shadow-sm dark:border-gray-700 sm:p-4 dark:bg-gray-700"
                                role="tabpanel" aria-labelledby="postDetails-tab">
                                <div class="grid grid-cols-4 gap-4 ">
                                    <!-- ID -->
                                    <div class="col-span-2">
                                        <label
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ID</label>
                                        <input type="text" wire:model="postID" disabled
                                            class="cursor-not-allowed bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    </div>
                                    <!-- Job Title -->
                                    <div class="col-span-2">
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Job
                                            Title</label>
                                        <input type="text" wire:model="job_title"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    </div>
                                    <div class="col-span-2">
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Job
                                            Type</label>
                                        <select id="status" name="job_type" wire:model="job_type"
                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            <option value="">-- Select Job Type --</option>
                                            <option value="Full-Time"{{ $job_type == 'On-Site' ? 'selected' : '' }}>
                                                Full-Time
                                            </option>
                                            <option value="Part-Time"{{ $job_type == 'Remote' ? 'selected' : '' }}>
                                                Part-Time
                                            </option>
                                            <option value="Contract"{{ $job_type == 'Hybrid' ? 'selected' : '' }}>
                                                Contract
                                            </option>
                                        </select>
                                    </div>

                                    <!-- Work Mode -->
                                    <div class="col-span-2">
                                        <label
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Work
                                            Mode</label>
                                        <select id="status" name="work_mode" wire:model="work_mode"
                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            <option value="">-- Select Work Mode --</option>
                                            <option value="On-Site"{{ $work_mode == 'On-Site' ? 'selected' : '' }}>
                                                On-Site
                                            </option>
                                            <option value="Remote"{{ $work_mode == 'Remote' ? 'selected' : '' }}>
                                                Remote
                                            </option>
                                            <option value="Hybrid"{{ $work_mode == 'Hybrid' ? 'selected' : '' }}>
                                                Hybrid
                                            </option>
                                        </select>
                                    </div>

                                    <!-- Salary Range -->
                                    <div class="col-span-2">
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Min
                                            Salary</label>
                                        <input type="number" wire:model="min_salary"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    </div>
                                    <div class="col-span-2">
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Max
                                            Salary</label>
                                        <input type="number" wire:model="max_salary"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    </div>
                                    <div class="col-span-2">
                                        <label
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Currency</label>
                                        <select id="status" name="ccy" wire:model="ccy"
                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            <option value="">-- Select Currency --</option>
                                            <option value="USD"{{ $ccy == 'USD' ? 'selected' : '' }}>USD
                                            </option>
                                            <option value="EUR"{{ $ccy == 'EUR' ? 'selected' : '' }}>EUR
                                            </option>
                                            <option value="KHR"{{ $ccy == 'KHR' ? 'selected' : '' }}>KHR
                                            </option>
                                        </select>
                                    </div>

                                    <!-- Job Location -->
                                    <div class="col-span-2">
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Job
                                            Location</label>
                                        <input type="text" wire:model="job_location"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    </div>

                                    <!-- Is Active -->
                                    <div class="col-span-2">
                                        <label for="status"
                                            class="block mb-4 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                                        <select id="status" name="status" wire:model="is_active"
                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            <option value="true"{{ $is_active == true ? 'selected' : '' }}>Active
                                            </option>
                                            <option value="false"{{ $is_active == false ? 'selected' : '' }}>
                                                Inactive
                                            </option>
                                        </select>
                                    </div>

                                    <!-- Posted Date -->
                                    <div class="col-span-2">
                                        <label
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Posted
                                            Date</label>
                                        <input type="date" wire:model="posted_date"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    </div>

                                    <!-- Expire Date -->
                                    <div class="col-span-2">
                                        <label
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Expire
                                            Date</label>
                                        <input type="date" wire:model="expire_date"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    </div>

                                    <!-- Maker ID -->
                                    <div class="col-span-2">
                                        <label
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Maker
                                            ID</label>
                                        <select id="status" name="maker_id" wire:model="maker_id"
                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}"
                                                    {{ $user->name == $maker_id ? 'selected' : '' }}>
                                                    {{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if ($isViewMode)
                                        <!-- Created At -->
                                        <div class="col-span-2">
                                            <label
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Created
                                                At</label>
                                            <input type="date" wire:model="created_at"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        </div>

                                        <!-- Updated At -->
                                        <div class="col-span-2">
                                            <label
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Updated
                                                At</label>
                                            <input type="date" wire:model="updated_at"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        </div>
                                    @endif
                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="job_desc"
                                            class="block mb-4 text-sm font-medium text-gray-900 dark:text-white">Job
                                            Description</label>
                                        <textarea id="skill_desc" name="job_desc" wire:model="job_desc"
                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="Job Description" rows="4"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div id="styled-Responsibilities"
                                class="{{ $addResponsibility ? '' : 'hidden' }} bg-white dark:border-gray-700 sm:p-4 dark:bg-gray-700"
                                role="tabpanel" aria-labelledby="Responsibilities-tab">
                                @foreach ($responsibilities as $index => $reponsibility)
                                    <div class="p-2 mb-4 col-span-6 sm:col-span-2 flex items-center gap-2">
                                        <!-- Feature Label -->
                                        <span class="w-auto text-sm font-medium text-gray-900 dark:text-white">
                                            Reponsibility {{ $index + 1 }}
                                        </span>

                                        <!-- Feature Input -->
                                        <input id="plan_feature_{{ $index }}" type="text"
                                            wire:model="responsibilities.{{ $index }}"
                                            class="flex-1 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="Reponsibility description" />

                                        <!-- Remove Button -->
                                        @if ($index > 0)
                                            <button type="button"
                                                wire:click="removeResponsibilities({{ $index }})"
                                                class="text-red-600 hover:text-red-800 bg-red-100 hover:bg-red-200 rounded px-2 py-1 text-sm">
                                                &times;
                                            </button>
                                        @endif
                                    </div>
                                    {{-- @error('plan_features.' . $index)
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-500 col-span-6 sm:col-span-2">
                                        {{ $message }}</p>
                                @enderror --}}
                                @endforeach
                                <!-- Add Feature Button -->
                                <div class="col-span-6 sm:col-span-2 mt-2">
                                    <button type="button" wire:click="addResponsibilities"
                                        class="cursor-pointer text-amber-600 hover:text-amber-800 text-sm font-medium">
                                        + Add More
                                    </button>
                                </div>
                            </div>
                            <div id="styled-Experience"
                                class=" {{ $addExperience ? '' : 'hidden' }} bg-white dark:border-gray-700 sm:p-4 dark:bg-gray-700"
                                role="tabpanel" aria-labelledby="Experience-tab">
                                @foreach ($req_experience as $index => $req_exp)
                                    <div class="p-2 mb-4 col-span-6 sm:col-span-2 flex items-center gap-2">
                                        <!-- Feature Label -->
                                        <span class="w-auto text-sm font-medium text-gray-900 dark:text-white">
                                            Experience {{ $index + 1 }}
                                        </span>

                                        <!-- Feature Input -->
                                        <input id="plan_feature_{{ $index }}" type="text"
                                            wire:model="req_experience.{{ $index }}"
                                            class="flex-1 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="Experience description" />

                                        <!-- Remove Button -->
                                        @if ($index > 0)
                                            <button type="button"
                                                wire:click="removeExperiences({{ $index }})"
                                                class="text-red-600 hover:text-red-800 bg-red-100 hover:bg-red-200 rounded px-2 py-1 text-sm">
                                                &times;
                                            </button>
                                        @endif
                                    </div>
                                    {{-- @error('plan_features.' . $index)
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-500 col-span-6 sm:col-span-2">
                                        {{ $message }}</p>
                                @enderror --}}
                                @endforeach
                                <!-- Add Feature Button -->
                                <div class="col-span-6 sm:col-span-2 mt-2">
                                    <button type="button" wire:click="addExperiences"
                                        class="cursor-pointer text-amber-600 hover:text-amber-800 text-sm font-medium">
                                        + Add More
                                    </button>
                                </div>
                            </div>
                            <div id="styled-Education"
                                class="{{ $addEducation ? '' : 'hidden' }} bg-white dark:border-gray-700 sm:p-4 dark:bg-gray-700"
                                role="tabpanel" aria-labelledby="Education-tab">
                                @foreach ($req_education as $index => $req_edu)
                                    <div class="p-2 mb-4 col-span-6 sm:col-span-2 flex items-center gap-2">
                                        <!-- Feature Label -->
                                        <span class="w-auto text-sm font-medium text-gray-900 dark:text-white">
                                            Education {{ $index + 1 }}
                                        </span>

                                        <!-- Feature Input -->
                                        <input id="plan_feature_2{{ $index }}" type="text"
                                            wire:model="req_education.{{ $index }}"
                                            class="flex-1 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="Education description" />

                                        <!-- Remove Button -->
                                        @if ($index > 0)
                                            <button type="button" wire:click="removeEducations({{ $index }})"
                                                class="text-red-600 hover:text-red-800 bg-red-100 hover:bg-red-200 rounded px-2 py-1 text-sm">
                                                &times;
                                            </button>
                                        @endif
                                    </div>

                                    {{-- @error('plan_features.' . $index)
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-500 col-span-6 sm:col-span-2">
                                        {{ $message }}</p>
                                @enderror --}}
                                @endforeach
                                <div class="col-span-6 sm:col-span-2 mt-2">
                                    <button type="button" wire:click="addEducations"
                                        class="cursor-pointer text-amber-600 hover:text-amber-800 text-sm font-medium">
                                        + Add More
                                    </button>
                                </div>
                            </div>
                            <div id="styled-Certificate"
                                class=" {{ $addCertificate ? '' : 'hidden' }} bg-white dark:border-gray-700 sm:p-4 dark:bg-gray-700"
                                role="tabpanel" aria-labelledby="Certificate-tab">
                                @foreach ($req_certificate as $index => $req_certi)
                                    <div class="p-2 mb-4 col-span-6 sm:col-span-2 flex items-center gap-2">
                                        <!-- Feature Label -->
                                        <span class="w-auto text-sm font-medium text-gray-900 dark:text-white">
                                            Certificate {{ $index + 1 }}
                                        </span>

                                        <!-- Feature Input -->
                                        <input id="plan_feature_3{{ $index }}" type="text"
                                            wire:model="req_certificate.{{ $index }}"
                                            class="flex-1 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="Certificate description" />

                                        <!-- Remove Button -->
                                        @if ($index > 0)
                                            <button type="button"
                                                wire:click="removeCertificates({{ $index }})"
                                                class="text-red-600 hover:text-red-800 bg-red-100 hover:bg-red-200 rounded px-2 py-1 text-sm">
                                                &times;
                                            </button>
                                        @endif
                                    </div>

                                    {{-- @error('plan_features.' . $index)
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-500 col-span-6 sm:col-span-2">
                                        {{ $message }}</p>
                                @enderror --}}
                                @endforeach
                                <div class="col-span-6 sm:col-span-2 mt-2">
                                    <button type="button" wire:click="addCertificates"
                                        class="cursor-pointer text-amber-600 hover:text-amber-800 text-sm font-medium">
                                        + Add More
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    @if ($isViewMode == true)
                        <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                            <button type="button" x-on:click="show = false"
                                class="cursor-pointer py-2.5 px-5 ms-3 text-sm font-medium text-gray-100 focus:ring-1 focus:ring-red-500 bg-red-500 rounded-lg border border-gray-200 hover:bg-red-100 hover:text-red-700">
                                Close
                            </button>
                        </div>
                    @else
                        <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                            <button type="submit"
                                class="cursor-pointer py-2.5 px-5 ms-3 text-sm font-medium {{ $isEditMode ? 'bg-yellow-500 hover:text-yellow-500 focus:ring-2 focus:ring-yellow-500 hover:ring-yellow-500' : 'bg-primary-500' }}   text-white focus:ring-2 focus:ring-primary-500  rounded-lg border border-gray-200 hover:text-gray-900 hover:bg-gray-100 ">
                                {{ $isEditMode ? 'Update' : 'Create' }}
                            </button>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>
