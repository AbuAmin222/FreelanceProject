@extends('Auth.Login.PasswordActions.Notification.master')
@section('content')
    <section class="confirmation-section">
        <div class="confirmation-container">
            <div class="confirmation-icon">
                <i class="fas fa-paper-plane"></i>
            </div>

            <div class="confirmation-header">
                <h1>تم إرسال رابط اعادة تعيين كلمة المرور</h1>
            </div>

            <div class="confirmation-message">
                <p>لقد أرسلنا رابط اعادة التعببن إلى بريدك الإلكتروني <strong>{{ $email }}</strong>. يرجى التحقق
                    من صندوق الوارد الخاص بك.</p>
                <p>إذا لم تجد البريد الإلكتروني، يرجى التحقق من مجلد الرسائل غير المرغوب فيها أو إعادة إرسال الرابط.</p>
            </div>

            <button class="btn-home">
                <a href="{{ route($guard . '.lightDash') }}" style="color: white; text-decoration: none;">العودة إلى
                    الصفحة الرئيسية</a>
            </button>
            <form action="{{ route($guard . '.forgetPass.reSend') }}" method="POST">
                @csrf
                <input type="hidden" name="email" value="{{ $email }}">
                <div class="resend-link">
                    You didn't get the message?
                    <button type="submit" class="btn-login">
                        <i class="fas fa-sign-in-alt"></i> Re-Send Link
                    </button>

                </div>

            </form>
        </div>
    </section>
@endsection
