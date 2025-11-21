<div>
    <div class="p-6 space-y-6">
        <h2 class="text-2xl font-bold text-gray-700 dark:text-white">Job & Application Dashboard</h2>

        {{-- Summary Cards --}}
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
            <div class="p-4 bg-white rounded-2xl shadow dark:bg-gray-800">
                <h3 class="text-sm text-gray-500 ">Active Jobs</h3>
                <p class="text-2xl text-gray-500 font-semibold dark:text-white">{{ $totalActiveJobs }}</p>
            </div>

            <div class="p-4 bg-white rounded-2xl shadow dark:bg-gray-800">
                <h3 class="text-sm text-gray-500">Expired Jobs</h3>
                <p class="text-2xl text-gray-500 font-semibold dark:text-white">{{ $totalExpiredJobs }}</p>
            </div>

            <div class="p-4 bg-white rounded-2xl shadow dark:bg-gray-800">
                <h3 class="text-sm text-gray-500">Pending Applications</h3>
                <p class="text-2xl text-gray-500 font-semibold dark:text-white">{{ $pendingApplications }}</p>
            </div>

            <div class="p-4 bg-white rounded-2xl shadow dark:bg-gray-800">
                <h3 class="text-sm text-gray-500">Accepted</h3>
                <p class="text-2xl font-semibold text-green-600">{{ $acceptedApplications }}</p>
            </div>

            <div class="p-4 bg-white rounded-2xl shadow dark:bg-gray-800">
                <h3 class="text-sm text-gray-500">Rejected</h3>
                <p class="text-2xl font-semibold text-red-500">{{ $rejectedApplications }}</p>
            </div>

            <div class="p-4 bg-white rounded-2xl shadow dark:bg-gray-800">
                <h3 class="text-sm text-gray-500">Total Industries</h3>
                <p class="text-2xl text-gray-500 font-semibold dark:text-white">{{ $totalIndustries }}</p>
            </div>
        </div>

        {{-- Trends Charts --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="p-4 bg-white rounded-2xl shadow dark:bg-gray-800">
                <h3 class="text-lg font-semibold text-gray-700 dark:text-white mb-2">Job Posts per Week</h3>
                <canvas id="jobTrendChart" height="100"></canvas>
            </div>

            <div class="p-4 bg-white rounded-2xl shadow dark:bg-gray-800">
                <h3 class="text-lg font-semibold text-gray-700 dark:text-white mb-2">Applications per Week</h3>
                <canvas id="appTrendChart" height="100"></canvas>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const jobData = @json(array_values($jobTrends));
            const jobLabels = @json(array_keys($jobTrends));

            const appData = @json(array_values($applicationTrends));
            const appLabels = @json(array_keys($applicationTrends));

            new Chart(document.getElementById('jobTrendChart'), {
                type: 'line',
                data: {
                    labels: jobLabels,
                    datasets: [{
                        label: 'Job Posts',
                        data: jobData,
                        fill: true,
                        borderColor: '#3b82f6',
                        tension: 0.3
                    }]
                }
            });

            new Chart(document.getElementById('appTrendChart'), {
                type: 'line',
                data: {
                    labels: appLabels,
                    datasets: [{
                        label: 'Applications',
                        data: appData,
                        fill: true,
                        borderColor: '#22c55e',
                        tension: 0.3
                    }]
                }
            });
        </script>
    </div>

</div>
