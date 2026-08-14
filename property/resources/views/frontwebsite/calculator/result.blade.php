@extends('layouts.masterindexNew')

@php
    $fmt = function ($n) {
        if ($n === null) return null;
        return 'Rs ' . number_format($n);
    };

    $rows = [
        'Verification Fee' => 'verification_fee',
        'FBR Advance Tax' => 'fbr_tax',
        'Stamp Duty' => 'stamp_duty',
        'Registration Fee' => 'registration',
        'e-Stamp Fee' => 'estamp',
        'CVT (if applicable)' => 'cvt',
        'DHA Transfer Fee' => 'dha_transfer',
        'Membership Fee' => 'membership',
        'TIP / Cantonment Charges' => 'tip_tax',
        'Biana Fee' => 'biana_fee',
        'Online Payment Surcharge' => 'online_surcharge',
        'Miscellaneous Charges' => 'misc',
    ];

    $breakdown = $summary['breakdown'];
@endphp

@section('body')
<div class="main home ab-home" id="main">

    <section class="ab-block ab-result-sec" style="padding-top:40px">
        <div class="ab-wrap">

            <div class="ab-result-actions">
                <a href="{{ route('property-transfer-calculator.index') }}" class="ab-btn ab-btn-ghost">&larr; Back to Calculator</a>
                <div class="ab-result-actions-right">
                    <button type="button" class="ab-btn ab-btn-ghost" id="btn-download-jpg">&#128247; Download JPG</button>
                    <button type="button" class="ab-btn ab-btn-primary" id="btn-download-pdf">&#128196; Download PDF</button>
                </div>
            </div>

            <div id="ab-result-card">
                <div class="ab-result-date">Generated: {{ $summary['generated_at'] }}</div>

                <div class="ab-result-block">
                    <div class="ab-result-hd">&#127968; Property Summary</div>
                    <div class="ab-result-body">
                        <p>{{ $summary['location_line'] }}</p>
                        <p>{{ $summary['property_line'] }}</p>
                        <p>{{ $summary['transfer_line'] }}</p>
                    </div>
                </div>

                <div class="ab-result-block">
                    <div class="ab-result-hd">&#128176; FBR &amp; DC Values</div>
                    <div class="ab-result-body ab-result-values">
                        <div>
                            <div class="ab-result-vlabel">FBR Value (Property Value)</div>
                            <div class="ab-result-vamt">{{ $fmt($summary['fbr_value']) }}</div>
                        </div>
                        @if($summary['dc_value'])
                            <div>
                                <div class="ab-result-vlabel">DC Value</div>
                                <div class="ab-result-vamt">{{ $fmt($summary['dc_value']) }}</div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="ab-result-block">
                    <div class="ab-result-hd">&#128203; Expense Breakdown</div>
                    <div class="ab-result-body">
                        @foreach($rows as $label => $key)
                            @continue($breakdown[$key] === null)
                            <div class="ab-result-row">
                                <span>{{ $label }}</span>
                                <b>{{ $fmt($breakdown[$key]) }}</b>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="ab-result-total">
                    <span>Grand Total</span>
                    <b>{{ $fmt($breakdown['total']) }}/-</b>
                </div>

                <p class="ab-result-note">This calculator provides estimated transfer costs based on the latest available DHA and government tax rules. Actual payable charges may vary depending on official valuation, Finance Act updates, and DHA policy.</p>
            </div>
        </div>
    </section>
</div>

<style>
.ab-result-sec .ab-wrap{max-width:820px}
.ab-result-actions{display:flex;align-items:center;justify-content:space-between;gap:12px;margin-bottom:18px;flex-wrap:wrap}
.ab-result-actions-right{display:flex;gap:10px}
#ab-result-card{background:var(--ab-white);border:1px solid var(--ab-line);border-radius:14px;box-shadow:0 10px 28px rgba(0,0,0,.06);padding:22px 26px}
.ab-result-date{text-align:right;font-size:12px;color:var(--ab-muted);margin-bottom:14px}
.ab-result-block{margin-bottom:16px}
.ab-result-hd{display:inline-flex;align-items:center;gap:8px;background:var(--ab-ink);color:#fff;font-size:14px;font-weight:700;padding:9px 16px;border-radius:8px;margin-bottom:12px}
.ab-result-body p{margin:0 0 4px;font-size:13px;color:var(--ab-ink)}
.ab-result-body p:last-child{margin-bottom:0}
.ab-result-values{display:flex;gap:48px;flex-wrap:wrap}
.ab-result-vlabel{font-size:12px;color:var(--ab-muted);margin-bottom:4px}
.ab-result-vamt{font-size:18px;font-weight:700;color:var(--ab-ink)}
.ab-result-row{display:flex;justify-content:space-between;gap:12px;padding:9px 0;font-size:13.5px;color:var(--ab-ink);border-bottom:1px dashed var(--ab-line)}
.ab-result-row:last-child{border-bottom:none}
.ab-result-row b{font-weight:700}
.ab-result-total{display:flex;align-items:center;justify-content:flex-end;gap:10px;background:linear-gradient(90deg,var(--ab-orange-100),var(--ab-orange-50));border:1px solid var(--ab-orange-100);border-radius:10px;padding:14px 18px;margin-top:6px;font-size:14px;color:var(--ab-orange-dark)}
.ab-result-total b{font-size:19px}
.ab-result-note{font-size:11px;color:var(--ab-muted);margin-top:14px}
@media(max-width:600px){
  .ab-result-actions{flex-direction:column;align-items:stretch}
  .ab-result-actions-right{justify-content:stretch}
  .ab-result-actions-right .ab-btn{flex:1}
  #ab-result-card{padding:16px}
  .ab-result-values{gap:24px}
}
</style>

<script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jspdf@2.5.1/dist/jspdf.umd.min.js"></script>
<script>
(function () {
    'use strict';

    var card = document.getElementById('ab-result-card');

    function renderCanvas() {
        return html2canvas(card, { backgroundColor: '#ffffff', scale: 2 });
    }

    var jpgBtn = document.getElementById('btn-download-jpg');
    if (jpgBtn) jpgBtn.addEventListener('click', function () {
        jpgBtn.disabled = true;
        renderCanvas().then(function (canvas) {
            var link = document.createElement('a');
            link.download = 'DHA-Expense-{{ now()->format("Y-m-d") }}.jpg';
            link.href = canvas.toDataURL('image/jpeg', 0.95);
            link.click();
        }).finally(function () { jpgBtn.disabled = false; });
    });

    var pdfBtn = document.getElementById('btn-download-pdf');
    if (pdfBtn) pdfBtn.addEventListener('click', function () {
        pdfBtn.disabled = true;
        renderCanvas().then(function (canvas) {
            var jsPDF = window.jspdf.jsPDF;
            var imgData = canvas.toDataURL('image/jpeg', 0.95);
            var pxToMm = 0.264583;
            var widthMm = canvas.width * pxToMm / 2;
            var heightMm = canvas.height * pxToMm / 2;
            var pdf = new jsPDF({
                orientation: widthMm > heightMm ? 'l' : 'p',
                unit: 'mm',
                format: [widthMm, heightMm],
            });
            pdf.addImage(imgData, 'JPEG', 0, 0, widthMm, heightMm);
            pdf.save('DHA-Expense-{{ now()->format("Y-m-d") }}.pdf');
        }).finally(function () { pdfBtn.disabled = false; });
    });
})();
</script>
@endsection
