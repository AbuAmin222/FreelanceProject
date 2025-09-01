<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>العروض المقدمة - FreelanGo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.rtl.min.css">
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/pages.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet">
</head>

<body>
    <nav class="navbar">
        <div class="container">
            <div class="navbar-brand">
                <i class="fas fa-rocket"></i> FreelanGo
            </div>
            <ul class="navbar-links">
                <li><a href="index.html"><i class="fas fa-home"></i> الرئيسية</a></li>
                <li><a href="projects.html"><i class="fas fa-project-diagram"></i> المشاريع</a></li>
                <li><a href="profile.html"><i class="fas fa-user-circle"></i> حسابي</a></li>
                <li><a href="messages.html"><i class="fas fa-comments"></i> الرسائل</a></li>
            </ul>
            <div class="navbar-actions">
                <a href="{{ route('login') }}" class="btn-apply"><i class="fas fa-sign-in-alt"></i> تسجيل الدخول</a>
            </div>
        </div>
    </nav>

    <header class="project-header">
        <div class="container">
            <h1><i class="fas fa-file-invoice-dollar"></i> العروض المقدمة على المشروع</h1>
        </div>
    </header>

    <div class="container">
        <div class="project-info">
            <h2 class="project-title"><i class="fas fa-paint-brush"></i> تصميم واجهة متجر إلكتروني</h2>
            <p class="project-description">
                نبحث عن مصمم محترف لإنشاء واجهة متجر تجاوبية باستخدام Figma أو Adobe XD. يجب أن تكون التصاميم عصرية
                وتواكب أحدث اتجاهات UI/UX. المتجر سيكون لمنتجات إلكترونية ويجب أن يكون التصميم سهل الاستخدام وجذاب
                بصرياً مع مراعاة تجربة المستخدم على مختلف الأجهزة.
            </p>
            <div class="project-meta">
                <div class="meta-item"><i class="fas fa-money-bill"></i> 300$ - 500$</div>
                <div class="meta-item"><i class="fas fa-clock"></i> 5 أيام</div>
                <div class="meta-item"><i class="fas fa-briefcase"></i> 3 عروض</div>
                <span class="project-category">تصميم جرافيك</span>
            </div>
        </div>

        <div class="layout">
            <main class="bids-section">
                <div class="section-header">
                    <h2><i class="fas fa-file-alt"></i> العروض المقدمة</h2>
                    <div class="sort-container">
                        <label for="sort"><i class="fas fa-sort"></i> ترتيب حسب:</label>
                        <select id="sort">
                            <option>الأحدث</option>
                            <option>الأقل سعراً</option>
                            <option>الأقصر مدة</option>
                            <option>الأعلى تقييماً</option>
                        </select>
                    </div>
                </div>

                <div class="bids-container">
                    <div class="bid-card">
                        <div class="bid-header">
                            <div class="bid-user">
                                <div class="user-avatar">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="user-info">
                                    <h3>أحمد محمد</h3>
                                    <div class="user-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <span>(4.5)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="bid-price">450$</div>
                        </div>

                        <div class="bid-details">
                            <div class="bid-detail">
                                <span class="detail-label">المدة المتوقعة</span>
                                <span class="detail-value">4 أيام</span>
                            </div>
                            <div class="bid-detail">
                                <span class="detail-label">عدد التعديلات</span>
                                <span class="detail-value">3 مرات</span>
                            </div>
                            <div class="bid-detail">
                                <span class="detail-label">المشاريع المنجزة</span>
                                <span class="detail-value">24 مشروع</span>
                            </div>
                        </div>

                        <div class="bid-message">
                            السلام عليكم، لدي خبرة 5 سنوات في تصميم واجهات المتاجر الإلكترونية. سأقوم بتصميم واجهة
                            متجاوبة تعمل على جميع الأجهزة مع مراعاة تجربة المستخدم وأحدث اتجاهات التصميم. سأقدم 3 تصاميم
                            أولية للاختيار منها قبل البدء في التنفيذ النهائي.
                        </div>

                        <div class="bid-actions">
                            <button class="btn-action btn-accept"><i class="fas fa-check-circle"></i> قبول
                                العرض</button>
                            <button class="btn-action btn-reject"><i class="fas fa-times-circle"></i> رفض العرض</button>
                            <button class="btn-action"><i class="fas fa-envelope"></i> مراسلة</button>
                        </div>
                    </div>

                    <div class="bid-card">
                        <div class="bid-header">
                            <div class="bid-user">
                                <div class="user-avatar">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="user-info">
                                    <h3>سارة عبد الله</h3>
                                    <div class="user-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <span>(4.0)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="bid-price">380$</div>
                        </div>

                        <div class="bid-details">
                            <div class="bid-detail">
                                <span class="detail-label">المدة المتوقعة</span>
                                <span class="detail-value">5 أيام</span>
                            </div>
                            <div class="bid-detail">
                                <span class="detail-label">عدد التعديلات</span>
                                <span class="detail-value">غير محدود</span>
                            </div>
                            <div class="bid-detail">
                                <span class="detail-label">المشاريع المنجزة</span>
                                <span class="detail-value">17 مشروع</span>
                            </div>
                        </div>

                        <div class="bid-message">
                            أهلاً بك، أنا مصممة واجهات مستخدم متخصصة في تصميم المتاجر الإلكترونية. سأقدم لك تصميماً
                            عصرياً وجذاباً مع التركيز على تحويل الزوار إلى عملاء. سأضمن أن التصميم يعمل بكفاءة على
                            الجوال والحاسوب. يمكنني أيضاً تقديم خدمات تصميم الشعارات والهوية البصرية بأسعار تنافسية.
                        </div>

                        <div class="bid-actions">
                            <button class="btn-action btn-accept"><i class="fas fa-check-circle"></i> قبول
                                العرض</button>
                            <button class="btn-action btn-reject"><i class="fas fa-times-circle"></i> رفض
                                العرض</button>
                            <button class="btn-action"><i class="fas fa-envelope"></i> مراسلة</button>
                        </div>
                    </div>

                    <div class="bid-card">
                        <div class="bid-header">
                            <div class="bid-user">
                                <div class="user-avatar">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="user-info">
                                    <h3>خالد حسن</h3>
                                    <div class="user-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <span>(5.0)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="bid-price">500$</div>
                        </div>

                        <div class="bid-details">
                            <div class="bid-detail">
                                <span class="detail-label">المدة المتوقعة</span>
                                <span class="detail-value">3 أيام</span>
                            </div>
                            <div class="bid-detail">
                                <span class="detail-label">عدد التعديلات</span>
                                <span class="detail-value">5 مرات</span>
                            </div>
                            <div class="bid-detail">
                                <span class="detail-label">المشاريع المنجزة</span>
                                <span class="detail-value">42 مشروع</span>
                            </div>
                        </div>

                        <div class="bid-message">
                            تحية طيبة، لدي خبرة واسعة في تصميم واجهات المتاجر الإلكترونية بمختلف أنواعها. سأقدم لك واجهة
                            احترافية مع التركيز على تحسين تجربة المستخدم وزيادة معدلات التحويل. سأقوم بتصميم 3 نماذج
                            أولية للصفحة الرئيسية وصفحة المنتج وصفحة الدفع لتختار منها ما يناسبك. كما سأوفر لك ملفات
                            التصميم كاملة مع دليل الألوان والخطوط.
                        </div>

                        <div class="bid-actions">
                            <button class="btn-action btn-accept"><i class="fas fa-check-circle"></i> قبول
                                العرض</button>
                            <button class="btn-action btn-reject"><i class="fas fa-times-circle"></i> رفض
                                العرض</button>
                            <button class="btn-action"><i class="fas fa-envelope"></i> مراسلة</button>
                        </div>
                    </div>
                </div>

                <div class="add-bid-section">
                    <div class="form-header">
                        <i class="fas fa-plus-circle"></i>
                        <h2>إضافة عرض جديد</h2>
                    </div>

                    <form id="bidForm">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="bidAmount"><i class="fas fa-money-bill-wave"></i> قيمة العرض ($)</label>
                                <input type="number" id="bidAmount" placeholder="أدخل قيمة العرض" min="100"
                                    max="1000" required>
                            </div>

                            <div class="form-group">
                                <label for="bidDuration"><i class="fas fa-clock"></i> المدة المتوقعة (أيام)</label>
                                <input type="number" id="bidDuration" placeholder="عدد الأيام اللازمة"
                                    min="1" max="30" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="bidMessage"><i class="fas fa-comment-alt"></i> رسالة العرض</label>
                            <textarea id="bidMessage" placeholder="صف عرضك، خبراتك السابقة، ولماذا أنت الأنسب لهذا المشروع..." required></textarea>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="revisions"><i class="fas fa-sync-alt"></i> عدد التعديلات المتاحة</label>
                                <select id="revisions" required>
                                    <option value="1">مرة واحدة</option>
                                    <option value="2">مرتين</option>
                                    <option value="3">ثلاث مرات</option>
                                    <option value="unlimited">غير محدود</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="deliverables"><i class="fas fa-file-download"></i> الملفات المرفقة</label>
                                <input type="file" id="deliverables">
                            </div>
                        </div>

                        <button type="submit" class="btn-submit"><i class="fas fa-paper-plane"></i> تقديم
                            العرض</button>
                    </form>
                </div>
            </main>
        </div>
    </div>

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
                        <li><a href="#"><i class="fas fa-chevron-left"></i> الرئيسية</a></li>
                        <li><a href="#"><i class="fas fa-chevron-left"></i> المشاريع</a></li>
                        <li><a href="#"><i class="fas fa-chevron-left"></i> المستقلون</a></li>
                        <li><a href="#"><i class="fas fa-chevron-left"></i> المدونة</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>الدعم والمساعدة</h3>
                    <ul class="footer-links">
                        <li><a href="#"><i class="fas fa-chevron-left"></i> مركز المساعدة</a></li>
                        <li><a href="#"><i class="fas fa-chevron-left"></i> الأسئلة الشائعة</a></li>
                        <li><a href="#"><i class="fas fa-chevron-left"></i> سياسة الاستخدام</a></li>
                        <li><a href="#"><i class="fas fa-chevron-left"></i> تواصل معنا</a></li>
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
