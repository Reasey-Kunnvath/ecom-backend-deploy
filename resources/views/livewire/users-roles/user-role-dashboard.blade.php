<div>
    <div class="p-6 bg-gray-50 min-h-screen dark:bg-gray-800">
        <h2 class="text-2xl font-bold text-gray-700 dark:text-white mb-6">User & Role Dashboard</h2>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-8">
            @foreach ([['title' => 'Active Users', 'value' => $activeUsers, 'color' => 'green'], ['title' => 'Inactive Users', 'value' => $inactiveUsers, 'color' => 'red'], ['title' => 'Verified Users', 'value' => $verifiedUsers, 'color' => 'blue'], ['title' => 'Unverified Users', 'value' => $unverifiedUsers, 'color' => 'yellow'], ['title' => 'Job Seekers', 'value' => $jobSeekers, 'color' => 'orange'], ['title' => 'Employers', 'value' => $employers, 'color' => 'purple'], ['title' => 'New Users (30 days)', 'value' => $registeredLast30Days, 'color' => 'orange'], ['title' => 'Total Roles', 'value' => $rolesCount, 'color' => 'indigo']] as $item)
                <div class="bg-white shadow rounded-lg p-4 border border-gray-200 dark:bg-gray-700 dark:border-gray-600">
                    <div class="flex justify-between items-center">
                        <h3 class="text-gray-600 font-semibold dark:text-white">{{ $item['title'] }}</h3>
                        <span class="px-3 py-1 rounded-full text-white text-sm bg-{{ $item['color'] }}-500">
                            {{ $item['value'] }}
                        </span>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Charts -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Active vs Inactive -->
            <div class="bg-white rounded-lg shadow p-4 dark:bg-gray-800">
                <h4 class="text-lg font-semibold text-gray-700 mb-3 dark:text-white">Active vs Inactive</h4>
                <canvas id="activeChart" class="h-64 w-full"></canvas>
            </div>

            <!-- Verified vs Unverified -->
            <div class="bg-white rounded-lg shadow p-4 dark:bg-gray-800">
                <h4 class="text-lg font-semibold text-gray-700 mb-3 dark:text-white">Verified vs Unverified</h4>
                <canvas id="verifiedChart" class="h-64 w-full"></canvas>
            </div>
        </div>

        @push('scripts')
            <script>
                function renderCharts() {
                    const activeCtx = document.getElementById('activeChart');
                    const verifiedCtx = document.getElementById('verifiedChart');
                    if (!activeCtx || !verifiedCtx) return;

                    new Chart(activeCtx, {
                        type: 'doughnut',
                        data: {
                            labels: ['Active', 'Inactive'],
                            datasets: [{
                                data: [{{ $activeUsers }}, {{ $inactiveUsers }}],
                                backgroundColor: ['#22c55e', '#ef4444']
                            }]
                        },
                        // options: {
                        //     plugins: {
                        //         legend: {
                        //             labels: {
                        //                 color: '#22c55e', // all labels (gray-700)
                        //                 font: {
                        //                     size: 14
                        //                 }
                        //             }
                        //         }
                        //     }
                        // }
                    });

                    new Chart(verifiedCtx, {
                        type: 'pie',
                        data: {
                            labels: ['Verified', 'Unverified'],
                            datasets: [{
                                data: [{{ $verifiedUsers }}, {{ $unverifiedUsers }}],
                                backgroundColor: ['#3b82f6', '#facc15']
                            }]
                        }
                    });
                }
                document.addEventListener('DOMContentLoaded', renderCharts);
                document.addEventListener('livewire:navigated', renderCharts);
            </script>
        @endpush

    </div>

</div>
