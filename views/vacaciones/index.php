<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Vacaciones — PlastyPetco RRHH</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
:root{--g:#2d7a3a;--gl:#e8f5eb;--sb:#111;--sbw:220px;--tbh:64px;--r:10px}
html,body{height:100%}
body{font-family:'DM Sans',sans-serif;background:#f4f6f5;color:#1a1a1a;font-size:14px}
.layout{display:flex;height:100vh;overflow:hidden}
.main{flex:1;display:flex;flex-direction:column;overflow:hidden;min-width:0}
.body-wrap{display:flex;flex:1;overflow:hidden}
.content{flex:1;padding:24px 28px;overflow-y:auto;min-width:0}

/* SIDEBAR */
.sidebar{width:var(--sbw);background:var(--sb);display:flex;flex-direction:column;flex-shrink:0;height:100vh;overflow-y:auto}
.sb-head{padding:20px 16px 16px;border-bottom:1px solid #2a2a2a;flex-shrink:0}
.sb-logo{display:flex;align-items:center;gap:10px}
.sb-mark{width:36px;height:36px;background:var(--g);border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0}
.sb-mark svg{width:20px;height:20px;fill:none;stroke:#fff;stroke-width:2}
.sb-brand{font-family:'Syne',sans-serif;font-size:15px;font-weight:700;color:#fff;line-height:1.1}
.sb-brand span{display:block;font-size:10px;font-weight:400;color:#888;letter-spacing:.5px;font-family:'DM Sans',sans-serif}
.sb-nav{padding:12px 0;flex:1}
.ns{padding:8px 16px 4px;font-size:9px;font-weight:600;color:#555;letter-spacing:1px;text-transform:uppercase}
.ni{display:flex;align-items:center;gap:10px;padding:9px 16px;color:#aaa;font-size:13px;cursor:pointer;border-left:2px solid transparent;text-decoration:none;transition:background .12s,color .12s}
.ni:hover{color:#fff;background:#1e1e1e}
.ni.on{color:#fff;background:#1e2e1f;border-left-color:var(--g)}
.ni svg{width:16px;height:16px;flex-shrink:0;stroke:currentColor;fill:none;stroke-width:1.8}
.sb-out{border-top:1px solid #2a2a2a;padding:12px 0;flex-shrink:0}

/* TOPBAR */
.topbar{height:var(--tbh);background:#fff;border-bottom:1px solid #e5e5e5;display:flex;align-items:center;justify-content:space-between;padding:0 24px;flex-shrink:0}
.tb-s{display:flex;align-items:center;gap:8px;background:#f4f6f5;border:1px solid #e0e0e0;border-radius:8px;padding:7px 14px;font-size:13px;color:#888;width:280px}
.tb-s svg{width:14px;height:14px;stroke:#aaa;fill:none;stroke-width:2;flex-shrink:0}
.tb-r{display:flex;align-items:center;gap:14px}
.tb-bell{position:relative;cursor:pointer}
.tb-bell svg{width:20px;height:20px;stroke:#555;fill:none;stroke-width:1.8}
.tb-bdg{position:absolute;top:-3px;right:-3px;width:14px;height:14px;background:var(--g);border-radius:50%;font-size:8px;color:#fff;display:flex;align-items:center;justify-content:center;font-weight:700}
.tb-u{display:flex;align-items:center;gap:8px;cursor:pointer}
.av{display:flex;align-items:center;justify-content:center;border-radius:50%;font-family:'Syne',sans-serif;font-weight:700;color:#fff;flex-shrink:0}
.av-g{background:#2d7a3a}.av-t{background:#0f766e}.av-p{background:#7c3aed}.av-o{background:#ea580c}.av-b{background:#2563eb}
.tb-un{font-size:13px;font-weight:500}.tb-ur{font-size:11px;color:#888}

/* PAGE */
.page-header{display:flex;align-items:flex-start;justify-content:space-between;gap:16px;margin-bottom:20px}
.page-title{font-family:'Syne',sans-serif;font-size:20px;font-weight:700}
.page-sub{font-size:12px;color:#777;margin-top:2px}
.btn-primary{display:inline-flex;align-items:center;gap:7px;background:var(--g);color:#fff;border:none;border-radius:8px;padding:9px 16px;font-size:13px;font-weight:600;cursor:pointer;white-space:nowrap;font-family:'DM Sans',sans-serif;transition:background .15s}
.btn-primary:hover{background:#255f2e}
.btn-primary i{font-size:16px}

/* STATS */
.stats-grid{display:grid;grid-template-columns:repeat(5,1fr);gap:12px;margin-bottom:20px}
.stat-card{background:#fff;border:1px solid #e8e8e8;border-radius:var(--r);padding:15px 17px;border-top:3px solid transparent}
.sc-g{border-top-color:#2d7a3a}.sc-b{border-top-color:#3b82f6}.sc-o{border-top-color:#f59e0b}.sc-r{border-top-color:#ef4444}.sc-p{border-top-color:#8b5cf6}
.stat-label{font-size:10px;color:#888;font-weight:500;margin-bottom:3px;line-height:1.3}
.stat-num{font-family:'Syne',sans-serif;font-size:22px;font-weight:700;line-height:1}
.stat-sub{font-size:10px;color:#bbb;margin-top:3px}

/* PROGRESS BAR */
.prog-wrap{background:#f0f0f0;border-radius:20px;height:5px;margin-top:6px;overflow:hidden}
.prog-bar{height:100%;border-radius:20px;background:var(--g);transition:width .3s}

/* FILTER BAR */
.filter-bar{background:#fff;border:1px solid #e8e8e8;border-radius:var(--r);padding:13px 18px;margin-bottom:14px;display:flex;align-items:center;gap:10px;flex-wrap:wrap}
.fsearch{display:flex;align-items:center;gap:7px;background:#f4f6f5;border:1px solid #e0e0e0;border-radius:7px;padding:7px 12px;flex:1;min-width:180px}
.fsearch svg{width:13px;height:13px;stroke:#aaa;fill:none;stroke-width:2;flex-shrink:0}
.fsearch input{border:none;background:transparent;outline:none;font-size:12px;font-family:'DM Sans',sans-serif;color:#1a1a1a;width:100%}
.fsel{font-size:12px;border:1px solid #e0e0e0;border-radius:6px;padding:6px 10px;color:#555;background:#fff;font-family:'DM Sans',sans-serif;cursor:pointer}

/* TABS */
.tabs{display:flex;gap:4px;margin-bottom:14px;border-bottom:2px solid #f0f0f0}
.tab{padding:8px 16px 10px;font-size:13px;font-weight:500;color:#888;cursor:pointer;border-bottom:2px solid transparent;margin-bottom:-2px;transition:all .15s;display:flex;align-items:center;gap:6px}
.tab:hover{color:#555}
.tab.on{color:var(--g);border-bottom-color:var(--g)}
.tab i{font-size:14px}
.tab .cnt{background:#f0f0f0;color:#888;border-radius:20px;padding:1px 7px;font-size:10px;font-weight:600}
.tab.on .cnt{background:var(--gl);color:var(--g)}

/* TABLE */
.table-card{background:#fff;border:1px solid #e8e8e8;border-radius:var(--r)}
.tc-head{display:flex;align-items:center;justify-content:space-between;padding:14px 18px;border-bottom:1px solid #f0f0f0}
.tc-title{font-size:14px;font-weight:600}
.tw{overflow-x:auto}
table{width:100%;border-collapse:collapse;font-size:12.5px}
th{padding:10px 13px;text-align:left;font-size:10px;font-weight:600;color:#999;letter-spacing:.4px;text-transform:uppercase;border-bottom:1px solid #f0f0f0;background:#fafafa;white-space:nowrap}
td{padding:12px 13px;border-bottom:1px solid #f7f7f7;vertical-align:middle}
tr:last-child td{border-bottom:none}
tr.sel td{background:#f0f8f2}
tr:hover td{background:#fafcfa}
tr.sel:hover td{background:#e8f5eb}
.wc{display:flex;align-items:center;gap:9px}
.w-name{font-weight:500;font-size:13px}.w-id{font-size:11px;color:#bbb}

/* BADGES */
.badge{display:inline-flex;align-items:center;gap:4px;padding:3px 9px;border-radius:20px;font-size:11px;font-weight:600;white-space:nowrap}
.badge::before{content:'';width:5px;height:5px;border-radius:50%;display:inline-block}
.b-ap{background:#e8f5eb;color:#1a6b28}.b-ap::before{background:#2d7a3a}
.b-pe{background:#fff7ed;color:#92400e}.b-pe::before{background:#f59e0b}
.b-re{background:#fef2f2;color:#991b1b}.b-re::before{background:#ef4444}
.b-di{background:#f0f4ff;color:#1e3a8a}.b-di::before{background:#3b82f6}

/* DIAS BADGE */
.dias-badge{display:inline-flex;align-items:center;gap:5px;font-size:12px;font-weight:600;color:#1a1a1a}
.dias-badge .dias-n{font-family:'Syne',sans-serif;font-size:16px}
.dias-badge .dias-l{font-size:11px;color:#aaa;font-weight:400}

/* ACCIONES */
.acts{display:flex;gap:3px}
.abt{width:27px;height:27px;border:1px solid #e8e8e8;border-radius:6px;background:#fff;display:flex;align-items:center;justify-content:center;cursor:pointer;transition:all .12s}
.abt:hover{border-color:#aaa}
.abt i{font-size:13px;color:#777}
.abt.ae:hover{background:#eff6ff;border-color:#3b82f6}.abt.ae:hover i{color:#3b82f6}
.abt.aok:hover{background:#e8f5eb;border-color:#2d7a3a}.abt.aok:hover i{color:#2d7a3a}
.abt.ano:hover{background:#fef2f2;border-color:#ef4444}.abt.ano:hover i{color:#ef4444}

/* PANEL LATERAL */
.panel{width:340px;border-left:1px solid #e5e5e5;background:#fff;display:flex;flex-direction:column;flex-shrink:0;overflow-y:auto;transition:width .2s}
.panel.hidden{width:0;overflow:hidden;border-left:none}
.pn-head{padding:18px 20px 14px;border-bottom:1px solid #f0f0f0;display:flex;align-items:center;justify-content:space-between;position:sticky;top:0;background:#fff;z-index:1}
.pn-title{font-family:'Syne',sans-serif;font-size:15px;font-weight:700}
.pn-close{width:28px;height:28px;border:none;background:#f4f4f4;border-radius:6px;cursor:pointer;display:flex;align-items:center;justify-content:center}
.pn-close i{font-size:14px;color:#555}
.pn-body{padding:18px 20px;flex:1}
.pn-worker{display:flex;align-items:center;gap:12px;margin-bottom:18px;padding-bottom:16px;border-bottom:1px solid #f0f0f0}
.pn-wname{font-weight:600;font-size:14px}.pn-wsub{font-size:12px;color:#aaa}
.sec-lbl{font-size:10px;font-weight:600;color:var(--g);text-transform:uppercase;letter-spacing:.8px;margin-bottom:12px;padding-bottom:6px;border-bottom:2px solid var(--gl)}
.fl{font-size:11px;font-weight:500;color:#777;margin-bottom:5px;display:block}
.fi,.fsel2{width:100%;border:1px solid #e0e0e0;border-radius:7px;padding:8px 11px;font-size:13px;font-family:'DM Sans',sans-serif;color:#1a1a1a;background:#fff;transition:border-color .12s}
.fi:focus,.fsel2:focus{outline:none;border-color:var(--g)}
.frow{margin-bottom:12px}
.grid2{display:grid;grid-template-columns:1fr 1fr;gap:10px}
.mt6{margin-top:6px}
.pn-empty{display:flex;flex-direction:column;align-items:center;justify-content:center;height:100%;padding:40px 20px;text-align:center;color:#bbb}
.pn-empty i{font-size:42px;color:#ddd;margin-bottom:12px}
.pn-empty p{font-size:13px;line-height:1.6}
.pn-foot{padding:14px 20px;border-top:1px solid #f0f0f0;display:flex;gap:8px;position:sticky;bottom:0;background:#fff}
.btn-save{flex:1;padding:9px;border:none;border-radius:7px;background:var(--g);color:#fff;font-size:13px;font-weight:600;font-family:'DM Sans',sans-serif;cursor:pointer;transition:background .15s}
.btn-save:hover{background:#255f2e}
.btn-can{padding:9px 14px;border:1px solid #e0e0e0;border-radius:7px;background:#fff;font-size:13px;color:#666;font-family:'DM Sans',sans-serif;cursor:pointer}

/* RESUMEN DÍAS PANEL */
.dias-resumen{background:#f8fdf9;border:1px solid #d4edda;border-radius:8px;padding:14px;margin-top:4px}
.dr-title{font-size:10px;font-weight:600;color:var(--g);text-transform:uppercase;letter-spacing:.6px;margin-bottom:10px}
.dr-row{display:flex;justify-content:space-between;align-items:center;padding:4px 0;font-size:12px;border-bottom:1px solid #eefaf0}
.dr-row:last-child{border-bottom:none}
.dr-lbl{color:#666}.dr-val{font-weight:600;color:#1a1a1a}
.dr-row.total .dr-lbl{font-weight:700;color:#1a1a1a;font-size:13px}
.dr-row.total .dr-val{font-size:14px;color:var(--g)}

/* MODAL */
.overlay{position:fixed;inset:0;background:rgba(0,0,0,.45);display:none;align-items:flex-start;justify-content:center;padding-top:40px;z-index:999}
.overlay.open{display:flex}
.modal{background:#fff;border-radius:14px;width:620px;max-height:86vh;overflow-y:auto;box-shadow:0 20px 60px rgba(0,0,0,.2)}
.mh{padding:20px 26px 16px;border-bottom:1px solid #f0f0f0;display:flex;align-items:center;justify-content:space-between;position:sticky;top:0;background:#fff;z-index:1}
.mt{font-family:'Syne',sans-serif;font-size:17px;font-weight:700}
.mc{width:32px;height:32px;border:none;background:#f4f4f4;border-radius:7px;cursor:pointer;display:flex;align-items:center;justify-content:center}
.mc i{font-size:16px;color:#555}
.mb{padding:22px 26px}
.fsec{margin-bottom:20px}
.fsl{font-size:10px;font-weight:600;color:var(--g);text-transform:uppercase;letter-spacing:.8px;margin-bottom:13px;padding-bottom:7px;border-bottom:2px solid var(--gl)}
.fg{display:grid;grid-template-columns:1fr 1fr;gap:13px}
.fg.g1{grid-template-columns:1fr}
.fg.g3{grid-template-columns:1fr 1fr 1fr}
.fgr{display:flex;flex-direction:column;gap:5px}
.flbl{font-size:12px;font-weight:500;color:#555}
.finp,.fselm{border:1px solid #e0e0e0;border-radius:7px;padding:9px 12px;font-size:13px;font-family:'DM Sans',sans-serif;color:#1a1a1a;background:#fff;width:100%;transition:border-color .12s}
.finp:focus,.fselm:focus{outline:none;border-color:var(--g)}
.ftxt{border:1px solid #e0e0e0;border-radius:7px;padding:9px 12px;font-size:13px;font-family:'DM Sans',sans-serif;color:#1a1a1a;background:#fff;width:100%;resize:vertical;min-height:80px}
.span2{grid-column:span 2}
.mf{padding:16px 26px;border-top:1px solid #f0f0f0;display:flex;justify-content:flex-end;gap:10px;position:sticky;bottom:0;background:#fff}
.bmcan{padding:9px 20px;border:1px solid #e0e0e0;border-radius:7px;background:#fff;font-size:13px;color:#555;cursor:pointer;font-family:'DM Sans',sans-serif}
.bmsav{padding:9px 22px;border:none;border-radius:7px;background:var(--g);color:#fff;font-size:13px;font-weight:600;cursor:pointer;font-family:'DM Sans',sans-serif}
.bmsav:hover{background:#255f2e}

/* CALENDAR MINI */
.cal-mini{background:#fff;border:1px solid #e8e8e8;border-radius:var(--r);padding:18px;margin-top:14px}
.cal-mini-title{font-family:'Syne',sans-serif;font-size:13px;font-weight:700;margin-bottom:14px;display:flex;align-items:center;justify-content:space-between}
.cal-nav{display:flex;gap:4px}
.cal-nav button{width:26px;height:26px;border:1px solid #e8e8e8;border-radius:6px;background:#fff;cursor:pointer;display:flex;align-items:center;justify-content:center;font-size:13px;color:#555}
.cal-grid{display:grid;grid-template-columns:repeat(7,1fr);gap:3px}
.cal-dow{font-size:9px;font-weight:600;color:#bbb;text-align:center;padding:3px 0;text-transform:uppercase}
.cal-day{width:100%;aspect-ratio:1;border-radius:6px;display:flex;align-items:center;justify-content:center;font-size:11px;color:#555;cursor:default;transition:background .12s}
.cal-day.empty{background:transparent}
.cal-day.today{background:var(--gl);color:var(--g);font-weight:700}
.cal-day.vac{background:#dbeafe;color:#1e3a8a;font-weight:600}
.cal-day.vac-ap{background:#bbf7d0;color:#166534;font-weight:600}
.cal-legend{display:flex;gap:12px;margin-top:10px;font-size:11px;color:#888;flex-wrap:wrap}
.cal-legend span{display:flex;align-items:center;gap:5px}
.cal-legend .dot{width:10px;height:10px;border-radius:3px}
</style>
</head>
<body>

<div class="layout">
  <!-- SIDEBAR -->
  <aside class="sidebar">
    <div class="sb-head">
      <div class="sb-logo">
        <div class="sb-mark"><svg viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg></div>
        <div class="sb-brand">PlastyPetco<span>RRHH · SG-SST</span></div>
      </div>
    </div>
    <nav class="sb-nav">
      <div class="ns">Principal</div>
      <a class="ni" href="#"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/></svg>Resumen</a>
      <div class="ns">Gestión</div>
      <a class="ni" href="#"><svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>Trabajadores</a>
      <a class="ni" href="#"><svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>Contratación</a>
      <a class="ni" href="#"><svg viewBox="0 0 24 24"><path d="M18 20V10M12 20V4M6 20v-6"/></svg>Novedades</a>
      <a class="ni on" href="#"><svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>Vacaciones</a>
      <div class="ns">SG-SST</div>
      <a class="ni" href="#"><svg viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>Perfil de Salud</a>
      <a class="ni" href="#"><svg viewBox="0 0 24 24"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>Exámenes Médicos</a>
      <a class="ni" href="#"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>Incidentes</a>
      <a class="ni" href="#"><svg viewBox="0 0 24 24"><path d="M2 3h6a4 4 0 014 4v14a3 3 0 00-3-3H2z"/><path d="M22 3h-6a4 4 0 00-4 4v14a3 3 0 013-3h7z"/></svg>Capacitaciones</a>
      <div class="ns">Reportes</div>
      <a class="ni" href="#"><svg viewBox="0 0 24 24"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>Reportes</a>
      <a class="ni" href="#"><svg viewBox="0 0 24 24"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>Indicadores</a>
      <div class="ns">Configuración</div>
      <a class="ni" href="#"><svg viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M20 21a8 8 0 10-16 0"/></svg>Usuarios</a>
    </nav>
    <div class="sb-out">
      <a class="ni" href="#"><svg viewBox="0 0 24 24"><path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>Cerrar sesión</a>
    </div>
  </aside>

  <div class="main">
    <header class="topbar">
      <div class="tb-s"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>Buscar trabajadores, vacaciones...</div>
      <div class="tb-r">
        <div class="tb-bell"><svg viewBox="0 0 24 24"><path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9M13.73 21a2 2 0 01-3.46 0"/></svg><span class="tb-bdg">3</span></div>
        <div class="tb-u">
          <div class="av av-o" style="width:34px;height:34px;font-size:12px">KV</div>
          <div><div class="tb-un">Karen Paola Vaca Franco</div><div class="tb-ur">RRHH</div></div>
        </div>
      </div>
    </header>

    <div class="body-wrap">
      <div class="content">

        <!-- ENCABEZADO -->
        <div class="page-header">
          <div>
            <div class="page-title">Vacaciones</div>
            <div class="page-sub">Gestiona las solicitudes de vacaciones, aprueba periodos y controla los días disponibles por trabajador.</div>
          </div>
          <button class="btn-primary" onclick="abrirModal()">
            <i class="ti ti-plus" aria-hidden="true"></i>Nueva solicitud
          </button>
        </div>

        <!-- STATS -->
        <div class="stats-grid">
          <div class="stat-card sc-g">
            <div class="stat-label">Solicitudes del mes</div>
            <div class="stat-num">5</div>
            <div class="stat-sub">Junio 2026</div>
          </div>
          <div class="stat-card sc-o">
            <div class="stat-label">Pendientes</div>
            <div class="stat-num">2</div>
            <div class="stat-sub">Sin aprobar</div>
          </div>
          <div class="stat-card sc-b">
            <div class="stat-label">Aprobadas</div>
            <div class="stat-num">2</div>
            <div class="stat-sub">Este mes</div>
          </div>
          <div class="stat-card sc-r">
            <div class="stat-label">Rechazadas</div>
            <div class="stat-num">1</div>
            <div class="stat-sub">Este mes</div>
          </div>
          <div class="stat-card sc-p">
            <div class="stat-label">Días otorgados</div>
            <div class="stat-num">28</div>
            <div class="stat-sub">Acumulado 2026</div>
          </div>
        </div>

        <!-- CALENDARIO MINI -->
        <div class="cal-mini">
          <div class="cal-mini-title">
            <span id="calMes">Junio 2026</span>
            <div class="cal-nav">
              <button onclick="cambiarMes(-1)"><i class="ti ti-chevron-left" aria-hidden="true"></i></button>
              <button onclick="cambiarMes(1)"><i class="ti ti-chevron-right" aria-hidden="true"></i></button>
            </div>
          </div>
          <div class="cal-grid" id="calGrid"></div>
          <div class="cal-legend">
            <span><div class="dot" style="background:#bbf7d0"></div>Aprobada</span>
            <span><div class="dot" style="background:#dbeafe"></div>Pendiente</span>
            <span><div class="dot" style="background:var(--gl)"></div>Hoy</span>
          </div>
        </div>

        <!-- FILTROS -->
        <div class="filter-bar" style="margin-top:14px">
          <div class="fsearch">
            <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
            <input type="text" id="busqueda" placeholder="Buscar por trabajador..." oninput="filtrar()">
          </div>
          <select class="fsel" id="filtroEstado" onchange="filtrar()">
            <option value="">Todos los estados</option>
            <option>Aprobada</option><option>Pendiente</option><option>Rechazada</option><option>Disfrutando</option>
          </select>
          <select class="fsel" id="filtroArea" onchange="filtrar()">
            <option value="">Todas las áreas</option>
            <option>Logística</option><option>Producción</option><option>SST</option><option>Administrativa</option>
          </select>
          <div style="display:flex;align-items:center;gap:6px;font-size:12px;color:#888">
            Desde <input type="date" id="filtroDesde" class="fsel" onchange="filtrar()">
            Hasta <input type="date" id="filtroHasta" class="fsel" onchange="filtrar()">
          </div>
        </div>

        <!-- TABS -->
        <div class="tabs">
          <div class="tab on" data-tab="" onclick="cambiarTab(this)"><i class="ti ti-list" aria-hidden="true"></i>Todas<span class="cnt">5</span></div>
          <div class="tab" data-tab="Pendiente" onclick="cambiarTab(this)"><i class="ti ti-clock" aria-hidden="true"></i>Pendientes<span class="cnt">2</span></div>
          <div class="tab" data-tab="Aprobada" onclick="cambiarTab(this)"><i class="ti ti-circle-check" aria-hidden="true"></i>Aprobadas<span class="cnt">2</span></div>
          <div class="tab" data-tab="Disfrutando" onclick="cambiarTab(this)"><i class="ti ti-beach" aria-hidden="true"></i>Disfrutando<span class="cnt">0</span></div>
          <div class="tab" data-tab="Rechazada" onclick="cambiarTab(this)"><i class="ti ti-circle-x" aria-hidden="true"></i>Rechazadas<span class="cnt">1</span></div>
        </div>

        <!-- TABLA -->
        <div class="table-card">
          <div class="tc-head">
            <div class="tc-title">Solicitudes de vacaciones</div>
          </div>
          <div class="tw">
            <table id="tablaVac">
              <thead>
                <tr>
                  <th>Trabajador</th>
                  <th>Área</th>
                  <th>Fecha inicio</th>
                  <th>Fecha fin</th>
                  <th>Días</th>
                  <th>Días disp.</th>
                  <th>Estado</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody id="tbodyVac"></tbody>
            </table>
          </div>
        </div>

      </div><!-- /content -->

      <!-- PANEL LATERAL -->
      <aside class="panel hidden" id="panel">
        <div class="pn-empty" id="panelEmpty">
          <i class="ti ti-calendar-event" aria-hidden="true"></i>
          <p>Selecciona el lápiz de una solicitud para editarla o aproba/rechazarla desde aquí.</p>
        </div>

        <!-- VER / EDITAR -->
        <div id="panelContent" style="display:none;flex-direction:column;min-height:100%">
          <div class="pn-head">
            <div class="pn-title" id="pnTitle">Detalle de solicitud</div>
            <button class="pn-close" onclick="cerrarPanel()"><i class="ti ti-x"></i></button>
          </div>
          <div class="pn-body">
            <div class="pn-worker">
              <div class="av" id="pnAv" style="width:40px;height:40px;font-size:13px">--</div>
              <div>
                <div class="pn-wname" id="pnNombre">—</div>
                <div class="pn-wsub" id="pnSub">—</div>
              </div>
            </div>

            <div class="sec-lbl">Período de vacaciones</div>
            <div class="grid2">
              <div class="frow">
                <span class="fl">Fecha inicio *</span>
                <input type="date" class="fi" id="eFIni" onchange="calcDias()">
              </div>
              <div class="frow">
                <span class="fl">Fecha fin *</span>
                <input type="date" class="fi" id="eFFin" onchange="calcDias()">
              </div>
            </div>

            <div class="frow mt6">
              <span class="fl">Estado</span>
              <select class="fsel2" id="eEstado">
                <option>Pendiente</option>
                <option>Aprobada</option>
                <option>Rechazada</option>
                <option>Disfrutando</option>
              </select>
            </div>

            <!-- Resumen días -->
            <div class="dias-resumen">
              <div class="dr-title">Resumen de días</div>
              <div class="dr-row"><span class="dr-lbl">Días solicitados</span><span class="dr-val" id="drSol">0</span></div>
              <div class="dr-row"><span class="dr-lbl">Días disponibles</span><span class="dr-val" id="drDisp">15</span></div>
              <div class="dr-row"><span class="dr-lbl">Días ya tomados</span><span class="dr-val" id="drTom">0</span></div>
              <div class="dr-row total"><span class="dr-lbl">Saldo restante</span><span class="dr-val" id="drSaldo">15</span></div>
              <div class="prog-wrap" style="margin-top:8px">
                <div class="prog-bar" id="drProg" style="width:0%"></div>
              </div>
            </div>

            <div class="frow mt6">
              <span class="fl">Observaciones</span>
              <textarea class="fi" id="eObs" style="resize:vertical;min-height:70px;padding:8px 11px"></textarea>
            </div>
          </div>
          <div class="pn-foot">
            <button class="btn-can" onclick="cerrarPanel()">Cancelar</button>
            <button class="btn-save" onclick="guardar()">Guardar cambios</button>
          </div>
        </div>
      </aside>

    </div><!-- /body-wrap -->
  </div><!-- /main -->
</div><!-- /layout -->


<!-- MODAL NUEVA SOLICITUD -->
<div class="overlay" id="overlayNuevo">
  <div class="modal">
    <div class="mh">
      <div class="mt">Nueva solicitud de vacaciones</div>
      <button class="mc" onclick="cerrarModal()"><i class="ti ti-x"></i></button>
    </div>
    <div class="mb">

      <div class="fsec">
        <div class="fsl">Trabajador</div>
        <div class="fg">
          <div class="fgr span2">
            <label class="flbl">Seleccionar trabajador *</label>
            <select class="fselm" id="mTrabajador" onchange="cargarDiasDisp()">
              <option value="">— Seleccione un trabajador —</option>
              <option value="13|PF|av-g|Paola Franco|Logística|12|3">Paola Franco — Logística</option>
              <option value="9|CV|av-t|Camilo Vargas|Producción|15|5">Camilo Vargas — Producción</option>
              <option value="12|PV|av-p|Paola Franco Vargas|SST|15|0">Paola Franco Vargas — SST</option>
              <option value="1|KV|av-o|Karen Paola Vaca Franco|Administrativa|15|7">Karen Paola Vaca Franco — Administrativa</option>
              <option value="3|PF|av-b|Paola Franco|Sin área|15|0">Paola Franco (ID:0003) — Sin área</option>
            </select>
          </div>
        </div>

        <!-- Info días disponibles -->
        <div id="mDiasInfo" style="display:none;margin-top:12px;background:#f8fdf9;border:1px solid #d4edda;border-radius:8px;padding:12px 14px">
          <div style="display:flex;justify-content:space-between;font-size:13px">
            <span style="color:#666">Días disponibles:</span>
            <strong id="mDispVal" style="color:var(--g)">—</strong>
          </div>
          <div style="display:flex;justify-content:space-between;font-size:13px;margin-top:4px">
            <span style="color:#666">Días ya tomados:</span>
            <strong id="mTomVal" style="color:#888">—</strong>
          </div>
          <div class="prog-wrap" style="margin-top:8px">
            <div class="prog-bar" id="mProg" style="width:0%"></div>
          </div>
        </div>
      </div>

      <div class="fsec">
        <div class="fsl">Período</div>
        <div class="fg g3">
          <div class="fgr">
            <label class="flbl">Fecha inicio *</label>
            <input type="date" class="finp" id="mFIni" onchange="calcDiasModal()">
          </div>
          <div class="fgr">
            <label class="flbl">Fecha fin *</label>
            <input type="date" class="finp" id="mFFin" onchange="calcDiasModal()">
          </div>
          <div class="fgr">
            <label class="flbl">Días calculados</label>
            <input type="number" class="finp" id="mDias" readonly placeholder="Auto" style="background:#f8f8f8;color:var(--g);font-weight:700">
          </div>
        </div>
      </div>

      <div class="fsec">
        <div class="fsl">Detalles</div>
        <div class="fg g1">
          <div class="fgr">
            <label class="flbl">Estado inicial</label>
            <select class="fselm">
              <option>Pendiente</option>
              <option>Aprobada</option>
            </select>
          </div>
          <div class="fgr" style="margin-top:12px">
            <label class="flbl">Observaciones</label>
            <textarea class="ftxt" placeholder="Motivo, notas o condiciones especiales..."></textarea>
          </div>
        </div>
      </div>

    </div>
    <div class="mf">
      <button class="bmcan" onclick="cerrarModal()">Cancelar</button>
      <button class="bmsav" onclick="registrarVacacion()">Registrar solicitud</button>
    </div>
  </div>
</div>

<script>
// ── DATOS (mapean la BD: id_vacacion, fecha_inicio, fecha_fin, dias, estado, id_trabajador) ──
const vacaciones = [
  {id:1,ini:'PF',color:'av-g',nombre:'Paola Franco',idT:13,area:'Logística',fi:'2026-06-10',ff:'2026-06-24',dias:15,disp:15,tomados:0,estado:'Aprobada',obs:'Vacaciones anuales programadas.'},
  {id:2,ini:'CV',color:'av-t',nombre:'Camilo Vargas',idT:9,area:'Producción',fi:'2026-07-01',ff:'2026-07-05',dias:5,disp:15,tomados:5,estado:'Pendiente',obs:'Solicitud de descanso por acumulado.'},
  {id:3,ini:'PV',color:'av-p',nombre:'Paola Franco Vargas',idT:12,area:'SST',fi:'2026-05-01',ff:'2026-05-08',dias:8,disp:15,tomados:8,estado:'Rechazada',obs:'Rechazo por carga laboral en el período.'},
  {id:4,ini:'KV',color:'av-o',nombre:'Karen Paola Vaca',idT:1,area:'Administrativa',fi:'2026-06-15',ff:'2026-06-22',dias:8,disp:15,tomados:7,estado:'Aprobada',obs:''},
  {id:5,ini:'PF',color:'av-b',nombre:'Paola Franco',idT:3,area:'Sin área',fi:'2026-06-30',ff:'2026-07-03',dias:4,disp:15,tomados:0,estado:'Pendiente',obs:'Solicitud de vacaciones parciales.'},
];

const badgeMap = {Aprobada:'b-ap',Pendiente:'b-pe',Rechazada:'b-re',Disfrutando:'b-di'};
let filaActual = null, tabActual = '';

function fmtF(f){ if(!f) return '—'; const[y,m,d]=f.split('-'); return `${d}/${m}/${y}`; }
function diasEntre(fi,ff){ if(!fi||!ff) return 0; return Math.round((new Date(ff)-new Date(fi))/(1000*60*60*24))+1; }

// ── RENDER TABLA ─────────────────────────────────────────────────────────
function renderTabla(){
  const tb = document.getElementById('tbodyVac');
  tb.innerHTML = vacaciones.map((v,i)=>{
    const pct = Math.min(100, Math.round((v.tomados/v.disp)*100));
    return `
    <tr id="row-${i}" data-estado="${v.estado}" data-nombre="${v.nombre.toLowerCase()}" data-area="${v.area}" data-fi="${v.fi}">
      <td><div class="wc"><div class="av ${v.color}" style="width:32px;height:32px;font-size:11px">${v.ini}</div>
        <div><div class="w-name">${v.nombre}</div><div class="w-id">ID: ${String(v.idT).padStart(4,'0')}</div></div></div></td>
      <td style="font-size:12px;color:#666">${v.area}</td>
      <td style="font-size:12px">${fmtF(v.fi)}</td>
      <td style="font-size:12px;color:#888">${fmtF(v.ff)}</td>
      <td><div class="dias-badge"><span class="dias-n">${v.dias}</span><span class="dias-l">días</span></div></td>
      <td>
        <div style="font-size:12px;font-weight:600;color:#1a1a1a">${v.disp} días</div>
        <div class="prog-wrap" style="margin-top:4px"><div class="prog-bar" style="width:${pct}%"></div></div>
        <div style="font-size:10px;color:#aaa;margin-top:2px">${v.tomados} tomados</div>
      </td>
      <td><span class="badge ${badgeMap[v.estado]||'b-pe'}">${v.estado}</span></td>
      <td><div class="acts">
        <button class="abt ae" title="Editar" onclick="editarVac(${i})"><i class="ti ti-edit"></i></button>
        <button class="abt aok" title="Aprobar" onclick="aprobar(${i})"><i class="ti ti-check"></i></button>
        <button class="abt ano" title="Rechazar" onclick="rechazar(${i})"><i class="ti ti-x"></i></button>
      </div></td>
    </tr>`}).join('');
}

// ── PANEL EDITAR ─────────────────────────────────────────────────────────
function editarVac(idx){
  const v = vacaciones[idx];
  resaltarFila(idx);
  const av = document.getElementById('pnAv');
  av.className = 'av '+v.color; av.style.cssText='width:40px;height:40px;font-size:13px'; av.textContent=v.ini;
  document.getElementById('pnNombre').textContent = v.nombre;
  document.getElementById('pnSub').textContent    = 'ID: '+String(v.idT).padStart(4,'0')+' · '+v.area;
  document.getElementById('pnTitle').textContent  = 'Editar solicitud';
  document.getElementById('eFIni').value  = v.fi;
  document.getElementById('eFFin').value  = v.ff;
  document.getElementById('eObs').value   = v.obs||'';
  seleccionar('eEstado', v.estado);
  actualizarResumen(v.dias, v.disp, v.tomados);
  document.getElementById('panelEmpty').style.display   = 'none';
  document.getElementById('panelContent').style.display = 'flex';
  document.getElementById('panel').classList.remove('hidden');
}

function calcDias(){
  const fi = document.getElementById('eFIni').value;
  const ff = document.getElementById('eFFin').value;
  const d  = diasEntre(fi,ff);
  if(filaActual!==null){
    const v = vacaciones[filaActual];
    actualizarResumen(d, v.disp, v.tomados);
  }
}

function actualizarResumen(sol, disp, tom){
  const saldo = disp - tom;
  const pct   = Math.min(100, disp>0 ? Math.round(((tom+sol)/disp)*100) : 0);
  document.getElementById('drSol').textContent  = sol + ' días';
  document.getElementById('drDisp').textContent = disp + ' días';
  document.getElementById('drTom').textContent  = tom + ' días';
  document.getElementById('drSaldo').textContent= (saldo-sol) + ' días';
  document.getElementById('drProg').style.width = pct+'%';
}

function guardar(){
  if(filaActual===null) return;
  const v = vacaciones[filaActual];
  v.fi     = document.getElementById('eFIni').value;
  v.ff     = document.getElementById('eFFin').value;
  v.dias   = diasEntre(v.fi, v.ff);
  v.estado = document.getElementById('eEstado').value;
  v.obs    = document.getElementById('eObs').value;
  renderTabla(); filtrar(); cerrarPanel();
}

// ── APROBAR / RECHAZAR ────────────────────────────────────────────────────
function aprobar(idx){
  if(confirm(`¿Aprobar las vacaciones de ${vacaciones[idx].nombre}?`)){
    vacaciones[idx].estado='Aprobada';
    renderTabla(); filtrar();
    if(filaActual===idx){ seleccionar('eEstado','Aprobada'); }
  }
}
function rechazar(idx){
  if(confirm(`¿Rechazar las vacaciones de ${vacaciones[idx].nombre}?`)){
    vacaciones[idx].estado='Rechazada';
    renderTabla(); filtrar(); cerrarPanel();
  }
}

// ── MODAL NUEVA SOLICITUD ─────────────────────────────────────────────────
function abrirModal(){ document.getElementById('overlayNuevo').classList.add('open'); }
function cerrarModal(){ document.getElementById('overlayNuevo').classList.remove('open'); }
document.getElementById('overlayNuevo').addEventListener('click',function(e){ if(e.target===this) cerrarModal(); });

function cargarDiasDisp(){
  const sel  = document.getElementById('mTrabajador');
  const val  = sel.value;
  const info = document.getElementById('mDiasInfo');
  if(!val){ info.style.display='none'; return; }
  const parts = val.split('|');
  const disp  = parseInt(parts[5]);
  const tom   = parseInt(parts[6]);
  const pct   = Math.min(100, disp>0 ? Math.round((tom/disp)*100) : 0);
  document.getElementById('mDispVal').textContent = disp + ' días';
  document.getElementById('mTomVal').textContent  = tom + ' días';
  document.getElementById('mProg').style.width    = pct+'%';
  info.style.display='block';
}

function calcDiasModal(){
  const fi = document.getElementById('mFIni').value;
  const ff = document.getElementById('mFFin').value;
  document.getElementById('mDias').value = diasEntre(fi,ff) || '';
}

function registrarVacacion(){
  const sel = document.getElementById('mTrabajador');
  const fi  = document.getElementById('mFIni').value;
  const ff  = document.getElementById('mFFin').value;
  if(!sel.value||!fi||!ff){ alert('Completa trabajador y fechas.'); return; }
  const parts = sel.value.split('|');
  vacaciones.push({
    id: vacaciones.length+1,
    ini: parts[1], color: parts[2], nombre: parts[3],
    idT: parseInt(parts[0]), area: parts[4],
    fi, ff, dias: diasEntre(fi,ff),
    disp: parseInt(parts[5]), tomados: parseInt(parts[6]),
    estado: 'Pendiente', obs: ''
  });
  renderTabla(); filtrar(); cerrarModal();
}

// ── PANEL HELPERS ─────────────────────────────────────────────────────────
function cerrarPanel(){
  if(filaActual!==null){ const f=document.getElementById('row-'+filaActual); if(f) f.classList.remove('sel'); filaActual=null; }
  document.getElementById('panelEmpty').style.display   = 'flex';
  document.getElementById('panelContent').style.display = 'none';
  document.getElementById('panel').classList.add('hidden');
}
function resaltarFila(idx){
  if(filaActual!==null){ const a=document.getElementById('row-'+filaActual); if(a) a.classList.remove('sel'); }
  const f=document.getElementById('row-'+idx); if(f) f.classList.add('sel');
  filaActual=idx;
}
function seleccionar(id,val){
  const s=document.getElementById(id);
  for(let i=0;i<s.options.length;i++) if(s.options[i].value===val||s.options[i].text===val){s.selectedIndex=i;break;}
}

// ── TABS ──────────────────────────────────────────────────────────────────
function cambiarTab(el){
  document.querySelectorAll('.tab').forEach(t=>t.classList.remove('on')); el.classList.add('on');
  tabActual=el.dataset.tab; filtrar();
}

// ── FILTROS ───────────────────────────────────────────────────────────────
function filtrar(){
  const busq  = document.getElementById('busqueda').value.toLowerCase();
  const est   = document.getElementById('filtroEstado').value;
  const area  = document.getElementById('filtroArea').value;
  const desde = document.getElementById('filtroDesde').value;
  const hasta = document.getElementById('filtroHasta').value;
  document.querySelectorAll('#tablaVac tbody tr').forEach(tr=>{
    const ok = (!tabActual || tr.dataset.estado===tabActual)
      && (!busq  || tr.dataset.nombre.includes(busq))
      && (!est   || tr.dataset.estado===est)
      && (!area  || tr.dataset.area===area)
      && (!desde || tr.dataset.fi>=desde)
      && (!hasta || tr.dataset.fi<=hasta);
    tr.style.display = ok?'':'none';
  });
}

// ── CALENDARIO ────────────────────────────────────────────────────────────
let calFecha = new Date(2026,5,1);

// Días con vacaciones aprobadas o pendientes (fecha => estado)
function getDiasVac(year, month){
  const dias = {};
  vacaciones.forEach(v=>{
    let d = new Date(v.fi);
    const fin = new Date(v.ff);
    while(d <= fin){
      if(d.getFullYear()===year && d.getMonth()===month){
        dias[d.getDate()] = v.estado;
      }
      d.setDate(d.getDate()+1);
    }
  });
  return dias;
}

function renderCal(){
  const y = calFecha.getFullYear(), m = calFecha.getMonth();
  const meses = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
  document.getElementById('calMes').textContent = meses[m]+' '+y;
  const dias = getDiasVac(y,m);
  const hoy  = new Date();
  const primer = new Date(y,m,1).getDay(); // 0=dom
  const total  = new Date(y,m+1,0).getDate();
  const dows   = ['Do','Lu','Ma','Mi','Ju','Vi','Sá'];
  let html = dows.map(d=>`<div class="cal-dow">${d}</div>`).join('');
  for(let i=0;i<primer;i++) html+=`<div class="cal-day empty"></div>`;
  for(let d=1;d<=total;d++){
    const isHoy  = hoy.getFullYear()===y && hoy.getMonth()===m && hoy.getDate()===d;
    const vacEst = dias[d];
    let cls = 'cal-day';
    if(isHoy) cls+=' today';
    else if(vacEst==='Aprobada') cls+=' vac-ap';
    else if(vacEst==='Pendiente') cls+=' vac';
    html+=`<div class="${cls}">${d}</div>`;
  }
  document.getElementById('calGrid').innerHTML = html;
}

function cambiarMes(delta){
  calFecha.setMonth(calFecha.getMonth()+delta);
  renderCal();
}

// ── INIT ──────────────────────────────────────────────────────────────────
renderTabla();
renderCal();
</script>
</body>
</html>