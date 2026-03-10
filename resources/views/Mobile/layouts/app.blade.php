<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پنل فروشندگان</title>
    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazir-font@30.1.0/dist/font-face.css" rel="stylesheet" type="text/css" />
    @include('Mobile.layouts.links')
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.3/dist/tailwind.min.css" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <script src="{{ asset('js/js.js') }}"></script>
    @livewireStyles
</head>
<style>
</style>
<body>
    @include('components.flash-modal')
    <div class="flex min-h-screen ">
        @include('Mobile.layouts.sidebar')
        <main class="flex-1 w-full px-3 sm:px-4 overflow-x-hidden mx-auto lg:px-6 pt-16 sm:pt-20 lg:pt-20">
            {{ $slot ?? '' }}
            @yield('content')
        </main>
    </div>
@php
    $printStoreName = '';
    $mobileAuthUser = auth()->user();
    if ($mobileAuthUser && method_exists($mobileAuthUser, 'storeOwnerId')) {
        $printStore = \App\Models\Store::query()
            ->where('admin_user_id', $mobileAuthUser->storeOwnerId())
            ->latest('id')
            ->first();
        $printStoreName = (string) ($printStore->store_name ?? '');
    }
@endphp
@livewireScripts
<script>
window.__sellerStoreName = @json($printStoreName);
const toggleBtn = document.getElementById('darkToggle');

if (toggleBtn) {
    if (localStorage.getItem('theme') === 'dark') {
        document.body.classList.add('dark');
        toggleBtn.innerHTML = '<i class="fa-solid fa-sun "></i>';
    } else {
        toggleBtn.innerHTML = '<i class="fa-solid fa-moon "></i>';
    }
    toggleBtn.addEventListener('click', () => {
        document.body.classList.toggle('dark');
        if (document.body.classList.contains('dark')) {
            localStorage.setItem('theme', 'dark');
            toggleBtn.innerHTML = '<i class="fa-solid fa-sun"></i>';
        } else {
            localStorage.setItem('theme', 'light');
            toggleBtn.innerHTML = '<i class="fa-solid fa-moon"></i>';
        }
    });
}
function printEscapeHtml(value) {
    return String(value ?? '')
        .replace(/&/g, '&amp;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;')
        .replace(/"/g, '&quot;')
        .replace(/'/g, '&#39;');
}
function normalizePrintLabel(label) {
    return String(label || '').replace(/\s+/g, ' ').trim();
}
function isIgnoredPrintLabel(label) {
    const l = normalizePrintLabel(label).toLowerCase();
    return (
        l === 'چاپ' ||
        l === 'ویرایش' ||
        l === 'ادیت' ||
        l === 'حذف' ||
        l === 'عملیات' ||
        l === 'آیدی' ||
        l === 'id' ||
        l === '#'
    );
}
function printCellText(cell) {
    if (!cell) return '';
    return (cell.innerText || cell.textContent || '').trim();
}
function printCellHtml(cell) {
    if (!cell) return '—';
    const img = cell.querySelector('img');
    if (img && img.src) {
        return `<img src="${printEscapeHtml(img.src)}" alt="image">`;
    }
    const text = (cell.innerText || cell.textContent || '').trim();
    if (!text) return '—';
    return printEscapeHtml(text).replace(/\n/g, '<br>');
}
function collectPairsFromTableRow(trigger) {
    const row = trigger.closest('tr');
    if (!row) return [];
    const table = row.closest('table');
    if (!table) return [];
    const headers = Array.from(table.querySelectorAll('thead th')).map((th) => normalizePrintLabel(th.innerText || th.textContent || ''));
    const cells = Array.from(row.querySelectorAll('td,th'));
    const limit = Math.min(headers.length, cells.length);
    const pairs = [];
    for (let i = 0; i < limit; i++) {
        const label = headers[i];
        if (!label || isIgnoredPrintLabel(label)) continue;
        pairs.push({
            label,
            valueHtml: printCellHtml(cells[i]),
            valueText: printCellText(cells[i]),
        });
    }

    return pairs;
}

function collectPairsFromCard(trigger) {
    let node = trigger.parentElement;
    let scopedTable = null;

    while (node && node !== document.body) {
        const tables = node.querySelectorAll('table');
        if (tables.length === 1) {
            scopedTable = tables[0];
            break;
        }
        node = node.parentElement;
    }

    if (!scopedTable) return [];

    const pairs = [];
    const rows = Array.from(scopedTable.querySelectorAll('tr'));
    for (let i = 0; i < rows.length; i++) {
        const ths = Array.from(rows[i].querySelectorAll('th'));
        const tds = Array.from(rows[i].querySelectorAll('td'));

        if (ths.length === 1 && tds.length === 1) {
            const label = normalizePrintLabel(ths[0].innerText || ths[0].textContent || '');
            if (label && !isIgnoredPrintLabel(label)) {
                pairs.push({ label, valueHtml: printCellHtml(tds[0]), valueText: printCellText(tds[0]) });
            }
            continue;
        }

        if (ths.length > 0 && tds.length === 0 && i + 1 < rows.length) {
            const nextTds = Array.from(rows[i + 1].querySelectorAll('td'));
            if (nextTds.length === ths.length) {
                for (let j = 0; j < ths.length; j++) {
                    const label = normalizePrintLabel(ths[j].innerText || ths[j].textContent || '');
                    if (!label || isIgnoredPrintLabel(label)) continue;
                    pairs.push({ label, valueHtml: printCellHtml(nextTds[j]), valueText: printCellText(nextTds[j]) });
                }
                i++;
            }
        }
    }

    return pairs;
}

function collectPairsFromLabelBlocks(trigger) {
    let node = trigger.parentElement;

    while (node && node !== document.body) {
        const labels = Array.from(node.querySelectorAll('.font-semibold, .text-xs.font-semibold'));
        const pairs = [];

        labels.forEach((labelNode) => {
            const label = normalizePrintLabel(labelNode.innerText || labelNode.textContent || '');
            if (!label || isIgnoredPrintLabel(label)) return;

            const parent = labelNode.parentElement;
            if (!parent) return;

            const valueNode = parent.querySelector('.font-bold');
            if (!valueNode || valueNode === labelNode) return;

            pairs.push({
                label,
                valueHtml: printCellHtml(valueNode),
                valueText: printCellText(valueNode),
            });
        });

        if (pairs.length >= 2) return pairs;
        node = node.parentElement;
    }

    return [];
}

function resolvePrintTitle(trigger) {
    const explicitTitle = (trigger.getAttribute('data-print-title') || '').trim();
    if (explicitTitle) return explicitTitle;
    return 'مشخصات ثبت';
}

window.printSingleRow = function (trigger) {
    const pairs = collectPairsFromTableRow(trigger);
    const fromCard = pairs.length ? [] : collectPairsFromCard(trigger);
    const fromBlocks = pairs.length || fromCard.length ? [] : collectPairsFromLabelBlocks(trigger);
    const finalPairs = (pairs.length ? pairs : (fromCard.length ? fromCard : fromBlocks))
        .filter((item) => !isIgnoredPrintLabel(item.label));

    if (!finalPairs.length) {
        window.print();
        return;
    }

    let title = resolvePrintTitle(trigger);
    let storeName = String(window.__sellerStoreName || '').trim();

    const storeNameIndex = finalPairs.findIndex((item) =>
        item.label.includes('نام فروشگاه') ||
        item.label.includes('اسم فروشگاه') ||
        item.label === 'فروشگاه'
    );

    if (storeNameIndex !== -1) {
        storeName = finalPairs[storeNameIndex].valueText || '';
        finalPairs.splice(storeNameIndex, 1);
    }

    if (storeName) {
        title = `نام فروشگاه: ${storeName}`;
    }

    const rowsHtml = finalPairs
        .map((item) => `<tr><th>${printEscapeHtml(item.label)}</th><td>${item.valueHtml}</td></tr>`)
        .join('');

    const printWindow = window.open('', '_blank', 'width=900,height=800');
    if (!printWindow) return;

    printWindow.document.open();
    printWindow.document.write(`
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>${printEscapeHtml(title)}</title>
    <style>
        @import url('https://cdn.jsdelivr.net/gh/rastikerdar/vazir-font@30.1.0/dist/font-face.css');
        body {
            font-family: 'Vazir', sans-serif;
            direction: rtl;
            text-align: right;
        }
        h2 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #333;
            padding: 8px;
        }
        th {
            background-color: #f0f0f0;
        }
        td {
            text-align: left;
            direction: ltr;
        }
        img {
            max-width: 100px;
            height: auto;
        }
    </style>
</head>
<body>
    <h2>${printEscapeHtml(title)}</h2>
    <table>${rowsHtml}</table>
</body>
</html>`);
    printWindow.document.close();

    printWindow.onload = function () {
        printWindow.focus();
        printWindow.print();
        printWindow.close();
    };
};

</script>
</body>
</html>
