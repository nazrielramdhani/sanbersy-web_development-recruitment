<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Konfirmasi Pendaftaran Event</title>
</head>
<body style="font-family: Arial, sans-serif; background:#f4f4f4; padding: 30px;">
    <div style="max-width:600px; margin:0 auto; background:#fff; border-radius:8px; padding:30px;">
        <h2 style="color:#2563eb;">EventApp</h2>
        <p>Halo, <strong>{{ $userName }}</strong>!</p>
        <p>Terima kasih telah mendaftar event berikut:</p>
        <div style="background:#f0f9ff; border-left:4px solid #2563eb; padding:16px; margin:20px 0; border-radius:4px;">
            <h3 style="margin:0 0 8px; color:#1e40af;">{{ $eventName }}</h3>
            <p style="margin:0; color:#475569;">
                📅 {{ \Carbon\Carbon::parse($eventDate)->format('d M Y, H:i') }} WIB
            </p>
        </div>
        <p>Terima kasih telah mendaftar event ini.</p>
        <p style="color:#94a3b8; font-size:12px;">Email ini dikirim otomatis oleh sistem EventApp.</p>
    </div>
</body>
</html>