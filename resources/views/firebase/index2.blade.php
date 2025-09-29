<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> ⚙️ Monitoring ⚙️</title>
    {{-- Memuat CSS eksternal --}}
    <link rel="stylesheet" href="{{ URL::asset('css/style2.css') }}">
    {{-- Memuat Font Awesome untuk ikon --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    {{-- Memuat Chart.js untuk grafik --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>

</head>

<body>
    <header class="dashboard-header">
        <h1>⚡Dashboard Monitoring Server⚡</h1>
        {{-- <p>😜👆Copyright By Eos 2025 😜👆</p> --}}
    </header>

    <main class="dashboard-container">
        {{-- KARTU 1: RUANGAN SERVER (Menggunakan style default dan room-1) --}}
        <section class="server-room-card room-1">
            <div class="card-header">
                {{-- Warna ikon dan judul akan diambil dari style.css (.room-1 .card-header h2/fas) --}}
                <h2><i class="fas fa-server"></i> Server Novotel</h2>
                <span class="status-indicator online">Active</span>
            </div>

            <div class="data-grid">
                <div class="data-item temperature">
                    <i class="fas fa-thermometer-half"></i>
                    <div class="value-wrapper">
                        {{-- Warna label dan value diambil dari style.css --}}
                        <span class="label" style="color: #007bff;">Suhu</span>
                        <span class="value" id="temp-a">{{ $dataServerNovo['suhu'] ?? 'N/A' }}°C</span>
                    </div>
                </div>
                <div class="data-item humidity">
                    <i class="fas fa-water" style="color : #007bff"></i>
                    <div class="value-wrapper">
                        <span class="label" style="color : #007bff">Kelembapan</span>
                        <span class="value" id="humid-a">{{ $dataServerNovo['kelembapan'] ?? 'N/A' }}%</span>
                    </div>
                </div>
            </div>
            <div class="last-update">Diperbarui: <span id="update-a">{{ $now }} WIB</span></div>
        </section>

        {{-- KARTU 2: RUANGAN PABX (Menggunakan style room-2) --}}
        <section class="server-room-card room-2">
            <div class="card-header">
                {{-- Warna ikon dan judul akan diambil dari style.css (.room-2 .card-header h2/fas) --}}
                <h2><i class="fas fa-server"></i> PABX Novotel</h2>
                <span class="status-indicator online">Active</span> {{-- Ganti status menjadi warning --}}
            </div>

            <div class="data-grid">
                <div class="data-item temperature">
                    <i class="fas fa-thermometer-half" style="color: #ffc107"></i>
                    <div class="value-wrapper">
                        <span class="label" style="color: #ffc107">Suhu</span>
                        <span class="value" id="temp-b">{{ $dataPabxNovo['suhu'] ?? 'N/A' }}°C</span>
                    </div>
                </div>
                <div class="data-item humidity">
                    <i class="fas fa-water" style="color: #ffc107"></i>
                    <div class="value-wrapper">
                        <span class="label" style="color: #ffc107">Kelembaban</span>
                        <span class="value" id="humid-b">{{ $dataPabxNovo['kelembapan'] ?? 'N/A' }}%</span>
                    </div>
                </div>
            </div>
            <div class="last-update">Diperbarui: <span id="update-b">{{ $now }} WIB</span></div>
        </section>

        {{-- KARTU 3: RUANGAN GENSET (Menggunakan style room-3) --}}
        <section class="server-room-card room-3">
            <div class="card-header">
                {{-- Warna ikon dan judul akan diambil dari style.css (.room-3 .card-header h2/fas) --}}
                <h2><i class="fas fa-server"></i> Server Royal</h2>
                <span class="status-indicator online">Active</span>
            </div>

            <div class="data-grid">
                <div class="data-item temperature">
                    <i class="fas fa-thermometer-half"></i>
                    <div class="value-wrapper">
                        <span class="label" style="color : #dc3545">Suhu</span>
                        <span class="value" id="temp-c">{{ $dataServerRoyal['suhu'] ?? 'N/A' }}°C</span>
                    </div>
                </div>
                <div class="data-item humidity"> {{-- Mengganti ikon dan label untuk Genset --}}
                    <i class="fas fa-water" style="color: #dc3545"></i>
                    <div class="value-wrapper">
                        <span class="label" style="color : #dc3545">Kelembaban</span>
                        <span class="value" id="rpm-c">{{ $dataServerRoyal['kelembapan'] ?? 'N/A' }}%</span>
                    </div>
                </div>
            </div>
            <div class="last-update">Diperbarui: <span id="update-c">{{ $now }}</span></div>


        </section>
        <div class="chart-card-wrapper">
            <div class="chart-container">
                {!! $chartServerNovo->container() !!}
            </div>
            <div class="chart-container">
                {!! $chartPabxNovo->container() !!}
            </div>
            <div class="chart-container">
                {!! $chartServerRoyal->container() !!}
            </div>
        </div>
    </main>
</body>

<script src="{{ LarapexChart::cdn() }}"></script>
{{ $chartServerNovo->script() }}
{{ $chartPabxNovo->script() }}
{{ $chartServerRoyal->script() }}

</html>
