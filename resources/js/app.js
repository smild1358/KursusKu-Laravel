import './bootstrap';
import 'bootstrap';
import $ from 'jquery';

window.$ = window.jQuery = $;

$(document).ready(function () {
    // ------------------------------------------------------------------
    // FITUR 1 & 4: Live Ajax Seat Availability & Floating Debug Toast
    // ------------------------------------------------------------------
    $(document).on('change', '#course_id', function () {
        const id = $(this).val();
        const $availabilityBox = $('#availability-container');
        const $debugToast = $('#ajax-debug-toast');

        if (!id) {
            $availabilityBox.html(`
                <div class="alert alert-secondary mb-0 border-0 shadow-sm">
                    <i class="fa-solid fa-circle-info me-2"></i> Pilih kursus untuk memeriksa ketersediaan kursi secara live.
                </div>
            `);
            $debugToast.fadeOut();
            calculateLivePrice();
            return;
        }

        $availabilityBox.html(`
            <div class="alert alert-info mb-0 border-0 shadow-sm d-flex align-items-center">
                <div class="spinner-border spinner-border-sm me-2" role="status"></div>
                Memeriksa ketersediaan kursi via Ajax...
            </div>
        `);

        $.ajax({
            url: `/courses/${id}/availability`,
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                const total = data.total_capacity || 20;
                const remaining = data.remaining;
                const percentage = Math.round((remaining / total) * 100);
                
                let statusClass = 'bg-success';
                let alertClass = 'alert-success';
                let statusText = 'Kursi Tersedia';

                if (percentage <= 25) {
                    statusClass = 'bg-danger';
                    alertClass = 'alert-danger';
                    statusText = 'Kursi Sangat Terbatas!';
                } else if (percentage <= 50) {
                    statusClass = 'bg-warning';
                    alertClass = 'alert-warning';
                    statusText = 'Hampir Penuh';
                }

                $availabilityBox.html(`
                    <div class="alert ${alertClass} mb-0 border-0 shadow-sm">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="fw-bold"><i class="fa-solid fa-graduation-cap me-1"></i> ${data.course}</span>
                            <span class="badge ${statusClass} text-white">${statusText}</span>
                        </div>
                        <div class="seat-progress mb-2">
                            <div class="progress-bar ${statusClass} progress-bar-striped progress-bar-animated" role="progressbar" style="width: ${percentage}%"></div>
                        </div>
                        <small class="fw-semibold">Tersisa <strong>${remaining}</strong> dari ${total} kursi (${percentage}% Kuota).</small>
                    </div>
                `);

                // Update Debug Toast Visual
                $('#debug-url').text(`/courses/${id}/availability`);
                $('#debug-status').html('<span class="text-success">200 OK</span>');
                $('#debug-json').text(JSON.stringify(data, null, 2));
                $debugToast.fadeIn();

                // Simpan base fee ke elemen untuk Live Calculator
                $('#selected_base_price').val(data.price || 0);
                calculateLivePrice();
            },
            error: function (xhr) {
                $availabilityBox.html(`
                    <div class="alert alert-danger mb-0 border-0 shadow-sm">
                        <i class="fa-solid fa-circle-exclamation me-2"></i> Gagal memuat data ketersediaan kursi dari server.
                    </div>
                `);

                $('#debug-url').text(`/courses/${id}/availability`);
                $('#debug-status').html(`<span class="text-danger">${xhr.status} Error</span>`);
                $('#debug-json').text(xhr.responseText || 'Error Payload');
                $debugToast.fadeIn();
            }
        });
    });

    // ------------------------------------------------------------------
    // FITUR 2: Live Price & Discount Calculator (Client-Side)
    // ------------------------------------------------------------------
    function calculateLivePrice() {
        const basePrice = parseFloat($('#selected_base_price').val()) || 0;
        const profession = $('#profession').val();
        let discountPercent = 0;

        if (profession === 'mahasiswa') {
            discountPercent = 20;
        } else if (profession === 'guru') {
            discountPercent = 15;
        }

        const discountAmount = (basePrice * discountPercent) / 100;
        const priceAfterDiscount = basePrice - discountAmount;

        let facilityTotal = 0;
        $('.facility-checkbox:checked').each(function () {
            facilityTotal += parseFloat($(this).data('price')) || 0;
        });

        const grandTotal = priceAfterDiscount + facilityTotal;

        // Render hasil ke UI Live Box
        $('#live-base-price').text('Rp ' + basePrice.toLocaleString('id-ID'));
        $('#live-discount-text').text(`${profession.toUpperCase()} (${discountPercent}%)`);
        $('#live-discount-amount').text('- Rp ' + discountAmount.toLocaleString('id-ID'));
        $('#live-facility-price').text('+ Rp ' + facilityTotal.toLocaleString('id-ID'));
        $('#live-grand-total').text('Rp ' + grandTotal.toLocaleString('id-ID'));
    }

    $(document).on('change', '#profession, .facility-checkbox', function () {
        calculateLivePrice();
    });
});