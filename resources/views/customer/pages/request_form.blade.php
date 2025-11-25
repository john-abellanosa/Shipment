@extends('customer.layout.layout')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        * {
            box-sizing: border-box;
        }

        /* Enhanced mobile-first responsive design with comprehensive breakpoints */
        :root {
            --primary: #007bff;
            --primary-dark: #0d62d0;
            --primary-light: #e0f0ff;
            --gray-100: #f3f4f6;
            --gray-300: #d1d5db;
            --gray-500: #6b7280;
            --gray-700: #333;
            --border-color: #d0d9e6;
            --readonly-bg: #f0f4fa;
        }

        .container {
            width: 100%;
            max-width: 1170px;
            padding-top: 10px;
            font-family: "Segoe UI", "Arial", sans-serif;
            color: #333;
            background-color: white;
            border-radius: 8px;
        }

        h2 {
            color: #000;
            margin-bottom: 20px;
            font-size: 1.6rem;
            font-weight: 600;
        }

        /* Form layout - Mobile first */
        .form-group {
            display: flex;
            flex-direction: column;
            gap: clamp(15px, 4vw, 25px);
        }

        .form-column {
            flex: 1;
            width: 100%;
        }

        .form-columns {
            display: grid;
            grid-template-columns: 1fr;
            gap: clamp(12px, 3vw, 15px);
            margin-top: clamp(10px, 3vw, 15px);
        }

        .dimension {
            width: 100%;
        }

        /* Input and select styles */
        input,
        select {
            width: 100%;
            padding: clamp(10px, 2.5vw, 12px);
            margin-bottom: clamp(12px, 3vw, 18px);
            border: 2px solid var(--border-color);
            border-radius: 6px;
            font-size: clamp(14px, 3vw, 15px);
            transition: all 0.2s ease;
            background-color: #fff;
        }

        input:hover,
        select:hover {
            border-color: #a3c2f5;
        }

        input:focus,
        select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(26, 115, 232, 0.25);
        }

        input[readonly] {
            background-color: var(--readonly-bg);
            border-color: #c0cde0;
            cursor: not-allowed;
        }

        label {
            display: block;
            margin-bottom: clamp(6px, 2vw, 8px);
            font-weight: 600;
            color: #000;
            font-size: clamp(13px, 2.5vw, 15px);
        }

        /* Route container - Mobile optimized */
        .route-container {
            display: flex;
            flex-direction: column;
            gap: clamp(1rem, 3vw, 1.5rem);
            align-items: center;
            padding: clamp(15px, 4vw, 2rem);
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.08);
        }

        .form-column.full {
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
        }

        .form-column.full label {
            font-weight: 600;
            color: #000000;
            margin-bottom: clamp(4px, 2vw, 8px);
        }

        /* Input with icon */
        .input-with-icon {
            position: relative;
            width: 100%;
        }

        .input-with-icon i {
            position: absolute;
            top: 35%;
            left: clamp(10px, 2vw, 12px);
            transform: translateY(-50%);
            color: var(--primary);
            font-size: clamp(0.8rem, 2vw, 1rem);
        }

        .input-with-icon input {
            width: 100%;
            padding: clamp(10px, 2.5vw, 12px) clamp(10px, 2vw, 12px) clamp(10px, 2.5vw, 12px) clamp(35px, 5vw, 38px);
            border-radius: 8px;
            background-color: #ffffff;
            font-size: clamp(14px, 3vw, 15px);
        }

        /* Swap button */
        .swapButton {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: var(--primary);
            color: white;
            padding: clamp(8px, 2vw, 12px) clamp(12px, 3vw, 16px);
            border: none;
            border-radius: 5px;
            font-size: clamp(0.9rem, 2vw, 1rem);
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
            max-width: 400px;
            gap: 8px;
        }

        .swapButton:hover {
            background-color: var(--primary-dark);
        }

        .swapButton i {
            font-size: clamp(0.8rem, 2vw, 1rem);
        }

        /* Sender and Shipment sections */
        .sender,
        .shipment_info {
            padding: clamp(20px, 4vw, 40px);
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.08);
            transition: box-shadow 0.3s;
        }

        /* Category section */
        #category-container {
            margin-bottom: clamp(15px, 3vw, 20px);
        }

        .form-groups {
            background-color: #f8faff;
            padding: clamp(15px, 3vw, 20px);
            border-radius: 8px;
            margin-bottom: clamp(12px, 3vw, 15px);
            border: 1px solid #e0e7f2;
            transition: all 0.3s;
        }

        .category {
            position: relative;
            width: 100%;
        }

        .category select {
            width: 100%;
            display: block;
            appearance: none;
            color: #555;
            cursor: pointer;
        }

        .category::after {
            content: "";
            position: absolute;
            top: 68%;
            right: clamp(10px, 2vw, 12px);
            transform: translateY(-50%);
            width: 0;
            height: 0;
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
            border-top: 5px solid #555;
            transition: transform 0.2s ease;
            pointer-events: none;
        }

        .category.open::after {
            transform: translateY(-50%) rotate(180deg);
        }

        .category select option:disabled {
            color: #888;
            background-color: #f0f0f0;
            font-weight: bold;
        }

        .category option {
            color: black;
        }

        /* Buttons */
        .add-category-btn {
            padding: clamp(8px, 2vw, 10px) clamp(12px, 3vw, 16px);
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s;
            font-size: clamp(0.9rem, 2vw, 1rem);
            width: 100%;
            max-width: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .add-category-btn:hover {
            background-color: var(--primary-dark);
            box-shadow: 0 6px 8px rgba(26, 115, 232, 0.3);
            transform: translateY(-1px);
        }

        .add-category-btn i {
            font-size: clamp(0.8rem, 2vw, 1rem);
        }

        .remove-category-btn {
            margin-top: clamp(8px, 2vw, 10px);
            padding: clamp(8px, 2vw, 10px) clamp(12px, 3vw, 16px);
            background-color: white;
            color: #000;
            border: 1px solid #000;
            transition: all 0.3s;
            border-radius: 6px;
            font-size: clamp(0.85rem, 2vw, 0.95rem);
            width: 100%;
            cursor: pointer;
        }

        .remove-category-btn:hover {
            background-color: #f5f8ff;
            color: #000;
            box-shadow: 0 4px 8px rgba(66, 133, 244, 0.15);
            transform: translateY(-2px);
        }

        /* Button containers */
        .buttons,
        .step-buttons {
            display: flex;
            gap: clamp(10px, 3vw, 15px);
            justify-content: flex-end;
            margin-top: clamp(15px, 4vw, 25px);
            flex-wrap: wrap;
        }

        .btn-submit,
        .btn-back,
        .btn-next {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: clamp(10px, 2vw, 14px) clamp(16px, 3vw, 28px);
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 600;
            font-size: clamp(0.9rem, 2vw, 1rem);
            transition: all 0.3s ease;
            white-space: nowrap;
            gap: 8px;
        }

        .btn-submit {
            background-color: var(--primary);
            color: white;
            box-shadow: 0 4px 6px rgba(26, 115, 232, 0.2);
        }

        .btn-submit:hover {
            background-color: var(--primary-dark);
            box-shadow: 0 6px 8px rgba(26, 115, 232, 0.3);
            transform: translateY(-2px);
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        .btn-back {
            background-color: transparent;
            color: #000;
            border: 1px solid #000;
        }

        .btn-back:hover {
            background: var(--gray-100);
        }

        .btn-next {
            background-color: #000;
            color: white;
        }

        .btn-next:hover {
            background-color: var(--gray-700);
        }

        /* Subtopbar */
        .subtopbar {
            border-bottom: 1px solid #ddd;
            margin-bottom: clamp(15px, 4vw, 20px);
            border-radius: 6px;
            margin-top: -10px;
            padding: clamp(10px, 2vw, 15px) clamp(10px, 2vw, 20px);
        }

        .subtopbar h2 {
            margin: clamp(8px, 2vw, 12px) auto;
            font-size: clamp(1.4rem, 5vw, 2rem);
            font-weight: 800;
            color: #000;
            text-align: left;
        }

        /* Progress indicator */
        .form-progress-wrapper {
            margin-bottom: clamp(1rem, 3vw, 1.5rem);
            padding: clamp(0.75rem, 2vw, 1rem);
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            overflow-x: auto;
        }

        .form-progress {
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            min-width: 100%;
        }

        .progress-step {
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            z-index: 2;
            flex-shrink: 0;
        }

        .step-icon {
            width: clamp(35px, 8vw, 40px);
            height: clamp(35px, 8vw, 40px);
            border: 3px solid var(--gray-300);
            background-color: white;
            color: var(--gray-500);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: clamp(0.9rem, 2vw, 1.2rem);
            transition: all 0.3s ease;
        }

        .step-label {
            margin-top: clamp(0.25rem, 1vw, 0.5rem);
            font-size: clamp(0.7rem, 2vw, 0.9rem);
            color: var(--gray-500);
            text-align: center;
        }

        /* Progress line */
        .progress-line {
            flex: 1;
            height: 3px;
            background-color: var(--gray-300);
            margin: 0 clamp(5px, 2vw, 10px);
            z-index: 1;
            min-width: 20px;
        }

        /* Active and complete states */
        .progress-step.active .step-icon {
            border-color: var(--primary);
            color: var(--primary);
        }

        .progress-step.active .step-label {
            color: var(--primary);
        }

        .progress-step.complete .step-icon {
            background-color: var(--primary);
            color: white;
            border-color: var(--primary);
        }

        .progress-step.complete .step-label {
            color: var(--primary);
        }

        .progress-line.active {
            background-color: var(--primary);
        }

        .step-buttons {
            justify-content: flex-end;
        }

        .description {
            font-size: clamp(0.75rem, 2vw, 0.875rem);
            margin-top: -clamp(8px, 2vw, 10px);
            color: #555;
            margin-bottom: clamp(15px, 3vw, 20px);
        }

        /* Custom alert */
        .custom-alert {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            justify-content: center;
            align-items: center;
            padding: clamp(10px, 3vw, 20px);
        }

        .custom-alert .alert-content {
            background-color: #fff;
            padding: clamp(15px, 3vw, 20px);
            border-radius: 10px;
            width: 100%;
            max-width: 300px;
            text-align: center;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }

        .custom-alert h3 {
            margin-bottom: clamp(8px, 2vw, 10px);
            color: #ff5722;
            font-size: clamp(1rem, 3vw, 1.2rem);
        }

        .custom-alert p {
            margin-bottom: clamp(15px, 3vw, 20px);
            color: #333;
            font-size: clamp(0.85rem, 2vw, 1rem);
        }

        .custom-alert .close-btn {
            position: absolute;
            top: clamp(10px, 2vw, 15px);
            right: clamp(10px, 2vw, 15px);
            font-size: clamp(1.5rem, 3vw, 20px);
            cursor: pointer;
        }

        .custom-alert.show {
            display: flex;
        }

        .form-step {
            display: none;
        }

        .form-step.active {
            display: block;
        }

        /* Error alert */
        .error_alert {
            position: fixed;
            top: -100px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #f8d7da;
            color: #721c24;
            padding: clamp(12px, 2vw, 15px);
            border-radius: 5px;
            width: 90%;
            max-width: 500px;
            text-align: center;
            border: 1px solid #f5c6cb;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            z-index: 9999;
            animation: dropDown 0.5s ease-out forwards;
            font-size: clamp(0.85rem, 2vw, 0.95rem);
        }

        @keyframes dropDown {
            from {
                top: -100px;
                opacity: 0;
            }
            to {
                top: clamp(10px, 3vw, 20px);
                opacity: 1;
            }
        }

        .error_alert.hide {
            animation: moveUp 0.5s ease-out forwards;
        }

        @keyframes moveUp {
            from {
                top: clamp(10px, 3vw, 20px);
                opacity: 1;
            }
            to {
                top: -100px;
                opacity: 0;
            }
        }

        /* Tablet and larger screens */
        @media (min-width: 481px) {
            .form-group {
                flex-direction: row;
                gap: clamp(20px, 3vw, 25px);
            }

            .form-column {
                flex: 1;
            }

            .form-columns {
                grid-template-columns: repeat(2, 1fr);
            }

            .buttons,
            .step-buttons {
                justify-content: flex-end;
            }
        }

        /* Medium screens */
        @media (min-width: 769px) {
            .form-columns {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        /* Large screens */
        @media (min-width: 1024px) {
            .form-columns {
                grid-template-columns: repeat(4, 1fr);
            }

            .buttons,
            .step-buttons {
                justify-content: flex-end;
            }

            .form-progress {
                min-width: auto;
            }
        }

        /* Extra large screens */
        @media (min-width: 1440px) {
            .container {
                padding: 15px;
            }
        }

        /* Landscape mode adjustments */
        @media (max-height: 600px) and (orientation: landscape) {
            .form-progress-wrapper {
                margin-bottom: 0.5rem;
                padding: 0.5rem;
            }

            .form-groups {
                padding: 10px;
                margin-bottom: 10px;
            }

            .buttons,
            .step-buttons {
                margin-top: 10px;
                gap: 8px;
            }
        }

        /* Touch-friendly adjustments */
        @media (hover: none) and (pointer: coarse) {
            input,
            select,
            button {
                min-height: 44px;
                min-width: 44px;
            }

            .btn-submit,
            .btn-back,
            .btn-next,
            .swapButton,
            .add-category-btn {
                min-height: 48px;
            }
        }
    </style>
</head>

<body>
    <div id="senderAddressAlert" class="custom-alert">
        <div class="alert-content">
            <span class="close-btn" onclick="closeAlert('senderAddressAlert')">&times;</span>
            <h3>Sender Address Incomplete</h3>
            <p>Please fill out all required fields in the Sender Address section.</p>
        </div>
    </div>

    <div id="cargoDetailsAlert" class="custom-alert">
        <div class="alert-content">
            <span class="close-btn" onclick="closeAlert('cargoDetailsAlert')">&times;</span>
            <h3>Cargo Details Incomplete</h3>
            <p>Please fill out all required fields in the Cargo Details section.</p>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.getElementById("multiStepForm");
            const submitButton = form.querySelector(".btn-submit");

            submitButton.addEventListener("click", function(event) {
                let isFormValid = true;

                const senderFields = document.querySelectorAll('.sender input[required]');
                senderFields.forEach(function(field) {
                    if (field.value.trim() === "") {
                        isFormValid = false;
                    }
                });

                const cargoFields = document.querySelectorAll(
                    '.shipment_info input[required], .shipment_info select[required]');
                cargoFields.forEach(function(field) {
                    if (field.value.trim() === "" || field.value === null) {
                        isFormValid = false;
                    }
                });

                if (!isFormValid) {
                    event.preventDefault();
                    if (isSenderIncomplete(senderFields)) {
                        showAlert('Please fill out all required fields in the Sender Address section.');
                    } else if (isCargoIncomplete(cargoFields)) {
                        showAlert('Please fill out all required fields in the Cargo Details section.');
                    }
                }
            });
        });

        function showAlert(alertId) {
            document.getElementById(alertId).classList.add("show");
        }

        function closeAlert(alertId) {
            document.getElementById(alertId).classList.remove("show");
        }

        function isSenderIncomplete(fields) {
            return Array.from(fields).some(field => field.value.trim() === "");
        }

        function isCargoIncomplete(fields) {
            return Array.from(fields).some(field => field.value.trim() === "" || field.value === null);
        }
    </script>

    @section('content')
        <div class="wrapper">
            <div class="container">
                <div class="subtopbar">
                    <h2>Get Your Shipping Quote</h2>
                </div>

                <div class="form-progress-wrapper">
                    <div class="form-progress">
                        <div class="progress-step" id="stepRoute">
                            <div class="step-icon"><i class="fas fa-map-marker-alt"></i></div>
                            <span class="step-label">Route</span>
                        </div>
                        <div class="progress-line"></div>
                        <div class="progress-step" id="stepSender">
                            <div class="step-icon"><i class="fas fa-user"></i></div>
                            <span class="step-label">Sender</span>
                        </div>
                        <div class="progress-line"></div>
                        <div class="progress-step" id="stepCargo">
                            <div class="step-icon"><i class="fas fa-box"></i></div>
                            <span class="step-label">Cargo</span>
                        </div>
                    </div>
                </div>

                <form id="multiStepForm" action="{{ route('request.store') }}" method="POST">
                    @csrf

                    <div class="form-step active">
                        <h2>Route</h2>
                        <p class="description">You can switch the origin and destination.</p>
                        <div class="route-container">
                            <div class="form-column full">
                                <label for="origin">Origin</label>
                                <div class="input-with-icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <input type="text" id="origin" name="origin" value="{{ $origin }}"
                                        readonly />
                                </div>
                            </div>

                            <div class="form-column full">
                                <label for="destination">Destination</label>
                                <div class="input-with-icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <input type="text" id="destination" name="destination" value="{{ $destination }}"
                                        readonly />
                                </div>
                            </div>

                            <button id="swapButton" type="button" aria-label="Swap Ports" class="swapButton">
                                <i class="fas fa-exchange-alt"></i> Switch Route
                            </button>
                        </div>

                        <div class="step-buttons">
                            <button type="button" class="btn-back"
                                onclick="window.location.href='{{ route('routes') }}'">Cancel</button>
                            <button type="button" class="btn-next">Next <i class="fas fa-arrow-right"></i></button>
                        </div>
                    </div>

                    <script>
                        const swapButton = document.getElementById("swapButton");

                        swapButton.addEventListener("click", function() {
                            const originInput = document.getElementById("origin");
                            const destinationInput = document.getElementById("destination");

                            [originInput.value, destinationInput.value] = [destinationInput.value, originInput.value];

                            const icon = swapButton.querySelector("i");
                            icon.classList.add("rotate");

                            setTimeout(() => {
                                icon.classList.remove("rotate");
                            }, 500);
                        });
                    </script>

                    <div class="form-step">
                        <h2>Sender Address</h2>
                        <p class="description">Please provide the address details of the sender.</p>
                        <div class="sender">
                            <div class="form-group">
                                <div class="form-column">
                                    @if (Auth::check())
                                        <input type="hidden" name="fname" value="{{ Auth::user()->fname }} " readonly>
                                        <input type="hidden" name="lname" value="{{ Auth::user()->lname }}" readonly>
                                        <input type="hidden" name="phone" value="{{ Auth::user()->phone }}" readonly>
                                        <input type="hidden" name="email" value="{{ Auth::user()->email }}" readonly>
                                    @else
                                        <span class="username">Guest</span>
                                    @endif
                                    <label>Street</label>
                                    <input type="text" name="street" placeholder="Enter street" required>

                                    <label>Subdivision / Barangay</label>
                                    <input type="text" name="brgy" placeholder="Enter subdivision / barangay"
                                        required>

                                    <label>City</label>
                                    <input type="text" name="city" placeholder="Enter city" required>
                                </div>

                                <div class="form-column">
                                    <label>Province</label>
                                    <input type="text" name="province" placeholder="Enter province" required>

                                    <label>Postal / Zipcode</label>
                                    <input type="number" name="zipcode" placeholder="Enter postal code" required>

                                    <label>Region</label>
                                    <input type="number" name="region" placeholder="Enter region" required>
                                </div>
                            </div>
                        </div>
                        <div class="step-buttons">
                            <button type="button" class="btn-back">
                                <i class="fas fa-arrow-left"></i> Back
                            </button>
                            <button type="button" class="btn-next">
                                Next <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>

                    <div class="form-step">
                        <h2>Cargo Details</h2>
                        <p class="description">Provide the details of your cargo for shipping.</p>
                        <div class="shipment_info">
                            <div id="category-container">
                                <div class="form-groups">
                                    <div class="category">
                                        <label>Category</label>
                                        <select name="category[]" required>
                                            <option value="" disabled selected>Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->category }}">{{ $category->category }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-columns">
                                        <div class="dimension">
                                            <label>Length (m)</label>
                                            <input type="number" name="length[]" placeholder="Enter length" required>
                                        </div>
                                        <div class="dimension">
                                            <label>Width (m)</label>
                                            <input type="number" name="width[]" placeholder="Enter width" required>
                                        </div>
                                        <div class="dimension">
                                            <label>Height (m)</label>
                                            <input type="number" name="height[]" placeholder="Enter height" required>
                                        </div>
                                        <div class="dimension">
                                            <label>Weight (kg)</label>
                                            <input type="number" id="weight" name="weight[]"
                                                placeholder="Enter weight" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="add-category-btn" type="button" onclick="addCategory()">
                                <i class="fas fa-plus"></i> Add Category (<span id="category-count">1</span>)
                            </button>
                        </div>
                        <div class="buttons">
                            <button type="button" class="btn-back">
                                <i class="fas fa-arrow-left"></i> Back
                            </button>
                            <button type="submit" class="btn-submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div id="error-alert" class="error_alert" style="display: none;">
            <strong>Error:</strong> The entered weight exceeds the allowed limit!
        </div>

        <script>
            const steps = document.querySelectorAll(".form-step");
            const nextBtns = document.querySelectorAll(".btn-next");
            const backBtns = document.querySelectorAll(".btn-back");
            let currentStep = 0;

            const indicators = {
                route: document.getElementById("stepRoute"),
                sender: document.getElementById("stepSender"),
                cargo: document.getElementById("stepCargo"),
            };

            function showStep(index) {
                steps.forEach((step, i) => {
                    step.classList.toggle("active", i === index);
                });

                updateProgress();
            }

            function updateProgress() {
                // Check Route filled
                const origin = document.getElementById("origin").value;
                const destination = document.getElementById("destination").value;
                indicators.route.classList.toggle("complete", origin && destination);
                indicators.route.classList.toggle("active", currentStep === 0);

                // Check Sender filled
                const street = document.querySelector("[name='street']").value;
                const brgy = document.querySelector("[name='brgy']").value;
                const city = document.querySelector("[name='city']").value;
                const province = document.querySelector("[name='province']").value;
                const zipcode = document.querySelector("[name='zipcode']").value;
                const region = document.querySelector("[name='region']").value;
                const senderFilled = street && brgy && city && province && zipcode && region;
                indicators.sender.classList.toggle("complete", senderFilled);
                indicators.sender.classList.toggle("active", currentStep === 1);

                // Check Cargo filled
                const category = document.querySelector("[name='category[]']").value;
                const length = document.querySelector("[name='length[]']").value;
                const width = document.querySelector("[name='width[]']").value;
                const height = document.querySelector("[name='height[]']").value;
                const weight = document.querySelector("[name='weight[]']").value;
                const cargoFilled = category && length && width && height && weight;
                indicators.cargo.classList.toggle("complete", cargoFilled);
                indicators.cargo.classList.toggle("active", currentStep === 2);
            }

            nextBtns.forEach(btn => {
                btn.addEventListener("click", () => {
                    if (currentStep < steps.length - 1) {
                        currentStep++;
                        localStorage.setItem("formStep", currentStep);
                        showStep(currentStep);
                    }
                });
            });

            backBtns.forEach(btn => {
                btn.addEventListener("click", () => {
                    if (currentStep > 0) {
                        currentStep--;
                        localStorage.setItem("formStep", currentStep);
                        showStep(currentStep);
                    }
                });
            });

            document.querySelectorAll("input, select").forEach(input => {
                input.addEventListener("input", updateProgress);
            });

            showStep(currentStep);
        </script>

        <script>
            const steps = document.querySelectorAll(".form-step");
            const nextBtns = document.querySelectorAll(".btn-next");
            const backBtns = document.querySelectorAll(".btn-back");
            let currentStep = 0;

            const stepRoute = document.getElementById("stepRoute");
            const stepSender = document.getElementById("stepSender");
            const stepCargo = document.getElementById("stepCargo");
            const lines = document.querySelectorAll(".progress-line");

            function updateProgressSteps() {
                // Check completion
                const origin = document.getElementById("origin").value;
                const destination = document.getElementById("destination").value;
                const routeFilled = origin && destination;

                const street = document.querySelector("[name='street']").value;
                const brgy = document.querySelector("[name='brgy']").value;
                const city = document.querySelector("[name='city']").value;
                const province = document.querySelector("[name='province']").value;
                const zipcode = document.querySelector("[name='zipcode']").value;
                const region = document.querySelector("[name='region']").value;
                const senderFilled = street && brgy && city && province && zipcode && region;

                const category = document.querySelector("[name='category[]']").value;
                const length = document.querySelector("[name='length[]']").value;
                const width = document.querySelector("[name='width[]']").value;
                const height = document.querySelector("[name='height[]']").value;
                const weight = document.querySelector("[name='weight[]']").value;
                const cargoFilled = category && length && width && height && weight;

                // Reset all
                stepRoute.classList.remove("active", "complete");
                stepSender.classList.remove("active", "complete");
                stepCargo.classList.remove("active", "complete");
                lines.forEach(line => line.classList.remove("active"));

                // Set progress state
                if (routeFilled) stepRoute.classList.add("complete");
                else stepRoute.classList.add("active");

                if (senderFilled) {
                    stepSender.classList.add("complete");
                    lines[0].classList.add("active");
                } else if (routeFilled) {
                    stepSender.classList.add("active");
                }

                if (cargoFilled) {
                    stepCargo.classList.add("complete");
                    lines[1].classList.add("active");
                } else if (senderFilled) {
                    stepCargo.classList.add("active");
                }
            }

            // Bind navigation
            nextBtns.forEach(btn => {
                btn.addEventListener("click", () => {
                    if (currentStep < steps.length - 1) {
                        currentStep++;
                        showStep(currentStep);
                    }
                });
            });

            backBtns.forEach(btn => {
                btn.addEventListener("click", () => {
                    if (currentStep > 0) {
                        currentStep--;
                        showStep(currentStep);
                    }
                });
            });

            // Watch input changes
            document.querySelectorAll("input, select").forEach(input => {
                input.addEventListener("input", updateProgressSteps);
            });

            // Initial trigger
            updateProgressSteps();
        </script>

        <script>
            $(document).ready(function() {
                let maxWeight = 0;

                $.ajax({
                    url: "/get-weight-limit",
                    type: "GET",
                    dataType: "json",
                    success: function(response) {
                        console.log("Fetched Weight Limit:", response);
                        if (response.weight) {
                            maxWeight = parseFloat(response.weight);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log("AJAX Error:", error);
                    }
                });

                $("input[name='weight[]']").on("input", function() {
                    let inputWeight = parseFloat($(this).val());

                    if (inputWeight > maxWeight) {
                        showErrorAlert("We're Sorry, but the maximum allowed weight is " + maxWeight + " kg.");
                        $(this).val(maxWeight);
                    }
                });

                function showErrorAlert(message) {
                    let errorAlert = $("#error-alert");
                    errorAlert.html("<strong></strong> " + message);
                    errorAlert.show().removeClass("hide");

                    setTimeout(() => {
                        errorAlert.addClass("hide");
                        setTimeout(() => {
                            errorAlert.hide();
                        }, 500);
                    }, 3000);
                }
            });
        </script>

        <script>
            let maxWeight = 0;

            document.addEventListener("DOMContentLoaded", function() {
                fetch("/get-weight-limit")
                    .then(response => response.json())
                    .then(data => {
                        console.log("Fetched Weight Limit:", data);
                        if (data.weight) {
                            maxWeight = parseFloat(data.weight);
                        }
                    })
                    .catch(error => console.error("Fetch Error:", error));
            });

            function addCategory() {
                const categoryContainer = document.getElementById('category-container');
                const newCategory = `
                <div class="form-groups">
                    <div class="category">
                        <label>Category</label>
                        <select name="category[]" required>
                            <option value="" disabled selected>Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->category }}">{{ $category->category }}</option>
                            @endforeach
                        </select>   
                    </div>
                    <div class="form-columns">
                        <div class="dimension">
                            <label>Length (m)</label>
                            <input type="number" name="length[]" placeholder="Enter length" required>
                        </div>
                        <div class="dimension">
                            <label>Width (m)</label>
                            <input type="number" name="width[]" placeholder="Enter width" required>
                        </div>
                        <div class="dimension">
                            <label>Height (m)</label>
                            <input type="number" name="height[]" placeholder="Enter height" required>
                        </div>
                        <div class="dimension">
                            <label>Weight (kg)</label>
                            <input type="number" name="weight[]" placeholder="Enter weight" oninput="validateWeight(this)" required>
                        </div>
                    </div>
                    <button class="remove-category-btn" type="button" onclick="removeCategory(this)">
                        <i class="fas fa-trash-alt"></i> Remove
                    </button>
                </div>
            `;
                categoryContainer.insertAdjacentHTML('beforeend', newCategory);
                updateCategoryCount();
            }

            function validateWeight(input) {
                let inputWeight = parseFloat(input.value);

                if (inputWeight > maxWeight) {
                    showErrorAlert("We're sorry, but the maximum allowed weight is " + maxWeight + " kg.");
                    input.value = maxWeight;
                }
            }

            function removeCategory(button) {
                button.parentElement.remove();
                updateCategoryCount();
            }

            function updateCategoryCount() {
                const count = document.querySelectorAll('#category-container .form-groups').length;
                document.getElementById('category-count').textContent = count;
            }

            function showErrorAlert(message) {
                let errorAlert = document.getElementById("error-alert");
                errorAlert.innerHTML = "<strong></strong> " + message;
                errorAlert.style.display = "block";
                errorAlert.classList.remove("hide");

                setTimeout(() => {
                    errorAlert.classList.add("hide");
                    setTimeout(() => {
                        errorAlert.style.display = "none";
                    }, 500);
                }, 3000);
            }
        </script>
        
    @endsection
</body>

</html>
