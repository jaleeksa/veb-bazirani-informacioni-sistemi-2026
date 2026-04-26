<div id="stats-container" style="padding: 2rem; background: white; min-height: 85vh;">
    
    <div class="banner" style="text-align: center; margin-bottom: 2.5rem;">
        <h1>PRIHOD OD PRODAJE ČLANARINA</h1>
    </div>

    <div style="text-align: center; margin-bottom: 2.5rem; background: #f8f9fa; padding: 1.8rem; border-radius: 12px; max-width: 800px; margin-left: auto; margin-right: auto;">
        <label style="font-weight: bold;">Od: </label>
        <input type="date" id="dateFrom" value="2025-01-01" style="padding: 8px; border-radius: 6px; border: 1px solid #4ba05b;">
        
        <label style="font-weight: bold; margin-left: 25px;">Do: </label>
        <input type="date" id="dateTo" value="<?= date('Y-m-t') ?>" style="padding: 8px; border-radius: 6px; border: 1px solid #4ba05b;">
        
        <button id="btnFilter" style="padding: 10px 25px; margin-left: 20px; cursor: pointer; background: #4ba05b; color: white; border: none; border-radius: 8px; font-weight: bold;">
            Prikaži statistiku
        </button>
    </div>

    <div style="width: 95%; max-width: 1300px; margin: 0 auto; background: white; padding: 35px; border-radius: 16px; box-shadow: 0 6px 25px rgba(0,0,0,0.1); min-height: 500px;">
        <canvas id="myChart" height="520"></canvas>
    </div>

    <div style="width: 95%; max-width: 800px; margin: 40px auto; background: white; padding: 35px; border-radius: 16px; box-shadow: 0 6px 25px rgba(0,0,0,0.1);">
        <canvas id="pieChart" height="400"></canvas>
    </div>

    <div style="width: 95%; max-width: 1300px; margin: 40px auto; background: white; padding: 35px; border-radius: 16px; box-shadow: 0 6px 25px rgba(0,0,0,0.1);">
        <div style="display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center; gap: 1rem; margin-bottom: 1.5rem;">
            <h2 style="margin: 0;">Detalji članarina</h2>
            <div style="display: flex; align-items: center; gap: 0.75rem;">
                <label for="tableSearch" style="font-weight: bold; margin: 0;">Pretraži:</label>
                <input id="tableSearch" type="text" placeholder="Korisnik ili trening" style="padding: 10px 12px; border-radius: 8px; border: 1px solid #4ba05b; min-width: 260px; width: 260px;">
            </div>
        </div>
        <div style="overflow-x: auto;">
            <table id="statsTable" style="width: 100%; border-collapse: collapse; min-width: 900px;">
                <thead>
                    <tr style="background: #4ba05b; color: white; text-align: left;">  
                        <th style="padding: 12px; cursor: pointer;" onclick="window.toggleSort('username')">Korisnik ↕</th>
                        <th style="padding: 12px;">Tip treninga</th>
                        <th style="padding: 12px; cursor: pointer;" onclick="window.toggleSort('price')">Cena ↕</th>
                        <th style="padding: 12px;">Obrisano</th>
                        <th style="padding: 12px;">Datum početka
                        </th>
                    </tr>
                </thead>
                <tbody id="statsTableBody"></tbody>
            </table>
        </div>
        <div id="statsTableEmpty" style="display: none; text-align: center; padding: 2rem; color: #555;">Nema podataka za izabrani period.</div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="<?= DIR_JS ?>modul-stats.js"></script>