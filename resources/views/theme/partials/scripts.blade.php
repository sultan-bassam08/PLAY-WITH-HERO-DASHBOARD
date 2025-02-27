<script src="{{ asset ('https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>
<script src="{{ asset ('js/scripts.js') }}"></script>
<script src="{{ asset ('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js')}}" crossorigin="anonymous"></script>
<script src="{{ asset('demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('assets/demo/chart-bar-demo.js') }}"></script>
<script src="{{ asset('https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js') }}" crossorigin="anonymous"></script>
<script src="{{ asset('js/datatables-simple-demo.js') }}"></script>
<script src="{{ asset('assets/demo/chart-pie-demo.js') }}"></script>
<script src="{{ asset('https://cdn.jsdelivr.net/npm/chart.js') }}"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Fetch data from backend
        fetch("path_to_your_php_file.php")
            .then((response) => response.json())
            .then((data) => {
                // Create Charts
                createAreaChart(data.matches);
                createBarChart(data.users);
            })
            .catch((error) => console.error("Error fetching data:", error));
    });

    function createAreaChart(totalMatches) {
        const ctx = document.getElementById("myAreaChart").getContext("2d");
        new Chart(ctx, {
            type: "line",
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"], // Months
                datasets: [
                    {
                        label: "Total Matches",
                        data: Array(12).fill(totalMatches / 12), // Simulate monthly distribution
                        backgroundColor: "rgba(0, 123, 255, 0.2)",
                        borderColor: "rgba(0, 123, 255, 1)",
                        borderWidth: 2,
                    },
                ],
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
            },
        });
    }

    function createBarChart(totalUsers) {
        const ctx = document.getElementById("myBarChart").getContext("2d");
        new Chart(ctx, {
            type: "bar",
            data: {
                labels: ["Active Users"], // Single category
                datasets: [
                    {
                        label: "Number of Users",
                        data: [totalUsers],
                        backgroundColor: "rgba(40, 167, 69, 0.8)", // Green
                        borderColor: "rgba(40, 167, 69, 1)",
                        borderWidth: 1,
                    },
                ],
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
            },
        });
    }
</script>
<script>
    // Function to format the date as YYYY-MM-DD
    function formatDate(date) {
        const d = new Date(date);
        let month = '' + (d.getMonth() + 1); // Months are zero-based
        let day = '' + d.getDate();
        const year = d.getFullYear();

        if (month.length < 2) month = '0' + month;
        if (day.length < 2) day = '0' + day;

        return [year, month, day].join('-');
    }

    // Set up the date picker
    const datePicker = document.getElementById('datePicker');
    const today = new Date(); // Today's date
    const lastDay = new Date(); // Set your "last day" here
    lastDay.setDate(lastDay.getDate() + 30); // Example: 7 days from today

    datePicker.min = formatDate(today); // Disable dates before today
    datePicker.max = formatDate(lastDay); // Disable dates after the last day
</script>

