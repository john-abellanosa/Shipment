<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #f8f9fa;
            padding: 40px 20px;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
        }

        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            border: 1px solid #e1e4e8;
        }

        .header {
            padding: 32px 40px;
            border-bottom: 1px solid #e1e4e8;
            text-align: center;
        }

        .header img {
            max-width: 120px;
            margin-bottom: 12px;
        }

        .header h1 {
            color: #24292e;
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 4px;
        }

        .header p {
            color: #586069;
            font-size: 15px;
        }

        .content {
            padding: 40px;
        }

        .greeting {
            font-size: 16px;
            color: #24292e;
            margin-bottom: 24px;
        }

        .message {
            font-size: 15px;
            color: #586069;
            line-height: 1.6;
            margin-bottom: 24px;
        }

        .shipment-box {
            background: #f6f8fa;
            border: 1px solid #e1e4e8;
            border-radius: 6px;
            padding: 24px;
            margin: 32px 0;
        }

        .shipment-label {
            font-size: 13px;
            color: #586069;
            margin-bottom: 8px;
            font-weight: 500;
        }

        .shipment-id {
            font-size: 20px;
            color: #24292e;
            font-weight: 600;
            font-family: 'SF Mono', Monaco, 'Courier New', monospace;
        }

        .status-box {
            background: #fffaf0;
            border: 1px solid #fcd34d;
            border-radius: 6px;
            padding: 20px;
            margin: 24px 0;
        }

        .status-box p {
            color: #92400e;
            font-size: 14px;
            line-height: 1.6;
        }

        .footer {
            background: #f6f8fa;
            padding: 24px 40px;
            text-align: center;
            border-top: 1px solid #e1e4e8;
        }

        .footer-text {
            font-size: 13px;
            color: #586069;
        }

        .company-name {
            font-weight: 600;
            color: #24292e;
        }

        @media only screen and (max-width: 600px) {
            body {
                padding: 20px 10px;
            }

            .header,
            .content,
            .footer {
                padding: 24px 20px;
            }

            .shipment-id {
                font-size: 18px;
            }
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="header">
            <h1>Shipment Rescheduled</h1>
            <p>Your shipping request has been rescheduled</p>
        </div>

        <div class="content">
            <p class="greeting">
                Hi <strong>{{ $shipment->fname }} {{ $shipment->lname }}</strong>,
            </p>

            <p class="message">
                Your shipment request has been rescheduled. Please see the updated dispatch date below.
            </p>

            <div class="shipment-box">
                <div class="shipment-label">Your Shipment ID</div>
                <div class="shipment-id">{{ $shipment->shipment_id }}</div>
            </div>

            <div class="status-box">
                <p>
                    📅 <strong>New Dispatch Date:</strong> {{ $formattedDate }}<br>
                    Please make sure your shipment is ready for delivery on the new date.
                </p>
            </div>

            <p class="message">
                If you have any questions regarding the reschedule, feel free to contact our support team.
            </p>
        </div>

        <div class="footer">
            <p class="footer-text">
                © {{ date('Y') }} <span class="company-name">Navi Cargo</span> — All Rights Reserved
            </p>
        </div>
    </div>
</body>

</html>
