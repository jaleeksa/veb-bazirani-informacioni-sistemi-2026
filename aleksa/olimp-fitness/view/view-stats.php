<div id="stats-container">
    <div class="banner">
        <h1>STATISTIKA ČLANARINA</h1>
    </div>

    <div style="text-align: center; margin-bottom: 2rem; background: #f4f4f4; padding: 1rem; border-radius: 8px;">
        <label>Od: </label>
        <input type="date" id="dateFrom" value="<?= date('Y-m-01') ?>">
        
        <label style="margin-left: 20px;">Do: </label>
        <input type="date" id="dateTo" value="<?= date('Y-m-t') ?>">
        
        <button id="btnFilter" style="margin-left: 20px;">PRIKAŽITE</button>
    </div>

    <div class="prikaz">
        <canvas id="myChart"></canvas>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="<?= DIR_JS ?>modul-stats.js"></script>