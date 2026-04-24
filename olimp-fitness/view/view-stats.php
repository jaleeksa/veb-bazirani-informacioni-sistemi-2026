<div id="stats-container" style="padding: 2rem; background: white;">
    <div class="banner" style="text-align: center; margin-bottom: 2rem;">
        <h1>STATISTIKA PRODAJE ČLANARINA</h1>
    </div>

    <div style="text-align: center; margin-bottom: 2rem; background: #f4f4f4; padding: 1rem; border-radius: 8px;">
        <label>Od: </label>
        <input type="date" id="dateFrom" value="<?= date('Y-m-01') ?>">
        
        <label> Do: </label>
        <input type="date" id="dateTo" value="<?= date('Y-m-t') ?>">
        
        <button id="btnFilter" style="padding: 5px 15px; cursor: pointer;">Prikaži</button>
    </div>

    <div style="width: 90%; margin: 0 auto;">
        <canvas id="myChart"></canvas>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="<?= DIR_JS ?>modul-stats.js"></script>