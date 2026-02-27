<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>پیام جدید تماس با ما</title>
</head>
<body style="font-family: Tahoma, Arial, sans-serif; line-height: 1.9; color: #111827;">
    <h2 style="margin-bottom: 12px;">پیام جدید از صفحه تماس با ما</h2>

    <p><strong>نام کاربر:</strong> {{ $data['name'] ?? '-' }}</p>
    <p><strong>ایمیل کاربر:</strong> {{ $data['email'] ?? '-' }}</p>
    <p><strong>یوزرنیم:</strong> {{ $data['username'] ?? '-' }}</p>
    <p><strong>شماره تماس:</strong> {{ $data['phone'] ?? '-' }}</p>
    <p><strong>آیدی کاربر:</strong> {{ $data['user_id'] ?? '-' }}</p>
    <p><strong>زمان ارسال:</strong> {{ $data['submitted_at'] ?? '-' }}</p>

    <hr style="margin: 16px 0;">

    <p><strong>متن پیام:</strong></p>
    <div style="white-space: pre-wrap; background: #f3f4f6; border: 1px solid #e5e7eb; border-radius: 8px; padding: 12px;">
        {{ $data['message'] ?? '-' }}
    </div>
</body>
</html>
