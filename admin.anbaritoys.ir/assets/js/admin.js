/* ==========================================================================
   انبار — اسکریپت پوسته جدید پنل مدیریت (بدون jQuery و بدون هیچ وابستگی)
   فاز ۱ — endpoint ها و شکل پاسخ‌ها عیناً مطابق requests/* فعلی است
   ========================================================================== */
(function () {
    'use strict';

    var AN = window.AN = {};

    /* ---------- توست ---------- */
    var toastIcons = { success: 'an-i-check', error: 'an-i-alert', warning: 'an-i-alert', info: 'an-i-info' };

    AN.toast = function (title, text, type) {
        var stack = document.getElementById('anToastStack');
        if (!stack) return;
        var el = document.createElement('div');
        el.className = 'an-toast is-' + (type || 'info');
        el.innerHTML =
            '<svg class="an-ic"><use href="#an-i-' + (toastIcons[type] || 'an-i-info') + '"></use></svg>' +
            '<div><b></b><span></span></div>';
        el.querySelector('b').textContent = title || '';
        el.querySelector('span').textContent = text || '';
        stack.appendChild(el);
        setTimeout(function () {
            el.classList.add('is-leaving');
            setTimeout(function () { el.remove(); }, 300);
        }, 3600);
    };

    /* ---------- مودال تأیید ---------- */
    AN.confirm = function (opts) {
        opts = opts || {};
        return new Promise(function (resolve) {
            var overlay = document.createElement('div');
            overlay.className = 'an-modal-overlay';
            overlay.innerHTML =
                '<div class="an-modal" role="dialog" aria-modal="true">' +
                '  <div class="an-modal-ic"><svg class="an-ic"><use href="#an-i-alert"></use></svg></div>' +
                '  <h4></h4><p></p>' +
                '  <div class="an-modal-actions">' +
                '    <button type="button" class="an-btn an-btn-danger" data-an-ok></button>' +
                '    <button type="button" class="an-btn an-btn-ghost" data-an-cancel>انصراف</button>' +
                '  </div>' +
                '</div>';
            overlay.querySelector('h4').textContent = opts.title || 'تأیید عملیات';
            overlay.querySelector('p').textContent = opts.text || '';
            overlay.querySelector('[data-an-ok]').textContent = opts.okText || 'تأیید';
            function close(result) {
                overlay.classList.remove('is-open');
                setTimeout(function () { overlay.remove(); }, 180);
                resolve(result);
            }
            overlay.addEventListener('click', function (e) {
                if (e.target === overlay) close(false);
            });
            overlay.querySelector('[data-an-ok]').addEventListener('click', function () { close(true); });
            overlay.querySelector('[data-an-cancel]').addEventListener('click', function () { close(false); });
            document.addEventListener('keydown', function onEsc(e) {
                if (e.key === 'Escape') { document.removeEventListener('keydown', onEsc); close(false); }
            });
            document.body.appendChild(overlay);
            requestAnimationFrame(function () { overlay.classList.add('is-open'); });
            overlay.querySelector('[data-an-ok]').focus();
        });
    };

    /* ---------- fetch با هدر X-Requested-With (شرط validator برای پاسخ JSON) ---------- */
    AN.request = function (url, options) {
        options = options || {};
        var headers = { 'X-Requested-With': 'XMLHttpRequest' };
        if (options.body && !(options.body instanceof FormData)) {
            headers['Content-Type'] = 'application/x-www-form-urlencoded; charset=UTF-8';
        }
        return fetch(url, {
            method: options.method || 'GET',
            headers: headers,
            body: options.body || undefined,
            credentials: 'same-origin'
        }).then(function (res) {
            return res.text().then(function (txt) {
                try { return JSON.parse(txt); }
                catch (e) { return { status: res.status, raw: txt }; }
            });
        });
    };

    /* ---------- سایدبار موبایل ---------- */
    var burger = document.getElementById('anBurger');
    if (burger) {
        burger.addEventListener('click', function () {
            document.body.classList.toggle('an-side-open');
        });
        var backdrop = document.getElementById('anBackdrop');
        if (backdrop) backdrop.addEventListener('click', function () {
            document.body.classList.remove('an-side-open');
        });
    }

    /* ==========================================================================
       جدول‌ها: جستجو + مرتب‌سازی + صفحه‌بندی (روی ردیف‌های server-rendered)
       فعال‌سازی: <table data-an-table> داخل کارتی که .an-toolbar دارد
       ========================================================================== */
    function initTables() {
        document.querySelectorAll('table[data-an-table]').forEach(function (table) {
            var card = table.closest('.an-card');
            if (!card) return;
            var tbody = table.querySelector('tbody');
            if (!tbody) return;
            var allRows = Array.prototype.slice.call(tbody.querySelectorAll('tr'));
            var filtered = allRows.slice();
            var pageSize = parseInt(table.getAttribute('data-an-page-size') || '10', 10);
            var page = 1;
            var sortKey = -1, sortDir = 1;

            var searchBox = card.querySelector('.an-search input');
            var countEl = card.querySelector('.an-count');
            var pager = card.querySelector('.an-pager');
            var infoEl = card ? card.querySelector('.an-pager-info') : null;

            function cellValue(row, idx) {
                var cell = row.cells[idx];
                if (!cell) return '';
                var raw = cell.getAttribute('data-sort');
                return raw !== null ? raw : cell.textContent.trim();
            }
            function isNum(v) { return /^-?[\d\u06F0-\u06F9.,\s]+$/.test(v) && /[\d\u06F0-\u06F9]/.test(v); }
            function toNum(v) {
                var d = '٠١٢٣٤٥٦٧٨٩', p = '۰۱۲۳۴۵۶۷۸۹';
                v = String(v).replace(/[٠-٩۰-۹]/g, function (c) {
                    var i = d.indexOf(c); return i > -1 ? i : p.indexOf(c);
                });
                return parseFloat(v.replace(/[,\s]/g, '')) || 0;
            }
            function apply() {
                var start = (page - 1) * pageSize;
                var visible = filtered.slice(start, start + pageSize);
                allRows.forEach(function (r) { r.style.display = 'none'; });
                visible.forEach(function (r) { r.style.display = ''; });
                if (countEl) {
                    countEl.innerHTML = 'نمایش <b></b> از <b></b> مورد';
                    var bs = countEl.querySelectorAll('b');
                    bs[0].textContent = filtered.length ? (start + 1) + ' تا ' + Math.min(start + pageSize, filtered.length) : '۰';
                    bs[1].textContent = filtered.length;
                }
                if (pager) renderPager();
                if (infoEl) infoEl.textContent = '';
                var empty = card.querySelector('.an-empty');
                if (empty) empty.parentNode.parentNode.style.display = filtered.length ? '' : 'none';
                var wrap = table.closest('.an-table-wrap');
                if (wrap) wrap.style.display = filtered.length ? '' : 'none';
            }
            function renderPager() {
                var pages = Math.max(1, Math.ceil(filtered.length / pageSize));
                if (page > pages) page = pages;
                pager.innerHTML = '';
                function btn(label, target, disabled, current) {
                    var b = document.createElement('button');
                    b.type = 'button'; b.textContent = label;
                    if (current) b.className = 'is-current';
                    if (disabled) b.disabled = true;
                    else b.addEventListener('click', function () { page = target; apply(); });
                    pager.appendChild(b);
                }
                btn('قبلی', page - 1, page === 1);
                for (var i = 1; i <= pages; i++) {
                    if (pages > 7 && i > 2 && i < pages - 1 && Math.abs(i - page) > 1) {
                        if (i === 3) btn('…', 0, true);
                        continue;
                    }
                    btn(i, i, false, i === page);
                }
                btn('بعدی', page + 1, page === pages);
            }
            function doFilter() {
                var q = searchBox ? searchBox.value.trim().toLowerCase() : '';
                filtered = allRows.filter(function (row) {
                    if (!q) return true;
                    return row.textContent.toLowerCase().indexOf(q) > -1;
                });
                page = 1;
                if (sortKey > -1) doSort(sortKey, false);
                apply();
            }
            function doSort(idx, toggle) {
                if (toggle) {
                    if (sortKey === idx) sortDir = -sortDir;
                    else { sortKey = idx; sortDir = 1; }
                }
                var numeric = filtered.length && isNum(cellValue(filtered[0], idx));
                filtered.sort(function (a, b) {
                    var va = cellValue(a, idx), vb = cellValue(b, idx);
                    var cmp = numeric ? toNum(va) - toNum(vb) : va.localeCompare(vb, 'fa');
                    return cmp * sortDir;
                });
                table.querySelectorAll('thead th').forEach(function (th, i) {
                    th.classList.remove('is-sorted-asc', 'is-sorted-desc');
                    if (i === idx) th.classList.add(sortDir === 1 ? 'is-sorted-asc' : 'is-sorted-desc');
                });
                /* ستون ردیف (#) را دوباره شماره می‌زنیم */
                filtered.forEach(function (row, i) {
                    if (row.cells.length && row.cells[0].getAttribute('data-rank') !== null) {
                        row.cells[0].textContent = i + 1;
                    }
                });
            }
            if (searchBox) searchBox.addEventListener('input', doFilter);
            table.querySelectorAll('thead th[data-sortable]').forEach(function (th) {
                th.classList.add('is-sortable');
                th.addEventListener('click', function () {
                    doSort(Array.prototype.indexOf.call(th.parentNode.children, th), true);
                    apply();
                });
            });
            apply();
        });
    }

    /* ==========================================================================
       محصولات — توگل وضعیت / پیشنهادی / حذف  (endpoint های ProductsRequest.php)
       ========================================================================== */
    var statusMeta = {
        active: ['فعال', 'success'], inactive: ['غیر فعال', 'danger'],
        unavialable: ['ناموجود', 'warning'], stop_selling: ['توقف فروش', 'warning']
    };
    var suggestedMeta = { yes: ['پیشنهادی', 'success'], no: ['عادی', 'muted'] };

    function badgeHtml(map, key) {
        var m = map[key] || ['نامشخص', 'muted'];
        return '<span class="an-badge is-' + m[1] + '"><span class="an-dot"></span>' + m[0] + '</span>';
    }

    AN.toggleProductStatus = function (id) {
        var cell = document.getElementById('status' + id);
        if (!cell) return;
        var next = cell.getAttribute('data-status') === 'active' ? 'inactive' : 'active';
        AN.request('requests/ProductsRequest.php?action=change_status_products&products_id=' + id + '&old_status_product=' + next)
            .then(function (res) {
                if (res.status === 200) {
                    cell.setAttribute('data-status', next);
                    cell.innerHTML = badgeHtml(statusMeta, next);
                }
                AN.toast(res.title || (res.status === 200 ? 'عملیات موفق' : 'عملیات ناموفق'),
                    res.text || res.message || '', res.type || (res.status === 200 ? 'success' : 'error'));
            });
    };

    AN.toggleProductSuggested = function (id) {
        var cell = document.getElementById('Suggested' + id);
        if (!cell) return;
        var next = cell.getAttribute('data-suggested') === 'yes' ? 'no' : 'yes';
        AN.request('requests/ProductsRequest.php?action=change_Suggested_products&products_id=' + id + '&old_Suggested_product=' + next)
            .then(function (res) {
                if (res.status === 200) {
                    cell.setAttribute('data-suggested', next);
                    cell.innerHTML = badgeHtml(suggestedMeta, next);
                }
                AN.toast(res.title || (res.status === 200 ? 'عملیات موفق' : 'عملیات ناموفق'),
                    res.text || res.message || '', res.type || (res.status === 200 ? 'success' : 'error'));
            });
    };

    AN.deleteProduct = function (id, btn) {
        var row = btn.closest('tr');
        var title = row ? (row.querySelector('.an-cell-title') || {}).textContent : '';
        AN.confirm({
            title: 'حذف محصول',
            text: ('محصول «' + (title ? title.trim() : '#' + id) + '» برای همیشه حذف شود؟ این عملیات قابل بازگشت نیست.'),
            okText: 'بله، حذف کن'
        }).then(function (ok) {
            if (!ok) return;
            AN.request('requests/ProductsRequest.php?action=delete_product&products_id=' + id)
                .then(function (res) {
                    AN.toast(res.title || (res.status === 200 ? 'عملیات موفق' : 'عملیات ناموفق'),
                        res.text || res.message || '', res.type || (res.status === 200 ? 'success' : 'error'));
                    if (res.status === 200 && row) {
                        row.style.transition = 'opacity .3s ease';
                        row.style.opacity = '0';
                        setTimeout(function () {
                            row.remove();
                            var t = row.closest('table');
                            if (t) t.dispatchEvent(new CustomEvent('an:row-removed'));
                        }, 300);
                    }
                });
        });
    };

    /* ==========================================================================
       افزودن محصول — همان POST فرم create_product
       ========================================================================== */
    AN.createProduct = function (form) {
        var errBox = document.getElementById('anFormErrors');
        if (errBox) errBox.style.display = 'none';
        var fd = new FormData(form);
        fd.delete('action');
        var params = new URLSearchParams();
        fd.forEach(function (v, k) { params.append(k, v); });
        params.append('action', 'create_product');
        var btn = form.querySelector('[data-an-submit]');
        if (btn) btn.disabled = true;
        AN.request('requests/ProductsRequest.php', { method: 'POST', body: params })
            .then(function (res) {
                if (res.status == 200) {
                    AN.toast(res.title || 'عملیات موفق', res.text || 'افزودن محصول با موفقیت انجام شد', 'success');
                    setTimeout(function () {
                        window.location.assign('manage_products_category.php?product_id=' + res.id);
                    }, 500);
                } else {
                    if (btn) btn.disabled = false;
                    if (errBox) {
                        errBox.innerHTML = res.message || '<ul><li>خطای نامشخص</li></ul>';
                        errBox.style.display = 'block';
                        errBox.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                }
            })
            .catch(function () { if (btn) btn.disabled = false; });
    };

    /* ==========================================================================
       تنوع محصولات — create_product_variety / update_product_variety (پاسخ JSON)
       ========================================================================== */
    AN.variety = function (form, mode) {
        var errBox = document.getElementById('anFormErrors');
        if (errBox) errBox.style.display = 'none';
        var params = new URLSearchParams();
        new FormData(form).forEach(function (v, k) { params.append(k, v); });
        params.append('action', mode === 'update' ? 'update_product_variety' : 'create_product_variety');
        var btn = form.querySelector('[data-an-submit]');
        if (btn) btn.disabled = true;
        AN.request('requests/VarietyRequest.php', { method: 'POST', body: params })
            .then(function (res) {
                if (res && res.status == 200) {
                    AN.toast(res.title || 'عملیات موفق', res.text || 'تنوع محصول با موفقیت ذخیره شد', 'success');
                    if (mode === 'update') {
                        if (btn) btn.disabled = false;
                    } else {
                        setTimeout(function () { window.location.assign('manage_products_variety.php'); }, 600);
                    }
                } else {
                    if (btn) btn.disabled = false;
                    if (errBox) {
                        errBox.innerHTML = (res && res.message) || '<ul><li>خطای نامشخص</li></ul>';
                        errBox.style.display = 'block';
                        errBox.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                }
            })
            .catch(function () { if (btn) btn.disabled = false; });
    };

    /* ==========================================================================
       مقالات — insert_paper (پاسخ JSON از requests/perper.php)
       ========================================================================== */
    AN.insertPaper = function (form) {
        var errBox = document.getElementById('anFormErrors');
        if (errBox) errBox.style.display = 'none';
        var params = new URLSearchParams();
        new FormData(form).forEach(function (v, k) { params.append(k, v); });
        params.append('action', 'insert_paper');
        var btn = form.querySelector('[data-an-submit]');
        if (btn) btn.disabled = true;
        AN.request('requests/perper.php', { method: 'POST', body: params })
            .then(function (res) {
                if (res && res.status == 200) {
                    AN.toast(res.title || 'عملیات موفق', res.text || 'مقاله با موفقیت ثبت شد', 'success');
                    setTimeout(function () { window.location.assign('manageArticles.php'); }, 600);
                } else {
                    if (btn) btn.disabled = false;
                    var msg = (res && (res.message || res.text)) || '<ul><li>خطای نامشخص</li></ul>';
                    if (res && res.title) AN.toast(res.title, 'خطای اعتبارسنجی — فیلدها را بررسی کنید', 'error');
                    if (errBox) {
                        errBox.innerHTML = msg;
                        errBox.style.display = 'block';
                        errBox.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                }
            })
            .catch(function () { if (btn) btn.disabled = false; });
    };

    /* ==========================================================================
       ادیتور ساده مبتنی بر contenteditable (جایگزین summernote در فاز ۱)
       ========================================================================== */
    function initEditors() {
        document.querySelectorAll('textarea[data-an-editor]').forEach(function (ta) {
            var wrap = document.createElement('div');
            wrap.className = 'an-editor';
            var bar = document.createElement('div');
            bar.className = 'an-editor-bar';
            var cmds = [
                ['bold', 'B'], ['italic', 'I'], ['underline', 'U'],
                ['insertUnorderedList', '• فهرست'], ['insertOrderedList', '۱. فهرست'],
                ['formatBlock-h3', 'عنوان'], ['removeFormat', 'پاک‌سازی']
            ];
            cmds.forEach(function (c) {
                var b = document.createElement('button');
                b.type = 'button';
                if (c[0] === 'formatBlock-h3') {
                    b.innerHTML = c[1];
                    b.addEventListener('click', function () {
                        document.execCommand('formatBlock', false, 'h3');
                        sync();
                    });
                } else {
                    b.textContent = c[1];
                    b.addEventListener('click', function () {
                        document.execCommand(c[0], false, null);
                        sync();
                    });
                }
                bar.appendChild(b);
            });
            var area = document.createElement('div');
            area.className = 'an-editor-area';
            area.contentEditable = 'true';
            area.setAttribute('data-placeholder', ta.getAttribute('placeholder') || 'متن را اینجا بنویسید…');
            area.innerHTML = ta.value;
            function sync() { ta.value = area.innerHTML; }
            area.addEventListener('input', sync);
            area.addEventListener('blur', sync);
            ta.parentNode.insertBefore(wrap, ta);
            wrap.appendChild(bar);
            wrap.appendChild(area);
            wrap.appendChild(ta);
            ta.style.display = 'none';
        });
    }

    /* ==========================================================================
       دسته‌بندی محصول — ۴ سلکت + چیپ‌ها (createCategoryToProducts / DeleteCategoryProductsOrder)
       ========================================================================== */
    function initCategorySelects() {
        document.querySelectorAll('select[data-an-cat]').forEach(function (sel) {
            sel.addEventListener('change', function () {
                var value = sel.value;
                if (!value || value === '1') return; /* گزینهٔ «انتخاب کنید…» */
                var holder = sel.closest('[data-an-product]');
                var productId = holder ? holder.getAttribute('data-an-product') : '';
                var chipsForm = document.getElementById('anChips');
                sel.value = '1';
                var params = new URLSearchParams({
                    category_id: value,
                    product_id: productId,
                    action: 'createCategoryToProducts'
                });
                sel.disabled = true;
                AN.request('requests/ProductsRequest.php', { method: 'POST', body: params })
                    .then(function (res) {
                        sel.disabled = false;
                        AN.toast(res.title || (res.status === 200 ? 'عملیات موفق' : 'عملیات ناموفق'),
                            res.text || '', res.type || (res.status === 200 ? 'success' : 'warning'));
                        if (res.status === 200 && chipsForm) {
                            var labelEl = sel.querySelector('option[value="' + value + '"]');
                            addChip(chipsForm, value, labelEl ? labelEl.textContent : ('#' + value));
                        }
                    });
            });
        });
        /* تأیید قبل از حذف چیپ (فرم GET اصلی سر جایش است) */
        var chipsForm = document.getElementById('anChips');
        if (chipsForm) {
            chipsForm.addEventListener('submit', function (e) {
                var submitter = e.submitter || chipsForm.querySelector('button:focus');
                if (submitter && submitter.name === 'ids') {
                    e.preventDefault();
                    var catName = submitter.getAttribute('data-name') || submitter.textContent.trim();
                    AN.confirm({
                        title: 'حذف دسته',
                        text: 'دستهٔ «' + catName + '» از این محصول حذف شود؟',
                        okText: 'حذف'
                    }).then(function (ok) {
                        if (!ok) return;
                        /* فرم.submit() مقدار دکمهٔ کلیک‌شده (ids) را نمی‌فرستد —
                           پس دقیقاً همان URL قراردادی GET را می‌سازیم */
                        var pidEl = chipsForm.querySelector('input[name="product_id"]');
                        var actEl = chipsForm.querySelector('input[name="action"]');
                        var pid = pidEl ? pidEl.value : '';
                        var act = actEl ? actEl.value : 'DeleteCategoryProductsOrder';
                        window.location.assign(window.location.pathname +
                            '?action=' + encodeURIComponent(act) +
                            '&product_id=' + encodeURIComponent(pid) +
                            '&ids=' + encodeURIComponent(submitter.value));
                    });
                }
            });
        }
        function addChip(form, value, title) {
            var b = document.createElement('button');
            b.type = 'submit'; b.name = 'ids'; b.value = value;
            b.className = 'an-chip';
            b.setAttribute('data-name', title);
            b.innerHTML = '<svg class="an-ic"><use href="#an-i-trash"></use></svg><span></span>';
            b.querySelector('span').textContent = title;
            form.appendChild(b);
        }
    }

    /* ==========================================================================
       آپلود عکس محصول — PhotoProductRequest.php (photo_product + product_id)
       ========================================================================== */
    function initUploader() {
        var drop = document.getElementById('anDrop');
        if (!drop) return;
        var input = drop.querySelector('input[type=file]');
        var productId = drop.getAttribute('data-an-product');
        var fileKey = drop.getAttribute('data-an-file') || 'photo_product';
        var idKey = drop.getAttribute('data-an-id-name') || 'product_id';
        var busy = false;

        function upload(files) {
            if (busy || !files || !files.length) return;
            busy = true;
            drop.classList.add('is-busy');
            var queue = Array.prototype.slice.call(files).slice(0, 5);
            var done = 0, ok = 0;
            queue.forEach(function (file) {
                if (file.size > 3 * 1024 * 1024) {
                    AN.toast('حجم فایل زیاد است', 'حجم «' + file.name + '» بیش از ۳ مگابایت است.', 'warning');
                    finished(); return;
                }
                var fd = new FormData();
                fd.append(fileKey, file);
                fd.append(idKey, productId);
                AN.request('requests/PhotoProductRequest.php', { method: 'POST', body: fd })
                    .then(function (res) {
                        if (res.message && /موفقیت/.test(res.message)) ok++;
                        AN.toast(res.message && /موفقیت/.test(res.message) ? 'آپلود موفق' : 'خطا در آپلود',
                            res.message || '', /موفقیت/.test(res.message || '') ? 'success' : 'error');
                        if (res.message && /موفقیت/.test(res.message)) addThumb(file);
                        finished();
                    })
                    .catch(finished);
            });
            function finished() {
                done++;
                if (done >= queue.length) {
                    busy = false;
                    drop.classList.remove('is-busy');
                    if (ok) setTimeout(function () { window.location.reload(); }, 800);
                }
            }
        }
        function addThumb(file) {
            var grid = document.getElementById('anPhotoGrid');
            if (!grid) return;
            var url = URL.createObjectURL(file);
            var item = document.createElement('figure');
            item.className = 'an-photo-item';
            item.innerHTML = '<img alt=""><figcaption><span>در حال ذخیره…</span><span class="an-badge is-success">جدید</span></figcaption>';
            item.querySelector('img').src = url;
            grid.insertBefore(item, grid.firstChild);
        }
        drop.addEventListener('click', function () { input.click(); });
        input.addEventListener('change', function () { upload(input.files); input.value = ''; });
        ['dragenter', 'dragover'].forEach(function (ev) {
            drop.addEventListener(ev, function (e) { e.preventDefault(); drop.classList.add('is-over'); });
        });
        ['dragleave', 'drop'].forEach(function (ev) {
            drop.addEventListener(ev, function (e) { e.preventDefault(); drop.classList.remove('is-over'); });
        });
        drop.addEventListener('drop', function (e) { upload(e.dataTransfer.files); });
    }

    /* ---------- چاپ فاکتور ---------- */
    function initPrint() {
        document.querySelectorAll('[data-an-print]').forEach(function (btn) {
            btn.addEventListener('click', function () { window.print(); });
        });
    }

    document.addEventListener('DOMContentLoaded', function () {
        initTables();
        initEditors();
        initCategorySelects();
        initUploader();
        initPrint();
        document.querySelectorAll('[data-an-create]').forEach(function (form) {
            form.addEventListener('submit', function (e) { e.preventDefault(); AN.createProduct(form); });
        });
        document.querySelectorAll('[data-an-paper]').forEach(function (form) {
            form.addEventListener('submit', function (e) { e.preventDefault(); AN.insertPaper(form); });
        });
        document.querySelectorAll('[data-an-variety]').forEach(function (form) {
            form.addEventListener('submit', function (e) {
                e.preventDefault();
                AN.variety(form, form.getAttribute('data-an-variety'));
            });
        });
    });
})();
