<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إنشاء حساب - FreelanGo</title>
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
                <a href="{{ route('login') }}" class="btn-apply"><i class="fas fa-sign-in-alt"></i> تسجيل
                    الدخول</a>
            </div>
        </div>
    </nav>

    <section class="register-section">
        <div class="register-container">
            <div class="register-form-container">
                <div class="register-header">
                    <h1>إنشاء حساب جديد</h1>
                    <p>املأ البيانات التالية لإنشاء حسابك</p>
                </div>

                <!-- Progress Bar -->
                <div class="progress-container">
                    <div class="progress-steps">
                        <div class="progress-bar" id="progressBar"></div>
                        <div class="progress-step active" data-title="نوع الحساب">
                            <span>1</span>
                        </div>
                        <div class="progress-step" data-title="المعلومات الشخصية">
                            <span>2</span>
                        </div>
                        <div class="progress-step" data-title="المعلومات المهنية">
                            <span>3</span>
                        </div>
                        <div class="progress-step" data-title="التحقق من الهوية">
                            <span>4</span>
                        </div>
                    </div>
                </div>

                <form id="registerForm" method="POST" action="{{ route('register.submit') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-steps">
                        <!-- Step 1: Account Type -->
                        <div class="form-step active" id="step1">
                            <div class="form-group">
                                <label><i class="fas fa-user-tag"></i> نوع الحساب</label>
                                <div class="account-type">
                                    @if ($guard == 'web')
                                        <input type="radio" name="account_type" id="web" value="web" checked>
                                        <label for="web">
                                            <i class="fas fa-briefcase"></i>
                                            <span>عميل</span>
                                            <small>أبحث عن محترفين لتنفيذ مشاريعي</small>
                                        </label>

                                        <input type="radio" name="account_type" id="freelancer" value="freelancer">
                                        <label for="freelancer">
                                            <i class="fas fa-laptop-code"></i>
                                            <span>فريلانسر</span>
                                            <small>أقدم خدماتي في مجال خبرتي</small>
                                        </label>
                                    @elseif ($guard == 'freelancer')
                                        <input type="radio" name="account_type" id="web" value="web">
                                        <label for="web">
                                            <i class="fas fa-briefcase"></i>
                                            <span>عميل</span>
                                            <small>أبحث عن محترفين لتنفيذ مشاريعي</small>
                                        </label>

                                        <input type="radio" name="account_type" id="freelancer" value="freelancer"
                                            checked>
                                        <label for="freelancer">
                                            <i class="fas fa-laptop-code"></i>
                                            <span>فريلانسر</span>
                                            <small>أقدم خدماتي في مجال خبرتي</small>
                                        </label>
                                    @elseif ($guard == 'admin')
                                        <input type="radio" name="account_type" id="admin" value="admin" checked>
                                        <label for="admin">
                                            <i class="fas fa-briefcase"></i>
                                            <span>مسؤول</span>
                                            <small>أبحث عن محترفين لتنفيذ مشاريعي</small>
                                        </label>
                                        <input type="radio" name="account_type" id="web" value="web">
                                        <label for="web">
                                            <i class="fas fa-briefcase"></i>
                                            <span>عميل</span>
                                            <small>أبحث عن محترفين لتنفيذ مشاريعي</small>
                                        </label>
                                        <input type="radio" name="account_type" id="freelancer" value="freelancer">
                                        <label for="freelancer">
                                            <i class="fas fa-laptop-code"></i>
                                            <span>فريلانسر</span>
                                            <small>أقدم خدماتي في مجال خبرتي</small>
                                        </label>
                                    @else
                                        <input type="radio" name="account_type" id="web" value="web">
                                        <label for="web">
                                            <i class="fas fa-briefcase"></i>
                                            <span>عميل</span>
                                            <small>أبحث عن محترفين لتنفيذ مشاريعي</small>
                                        </label>

                                        <input type="radio" name="account_type" id="freelancer" value="freelancer">
                                        <label for="freelancer">
                                            <i class="fas fa-laptop-code"></i>
                                            <span>فريلانسر</span>
                                            <small>أقدم خدماتي في مجال خبرتي</small>
                                        </label>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Step 2: Personal Information -->
                        <div class="form-step" id="step2">
                            <div class="form-group">
                                <label for="fullname"><i class="fas fa-user"></i> الاسم الكامل</label>
                                <div class="input-with-icon">
                                    <i class="fas fa-user"></i>
                                    <input type="text" name="fullName" id="fullname" class="form-control"
                                        placeholder="ادخل اسمك الكامل" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email"><i class="fas fa-envelope"></i> البريد الإلكتروني</label>
                                <div class="input-with-icon">
                                    <i class="fas fa-envelope"></i>
                                    <input type="email" name="email" id="email" class="form-control"
                                        placeholder="ادخل بريدك الإلكتروني" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password"><i class="fas fa-lock"></i> كلمة المرور</label>
                                <div class="input-with-icon">
                                    <i class="fas fa-lock"></i>
                                    <input type="password" name="password" id="password" class="form-control"
                                        placeholder="أنشئ كلمة مرور قوية" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="confirmPassword"><i class="fas fa-lock"></i> تأكيد كلمة المرور</label>
                                <div class="input-with-icon">
                                    <i class="fas fa-lock"></i>
                                    <input type="password" name="confirmPassword" id="confirmPassword"
                                        class="form-control" placeholder="أعد إدخال كلمة المرور" required>
                                </div>
                            </div>
                        </div>

                        <!-- Step 3: Professional Information -->
                        <div class="form-step" id="step3">
                            <div class="form-group">
                                <h3><i class="fas fa-tags"></i> اختر مجالات تخصصك</h3>
                                <div class="categories-grid">
                                    <div class="category-item">
                                        <input type="checkbox" name="webDeveloper" id="webDev">
                                        <label for="webDev">تطوير الويب</label>
                                    </div>
                                    <div class="category-item">
                                        <input type="checkbox" name="phoneApplications" id="mobileApp">
                                        <label for="mobileApp">تطبيقات الموبايل</label>
                                    </div>
                                    <div class="category-item">
                                        <input type="checkbox" name="graphicDesign" id="graphicDesign">
                                        <label for="graphicDesign">تصميم جرافيك</label>
                                    </div>
                                    <div class="category-item">
                                        <input type="checkbox" name="writingContent" id="contentWriting">
                                        <label for="contentWriting">كتابة المحتوى</label>
                                    </div>
                                    <div class="category-item">
                                        <input type="checkbox" name="degitalMarkiting" id="marketing">
                                        <label for="marketing">التسويق الرقمي</label>
                                    </div>
                                    <div class="category-item">
                                        <input type="checkbox" name="translate" id="translation">
                                        <label for="translation">الترجمة</label>
                                    </div>
                                    <div class="category-item">
                                        <input type="checkbox" name="videoEditor" id="videoEditing">
                                        <label for="videoEditing">مونتاج الفيديو</label>
                                    </div>
                                    <div class="category-item">
                                        <input type="checkbox" name="searchEngine" id="seo">
                                        <label for="seo">تحسين محركات البحث</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="bio"><i class="fas fa-user-edit"></i> نبذة عنك</label>
                                <textarea id="bio" name="bio" class="form-control" rows="4" placeholder="اكتب نبذة مختصرة عنك وخبراتك المهنية"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="experience"><i class="fas fa-chart-line"></i> سنوات الخبرة</label>
                                <select id="experience" class="form-control" name="experience">
                                    <option value="">اختر عدد سنوات الخبرة</option>
                                    <option value="0-1">أقل من سنة</option>
                                    <option value="1-3">1-3 سنوات</option>
                                    <option value="3-5">3-5 سنوات</option>
                                    <option value="5+">5 سنوات فأكثر</option>
                                </select>
                            </div>
                        </div>

                        <!-- Step 4: Identity Verification -->
                        <div class="form-step" id="step4">
                            <div class="verification-steps">
                                <h3><i class="fas fa-id-card"></i> إثبات الهوية</h3>

                                <!-- Scrollable container -->
                                <div class="verification-steps-container">
                                    <div class="scroll-indicator">
                                        <i class="fas fa-chevron-down"></i> قم بالتمرير لأسفل لإكمال جميع الخطوات
                                    </div>

                                    <div class="step active">
                                        <div class="step-number">1</div>
                                        <div class="step-content">
                                            <div class="step-title">رفع صورة الهوية</div>
                                            <p>قم بتحميل صورة واضحة من وثيقة هوية رسمية (بطاقة شخصية، جواز سفر، رخصة
                                                قيادة)</p>
                                            <div class="upload-area" id="idUploadArea">
                                                <i class="fas fa-cloud-upload-alt"></i>
                                                <p>انقر أو اسحب الملف هنا</p>
                                                <small>JPG, PNG, PDF - الحد الأقصى للحجم 5MB</small>
                                            </div>
                                            <input type="file" name="identity" id="idUpload"
                                                accept=".jpg,.jpeg,.png,.pdf" style="display:none;">
                                            <div class="upload-preview" id="idPreview"></div>
                                        </div>
                                    </div>

                                    <div class="step">
                                        <div class="step-number">2</div>
                                        <div class="step-content">
                                            <div class="step-title">صورة الهوية مع صاحبها</div>
                                            <p>قم بتحميل صورة تظهر وجهك واضحًا مع وثيقة الهوية التي قمت بتحميلها في
                                                الخطوة السابقة</p>
                                            <div class="upload-area" id="selfieUploadArea">
                                                <i class="fas fa-camera"></i>
                                                <p>انقر أو اسحب الملف هنا</p>
                                                <small>JPG, PNG - الحد الأقصى للحجم 5MB</small>
                                            </div>
                                            <input type="file" name="identityPerson" id="selfieUpload"
                                                accept=".jpg,.jpeg,.png" style="display:none;">
                                            <div class="upload-preview" id="selfiePreview"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-navigation">
                        <button type="button" class="btn-nav btn-prev" id="prevBtn" disabled>
                            السابق <i class="fas fa-arrow-right"></i>
                        </button>
                        <button type="button" class="btn-nav btn-next" id="nextBtn">
                            التالي <i class="fas fa-arrow-left"></i>
                        </button>
                        <button type="submit" class="btn-register" id="submitBtn" style="display:none;">
                            <i class="fas fa-user-plus"></i> إنشاء حساب جديد
                        </button>
                    </div>

                    <div class="signin-link">
                        لديك حساب بالفعل؟ <a href="{{ route('login') }}">تسجيل الدخول</a>
                    </div>
                </form>
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
