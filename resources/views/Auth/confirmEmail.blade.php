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
                    <li><a href="{{ route($guard . '.lightDash') }}"><i class="fas fa-home"></i> الرئيسية</a></li>
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

<section class="email-verification-section">
    <div class="email-verification-container">
        <div class="email-verification-card">
            <div class="verification-success-icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <h1 class="verification-success-title">تم التحقق من البريد الإلكتروني بنجاح!</h1>
            <p class="verification-success-message">تهانينا! لقد تم التحقق من بريدك الإلكتروني بنجاح. يمكنك الآن تسجيل الدخول إلى حسابك والاستفادة من جميع ميزات منصة FreelanGo.</p>

            <div class="verification-process-steps">
                <div class="verification-step">
                    <i class="fas fa-check-circle step-icon"></i>
                    <div class="step-details">
                        <h3 class="step-title">إنشاء الحساب</h3>
                        <p class="step-description">لقد أكملت بنجاح إنشاء حسابك على المنصة</p>
                    </div>
                </div>
                <div class="verification-step">
                    <i class="fas fa-check-circle step-icon"></i>
                    <div class="step-details">
                        <h3 class="step-title">التحقق من البريد الإلكتروني</h3>
                        <p class="step-description">تم التحقق من بريدك الإلكتروني بنجاح</p>
                    </div>
                </div>
                <div class="verification-step">
                    <i class="fas fa-arrow-right step-icon"></i>
                    <div class="step-details">
                        <h3 class="step-title">تسجيل الدخول</h3>
                        <p class="step-description">يمكنك الآن تسجيل الدخول إلى حسابك</p>
                    </div>
                </div>
            </div>

            <div class="verification-action-buttons">
                <a href="{{ route('login') }}" class="btn btn-primary btn-verify-login">
                    <i class="fas fa-sign-in-alt"></i> تسجيل الدخول
                </a>
                <a href="{{ route($guard . '.lightDash') }}" class="btn btn-outline-primary btn-verify-home">
                    <i class="fas fa-home"></i> العودة إلى الصفحة الرئيسية
                </a>
            </div>
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
                        <li><a href="{{ route($guard . '.lightDash') }}"><i class="fas fa-chevron-left"></i> الرئيسية</a></li>
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
