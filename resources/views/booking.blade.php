@extends('main')

@section('css')
    <link rel="stylesheet" href="{{ url('css/booking.css') }}" />
    <style>
        .floating-message {
            position: fixed;
            top: 15%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px 40px;
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            border-radius: 10px;
            display: none;
            z-index: 1000;
            font-size: 18px;
            text-align: center;
            max-width: 60%;
        }

        .floating-message.success {
            background-color: #d4edda;
            border-color: #c3e6cb;
        }

        .floating-message.error {
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }
    </style>
@stop

@section('content')
<section class="book">
    <hr class="one">

    <div class="box-container">
        @foreach ($tables->sortBy('id') as $table)
            @php
                // Check if all times are booked
                $allTimesBooked = count($table->booked_times) >= 11; // Assuming 11 time slots
            @endphp
            <div id="table-{{ $table->id }}" 
                 class="box {{ $table->is_full || $allTimesBooked ? 'booked' : '' }}"
                 style="{{ $table->is_full || $allTimesBooked ? 'background-color: gray;' : '' }}"
                 {{ $table->is_full || $allTimesBooked ? '' : 'onclick=clickTable(this)' }}>
                {{ sprintf('%02d', $table->id) }}
            </div>
        @endforeach
    </div>

    <hr>
    <div class="payment scrollable-container">
    <form action="{{ route('booking.store') }}" method="POST">
        @csrf
        <div class="desc">
            <p>Select Time Slot(s):</p>
            <div class="scrollable-options" id="timeSlots">
                @for ($hour = 11; $hour <= 21; $hour++)
                    <label>
                        <input type="checkbox" name="start_times[]" value="{{ str_pad($hour, 2, '0', STR_PAD_LEFT) }}:00">
                        {{ str_pad($hour, 2, '0', STR_PAD_LEFT) }}:00 - {{ str_pad($hour + 1, 2, '0', STR_PAD_LEFT) }}:00
                    </label><br>
                @endfor
            </div>
        </div>
        <p id="totalprice">Total: Rp. 0</p>
        <input type="hidden" value="0" id="ttlprice" name="totalprice"/>
        <input type="hidden" id="tblnumber" name="table_ids"/>
        <input type="submit" value="Checkout" class="btn"/>
    </form>
    </div>
</section>

<div id="floatingMessage" class="floating-message"></div>

<script>
    let selectedTable = null;
    const pricePerHour = 60000;

    function showMessage(message, type) {
        const floatingMessage = document.getElementById('floatingMessage');
        floatingMessage.innerHTML = message;
        floatingMessage.className = 'floating-message ' + type;
        floatingMessage.style.display = 'block';
        setTimeout(() => {
            floatingMessage.style.display = 'none';
        }, 3000);
    }

    function clickTable(element) {
        if (element.classList.contains('booked')) {
            return;
        }

        const totalprice = document.getElementById("totalprice");
        const ttlprice = document.getElementById("ttlprice");
        let tblnumber = document.getElementById("tblnumber");
        const checkboxes = document.querySelectorAll('.scrollable-options input[type="checkbox"]');
        
        const tableId = element.id.replace('table-', '');

        if (selectedTable && selectedTable !== element) {
            selectedTable.style.backgroundColor = "#9e0505";
            selectedTable = null;
            ttlprice.value = 0;
            tblnumber.value = '';
            totalprice.innerHTML = "Total: Rp. 0";
            checkboxes.forEach(checkbox => {
                checkbox.disabled = false;
                checkbox.checked = false;
            });
        }

        if (element !== selectedTable) {
            element.style.backgroundColor = "green";
            selectedTable = element;
            tblnumber.value = tableId;
            calculateTotal();

            fetch(`/tables/${tableId}/bookings`)
                .then(response => response.json())
                .then(data => {
                    console.log(data); // Ensure this logs the correct booking data
                    let allDisabled = true;
                    checkboxes.forEach(checkbox => {
                        const checkboxHour = checkbox.value.split(':')[0];
                        const isBooked = data.bookings.some(bookedTime => bookedTime.startsWith(checkboxHour));
                        checkbox.disabled = isBooked;
                        if (!isBooked) {
                            allDisabled = false;
                        }
                    });

                    if (allDisabled) {
                        element.classList.add('booked');
                        element.style.backgroundColor = 'gray';
                        element.removeAttribute('onclick');
                    }
                });

            // Add event listener to checkboxes for recalculating total
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', calculateTotal);
            });
        }
    }

    function calculateTotal() {
        const checkboxes = document.querySelectorAll('.scrollable-options input[type="checkbox"]:checked');
        const totalHours = checkboxes.length;
        const totalAmount = totalHours * pricePerHour;
        
        let ttlprice = document.getElementById("ttlprice");
        let totalprice = document.getElementById("totalprice");

        ttlprice.value = totalAmount;
        totalprice.innerHTML = "Total: Rp. " + totalAmount;
    }

    @if (session('success'))
        showMessage('{{ session('success') }}', 'success');
    @elseif ($errors->any())
        showMessage('{{ $errors->first() }}', 'error');
    @endif
</script>
@stop
