<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<style>
  body { font-family: 'Poppins', Arial, sans-serif; background: #f0f2f5; margin: 0; padding: 20px; }
  .container { max-width: 580px; margin: 0 auto; background: #fff; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 24px rgba(0,0,0,0.1); }
  .header { background: linear-gradient(135deg, #0A1628, #1a2f52); padding: 36px 32px; text-align: center; }
  .header h1 { color: #fff; margin: 0; font-size: 22px; }
  .header .icon { font-size: 48px; margin-bottom: 12px; }
  .body { padding: 32px; }
  .body h2 { color: #0A1628; font-size: 20px; margin-bottom: 8px; }
  .body p { color: #555; line-height: 1.7; }
  .detail-table { width: 100%; border-collapse: collapse; margin: 20px 0; }
  .detail-table tr td { padding: 10px 14px; border-bottom: 1px solid #f0f0f0; font-size: 14px; }
  .detail-table tr td:first-child { color: #888; font-weight: 600; width: 140px; }
  .detail-table tr td:last-child { color: #0A1628; font-weight: 600; }
  .btn { display: inline-block; background: #FF6B35; color: #fff; padding: 12px 28px; border-radius: 50px; text-decoration: none; font-weight: 700; margin: 16px 0; }
  .footer { background: #f8f9fa; padding: 20px 32px; text-align: center; color: #888; font-size: 12px; }
  .footer a { color: #FF6B35; text-decoration: none; }
</style>
</head>
<body>
<div class="container">
  <div class="header">
    <div class="icon">✅</div>
    <h1>Booking Confirmed!</h1>
    <p style="color:rgba(255,255,255,0.7);margin:0;font-size:14px;">Mr. Maintenance — Your Trusted Home Maintenance Partner</p>
  </div>
  <div class="body">
    <h2>Hello, {{ $booking->name }}!</h2>
    <p>Thank you for booking with <strong>Mr. Maintenance</strong>. We have received your service request and our team will contact you within <strong>1 hour</strong> to confirm the appointment.</p>

    <table class="detail-table">
      <tr><td>Booking ID</td><td>#{{ $booking->id }}</td></tr>
      <tr><td>Service</td><td>{{ $booking->service->name }}</td></tr>
      <tr><td>Date</td><td>{{ $booking->booking_date->format('d M Y') }}</td></tr>
      <tr><td>City</td><td>{{ $booking->city }}</td></tr>
      <tr><td>Address</td><td>{{ $booking->address ?: 'Not provided' }}</td></tr>
      <tr><td>Status</td><td>Pending Confirmation</td></tr>
    </table>

    <p>If you have any questions or need to change your appointment, please contact us:</p>
    <a href="tel:+918858448111" class="btn">📞 +91 8858448111</a>
    <p style="margin-top:8px;"><a href="https://wa.me/918858448111">💬 WhatsApp Us</a></p>
  </div>
  <div class="footer">
    <p><strong>Mr. Maintenance</strong> | SA 4/4-3 Pandeypur Daulatpur, Varanasi, UP 221002</p>
    <p>&copy; 2026</p>
  </div>
</div>
</body>
</html>
