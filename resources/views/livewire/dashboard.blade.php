<div>
    <div class="p-6 space-y-8">
        <h2 class="text-2xl font-bold text-gray-700 dark:text-gray-200 mb-4">Dashboard Overview</h2>

        <!-- === USER STATS === -->
        <div>
            <h3 class="text-lg font-semibold text-gray-600 dark:text-gray-300 mb-2">User Summary</h3>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
                <x-summary-card title="Active Users" :value="$activeUsers" color="green" />
                <x-summary-card title="Inactive Users" :value="$inactiveUsers" color="red" />
                <x-summary-card title="Verified Users" :value="$verifiedUsers" color="blue" />
                <x-summary-card title="Unverified Users" :value="$unverifiedUsers" color="gray" />
                <x-summary-card title="Job Seekers" :value="$jobSeekers" color="indigo" />
                <x-summary-card title="Employers" :value="$employers" color="yellow" />
                <x-summary-card title="New Users (30d)" :value="$recentRegistered" color="yellow" />
                <x-summary-card title="Total Roles" :value="$totalRoles" color="gray" />
            </div>
        </div>

        <!-- === JOB STATS === -->
        <div>
            <h3 class="text-lg font-semibold text-gray-600 dark:text-gray-300 mb-2 mt-8">Job Summary</h3>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
                <x-summary-card title="Active Jobs" :value="$activeJobs" color="green" />
                <x-summary-card title="Expired Jobs" :value="$expiredJobs" color="red" />
                <x-summary-card title="Pending Apps" :value="$pendingApps" color="yellow" />
                <x-summary-card title="Accepted Apps" :value="$acceptedApps" color="blue" />
                <x-summary-card title="Rejected Apps" :value="$rejectedApps" color="gray" />
                <x-summary-card title="Industries" :value="$totalIndustries" color="purple" />
            </div>
        </div>

        <!-- === CHARTS Last 6 Weeks === -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mt-8">
            <div class="bg-white rounded-lg shadow-md p-4 dark:bg-gray-800">
                <h3 class="font-semibold mb-2 text-gray-700 dark:text-gray-200">Job Posting Trends (Last 6 Weeks)</h3>
                <canvas id="postingChart"></canvas>
            </div>

            <div class="bg-white rounded-lg shadow-md p-4 dark:bg-gray-800">
                <h3 class="font-semibold mb-2 text-gray-700 dark:text-gray-200">Application Trends (Last 6 Weeks)</h3>
                <canvas id="applicationChart"></canvas>
            </div>
        </div>


        <!-- === Trends Charts 7Day === -->
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

        @push('scripts')
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                // <!-- === CHARTS Last 6 Weeks === -->
                const postingCtx = document.getElementById('postingChart');
                new Chart(postingCtx, {
                    type: 'line',
                    data: {
                        labels: {!! json_encode($postingTrends->pluck('week')) !!},
                        datasets: [{
                            label: 'Job Posts',
                            data: {!! json_encode($postingTrends->pluck('total')) !!},
                            borderColor: '#22c55e',
                            backgroundColor: '#22c55e33',
                            fill: true,
                            tension: 0.3
                        }]
                    }
                });

                const appCtx = document.getElementById('applicationChart');
                new Chart(appCtx, {
                    type: 'line',
                    data: {
                        labels: {!! json_encode($applicationTrends->pluck('week')) !!},
                        datasets: [{
                            label: 'Applications',
                            data: {!! json_encode($applicationTrends->pluck('total')) !!},
                            borderColor: '#3b82f6',
                            backgroundColor: '#3b82f633',
                            fill: true,
                            tension: 0.3
                        }]
                    }
                });
                // <!-- === Trends Charts 7Day === -->
                const jobData = @json(array_values($jobTrends7));
                const jobLabels = @json(array_keys($jobTrends7));

                const appData = @json(array_values($applicationTrends7));
                const appLabels = @json(array_keys($applicationTrends7));

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
        @endpush
    </div>


</div>
