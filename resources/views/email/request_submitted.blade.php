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
        }

        .header h1 {
            color: #24292e;
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 8px;
            text-align: center;
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
            background: #fffbf0;
            border: 1px solid #f0e6d2;
            border-radius: 6px;
            padding: 20px;
            margin: 24px 0;
        }

        .status-box p {
            color: #735c0f;
            font-size: 14px;
            line-height: 1.6;
        }

        .divider {
            height: 1px;
            background: #e1e4e8;
            margin: 32px 0;
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
            <h1>Thank you for submitting your request</h1>
        </div>

        <div class="content">
            <p class="greeting">
                Hi <strong>{{ $name }}</strong>,
            </p>

            <p class="message">
                We've successfully received your shipping request. Our team is now reviewing the details you submitted.
            </p>

            <div class="shipment-box">
                <div class="shipment-label">Your Shipment ID</div>
                <div class="shipment-id">{{ $shipmentId }}</div>
            </div>

            <div class="status-box">
                <p>
                    <strong>Status: Pending</strong><br>
                    Please wait for the approval of your request. We will notify you once a decision has been made.
                </p>
            </div>

            <p class="message">
                If additional information is needed, our team will contact you using the details you provided.
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