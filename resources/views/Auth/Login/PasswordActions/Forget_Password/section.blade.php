@extends('Auth.Login.PasswordActions.Forget_Password.master')
@section('content')
    <section class="reset-section">
        <div class="reset-container">
            <div class="reset-header">
                <div class="reset-icon">
                    <i class="fas fa-key"></i>
                </div>
                <h1>استعادة كلمة المرور</h1>
                <p>أدخل بريدك الإلكتروني المسجل وسنرسل لك رابطًا لاستعادة كلمة المرور الخاصة بك</p>
            </div>
            @if ($errors->any())
                <div class="custom-alert" role="alert">
                    @foreach ($errors->all() as $error)
                        <strong>Error Occured!!!</strong><br>
                        <span style = "color:rgb(178, 46, 46)">{{ $error }}</span>
                        <button type="button" class="close-btn" aria-label="إغلاق"
                            onclick="this.parentElement.style.display='none';">
                            &times;
                        </button>
                    @endforeach
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif


            <form class="reset-form" action="{{ route('forgetPass.submit') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email"><i class="fas fa-envelope"></i> البريد الإلكتروني</label>
                    <div class="input-with-icon">
                        <i class="fas fa-envelope"></i>
                        <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}"
                            placeholder="ادخل بريدك الإلكتروني" required>
                    </div>
                </div>

                <button type="submit" class="btn-reset" id="resetBtn">
                    <i class="fas fa-paper-plane"></i> إرسال رابط الاستعادة
                    <i class="fas fa-spinner fa-spin"></i>
                    <i class="fas fa-check"></i>
                </button>

                <div class="success-message" id="successMessage">
                    <i class="fas fa-check-circle"></i>
                    <h3>تم إرسال رابط الاستعادة بنجاح!</h3>
                    <p>لقد أرسلنا رابطًا لاستعادة كلمة المرور إلى بريدك الإلكتروني. يرجى التحقق من صندوق الوارد.</p>
                </div>
            </form>

            <div class="links-container">
                <a href="{{ route('login') }}"><i class="fas fa-arrow-left"></i> العودة لتسجيل الدخول</a>
                <a href="{{ route('register') }}"><i class="fas fa-user-plus"></i> إنشاء حساب جديد</a>
            </div>
        </div>
    </section>

@endsection
