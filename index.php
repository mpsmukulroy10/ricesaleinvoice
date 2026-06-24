<!DOCTYPE html>
<html lang="bn">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>মেসার্স সাহা ট্রেডার্স</title>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Tiro+Bangla:ital@0;1&display=swap');
  * { box-sizing: border-box; margin: 0; padding: 0; }
  body { font-family: 'Tiro Bangla', serif; background: #f0f4f8; color: #1a1a2e; }

  /* NAVBAR */
  .navbar {
    background: linear-gradient(135deg, #1a5276, #2e86c1);
    color: white; padding: 0;
    box-shadow: 0 2px 10px rgba(0,0,0,0.2);
    position: sticky; top: 0; z-index: 100;
  }
  .nav-top { padding: 12px 24px; display: flex; align-items: center; justify-content: space-between; }
  .nav-brand { font-size: 22px; font-weight: bold; }
  .nav-brand small { font-size: 13px; opacity: 0.8; display: block; }
  .nav-tabs { display: flex; }
  .nav-tab {
    padding: 14px 28px; cursor: pointer; border-bottom: 3px solid transparent;
    font-size: 16px; transition: all 0.2s; color: rgba(255,255,255,0.8);
  }
  .nav-tab:hover { background: rgba(255,255,255,0.1); color: white; }
  .nav-tab.active { border-bottom-color: #f39c12; color: white; font-weight: bold; }

  /* PAGES */
  .page { display: none; padding: 24px; max-width: 1100px; margin: 0 auto; }
  .page.active { display: block; }

  /* CARDS */
  .card {
    background: white; border-radius: 12px;
    box-shadow: 0 2px 12px rgba(0,0,0,0.08); margin-bottom: 20px; overflow: hidden;
  }
  .card-header {
    background: linear-gradient(135deg, #1a5276, #2e86c1);
    color: white; padding: 16px 20px;
    display: flex; align-items: center; justify-content: space-between;
  }
  .card-header h3 { font-size: 18px; }
  .card-body { padding: 20px; }

  /* BUTTONS */
  .btn {
    padding: 9px 18px; border: none; border-radius: 8px; cursor: pointer;
    font-family: 'Tiro Bangla', serif; font-size: 15px; transition: all 0.2s;
    display: inline-flex; align-items: center; gap: 6px;
  }
  .btn-primary { background: #1a5276; color: white; }
  .btn-primary:hover { background: #154360; }
  .btn-success { background: #1e8449; color: white; }
  .btn-success:hover { background: #196f3d; }
  .btn-warning { background: #d68910; color: white; }
  .btn-warning:hover { background: #b7770d; }
  .btn-danger { background: #c0392b; color: white; }
  .btn-danger:hover { background: #a93226; }
  .btn-sm { padding: 5px 12px; font-size: 13px; }
  .btn-info { background: #2471a3; color: white; }
  .btn-info:hover { background: #1a5276; }

  /* FORMS */
  .form-group { margin-bottom: 16px; }
  .form-group label { display: block; margin-bottom: 6px; font-weight: bold; color: #1a5276; font-size: 14px; }
  .form-control {
    width: 100%; padding: 10px 14px; border: 2px solid #d5d8dc;
    border-radius: 8px; font-family: 'Tiro Bangla', serif; font-size: 15px;
    transition: border 0.2s;
  }
  .form-control:focus { outline: none; border-color: #2e86c1; }
  .form-row { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 16px; }

  /* TABLE */
  table { width: 100%; border-collapse: collapse; }
  th { background: #1a5276; color: white; padding: 12px 14px; text-align: left; font-size: 14px; }
  td { padding: 11px 14px; border-bottom: 1px solid #eaecee; font-size: 14px; }
  tr:hover td { background: #eaf4fb; }
  tr:last-child td { border-bottom: none; }

  /* INVOICE */
  .invoice-items-table th, .invoice-items-table td { padding: 8px 10px; }
  .invoice-items-table input { width: 100%; padding: 7px 10px; border: 1px solid #d5d8dc; border-radius: 6px; font-family: 'Tiro Bangla', serif; font-size: 14px; }
  .invoice-items-table select { width: 100%; padding: 7px 10px; border: 1px solid #d5d8dc; border-radius: 6px; font-family: 'Tiro Bangla', serif; font-size: 14px; }
  .total-row td { font-weight: bold; background: #eaf4fb; }
  .grand-total-row td { font-weight: bold; background: #1a5276; color: white; font-size: 16px; }

  /* SUMMARY BOX */
  .summary-box {
    background: linear-gradient(135deg, #eaf4fb, #d6eaf8);
    border: 2px solid #2e86c1; border-radius: 10px; padding: 16px 20px; margin-top: 16px;
  }
  .summary-row { display: flex; justify-content: space-between; align-items: center; padding: 6px 0; font-size: 16px; }
  .summary-row.grand { font-size: 20px; font-weight: bold; color: #1a5276; border-top: 2px solid #2e86c1; margin-top: 8px; padding-top: 10px; }
  .taka-words { background: #fef9e7; border: 1px dashed #d4ac0d; border-radius: 8px; padding: 10px 14px; margin-top: 12px; font-size: 15px; color: #7d6608; }

  /* MODAL */
  .modal-overlay {
    display: none; position: fixed; top: 0; left: 0; right: 0; bottom: 0;
    background: rgba(0,0,0,0.5); z-index: 200; align-items: center; justify-content: center;
  }
  .modal-overlay.open { display: flex; }
  .modal { background: white; border-radius: 14px; padding: 28px; width: 90%; max-width: 520px; max-height: 90vh; overflow-y: auto; }
  .modal h3 { color: #1a5276; margin-bottom: 20px; font-size: 20px; }

  /* PRINT */
  .print-area { display: none; }

  /* Invoice Preview Box (shown on screen too) */
  .invoice-preview {
    font-family: 'Tiro Bangla', serif;
    background: white;
    max-width: 720px;
    margin: 0 auto;
    padding: 36px 44px;
    border: 1px solid #d5d8dc;
    border-radius: 4px;
    box-shadow: 0 4px 24px rgba(0,0,0,0.12);
    color: #111;
  }
  .inv-top-bar { height: 8px; background: linear-gradient(90deg, #1a5276, #2e86c1, #1a5276); margin-bottom: 22px; }
  .inv-shop-name { font-size: 26px; font-weight: bold; color: #1a5276; text-align: center; letter-spacing: 1px; }
  .inv-prop { font-size: 14px; color: #333; text-align: center; margin: 4px 0; }
  .inv-tagline { font-size: 13px; color: #555; text-align: center; margin: 3px 0; font-style: italic; }
  .inv-address { font-size: 13px; color: #444; text-align: center; margin: 4px 0; }
  .inv-divider { border: none; border-top: 2px solid #1a5276; margin: 14px 0 10px; }
  .inv-divider-thin { border: none; border-top: 1px solid #ccc; margin: 10px 0; }
  .inv-challan-title { text-align: center; font-size: 16px; font-weight: bold; color: #1a5276; letter-spacing: 2px; margin-bottom: 14px; }
  .inv-meta-row { display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 16px; font-size: 14px; }
  .inv-meta-left p { margin: 3px 0; }
  .inv-meta-right { text-align: right; }
  .inv-meta-right p { margin: 3px 0; }
  .inv-label { color: #555; font-size: 13px; }
  .inv-value { font-weight: bold; color: #111; }
  .inv-table { width: 100%; border-collapse: collapse; margin: 10px 0; font-size: 14px; }
  .inv-table thead tr { background: #1a5276; color: white; }
  .inv-table th { padding: 9px 12px; text-align: center; font-weight: bold; border: 1px solid #1a5276; font-size: 13px; }
  .inv-table td { padding: 8px 12px; border: 1px solid #c8d6e5; text-align: center; }
  .inv-table td:nth-child(2) { text-align: left; }
  .inv-table tbody tr:nth-child(even) { background: #f4f8fb; }
  .inv-table tbody tr:last-child td { border-bottom: 2px solid #1a5276; }
  .inv-summary-wrap { display: flex; justify-content: flex-end; margin-top: 10px; }
  .inv-summary-box { width: 280px; border: 1px solid #c8d6e5; border-radius: 4px; overflow: hidden; font-size: 14px; }
  .inv-sum-row { display: flex; justify-content: space-between; padding: 7px 14px; border-bottom: 1px solid #e8edf2; }
  .inv-sum-row:last-child { border-bottom: none; }
  .inv-sum-row.grand { background: #1a5276; color: white; font-weight: bold; font-size: 15px; }
  .inv-words-box { background: #fef9e7; border: 1px dashed #d4ac0d; border-radius: 4px; padding: 9px 14px; margin-top: 12px; font-size: 13px; color: #7d6608; font-style: italic; }
  .inv-driver-box { margin-top: 16px; padding: 10px 14px; border: 1px solid #c8d6e5; border-radius: 4px; font-size: 13px; background: #f9fbfd; display: flex; gap: 24px; flex-wrap: wrap; }
  .inv-driver-box span { color: #333; }
  .inv-driver-box strong { color: #1a5276; }
  .inv-signature-row { display: flex; justify-content: space-between; align-items: flex-end; margin-top: 48px; font-size: 13px; }
  .inv-sig-block { text-align: center; }
  .inv-sig-line { border-top: 1px solid #333; width: 160px; margin: 0 auto 4px; padding-top: 6px; }
  .inv-bottom-bar { height: 5px; background: linear-gradient(90deg, #1a5276, #2e86c1, #1a5276); margin-top: 22px; }

  @media print {
    @page { size: A4; margin: 12mm 12mm; }
    body > *:not(.print-area) { display: none !important; }
    .print-area { display: block; }
    .invoice-preview {
      box-shadow: none; border: none; padding: 0; max-width: 100%;
    }
    .inv-top-bar, .inv-bottom-bar { -webkit-print-color-adjust: exact; print-color-adjust: exact; }
    .inv-table thead tr { -webkit-print-color-adjust: exact; print-color-adjust: exact; background: #1a5276 !important; color: white !important; }
    .inv-table tbody tr:nth-child(even) { -webkit-print-color-adjust: exact; print-color-adjust: exact; background: #f4f8fb !important; }
    .inv-sum-row.grand { -webkit-print-color-adjust: exact; print-color-adjust: exact; background: #1a5276 !important; color: white !important; }
    .inv-words-box { -webkit-print-color-adjust: exact; print-color-adjust: exact; }
  }

  .print-note { font-size: 12px; color: #888; margin-top: 8px; padding: 6px 10px; background: #fffbe6; border: 1px dashed #f0c040; border-radius: 6px; }
  .badge { padding: 3px 10px; border-radius: 20px; font-size: 12px; }
  .badge-blue { background: #d6eaf8; color: #1a5276; }
  .empty-state { text-align: center; padding: 40px; color: #999; font-size: 16px; }
  .del-btn { color: #c0392b; cursor: pointer; font-size: 18px; background: none; border: none; }
  .alert { padding: 12px 16px; border-radius: 8px; margin-bottom: 16px; font-size: 14px; }
  .alert-success { background: #d5f5e3; color: #1e8449; border: 1px solid #82e0aa; }
  .alert-error { background: #fadbd8; color: #c0392b; border: 1px solid #f1948a; }
</style>
</head>
<body>

<!-- NAVBAR -->
<div class="navbar">
  <div class="nav-top">
    <div class="nav-brand">মেসার্স সাহা ট্রেডার্স <small>প্রোঃ ইন্দ্রজিৎ সাহা | মিলরোড, সেতাবগঞ্জ, দিনাজপুর</small></div>
  </div>
  <div class="nav-tabs">
    <div class="nav-tab active" onclick="showPage('invoice')">🧾 ইনভয়েস</div>
    <div class="nav-tab" onclick="showPage('people')">👥 ব্যক্তি</div>
    <div class="nav-tab" onclick="showPage('items')">📦 আইটেম</div>
    <div class="nav-tab" onclick="showPage('history')">📋 ইতিহাস</div>
  </div>
</div>

<!-- ======================== INVOICE PAGE ======================== -->
<div class="page active" id="page-invoice">
  <div class="card">
    <div class="card-header"><h3>🧾 নতুন চালান তৈরি করুন</h3></div>
    <div class="card-body">
      <div id="inv-alert"></div>

      <!-- Customer & Date -->
      <div class="form-row">
        <div class="form-group">
          <label>তারিখ</label>
          <input type="date" class="form-control" id="inv-date" style="font-family:Arial,sans-serif">
        </div>
        <div class="form-group">
          <label>গ্রাহকের নাম</label>
          <select class="form-control" id="inv-person" onchange="fillPersonInfo()">
            <option value="">-- গ্রাহক বেছে নিন --</option>
          </select>
        </div>
        <div class="form-group">
          <label>ঠিকানা</label>
          <input type="text" class="form-control" id="inv-address" readonly style="background:#f8f9fa">
        </div>
        <div class="form-group">
          <label>মোবাইল</label>
          <input type="text" class="form-control" id="inv-mobile" readonly style="background:#f8f9fa">
        </div>
      </div>

      <!-- Items Table -->
      <h4 style="color:#1a5276;margin:16px 0 10px">পণ্যের তালিকা</h4>
      <div style="overflow-x:auto">
        <table class="invoice-items-table">
          <thead>
            <tr>
              <th width="35%">আইটেম</th>
              <th width="18%">পরিমাণ</th>
              <th width="18%">দর (টাকা)</th>
              <th width="20%">মোট</th>
              <th width="9%"></th>
            </tr>
          </thead>
          <tbody id="inv-items-body"></tbody>
        </table>
      </div>
      <button class="btn btn-success" style="margin-top:10px" onclick="addInvRow()">+ আরো আইটেম যোগ করুন</button>

      <!-- Summary -->
      <div class="summary-box" style="margin-top:20px">
        <div class="summary-row">
          <span>এই মোট</span>
          <span id="s-subtotal">৳ ০</span>
        </div>
        <div class="summary-row">
          <span>পূর্বের জের</span>
          <input type="text" inputmode="decimal" id="s-prev" value="0"
            style="width:160px;padding:6px 10px;border:2px solid #2e86c1;border-radius:6px;font-family:inherit;font-size:16px;text-align:right"
            oninput="calcSummary()">
        </div>
        <div class="summary-row grand">
          <span>জের মোট</span>
          <span id="s-total">৳ ০</span>
        </div>
        <div class="taka-words" id="s-words">কথায়ঃ শূন্য টাকা মাত্র।</div>
      </div>

      <!-- Driver Info -->
      <h4 style="color:#1a5276;margin:20px 0 10px">ড্রাইভারের তথ্য</h4>
      <div class="form-row">
        <div class="form-group">
          <label>ড্রাইভারের নাম</label>
          <input type="text" class="form-control" id="inv-driver" placeholder="ড্রাইভারের নাম">
        </div>
        <div class="form-group">
          <label>গাড়ীর নম্বর</label>
          <input type="text" class="form-control" id="inv-vehicle" placeholder="যেমনঃ ঢাকা মেট্রো ট ১৫-৬৭৭২">
        </div>
        <div class="form-group">
          <label>ড্রাইভার মোবাইল</label>
          <input type="text" class="form-control" id="inv-dmobile" placeholder="মোবাইল নম্বর">
        </div>
      </div>

      <div style="display:flex;gap:12px;margin-top:8px;flex-wrap:wrap">
        <button class="btn btn-primary" onclick="saveInvoice()">💾 সংরক্ষণ করুন</button>
        <button class="btn btn-success" onclick="previewCurrentInvoice()">👁️ প্রিভিউ</button>
        <button class="btn btn-info" onclick="printInvoice()">🖨️ প্রিন্ট / PDF</button>
        <button class="btn" style="background:#eee" onclick="resetInvoice()">🔄 নতুন করুন</button>
      </div>
      <div class="print-note">@Mps Mukul Roy</div>
    </div>
  </div>
</div>

<!-- ======================== PEOPLE PAGE ======================== -->
<div class="page" id="page-people">
  <div class="card">
    <div class="card-header">
      <h3>👥 ব্যক্তির তালিকা</h3>
      <button class="btn btn-success btn-sm" onclick="openPeopleModal()">+ নতুন যোগ করুন</button>
    </div>
    <div class="card-body" style="padding:0">
      <div id="people-alert" style="padding:16px 20px"></div>
      <table>
        <thead><tr><th>#</th><th>নাম</th><th>ঠিকানা</th><th>মোবাইল</th><th>অ্যাকশন</th></tr></thead>
        <tbody id="people-table-body">
          <tr><td colspan="5" class="empty-state">লোড হচ্ছে...</td></tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- ======================== ITEMS PAGE ======================== -->
<div class="page" id="page-items">
  <div class="card">
    <div class="card-header">
      <h3>📦 আইটেমের তালিকা</h3>
      <button class="btn btn-success btn-sm" onclick="openItemsModal()">+ নতুন যোগ করুন</button>
    </div>
    <div class="card-body" style="padding:0">
      <div id="items-alert" style="padding:16px 20px"></div>
      <table>
        <thead><tr><th>#</th><th>আইটেমের নাম</th><th>একক</th><th>ডিফল্ট দর</th><th>অ্যাকশন</th></tr></thead>
        <tbody id="items-table-body">
          <tr><td colspan="5" class="empty-state">লোড হচ্ছে...</td></tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- ======================== HISTORY PAGE ======================== -->
<div class="page" id="page-history">
  <div class="card">
    <div class="card-header"><h3>📋 চালানের ইতিহাস</h3></div>
    <div class="card-body" style="padding:0">
      <table>
        <thead><tr><th>#</th><th>তারিখ</th><th>গ্রাহক</th><th>এই মোট</th><th>জের মোট</th><th>অ্যাকশন</th></tr></thead>
        <tbody id="history-table-body">
          <tr><td colspan="6" class="empty-state">লোড হচ্ছে...</td></tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- ======================== MODALS ======================== -->
<!-- People Modal -->
<div class="modal-overlay" id="people-modal">
  <div class="modal">
    <h3 id="people-modal-title">নতুন ব্যক্তি যোগ করুন</h3>
    <input type="hidden" id="pm-id">
    <div class="form-group"><label>নাম *</label><input type="text" class="form-control" id="pm-name" placeholder="পুরো নাম / প্রতিষ্ঠানের নাম"></div>
    <div class="form-group"><label>ঠিকানা</label><input type="text" class="form-control" id="pm-address" placeholder="ঠিকানা"></div>
    <div class="form-group"><label>মোবাইল</label><input type="text" class="form-control" id="pm-mobile" placeholder="মোবাইল নম্বর"></div>
    <div style="display:flex;gap:10px;justify-content:flex-end;margin-top:8px">
      <button class="btn" style="background:#eee" onclick="closeModal('people-modal')">বাতিল</button>
      <button class="btn btn-primary" onclick="savePerson()">সংরক্ষণ করুন</button>
    </div>
  </div>
</div>

<!-- Items Modal -->
<div class="modal-overlay" id="items-modal">
  <div class="modal">
    <h3 id="items-modal-title">নতুন আইটেম যোগ করুন</h3>
    <input type="hidden" id="im-id">
    <div class="form-group"><label>আইটেমের নাম *</label><input type="text" class="form-control" id="im-name" placeholder="আইটেমের নাম"></div>
    <div class="form-group"><label>একক</label><input type="text" class="form-control" id="im-unit" placeholder="যেমনঃ বস্তা, কেজি, পিস"></div>
    <div class="form-group"><label>ডিফল্ট দর (টাকা)</label><input type="number" class="form-control" id="im-rate" placeholder="0" min="0"></div>
    <div style="display:flex;gap:10px;justify-content:flex-end;margin-top:8px">
      <button class="btn" style="background:#eee" onclick="closeModal('items-modal')">বাতিল</button>
      <button class="btn btn-primary" onclick="saveItem()">সংরক্ষণ করুন</button>
    </div>
  </div>
</div>

<!-- View Invoice Modal -->
<div class="modal-overlay" id="view-modal">
  <div class="modal" style="max-width:780px;padding:20px">
    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:14px">
      <h3 style="margin:0">চালান প্রিভিউ</h3>
      <div style="display:flex;gap:8px">
        <button class="btn btn-info" onclick="printViewedInvoice()">🖨️ প্রিন্ট / PDF</button>
        <button class="btn" style="background:#eee" onclick="closeModal('view-modal')">✕ বন্ধ</button>
      </div>
    </div>
    <div id="view-content" style="max-height:78vh;overflow-y:auto"></div>
  </div>
</div>

<!-- PRINT AREA -->
<div class="print-area" id="print-area"></div>

<script>
// ── CONFIG ──
const API = 'api/';
let allPeople = [], allItems = [], invRowCount = 0;
let currentPrintData = null;

// ── PAGE NAV ──
function showPage(name) {
  document.querySelectorAll('.page').forEach(p => p.classList.remove('active'));
  document.querySelectorAll('.nav-tab').forEach(t => t.classList.remove('active'));
  document.getElementById('page-' + name).classList.add('active');
  event.target.classList.add('active');
  if (name === 'people') loadPeople();
  if (name === 'items') loadItems();
  if (name === 'history') loadHistory();
}

// ── MODAL ──
function closeModal(id) { document.getElementById(id).classList.remove('open'); }
function openModal(id) { document.getElementById(id).classList.add('open'); }

// ── ALERT ──
function showAlert(elId, msg, type='success') {
  const el = document.getElementById(elId);
  el.innerHTML = `<div class="alert alert-${type}">${msg}</div>`;
  setTimeout(() => el.innerHTML = '', 3000);
}

// ── NUMBER TO BENGALI WORDS ──
function numToWords(n) {
  n = Math.round(n);
  if (n === 0) return 'শূন্য টাকা মাত্র।';
  const ones = ['','এক','দুই','তিন','চার','পাঁচ','ছয়','সাত','আট','নয়','দশ',
    'এগারো','বারো','তেরো','চৌদ্দ','পনেরো','ষোলো','সতেরো','আঠারো','উনিশ','বিশ',
    'একুশ','বাইশ','তেইশ','চব্বিশ','পঁচিশ','ছাব্বিশ','সাতাশ','আটাশ','উনত্রিশ','ত্রিশ',
    'একত্রিশ','বত্রিশ','তেত্রিশ','চৌত্রিশ','পঁয়ত্রিশ','ছত্রিশ','সাতত্রিশ','আটত্রিশ','উনচল্লিশ','চল্লিশ',
    'একচল্লিশ','বিয়াল্লিশ','তেতাল্লিশ','চৌচল্লিশ','পঁয়তাল্লিশ','ছেচল্লিশ','সাতচল্লিশ','আটচল্লিশ','উনপঞ্চাশ','পঞ্চাশ',
    'একান্ন','বায়ান্ন','তিপান্ন','চুয়ান্ন','পঞ্চান্ন','ছাপান্ন','সাতান্ন','আটান্ন','উনষাট','ষাট',
    'একষট্টি','বাষট্টি','তেষট্টি','চৌষট্টি','পঁয়ষট্টি','ছেষট্টি','সাতষট্টি','আটষট্টি','উনসত্তর','সত্তর',
    'একাত্তর','বাহাত্তর','তিয়াত্তর','চুয়াত্তর','পঁচাত্তর','ছিয়াত্তর','সাতাত্তর','আটাত্তর','উনআশি','আশি',
    'একাশি','বিরাশি','তিরাশি','চুরাশি','পঁচাশি','ছিয়াশি','সাতাশি','আটাশি','উননব্বই','নব্বই',
    'একানব্বই','বিরানব্বই','তিরানব্বই','চুরানব্বই','পঁচানব্বই','ছিয়ানব্বই','সাতানব্বই','আটানব্বই','উননশত','নিরানব্বই'];
  
  let result = '';
  const cr = Math.floor(n / 10000000); n %= 10000000;
  const lakh = Math.floor(n / 100000); n %= 100000;
  const hazar = Math.floor(n / 1000); n %= 1000;
  const shot = Math.floor(n / 100); n %= 100;
  
  if (cr) result += ones[cr] + ' কোটি ';
  if (lakh) result += ones[lakh] + ' লক্ষ ';
  if (hazar) result += ones[hazar] + ' হাজার ';
  if (shot) result += ones[shot] + ' শত ';
  if (n) result += ones[n] + ' ';
  return 'কথায়ঃ ' + result.trim() + ' টাকা মাত্র।';
}

// ── BENGALI DIGITS ──
function toBn(n) {
  return String(n).replace(/[0-9]/g, d => '০১২৩৪৫৬৭৮৯'[d]);
}
function fmtBn(n) {
  const formatted = Number(n).toLocaleString('en-IN');
  return toBn(formatted);
}
// ── PARSE NUMBER (handles both Bengali and English digits) ──
function parseNum(s) {
  if (!s && s !== 0) return 0;
  const normalized = String(s).replace(/[০-৯]/g, d => '০১২৩৪৫৬৭৮৯'.indexOf(d).toString());
  return parseFloat(normalized) || 0;
}
// ── FORMAT ──
function fmt(n) { return '৳ ' + fmtBn(n); }

// ── PEOPLE API ──
async function loadPeople() {
  const res = await fetch(API + 'people.php');
  allPeople = await res.json();
  renderPeopleTable();
  populatePeopleDropdown();
}

function renderPeopleTable() {
  const tbody = document.getElementById('people-table-body');
  if (!allPeople.length) { tbody.innerHTML = '<tr><td colspan="5" class="empty-state">কোনো তথ্য নেই</td></tr>'; return; }
  tbody.innerHTML = allPeople.map((p, i) => `
    <tr>
      <td>${toBn(i+1)}</td>
      <td><strong>${p.name}</strong></td>
      <td>${p.address || '-'}</td>
      <td>${p.mobile || '-'}</td>
      <td>
        <button class="btn btn-warning btn-sm" onclick="editPerson(${p.id})">✏️ এডিট</button>
        <button class="btn btn-danger btn-sm" onclick="deletePerson(${p.id})" style="margin-left:6px">🗑️ ডিলিট</button>
      </td>
    </tr>`).join('');
}

function populatePeopleDropdown() {
  const sel = document.getElementById('inv-person');
  const cur = sel.value;
  sel.innerHTML = '<option value="">-- গ্রাহক বেছে নিন --</option>';
  allPeople.forEach(p => sel.innerHTML += `<option value="${p.id}" data-address="${p.address||''}" data-mobile="${p.mobile||''}">${p.name}</option>`);
  if (cur) sel.value = cur;
}

function fillPersonInfo() {
  const sel = document.getElementById('inv-person');
  const opt = sel.selectedOptions[0];
  document.getElementById('inv-address').value = opt?.dataset.address || '';
  document.getElementById('inv-mobile').value = opt?.dataset.mobile || '';
}

function openPeopleModal(data = null) {
  document.getElementById('people-modal-title').textContent = data ? 'ব্যক্তির তথ্য এডিট করুন' : 'নতুন ব্যক্তি যোগ করুন';
  document.getElementById('pm-id').value = data?.id || '';
  document.getElementById('pm-name').value = data?.name || '';
  document.getElementById('pm-address').value = data?.address || '';
  document.getElementById('pm-mobile').value = data?.mobile || '';
  openModal('people-modal');
}

async function editPerson(id) {
  const p = allPeople.find(x => x.id == id);
  openPeopleModal(p);
}

async function savePerson() {
  const id = document.getElementById('pm-id').value;
  const body = {
    id: id || undefined,
    name: document.getElementById('pm-name').value.trim(),
    address: document.getElementById('pm-address').value.trim(),
    mobile: document.getElementById('pm-mobile').value.trim()
  };
  if (!body.name) { alert('নাম আবশ্যক!'); return; }
  const method = id ? 'PUT' : 'POST';
  await fetch(API + 'people.php', { method, headers: {'Content-Type':'application/json'}, body: JSON.stringify(body) });
  closeModal('people-modal');
  await loadPeople();
  showAlert('people-alert', id ? 'তথ্য আপডেট হয়েছে ✅' : 'নতুন ব্যক্তি যোগ হয়েছে ✅');
}

async function deletePerson(id) {
  if (!confirm('সত্যিই ডিলিট করবেন?')) return;
  await fetch(API + 'people.php?id=' + id, { method: 'DELETE' });
  await loadPeople();
  showAlert('people-alert', 'ডিলিট সম্পন্ন ✅');
}

// ── ITEMS API ──
async function loadItems() {
  const res = await fetch(API + 'items.php');
  allItems = await res.json();
  renderItemsTable();
}

function renderItemsTable() {
  const tbody = document.getElementById('items-table-body');
  if (!allItems.length) { tbody.innerHTML = '<tr><td colspan="5" class="empty-state">কোনো তথ্য নেই</td></tr>'; return; }
  tbody.innerHTML = allItems.map((it, i) => `
    <tr>
      <td>${toBn(i+1)}</td>
      <td><strong>${it.name}</strong></td>
      <td><span class="badge badge-blue">${it.unit || '-'}</span></td>
      <td>৳ ${fmtBn(it.default_rate)}</td>
      <td>
        <button class="btn btn-warning btn-sm" onclick="editItem(${it.id})">✏️ এডিট</button>
        <button class="btn btn-danger btn-sm" onclick="deleteItem(${it.id})" style="margin-left:6px">🗑️ ডিলিট</button>
      </td>
    </tr>`).join('');
}

function openItemsModal(data = null) {
  document.getElementById('items-modal-title').textContent = data ? 'আইটেম এডিট করুন' : 'নতুন আইটেম যোগ করুন';
  document.getElementById('im-id').value = data?.id || '';
  document.getElementById('im-name').value = data?.name || '';
  document.getElementById('im-unit').value = data?.unit || 'বস্তা';
  document.getElementById('im-rate').value = data?.default_rate || '';
  openModal('items-modal');
}

function editItem(id) {
  const it = allItems.find(x => x.id == id);
  openItemsModal(it);
}

async function saveItem() {
  const id = document.getElementById('im-id').value;
  const body = {
    id: id || undefined,
    name: document.getElementById('im-name').value.trim(),
    unit: document.getElementById('im-unit').value.trim(),
    default_rate: parseFloat(document.getElementById('im-rate').value) || 0
  };
  if (!body.name) { alert('নাম আবশ্যক!'); return; }
  const method = id ? 'PUT' : 'POST';
  await fetch(API + 'items.php', { method, headers: {'Content-Type':'application/json'}, body: JSON.stringify(body) });
  closeModal('items-modal');
  await loadItems();
  showAlert('items-alert', id ? 'তথ্য আপডেট হয়েছে ✅' : 'নতুন আইটেম যোগ হয়েছে ✅');
}

async function deleteItem(id) {
  if (!confirm('সত্যিই ডিলিট করবেন?')) return;
  await fetch(API + 'items.php?id=' + id, { method: 'DELETE' });
  await loadItems();
  showAlert('items-alert', 'ডিলিট সম্পন্ন ✅');
}

// ── INVOICE ROWS ──
function addInvRow() {
  const tbody = document.getElementById('inv-items-body');
  const id = ++invRowCount;
  const opts = allItems.map(it => `<option value="${it.id}" data-rate="${it.default_rate}">${it.name}</option>`).join('');
  tbody.innerHTML += `
    <tr id="irow-${id}">
      <td>
        <select onchange="fillItemRate(this, ${id})">
          <option value="">-- আইটেম বেছে নিন --</option>
          ${opts}
        </select>
      </td>
      <td><input type="text" inputmode="decimal" id="iqty-${id}" placeholder="পরিমাণ" oninput="calcRow(${id})" style="font-family:inherit"></td>
      <td><input type="text" inputmode="decimal" id="irate-${id}" placeholder="দর" oninput="calcRow(${id})" style="font-family:inherit"></td>
      <td><input type="text" id="itotal-${id}" readonly style="background:#f8f9fa;font-weight:bold;color:#1a5276"></td>
      <td><button class="del-btn" onclick="removeRow(${id})">✕</button></td>
    </tr>`;
}

function fillItemRate(sel, id) {
  const opt = sel.selectedOptions[0];
  if (opt && opt.dataset.rate) {
    document.getElementById('irate-' + id).value = opt.dataset.rate;
    calcRow(id);
  }
}

function calcRow(id) {
  const qty = parseNum(document.getElementById('iqty-' + id)?.value);
  const rate = parseNum(document.getElementById('irate-' + id)?.value);
  const total = qty * rate;
  document.getElementById('itotal-' + id).value = total ? '৳ ' + fmtBn(total) : '';
  calcSummary();
}

function removeRow(id) {
  document.getElementById('irow-' + id)?.remove();
  calcSummary();
}

function calcSummary() {
  let subtotal = 0;
  document.querySelectorAll('#inv-items-body tr').forEach(row => {
    const id = row.id.replace('irow-', '');
    const qty = parseNum(document.getElementById('iqty-' + id)?.value);
    const rate = parseNum(document.getElementById('irate-' + id)?.value);
    subtotal += qty * rate;
  });
  const prev = parseNum(document.getElementById('s-prev').value);
  const total = subtotal + prev;
  document.getElementById('s-subtotal').textContent = fmt(subtotal);
  document.getElementById('s-total').textContent = fmt(total);
  document.getElementById('s-words').textContent = numToWords(total);
}

function collectInvoiceItems() {
  const rows = [];
  document.querySelectorAll('#inv-items-body tr').forEach(row => {
    const id = row.id.replace('irow-', '');
    const sel = row.querySelector('select');
    const qty = parseNum(document.getElementById('iqty-' + id)?.value);
    const rate = parseNum(document.getElementById('irate-' + id)?.value);
    if (qty && rate) {
      rows.push({
        item_id: sel?.value || null,
        item_name: sel?.selectedOptions[0]?.text || '',
        quantity: qty,
        rate: rate,
        total: qty * rate
      });
    }
  });
  return rows;
}

async function saveInvoice() {
  const personId = document.getElementById('inv-person').value;
  const date = document.getElementById('inv-date').value;
  if (!personId || !date) { alert('তারিখ ও গ্রাহক আবশ্যক!'); return; }
  const items = collectInvoiceItems();
  if (!items.length) { alert('কমপক্ষে একটি আইটেম যোগ করুন!'); return; }
  const subtotal = items.reduce((s, x) => s + x.total, 0);
  const prev = parseNum(document.getElementById('s-prev').value);
  const body = {
    person_id: personId,
    invoice_date: date,
    subtotal,
    previous_balance: prev,
    total_due: subtotal + prev,
    driver_name: document.getElementById('inv-driver').value,
    vehicle_number: document.getElementById('inv-vehicle').value,
    driver_mobile: document.getElementById('inv-dmobile').value,
    items
  };
  const res = await fetch(API + 'invoices.php', { method: 'POST', headers: {'Content-Type':'application/json'}, body: JSON.stringify(body) });
  const data = await res.json();
  if (data.success) {
    showAlert('inv-alert', 'চালান সংরক্ষিত হয়েছে ✅ (নং: ' + data.id + ')');
    buildPrintData();
  }
}

function resetInvoice() {
  document.getElementById('inv-person').value = '';
  document.getElementById('inv-address').value = '';
  document.getElementById('inv-mobile').value = '';
  document.getElementById('inv-date').value = '';
  document.getElementById('inv-driver').value = '';
  document.getElementById('inv-vehicle').value = '';
  document.getElementById('inv-dmobile').value = '';
  document.getElementById('s-prev').value = 0;
  document.getElementById('inv-items-body').innerHTML = '';
  invRowCount = 0;
  calcSummary();
}

// ── HISTORY ──
async function loadHistory() {
  const res = await fetch(API + 'invoices.php');
  const rows = await res.json();
  const tbody = document.getElementById('history-table-body');
  if (!rows.length) { tbody.innerHTML = '<tr><td colspan="6" class="empty-state">কোনো চালান নেই</td></tr>'; return; }
  tbody.innerHTML = rows.map((r, i) => `
    <tr>
      <td>${toBn(i+1)}</td>
      <td style="font-family:Arial,sans-serif">${r.invoice_date}</td>
      <td><strong>${r.person_name || '-'}</strong></td>
      <td>${fmt(r.subtotal)}</td>
      <td><strong style="color:#1a5276">${fmt(r.total_due)}</strong></td>
      <td>
        <button class="btn btn-info btn-sm" onclick="viewInvoice(${r.id})">👁️ দেখুন</button>
        <button class="btn btn-danger btn-sm" onclick="deleteInvoice(${r.id})" style="margin-left:6px">🗑️</button>
      </td>
    </tr>`).join('');
}

async function deleteInvoice(id) {
  if (!confirm('সত্যিই ডিলিট করবেন?')) return;
  await fetch(API + 'invoices.php?id=' + id, { method: 'DELETE' });
  loadHistory();
}

async function viewInvoice(id) {
  const res = await fetch(API + 'invoices.php?id=' + id);
  const inv = await res.json();
  currentPrintData = inv;
  document.getElementById('view-content').innerHTML = buildInvoiceHTML(inv);
  openModal('view-modal');
}

// ── PRINT / INVOICE HTML BUILDER ──
function buildPrintData() {
  const personSel = document.getElementById('inv-person');
  const personName = personSel.selectedOptions[0]?.text || '';
  const address = document.getElementById('inv-address').value;
  const mobile = document.getElementById('inv-mobile').value;
  const date = document.getElementById('inv-date').value;
  const items = collectInvoiceItems();
  const subtotal = items.reduce((s, x) => s + x.total, 0);
  const prev = parseNum(document.getElementById('s-prev').value);
  const total = subtotal + prev;
  currentPrintData = {
    invoice_date: date, person_name: personName, address, mobile,
    items, subtotal, previous_balance: prev, total_due: total,
    driver_name: document.getElementById('inv-driver').value,
    vehicle_number: document.getElementById('inv-vehicle').value,
    driver_mobile: document.getElementById('inv-dmobile').value
  };
  return currentPrintData;
}

function buildInvoiceHTML(inv) {
  const tk = n => '৳\u00a0' + fmtBn(n) + '/-';
  // Show qty/rate as stored (user's own digits), total always Bengali
  const dispNum = v => toBn(String(v)); // convert all digits to Bengali
  const rows = (inv.items || []).map((it, i) => `
    <tr>
      <td>${toBn(i+1)}</td>
      <td style="text-align:left">${it.item_name}</td>
      <td>${dispNum(it.quantity)}</td>
      <td>${tk(it.rate)}</td>
      <td style="font-weight:bold">${tk(it.total)}</td>
    </tr>`).join('');

  const driverHTML = (inv.driver_name || inv.vehicle_number || inv.driver_mobile) ? `
    <div class="inv-driver-box">
      ${inv.driver_name ? `<span><strong>ড্রাইভার নামঃ</strong> ${inv.driver_name}</span>` : ''}
      ${inv.vehicle_number ? `<span><strong>গাড়ীর নম্বরঃ</strong> ${inv.vehicle_number}</span>` : ''}
      ${inv.driver_mobile ? `<span><strong>মোবাইলঃ</strong> ${inv.driver_mobile}</span>` : ''}
    </div>` : '';

  return `
  <div class="invoice-preview">
    <div class="inv-top-bar"></div>

    <div class="inv-shop-name">মেসার্স সাহা ট্রেডার্স</div>
    <div class="inv-prop">প্রোপ্রাইটরঃ ইন্দ্রজিৎ সাহা</div>
    <div class="inv-tagline">এখানে সর্ব প্রকার মনোহারী দ্রব্য পাইকারী ও খুচরা বিক্রয় করা হয়</div>
    <div class="inv-address">মিলরোড, সেতাবগঞ্জ, দিনাজপুর</div>
    <div class="inv-address">মোবাইলঃ ০১৭২০-৪৩৬২৮৫</div>

    <hr class="inv-divider">
    <div class="inv-challan-title">চালান</div>

    <div class="inv-meta-row">
      <div class="inv-meta-left">
        <p><span class="inv-label">নামঃ </span><span class="inv-value">${inv.person_name || '-'}</span></p>
        <p><span class="inv-label">ঠিকানাঃ </span><span class="inv-value">${inv.address || '-'}</span></p>
        <p><span class="inv-label">মোবাইলঃ </span><span class="inv-value">${inv.mobile || '-'}</span></p>
      </div>
      <div class="inv-meta-right">
        <p><span class="inv-label">তারিখঃ </span><span class="inv-value" style="font-family:Arial,sans-serif">${inv.invoice_date || '-'}</span></p>
      </div>
    </div>

    <table class="inv-table">
      <thead>
        <tr>
          <th style="width:6%">ক্রঃ</th>
          <th style="width:44%;text-align:left">বিবরণ</th>
          <th style="width:14%">পরিমাণ</th>
          <th style="width:16%">দর</th>
          <th style="width:20%">মোট</th>
        </tr>
      </thead>
      <tbody>${rows}</tbody>
    </table>

    <div class="inv-summary-wrap">
      <div class="inv-summary-box">
        <div class="inv-sum-row">
          <span>এই মোটঃ</span><span>${tk(inv.subtotal)}</span>
        </div>
        <div class="inv-sum-row">
          <span>পূর্বের জেরঃ</span><span>${tk(inv.previous_balance)}</span>
        </div>
        <div class="inv-sum-row grand">
          <span>জের মোটঃ</span><span>${tk(inv.total_due)}</span>
        </div>
      </div>
    </div>

    <div class="inv-words-box">${numToWords(inv.total_due)}</div>

    ${driverHTML}

    <div class="inv-signature-row">
      <div></div>
      <div class="inv-sig-block">
        <div class="inv-sig-line">প্রদানকারীর স্বাক্ষর</div>
      </div>
    </div>

    <div class="inv-bottom-bar"></div>
  </div>`;
}

function previewCurrentInvoice() {
  buildPrintData();
  document.getElementById('view-content').innerHTML = buildInvoiceHTML(currentPrintData);
  openModal('view-modal');
}

function printInvoice() {
  buildPrintData();
  document.getElementById('print-area').innerHTML = buildInvoiceHTML(currentPrintData);
  closeModal('view-modal');
  setTimeout(() => window.print(), 100);
}

function printViewedInvoice() {
  if (currentPrintData) {
    document.getElementById('print-area').innerHTML = buildInvoiceHTML(currentPrintData);
    closeModal('view-modal');
    setTimeout(() => window.print(), 100);
  }
}

// ── INIT ──
async function init() {
  const today = new Date().toISOString().split('T')[0];
  document.getElementById('inv-date').value = today;
  await loadPeople();
  const itemsRes = await fetch(API + 'items.php');
  allItems = await itemsRes.json();
  addInvRow();
}
init();
</script>
</body>
</html>