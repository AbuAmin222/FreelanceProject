<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول - FreelanGo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.rtl.min.css">

    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/pages.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="navbar">
        <div class="navbar-container">
            <div class="navbar-brand">
                <i class="fas fa-rocket"></i> FreelanGo
            </div>

            <div class="navbar-content">
                <ul class="navbar-links">
                    <li><a href="index.html"><i class="fas fa-home"></i> الرئيسية</a></li>
                    <li><a href="projects.html"><i class="fas fa-project-diagram"></i> المشاريع</a></li>
                    <li><a href="about.html"><i class="fas fa-info-circle"></i> عن المنصة</a></li>
                    <li><a href="contact.html"><i class="fas fa-envelope"></i> اتصل بنا</a></li>
                </ul>
            </div>

            <div class="navbar-actions">
                <a href="{{ route('register') }}" class="btn-apply"><i class="fas fa-user-plus"></i> إنشاء حساب</a>
            </div>
        </div>
    </nav>

     <section class="confirmation-section">
        <div class="confirmation-container">
            <div class="confirmation-icon">
                <i class="fas fa-paper-plane"></i>
            </div>

            <div class="confirmation-header">
                <h1>تم إرسال رابط التحقق</h1>
            </div>

            <div class="confirmation-message">
                <p>لقد أرسلنا رابط تحقق إلى بريدك الإلكتروني <strong>{{ $email }}</strong>. يرجى التحقق من صندوق الوارد الخاص بك.</p>
                <p>إذا لم تجد البريد الإلكتروني، يرجى التحقق من مجلد الرسائل غير المرغوب فيها (Spam) أو إعادة إرسال الرابط.</p>
            </div>

            <button class="btn-home">
                <a href="{{ route($guard . '.lightDash') }}" style="color: white; text-decoration: none;">العودة إلى الصفحة الرئيسية</a>
            </button>

            <div class="resend-link">
                لم تصلك الرسالة؟ <a href="{{ route($guard . '.emailNotification', compact('encryptedData')) }}">إعادة إرسال رابط التحقق</a>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>عن FreelanGo</h3>
                    <p>منصة عربية تربط بين أصحاب المشاريع والمحترفين المستقلين لتنفيذ الأعمال بكفاءة وابتكارية.</p>
                    <div class="social-links">
                        <a href="http://facebook.com" target="_blank" style="text-decoration: none;"><i class="fab fa-facebook-f"></i></a>
                        <a href="http://twitter.com" target="_blank" style="text-decoration: none;"><i class="fab fa-twitter"></i></a>
                        <a href="http://linkedin.com" target="_blank" style="text-decoration: none;"><i class="fab fa-linkedin-in"></i></a>
                        <a href="http://instagram.com" target="_blank" style="text-decoration: none;"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>

                <div class="footer-column">
                    <h3>روابط سريعة</h3>
                    <ul class="footer-links">
                        <li><a href="index.html"><i class="fas fa-chevron-left"></i> الرئيسية</a></li>
                        <li><a href="projects.html"><i class="fas fa-chevron-left"></i> المشاريع</a></li>
                        <li><a href="how-it-works.html"><i class="fas fa-chevron-left"></i> كيف تعمل المنصة</a></li>
                        <li><a href="pricing.html"><i class="fas fa-chevron-left"></i> الأسعار</a></li>
                    </ul>
                </div>

                <div class="footer-column">
                    <h3>الدعم والمساعدة</h3>
                    <ul class="footer-links">
                        <li><a href="faq.html"><i class="fas fa-chevron-left"></i> الأسئلة الشائعة</a></li>
                        <li><a href="support.html"><i class="fas fa-chevron-left"></i> مركز الدعم</a></li>
                        <li><a href="terms.html"><i class="fas fa-chevron-left"></i> الشروط والأحكام</a></li>
                        <li><a href="privacy.html"><i class="fas fa-chevron-left"></i> سياسة الخصوصية</a></li>
                    </ul>
                </div>
            </div>

            <div class="copyright">
                © 2023 FreelanGo. جميع الحقوق محفوظة.
            </div>
        </div>
    </footer>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/js/apps.js') }}"></script>

</body>
</html>
