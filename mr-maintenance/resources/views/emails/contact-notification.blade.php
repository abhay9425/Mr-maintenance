<!DOCTYPE html>
<html>
<head>
<style>
  body { font-family: Arial, sans-serif; background: #f0f2f5; margin: 0; padding: 20px; }
  .container { max-width: 580px; margin: 0 auto; background: #fff; border-radius: 12px; overflow: hidden; }
  .header { background: #0A1628; padding: 24px 32px; }
  .header h1 { color: #fff; margin: 0; font-size: 20px; }
  .body { padding: 28px 32px; }
  .body p { color: #555; line-height: 1.7; font-size: 14px; }
  .detail-table { width: 100%; border-collapse: collapse; margin: 16px 0; }
  .detail-table tr td { padding: 10px 14px; border-bottom: 1px solid #f0f0f0; font-size: 14px; }
  .detail-table tr td:first-child { color: #888; font-weight: 600; width: 120px; }
  .detail-table tr td:last-child { color: #0A1628; font-weight: 600; }
  .message-box { background: #f8f9fa; border-left: 4px solid #FF6B35; padding: 16px 20px; border-radius: 0 8px 8px 0; margin: 16px 0; color: #333; font-size: 14px; line-height: 1.7; }
  .reply-btn { display: inline-block; background: #FF6B35; color: #fff; padding: 10px 24px; border-radius: 50px; text-decoration: none; font-weight: 700; font-size: 14px; margin-top: 8px; }
  .footer { background: #f8f9fa; padding: 16px 32px; text-align: center; color: #888; font-size: 12px; }
</style>
</head>
<body>
<div class="container">
  <div class="header">
    <h1>✉️ New Contact Message</h1>
  </div>
  <div class="body">
    <p>A new contact message has been submitted on <strong>Mr. Maintenance</strong>.</p>
    <table class="detail-table">
      <tr><td>Name</td><td>{{ $contactData['name'] }}</td></tr>
      <tr><td>Email</td><td>{{ $contactData['email'] }}</td></tr>
      <tr><td>Phone</td><td>{{ $contactData['phone'] ?? 'Not provided' }}</td></tr>
    </table>

    <p style="margin-bottom:4px; font-weight:600; color:#0A1628;">Message:</p>
    <div class="message-box">
      {{ $contactData['message'] }}
    </div>

    <a href="mailto:{{ $contactData['email'] }}" class="reply-btn">📧 Reply to {{ $contactData['name'] }}</a>
  </div>
  <div class="footer">Mr. Maintenance | &copy; 2026</div>
</div>
</body>
</html>
