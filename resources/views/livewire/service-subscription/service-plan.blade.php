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
                                    class="ml-1 text-gray-700 hover:text-primary-600 md:ml-2 dark:text-gray-300 dark:hover:text-white">Plan
                                    and Services</a>
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
                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">All Plans and Services
                </h1>
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
                    <button type="button" wire:click="openCreateModal()"
                        class="cursor-pointer inline-flex items-center justify-center w-1/2 px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 sm:w-auto dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Create a new Plan
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
                                    Plan ID
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Plan Code
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    plan Name
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    plan Price
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    plan Durations (Days)
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Plan Status
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Created At
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Updated At
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                            @foreach ($services as $service)
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
                                        {{ sprintf('%03d', $service->id + 0) ?? '' }}
                                    </td>
                                    <td
                                        class="p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $service->plan_code ?? '' }}
                                    </td>
                                    <td
                                        class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $service->plan_name ?? '' }}
                                    </td>
                                    <td
                                        class="p-4 text-base font-medium text-green-400 whitespace-nowrap dark:text-green">
                                        {{ ($service->plan_price ?? '') . ' USD Per Month' }}
                                    </td>
                                    <td
                                        class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ ($service->plan_duration ?? '') . ' Day(s)' }}
                                    </td>
                                    <td
                                        class="p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                        <div class="flex items-center">
                                            @if ($service->is_active == true)
                                                <div class="h-2.5 w-2.5 rounded-full bg-green-400 mr-2"></div>
                                                Active
                                            @endif
                                            @if ($service->is_active == false)
                                                <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2"></div>
                                                Inactive
                                            @endif
                                        </div>
                                    </td>


                                    <td
                                        class="max-w-sm p-4 overflow-hidden text-base font-normal text-gray-500 truncate xl:max-w-xs dark:text-gray-400">
                                        {{ $service->created_at ? $service->created_at->format('d M Y g:i A') : '' }}
                                    </td>
                                    <td
                                        class="max-w-sm p-4 overflow-hidden text-base font-normal text-gray-500 truncate xl:max-w-xs dark:text-gray-400">
                                        {{ $service->updated_at ? $service->updated_at->format('d M Y g:i A') : ' ' }}

                                    </td>

                                    <td class="p-4 space-x-2 whitespace-nowrap">
                                        {{-- Edit --}}
                                        <button type="button" wire:click="openEditModal({{ $service->id }})"
                                            class="cursor-pointer inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-amber-500 rounded-lg hover:bg-amber-600 focus:ring-4 focus:ring-amber-300 dark:focus:ring-amber-900">
                                            View and Edit
                                        </button>
                                        {{-- Delete --}}
                                        <button type="button" wire:click="openDeleteModal({{ $service->id }})"
                                            class="cursor-pointerinline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
                                            Delete
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

    {{-- MODAL --}}
    <div x-data="{ show: false }" x-show="show" x-on:show-modal.window="show = true"
        x-on:close-modal.window="show = false" data-modal-backdrop="static" x-on:keydown.escape.window="show = false"
        x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
        x-on:click.outside="show = false" wire:ignore.self
        class="fixed inset-0 flex items-center justify-center z-50 bg-black/50 overflow-x-hidden overflow-y-auto top-4 md:inset-0 h-modal sm:h-full">
        <div class="relative p-4 w-full max-w-6xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-xl dark:bg-gray-700">
                <!-- Modal header -->
                <div
                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        {{ $isEditMode ? 'Update Plan and Service' : 'Create New Plan and Service' }}
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
                <form class="p-4 md:p-5" wire:submit="save">
                    <div class="grid gap-4 mb-4 grid-cols-3">
                        <div class="mb-4">
                            <label for="plan_code"
                                class="block mb-4 text-sm font-medium text-gray-900 dark:text-white">Plan
                                Code</label>
                            <div class="col-span-6 sm:col-span-2">
                                <input id="plan_code" type="text" name="plan_code" wire:model="plan_code"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Plan Code" />
                            </div>
                            @error('plan_code')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="plan_name"
                                class="block mb-4 text-sm font-medium text-gray-900 dark:text-white">Plan
                                Name</label>
                            <div class="col-span-6 sm:col-span-2">
                                <input id="plan_name" type="text" name="plan_name" wire:model="plan_name"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Plan Name" />
                            </div>
                            @error('plan_name')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="plan_duration"
                                class="block mb-4 text-sm font-medium text-gray-900 dark:text-white">Plan
                                Duration</label>
                            <div class="col-span-6 sm:col-span-2">
                                <input id="plan_duration" type="number" name="plan_duration"
                                    wire:model="plan_duration"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="eg. 30 Days" />
                            </div>
                            @error('plan_duration')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="max_post"
                                class="block mb-4 text-sm font-medium text-gray-900 dark:text-white">Max Post</label>
                            <div class="col-span-6 sm:col-span-2">
                                <input id="max_post" type="number" name="max_post" wire:model="max_post"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="eg. 10" />
                            </div>
                            @error('max_post')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="stripe_price_id"
                                class="block mb-4 text-sm font-medium text-gray-900 dark:text-white">Pricing
                                Option</label>
                            <select id="stripe_price_id" name="stripe_price_id" wire:model="product_id"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value="" selected>-- Select Pricing Option --</option>
                                @foreach ($pricings as $pricing)
                                    <option value="{{ $pricing->product_id }}"
                                        {{ $product_id == $pricing->product_id ? 'selected' : '' }}>
                                        {{ $pricing->product_name }} - ({{ $pricing->amount }}
                                        {{ $pricing->currency }})</option>
                                @endforeach
                            </select>
                            @error('stripe_price_id')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
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
                        <div class="col-span-6 sm:col-span-3">
                            <label for="skill_desc"
                                class="block mb-4 text-sm font-medium text-gray-900 dark:text-white">Plan
                                Description</label>
                            <textarea id="plan_description" name="plan_description" wire:model="plan_description"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Plan Description" rows="4"></textarea>
                        </div>
                        <hr class="w-full my-6 bg-gray-200 border-0 dark:bg-gray-200">
                        <div class="inline-flex items-center justify-center w-full">
                            <span
                                class="absolute px-2 font-medium text-gray-900 -translate-x-1/2 bg-white left-1/2 dark:text-white dark:bg-gray-700">Features</span>
                        </div>
                        @foreach ($plan_features as $index => $feature)
                            <div class="col-span-6 sm:col-span-3 flex items-center gap-2">
                                <!-- Feature Label -->
                                <span class="w-20 text-sm font-medium text-gray-900 dark:text-white">
                                    Feature {{ $index + 1 }}
                                </span>

                                <!-- Feature Input -->
                                <input id="plan_feature_{{ $index }}" type="text"
                                    wire:model="plan_features.{{ $index }}"
                                    class="flex-1 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Feature description" />

                                <!-- Remove Button -->
                                @if ($index > 0)
                                    <button type="button" wire:click="removeFeature({{ $index }})"
                                        class="text-red-600 hover:text-red-800 bg-red-100 hover:bg-red-200 rounded px-2 py-1 text-sm">
                                        &times;
                                    </button>
                                @endif
                            </div>

                            @error('plan_features.' . $index)
                                <p class="mt-1 text-sm text-red-600 dark:text-red-500 col-span-6 sm:col-span-2">
                                    {{ $message }}</p>
                            @enderror
                        @endforeach

                        <!-- Add Feature Button -->
                        <div class="col-span-6 sm:col-span-2 mt-2">
                            <button type="button" wire:click="addFeature"
                                class="text-amber-600 hover:text-amber-800 text-sm font-medium">
                                + Add Feature
                            </button>
                        </div>

                    </div>
                    <div class="mt-6">
                        <button type="submit"
                            class="cursor-pointer inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg {{ $isEditMode ? ' bg-amber-500  hover:bg-amber-600 focus:ring-4 focus:ring-amber-300' : 'bg-primary-600 over:bg-primary-800 focus:ring-4 focus:ring-primary-300 sm:w-auto dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800' }} dark:focus:ring-amber-900">
                            {{ $isEditMode ? 'Update plan' : 'Create plan' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- DELETE MODAL --}}
    <div x-data="{ deleteOpen: false }" x-show="deleteOpen" x-cloak @open-delete-modal.window="deleteOpen = true"
        @close-delete-modal.window="deleteOpen = false" @keydown.escape.window="deleteOpen = false"
        class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4"
        x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

        <div class="w-full max-w-md rounded-lg bg-white p-6 shadow-xl dark:bg-gray-800"
            @click.outside="deleteOpen = false">

            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Delete Plan
                </h3>
                <button class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300"
                    @click="deleteOpen = false">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="mt-4">
                <p class="text-sm text-gray-600 dark:text-gray-300">
                    Are you sure you want to delete the plan
                    <span class="font-medium text-gray-900 dark:text-white">
                        "{{ $plan_name }}"
                    </span>?
                </p>
                <p class="mt-2 text-xs text-red-600 dark:text-red-400">
                    This action cannot be undone.
                </p>
            </div>

            <div class="mt-6 flex justify-end gap-3">
                <button
                    class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 dark:hover:bg-gray-600"
                    @click="deleteOpen = false">
                    Cancel
                </button>

                <button wire:click="delete" wire:loading.attr="disabled" wire:target="delete"
                    class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-md hover:bg-red-700 disabled:opacity-50 flex items-center gap-2"
                    @click="deleteOpen = false">
                    <span wire:loading.remove wire:target="delete">Delete</span>
                    <span wire:loading wire:target="delete">
                        <svg class="h-4 w-4 animate-spin" viewBox="0 0 100 101" fill="none">
                            <path d="M100 50.5908C100 78.2051..." fill="white"></path>
                        </svg>
                        Deleting...
                    </span>
                </button>
            </div>
        </div>
    </div>

</div>
