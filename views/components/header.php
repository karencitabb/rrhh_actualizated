<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<title>Dashboard | PlastyPetco</title>
<link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Syne:wght@400;600;700;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.0/chart.umd.min.js"></script>
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
:root{
  --green:#2ddf6e;--green-dim:#1a9945;--green-dark:#0d5c2e;
  --sidebar-bg:#050e07;--sidebar-w:220px;--topbar-h:64px;
  --content-bg:#f2f5f3;--white:#ffffff;
  --text:#0d1f11;--text-mid:#4a6655;--text-soft:#8aab96;
  --border:#e0ebe4;--border-dark:rgba(45,223,110,0.18);
  --green-mist:rgba(45,223,110,0.08);
  --shadow:0 2px 12px rgba(0,0,0,0.07);
  --shadow-md:0 6px 24px rgba(0,0,0,0.09);
}

/* ── BARRA DE SCROLL PERSONALIZADA ── */
::-webkit-scrollbar { width: 6px; }
::-webkit-scrollbar-track { background: transparent; }
::-webkit-scrollbar-thumb { background: rgba(45, 223, 110, 0.3); border-radius: 10px; }
::-webkit-scrollbar-thumb:hover { background: rgba(45, 223, 110, 0.6); }

html,body{height:100%;overflow-x:hidden}
body{font-family:'DM Sans',sans-serif;background:var(--content-bg);color:var(--text)}

/* ── LAYOUT ── */
.layout{display:flex;min-height:100vh}

/* ── SIDEBAR ── */
.sidebar{
  width:var(--sidebar-w);background:var(--sidebar-bg);
  display:flex;flex-direction:column;
  position:fixed;top:0;left:0;height:100vh;z-index:100;
  transition:transform .3s cubic-bezier(.22,1,.36,1);
  border-right:1px solid rgba(45,223,110,0.1);
}
.sidebar-head{padding:20px 18px 16px;border-bottom:1px solid rgba(45,223,110,0.1);display:flex;align-items:center;gap:10px}
.sidebar-logo{width:36px;height:36px;flex-shrink:0}
.sidebar-logo img{width:100%;height:100%;object-fit:contain;mix-blend-mode:screen}
.sidebar-brand{font-family:'Syne',sans-serif;font-size:16px;font-weight:800;color:#fff;letter-spacing:-.3px;line-height:1}
.sidebar-brand em{font-style:normal;color:var(--green)}
.sidebar-tag{font-size:10px;color:rgba(45,223,110,0.5);margin-top:3px}

.sidebar-nav{flex:1;padding:12px 10px;display:flex;flex-direction:column;gap:2px;overflow-y:auto}
.nav-section{font-size:9.5px;letter-spacing:1.4px;text-transform:uppercase;color:rgba(45,223,110,0.35);padding:12px 8px 5px;font-weight:700}
.nav-item{display:flex;align-items:center;gap:10px;padding:9px 10px;border-radius:10px;color:rgba(255,255,255,0.45);font-size:13px;text-decoration:none;transition:all .18s;position:relative}
.nav-item svg{width:16px;height:16px;stroke:currentColor;fill:none;stroke-width:1.8;flex-shrink:0}
.nav-item:hover{background:rgba(45,223,110,0.08);color:rgba(255,255,255,0.85)}
.nav-item.active{background:rgba(45,223,110,0.14);color:var(--green);font-weight:500}
.nav-item.active::before{content:'';position:absolute;left:0;top:22%;height:56%;width:3px;border-radius:2px;background:var(--green);box-shadow:0 0 8px var(--green)}
.sidebar-foot{padding:12px 10px;border-top:1px solid rgba(45,223,110,0.08)}
.nav-logout{display:flex;align-items:center;gap:10px;padding:9px 10px;border-radius:10px;color:#f87171;font-size:13px;text-decoration:none;transition:background .18s}
.nav-logout svg{width:16px;height:16px;stroke:currentColor;fill:none;stroke-width:1.8}
.nav-logout:hover{background:rgba(248,113,113,0.08)}

/* leaf deco sidebar */
.sidebar-leaf{position:absolute;bottom:60px;right:-8px;opacity:.18;pointer-events:none}

/* ── MAIN ── */
.main{margin-left:var(--sidebar-w);flex:1;display:flex;flex-direction:column;min-height:100vh}

/* ── TOPBAR ── */
.topbar{
  height:var(--topbar-h);background:var(--white);
  border-bottom:1px solid var(--border);
  display:flex;align-items:center;justify-content:space-between;
  padding:0 28px;position:sticky;top:0;z-index:50;
  box-shadow:0 1px 8px rgba(0,0,0,0.05);
}
.topbar-left{display:flex;align-items:center;gap:16px}
.menu-toggle{display:none;background:none;border:none;color:var(--text-mid);cursor:pointer;padding:4px}
.menu-toggle svg{width:20px;height:20px;stroke:currentColor;fill:none;stroke-width:1.8}
.topbar-title{font-family:'Syne',sans-serif;font-size:clamp(18px,2vw,22px);font-weight:800;color:var(--text);letter-spacing:-.4px}

/* search bar */
.search-bar{
  display:flex;align-items:center;gap:8px;
  background:var(--content-bg);border:1px solid var(--border);
  border-radius:10px;padding:8px 14px;
  width:clamp(180px,26vw,340px);
  transition:border-color .2s,box-shadow .2s;
}
.search-bar:focus-within{border-color:#b6dfc4;box-shadow:0 0 0 3px rgba(45,223,110,0.07)}
.search-bar svg{width:15px;height:15px;stroke:var(--text-soft);fill:none;stroke-width:1.8;flex-shrink:0}
.search-bar input{background:none;border:none;outline:none;font-size:13px;color:var(--text);font-family:'DM Sans',sans-serif;width:100%}
.search-bar input::placeholder{color:var(--text-soft)}
.search-kbd{font-size:10.5px;color:var(--text-soft);background:var(--white);border:1px solid var(--border);border-radius:5px;padding:2px 6px;white-space:nowrap}

/* topbar right */
.topbar-right{display:flex;align-items:center;gap:12px}
.notif-btn{position:relative;width:36px;height:36px;border-radius:50%;background:var(--content-bg);border:1px solid var(--border);display:flex;align-items:center;justify-content:center;cursor:pointer;transition:all .2s}
.notif-btn:hover{border-color:#b6dfc4}
.notif-btn svg{width:17px;height:17px;stroke:var(--text-mid);fill:none;stroke-width:1.8}
.notif-badge{position:absolute;top:-2px;right:-2px;width:16px;height:16px;background:var(--green);border-radius:50%;font-size:9px;font-weight:700;color:#021a08;display:flex;align-items:center;justify-content:center;border:2px solid var(--white)}

/* profile pill */
.profile-wrap{position:relative}
.profile-btn{display:flex;align-items:center;gap:10px;background:var(--content-bg);border:1px solid var(--border);border-radius:40px;padding:6px 14px 6px 6px;cursor:pointer;transition:all .2s}
.profile-btn:hover{border-color:#b6dfc4;background:#eaf5ee}
.profile-avatar{width:36px;height:36px;border-radius:50%;background:linear-gradient(135deg,var(--green),var(--green-dim));display:flex;align-items:center;justify-content:center;font-family:'Syne',sans-serif;font-size:14px;font-weight:800;color:#021a08;flex-shrink:0;box-shadow:0 0 10px rgba(45,223,110,0.3)}
.profile-info{display:flex;flex-direction:column;text-align:left;line-height:1.2}
.profile-name{font-size:13px;font-weight:600;color:var(--text)}
.profile-role{font-size:11px;color:var(--green-dim)}
.profile-chevron{width:15px;height:15px;color:var(--text-soft);transition:transform .25s;flex-shrink:0}
.profile-wrap.open .profile-chevron{transform:rotate(180deg)}

/* dropdown */
.profile-dropdown{position:absolute;top:calc(100% + 8px);right:0;width:230px;background:var(--white);border:1px solid var(--border);border-radius:16px;overflow:hidden;box-shadow:var(--shadow-md);display:none;animation:ddIn .2s cubic-bezier(.22,1,.36,1) both;z-index:200}
.profile-wrap.open .profile-dropdown{display:block}
@keyframes ddIn{from{opacity:0;transform:translateY(-6px) scale(.97)}to{opacity:1;transform:none}}
.profile-dropdown-head{padding:14px;display:flex;align-items:center;gap:10px;border-bottom:1px solid var(--border);background:var(--content-bg)}
.profile-avatar-lg{width:40px;height:40px;border-radius:50%;background:linear-gradient(135deg,var(--green),var(--green-dim));display:flex;align-items:center;justify-content:center;font-family:'Syne',sans-serif;font-size:16px;font-weight:800;color:#021a08;flex-shrink:0}
.profile-dropdown-body{padding:6px}
.profile-dd-item{display:flex;align-items:center;gap:9px;padding:9px 11px;border-radius:9px;font-size:13px;color:var(--text-mid);text-decoration:none;transition:background .15s,color .15s}
.profile-dd-item svg{width:14px;height:14px;flex-shrink:0;stroke:currentColor;fill:none;stroke-width:1.8}
.profile-dd-item:hover{background:var(--green-mist);color:var(--green-dark)}
.profile-dd-sep{height:1px;background:var(--border);margin:5px 0}
.profile-dd-logout{color:#dc2626 !important}
.profile-dd-logout:hover{background:#fff1f2 !important}

/* ── CONTENT ── */
.content{flex:1;padding:24px 28px;display:flex;flex-direction:column;gap:20px}

/* ── BANNER ── */
.banner{
  background:linear-gradient(135deg,var(--green-dark) 0%,#0d3d1e 50%,#1a5c2e 100%);
  border-radius:20px;padding:28px 32px;
  display:flex;align-items:center;justify-content:space-between;
  position:relative;overflow:hidden;min-height:130px;
}
.banner::before{content:'';position:absolute;inset:0;background:url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%232ddf6e' fill-opacity='0.04'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");pointer-events:none}
.banner-glow{position:absolute;right:15%;top:-40px;width:280px;height:280px;background:radial-gradient(circle,rgba(45,223,110,0.15),transparent 70%);pointer-events:none}
.banner-text{position:relative;z-index:1}
.banner-text h2{font-family:'Syne',sans-serif;font-size:clamp(20px,2.5vw,28px);font-weight:800;color:#fff;letter-spacing:-.4px;margin-bottom:6px}
.banner-text h2 span{color:var(--green)}
.banner-text p{font-size:13.5px;color:rgba(255,255,255,0.6);font-weight:300}
.banner-badge{position:relative;z-index:1;display:flex;align-items:center;gap:7px;background:rgba(45,223,110,0.15);border:1px solid rgba(45,223,110,0.3);border-radius:20px;padding:8px 16px;font-size:12px;color:var(--green);white-space:nowrap}
.pulse-dot{width:6px;height:6px;border-radius:50%;background:var(--green);box-shadow:0 0 8px var(--green);animation:pulse 2s infinite}
@keyframes pulse{0%,100%{opacity:1;transform:scale(1)}50%{opacity:.4;transform:scale(.6)}}

/* ── STAT CARDS ── */
.stats-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(190px,1fr));gap:14px}
.stat-card{
  background:var(--white);border:1px solid var(--border);border-radius:16px;
  padding:18px 20px;position:relative;overflow:hidden;
  box-shadow:var(--shadow);transition:transform .2s,box-shadow .2s;
  animation:fadeUp .5s ease both;
}
.stat-card:hover{transform:translateY(-2px);box-shadow:var(--shadow-md)}
.stat-top{display:flex;align-items:center;justify-content:space-between;margin-bottom:12px}
.stat-icon{width:38px;height:38px;border-radius:10px;display:flex;align-items:center;justify-content:center}
.stat-icon svg{width:18px;height:18px;stroke:currentColor;fill:none;stroke-width:1.8}
.stat-trend{font-size:11px;font-weight:500;display:flex;align-items:center;gap:3px}
.stat-trend svg{width:12px;height:12px;stroke:currentColor;fill:none;stroke-width:2}
.trend-up{color:#16a34a}.trend-down{color:#dc2626}.trend-neutral{color:var(--text-soft)}
.stat-num{font-family:'Syne',sans-serif;font-size:clamp(26px,3vw,34px);font-weight:800;line-height:1;margin-bottom:3px}
.stat-label{font-size:12px;color:var(--text-soft);font-weight:400;margin-bottom:10px}
.stat-mini-chart{height:36px;width:100%}

/* icon color variants */
.ic-green{background:#eafaf1;color:#1a9945}
.ic-blue{background:#eff6ff;color:#2563eb}
.ic-red{background:#fff1f2;color:#dc2626}
.ic-yellow{background:#fffbeb;color:#d97706}
.ic-purple{background:#f5f3ff;color:#7c3aed}

/* num color variants */
.nc-green{color:#1a9945}.nc-blue{color:#2563eb}.nc-red{color:#dc2626}
.nc-yellow{color:#d97706}.nc-purple{color:#7c3aed}

/* ── BOTTOM GRID (charts + sidebar panels) ── */
.bottom-grid{display:grid;grid-template-columns:1fr 1fr 320px;gap:16px}

.panel{background:var(--white);border:1px solid var(--border);border-radius:16px;padding:20px;box-shadow:var(--shadow)}
.panel-title{font-family:'Syne',sans-serif;font-size:14px;font-weight:700;color:var(--text);margin-bottom:4px}
.panel-sub{font-size:11.5px;color:var(--text-soft);margin-bottom:16px}
.panel-header{display:flex;align-items:flex-start;justify-content:space-between;margin-bottom:14px}
.panel-header-left .panel-title{margin-bottom:2px}

/* chart filter */
.chart-filter{font-size:11.5px;color:var(--text-soft);background:var(--content-bg);border:1px solid var(--border);border-radius:8px;padding:4px 10px;cursor:pointer;font-family:'DM Sans',sans-serif}

/* donut legend */
.donut-wrap{display:flex;align-items:center;gap:16px;flex-wrap:wrap}
.donut-chart-wrap{width:140px;height:140px;flex-shrink:0;position:relative}
.donut-center{position:absolute;inset:0;display:flex;flex-direction:column;align-items:center;justify-content:center}
.donut-center-num{font-family:'Syne',sans-serif;font-size:22px;font-weight:800;color:var(--text);line-height:1}
.donut-center-lbl{font-size:10px;color:var(--text-soft)}
.donut-legend{flex:1;display:flex;flex-direction:column;gap:7px}
.legend-item{display:flex;align-items:center;gap:8px;font-size:12px;color:var(--text-mid)}
.legend-dot{width:10px;height:10px;border-radius:50%;flex-shrink:0}
.legend-val{margin-left:auto;font-weight:600;color:var(--text)}

/* activity feed */
.activity-list{display:flex;flex-direction:column;gap:0}
.activity-item{display:flex;align-items:flex-start;gap:10px;padding:10px 0;border-bottom:1px solid var(--border)}
.activity-item:last-child{border-bottom:none}
.act-icon{width:32px;height:32px;border-radius:9px;display:flex;align-items:center;justify-content:center;flex-shrink:0}
.act-icon svg{width:15px;height:15px;stroke:currentColor;fill:none;stroke-width:1.8}
.act-body{flex:1;min-width:0}
.act-title{font-size:12.5px;font-weight:500;color:var(--text);line-height:1.3}
.act-name{font-size:11.5px;color:var(--text-soft)}
.act-time{font-size:11px;color:var(--text-soft);white-space:nowrap;margin-top:2px}
.see-all{display:inline-flex;align-items:center;gap:5px;font-size:12px;color:var(--green-dim);font-weight:500;text-decoration:none;margin-top:10px}
.see-all svg{width:13px;height:13px;stroke:currentColor;fill:none;stroke-width:2}
.see-all:hover{color:var(--green-dark)}

/* ── BOTTOM ROW ── */
.bottom-row{display:grid;grid-template-columns:1fr 1fr 320px;gap:16px}

/* vencimientos */
.venc-item{display:flex;align-items:center;gap:12px;padding:10px 0;border-bottom:1px solid var(--border)}
.venc-item:last-child{border-bottom:none}
.venc-icon{width:34px;height:34px;border-radius:9px;display:flex;align-items:center;justify-content:center;flex-shrink:0}
.venc-icon svg{width:15px;height:15px;stroke:currentColor;fill:none;stroke-width:1.8}
.venc-body{flex:1;min-width:0}
.venc-name{font-size:12.5px;font-weight:500;color:var(--text)}
.venc-person{font-size:11.5px;color:var(--text-soft)}
.venc-meta{display:flex;align-items:center;gap:6px;flex-shrink:0}
.venc-date{font-size:11px;color:var(--text-soft)}
.venc-badge{font-size:10.5px;font-weight:600;border-radius:20px;padding:3px 9px;white-space:nowrap}
.badge-warn{background:#fff7ed;color:#d97706;border:1px solid #fed7aa}
.badge-ok{background:#f0fdf4;color:#16a34a;border:1px solid #bbf7d0}
.badge-urgent{background:#fff1f2;color:#dc2626;border:1px solid #fecaca}

/* ausentismo */
.absent-num{font-family:'Syne',sans-serif;font-size:36px;font-weight:800;color:var(--green-dark);line-height:1}
.absent-trend{display:flex;align-items:center;gap:5px;font-size:12px;color:#16a34a;margin:4px 0 14px}
.absent-trend svg{width:13px;height:13px;stroke:currentColor;fill:none;stroke-width:2}
.absent-row{display:grid;grid-template-columns:1fr 1fr;gap:10px;margin-top:14px}
.absent-mini{background:var(--content-bg);border:1px solid var(--border);border-radius:12px;padding:12px}
.absent-mini-num{font-family:'Syne',sans-serif;font-size:22px;font-weight:800;color:var(--text)}
.absent-mini-lbl{font-size:11px;color:var(--text-soft);margin-top:2px}

/* calendar */
.cal-header{display:flex;align-items:center;justify-content:space-between;margin-bottom:14px}
.cal-month{font-family:'Syne',sans-serif;font-size:14px;font-weight:700;color:var(--text)}
.cal-nav{background:none;border:1px solid var(--border);border-radius:7px;width:26px;height:26px;display:flex;align-items:center;justify-content:center;cursor:pointer;color:var(--text-mid);transition:background .15s}
.cal-nav:hover{background:var(--content-bg)}
.cal-nav svg{width:13px;height:13px;stroke:currentColor;fill:none;stroke-width:2}
.cal-grid{display:grid;grid-template-columns:repeat(7,1fr);gap:2px}
.cal-day-name{font-size:10px;color:var(--text-soft);text-align:center;padding:3px 0;font-weight:600}
.cal-day{font-size:12px;text-align:center;padding:5px 2px;border-radius:7px;cursor:default;color:var(--text-mid);transition:background .15s}
.cal-day:hover{background:var(--content-bg)}
.cal-day.today{background:var(--green);color:#021a08;font-weight:700;border-radius:50%;width:28px;height:28px;display:flex;align-items:center;justify-content:center;margin:0 auto}
.cal-day.empty{color:transparent;pointer-events:none}

/* animations */
@keyframes fadeUp{from{opacity:0;transform:translateY(14px)}to{opacity:1;transform:none}}
.stat-card:nth-child(1){animation-delay:.04s}
.stat-card:nth-child(2){animation-delay:.08s}
.stat-card:nth-child(3){animation-delay:.12s}
.stat-card:nth-child(4){animation-delay:.16s}
.stat-card:nth-child(5){animation-delay:.20s}

/* sidebar overlay */
.sidebar-overlay{display:none;position:fixed;inset:0;background:rgba(0,0,0,0.5);z-index:99;backdrop-filter:blur(3px)}

/* ── RESPONSIVE ── */
@media(max-width:1100px){
  .bottom-grid{grid-template-columns:1fr 1fr}
  .bottom-row{grid-template-columns:1fr 1fr}
  .bottom-grid > .panel:last-child{grid-column:span 2}
  .bottom-row > .panel:last-child{grid-column:span 2}
}
@media(max-width:900px){
  .sidebar{transform:translateX(-100%)}
  .sidebar.open{transform:translateX(0)}
  .sidebar-overlay.open{display:block}
  .main{margin-left:0}
  .menu-toggle{display:flex}
  .topbar{padding:0 16px}
  .content{padding:16px;gap:14px}
  .bottom-grid,.bottom-row{grid-template-columns:1fr}
  .bottom-grid > .panel:last-child,.bottom-row > .panel:last-child{grid-column:auto}
  .search-bar{width:160px}
  .search-kbd{display:none}
}
@media(max-width:560px){
  .stats-grid{grid-template-columns:1fr 1fr}
  .banner{padding:20px}
  .banner-badge{display:none}
  .profile-info{display:none}
  .profile-btn{padding:4px}
}
</style>
</head>
<body>