<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: 'Inter', sans-serif; color: #1B2F52; line-height: 1.6; }
        .container { max-w: 600px; margin: 0 auto; padding: 20px; }
        .header { background: #0A1628; color: #D4A017; padding: 20px; text-align: center; }
        .content { padding: 30px 20px; border: 1px solid #EEF2F7; }
        .reference { font-size: 24px; font-weight: bold; color: #B8860B; padding: 10px 0; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Kamara School Admissions</h2>
        </div>
        <div class="content">
            <p>Dear {{ $admission->parent_name }},</p>
            
            <p>Thank you for submitting an application for <strong>{{ $admission->student_name }}</strong> to join Kamara School in Grade {{ $admission->grade_applying_for }}.</p>
            
            <p>We have successfully received your application and attached documents.</p>
            
            <p>Your unique application reference number is:</p>
            <div class="reference">{{ $admission->reference }}</div>
            
            <p>Please keep this reference number safe, as you will need it for any future correspondence regarding this application.</p>
            
            <p><strong>Next Steps:</strong></p>
            <ul>
                <li>Our admissions team will review your application within 3-5 business days.</li>
                <li>You will receive another email once the initial review is complete, detailing any further steps such as an interview or entrance assessment.</li>
            </ul>
            
            <p>If you have any immediate questions, please don't hesitate to reply to this email or call us at +251 911 234 567.</p>
            
            <p>Warm regards,<br>Kamara School Admissions Team</p>
        </div>
    </div>
</body>
</html>
