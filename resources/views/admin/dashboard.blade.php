@extends('admin.layout')

@section('content')
<div class="header">
    <h1>Dashboard Overview</h1>
</div>

<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 25px; margin-bottom: 25px;">
    <div class="card" style="margin-bottom: 0; display: flex; flex-direction: column; align-items: center; justify-content: center;">
        <h3 style="margin-top: 0; align-self: flex-start; color: var(--admin-text-dark);">Total Models Statistics</h3>
        <div style="width: 100%; max-width: 350px;">
            <canvas id="doughnutChart"></canvas>
        </div>
    </div>
    
    <div class="card" style="margin-bottom: 0;">
        <h3 style="margin-top: 0; color: var(--admin-text-dark);">System Records Overview</h3>
        <div style="width: 100%;">
            <canvas id="barChart"></canvas>
        </div>
    </div>
</div>

<div class="card">
    <h3 style="margin-top: 0; color: var(--admin-text-dark);">Recent Contact Messages</h3>
    @if(isset($recentMessages) && $recentMessages->count())
        <table>
            <tr><th>Name</th><th>Email</th><th>Message</th><th>Date</th></tr>
            @foreach($recentMessages as $msg)
            <tr>
                <td>{{ $msg->first_name }} {{ $msg->last_name }}</td>
                <td>{{ $msg->email }}</td>
                <td>{{ Str::limit($msg->message, 50) }}</td>
                <td>{{ $msg->created_at->format('Y-m-d') }}</td>
            </tr>
            @endforeach
        </table>
    @else
        <p style="color: var(--admin-text-muted);">No recent messages.</p>
    @endif
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const statsData = @json($stats);
        
        const labels = Object.keys(statsData);
        const dataValues = Object.values(statsData);
        
        // Define some nice colors for the charts matching the dashboard theme
        const backgroundColors = [
            'rgba(61, 129, 195, 0.7)',  // Primary
            'rgba(43, 178, 149, 0.7)',  // Secondary
            'rgba(241, 65, 108, 0.7)',  // Danger
            'rgba(80, 205, 137, 0.7)',  // Success
            'rgba(255, 199, 0, 0.7)',   // Warning
            'rgba(114, 57, 234, 0.7)',  // Purple
            'rgba(0, 163, 255, 0.7)',   // Info
            'rgba(255, 138, 101, 0.7)', // Orange
            'rgba(77, 182, 172, 0.7)',  // Teal
            'rgba(149, 117, 205, 0.7)', // Deep Purple
            'rgba(121, 134, 203, 0.7)'  // Indigo
        ];

        const borderColors = backgroundColors.map(color => color.replace('0.7', '1'));

        // Bar Chart
        const ctxBar = document.getElementById('barChart').getContext('2d');
        new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Total Records',
                    data: dataValues,
                    backgroundColor: backgroundColors,
                    borderColor: borderColors,
                    borderWidth: 1,
                    borderRadius: 4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                }
            }
        });

        // Doughnut Chart
        const ctxDoughnut = document.getElementById('doughnutChart').getContext('2d');
        new Chart(ctxDoughnut, {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    data: dataValues,
                    backgroundColor: backgroundColors,
                    borderColor: '#ffffff',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'right',
                        labels: {
                            boxWidth: 12,
                            font: {
                                family: 'Inter',
                                size: 11
                            }
                        }
                    }
                }
            }
        });
    });
</script>
@endsection