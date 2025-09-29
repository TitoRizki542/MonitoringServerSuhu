<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> ⚙️ Monitoring ⚙️</title>
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>

<body>
    <header class="dashboard-header">
        <h1>⚡Dashboard Monitoring Server⚡</h1>
        {{-- <p>😜👆Copyright By Eos 2025 😜👆</p> --}}
    </header>

    <main class="dashboard-container">
        <section class="server-room-card room-1">
            <div class="card-header">
                <h2><i class="fas fa-server"></i> Ruangan Server</h2>
                <span class="status-indicator online">Active</span>
            </div>

            <div class="data-grid">
                <div class="data-item temperature">
                    <i class="fas fa-thermometer-half"></i>
                    <div class="value-wrapper">
                        <span class="label" style="color: #007bff">Suhu</span>
                        <span class="value" id="temp-a" style="color: #007bff">{{ $sensor1['suhu'] }}°C</span>
                    </div>
                </div>
                <div class="data-item humidity">
                    <i class="fas fa-water" style="color: #007bff"></i>
                    <div class="value-wrapper">
                        <span class="label" style="color: #007bff">Kelembapan</span>
                        <span class="value" id="humid-a" style="color: #007bff">{{ $sensor1['kelembapan'] }}%</span>
                    </div>
                </div>
            </div>
            <div class="last-update">Diperbarui: <span id="update-a">10:00:30 WIB</span></div>
        </section>
        <section class="server-room-card room-1">
            <div class="card-header">
                <h2><i class="fas fa-server"></i> Ruangan Server</h2>
                <span class="status-indicator online">Active</span>
            </div>

            <div class="data-grid">
                <div class="data-item temperature">
                    <i class="fas fa-thermometer-half"></i>
                    <div class="value-wrapper">
                        <span class="label" style="color: #007bff">Suhu</span>
                        <span class="value" id="temp-a" style="color: #007bff">{{ $sensor1['suhu'] }}°C</span>
                    </div>
                </div>
                <div class="data-item humidity">
                    <i class="fas fa-water" style="color: #007bff"></i>
                    <div class="value-wrapper">
                        <span class="label" style="color: #007bff">Kelembapan</span>
                        <span class="value" id="humid-a" style="color: #007bff">{{ $sensor1['kelembapan'] }}%</span>
                    </div>
                </div>
            </div>
            <div class="last-update">Diperbarui: <span id="update-a">10:00:30 WIB</span></div>
        </section>

        <section class="server-room-card room-2">
            <div class="card-header">
                <h2 style="color: #ffc107"><i class="fas fa-server" style="color: #ffc107"></i> Ruangan PABX</h2>
                <span class="status-indicator online">Active</span>
            </div>
            <div class="data-grid">
                <div class="data-item temperature">
                    <i class="fas fa-thermometer-half" style="color: #ffc107"></i>
                    <div class="value-wrapper">
                        <span class="label" style="color: #ffc107">Suhu</span>
                        <span class="value" id="temp-b" style="color: #ffc107">{{ $sensor2['suhu'] }}°C</span>
                    </div>
                </div>
                <div class="data-item humidity">
                    <i class="fas fa-water" style="color: #ffc107"></i>
                    <div class="value-wrapper">
                        <span class="label" style="color: #ffc107">Kelembapan</span>
                        <span class="value" id="humid-b" style="color: #ffc107">{{ $sensor2['kelembapan'] }}%</span>
                    </div>
                </div>
            </div>
            <div class="last-update">Diperbarui: <span id="update-b">10:00:30 WIB</span></div>
        </section>
    </main>



    <script>
        // Fungsi untuk memperbarui waktu setiap detik
        function updateTime() {
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            const currentTime = `${hours}:${minutes}:${seconds} WIB`;

            document.getElementById('update-a').textContent = currentTime;
            document.getElementById('update-b').textContent = currentTime;
        }

        // Perbarui waktu setiap detik
        setInterval(updateTime, 1000);
        // Panggil sekali untuk inisialisasi
        updateTime();
    </script>
</body>

</html>
