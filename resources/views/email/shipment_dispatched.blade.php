<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background: #f8f9fa;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Arial, sans-serif;
            padding: 30px 20px;
        }
        .email-container {
            max-width: 600px;
            margin: auto;
            background: #ffffff;
            border-radius: 8px;
            border: 1px solid #e1e4e8;
            overflow: hidden;
        }
        .header {
            padding: 30px 40px;
            border-bottom: 1px solid #e1e4e8;
            text-align: center;
        }
        .header img {
            width: 100px;
            margin-bottom: 10px;
        }
        .header h1 {
            color: #24292e;
            font-size: 22px;
            font-weight: 600;
        }
        .content {
            padding: 40px;
        }
        .greeting {
            font-size: 16px;
            color: #24292e;
            margin-bottom: 20px;
        }
        .message {
            font-size: 15px;
            color: #586069;
            line-height: 1.6;
        }
        .shipment-box {
            background: #f6f8fa;
            border: 1px solid #e1e4e8;
            border-radius: 6px;
            padding: 20px;
            margin: 30px 0;
        }
        .shipment-label {
            font-size: 13px;
            color: #586069;
            margin-bottom: 6px;
            font-weight: 500;
        }
        .shipment-id {
            font-size: 18px;
            color: #24292e;
            font-weight: 600;
            font-family: 'SF Mono', Monaco, 'Courier New', monospace;
        }
        .footer {
            background: #f6f8fa;
            padding: 25px 40px;
            text-align: center;
            border-top: 1px solid #e1e4e8;
            font-size: 13px;
            color: #586069;
        }
        .company-name {
            font-weight: 600;
            color: #24292e;
        }
        @media only screen and (max-width: 600px) {
            .header, .content, .footer {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h1>Shipment Arrived at Destination</h1>
        </div>

        <div class="content">
            <p class="greeting">Hi <strong>{{ $shipment->fname }} {{ $shipment->lname }}</strong>,</p>

            <p class="message">
                Your shipment <span class="shipment-id">#{{ $shipment->shipment_id }}</span> has successfully arrived at its destination.
            </p>

            <div class="shipment-box">
                <div class="shipment-label">Delivery Location</div>
                <div class="shipment-id">{{ $shipment->destination }}</div>
            </div>

            <p class="message">
                Thank you for using <strong>Navi Cargo</strong>. You can track your shipment status in your dashboard.
            </p>
        </div>

        <div class="footer">
            © {{ date('Y') }} <span class="company-name">Navi Cargo</span> — All Rights Reserved
        </div>
    </div>
</body>
</html>
