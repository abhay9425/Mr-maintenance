<!DOCTYPE html>
<html>
<head>
<style>
  body { font-family: Arial, sans-serif; background: #f0f2f5; margin: 0; padding: 20px; }
  .container { max-width: 580px; margin: 0 auto; background: #fff; border-radius: 12px; overflow: hidden; }
  .header { background: #FF6B35; padding: 24px 32px; }
  .header h1 { color: #fff; margin: 0; font-size: 20px; }
  .body { padding: 28px 32px; }
  .detail-table { width: 100%; border-collapse: collapse; margin: 16px 0; }
  .detail-table tr td { padding: 10px 14px; border-bottom: 1px solid #f0f0f0; font-size: 14px; }
  .detail-table tr td:first-child { color: #888; font-weight: 600; width: 140px; }
  .link { color: #FF6B35; }
  .footer { background: #f8f9fa; padding: 16px 32px; text-align: center; color: #888; font-size: 12px; }
</style>
</head>
<body>
<div class="container">
  <div class="header">
    <h1>🔔 New Booking Alert!</h1>
  </div>
  <div class="body">
    <p>A new service booking has been submitted on <strong>Mr. Maintenance</strong>.</p>
    <table class="detail-table">
      <tr><td>Booking ID</td><td>#{{ $booking->id }}</td></tr>
      <tr><td>Customer</td><td>{{ $booking->name }}</td></tr>
      <tr><td>Email</td><td>{{ $booking->email }}</td></tr>
      <tr><td>Phone</td><td>{{ $booking->phone }}</td></tr>
      <tr><td>City</td><td>{{ $booking->city }}</td></tr>
      <tr><td>Address</td><td>{{ $booking->address ?: 'Not provided' }}</td></tr>
      <tr><td>Service</td><td>{{ $booking->service->name }}</td></tr>
      <tr><td>Date</td><td>{{ $booking->booking_date->format('d M Y') }}</td></tr>
      <tr><td>Message</td><td>{{ $booking->message ?: 'No additional message' }}</td></tr>
    </table>
    <p>Please confirm this booking at your earliest convenience.</p>
  </div>
  <div class="footer">Mr. Maintenance Admin Panel | &copy; 2026</div>
</div>
</body>
</html>
