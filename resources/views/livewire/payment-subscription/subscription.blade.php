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
                                    class="ml-1 text-gray-700 hover:text-primary-600 md:ml-2 dark:text-gray-300 dark:hover:text-white">Subscriptions</a>
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
                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">All Subscription List
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
                    <button type="button" wire:click="reCheck"
                        class="cursor-pointer inline-flex items-center justify-center w-1/2 px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-orange-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 sm:w-auto dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-primary-800">
                        <svg class="w-5 h-5 mr-2 -ml-1 text-white" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100"
                            viewBox="0 0 30 30">
                            <path
                                d="M 15 3 C 12.031398 3 9.3028202 4.0834384 7.2070312 5.875 A 1.0001 1.0001 0 1 0 8.5058594 7.3945312 C 10.25407 5.9000929 12.516602 5 15 5 C 20.19656 5 24.450989 8.9379267 24.951172 14 L 22 14 L 26 20 L 30 14 L 26.949219 14 C 26.437925 7.8516588 21.277839 3 15 3 z M 4 10 L 0 16 L 3.0507812 16 C 3.562075 22.148341 8.7221607 27 15 27 C 17.968602 27 20.69718 25.916562 22.792969 24.125 A 1.0001 1.0001 0 1 0 21.494141 22.605469 C 19.74593 24.099907 17.483398 25 15 25 C 9.80344 25 5.5490109 21.062074 5.0488281 16 L 8 16 L 4 10 z">
                            </path>
                        </svg>
                        Re-check
                    </button>
                    <button type="button" wire:click="openCreateModal()"
                        class="cursor-pointer inline-flex items-center justify-center w-1/2 px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 sm:w-auto dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Create a new Subscription
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
                                    Subscription ID
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Plan Code
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Plan Name
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Duration
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Subscriber
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Subscription Status
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Start From
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Expiration Date
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                            @foreach ($subscriptions as $subscription)
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
                                        {{ sprintf('%03d', $subscription->id + 0) ?? '' }}
                                    </td>
                                    <td
                                        class="p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $subscription->subscription_plan_id ?? '' }}
                                    </td>
                                    <td
                                        class="max-w-sm p-4 overflow-hidden text-base font-normal text-gray-500 truncate xl:max-w-xs dark:text-gray-400">
                                        {{ $subscription->subscriptionPlan->plan_name ?? '' }}
                                    </td>
                                    <td
                                        class="p-4 text-base font-medium text-green-400 whitespace-nowrap dark:text-green">
                                        {{ $subscription->subscriptionPlan->plan_duration ?? '' }} Days
                                    </td>
                                    <td
                                        class="p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $subscription->user->name ?? '' }}
                                    </td>
                                    <td
                                        class="p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                        <div class="flex items-center">
                                            @if ($subscription->is_active == true)
                                                <div class="h-2.5 w-2.5 rounded-full bg-green-400 mr-2"></div>
                                                {{ $subscription->status ?? '' }}
                                            @endif
                                            @if ($subscription->is_active == false)
                                                <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2"></div>
                                                {{ $subscription->status ?? '' }}
                                            @endif
                                        </div>
                                    </td>
                                    <td
                                        class="max-w-sm p-4 overflow-hidden text-base font-normal text-gray-500 truncate xl:max-w-xs dark:text-gray-400">
                                        {{ $subscription->start_date ? $subscription->start_date->format('d M Y g:i A') : '' }}
                                    </td>
                                    <td
                                        class="max-w-sm p-4 overflow-hidden text-base font-normal text-gray-500 truncate xl:max-w-xs dark:text-gray-400">
                                        {{ $subscription->end_date ? $subscription->end_date->format('d M Y g:i A') : ' ' }}

                                    </td>

                                    <td class="p-4 space-x-2 whitespace-nowrap">
                                        {{-- View --}}
                                        <button type="button" wire:click="openEditModal({{ $subscription->id }})"
                                            class="cursor-pointer inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-amber-500 rounded-lg hover:bg-amber-600 focus:ring-4 focus:ring-amber-300 dark:focus:ring-amber-900">
                                            View
                                        </button>
                                        {{-- Revoke --}}
                                        <button type="button" wire:click="openRevokeModal({{ $subscription->id }})"
                                            class="cursor-pointer inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-500 rounded-lg hover:bg-red-600 focus:ring-4 focus:ring-red-300 dark:focus:ring-amber-900">
                                            Revoke
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

    {{-- MULTI-STEP MODAL --}}
    <div x-data="{ show: false, step: @entangle('step') }" x-show="show" x-on:show-modal.window="show = true"
        x-on:close-modal.window="show = false" x-on:keydown.escape.window="show = false" data-modal-backdrop="static"
        x-transition x-on:click.outside="show = false" wire:ignore.self
        class="fixed inset-0 flex items-center justify-center z-50 bg-black/50">
        <div
            class="relative w-[800px] h-[470px] bg-white dark:bg-gray-700 rounded-lg shadow-xl flex flex-col overflow-hidden">

            {{-- HEADER --}}
            <div class="flex items-center justify-between p-4 border-b border-gray-200 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Create New Subscription</h3>
                <button type="button" x-on:click="show = false"
                    class="cursor-pointer text-gray-400 hover:text-gray-900 bg-transparent hover:bg-gray-200 dark:hover:bg-gray-600 dark:hover:text-white rounded-lg text-sm w-8 h-8 flex justify-center items-center">
                    <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>

            {{-- BODY --}}
            <div class="p-4 md:p-5 relative">

                {{-- PROGRESS BAR --}}
                <div class="w-full h-2 bg-gray-200 rounded-full relative overflow-hidden">
                    <div class="absolute h-2 bg-blue-600 rounded-full transition-all duration-500 ease-in-out"
                        :style="{ width: step === 1 ? '33%' : step === 2 ? '66%' : '100%' }"></div>
                </div>

                {{-- Step indicators --}}
                <div class="flex justify-between text-xs text-gray-500 mt-3 pr-12 pl-12 pt-4 pb-6">
                    <template x-for="(label, index) in ['Step 1', 'Step 2', 'Step 3']" :key="index">
                        <div class="flex flex-col items-center">
                            <div class="p-6 w-6 h-6 flex items-center justify-center rounded-full border-2 text-2xl font-semibold"
                                :class="{
                                    'bg-blue-600 text-white border-blue-600': step > index,
                                    'bg-white text-gray-500 border-gray-300': step <= index
                                }">
                                <span x-text="index + 1"></span>
                            </div>
                            <span class="mt-1 text-white" x-text="label"></span>
                        </div>
                    </template>
                </div>

                {{-- FORM --}}
                <form class="h-[260px] relative" wire:submit.prevent="save">

                    {{-- STEP 1 --}}
                    <div x-show="step === 1" x-transition:enter="transition ease-out duration-300 transform"
                        x-transition:enter-start="opacity-0 translate-x-4"
                        x-transition:enter-end="opacity-100 translate-x-0"
                        x-transition:leave="transition ease-in duration-300 transform absolute inset-0"
                        x-transition:leave-start="opacity-100 translate-x-0"
                        x-transition:leave-end="opacity-0 -translate-x-4">
                        <div class="flex justify-center items-center mb-4">
                            <span class="text-2xl font-bold text-white text-center">Select Eligible users</span>
                        </div>
                        <div>
                            <label for="user"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">User List</label>
                            <select id="user" wire:model.lazy="user_id" wire:ignore
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg
               focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5
               dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                                <option value="">-- Select user --</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">
                                        {{ $user->name }} | {{ $user->email }} |
                                        {{ $user->role ? 'Employer' : 'Job Seeker' }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- STEP 2 --}}
                    <div x-show="step === 2" x-transition:enter="transition ease-out duration-300 transform"
                        x-transition:enter-start="opacity-0 translate-x-4"
                        x-transition:enter-end="opacity-100 translate-x-0"
                        x-transition:leave="transition ease-in duration-300 transform absolute inset-0"
                        x-transition:leave-start="opacity-100 translate-x-0"
                        x-transition:leave-end="opacity-0 -translate-x-4">
                        <div class="flex justify-center items-center mb-4">
                            <span class="text-2xl font-bold text-white text-center">Select Plan</span>
                        </div>
                        <div>
                            <label for="user"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Plan List</label>
                            <select id="user" wire:model.lazy="sub_plan_id" wire:ignore
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg
                                    focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5
                                    dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                                <option value="">-- Select plan --</option>
                                @foreach ($plans as $plan)
                                    <option value="{{ $plan->id }}">
                                        {{ $plan->plan_code }} | {{ $plan->plan_name }} | {{ $plan->plan_duration }}
                                        Days
                                        - {{ $plan->plan_price }} {{ $plan->stripePricing?->currency ?? 'USD' }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- STEP 3 --}}
                    <div x-show="step === 3" x-transition:enter="transition ease-out duration-300 transform"
                        x-transition:enter-start="opacity-0 translate-x-4"
                        x-transition:enter-end="opacity-100 translate-x-0"
                        x-transition:leave="transition ease-in duration-300 transform absolute inset-0"
                        x-transition:leave-start="opacity-100 translate-x-0"
                        x-transition:leave-end="opacity-0 -translate-x-4">
                        <div class="flex justify-center items-center mb-4">
                            <span class="text-2xl font-bold text-white text-center">Review Detail</span>
                        </div>
                        <div class="flex justify-center items-center">
                            <span class="text-white text-m text-center">
                                You are about to provide a <span
                                    class="text-green-400 font-bold">"{{ $bPlan?->plan_code }} |
                                    {{ $bPlan?->plan_name }} | {{ $bPlan?->plan_duration }}
                                    Days
                                    - {{ $bPlan?->plan_price }}
                                    {{ $bPlan?->stripePricing?->currency ?? 'USD' }}"</span>
                                subscription for the following
                                User:
                            </span>

                        </div>
                        <div class="relative overflow-x-auto">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            User ID
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Username
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Email
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Role
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $bUser?->id }}
                                        </th>
                                        <td
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $bUser?->name }}
                                        </td>
                                        <td
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $bUser?->email }}
                                        </td>
                                        <td
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $bUser?->role }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{-- FOOTER --}}
                    <div
                        class="absolute bottom-0 left-0 right-0 p-4 border-t border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 flex justify-between">

                        <button type="button" x-show="step > 1" x-on:click="step--"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300">
                            ← Back
                        </button>
                        <div class="ml-auto flex gap-2">
                            <button type="button" x-show="step < 3" x-on:click="step++"
                                class="px-4 py-2 text-sm font-medium text-white bg-amber-500 rounded-lg hover:bg-amber-600">
                                Next →
                            </button>
                            <button type="submit" x-show="step === 3" x-on:click="show = false"
                                class="px-4 py-2 text-sm font-medium text-white bg-amber-600 rounded-lg hover:bg-amber-700">
                                Finish
                            </button>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>

    {{-- VIEW SUBSCRIPTION DETAIL MODAL --}}
    <div x-data="{ show: false }" x-show="show" x-on:show-subscription-modal.window="show = true"
        x-on:close-modal.window="show = false" x-on:keydown.escape.window="show = false" x-transition
        x-on:click.outside="show = false" wire:ignore.self
        class="fixed inset-0 flex items-center justify-center z-50 bg-black/50">

        <!-- MODAL CONTAINER -->
        <div class="relative w-[700px] bg-white dark:bg-gray-700 rounded-lg shadow-xl overflow-hidden">

            {{-- HEADER --}}
            <div class="flex items-center justify-between p-4 border-b border-gray-200 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    {{ $isRevokeMode ? 'Revoke Subscription' : 'Subscription Details' }}
                </h3>
                <button type="button" x-on:click="show = false"
                    class="cursor-pointer text-gray-400 hover:text-gray-900 bg-transparent hover:bg-gray-200
                    dark:hover:bg-gray-600 dark:hover:text-white rounded-lg text-sm w-8 h-8 flex justify-center items-center">
                    <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>

            <form wire:submit="revokeSubcription">
                {{-- BODY --}}
                <div class="p-4 space-y-4">

                    @if (!$isRevokeMode)
                        <i class="text-gray-300">Subscription REF:
                            {{ $selectedSubscription?->stripe_subscription_id }}</i>
                    @else
                        <h4 class="text-lg font-semibold text-red-400 dark:text-red">
                            Please review the information below before revoke the subscription.
                        </h4>
                    @endif
                    {{-- SUBSCRIPTION SUMMARY --}}
                    <div class="flex flex-col gap-1 mb-2">
                        <h4 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Plan Information
                        </h4>
                        <p class="text-sm text-gray-500 dark:text-gray-300">
                            Details of the selected subscription plan.
                        </p>
                    </div>

                    <div class="border border-gray-200 dark:border-gray-600 rounded-lg overflow-hidden">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-600">
                                <tr>
                                    <th class="px-6 py-3 font-bold text-gray-900 dark:text-white w-1/3">Plan Code</th>
                                    <td class="px-6 py-3 text-gray-300">
                                        {{ $selectedSubscription?->subscriptionPlan?->plan_code ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th class="px-6 py-3 font-bold text-gray-900 dark:text-white">Plan Name</th>
                                    <td class="px-6 py-3 text-gray-300">
                                        {{ $selectedSubscription?->subscriptionPlan?->plan_name ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th class="px-6 py-3 font-bold text-gray-900 dark:text-white">Duration</th>
                                    <td class="px-6 py-3 text-gray-300">
                                        {{ $selectedSubscription?->subscriptionPlan?->plan_duration ?? 'N/A' }} days
                                    </td>
                                </tr>
                                <tr>
                                    <th class="px-6 py-3 font-bold text-gray-900 dark:text-white">Price</th>
                                    <td class="px-6 py-3 text-gray-300">
                                        {{ $selectedSubscription?->subscriptionPlan?->plan_price ?? 'N/A' }}
                                        {{ $selectedSubscription?->subscriptionPlan?->stripePricing?->currency ?? 'USD' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="px-6 py-3 font-bold text-gray-900 dark:text-white">Status</th>
                                    <td class="px-6 py-3">
                                        @if ($selectedSubscription?->is_active)
                                            <span class="text-green-500 font-semibold">Active</span>
                                        @else
                                            <span class="text-red-500 font-semibold">Expired</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th class="px-6 py-3 font-bold text-gray-900 dark:text-white">Start Date</th>
                                    <td class="px-6 py-3 text-gray-300">
                                        {{ $selectedSubscription?->start_date?->format('Y-m-d') ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th class="px-6 py-3 font-bold text-gray-900 dark:text-white">End Date</th>
                                    <td class="px-6 py-3 text-gray-300">
                                        {{ $selectedSubscription?->end_date?->format('Y-m-d') ?? 'N/A' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    {{-- USER DETAILS --}}
                    <div class="flex flex-col gap-1 mt-4 mb-4">
                        <h4 class="text-lg font-semibold text-gray-900 dark:text-white">User Information</h4>
                        <p class="text-sm text-gray-500 dark:text-gray-300">
                            The user who owns this subscription.
                        </p>
                    </div>

                    <div class="border border-gray-200 dark:border-gray-600 rounded-lg overflow-hidden">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-600">
                                <tr>
                                    <th class="px-6 py-3 font-bold text-gray-900 dark:text-white w-1/3">User ID</th>
                                    <td class="px-6 py-3 text-gray-300">
                                        {{ $selectedSubscription?->user?->id ?? 'N/A' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="px-6 py-3 font-bold text-gray-900 dark:text-white">Name</th>
                                    <td class="px-6 py-3 text-gray-300">
                                        {{ $selectedSubscription?->user?->name ?? 'N/A' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="px-6 py-3 font-bold text-gray-900 dark:text-white">Email</th>
                                    <td class="px-6 py-3 text-gray-300">
                                        {{ $selectedSubscription?->user?->email ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th class="px-6 py-3 font-bold text-gray-900 dark:text-white">Role</th>
                                    <td class="px-6 py-3 text-gray-300">
                                        {{ $selectedSubscription?->user?->role ? 'Employer' : 'Job Seeker' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    @if ($isRevokeMode)
                        <div class="flex flex-col gap-1 mt-8 mb-4">
                            <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Reason for Revoke</h4>
                            <input wire:model="revokeReason" id="revoke_reason" type="text" name="revoke_reason"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Please provide a reason" />
                            @error('revokeReason')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="default-checkbox" type="checkbox" value="" wire:model="revokeNow"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-checkbox"
                                class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Revoke this
                                subscription
                                immediately</label>
                        </div>
                    @endif
                </div>

                {{-- FOOTER --}}
                <div
                    class="p-4 border-t border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-800 flex justify-end">

                    @if ($isRevokeMode)
                        <button type="submit" x-on:click="show = false"
                            class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700">
                            Revoke This Subscription
                        </button>
                    @else
                        <button type="button" x-on:click="show = false"
                            class="px-4 py-2 text-sm font-medium text-white bg-primary-600 rounded-lg hover:bg-primary-700">
                            Close
                        </button>
                    @endif
                </div>
            </form>
        </div>
    </div>



</div>
<script>
    document.addEventListener('livewire:load', function() {
        $('#user').select2({
            placeholder: "Select user...",
            width: '100%',
            allowClear: true
        });

        $('#user').on('change', function(e) {
            @this.set('user', $(this).val());
        });
    });
</script>
